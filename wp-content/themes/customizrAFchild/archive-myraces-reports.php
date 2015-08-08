<?php
/**
 *
 Template name: Archive My Races
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
                        <!-- Add a hero unit to the top of the archive page -->
                        <div class="hero-unit">
			   
			<!-- AF: lets try nesting this header with subtext --> 
			<?php
			       echo  '<div class="page-header">';
    			       echo '<h2>Race reports <small>Torill\'s race experiences</small></h2>';
   				echo '</div></div>';
			 
			?>
				
		<?php echo '<hr class="featurette-divider __after_loop"></hr>'; ?>                
                
                
                
                 <?php query_posts('post_type=myraces&posts_per_page=5&paged='. get_query_var('paged')); ?>
                
                
                    
                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>
          
               
                        <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>

                            <article <?php tc__f('__article_selectors') ?>>
                                <?php do_action( '__loop' ); ?>
                            </article>
                        
                        <?php endif; ?>
                        
                        <?php if ( have_posts() && !is_404() ) : ?>
                        
                        <!-- AF: The next lines query on the custom date field, ie the one with the key start_date of the myraces post type. -->
                         <?php                         
			 $today = date('Y-m-d');
                         $args= array('post_type'=> 'myraces', 'posts_per_page'=> 15, 'meta_key'=> 'start_date', 
                         'meta_value'=> '20150101', 'meta_compare'=> '<', 'orderby'=> 'meta_value', 'order'=> 'DESC');
                          query_posts( $args ); 
                          ?>
                        
       <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                               
                                <?php the_post(); ?>
                                
                                <?php echo '<div class="row-fluid"><div class="span11 offset1">'; ?>
                                                               
                                <?php do_action ('__before_article') ?>
                                    <article <?php tc__f('__article_selectors') ?>>
                                             
                                        <?php do_action( '__loop' ); ?> 
                                        				
					<?php
			
					echo '<dl class="dl-horizontal">';
					
					 if( get_field( 'start_date') )
					{
						echo '<dt><p>Start date</p></dt><dd>' . 	get_field('start_date');
						echo '</dd>';
					}

					if( get_field( 'race_country') )
					{
						echo '<dt><p>Race country</p></dt><dd>' . get_field('race_country');
						echo '</dd>';
					}
					
				
					if( get_field( 'race_city_town') )
					{
						echo '<dt><p>Race City or Town</p></dt><dd>' . get_field('race_city_town');
						echo '</dd></dl></br></br>';
				
					}
				
					

					echo '<div class="span11 offset1"><a href="' . get_permalink() . '" class="btn btn-default btn-xs" role="button">see more</a>' . '</div></div></div>';
					
					
					echo '<hr class="featurette-divider __after_loop"></hr>';
								
					?>
					
				
					<?php
					/**

					if( get_field( 'finish_date') )
					{
						echo '<div class="entry-content"><h4>Finish date</h4>' . get_field('finish_date') . '</div>';
					}
					
					
					if( get_field( 'reason_for_doing') )
					{
						echo '<div class="entry-content"><h4>Reason for doing</h4>' . get_field('reason_for_doing') . '</div>';
					}
					
					if( get_field( 'race_duration') )
					{
						echo '<div class="entry-content"><h4>Race duration</h4>' . get_field('race_duration') . '</div>';
					}
					
					if( get_field( 'race_terrain') )
					{
						echo '<div class="entry-content"><h4>Race terrain</h4>' . get_field('race_terrain') . '</div>';
					}
					
					if( get_field( 'web_site') )
					{
						echo '<div class="entry-content"><h4>Web sites</h4>' . get_field('web_site') . '</div>';
					}
					
					if( get_field( 'location_on_map') )
					{
						echo '<div class="entry-content"><h4>Location on map</h4>' . get_field('location_on_map') . '</div>';
					}
					*/
					?>
                                       
                                      
                                   <?php echo '<br></br>'; ?> 
                                        
                                        
                                                                                 
                                                                 
                                    </article>
                                <?php do_action ('__after_article') ?>
                                
                            <?php endwhile; ?>

                        <?php endif; ##end if have posts ?>

                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->
                
                
                <?php wp_reset_query(); ?>
                

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>