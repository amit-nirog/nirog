<main class="o-content position-rel_40"> 
	<div class="container">
	  <div class="login-wrapper">
		<div class="col-md-6 col-sm-12">
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
				<div class="box margin-top80">
				<div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group"><h4>Join as a Doctor/Clinic</h4></div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group text-right"><h4>Hi! <span><?php echo $userDetail['User']['first_name']; ?></span></h4></div>
					</div>
					
				
			
					<?php echo $this->Session->flash(); ?>
                                   <form action="otp" method="post">
				<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
					<label>Please Enter the OTP Send to <?php echo $userDetail['User']['mobile_no']; ?><span></span></label>
					<input type="text" name="data[User][token]" class="form-control" placeholder="Enter OTP">
                                        <input type="hidden" name="data[User][id]" value="<?php echo $userDetail['User']['id']; ?>" class="form-control" placeholder="Enter OTP">
					</div>
					</div>
					<div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
					<button type="submit" class="form-control btn-info Login">Submit</button>
					</div>
					</div>
                                   </form>
                                   <a href="changenumber">Change Number </a>
				</div>
		</div>
	  </div>			
	</div>
  </main>
