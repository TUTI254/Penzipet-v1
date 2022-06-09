<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Store</h1>
					<ul class="social-media">
						
						<li>
							<a href=""><img  src="assets/images/dog.png" alt="image" title="dog"/></a>
						</li>

						<li>
							<a href=""><img  src="assets/images/cat.png" alt="image" title="cat"/></a>
						</li>

						<li>
							<a href=""><img  src="assets/images/rabbit.png" alt="image" title="small animals"/></a>	
						</li>

						<li>
							<a href=""><img  src="assets/images/fish.png" alt="image" title="fish"/></a>
						</li>
							
						<li>
							<a href=""><img  src="assets/images/horse.png" alt="image" title="horse"/></a>
						</li>
					</ul>			
				</div>
					
			</div>
		</div>
	</div>
</section>


<section class="products section">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="widget">
					<h4 class="widget-title">Short By Categories</h4>
					<form method="post" action="#">
                        <select class="form-control">
                            <option>All</option>
                            <option>Pet Food</option>
                            <option>Pet Accessories</option>
                            
                        </select>
                    </form>
				</div>
			</div>

			<div class="col-md-9">
				<div class="row">
					<?php foreach ($products as $row) : ?>
					<div class="col-md-4 col-md-offset-2">
						<div class="product-item">
							<div class="product-thumb">
								<!-- <span class="bage">Sale</span> -->
								<img class="img-responsive" src="<?php echo base_url(''.$row['image']);?>" alt="" />
								<div class="preview-meta">
									<ul>
										<li>
											<span  data-toggle="modal" data-target="#product-modal">
												<i class="tf-ion-ios-eye"></i>
											</span>
										</li>
										<!-- <li>
											<a href="#!" ><i class="tf-ion-ios-heart"></i></a>
										</li> -->
										<li>
											<a href="<?= base_url('products/addToCart/'.$row['id']);?>"><i class="tf-ion-android-cart add_cart"></i></a>
										</li>
									</ul> 
								</div>
							</div>
							<div class="product-content">
								<h4><?php echo $row["name"]; ?></h4>
								<p class="price"><?php echo 'KES '.$row["price"]; ?></p>
							</div>
						</div>
					</div>
					<?php endforeach;?>

					<!-- Modal -->
					<div class="modal product-modal fade" id="product-modal">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="tf-ion-close"></i>
						</button>
						<div class="modal-dialog " role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="row">
										<div class="col-md-8 col-sm-6 col-xs-12">
											<div class="modal-image">
												<img class="img-responsive" src="assets/images/shop/products/500x600.png" alt="product-img" />
											</div>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<div class="product-short-details">
												<h2 class="product-title">GM Pendant, Basalt Grey</h2>
												<p class="product-price">$200</p>
												<p class="product-short-description">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
												</p>
												<a href="cart.html" class="btn btn-main">Add To Cart</a>
												<a href="product-single.html" class="btn btn-transparent">View Product Details</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.modal -->
				</div>				
			</div>
		
		</div>
	</div>
</section>
