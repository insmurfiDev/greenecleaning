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
    price=$(this).data('price');
    $('#inputPrice').val(price);
    $('#textPrice').html('$'+price.toFixed(2));

    cnt=$('#selectQty').val();
    total=price*cnt;
    $('#textTotal').html('$'+total.toFixed(2));


    if ($(this).data('count')>10)
    {
        $('#textCount').html('yes');
    }
    else if($(this).data('count') && $(this).data('count')<=10)
    {
        $('#textCount').html('limited');
    }
    else
    {
        $('#textCount').html('pre-order');
    }

})

$('#selectQty').on('change',function (){
    cnt=$(this).val();
    price = $('.c-prop.active').data('price');
    console.log(price);
    total=cnt*price;
    $('#textTotal').html('$'+total.toFixed(2));
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
    //console.log(placesAutocomplete.autocomplete);

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
            updateCounter(data['cart_count']);
            updateCTotal(data['cart_etotal']);
            inp.val(parseInt(inp.val())+1);
            state=$('#inputState').val();

            if (state!='')
            {
                getShipping(state);
            }
            updateTotal();
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
            updateCounter(data['cart_count']);
            updateCTotal(data['cart_etotal']);
            inp.val(item_cnt-1);
            //placesAutocomplete.onChange;
            state=$('#inputState').val();

            if (state!='')
            {
                getShipping(state);
            }

            updateTotal();

        },
        error: function() {

        }
    });
})

function getShipping(state)
{
    $('#inputState').val(state);
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
            updateTotal();

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
    //console.log(stotal,tax,shipping);

    promo_val=0;
    if ($('#inputCouponVal').data('val')!='')
    {

        promo_val=parseFloat($('#inputCouponVal').data('val'));
        promo_type=$('#inputCouponVal').data('type');
        //console.log(promo_val,promo_type);

        if (promo_type==1)
        {
            promo=-stotal*promo_val/100;
            $('.textCoupon').html(promo.toFixed(2));
        }
        else
        {
            promo=promo_val;
        }
    }

    total=stotal;
    if (tax)
    {
        total+=tax;
    }
    if (shipping)
    {
        total+=shipping;
    }
    if(promo)
    {
        total+=promo;
    }

    $('#inputTotal').val(total);
    $('.textTotal').html(total.toFixed(2));
}



$('#btnOrder').on('click',function (){
/*
    form=$('#formOrder');
    res=form.validate();
    console.log(res);

 */
   //$('#formOrder').submit();
});

$('#chkSameShipping').on('click',function (){
    if (!$(this).hasClass('checks'))
    {
        $('input[name="fname_b"]').val($('input[name="fname"]').val());
        $('input[name="lname_b"]').val($('input[name="lname"]').val());
        $('input[name="apt_b"]').val($('input[name="apt"]').val());
        $('input[name="address_b"]').val($('input[name="address"]').val());
    }
})

if($('#address-input').length)
{
    var placesAutocomplete = places({
        appId: 'pl1CSXYWSFGN',
        apiKey: '853fe4e9d0c60d0738f10fcf07f60ccf',
        container: document.querySelector('#address-input'),
        countries: ['us'],
        templates: {
            value: function (suggestion) {
                return suggestion.name+suggestion.city+', '
                +suggestion.administrative+', '
                +suggestion.postcode;
            },
            suggestion: function (suggestion) {
                return suggestion.name+suggestion.city+', '
                    +suggestion.administrative+', '
                    +suggestion.postcode;
            }
        }
    });

    placesAutocomplete.on('change', function resultSelected(e)
    {
        getShipping(e.suggestion.administrative);
    });
}

if($('#address-input2').length)
{
    var placesAutocomplete2 = places({
        appId: 'pl1CSXYWSFGN',
        apiKey: '853fe4e9d0c60d0738f10fcf07f60ccf',
        container: document.querySelector('#address-input2'),
        countries: ['us'],
        templates: {
            value: function (suggestion) {
                return suggestion.name+suggestion.city+', '
                    +suggestion.administrative+', '
                    +suggestion.postcode;
            },
            suggestion: function (suggestion) {
                return suggestion.name+suggestion.city+', '
                    +suggestion.administrative+', '
                    +suggestion.postcode;
            }
        }
    });

    placesAutocomplete2.on('change', function resultSelected(e)
    {
        //getShipping(e.suggestion.administrative);
    });
}

$('#btnCoupon').on('click',function (e){

    e.preventDefault();


    code=$('#inputCouponCode').val();
    if (code ==='')
    {
        return;
    }

    $.get('/coupon-check',{coupon:code}, function (data){

        $('#textCouponError').html('');

        if (data!='')
        {
            coupon=JSON.parse(data);
            dc=0;
            if (coupon['type']==1) //percent
            {
                dc=-parseFloat($('#inputSTotal').val())*coupon['value']/100;
                $('#inputCouponVal').val(dc);
                $('#inputCouponVal').data('val',coupon['value']);
                $('#inputCouponVal').data('type',1)
            }
            else
            {
                dc=-coupon['value'];
                $('#inputCouponVal').val(dc);
                $('#inputCouponVal').data('val',coupon['value']);
                $('#inputCouponVal').data('type',2)
            }
            $('.textCoupon').html(dc.toFixed(2));
            $('.divPromoCode').removeClass('d-none').addClass('d-flex');
        }
        else
        {
            $('#textCouponError').html('Unknown promotional code');
            $('.divPromoCode').addClass('d-none').removeClass('d-flex');
            $('#inputCouponVal').val(0);
        }

        updateTotal();
    });
})

$('#formOrder').on('submit',function (e){
    cc_input=$('input[name="card_number"]');
    cc_input.val(cc_input.data('ccNumber'));
    if ($('#nav-card').hasClass('active'))
    {
        $('#inputCheckoutType').val('card');
    }
    else
    {
        $('#inputCheckoutType').val('pp');
    }

        //inputCheckoutType
    $('#preloader').removeClass('d-none');

})
