jQuery(document).ready( function($) {
    $('.the-like-button').on('click', function() {
        // var post_id = $(this).attr( 'id' );
        var the_post = $(this).parent('.engage-bar');
        // var the_id = the_post.dataset;
        // var post_count = $(this).child('.the-like-counter');
        console.log(the_post);
        // $.ajax({
        //     type: 'POST',
        //     url: ajax_object.ajaxurl,
        //     data: {
        //         action: 'custom_update_post',
        //         post_id: post_id
        //     }
        // });
    });
});