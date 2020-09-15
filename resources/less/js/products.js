// Rating
var r_1 = $('.c-review .one');
var r_2 = $('.c-review .two');
var r_3 = $('.c-review .three');
var r_4 = $('.c-review .four');
var r_5 = $('.c-review .five');

r_1.on('click', function() {
    r_1.addClass('checked');
    r_2.removeClass('checked');
    r_3.removeClass('checked');
    r_4.removeClass('checked');
    r_5.removeClass('checked');
});
r_2.on('click', function() {
    r_1.addClass('checked');
    r_2.addClass('checked');
    r_3.removeClass('checked');
    r_4.removeClass('checked');
    r_5.removeClass('checked');
});
r_3.on('click', function() {
    r_1.addClass('checked');
    r_2.addClass('checked');
    r_3.addClass('checked');
    r_4.removeClass('checked');
    r_5.removeClass('checked');
});
r_4.on('click', function() {
    r_1.addClass('checked');
    r_2.addClass('checked');
    r_3.addClass('checked');
    r_4.addClass('checked');
    r_5.removeClass('checked');
});
r_5.on('click', function() {
    r_1.addClass('checked');
    r_2.addClass('checked');
    r_3.addClass('checked');
    r_4.addClass('checked');
    r_5.addClass('checked');
});

    $('.one').on('click',function (){
    $('input[name="rating"]').val(1);
});
    $('.two').on('click',function (){
    $('input[name="rating"]').val(2);
});
    $('.three').on('click',function (){
    $('input[name="rating"]').val(3);
});
    $('.four').on('click',function (){
    $('input[name="rating"]').val(4);
});
    $('.five').on('click',function (){
    $('input[name="rating"]').val(5);
});

$('.c-prop').on('click',function (){
    $('.c-prop').removeClass('active');
    $(this).addClass('active');
    $('#inputProp').val($(this).html());
    $('#inputPrice').val($(this).data('price'));
    $('#textPrice').html('$'+$(this).data('price').toFixed(2));
    if ($(this).data('count')>0)
    {
        $('#textCount').html('in stock');
    }
    else
    {
        $('#textCount').html('pre-order');
    }

})

$('.selectQty').on('click',function (){
    //console.log($(this).val());
})


$('.btnCartAdd').on('click',function (e){
    e.preventDefault();

    var formData=$('#formProduct').serialize();
    //console.log(formData);
    $.ajax({
        type:"POST",
        url : "/cart-add",
        data : formData,
        success : function(response)
        {
            var data = response;

            var cart_data=$.parseJSON(data);
            console.log(cart_data);
            //console.log(size(cart_data));
            var cnt=0;
            var etotal=0;
            location.reload();
            return;
            for (item in cart_data)
            {
                cnt++;
                clearCart();
                cartDrawItem(item);

                etotal+=item['price']*item['qty'];
            }

            updateCounter(cnt);
            return response;
        },
        error: function() {

        }
    });
})


function clearCart()
{
    $('#divCart').html('');
}

function cartDrawItem(item)
{
    //var text=$('#divCart').html();
    //console.log(text);

}

function updateCounter(cnt)
{

    if (cnt>0)
    {
        $('.cart-counter').each(function (idx){
            $(this).text(cnt);
            $(this).removeClass('d-none');
        })
    }
    else
    {
        $('.cart-counter').addClass('d-none');
    }
}


$('.aCartPlus').on('click',function (e){
    e.preventDefault();

    inp=$(this).closest('.c-cart__info').find("input");
    var product_id=$(this).data('itemid');
    var product_size=$(this).data('size');
    var product_price=$(this).data('price');

    $.ajax({
        type:"GET",
        url : "/cart-plus",
        data : {
          product_id: product_id,
          product_prop: product_size,
          product_price: product_price,
        },
        success : function(response)
        {
            var data = response;
            console.log(data);
            updateCounter(data['cart_count']);
            updateCTotal(data['cart_etotal']);
            inp.val(parseInt(inp.val())+1);
        },
        error: function() {

        }
    });
})

