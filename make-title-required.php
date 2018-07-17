<?php
add_action( 'edit_form_advanced', 'mm_force_post_title' );
function mm_force_post_title( $post )  {
    $post_types = array(
        'post',
    );

    if ( ! in_array( $post->post_type, $post_types ) ) {
        return;
    }
    ?>

    <!-- !!!!!! This can be ( and should be ) included with wp_register_script and wp_enqueue_script for better code organization  !!!!!! -->

    <script type='text/javascript'>
    ( function ( $ ) {
        $( document ).ready( function () {
            //Require post title when adding/editing Project Summaries
            $( 'body' ).on( 'submit.edit-post', '#post', function () {
                // If the title isn't set
                if ( $( "#title" ).val().replace( / /g, '' ).length === 0 ) {
                    // Show the alert
                    if ( !$( "#title-required-msj" ).length ) {
                        $( "#titlewrap" )
                        .append( '<div id="title-required-msj"><em>Title is required.</em></div>' )
                        .css({
                            "padding": "5px",
                            "margin": "5px 0",
                            "background": "#ffebe8",
                            "border": "1px solid #c00"
                        });
                    }
                    // Hide the spinner
                    $( '#major-publishing-actions .spinner' ).hide();
                    // The buttons get "disabled" added to them on submit. Remove that class.
                    $( '#major-publishing-actions' ).find( ':button, :submit, a.submitdelete, #post-preview' ).removeClass( 'disabled' );
                    // Focus on the title field.
                    $( "#title" ).focus();
                    return false;
                }
            });
        });
    }( jQuery ) );
    </script>

    <!-- !!!!!! This can be ( and should be ) included with wp_register_script and wp_enqueue_script for better code organization  !!!!!! -->

    <?php
}
