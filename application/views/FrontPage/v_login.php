
    <body>
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top">
                <span class="right">
                	<a href="#">Background by Robert Hamilton</a>
                </span>
            </div><!--/ Codrops top bar -->
			
			<header>
				<img src="<?php echo base_url(); ?>assets/images/logo pnp small.PNG">
				<h1>PT. PURA NUSAPERSADA UNIT HOLOGRAFI II</h2>
				<h2><strong>Aplikasi Tilang Dan Reward</strong></h1>
                				
			</header>
			
			<section class="main">
				
				<form class="form-4" role="form" action="<?php echo site_url('login/checkin'); ?>" method="post">
				    <h1>Login</h1>
				    <?php if($this->session->flashdata('error')): ?>
				    <div class="x_content bs-example-popovers">
	            		<div class="alert alert-danger alert-dismissible fade in" role="alert">
	              		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
	                    </button>
	                    <strong>Error !! </strong> <?php echo $this->session->flashdata('error'); ?>
	                  	</div>
                  	</div>
            		<?php endif; ?>
				    <p>
				        <label for="login">Username</label>
				        <input type="text" name="username" placeholder="Username or email" required>
				    </p>
				    <p>
				        <label for="password">Password</label>
				        <input type="password" name='password' placeholder="Password" required> 
				    </p>

				    <p>
				        <input type="submit" name="submit" value="Continue">
				    </p>       
				</form>​
			</section>
        </div>
