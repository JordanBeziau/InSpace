<?php

# Lien vers ressources (header)
function add_theme_styles() {
  wp_enqueue_style('foundation', get_template_directory_uri() . '/css/foundation.min.css');
  wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js');
}
add_action('wp_enqueue_scripts', 'add_theme_styles');

# Lien vers ressources (footer)
function add_theme_scripts() {
  wp_enqueue_style('din', get_template_directory_uri() . '/fonts/din.css');
  wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
  wp_enqueue_script('what-input', get_template_directory_uri() . '/js/vendor/what-input.js');
  wp_enqueue_script('foundation-js', get_template_directory_uri() . '/js/vendor/foundation.min.js');
  wp_enqueue_script('app', get_template_directory_uri() . '/js/app.js');
}
add_action('wp_footer', 'add_theme_scripts');

# Ajout du menu
register_nav_menus(array(
  'main'     => __( 'Menu principal'),
  'category' => __( 'Catégories newsletter'),
));

# Ajout image à la une
function add_post_thumbnails() {
  add_theme_support('post-thumbnails');
  add_image_size('header-desktop', 1920, 350, true);
  add_image_size('header-medium', 768, 350, true);
  add_image_size('header-small', 375, 350, true);
  add_image_size('article-archive-desktop', 260, 150, true);
  add_image_size('article-archive-desktop2', 216, 160, true);
  add_image_size('article-archive-large', 768, 200, true);
  add_image_size('article-single-desktop', 840, 440, true);
  add_image_size('article-single-small', 360, 190, true);
  add_image_size('article-single-suivant', 405, 200, true);
  add_image_size('article-edito', 150, 200, true);
}
add_action('after_setup_theme', 'add_post_thumbnails');

# Réseaux sociaux (footer) + logo (menu) in customize_register
function add_customize_fields($wp_customize) {
  # Ajout section "Icones footer" dans Customize
  $wp_customize -> add_section('add-footer-social-media', array(
    "title" => "Icones footer"
  ));

  for ($i=1; $i <= 4; $i++) :
    # Icone
    $wp_customize -> add_setting("add-footer-social-media-image$i");
    $wp_customize -> add_control( new WP_Customize_Cropped_Image_Control($wp_customize, "add-footer-social-media-image$i-control", array(
      "label" => "Icone $i",
      "section" => "add-footer-social-media",
      "settings" => "add-footer-social-media-image$i",
      "width" => 50,
      "height" => 50
    )));
    # Lien
    $wp_customize -> add_setting("add-footer-social-media-lien$i", array(
      "default" => "Entrer le lien..."
    ));
    $wp_customize -> add_control( new WP_Customize_Control($wp_customize, "add-footer-social-media-lien$i-control", array(
      "label" => "Lien $i",
      "section" => "add-footer-social-media",
      "settings" => "add-footer-social-media-lien$i",
    )));
  endfor;

  # Ajout customize logo
  $wp_customize -> add_setting("add-logo-customize");
  $wp_customize -> add_control( new WP_Customize_Cropped_Image_Control($wp_customize, "add-logo-customize-control", array(
    "label" => "Logo du site",
    "section" => "title_tagline",
    "settings" => "add-logo-customize",
    "width" => 200,
    "height" => 38.5
  )));
}
add_action('customize_register', 'add_customize_fields');

# Shortcode accordion/tabs (evenements)
function shortcode_accordion_tabs($param, $content) {
  extract(
    shortcode_atts(
      array(
        'titre' => '',
      ),
      $param
    )
  );
  return "<li class='accordion-item' data-accordion-item>".
          " <a href='#' class='accordion-title'>$titre</a>".
          " <div class='accordion-content' data-tab-content>".
          $content.
          " </div>".
          "</li>";
}
add_shortcode('onglet', 'shortcode_accordion_tabs');

# Add shortcode button in visual editor
function enqueue_plugin_scripts($plugin_array) {
  # Enqueue TinyMCE plugin script with its ID
  $plugin_array["tabs_button_plugin"] = home_url() . "/wp-content/plugins/visual-editor-buttons/index.js";
  return $plugin_array;
}
add_filter("mce_external_plugins", "enqueue_plugin_scripts");
# Add the button in WP
function register_buttons_editor($buttons) {
  # Register buttons with their id
  array_push($buttons, "tabs");
  return $buttons;
}
add_filter("mce_buttons", "register_buttons_editor");

# Limit title post Char (50)
function article_max_characters() {
  global $post;
  $title = $post -> post_title;
  if (strlen($title) > 50) :
    wp_die('Le titre doit faire au maximum 50 caractères.');
  endif;
}
add_action('publish_post', 'article_max_characters');

# Fonction de pagination
function pagination($query, $page) {
  $page_number = $query -> max_num_pages;
  if ($page_number > 1) :
    if ($page == 1) :
      return '<div class="large-12 row column text-center pagination">'.
              '<p><span class="actu">'.$page.'</span> / '.$page_number.
              ' <a href="'.get_next_posts_page_link().'" class="next"><i class="fa fa-caret-right" aria-hidden="true"></i></a></p>'.
            '</div>';
    elseif ($page == $page_number) :
      return '<div class="large-12 row column text-center pagination">'.
              '<p><a href="'.get_previous_posts_page_link().'" class="prev"><i class="fa fa-caret-left" aria-hidden="true"></i></a> '.
              '<span class="actu">'.$page.'</span> / '.$page_number.'</p>'.
            '</div>';
    else :
      return '<div class="large-12 row column text-center pagination">'.
              '<p><a href="'.get_previous_posts_page_link().'" class="prev"><i class="fa fa-caret-left" aria-hidden="true"></i></a> '.
              '<span class="actu">'.$page.'</span> / '.$page_number.
              ' <a href="'.get_next_posts_page_link().'" class="next"><i class="fa fa-caret-right" aria-hidden="true"></i></a></p>'.
            '</div>';
    endif;
  endif;
}

