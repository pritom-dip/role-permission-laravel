$(function () {

    $('.sidebar-menu').tree();

    // Data Table
    if( $(".list-data").length > 0 ){
        $(".list-data").DataTable({
            paging: false,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
        });
    };

    $('#dominionID').on('change', function(){
        var dominionID = $("#dominionID option:selected").val();
        var data = {dominion_id : dominionID};

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url : '/admin/menuprocess',
            data: data,
            dataType: 'json',
            success: function(res){
                $('#processId').find('option').remove().end();
                $('#processId').append($('<option>', { 
                    value: "",
                    text : "Please select" 
                }));
                if(res.processes){
                    $.each( res.processes, function( key, value ) {
                        $('#processId').append($('<option>', { 
                            value: value.id,
                            text : value.name 
                        }));
                    });
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $(".menu-activated").parents('.treeview').addClass('menu-open active');

});

//===========Check All==================

$(document).on("change", "#checkAll", function() { 
    $('input:checkbox').not(this).prop('checked', this.checked);
});
