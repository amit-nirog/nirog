  
<main class="o-content position-rel_40"> 
    <div class="container">
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
                    <div class="box margin-top">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group"><h4>Join as a Doctor/Clinic</h4></div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group text-right"><h4></h4></div>
                        </div>

                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->Form->create('User', array('id' => 'signin', 'novalidate' => 'true', 'url' => array('controller' => 'Users', 'action' => 'signin'), "inputDefaults" => array("maxlength" => "100", "legend" => false, "label" => false, "div" => false, "required" => false))); ?> 
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>E-Mail Address</label>
                                <?php echo $this->Form->input('User.email', array('type' => 'email', 'id' => 'username', 'class' => "form-control input-block-level txtfield required", 'autocomplete' => "off", "placeholder" => "Username - Email", 'tabindex' => '3', "label" => false)); ?>	
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label>Password</label>
                                <?php echo $this->Form->input('User.password', array('type' => 'password', 'id' => 'passwrd', 'class' => "form-control input-block-level txtfield required", 'minlength' => 6, 'maxlength' => 20, 'autocomplete' => "off", "placeholder" => "Password", 'tabindex' => '5', "label" => false)); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group text-right">
                                <label><a href="">Forgot Password</a></label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <input value="Login" name="submit" class="form-control btn-info Login" type="submit">
                            </div>
                        </div>

                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        
    </div>
</main>