# Ajout du bouton format dans TinyMCE
function add_theme_mce_buttons($buttons) {
  array_unshift($buttons, 'styleselect');
  return $buttons;
}
add_filter('mce_buttons_2', 'add_theme_mce_buttons');

# Ajout de style perso dans TinyMCE > Format
function my_mce_buttons_init( $init_array ) {
  $style_formats = array(
    # Chaque array défini 1 style (bouton)
    array(
    'title'   => 'Citation icone',
    'block'   => 'blockquote',
    'classes' => 'icone',
    'wrapper' => true,
    ),
    array(
    'title'   => 'Citation photo',
    'block'   => 'blockquote',
    'classes' => 'photo',
    'wrapper' => true,
    ),
    array(
      'title'   => 'Citation guillemets',
      'block'   => 'blockquote',
      'classes' => 'quote',
      'wrapper' => true,
    ),
    array(
      'title'   => 'Portrait + titre alignés',
      'block'   => 'div',
      'classes' => 'img-text-align',
      'wrapper' => true,
    ),
    array(
      'title'   => 'Icone + texte alignés',
      'block'   => 'div',
      'classes' => 'icon-text-align',
      'wrapper' => true,
    ),
    array(
      'title'   => 'Encadré',
      'block'   => 'div',
      'classes' => 'encadre',
      'wrapper' => true,
    ),
  );
  # On ajoute nos styles à ceux existants
  $init_array['style_formats'] = json_encode( $style_formats );
  return $init_array;
}
add_filter( 'tiny_mce_before_init', 'my_mce_buttons_init');

# 404 bug wp pagination
// function mg_news_pagination_rewrite() {
//   add_rewrite_rule(get_option('category_base').'/page/?([0-9]{1,})/?$', 'index.php?pagename='.get_option('category_base').'&paged=$matches[1]', 'top');
// }
// add_action('init', 'mg_news_pagination_rewrite');

/*if(!function_exists('avia_woocommerce_breadcrumb'))
{
	add_filter('avia_breadcrumbs_trail','avia_woocommerce_breadcrumb');

	function avia_woocommerce_breadcrumb($trail)
	{
		global $avia_config;

		if(is_woocommerce())
		{

			$home 		= $trail[0];
			$last 		= array_pop($trail);
			$shop_id 	= woocommerce_get_page_id('shop');
			$taxonomy 	= "product_cat";

			// on the shop frontpage simply display the shop name, rather than shop name + "All Products"
			if(is_shop())
			{
				if(!empty($shop_id) && $shop_id  != -1)  $trail = array_merge( $trail, avia_breadcrumbs_get_parents( $shop_id ) );
				$last = "";

				if(is_search())
				{
					$last = __('Search results for:','avia_framework').' '.esc_attr($_GET['s']);
				}
			}

			// on the product page single page modify the breadcrumb to read [home] [if available:parent shop pages] [shop] [if available:parent categories] [category] [title]
			if(is_product())
			{
				//fetch all product categories and search for the ones with parents. if none are avalaible use the first category found
				$product_category = $parent_cat = array();
				$temp_cats = get_the_terms(get_the_ID(), $taxonomy);

				if(!empty($temp_cats))
				{
					foreach($temp_cats as $key => $cat)
					{
						if($cat->parent != 0 && !in_array($cat->term_taxonomy_id, $parent_cat))
						{
							$product_category[] = $cat;
							$parent_cat[] = $cat->parent;
						}
					}

					//if no categories with parents use the first one
					if(empty($product_category)) $product_category[] = reset($temp_cats);

				}
				//unset the trail and build our own
				unset($trail);

				$trail[0] = $home;
				if(!empty($shop_id) && $shop_id  != -1)    $trail = array_merge( $trail, avia_breadcrumbs_get_parents( $shop_id ) );
				if(!empty($parent_cat)) $trail = array_merge( $trail, avia_breadcrumbs_get_term_parents( $parent_cat[0] , $taxonomy ) );
				if(!empty($product_category)) $trail[] = '<a href="' . get_term_link( $product_category[0]->slug, $taxonomy ) . '" title="' . esc_attr( $product_category[0]->name ) . '">' . $product_category[0]->name . '</a>';

			}

			// add the [shop] trail to category/tag pages: [home] [if available:parent shop pages] [shop] [if available:parent categories] [category/tag]
			if(is_product_category() || is_product_tag())
			{
				if(!empty($shop_id) && $shop_id  != -1)
				{
					$shop_trail = avia_breadcrumbs_get_parents( $shop_id ) ;
					array_splice($trail, 1, 0, $shop_trail);
				}
			}

			if(is_product_tag())
			{
				$last = __("Tag",'avia_framework').": ".$last;
			}

			if(!empty($last)) $trail[] = $last;
		}

		return $trail;
	}

}
