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
})

$('.btnCartAdd').on('click',function (e){
    e.preventDefault();

    var formData=$('#formProduct').serialize();
    console.log(formData);


    $.ajax({
        type:"POST",
        url : "/cart-add",
        data : formData,
        success : function(response)
        {
            data = response;

            if (data['count']==0)
            {
                hideCounter();
            }
            else
            {
                showCounter(data['count']);
            }
            return response;
        },
        error: function() {

        }
    });
})

function hideCounter()
{
    $('.spCounter').addClass('d-none');
}

function showCounter(cnt)
{
    if (cnt>0)
    {
        $('.spCounter').each(function (idx){
            $(this).text(cnt);
            $(this).removeClass('d-none');
        })
    }
    else
    {
        $('.spCounter').addClass('d-none');
    }
}
