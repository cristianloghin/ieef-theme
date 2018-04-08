<?php
/**
 * ieef functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ieef
 */

	function get_part($name, $data)
	{
		$template_path = get_theme_root() . '/' . get_template();
		$module_dir = substr($name, 0, 3);
		require ($template_path . '/inc/' . $module_dir . '/' . $name );
	}

	function custom_body_class() {
		
		global $post;
		$taxonomy = get_taxonomy_template();

		if ( is_page() )
		{
			$id = 'page-' . $post->post_name;
			// get page template name
			$source = get_page_template_slug( $post->ID );
			$start = stripos($source, '-') + 1;
			$end = strripos($source, '.');
			$template = substr( $source, $start, $end - $start );
		}
		else if ( is_404() )
		{
			$id = 'page-404';
			$template = 'error';
		}
		else if ( $taxonomy != '' )
		{
			
			$start = strripos($taxonomy, '-') + 1;
			$end = strripos($taxonomy, 'location.php');
			$name = substr( $taxonomy, $start, $end - $start );
			$id = 'page-' . $name;
			$template = 'news_cases';
		}
		else if ( is_archive() )
		{
			$id = 'page-news';
			$template = 'page';
		}
		else
		{
			$id = 'post-' . $post->post_type;
			$template = 'post ' . $post->post_type;
		}
		
		if ( $template == '' )
		{
			$template = 'page';
		}

		echo 'id="' . $id . '" class="' . $template . '"';
	}

	function main_menu_sort($a, $b)
	{
		if ($a['position'] == $b['position'])
		{
			return 0;
		}
		if ($a['position'] > $b['position'])
		{
			return 1;
		}
		else
		{
			return -1;
		}
	}

	function get_main_menu()
	{
		$args = array(
			'post_status' => 'publish',
			'parent' => 0,
			'meta_key' => 'main_menu_add',
			'meta_value' => 'yes'
		);

		$pages = get_pages($args);
		$menu = array();

		foreach ( $pages as $page )
		{

			$val = array(
				'ID' => $page->ID,
				'name' => $page->post_name,
				'title' => $page->post_title,
				'link' => get_permalink( $page->ID ),
				'position' => get_field('main_menu_pos', $page->ID)
			);
			
			if( $val['name'] == 'case-studies')
			{
				$val['link'] .= 'ireland';
			}

			array_push($menu, $val);
		}

		usort($menu, 'main_menu_sort');
		return $menu;
	}

	function get_main_menu_class( $name )
	{
		global $post;

		if ( is_page() )
		{
			if ( $post->post_parent )
			{
				// is subpage
				$parent = get_post( $post->post_parent );
			
				if ( $parent->post_name == $name )
				{
					echo ' class="active"';
				}
			}
			else
			{
				// is not subpage
				if ( $post->post_name == $name )
				{
					echo ' class="active"';
				}
			}
		}
		else
		{
			$type = $post->post_type;

			if ( $type == 'cases' && $name == "case-studies")
			{
				echo ' class="active"';
			}
			if ( $type == 'news' && $name == "news")
			{
				echo ' class="active"';
			}
		}
	}

	function get_sub_menu_class( $id )
	{
		global $post;

		if ( is_page() && $post->post_parent )
		{
			// is subpage
			if ($post->ID == $id)
			{
				echo 'class="active"';
			}
		}
		else
		{
			// is not subpage
			// if the id is the first sub page
			$args = array(
				'child_of' => $post->ID, 
        		'sort_column' => 'menu_order', 
        		'sort_order' => 'asc'
			);
			$children = get_pages($args);
			$first_page_id = $children[0]->ID;
			if ($first_page_id == $id)
			{
				echo 'class="active"';
			}
		}
	}

	function get_people_class( $data ) {
		if ( $data['people_block_list_photo']['url'] != '' )
		{
			$class .= 'photo_top ';
		}
		else
		{
			$class .= 'clear_top ';
		}
		if ( $data['people_block_list_email'] != '' || $data['people_block_list_phone'] != '' )
		{
			if ( $data['people_block_list_email'] != '' && $data['people_block_list_phone'] != '' )
			{
				$class .= 'two_bottom ';
			}
			else
			{
				$class .= 'one_bottom ';
			}
		}
		else
		{
			$class .= 'clear_bottom ';
		}
		

		echo $class;
	}

	 add_theme_support( 'post-thumbnails', array( 'cases' ) );

	// Tools

	function show_var($var)
	{
		print '<pre>';
		print_r($var);
		print '</pre>';
	}

?>
