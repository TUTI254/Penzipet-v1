<?php
if($product):
$related_products = $this->db->get_where('products', array('cate_id' => $product->cate_id))->result();
?>
	<div class="container single_product_container">
			<div class="row">
				<div class="col">

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
				<div class="col-lg-7">
					<div class="single_product_pics">
						<div class="row">
							<!-- <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
								<div class="single_product_thumbnails">
									<ul>
										<li><img src="images/single_1_thumb.jpg" alt="" data-image=""></li>
										<li class="active"><img src="images/single_2_thumb.jpg" alt="" data-image=""></li>
										<li><img src="images/single_3_thumb.jpg" alt="" data-image=""></li>
									</ul>
								</div>
							</div> -->
							<div class="col-lg-9 image_col order-lg-2 order-1">
								<div class="single_product_image">
									<div class="single_product_image_background" style="background-image:url(<?= base_url(''.$product->image);?>);"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="product_details">
						<div class="product_details_title">
							<h4><?=$product->name?></h4>
							<!-- <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p> -->
						</div>
						<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
							<span class="fa fa-truck"></span><span>Next Day delivery</span>
						</div>
						<!-- <div class="original_price">$629.99</div> -->
						<div class="product_price"><?php echo 'KES '.$product->price; ?></div>
						<!-- <ul class="star_rating">
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star" aria-hidden="true"></i></li>
							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
						</ul> -->
						<!-- <div class="product_color">
							<span>Select Color:</span>
							<ul>
								<li style="background: #e54e5d"></li>
								<li style="background: #252525"></li>
								<li style="background: #60b3f3"></li>
							</ul>
						</div> -->
						<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
							<span>Quantity:</span>
							<div class="quantity_selector">
								<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
								<span id="quantity_value">1</span>
								<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
							</div>
							<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
							<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
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
							
								<div class="tab_title">
									<h4 class="ml-4">Description</h4>
								</div>
								<div class="tab_text_block">
									<!-- <h2>Pocket cotton sweatshirt</h2> -->
									<p class="ml-4 mr-4"><?= $product->description?></p>
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
								<p>Brand: <span></span></p>
								<p>Weight: <span></span></p>
								<p>Pet Type: <span></span></p>
							
							</div>
						</div>
					</div>

					<!-- Tab Reviews -->

					<!-- end reviews -->

				</div>
			</div>
		</div>

	</div>

<?php endif;?>

	
		<!-- related products -->
		<div class="best_sellers">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="section_title new_arrivals_title">
							<h2>Related Products</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="product_slider_container">
							<div class="owl-carousel owl-theme product_slider">
								<?php foreach ($products as $row):?>

									<!-- Slide 1 -->

									<div class="owl-item product_slider_item">
										<div class="product-item">
											<div class="product discount">
												<div class="product_image" id="image">
												<a href="<?= base_url('products/getProductdetails/'. $row['id']); ?>">
													<img src="<?= base_url(''.$row['image']);?>" alt="">
												</a>
												</div>
												<div class="favorite favorite_left"></div>
												<div class="product_info">
													<h6 class="product_name" id="name"><a href="<?= base_url('products/getProductdetails/'. $row['id']); ?>"><?php echo $row["name"]; ?></a></h6>
													<div class="product_price" id="price"><?php echo 'KES '.$row["price"]; ?></div>
												</div>
											</div>
										</div>
									</div>
								<?php  endforeach;?>
							</div>

							<!-- Slider Navigation -->

							<div
								class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</div>
							<div
								class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
