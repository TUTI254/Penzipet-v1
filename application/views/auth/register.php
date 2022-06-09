<div class="container" style="margin-top: 250px !important;">
	<div class="main_content">
		<div class="container">
			
				<img src="<?= base_url(); ?>assets/images/penzilogo.jpeg" alt="logo" width="150">
			<div class="row py-5 mt-4 align-items-center">
				<!-- For Demo Purpose -->
				<div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
					<img src="<?= base_url('assets/images/acc.svg');?>" alt="" class="img-fluid mb-3 d-none d-md-block">
					<h2>Create an Account</h2>
				</div>

				<!-- Registeration Form -->
				<div class="col-md-7 col-lg-6 ml-auto">
					<form id="registerForm" action="<?= base_url('auths/register_user');?>" method="post">
						<div class="row">
							<!-- First Name -->
							<div class="input-group col-lg-6 mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white px-4 border-md border-right-0">
										<i class="fa fa-user text-muted"></i>
									</span>
								</div>
								<input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md" autocomplete="off">
							</div>

							<!-- Last Name -->
							<div class="input-group col-lg-6 mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white px-4 border-md border-right-0">
										<i class="fa fa-user text-muted"></i>
									</span>
								</div>
								<input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md"autocomplete="off">
							</div>

							<!-- Email Address -->
							<div class="input-group col-lg-6 mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white px-4 border-md border-right-0">
										<i class="fa fa-envelope text-muted"></i>
									</span>
								</div>
								<input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md"autocomplete="off">
							</div>

							<!-- Phone Number -->
						<div class="input-group col-lg-6 mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white px-4 border-md border-right-0">
										<i class="fa fa-phone text-muted"></i>
									</span>
								</div>
								<input id="phone" type="text" name="phone" placeholder="phone" class="form-control bg-white border-left-0 border-md"autocomplete="off">
							</div>

							<!-- Password -->
							<div class="input-group col-lg-6 mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white px-4 border-md border-right-0">
										<i class="fa fa-lock text-muted"></i>
									</span>
								</div>
								<input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md"autocomplete="off">
							</div>

							<!-- Password Confirmation -->
							<div class="input-group col-lg-6 mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white px-4 border-md border-right-0">
										<i class="fa fa-lock text-muted"></i>
									</span>
								</div>
								<input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md"autocomplete="off">
							</div>
							<!-- Address -->
							<div class="input-group col-lg-12 mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white px-4 border-md border-right-0">
										<i class="fa fa-truck text-muted"></i>
									</span>
								</div>
								<input id="address" type="text" name="address" placeholder="Default Shipping Address" class="form-control bg-white border-left-0 border-md"autocomplete="off">
							</div>

							<!-- Submit Button -->
							<div class="form-group col-lg-12 mx-auto mb-0">
								<button class="btn red_button btn-block py-2" type="submit">
									<span class="font-weight-bold text-white">Create your account</span>
								</button>
							</div>

							<!-- Divider Text -->
							<div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
								<div class="border-bottom w-100 ml-5"></div>
								<span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
								<div class="border-bottom w-100 mr-5"></div>
							</div>

							<!-- Social Login
							<div class="form-group col-lg-12 mx-auto">
								<a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
									<i class="fa fa-facebook-f mr-2"></i>
									<span class="font-weight-bold">Continue with Facebook</span>
								</a>
								<a href="#" class="btn btn-primary btn-block py-2 btn-twitter">
									<i class="fa fa-twitter mr-2"></i>
									<span class="font-weight-bold">Continue with Twitter</span>
								</a>
							</div> -->


							<!-- Already Registered -->
							<div class="text-center w-100">
								<p class="text-muted font-weight-bold">Already Registered? <a href="<?= base_url('account_login');?>" class="ml-2">Login</a></p>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
				