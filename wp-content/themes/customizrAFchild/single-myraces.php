<?php
/**
 * The main template file. Includes the loop.
 *
 *
 * @package Customizr
 * @since Customizr 1.0
 */
?>


<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
         <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>
                
                <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">
                
                
                                       <!-- AF: The following classes and HTML is gathered from online documentation on Twitter Bootstrap 2 web site. -->
                       
                   
			   
			<!-- AF: lets try nesting this header with subtext according to Bootstrap 2 docs -->  
				<?php
				echo '<div class="hero-unit">';
				echo  '<div class="page-header">';
				echo '<h2>Race Details <small></small></h2>';
   				echo '</div></div>';
			?>
                    
                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>

                        <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>
                        
                                <article <?php tc__f('__article_selectors') ?>>
                                <?php do_action( '__loop' ); ?>
                                              
                                </article>
                            
                        <?php endif; ?>

                        <?php if ( have_posts() && !is_404() ) : ?>
                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                                <?php the_post(); ?>
                                
                                <!-- AF: the next snippet indents the myrace post title along with the whole dl-horizontal div -->
                                 <?php echo '<div class="row-fluid"><div class="span11 offset1">'; ?>

                                <?php do_action ('__before_article') ?>
                                    <article <?php tc__f('__article_selectors') ?>>
                                        <?php do_action( '__loop' ); ?>
                                        
                                        
                                        <?php
                                	                                 	
					echo '<dl class="dl-horizontal">';
					


					 if( get_field( 'start_date') )
					{
					$date = DateTime::createFromFormat('Ymd', get_field('start_date'));					
						echo '<dt><p>Start date:</p></dt><dd>' . $date->format('d/m/Y');
						echo '</dd><hr id="other">';
					}



					if( get_field( 'finish_date') )
					{
					$date = DateTime::createFromFormat('Ymd', get_field('finish_date'));					
						echo '<dt><p>Finish date:</p></dt><dd>' . $date->format('d/m/Y');
						echo '</dd><hr id="other">';
					}
					

					if( get_field( 'race_country') )
					{
						echo '<dt><p>Race country:</p></dt><dd>' . get_field('race_country');
						echo '</dd>';
					}
					
				
					if( get_field( 'race_city_town') )
					{
						
						echo '<dt><p>Race City or Town:</p></dt><dd>' . get_field('race_city_town');
						echo '</dd><hr class="featurette-divider __before_content" id="other">';
				
					}
				

					
					if( get_field( 'reason_for_doing') )
					{
						echo '<dt><p>Reason for doing:</p></dt><dd>' . get_field('reason_for_doing');
						echo '</dd><hr class="featurette-divider __before_content" id="other">';
					}
					
					
					
					if( get_field( 'race_duration') )
					{
						echo '<dt><p>Race duration:</p></dt><dd>' . get_field('race_duration');
						echo '</dd>';
					}
					
					if( get_field( 'race_terrain') )
					{
					echo '<dt><p>Race terrain:</p></dt><dd>' . get_field('race_terrain');
						echo '</dd><hr class="featurette-divider __before_content" id="other">';
					}
					
					
				
					
					if( get_field( 'web_site') )
					{
						echo '<dt><p>Web site:</p></dt><dd>' . get_field('web_site');
						echo '</dd>';
					}
					
					
					//if( get_field( 'location_on_map') )
					//{
					//	echo '<dt><p>Location on map:</p></dt><dd>' . get_field('location_on_map');
					//	echo '</dd>';
					//}
					
					
					if( get_field( 'race_report') )
					{
					echo '<dt><p>Race report:</p></dt><dd>' . get_field('race_report');
						echo '</dd></dl>';
					}
					
                                      ?>  
                                      
                                      
                                        
                                        
                                        
                                        
                                        
                                    </article>
                                <?php do_action ('__after_article') ?>

                            <?php endwhile; ?>

                        <?php endif; ##end if have posts ?>

                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>