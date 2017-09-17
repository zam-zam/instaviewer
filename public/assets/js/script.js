$(function(){
    $('#intro__search .search.icon').click(function(){
        $('#intro__search').submit();
    });
    $('#feed__load-more').click(function(){
        var $btn = $(this),
            $url = $(this).attr('data-url'),
            $next_max_id = $(this).attr('data-nextmaxid');
        $btn.addClass('loading');
        $.ajax({
            url: $url + '?next_max_id=' + $next_max_id
        })
        .done(function(response){
            var $json = ($.parseJSON(response));
            $('#feed-container').append($json.data);
            $btn.attr('data-nextmaxid', $json.next_max_id);
            $btn.removeClass('loading');
        });
    });
});