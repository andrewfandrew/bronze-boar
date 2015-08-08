<?php
/*
Template Name: Trial template bootstrap
*/
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">


         
         
         <img src="/afsitebuild/bagheera1.jpg" class="img-polaroid">  
       <ul class="nav nav-tabs nav-stacked">
     <li class="active">
<a href="#">Home</a>
</li>
<li><a href="#">...</a></li>
<li><a href="#">...</a></li>
    </ul>



      
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>