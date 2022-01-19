jQuery(function($){
    $('#location_filter').on('change', function(){
        var filter = $('#location_filter');
        var cate = $(this).val();
        $.ajax({
            url:theoriemakkie_filter.ajax_url,
            type:'POST',
            data: {
                action: 'theoriemakkie_filter',
                location: cate,
            },
            success:function(data){
                if (data) {
                    $("#response").html(data);
                }
            }
        });
    });
});