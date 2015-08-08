<?php
/**
 *
 Template name: Archive My Races 2014
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


                                        
                        <!-- AF: The following classes and HTML is gathered from online documentation on Twitter Bootstrap 2 web site. -->
                       
                   
			   
			<!-- AF: lets try nesting this header with subtext according to Bootstrap 2 docs -->  
		<div class="row-fluid">
		<div class="span6 offset1">	
			<div class="hero-unit">
			<div class="page-header">
				<h2>Past races <small> </small></h2>
   				</div></div>
			</div>	
		                
                
                
                
                 <?php //query_posts('post_type=myraces&posts_per_page=15&paged='. get_query_var('paged')); ?>
                <!-- remove query_posts and replace with WP_Query: commenting out query_posts code -->

                <?php 
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $today = date('Ymd');
                $args= array('post_type'  => 'myraces', 'posts_per_page' => 7, 'paged' => $paged, 
                'meta_query' => array(
        	'relation' => 'AND',
        		array(
            		'key'       => 'start_date',
            		'compare'   => '>=',
            		'value'     => '140101',
            		'type'      => 'DATE'
        			),
        		array(
            		'key'       => 'start_date',
            		'compare'   => '<=',
            		'value'     => '150101',
            		'type'      => 'DATE'
        			
    				)),

                
                'meta_key' => 'start_date', 'orderby' => 'meta_value_num', 'order' => 'ASC');
                // The Query
                $the_query = new WP_Query( $args ); ?>
                    
                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>
          
               
                        <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>

                            <article <?php tc__f('__article_selectors') ?>>
                                <?php do_action( '__loop' ); ?>
                            </article>
                        
                        <?php endif; ?>
                        
                        <?php //if ( have_posts() && !is_404() ) : ?>
                        <?php if ( $the_query->have_posts() && !is_404() ) : ?> 
                        
                        <!-- AF: The next lines query on the custom date field, ie the one with the key start_date of the myraces post type. -->
                        <!-- AF: NB: I have added a function to the functions.php to convert the start_date field to type unixtimestamp 
                        in order to enable correcting sorting. This is because sorting has not been working using the default date type. -->

                        
         
                            <?php //while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                            <?php while ( $the_query->have_posts() ) : ?>
                                <?php //the_post(); ?>
                            <?php $the_query->the_post(); ?>
                                
                                <?php echo '<div class="row-fluid"><div class="span11 offset1">'; ?>
                                                               
                                <?php do_action ('__before_article') ?>
                                    <article <?php tc__f('__article_selectors') ?>>
                                             
                                        <?php do_action( '__loop' ); ?> 
                                        				
					<?php
			
					echo '<dl class="dl-horizontal" id="allraces">';
					
					 if( get_field( 'start_date') )
					{
					$date = DateTime::createFromFormat('Ymd', get_field('start_date'));					
						echo '<dt><p>Start date:</p></dt><dd>' . $date->format('d/m/Y');
						echo '</dd><hr id="orange">';
					}
					

					if( get_field( 'race_country') )
					{
						echo '<dt><p>Race country:</p></dt><dd>' . get_field('race_country');
						echo '</dd><hr id="orange">';
					}
					
				
					if( get_field( 'race_city_town') )
					{
						echo '<dt><p>Race City or Town:</p></dt><dd>' . get_field('race_city_town');
						echo '</dd></dl></br></br>';
				
					}
				
					

					echo '<div class="span11 offset1"><a href="' . get_permalink() . '" class="btn btn-default btn-xs" role="button">see more</a>' . '</div></div></div>';
					
					
													
					?>
					
				

                                       
                                      
                                   <?php echo '<br></br>'; ?> 
                                        
                                        
                                                                                 
                                                                 
                                    </article>
                                <?php do_action ('__after_article') ?>
                                
                            <?php endwhile; ?>
                            
                            
                    <!-- AF: the start of the pagination section of the template
                    First the boilerplate heading  -->
                    <nav id="nav-below" class="navigation" role="navigation">                            

            <h3 class="assistive-text">
                Navigation           
            </h3>
            
            <?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>

            <ul class="pager">
            <li class="previous">
            <span class="nav-previous">
                 <?php echo get_next_posts_link( 'Earlier Races', $the_query->max_num_pages ); // display older posts link ?>                    
            </span></li>
            <li class="next">
            <span class="nav-next">
                      <?php echo get_next_posts_link( 'Later Races', $the_query->max_num_pages ); // display older posts link ?>                    
            </span></li></ul>
              
          </nav>
      
<?php } ?>

                        <?php endif; ##end if have posts ?>

                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->
                
                
                <?php // wp_reset_query(); ?>
                <?php wp_reset_postdata(); ?>

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>