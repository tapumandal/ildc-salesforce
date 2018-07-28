
var ifaManagementFilterSearch = (function(){

	return {
		init: function(){
			var menuValue 	= '';
			var sortbyValue = '';
				
			$('#selectMenuOption').on('change',function(){
				menuValue = $.trim($("#selectMenuOption").find(":selected").val());
			});
			$('#selectSortbyValue').on('change',function(){
				sortbyValue = $.trim($("#selectSortbyValue").find(":selected").val());
			});

			$('#searchIfaMangment').on('click',function(e){
				e.preventDefault();
				$('.pagination_body').addClass('hidden');
				var formDateValue 	= $("input[name='date[from]']").val();
				var toDateValue 	= $("input[name='date[to]']").val();

				var data = {
					selectedOptionValues 		: menuValue,
					sortbyValues 	:sortbyValue,
					formDateValues  :formDateValue,
					toDateValues    :toDateValue
				}

				$.ajax({
		          type: "GET",
		          url: "/getMenuFilterValue",
		          data: data,
		          datatype: 'json',
		          cache: false,
		          async: false,
		          success: function(result) {
		          	var data = JSON.parse(result);
		          	addRow(data,0)		          	
		          },
		          error:function(result){
		            alert("Some thing is Wrong");
		          }
		          });
			});
		}
	}
})();

function addRow(results, start)
{	
	$('.pagination').empty();
    $('#ifa_list_tbody').empty();
    $("#booking_list_pagination").css('display','none');

    var sl = 1;

    var position = start+1;
    start = start*15;

    if(results.length <start+15){
        end = results.length;
    }
    else{
        end = start+15;
    }

    var rows = $.map(results, function(value, index) {
        return [value];
    });
    if( end == 0){
    	$('#ifa_list_tbody').append(
    		'<tr class="ifa_list_tbody"><td colspan="7" style="height:50px;"> sdasdsadasdsa </td> </tr>'
    		);
    }else{
	    for (var i = start; i < end; i++)
	    {
	        $('#ifa_list_tbody').append('<tr class="ifa_list_tbody"><td>'+sl+
	            '</td><td>'+ emptyCheck(rows[i].first_name) +
	            '</td><td>'+ emptyCheck(rows[i].last_name) +
	            '</td><td>'+ emptyCheck(rows[i].mobile_no) +
	            '</td><td>'+ emptyCheck(rows[i].email) +
	            '</td><td>'+ emptyCheck(rows[i].date_of_birth) +
	            '</td><td>'+ emptyCheck(rows[i].nationality) +
	            '</td></tr>');
	        sl++;
	    }
	}

    setPagination(results, position);

    $('.pagination li').on('click',(function () {

        var begin = $(this).attr("data-page");
        addRow(results, begin-1);
    }));
}

function emptyCheck(value,){
	return ((value == null ) ? "" : value) ;
}

function setPagination(results, position) {
    // if(results.length > end)
    // {
    var pageNum = Math.ceil(results.length/15);
    var previous = (position-1);
    var next = (position+1);
    if(position == 1)
        previous = 1;
    if(position == pageNum)
        next = pageNum;
    $('.pagination').append('<li data-page="'+ previous +'"><span>&laquo;<span class="sr-only">(current)</span></span></li>').show();
    for (i = 1; i <= pageNum;)

    {
        $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show();
    }
    $('.pagination').append('<li data-page="'+ next +'"><span>&raquo;<span class="sr-only">(current)</span></span></li>').show();
    // $('.pagination').append('<li><a href="http://127.0.0.1:8000/view/challan/list?page=2" rel="next">&raquo;</a></li>').show();

    $('.pagination li:nth-child('+ (position+1) +')').addClass('active');

    if(position == 1)
        $('.pagination li:first-child').addClass('disabled');
    if(position == pageNum)
        $('.pagination li:last-child').addClass('disabled');
    // }
}

var ifaManagementReset = (function(){

	return {
		init: function(){
			$('#ifa_reset_btn').on('click',function () {
				$('.pagination_body').addClass('hidden');
				$('#selectMenuOption').val("");
				$('#selectSortbyValue').val("");
				$('#formDate').val("");
				$('#toDate').val("");

				$.ajax({
		          type: "GET",
		          url: "/ifa/management/all/value",
		          datatype: 'json',
		          cache: false,
		          async: false,
		          success: function(result) {
		          	var data = JSON.parse(result);
		          	addRow(data,0)		          	
		          },
		          error:function(result){
		            alert("Some thing is Wrong");
		          }
		          });
			});
		}
	}
})();

$(document).ready(function(){
	ifaManagementFilterSearch.init();
	ifaManagementReset.init();
});