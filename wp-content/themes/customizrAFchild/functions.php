<?php

// add torill's sponsors logos below the header
add_action( '__after_header' , 'add_sponsor_logos', 0);
function add_sponsor_logos() {
echo '<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />';
echo '<div class="container sponsor">';
echo '<div class="row-fluid">';
echo '<div class="span10 offset1">';
echo '<a href="http://www.x-kross.se"><img src="/afsitebuild/sziolsxkrosslogl.jpg" alt="the logo of X-kross sports equipment company" height="80" width="134" hspace="5" class="img-polaroid"></a>';
echo '<a href="http://www.altrarunning.com"><img src="/afsitebuild/altra-logo.png" alt="logo of Altra the sports company" height="79" width="198" hspace="7" class="img-polaroid"></a>';
echo '<a href="http://www.seger.se/en/home.html"><img src="/afsitebuild/Logo-eps-1.png" alt="the logo of the Seger running company" height="59" width="90" hspace="5" class="img-polaroid"></a>';
echo '<a href="http://www.tomtom.com/en_gb/products/your-sports/running/tomtom-runner-cardio-gps-watch/white"><img src="/afsitebuild/TomTom_CMYK_logo.jpg" alt="the logo of the Tomtom electronics company" height="34" width="175" hspace="5" class="img-polaroid"></a>';
echo '<a href="http://checkmylevel.com/"><img src="/afsitebuild/checkmylevel.png" alt="the logo of Check My Level running company" height="48" width="114" hspace="5" class="img-polaroid"></a>';
echo "</div></div></div></div></br>";
echo '<hr />';
}

// add svg animation and other elements
/*add_action( '__after_header' , 'add_svg_one', 0);
function add_svg_one() {

echo <<<EOT
<div class="container">
<div id="hideaway">
<div class="row-fluid">

<svg height=10% width=100%>
  <g fill="none" stroke="#CCE6FF">
    <path stroke-width="3" d="M5 55 l1200 0" />
  </g>
  Sorry, your browser does not support inline SVG.
</svg>
</div></div>
EOT;
}
add_action( '__after_header' , 'add_svg_two', 0);
function add_svg_two() {
if ( is_front_page()) {
echo <<<EOU
            <!-- the animated text for the countdown timer, the heading -->  
<div id="hideaway">
<div class="row-fluid" style="margin-bottom: 7%;">
<div class="span8 offset4">   
                   <svg width=100% height=30%>
  <g transform="translate(0,0)"> 
<text id="TextElement" x="0" y="0" style="font-family: 'Verdana';font-size:14px; visibility:hidden"; fill="steelblue">48 Hours WR attempt
      <set attributeName="visibility" attributeType="CSS" to="visible" begin="0s" dur="8s" fill="freeze" />

      <animateMotion path="M 0 0 L 0 80" begin="0s" dur="8s" fill="freeze" />
      <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="-40" to="0" begin="0s" dur="6s" fill="freeze" /> 
      <animateTransform attributeName="transform" attributeType="XML" type="scale" from="1" to="2" additive="sum" begin="3s" dur="8s" fill="freeze" /> 
    </text> 
  </g> 
  Sorry, your browser does not support inline SVG.
</svg>
</div></div></div></div>
<div class="container">
<div class="row-fluid" style="margin-bottom: 8%;">
<div class="span10 offset2">
<a href="http://torillfonn.com/blog/my-races/world-record-attempt-at-skovde-ultrafestival-48h/"><img src="/afsitebuild/808state2.jpg" class="img-responsive img-rounded" hspace="48" alt="48 hours state of mind image"></a>
</div></div></div>
EOU;
} else {
echo <<<EOU
            <!-- the animated text for the countdown timer, the heading -->  
<div class="container" style="margin-bottom: 10%;">
<div id="hideaway">
<div class="row-fluid">
<div class="span8 offset4">   
                   <svg width=100% height=30%>
  <g transform="translate(0,0)"> 
<text id="TextElement" x="0" y="0" style="font-family:"Impact", Charcoal, sans-serif;font-size:8px; visibility:hidden"; fill="darkslate">&#171;It is time to start running&#187; Skövde Ultrafestival 48h
      <set attributeName="visibility" attributeType="CSS" to="visible" begin="0s" dur="6s" fill="freeze" />

      <animateMotion path="M 0 0 L 0 80" begin="0s" dur="6s" fill="freeze" />
      <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="-40" to="0" begin="0s" dur="6s" fill="freeze" /> 
      <animateTransform attributeName="transform" attributeType="XML" type="scale" from="1" to="2" additive="sum" begin="3s" dur="6s" fill="freeze" /> 
    </text> 
  </g> 
  Sorry, your browser does not support inline SVG.
</svg>
</div></div></div>

EOU;
}
}


 add_action( '__after_header' , 'add_svg_three', 0);
function add_svg_three() { 
echo <<<EOV

<div class="container">
<div id="hideaway">
<div class="row-fluid" margin-bottom=30%>   
          
                <svg height="110" width=100%>
  <g fill="none" stroke="#CCE6FF">
    <path stroke-width="2" stroke-linecap="round" stroke-dasharray="10,10" d="M5 50 l1200 0" />
    
    
  </g>
</svg>
</div></div></div>

EOV;

}
*/



