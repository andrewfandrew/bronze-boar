<?php
/*
Plugin Name: AF Make Footer Sticky
Description: Make the footer sticky on desktop viewports
Author: Andrew Farquharson
Author URI: http://cactusblossomitservices.com
*/

/* the code is copied from the Customizr theme site snippets */
/* Add a wrap div to the whole content except the footer */
 
add_action( '__before_header' , 'my_wrap_start' );
function my_wrap_start(){
    echo '<div id="wrap">';
}
 
add_action( '__before_footer' , 'my_wrap_end' );
function my_wrap_end(){
    /* close #wrap and add a useful div avoiding the footer
     * overlaps the page content under certain circumstances
     */
    echo '<div id="push"></div></div><!--#wrap-->';
}

add_action('wp_footer', 'sticky_footer', 9999);
function sticky_footer(){?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            ! function($){
                "use strict";
                var $wrap = $('#wrap'),
                    $footer = $('footer#footer'),
                    $reset_margin_top = $('#tc-reset-margin-top'),
                    $html = $('html'),
                    $body = $('body'),
                    $push = $('#push'),
                    isCustomizing = $('body').hasClass('is-customizing'),
                    isUserLogged = ! isCustomizing && ( $('body').hasClass('logged-in') || 0 !== $('#wpadminbar').length ),
                    stickyEnabled = $body.hasClass('tc-sticky-header'),
                    resizeBodyHtml = isUserLogged || stickyEnabled,
 
                    $window_width = $(window).width();
                
                function resize_body_html(timeout){
                    if ( ! resizeBodyHtml )
                        return;
 
                    setTimeout(function(){
                        if ( isUserLogged ){
                            $html.css('height', '100%');
                            $html.css('height', parseInt($html.css('height')) - $('#wpadminbar').height() );
                        }
 
                        if ( stickyEnabled ){
                            $body.css('height', '100%');
                            $body.css('height', parseInt($body.css('height')) - parseInt( $reset_margin_top.css('marginTop') ) );
                        }
                    }, timeout ) ;
                }
 
                function render_sticky_footer(){
                    var $push_height = parseInt( $footer.css('height') ) + parseInt( $footer.css('borderTopWidth') ) + parseInt( $footer.css('borderBottomWidth') ) + 1,
                        $wrap_b_margin = -1 * $push_height;
 
                    $wrap.css('marginBottom', $wrap_b_margin );
                    $push.css('height', $push_height );
                }
 
                render_sticky_footer();
                resize_body_html(50);
 
                $(window).resize(function(){
                    setTimeout( function(){
                        // re-render on resizing only if an "interesting" resing occurred
                        if ( Math.abs($(window).width() - $window_width) > 50 ){
                            render_sticky_footer();
                            $window_width = $(window).width();
                        }
                        resize_body_html(50);
                    }, 100);
                });
            }(window.jQuery);
         });    
    </script>
<?php
}