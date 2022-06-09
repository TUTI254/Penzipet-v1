
<h1>ORDER STATUS</h1>
    <div class="col-md-12">
        <div class="alert alert-success">Your order has been placed successfully.</div>
    </div>
<!-- Page Wrapper -->
	<section class="page-wrapper success-msg">
		<div class="container">
			<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="block text-center">
						<i class="tf-ion-android-checkmark-circle"></i>
					<h2 class="text-center">Thank you! For your payment</h2>
					<p>Your order <b><?php echo $this->session->userdata('orderid')?></b>, has been placed successfully.Any additional information will be communicated shortly</p>
					<a href="<?= base_url(); ?>" class="btn btn-main mt-20">Continue Shopping</a>
				</div>
			</div>
			</div>
		</div>
	</section><!-- /.page-warpper -->

