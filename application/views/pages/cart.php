<!--  cart view-->
	<div class="benefit" style="margin-top: 150px!important;">
        <div class="container">
            <div class="d-flex justify-content-center row">
                <div class="col-md-9">
                    <div class="col text-center">
                        <div class="section_title new_arrivals_title">
                            <h2 class="mt-5">Shopping Cart</h2>
                        </div>
                    </div>
					<?php if($this->cart->total() != 0):?>

						<form action="" id="loadcart">
							<?php foreach($cartItems as $cart):?>
								<div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded" id="cartdata">
									<div class="mr-1"><img class="rounded" src="<?php echo base_url(''.$cart['image']);?>" width="80"></div>
									<div class="d-flex flex-column align-items-left product-details"><span class="font-weight-bold font-size-8px"><?= $cart['name']?></span>
									</div>
									<div class="d-flex flex-row align-items-center qty"><i class="fa fa-minus text-danger mr-3" onclick="decrementCartItems(<?php echo' \''.$cart['rowid'].'\'' ?>)"></i>
										<h5 class="text-grey mt-1"><?= $cart['qty'] ?></h5><i class="fa fa-plus text-success ml-3" onclick="incrementCartItem(<?php echo' \''.$cart['rowid'].'\'' ?>)"></i>
									</div>
									<div>
										<h5 class="text-grey ml-2 mr-1"><?= 'KES '.number_format($cart['price']); ?></h5>
									</div>
									<div class="d-flex align-items-center">
									<?php echo '<i onclick="removeFromCart(\''.$cart['rowid'].'\')" class="fa fa-trash remove"></i>'?>
									</div>

								</div> 
								<hr>
								<!-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div> -->
								<?php endforeach ;?>
									<div class="d-flex flex-row align-items-center mt-3">
										<a href="<?=base_url('shop');?>" class="red_button text-white p-3 ml-3">continue shopping</a>
										<a href="<?=base_url('checkout');?>" class="red_button text-white p-3 ml-3">Proceed to checkout</a>
									
									</div>
						</form>
                    
					<?php else: ?>
						<div class="container mt-3">
							<div class="col-lg-12">
								<h4 class="mt-5">Your cart is empty....</h4>
								<img src="<?= base_url(); ?>assets/images/cart.svg" width="400px" alt="">
								<a href="<?=base_url('shop');?>" class="red_button text-white p-3 ml-3 mt-3">Start shopping</a>
							</div>
						</div>

					<?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
