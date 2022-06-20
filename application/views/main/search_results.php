<div class="product-grid"
							data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
							<?php foreach ($products as $row):?>

								<!-- Product 1 -->
								<div class="product-item women">
									<div class="product product_filter">
										<div class="product_image">
											<img src="<?php echo base_url(''.$row->image);?>" alt="">
										</div>
										<div class="favorite"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="single.html"><?php echo $row->name; ?></a></h6>
											<div class="product_price"><?php echo 'KES '.$row->price; ?></div>
										</div>
									</div>
									<div class="red_button add_to_cart_button"><a href="<?php echo base_url('products/addToCart/'.$row->id); ?>">add to order</a></div>
								</div>
							<?php  endforeach;?>
						</div>
