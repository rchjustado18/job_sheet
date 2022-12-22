<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
	
	/*** CSS ***/
	wp_enqueue_style( 'site-styles', get_stylesheet_directory_uri() .'/assets/css/site-styles.css', array(), null, 'all' );
	wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() .'/assets/vendors/slick-1.8.1/slick/slick.css', array(), null, 'all' );
	wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() .'/assets/vendors/slick-1.8.1/slick/slick-theme.css', array(), null, 'all' );
	
	/*** JS ***/
	wp_enqueue_script( 'site-scripts', get_stylesheet_directory_uri(). '/assets/js/site-scripts.js', array(), time(), true );
	wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri(). '/assets/vendors/slick-1.8.1/slick/slick.min.js', array(), time(), true );

    wp_enqueue_script(
		'customjs',get_stylesheet_directory_uri() . '/function.js','1.0.0'
	);
	
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


// Filter the excerpt length to 20 words.

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// Trim Title Word to 6 words
function limit_word_count($title) {
    $len = 6; //change this to the number of words
    if (str_word_count($title) > $len) {
        $keys = array_keys(str_word_count($title, 2));
        $title = substr($title, 0, $keys[$len]);
    }
    return $title;
}
add_filter('the_title', 'limit_word_count');

// Latest Blog Shortcode
function latest_blog(){
    $output = '';
	
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'orderby' => 'title', 
        'order' => 'ASC',
	);
	
	$posts = new WP_Query( $args );
	
	 if ( $posts -> have_posts() ) :
	     
        $output .= '<div class="latest__blog-container">';
        
			while ( $posts -> have_posts() ) : $posts->the_post();
			
			    $title = get_the_title($post->ID);
    			$image = get_the_post_thumbnail_url($post->ID, 'full');
    			$link = get_permalink();
				$text = get_the_excerpt();
    	
                $output .= '<div class="latest__blog-col">';
        			$output .= '<div class="latest__blog-image" style="background: url('. $image .');"></div>';
					$output .= '<div class="latest__blog-wrap">';	
						$output .= '<h3>'. $title .'</h3>';
						$output .= '<p>'. $text .'</p>';
						$output .= '<a href="'. $link .'">Read More</a>';	
					$output .= '</div>';
                $output .= '</div>';
			endwhile;
			
        $output .= '</div>';
        
	 endif;

	wp_reset_postdata();

	return $output;
}
add_shortcode('latest-blog','latest_blog');

// Jobs Custom Post Type
function jobs() {

	$labels = array(
		'name'                  => _x( 'Jobs', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Jobs', 'text_domain' ),
		'name_admin_bar'        => __( 'Jobs', 'text_domain' ),
		'archives'              => __( 'Job Archives', 'text_domain' ),
		'attributes'            => __( 'Job Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Job:', 'text_domain' ),
		'all_items'             => __( 'All Jobs', 'text_domain' ),
		'add_new_item'          => __( 'Add New Job', 'text_domain' ),
		'add_new'               => __( 'Add Job', 'text_domain' ),
		'new_item'              => __( 'New Job', 'text_domain' ),
		'edit_item'             => __( 'Edit Job', 'text_domain' ),
		'update_item'           => __( 'Update Job', 'text_domain' ),
		'view_item'             => __( 'View Job', 'text_domain' ),
		'view_items'            => __( 'View Jobs', 'text_domain' ),
		'search_items'          => __( 'Search Job', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Job', 'text_domain' ),
		'description'           => __( 'Jobs', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'job_categories', 'job_tags' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'menu_icon'   			=> 'dashicons-businessman',
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'jobs', $args );

}
add_action( 'init', 'jobs', 0 );

// Jobs Custom Taxonomy Categories
function jobs_taxonomyCategories() {
    register_taxonomy(
        'job_categories',  
        'jobs',           
        array(
            'hierarchical' => true,
			'supports'	   => array( 'thumbnail' ),
            'label' 	   => 'Categories', 
            'query_var'    => true,
            'rewrite' => array(
                'slug' => 'job-categories',    
                'with_front' => false  
            )
        )
    );
}
add_action( 'init', 'jobs_taxonomyCategories');

// Jobs Custom Taxonomy Tags
function jobs_taxonomyTags() {
    register_taxonomy(
        'job_tags',  
        'jobs',           
        array(
            'hierarchical' => false,
            'label' => 'Tags', 
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'job-tags',    
                'with_front' => false  
            )
        )
    );
}
add_action( 'init', 'jobs_taxonomyTags');


function blogBread_crumbs(){
    $content = '';
	
		$title = get_the_title($post->ID);
		$link = get_permalink($post->ID);
	
	$content .='<div class="blog__breadcrumbs-container">';
    	$content .= '<a class="blog__breadcrumbs-parenttitle" href="/blog/" rel="nofollow">Blog</a> > <a class="blog__breadcrumbs-title" href="'. $link .'">'. $title .'</a>';
	$content .='</div>';
    
    return $content;
}

add_shortcode('blog-bread-crumbs','blogBread_crumbs');

function offers(){
    $content = '';
	
		// Check rows existexists.
			if( have_rows('offers_details') ):

				$content .='<div class="offer_wrapper-bg">';

			    // Loop through rows.
			    while( have_rows('offers_details') ) : the_row();

			        // Load sub field value.
			        $image = get_sub_field('offer_image');
			        $title = get_sub_field('offer_title');
			        $description = get_sub_field('offer_description');

			        $content .='<div class="offer_wrapper">';
				        $content .='<div class="offer_wrapper-details">';
				        	$content .='<img src="'. $image .'">';
				        	$content .='<h3>'. $title .'</h3>';
				        $content .='</div>';

				        $content .='<div class="offer_wrapper-desc">';
				        	$content .='<p>'. $description .'</p>';
			        	$content .='</div>';
			        $content .='</div>';

			    // End loop.
			    endwhile;
				$content .='</div>';
			 
			endif;
    
    return $content;
}

add_shortcode('offers-info','offers');

// Testimonials
add_action('acf/init', 'testimonial_acf_op_init');
function testimonial_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Testimonials'),
            'menu_title'    => __('Testimonials'),
            'menu_slug'     => 'testimonials',
            'capability'    => 'edit_posts',
			'icon_url'		=> 'dashicons-testimonial',
            'redirect'      => false
        ));
    }
}


