<?php
if($product):
$related_products = $this->db->get_where('products', array('cate_id' => $product->cate_id))->result();
?>
	<div class="container">
			<div class="row">
				<div class="col" style="margin-top: 180px!important;">
					<!-- Breadcrumbs -->
					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="<?= base_url(); ?>">Home</a></li>
							<li><a href="<?= base_url('store'); ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>Shop</a></li>
							<li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><?= $product->name; ?></li>
						</ul>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-md-10">
					<div class="card">
						<div class="row">
							<div class="col-md-6">
								<div class="images p-3">
									<div class="text-center p-4"> <img id="main-image" src="https://i.imgur.com/Dhebu4F.jpg" width="250" /> </div>
									<div class="thumbnail text-center"><!-- <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg" width="70"> <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg" width="70">--> </div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="product p-4">
									<div class="d-flex justify-content-between align-items-center">
										<div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
									</div>
									<div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
										<h5 class="text-uppercase">Men's slim fit t-shirt</h5>
										<div class="price d-flex flex-row align-items-center"> <span class="act-price">$20</span>
											<div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
										</div>
									</div>
									<p class="about">Shop from a wide range of t-shirt from orianz. Pefect for your everyday use, you could pair it with a stylish pair of jeans or trousers complete the look.</p>
									<div class="sizes mt-5">
										<h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
									</div>
									<div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	</div>

	<!-- Tabs -->
	<div class="tabs_section_container">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabs_container">
						<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
							<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
							<li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
							<!-- <li class="tab" data-active-tab="tab_3"><span>Reviews (2)</span></li> -->
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<!-- Tab Description -->
					<div id="tab_1" class="tab_container active">
						<div class="row">
							<div class="col-lg-5 desc_col">
								<div class="tab_title">
									<h4>Description</h4>
								</div>
								<div class="tab_text_block">
									<h2>Pocket cotton sweatshirt</h2>
									<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
								</div>
							</div>
						
						</div>
					</div>

					<!-- Tab Additional Info -->

					<div id="tab_2" class="tab_container">
						<div class="row">
							<div class="col additional_info_col">
								<div class="tab_title additional_info_title">
									<h4>Additional Information</h4>
								</div>
								<p>Weight:<span></span></p>
								<p>Meant for which pet:<span></span></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
	<?php endif;?>

	
