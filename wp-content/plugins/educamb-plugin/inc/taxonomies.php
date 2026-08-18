<?php

namespace EDUCAMBPLUGIN\Inc;


use EDUCAMBPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpeducamb' ),
			'singular_name'     => _x( 'Project Category', 'wpeducamb' ),
			'search_items'      => __( 'Search Category', 'wpeducamb' ),
			'all_items'         => __( 'All Categories', 'wpeducamb' ),
			'parent_item'       => __( 'Parent Category', 'wpeducamb' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeducamb' ),
			'edit_item'         => __( 'Edit Category', 'wpeducamb' ),
			'update_item'       => __( 'Update Category', 'wpeducamb' ),
			'add_new_item'      => __( 'Add New Category', 'wpeducamb' ),
			'new_item_name'     => __( 'New Category Name', 'wpeducamb' ),
			'menu_name'         => __( 'Project Category', 'wpeducamb' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpeducamb' ),
			'singular_name'     => _x( 'Service Category', 'wpeducamb' ),
			'search_items'      => __( 'Search Category', 'wpeducamb' ),
			'all_items'         => __( 'All Categories', 'wpeducamb' ),
			'parent_item'       => __( 'Parent Category', 'wpeducamb' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeducamb' ),
			'edit_item'         => __( 'Edit Category', 'wpeducamb' ),
			'update_item'       => __( 'Update Category', 'wpeducamb' ),
			'add_new_item'      => __( 'Add New Category', 'wpeducamb' ),
			'new_item_name'     => __( 'New Category Name', 'wpeducamb' ),
			'menu_name'         => __( 'Service Category', 'wpeducamb' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpeducamb' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpeducamb' ),
			'search_items'      => __( 'Search Category', 'wpeducamb' ),
			'all_items'         => __( 'All Categories', 'wpeducamb' ),
			'parent_item'       => __( 'Parent Category', 'wpeducamb' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeducamb' ),
			'edit_item'         => __( 'Edit Category', 'wpeducamb' ),
			'update_item'       => __( 'Update Category', 'wpeducamb' ),
			'add_new_item'      => __( 'Add New Category', 'wpeducamb' ),
			'new_item_name'     => __( 'New Category Name', 'wpeducamb' ),
			'menu_name'         => __( 'Testimonials Category', 'wpeducamb' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'testimonials', $args );
		
		
		//Instructors Taxonomy Start
		$labels = array(
			'name'              => _x( 'Instructors Category', 'wpeducamb' ),
			'singular_name'     => _x( 'Instructors Category', 'wpeducamb' ),
			'search_items'      => __( 'Search Category', 'wpeducamb' ),
			'all_items'         => __( 'All Categories', 'wpeducamb' ),
			'parent_item'       => __( 'Parent Category', 'wpeducamb' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeducamb' ),
			'edit_item'         => __( 'Edit Category', 'wpeducamb' ),
			'update_item'       => __( 'Update Category', 'wpeducamb' ),
			'add_new_item'      => __( 'Add New Category', 'wpeducamb' ),
			'new_item_name'     => __( 'New Category Name', 'wpeducamb' ),
			'menu_name'         => __( 'Instructors Category', 'wpeducamb' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'instructors_cat' ),
		);


		register_taxonomy( 'instructors_cat', 'instructors', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpeducamb' ),
			'singular_name'     => _x( 'Faqs Category', 'wpeducamb' ),
			'search_items'      => __( 'Search Category', 'wpeducamb' ),
			'all_items'         => __( 'All Categories', 'wpeducamb' ),
			'parent_item'       => __( 'Parent Category', 'wpeducamb' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpeducamb' ),
			'edit_item'         => __( 'Edit Category', 'wpeducamb' ),
			'update_item'       => __( 'Update Category', 'wpeducamb' ),
			'add_new_item'      => __( 'Add New Category', 'wpeducamb' ),
			'new_item_name'     => __( 'New Category Name', 'wpeducamb' ),
			'menu_name'         => __( 'Faqs Category', 'wpeducamb' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'faqs', $args );
		
		
	}
	
}
