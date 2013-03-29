<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// let's create the function for the custom type
function custom_dictionary() { 
	// creating (registering) the custom type 
	register_post_type( 'dictionary', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => 'Definitions', /* This is the Title of the Group */
			'singular_name' => 'Definition Post', /* This is the individual type */
			'all_items' => 'All Definitions Posts', /* the all items menu item */
			'add_new' => 'Add New', /* The add new menu item */
			'add_new_item' => 'Add New Definition', /* Add New Display Title */
			'edit' =>  'Edit', /* Edit Dialog */
			'edit_item' => 'Edit Post Definitions', /* Edit Display Title */
			'new_item' => 'New Definition', /* New Display Title */
			'view_item' => 'View Definition', /* View Display Title */
			'search_items' => 'Search Definitions', /* Search Custom Type Title */ 
			'not_found' =>  'Nothing found in the Database.', /* This displays if there are no entries yet */ 
			'not_found_in_trash' => 'Nothing found in Trash', /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' =>  'This is the definitions post type', /* Custom Type Description */
			'public' => false,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'definition', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'definition', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'revisions')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'dictionary_cat');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_dictionary');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
    register_taxonomy( 'dictionary_cat', 
    	array('dictionary'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' =>  'Dictionary Categories', /* name of the custom taxonomy */
    			'singular_name' =>  'Dictionary Category', /* single taxonomy name */
    			'search_items' =>   'Search Dictionary Categories', /* search title for taxomony */
    			'all_items' =>  'All Dictionary Categories', /* all title for taxonomies */
    			'parent_item' =>  'Parent Dictionary Category', /* parent title for taxonomy */
    			'parent_item_colon' =>  'Parent Dictionary Category:', /* parent taxonomy title */
    			'edit_item' =>  'Edit Dictionary Category', /* edit custom taxonomy title */
    			'update_item' =>  'Update Dictionary Category', /* update title for taxonomy */
    			'add_new_item' =>  'Add New Dictionary Category', /* add new title for taxonomy */
    			'new_item_name' =>  'New Dictionary Category Name' /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'dictionary-cat' ),
    	)
    );   
    	

?>
