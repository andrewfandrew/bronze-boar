<?php


/*
Plugin Name: Animated SVG logo
Description: I got the technique here: http://www.themesandco.com/snippet/creating-a-animated-svg-based-on-your-site-title/
Author: Andrew Farquharson
Author URI: http://andrewfarquharsonproject.org.uk
*/


add_filter('tc_logo_img_display' , 'my_svg_animated_logo' , 10 , 2);
function my_svg_animated_logo( $html, $filter_args ) {
    ?>
    
    <?php
        <div class="<?php echo $filter_args['logo_class'] ?> svg-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ) ?>">
                <svg width="66" height="60">
                  <g transform="translate(0,0)">
                    <text id="TextElement" x="0" y="0" style="font-family:Verdana;font-size:14px; visibility:hidden" fill="#483D65"> <?php echo esc_attr( get_bloginfo( 'name' ) )  ?>
                      <set attributeName="visibility" attributeType="CSS" to="visible" begin="0s" dur="1s" fill="freeze" />
                      <animateMotion path="M 0 0 L 0 70" begin="0s" dur="1s" fill="freeze" />
                      <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="-30" to="0" begin="0s" dur="1s" fill="freeze" />
                      <animateTransform attributeName="transform" attributeType="XML" type="scale" from="1" to="3" additive="sum" begin="0s" dur="1s" fill="freeze" />
                    </text>
                  </g>
                  No-support
                </svg>
            </a>
        </div>
        <div class="logo-fallback">
         <?php echo $html ?>
        </div>
    <?php
}
 
add_filter('tc_logo_text_display' , 'my_svg_animated_text' , 10 , 2);
function my_svg_animated_text( $html, $logo_class ) {
    ?>
    <div class="<?php echo $logo_class ?> svg-logo pull-left">
        <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ) ?>">
            <svg width="66" height="60">
              <g transform="translate(0,0)">
                <text id="TextElement" x="0" y="0" style="font-family:Verdana;font-size:14px; visibility:hidden;" fill="#483D65"> <?php echo esc_attr( get_bloginfo( 'name' ) )  ?>
                  <set attributeName="visibility" attributeType="CSS" to="visible" begin="0s" dur="1s" fill="freeze" />
                  <animateMotion path="M 0 0 L 0 70" begin="0s" dur="1s" fill="freeze" />
                  <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="-30" to="0" begin="0s" dur="1s" fill="freeze" />
                  <animateTransform attributeName="transform" attributeType="XML" type="scale" from="1" to="3" additive="sum" begin="0s" dur="1s" fill="freeze" />
                </text>
              </g>
               No-support
            </svg>
        </a>
    </div>
    
  <div class="logo-fallback">
         <?php echo $html ?>
    </div>
    <?php
} 

?> 


    <div class="logo-fallback">
         <?php echo $html ?>
    </div>
    <?php
}
