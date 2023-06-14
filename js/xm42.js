// const updateCart = (id) => {
// 	console.log(id);
// }
// let btn = document.getElementsByClassName('buy-now');
// for (let index = 0; index < btn.length; index++) {
// 	let id = btn[index].getAttribute('data-product_id');
//     btn[index].addEventListener('click', () => updateCart(id));
// }

// function addToCart(p_id) {
// 	jQuery.get('?add-to-cart=' + p_id, function() {
// 		// call back
// 	});
// }

// Dealer locator from handle
jQuery(document).ready(function(){
	jQuery('#xm42-dealer-locator > input').keyup(function(){
		var empty = false;
		jQuery('#xm42-dealer-locator > input').each(function(){
			if (jQuery(this).val() == '') {
				empty = true;		
			}
		});
		if (empty) {
			jQuery('#xm42-dealer-locator > button').attr('disabled', 'disabled');
		} else {
			jQuery('#xm42-dealer-locator > button').removeAttr('disabled');
		}
	});
});

jQuery('#xm42-dealer-locator').on('submit', (e) => {
	e.preventDefault();
	var city = jQuery('#xm42-dealer-locator > input').val();
	jQuery('#wpsl-search-input').val(city);
	jQuery('#wpsl-search-btn').click();
});

jQuery('#wpsl-search-input').attr('placeholder', 'Enter your city');
jQuery('.wpsl-search-btn-wrap').append('<i class="fa-solid fa-magnifying-glass"></i>');

// Slick Slider Controls
jQuery(document).ready(function (jQuery) {
  jQuery('.slick-carousel').slick({
    autoplay: false,
	infinite: false,
    slidesToShow: 4,
    responsive: [
      {
        breakpoint: 1920,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
          arrows: false,
          dots: true,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          arrows: false,
          dots: true,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          arrows: false,
          dots: true,
        },
      },
    ],
  });
});

// Ajax add to cart controls for featured items
jQuery(document).ready(function(){
	var add_to_cart_btn = jQuery('.ajax_add_to_cart');
	var spinner = jQuery('<span class="spinner"></span>');
	
	add_to_cart_btn.on('click', function(e){
		e.preventDefault();
		let itemID = parseInt(jQuery(this).val());
		let qty = 1;
		let btn = jQuery(this);
		
		btn.append(spinner); // show spinner
		btn.prop('disabled', true); // disable add to cart button
		
		// send ajax product data to admin and get response back
		jQuery.ajax({
			url: ajax_url,
			type: 'post',
			data: {
				action: 'woocommerce_add_to_cart',
				product_id: itemID,
				quantity: qty
			},
			success: function(res){
				let cartTotalSelector = '.menu-cart.total a.cart-contents';
				jQuery(cartTotalSelector).replaceWith(res.fragments[cartTotalSelector]); // Get cart total

				btn.prop('disabled', false); // enable add to cart button
				btn.text('VIEW CART'); // change add to cart btn text
				btn.attr('onclick', "location.href='" + cart_url + "';"); // go to cart link add
			},
			error: function(err) {
				btn.prop('disabled', false); // enable add to cart button
				console.log(err);
			},
			complete: function(){
				spinner.remove();
			}
		});
	});
});