<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'bootstrap','mestore-main','mestore-main','blocks-frontend','line-awesome','m-customscrollbar','mestore-woocommerce-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

function mestore_header_login_register_links() {
    ?>   
        <ul class="header-xm42-links">
            <li>
                <?php
                    if ( mestore_is_active_woocommerce() && true===get_theme_mod( 'mestore_enable_header_login_register_links',true) ) :
                        mestore_woocommerce_header_signup_links();
                    endif;
                ?>
            </li>
        </ul>   
    <?php
}

/**
* Header Cart
*/
function mestore_woocommerce_header_cart() {
    $mestore_cart_link_option = get_theme_mod( 'mestore_cart_link_option', true );
    if ( false == $mestore_cart_link_option ) :
        return;
    endif;
    if ( is_cart() ) :
        $class = 'current-menu-item';
    else :
        $class = '';
    endif;
    ?>
        <ul id="site-header-cart" class="site-header-cart">
			<li class="menu-title">CART</li>
            <li class="menu-cart total <?php echo esc_attr( $class ); ?>">
				<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
					<?php 
						echo get_woocommerce_currency_symbol();
						echo wc_format_decimal(WC()->cart->total, 2 );
					?>
				</a>
            </li>
<!--             <li>
                <?php
//                    $instance = array(
//                        'title' => '',
//                    );
//                    the_widget( 'WC_Widget_Cart', $instance );
                ?>
            </li> -->
			<li class="checkout-btn"><a href="/checkout/">CHECKOUT</a></li>
        </ul>
    <?php
}

/**
* Header Sign Up
*/
function mestore_woocommerce_header_signup_links() {
    ?>
        <span class="register">
            <?php
                if ( is_user_logged_in() ) :
                    ?>
                        <a title="<?php esc_attr_e('My Account','mestore') ?>" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php echo esc_attr_e('My Account','mestore'); ?>">My Account</a>
                    <?php
                else :
                    ?>  
                        <a title="<?php esc_attr_e('Sign In','mestore') ?>" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php echo esc_attr_e('Sign In','mestore'); ?>">Login</a>
                    <?php
                endif;
            ?>
        </span>
    <?php
}
function xm42_social_icons() {
	?>
	<div class="xm42-social-icons">
		<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
		<a href="#"><i class="fa-brands fa-twitter"></i></a>
		<a href="#"><i class="fa-brands fa-instagram"></i></a>
		<a href="#"><i class="fa-regular fa-envelope"></i></a>
	</div>
	<?php
}
add_action('xm42_header_social_icons', 'xm42_social_icons');

function mestore_footer_copyrights() {
	?>
		<div class="row">
            <div class="col-md-6">
                <div class="copyrights">
                    <p>
                        <?php

                            if("" != esc_html(get_theme_mod( 'mestore_footer_copyright_text'))) :
                                echo esc_html(get_theme_mod( 'mestore_footer_copyright_text')); 
                                if(get_theme_mod('mestore_en_footer_credits',true)) :
                                    ?><?php   
                                endif;
                            
                            else :
                                echo date_i18n(
                                    /* translators: Copyright date format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'mestore' )
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                <?php
                            endif;
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-menu-product">
                    <div class="collapse navbar-collapse" id="navbar-collapse-4">
                        <img src="https://xm42newdev.wpengine.com/wp-content/uploads/2022/12/footer-credit-card-icons.png" class="card-type" />
                    </div>
                </div>
            </div>
        </div>
	<?php
}
add_action( 'mestore_action_footer', 'mestore_footer_copyrights' );

/* Custom XM42 javascript enqueue */
function custom_scripts() {
	wp_enqueue_style( 'slick-carousel', get_stylesheet_directory_uri() . '/assets/slick.css' );
	wp_enqueue_style( 'slick-carousel-theme', get_stylesheet_directory_uri() . '/assets/slick-theme.css' );
	wp_enqueue_style( 'dashicons' );
    wp_enqueue_script('xm42-js', get_stylesheet_directory_uri() . '/js/xm42.js', array('jquery'), '1.0.0', true );
	
	wp_enqueue_script( 'slick-carousel', get_stylesheet_directory_uri() . '/assets/slick.min.js', array( 'jquery' ), '1.8.1', true );
	$ajax_url = admin_url( 'admin-ajax.php' );
	$cart_url = wc_get_cart_url();
	wp_localize_script( 'xm42-js', 'ajax_url', $ajax_url );
	wp_localize_script( 'xm42-js', 'cart_url', $cart_url );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts', 10 );

// Mini cart total update via ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo WC()->cart->get_cart_total(); ?></a> 
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}

// Featured items slider
function xm42_carousel_slider() {

    // Declare carousel variable
    $xm42_carousel = '';

    // Get featured products
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
            ),
        ),
    );
    $featured_products = new WP_Query( $args );

    if( $featured_products->have_posts() ) :
        
            // Start the carousel
        $xm42_carousel .= '<div class="xm42-product-slider">
            <div class="container">
                <div class="row">
                    <h2 class="slider-title"><strong>Featured</strong> Items</h2>
                        <div class="slick-carousel">';

        while ( $featured_products->have_posts() ) :
            $featured_products->the_post();
            // Display the product image and title
            $xm42_carousel .= '<div class="product">';
            
            // Get the product title
            $product_title = get_the_title();

            // Get product add to cart url
            $product = wc_get_product();
            $product_id = get_the_ID();
            $product_url = $product->add_to_cart_url();

            $buyNow_class = implode( ' ', array(
                'product_type_' . $product->get_type(),
                'ajax_add_to_cart',
            ) );

            // Get the first word of the title
            $product_title = preg_replace('/(\S+)\s*/', '<strong>$1&nbsp;</strong>', $product_title, 1);
            
            $xm42_carousel .= '<h3 class="product-title"><a href="' . get_permalink() . '">' . $product_title . '</a></h3>';
            $xm42_carousel .= '<a class="mb-2 thumbnail" href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'shop_catalog' ) . '</a>';
            $xm42_carousel .= '<div class="buy-box d-flex justify-content-around align-items-center mb-2"><span class="rounded price py-1">' . get_woocommerce_currency_symbol() . get_post_meta( get_the_ID(), '_price', true ) . '</span><button  type="submit" name="add-to-cart" value="' . $product_id . '" class="buy rounded border-0 m-0 py-1 ' . $buyNow_class . '">BUY NOW</button></div>';
            $xm42_carousel .= '</div>';
        endwhile;
    
        // End the carousel
        $xm42_carousel .= '</div></div></div></div>';

        // // Reset the post data
        wp_reset_postdata();

    endif;

    return $xm42_carousel;
}
add_shortcode('xm42_featured_carousel', 'xm42_carousel_slider');