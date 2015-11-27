
/**
 * Created by napster on 9/6/2015.
 */
priceUpdate();
Discount();
Netvalue();

$('#add').click(function () {
    var count = parseInt($('#add').attr('value'));
    $.get('/index.php/site/add-watch', {'count' : count}, function(data){
        $('#bill tbody').append('<tr>'+data+'</tr>');

        /*$('input[id^="bills-price"]').change(function(){
            alert($(this).val());
        });*/
        priceUpdate();
        Netvalue();
    });


    $('#add').attr('value', count+1);
    delete count;



});
function priceUpdate () {
    $('.bills-quantity').change(function () {
        var quantity = $(this).val();
        var id = $(this).attr('id');
        var idArray = id.split('-');
        var price = $('#bills-price-'+idArray[2]).val();
        $('#bills-price-'+idArray[2]).val((price * +quantity));
        updateTotal();
    });
}

function Discount(){
    $('#bills-discount').change(function(){
       alert($(this).val());
    });
}

function Netvalue(){
    $('.bills-price').change(function(){
       updateTotal();
    });
}

function updateTotal() {
    var items = $('.bills-price');
    var total=0;
    items.each(function() {
        var price=$(this).val();
        total=total + +price;
        $('#bills-net').val(total);
        /* alert($(this).attr('id'));
         alert($(this).val());*/
    });
}

/*

var count = parseInt($('#add').attr('value'));

$('input[id^="bills-price"]').change(function(){
    alert($(this).val());
});

$('input[id^="bills-quantity"]').change(function(){

    alert(count);
});

$('input[id^="bills-discount"]').change(function(){
    alert($(this).val());
});

*/




