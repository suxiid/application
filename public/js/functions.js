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
    console.log(e);
    
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
	jQtable.each(function(){
		var tds = '<tr>';
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