// Testimonials Shortcode
function showAll_testimonial(){
	$output ="";
	
	if( have_rows('testimonial_details','option') ):
		$output .='<div class="testimonial__slider-container">';
		while( have_rows('testimonial_details','option') ) : the_row();
	
			$name = get_sub_field('testimonial_name','option');
			$content = get_sub_field('testimonial_content','option');
			
			$output .='<div class="testimonial__slider-col">';
				$output .='<p>"'.$content.'"</p>';
				$output .='<h3>'.$name.'</h3>';
			$output .='</div>';
	
		endwhile;
		$output .='</div>';
	endif;

	return $output;
}
add_shortcode('show-all-testimonial','showAll_testimonial');

// Jobs Category List Shortcode
function jobsCategory_list(){
	$output ="";
	
		$custom_terms = get_terms('job_categories');
		
		foreach($custom_terms as $custom_term) {
        wp_reset_query();
        $args = array('post_type' => 'jobs',
						'tax_query' => array(
							array(
								'taxonomy' => 'job_categories',
								'field' => 'slug',
								'terms' => $custom_term->slug,
							),
						),
					 );
			$loop = new WP_Query($args);
			
         	$image = get_field( 'jobs_category_thumbnail', $custom_term );
			$term_link = get_term_link( $custom_term->term_id, "job_categories" );
			
			$output .='<div class="job__category-col">';
			
			if($loop->have_posts()) {
				
				$output .='<a href="'. $term_link .'">';
					$output .='<img src="'. $image .'">';
					$output .='<h4>'.$custom_term->name.'</h4>';
				$output .='</a>';
         		}
			
			$output .='</div>';
			
        	wp_reset_postdata(); 
    	}
		
// 		$jobs_select = get_field('jobs_category_thumbnail', 'option');
		
	
// 		foreach($jobs_select as $js){
			
// 			$output .='<p>'. $js->name .'</p>';
// 		}
		
// 		var_dump($jobs_select);
	
	
	

// 		$types = get_terms( array(
// 			'taxonomy' => 'job_categories',
// 			'hide_empty' => true,
// 		) );

// 		foreach($types as $type) {
			
// 			$image = get_field('jobs_category_thumbnail', 'job_categories_' . $type->term_id . '' );

// 			if ( has_term( $type->term_id, 'job_categories')) {
				
// 				$output .='<img src="' . $image['url'] . '" /> ';
				
// 			}
// 		}

	
	return $output;
}
add_shortcode('jobs-category-list','jobsCategory_list');



// Job Categories Option
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Job Categories'),
            'menu_title'    => __('Job Categories'),
            'menu_slug'     => 'job_category_option',
            'capability'    => 'edit_posts',
						'icon_url'		  => 'dashicons-businessman',
            'redirect'      => false
        ));
    }
}

// Job Categories Option Select Shortcode
function jobsCategories_selected(){
	$output ="";
	
	
		$custom_terms = get_terms('job_categories');
	
		foreach($custom_terms as $custom_term) {
        wp_reset_query();
        $args = array('post_type' => 'jobs',
						'tax_query' => array(
							array(
								'taxonomy' => 'job_categories',
								'field' => 'slug',
								'terms' => $custom_term->slug,
							),
						),
					 );
			$loop = new WP_Query($args);
			
         	$image = get_field( 'jobs_category_thumbnail', $custom_term );
			
			if($loop->have_posts()) {
				
				$output .='<h4>'.$custom_term->name.'</h4>';
				$output .='<img src="'. $image .'">';

         	}
			
        	wp_reset_postdata(); 
    	}
	
	return $output;
}
add_shortcode('jobs-categories-selected','jobsCategories_selected');
