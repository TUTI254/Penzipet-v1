<section class="page-header">
		<div class="container">
			<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="<?= base_url();?>">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
			</div>
		</div>
	</section>

	<div class="page-wrapper">
		<div class="checkout shopping">
			<div class="container">
				<div class="row">
					<div class="col-md-8 mx-auto">
						<div class="block billing-details">
							<h4 class="widget-title">Billing & Shipping Details</h4>
								<form class="checkout-form" action="<?= base_url('products/checkout_user');?>"method="post" id="placeOrder">
									<?php if($custData):$custData = $this->db->get_where('customers', array('id' => $this->session->userdata('user_id')))->row();?>
                                    <?php endif; ?>

											<div class="checkout-country-code clearfix">
												<div class="form-group">
												<label>First Name</label>
												<input type="text" class="form-control" id="firstname" name="firstname" <?php if($custData):?> value="<?= $custData->firstname ?>"
													<?php else:?>value=""<?php endif; ?> autocomplete="off">
												</div>
												<div class="form-group">
												<label>Last Name</label>
												<input type="text" class="form-control" id="lastname" name="lastname"  <?php if($custData):?> value="<?= $custData->lastname ?>"
													<?php else:?>value=""<?php endif; ?> autocomplete="off">
												</div>
											</div>
											<div class="form-group">
												<label>Email</label>
												<input type="text" class="form-control" id="email" name="email" <?php if($custData):?> value="<?= $custData->email ?>"
													<?php else:?>value=""<?php endif; ?> autocomplete="off">
											</div>
											<div class="form-group">
												<label>Phone Number</label>
												<input type="text" class="form-control" id="phone"  name="phone" <?php if($custData):?> value="<?= $custData->phone ?>"
													<?php else:?>value=""<?php endif; ?> autocomplete="off">
											</div>
											
											<div class="form-group">
												<label>Delivery Address</label>
													<input type="text" class="form-control" id="address"name="address" <?php if($custData):?> value="<?= $custData->address ?>"
														<?php else:?>value=""<?php endif; ?> autocomplete="off">
											</div>

									<button class="btn btn-main mt-20" name="placeOrder">Place Order</button>
								</form>
						</div>
					</div>

					<div class="col-md-4">
						<div class="product-checkout-details" id="cartdata">
							<div class="block checkoutscroll">
								<h4 class="widget-title">Order Summary</h4>
								<?php if($this->cart->total_items() > 0){foreach($cartItems  as$cart){?>
								<div class="media product-cad">
									<a class="pull-left" href="">
									<img class="media-object" src="<?php echo base_url(''.$cart['image']);?>" alt="Image" width="40%" />
									</a>
									<div class="media-body">
									<h4 class="media-heading"><a href=""><?= $cart['name']?></a></h4>
									<h5><?= 'KES '.number_format($cart['price']); ?></h5>
									<span>Quantity:</span>
									<span><?= $cart['qty'] ?></span>
									</div>
								</div>
								<?php } }else{ ?>
									<div class="media product-cad">
										<p>No items in your cart...</p>
									</div>

								<div class="discount-code">
									<!-- <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p> -->
								</div>
								<ul class="summary-prices">
									<li>
									<span>Subtotal:</span>
									<span class="price"><?= 'KES '.number_format($cart['subtotal']); ?></span>
									</li>
									<li>
									<span>Shipping:</span>
									<span></span>
									</li>
								</ul>
								<?php }?>
								<div class="summary-total">
									<span>Total</span>
									<span><?php echo 'KES'.$this->cart->total(); ?> </span>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
