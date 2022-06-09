<div class="container " style="margin-top: 250px !important;">
			<div class="row">
				<div class="col product_section clearfix">

					<div class="main_content">
						<div class="container">
							<a href="#" class="navbar-brand">
							<img src="<?= base_url(); ?>assets/images/penzilogo.jpeg" alt="logo" width="150">
							</a>
							<div class="row py-5 mt-4 align-items-center">
								<!-- For Demo Purpose -->
								<div class="col-md-3 pr-lg-5 mb-5 mb-md-0">
								<img src="<?= base_url('assets/images/acc.svg');?>" alt="" class="img-fluid mb-3 d-none d-md-block">
									<h2>welcome back !! Login</h2>
								</div>

								
								<!-- login Form -->
								<div class="col-md-9 col-lg-6 ml-auto">
									<form id="loginForm" action="" method="post">

										<!-- Email Address -->
										<div class="input-group mb-4">
											<div class="input-group-prepend">
												<span class="input-group-text bg-white px-4 border-md border-right-0">
													<i class="fa fa-envelope text-muted"></i>
												</span>
											</div>
											<input id="user_email" type="email" name="user_email" placeholder="Email Address"
												class="form-control bg-white border-left-0 border-md"
												autocomplete="off">
										</div>
										<!-- Password -->
										<div class="input-group mb-4">
											<div class="input-group-prepend">
												<span class="input-group-text bg-white px-4 border-md border-right-0">
													<i class="fa fa-lock text-muted"></i>
												</span>
											</div>
											<input id="user_password" type="password" name="user_password" placeholder="Password"
												class="form-control bg-white border-left-0 border-md"
												autocomplete="off">
										</div>

										<!-- Submit Button -->
										<div class="form-group col-lg-12 mx-auto mb-0">
											<button class="btn red_button btn-block py-2" type="submit">
												<span class="font-weight-bold text-white">Login</span>
											</button>
										</div>
										<!-- Divider Text -->
										<div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
											<div class="border-bottom w-100 ml-5"></div>
											<span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
											<div class="border-bottom w-100 mr-5"></div>
										</div>

										<!--  create an acc -->
										<div class="text-center w-100">
											<p class="text-muted font-weight-bold">Don't Have an Account? <a href="<?= base_url('Customer_registration');?>" class="ml-2">Register</a></p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>