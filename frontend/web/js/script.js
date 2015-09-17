
/**
 * Created by napster on 9/6/2015.
 */

$('#add').click(function () {
    var count = parseInt($('#add').attr('value'));
    $('#bill').append("<tr><th>"+ count +"</th>" +
    "<th><div class='form-group field-bills-watches_id-"+count+" required'>" +
    "<label class='control-label' for='bills-watches_id-"+count+"'>Watches ID</label> " +
    "<input type='text' id='bills-watches_id-"+count+"' class='form-control' name='Bills[watches_id]["+count+"]'> " +
    "<div class='help-block'></div> " +
    "</div></th>" +
    "<th><div class='form-group field-bills-quantity-"+count+" required'>"+
    "<label class='control-label' for='bills-quantity-"+count+"'>Quantity</label>"+
    "<input type='text' id='bills-quantity-"+count+"' class='form-control' name='Bills[quantity]["+count+"]'>"+
    "<div class='help-block'>Quantity cannot be blank</div>"+
    "</div></th>" +
     "<th><input type='text'></th></tr>");

    $('#add').attr('value', count+1);
    delete count;
});




