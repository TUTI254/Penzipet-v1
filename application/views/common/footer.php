<!-- Footer -->

<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div
							class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
							<ul class="footer_nav">
								<!-- <li><a href="#">Blog</a></li> -->
								<!-- <li><a href="#">FAQs</a></li> -->
								<li><a href="contact.html">Contact us</a></li>
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

		<!-- START Bootstrap-Cookie-Alert -->
		<div class="alert text-center cookiealert" role="alert">
			<b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website.
			<a href="https://cookiesandyou.com/" target="_blank">Learn more</a>

			<button type="button" class="btn btn-primary btn-sm acceptcookies">
				I agree
			</button>
		</div>
		<!-- END Bootstrap-Cookie-Alert -->

	</div>

	<script src="<?= base_url();?>assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url();?>assets/styles/bootstrap4/popper.js"></script>
	<script src="<?= base_url();?>assets/styles/bootstrap4/bootstrap.min.js"></script>
	<!-- <script src="<?= base_url();?>assets/js/cookiealert.js"></script> -->
	<script src="<?= base_url();?>assets/plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="<?= base_url();?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?= base_url();?>assets/plugins/easing/easing.js"></script>
	<script src="<?= base_url();?>assets/js/custom.js"></script>
	<script src="<?= base_url();?>assets/js/newsletter.js"></script>
	<script src="<?= base_url();?>assets/js/auths.js"></script>
	<script src="<?= base_url();?>assets/js/search.js"></script>
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
</body>

</html>