/* AF: normally you create a single archive template for a custom post type. It is named according to template hierarchy.
 * But this illustrates a very flexible approach to pairing up custom templates with particular pages. The pairing of templates to pages
 * seems to override configuration done through admin front end. 
 */
/*
add_filter( 'template_include', 'myraces_2014_page_template', 99 );

function myraces_2014_page_template( $template ) {

	if ( is_page( 1579 )  ) {
		$new_template = locate_template( array( 'archive-myraces-2014.php' ) );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}

add_filter( 'template_include', 'myraces_2015_page_template', 99 );

function myraces_2015_page_template( $template ) {

	if ( is_page( 1571 )  ) {
		$new_template = locate_template( array( 'archive-myraces-2015.php' ) );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}

add_filter( 'template_include', 'myraces_reports_page_template', 99 );

function myraces_reports_page_template( $template ) {

	if ( is_page( 1586 )  ) {
		$new_template = locate_template( array( 'archive-myraces-reports.php' ) );
		if ( '' != $new_template ) {
			return $new_template ;
		}
	}

	return $template;
}
*/

// Added by AF Dimanche, le dix-neuf Octobre 2014
// CREATE UNIX TIME STAMP FROM DATE PICKER
/**
function custom_unixtimesamp ( $post_id ) {
    if ( get_post_type( $post_id ) == 'myraces' ) {
	$startdate = get_post_meta($post_id, 'start_date', true);

		if($startdate) {
			$dateparts = explode('/', $startdate);
			$newdate1 = strtotime(date('d.m.Y', strtotime($dateparts[2].'/'.$dateparts[1].'/'.$dateparts[0])));
			update_post_meta($post_id, 'unixstartdate', $newdate1  );
		}
	}
}
add_action( 'save_post', 'custom_unixtimesamp', 100, 2);
*/


// AF: adding support for the jquery countdown timer
// The 'is_home' conditional tag ensures the script is added to header of the home page only
/*
function af_scripts_method() {
	if( is_home() ) { wp_enqueue_script(
		'countdown',
		get_stylesheet_directory_uri() . '/js/countdown.js',
		array('jquery')
	);
	}
}
*/

function af_scripts_method() {
	wp_enqueue_script(
		'countdown',
		get_stylesheet_directory_uri() . '/js/countdown.js',
		array('jquery')
	);
}
add_action('wp_enqueue_scripts', 'af_scripts_method');

/* Add meta line to pages to overcome media query bug in HTC and samsung mobile devices */
add_action('wp_head', 'media_query_fix');
function media_query_fix() {
echo '<meta name="viewport" content="width=device-width, initial-scale=1"/>';

}

// AF: customise the footer credits
add_filter('tc_credits_display', 'my_custom_credits');
function my_custom_credits(){ 
$credits = '';
$newline_credits = 'Customised by <a href="http://cactusblossomitservices.com/" rel="nofollow">Cactus Blossom IT Services Ltd</a>';
return '
<div class="span4 credits">
    		    	<p> &middot; &copy; '.esc_attr( date( 'Y' ) ).' <a href="'.esc_url( home_url() ).'" title="'.esc_attr(get_bloginfo()).'" rel="bookmark">'.esc_attr(get_bloginfo()).'</a> &middot; '.($credits ? $credits : 'Designed by <a href="http://www.presscustomizr.com/">Press Customizr</a>').' &middot;'.($newline_credits ? '<br />&middot; '.$newline_credits.' &middot;' : '').'</p>		</div>';
}