$('.aCartRemove').on('click',function (e){
    e.preventDefault();
    var uid=$(this).data('uid');
    cartRemove(uid);
    $(this).closest('.cartItem').remove();
})

function cartRemove(uid)
{
    $.ajax({
        type:"GET",
        url : "/cart-remove",
        data : {
            item_uid: uid,
        },
        success : function(response)
        {
            var data = response;
            updateCounter(data['cart_count']);
            updateCTotal(data['cart_etotal']);
        },
        error: function() {
        }
    });
}

$('.aCartMinus').on('click',function (e){
    e.preventDefault();

    inp=$(this).closest('.c-cart__info').find("input");
    var item_uid=$(this).data('uid');

    var item_cnt=parseInt(inp.val());
    if (item_cnt<=1)
    {
        ret=cartRemove(item_uid);

        updateCounter(ret['cart_count']);
        updateCTotal(ret['cart_etotal']);
        $(this).closest('.cartItem').remove();
        return;
    }

    var product_id=$(this).data('itemid');
    var product_size=$(this).data('size');
    var product_price=$(this).data('price');

    $.ajax({
        type:"GET",
        url : "/cart-minus",
        data : {
            product_id: product_id,
            product_prop: product_size,
            product_price: product_price,
        },
        success : function(response)
        {
            var data = response;
            console.log(data);
            updateCounter(data['cart_count']);
            updateCTotal(data['cart_etotal']);
            inp.val(item_cnt-1);
        },
        error: function() {

        }
    });
})

function getShipping(state)
{
    $.ajax({
        type:"GET",
        url : "/shipping-get",
        data : {
            state: state,
        },
        success : function(data)
        {

            $('#selectShipping').empty();
            var toAdd=''
            $.each(data['shipping'],function (idx,item)
            {
               toAdd+='<option value="'+item['name']+'/'+item['price']+'">'+item['name'];
               if (item['price']==0)
               {
                   toAdd+=' - FREE</option>';
               }
               else
               {
                   toAdd+=' - $'+item['price'].toFixed(2)+'</option>';
               }

            });
            $('#selectShipping').html(toAdd);
            updateTax(data['tax']);

            updateShipping(data['shipping'][0]['price']);

        },
        error: function()
        {

        }
    });
}

$('#selectShipping').on('change',function (){
    svalue=$(this).val();
    var temp=svalue.split('/');
    updateShipping(temp[1]);
})

function updateTax(tax)
{
    if(tax)
    {
        tvalue=$('#inputSTotal').val()*tax/100;
        $('#inputTax').val(tax);
        $('.textTax').html(tvalue.toFixed(2));
        updateTotal();
    }
}


function updateShipping(val)
{
    val=parseInt(val);
    $('#inputShipping').val(val);
    $('.textShipping').html(val.toFixed(2));
    updateTotal();
}
function updateCTotal(total)
{
    $('#inputSTotal').val(total);
    $('.textETotal').html('$'+total.toFixed(2));
    $('.textETotal2').html(total.toFixed(2));
    updateTotal();
}

function updateTotal()
{
    stotal=parseFloat($('#inputSTotal').val());
    tax=parseFloat(stotal*parseFloat($('#inputTax').val())/100);
    shipping=parseFloat($('#inputShipping').val());

    total=stotal+tax+shipping;
    $('#inputTotal').val(total);
    $('.textTotal').html(total.toFixed(2));
}

if($('#address-input').length)
{
    var placesAutocomplete = places({
        appId: 'pl1CSXYWSFGN',
        apiKey: '853fe4e9d0c60d0738f10fcf07f60ccf',
        container: document.querySelector('#address-input'),
        countries: ['us']
    });

    placesAutocomplete.on('change', function resultSelected(e)
    {
        getShipping(e.suggestion.administrative);
    });

}

$('#btnOrder').on('click',function (){
    form=$('#formOrder');
    res=form.validate();
    console.log(res);
   //$('#formOrder').submit();
});