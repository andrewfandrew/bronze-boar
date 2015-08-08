<?php
/**
 *
 Template Name: AF SVG test
 * @package Customizr
 * @since Customizr 1.0
 */
?>


<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
        <div class="row">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>
                
                <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">
                    
<svg xmlns="http://www.w3.org/2000/svg"
xmlns:xlink="http://www.w3.org/1999/xlink">
<script><![CDATA[
function modify(){
 for (var i=0;i<3;i++){
  S=document.getElementById("s"+i)
 S.setAttributeNS(null,"stop-color",color())
  }
}
function color(){
 r=Math.random()*4096
 return "#"+Math.floor(r).toString(16)
} 
]]></script>
<linearGradient id="LG">
 <stop id="s0" offset="0" stop-color="grey"/>
 <stop id="s1" offset=".5" stop-color="lightgrey"/>
 <stop id="s2" offset="1" stop-color="grey"/>
</linearGradient>
<g id="MyGroup" onclick="modify()">
 <rect x="30" y="40" width="230" height="30" 
 fill="#ddd" stroke="black" />
 <text id="T" x="50" y="63" font-size="18pt" 
 fill="black">
 Random Gradient</text>
</g>
 <rect x="30" y="70" width="230" height="70" 
 fill="url(#LG)" stroke="black" />
</svg>      

                </div><!--.article-container -->

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>