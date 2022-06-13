     <!-- checkout view  -->
	 <div class="new_arrivals">
        <div class=" container">
            <div class="d-flex justify-content-center row">
                <div class="col-md-12">
                    <div class="card shadow-lg mt-5">
                        <div class="row justify-content-around mt-5">
                            <div class="col-md-6" style="margin-top: 120px;">
                                <div class="card border-0">
                                    <div class="card-header pb-0">
                                        <h2 class="card-title space">Checkout</h2>
                                        <p class="card-text text-muted mt-4  space">SHIPPING DETAILS</p>
                                        <hr class="my-0">
                                    </div>
									<form  class="checkout-form" action="<?= base_url('products/checkout_user');?>"method="post" id="placeOrder">
										<?php if($custData):$custData = $this->db->get_where('customers', array('id' => $this->session->userdata('user_id')))->row();?>
										<?php endif; ?>

										<div class="card-body">
											<div class="row no-gutters">
												<div class="col-sm-6 pr-sm-2">
													<div class="form-group">
														<label for="NAME" class="small text-muted mb-1">First Name</label>
														<input type="text" class="form-control form-control-sm"id="firstname" name="firstname" <?php if($custData):?> value="<?= $custData->firstname ?>"<?php else:?>value=""<?php endif; ?> autocomplete="off">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="NAME" class="small text-muted mb-1">Last Name</label>
														<input type="text" class="form-control form-control-sm"id="lastname" name="lastname"  <?php if($custData):?> value="<?= $custData->lastname ?>"<?php else:?>value=""<?php endif; ?> autocomplete="off">
													</div>
												</div>
											</div>
											<div class="row no-gutters">
												<div class="col-sm-6 pr-sm-2">
													<div class="form-group">
														<label for="NAME" class="small text-muted mb-1">Email</label>
														<input type="text" class="form-control form-control-sm" id="email" name="email" <?php if($custData):?> value="<?= $custData->email ?>"
													<?php else:?>value=""<?php endif; ?> autocomplete="off">
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="NAME" class="small text-muted mb-1">Phone Number</label>
														<input type="text" class="form-control form-control-sm" id="phone"  name="phone" <?php if($custData):?> value="<?= $custData->phone ?>"<?php else:?>value=""<?php endif; ?> autocomplete="off">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="NAME" class="small text-muted mb-1">Shipping Address</label>
												<input type="text" class="form-control form-control-sm"  id="address"name="address" <?php if($custData):?> value="<?= $custData->address ?>"<?php else:?>value=""<?php endif; ?> autocomplete="off">
													<small class="text-muted">please enter your exact location for Shipping</small>
											</div>
											<div class="row mb-md-5">
												<div class="col">
													<button type=""class="red_button text-white p-3" name="placeOrder" >Place Order</button>
												</div>
											</div>    
										</div>
									</form>
                                    
                                </div>
                            </div>
                            <div class="col-md-6 mt-15 "style="margin-top: 120px;">
                                <div class="card border-0">
                                    <div class="card-header card-2">
                                        <p class="card-text text-muted mt-md-4  mb-2 space">Your Order Summary</p>
                                    </div>
                                    <div class="card-body checkoutscroll pt-0">
										<?php if($this->cart->total_items() > 0){foreach($cartItems  as$cart){?>
                                        <div class="row  justify-content-between">
                                            <div class="col-auto col-md-7">
                                                <div class="media flex-column flex-sm-row">
                                                    <img class=" img-fluid" src="<?php echo base_url(''.$cart['image']);?>" width="100" height="100">
                                                    <div class="media-body  my-auto">
                                                        <div class="row ">
                                                            <div class="col-auto"><p class="mb-0"><b><?= $cart['name']?></b></p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto"> <p class="boxed-1"><?= $cart['qty'] ?></p></div>
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto "><p><b><?= 'KES '.number_format($cart['price']); ?></b></p></div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row ">
                                            <div class="col">
                                                <div class="row justify-content-between">
                                                    <div class="col-4"><p class="mb-1"><b>Subtotal</b></p></div>
                                                    <div class="flex-sm-col col-auto"><p class="mb-1"><b><?= 'KES '.number_format($cart['subtotal']); ?></b></p></div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col"><p class="mb-1"><b>Shipping</b></p></div>
                                                    <div class="flex-sm-col col-auto"><p class="mb-1"><b></b></p></div>
                                                </div>
                                                <div class="row justify-content-between">
                                                    <div class="col-4"><p ><b>Total</b></p></div>
                                                    <div class="flex-sm-col col-auto"><p  class="mb-1"><b><?php echo 'KES'.$this->cart->total(); ?></b></p> </div>
                                                </div><hr class="my-0">
                                            </div>
                                        </div>
										<?php } } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
