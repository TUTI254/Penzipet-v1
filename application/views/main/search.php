<?php $this->load->view('common/header'); if(!empty($products)): ?>

	<div class="newsletter" style="margin-top: 180px !important;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<?php if($searchword){
								echo '<h4 class="text-white">Search results for '.$searchword.'</h4>';    
							}else{
								echo '<h4 class="text-white">Search results</h4>';
							}
						
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Main Content -->
	<div class="new_arrivals">
			<div class="container" style="margin-top: 180px !important;">		
				<div class="row">
					<div class="col">
						<?php $this->load->view('main/search_results', $products)?>
					</div>
				</div>
			</div>
		</div>
<?php else: ?>

	<div class="newsletter" style="margin-top: 180px !important;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4 class="text-white">
							<?php if($searchword){
								echo 'No search results found for '.$searchword;     
							}
							?>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container mt-3">
		<div class="col-lg-12">
			<img src="<?= base_url(); ?>assets/images/search.svg"  width="400px" alt="">
		</div>
	</div>

<?php endif; $this->load->view('common/footer'); ?>
