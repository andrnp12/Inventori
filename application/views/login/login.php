<form action="" method="POST">

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form method="post" action="<?= base_url('login');?>">
					<span class="login100-form-title p-b-51">
						Login Inventori!
					</span>
					
					<?= $this->session->flashdata('message'); ?>
                    
            <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						    <input class="input100" type="text" name="name" placeholder="Username" required="">
					    	<span class="focus-input100"></span>
					</div>

					<?= form_error('name', '<small class="text-danger pl-3">','</small>') ?>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						    <input class="input100" type="password" name="password" placeholder="Password" required="" >
						    <span class="focus-input100"></span>
            		</div>
                    
            <div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit" name="login">
							Login
			</button>
		  </div>
		  	
        </div>
	</div>
</div>
</form>

  <div id="dropDownSelect1"></div>

