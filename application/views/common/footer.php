<!-- Footer -->

<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div
							class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
							<ul class="footer_nav">
								<!-- <li><a href="#">Blog</a></li> -->
								<li><a href="#">FAQs</a></li>
								<li><a href="#">Contact us</a></li>
							</ul>
						</div>
						</div>
					<div class="col-lg-6">
						<div
							class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="footer_nav_container">
							<div class="cr">Copyright © 2022 Penzipet All Rights Reserverd.</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<script src="<?= base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url();?>assets/styles/bootstrap4/popper.js"></script>
	<script src="<?= base_url();?>assets/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="<?= base_url();?>assets/plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="<?= base_url();?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?= base_url();?>assets/plugins/easing/easing.js"></script>
	<script src="<?= base_url();?>assets/js/custom.js"></script>
	<script src="<?= base_url();?>assets/js/newsletter.js"></script>
	<script src="<?= base_url();?>assets/js/auths.js"></script>
	<script src="<?= base_url();?>assets/js/search.js"></script>
	<script src="<?= base_url();?>plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<!-- <script src="<?= base_url();?>assets/js/cart.js"></script>	 -->
	<!-- <script src="<?= base_url();?>js/categories_custom.js"></script> -->
	
	<!-- slick Carousel -->
	<script src="<?= base_url();?>assets/js/toastr.min.js"></script>
	<script src="<?= base_url();?>assets/js/slick.min.js"></script>
	<script src="<?= base_url();?>assets/js/slick-animation.min.js"></script>
	<script>
		//Hero Slider
		$('.heo-slide').slick({
			// autoplay: true,
			infinite: true,
			arrows: true,
			prevArrow: '<button type=\'button\' class=\'heoSlideArrow prevArrow fa fa-chevron-left\'></button>',
			nextArrow: '<button type=\'button\' class=\'heoSlideArrow nextArrow fa fa-chevron-right\'></button>',
			dots: true,
			autoplaySpeed: 7000,
			pauseOnFocus: false,
			pauseOnHover: false
		});
		$('.heo-slide').slickAnimation();

	</script>
	<script>
		// Remove from cart
		function removeFromCart(id) {
			$.ajax({
				url:'products/remove_item_from_cart/' + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					if (data.response == 'success') {
						Command: toastr["success"](data.message)
						setTimeout(function () {
                        window.location.reload();
                    }, 1000)
						
					} else if (data.response == 'error') {
						Command: toastr["error"](data.message)
						setTimeout(function () {
                        window.location.reload();
                    }, 1000)
					}
				}
			})
		}


		// Function to decrement cart items
		function decrementCartItems(id) {
			$.get('products/decrement_cart_items/' + id, function(response) {
				const data = JSON.parse(response)
				if (data.response == 'success') {
					Command: toastr["success"](data.message)
						setTimeout(function () {
                        window.location.reload();
                    }, 1000)
				} else if (data.response == 'error') {
					Command: toastr["error"](data.message)
						setTimeout(function () {
                        window.location.reload();
                    }, 1000)
				}
			})
		}

		// Function to Increment cart Items
		function incrementCartItem(id) {
			$.get('products/increment_cart_items/' + id, function(response) {
				const data = JSON.parse(response)
				if (data.response == 'success') {
					Command: toastr["success"](data.message)
						setTimeout(function () {
                        window.location.reload();
                    }, 1000)
				} else if (data.response == 'error') {
					Command: toastr["error"](data.message)
						setTimeout(function () {
                        window.location.reload();
                    }, 1000)
				}
			})
		}


	</script>
</body>

</html>
