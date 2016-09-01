 

<main class="o-content position-rel_40"> 
	<div class="container">
            <?php if ($loged == false) { ?>
	   <div class="login-wrapper">
		<div class="col-lg-6 col-sm-12">
<h1> Why You Will Love Nirog Street</h1>
<div class="half-border">&nbsp;</div>
<div class="nirog-details">
<ul>
<li class="path"> Simple and beautiful platform only for traditional medicine practitioners.</li>
<li class="information"> Personalized care traditional yet professional way.</li>
<li class="chat"> Answer questions by Patients in Text or Video format.</li>
<li class="bell-ring-alarm"> Reduce no shows and increase patient connect with comprehensive set of Reminders.</li>
<li class="calendar"> You can Record treatments and schedule visits.</li>
</ul>

</div>
</div>
		<div class="col-md-6 register-right">
				<div class="box">
				<div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group"><h4>Join as a Clinic</h4></div>
					<div class="col-md-6 col-sm-12 col-xs-12 form-group text-right"><h4><?php echo $this->Session->flash(); ?></h4></div>
					</div>
                                     <?php echo $this->Form->create('User', array('id' => 'clinicregister', 'novalidate' => 'true', 'url' => array('controller' => 'Users', 'action' => 'clinicregister'), "inputDefaults" => array("maxlength" => "100", "legend" => false, "label" => false, "div" => false, "required" => false))); ?> 
				<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
						<label>Clinic Name</label>
	<?php echo $this->Form->input('User.first_name', array('type' => 'text', 'id' => 'first_name', 'class' => "form-control input-block-level txtfield required", 'minlength' => 3, 'maxlength' => 60, 'autocomplete' => "off", "placeholder" => "First Name",'tabindex' => '1',"label" => false)); ?>
    
					</div>
                                    </div>
					
					
					<div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
						<label>Mobile Number</label>
						<?php echo $this->Form->input('User.mobile_no', array('type' => 'text', 'id' => 'mobile', 'class' => "form-control input-block-level txtfield number required", 'minlength' => 10, 'maxlength' => 12, 'autocomplete' => "off", "placeholder" => "Mobile number",'tabindex' => '4',"label" => false)); ?>
       
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 form-group">
						<label>E-Mail Address</label>
						<?php echo $this->Form->input('User.email', array('type' => 'email', 'id' => 'username', 'class' => "form-control input-block-level txtfield required", 'autocomplete' => "off", "placeholder" => "Username - Email",'tabindex' => '3',"label" => false)); ?>		
        
					</div>
					</div>
					
					<div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
						<label>Create Password</label>
						<?php echo $this->Form->input('User.password', array('type' => 'password', 'id' => 'passwrd', 'class' => "form-control input-block-level txtfield required", 'minlength' => 6, 'maxlength' => 20, 'autocomplete' => "off", "placeholder" => "Password",'tabindex' => '5',"label" => false)); ?>

					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 form-group">
						<label>Confirm Password</label>
						<?php echo $this->Form->input('User.cnfpassword', array('type' => 'password', 'id' => 'cnfpassword', 'class' => "form-control input-block-level txtfield required", 'minlength' => 6, 'maxlength' => 20, 'autocomplete' => "off", "placeholder" => "Confirm Password",'tabindex' => '6',"label" => false)); ?> 
  
					</div>
					</div>
                     
					 <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
					 <input name="data[User][user_type]" type="hidden" value="2">
					<button type="submit" class="form-control btn-info Login">Send OTP</button>
					</div>
					</div>
					<div class="register-terms">
						<p>By Signing up, you agree to <a href="#">terms &amp; conditons</a></p>
					</div>
				
                                    <?php echo $this->Form->end(); ?>
				</div>
		</div>
	  </div>
            <?php }else{?>
            <div class="right" style="margin-top: 100px;">Yor already logedin  <li><a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'logout')); ?>" class="active">Logout</a></li> </div>
  <?php } ?>
	</div>
  </main>

    <script>
    $(document).ready(function () {
       $("#clinicregister").validate({
            rules: {
                "data[User][cnfpassword]": {
                    required: true,
                    equalTo: "#passwrd"
                },
            },
            messages: {
                "data[User][cnfpassword]": {equalTo: "Confirm password does not match."}
            }
			
        });
    });
  </script>