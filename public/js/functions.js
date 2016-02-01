/*
 * Custom made jQuery | Ajax functions
 * 
 */

/*
 * jQuery Data Tables function
 */
$(document).ready(function() {
        $('#dataTables-function').DataTable({
                responsive: true
        });
});
 
/*
 * Add Estimate get vehicle by customer Ajax function
 */
$('#customer').change(function(e) {
   // console.log(e);
    
    var cust_id = e.target.value;
    
    //ajax
    $.get('/ajax-vehicle?cust_id=' + cust_id, function(data){
        //success data
        //console.log(data);
        $('#vehicle').empty();
        $('#vehicle').append('<option value="">Select a vehicle</option>');
        $.each(data, function(index, vehicleObj){
            $('#vehicle').append('<option value="'+vehicleObj.id+'">'+vehicleObj.reg_no+'</option>');
        });
    });
});


/*
 * Dynamic table row adding and deleting functions
 */

function addTableRow(jQtable){
    var rowId = parseInt($('#dynamic-tbl tbody tr:last').attr('id'));
    ++rowId;
   // console.log(rowId);
	jQtable.each(function(){
		var tds = '<tr id='+rowId+'>';
		jQuery.each($('tr:last td', this), function() {tds += '<td>'+$(this).html()+'</td>';});
		tds += '</tr>';
		if($('tbody', this).length > 0){$('tbody', this).append(tds);
		}else {$(this).append(tds);}
	});
}

$(function(){
	$('table').on('click','#delete-row',function(e){
	   e.preventDefault();
	  $(this).parents('tr').remove();
	});
});


$("#dynamic-tbl").on('change', 'select', function(e){
    var item_id = e.target.value;
    var self = this;
    //ajax
    $.get('/ajax-item?item_id=' + item_id, function(data){
        //success data
        //console.log(data);
        $.each(data, function(index, itemObj){
            $(self) // use self not this
                .closest('tr') // get the parent(closest) tr
                .find('input[name="item_description[]"]')// now find the item_description by name as id must be unique
                .val(itemObj.name);
            $(self)
                .closest('tr')
                .find('input[name="rate[]"]')
                .val(itemObj.sale_price);
        });
    });
});


$("#dynamic-tbl").on('change', 'input[name="units[]"]', function(e){
    var units = e.target.value;
    var self = this;
    var rate = $(self).closest('tr').find('input[name="rate[]"]').val();
    var ammount = (units*rate).toFixed(2);
    $(self).closest('tr').find('input[name="amount[]"]').val(ammount);
});

function calcTotal() {
    /*var sum = 0;
    $(".amount").each(function(){
        sum += +$(this).val();
    });

    $(".total").val(sum);*/
}
