$(document).ready(function(){

});

jQuery(function() {

});


$('select[name=training_name]').on('change', function(){
    var training_id = $('select[name=training_name]').val();

    var root_url = window.location.protocol + "//" + window.location.host + "/";

    // $('#trainee_list  tbody tr').empty();
    $("#trainee_list  ").find("tr:gt(0)").remove();


    $.ajax({
        type: 'GET',
        url: root_url+'/schedule/'+training_id+'/trainee/request',
        cache: false,
        async: false,
        success: function(result){
            console.log(result);

            $.each( result, function( key, value ) {

                $('#trainee_list tr:last').after('<tr>' +
                                '<td>'+(key+1)+'</td>'+
                                '<td>'+value.trainee.first_name+'</td>'+
                                '<td>'+value.trainee.mobile_no+'</td>'+
                                '<td>'+value.trainee.email+'</td>'+
                                '<td>'+value.trainee.per_addr_ps_id+'</td>'+
                                '<td>' +
                                    '<input type="checkbox" value="1" name="exam_status['+value.trainee.application_no+']">' +
                                    '<input type="hidden" name="applicant_no[]" value="'+value.trainee.application_no+'">'+
                                '</td>'+
                            '</tr>');
            });
        },
        error: function(){
            alert(ERROR);
        },
    });
});




