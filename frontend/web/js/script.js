
/**
 * Created by napster on 9/6/2015.
 */
priceUpdate();
Misc();
Netvalue();

$('#add').click(function () {
    var count = parseInt($('#add').attr('value'));
    $.get('/index.php/site/add-watch', {'count' : count}, function(data){
        $('#bill tbody').append('<tr>'+data+'</tr>');

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

function Misc(){
    $('#bills-discount').change(function(){
        var discount=($('#bills-net').val())*($(this).val()/100)
        $('#bills-discountValue').val(discount);
        var Vat=$('#bills-net').val()/1.145;
        $('#bills-vatValue').val(Vat);
        var total=parseInt($('#bills-net').val())-parseInt($('#bills-discountValue').val())-parseInt($('#bills-vatValue').val());
        alert(total);
        $('#bills-totalValue').val(total);
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

    });
}






