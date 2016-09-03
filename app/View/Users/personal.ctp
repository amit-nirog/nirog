<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({
            showOn: "button",
            buttonImage: "../images/calendar.gif",
            buttonImageOnly: true,
            buttonText: "Select date"
        });
    });
</script>

<section class="content">

    <div class="container">
        <div class="row">
            <?php echo $this->element('sidebar'); 
                echo $this->element('message'); 
             echo $this->Form->create(false, array('id' => 'personal', 'url' => array('controller'=>'users','action'=>'personal'))); ?>
            <div class="main col-md-9 col-sm-8 col-xs-12">
                <h2>Edit Your Profile<span><a href="#">View Profile</a></span></h2>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Name</label>
                        <input type="text" name="data[User][first_name]"  value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['first_name'];
                        }
                        ?>" class="form-control" />
                    </div>
                    <input name="data[User][id]" type="hidden" value="<?php echo $userInfo['User']['id']; ?>">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Email Address</label>
                        <input name="data[User][email]" type="email" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['email'];
                        }
                        ?>" placeholder="Email Address" class="form-control" required=""/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label>Gender <dl><input type="radio" name="data[User][gender]" <?php if ($userInfo['User']['gender'] == "male") { ?> checked="checked" <?php } ?> value="male" /> Male</dl>
                            <dl><input type="radio" name="data[User][gender]" <?php if ($userInfo['User']['gender'] == "female") { ?> checked="checked" <?php } ?> value="female" /> Female</dl></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Mobile Number<span>*</span></label>
                        <input type="text"   id="mobile text" name="data[User][mobile_no]" maxlength="10" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['mobile_no'];
                        }
                        ?>" placeholder="Mobile Number" class="form-control" />
                        <span id="mob"></span>
                        <span id="mobs"></span>
                    </div>
                    
                    <script>
                        $(function(){
  $('#txt').keypress(function(e){
    if(e.which == 97 || e.which == 98 || e.which == 99 || e.which == 110 || e.which == 111 || e.which == 65 || e.which == 66 || e.which == 67 || e.which == 78 || e.which == 79 || e.which == 49 || e.which == 50 || e.which == 51 || e.which == 52 || e.which == 53){
    } else {
      return false;
    }
  });
});
                        </script>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Alternate Number</label>
                        <input type="text" name="data[User][alternate_mobile_non]" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['alternate_mobile_non'];
                        }
                        ?>" placeholder="Alternate Number" id="mobile1" maxlength="10"class="form-control" />
                        <span id="mob1"></span>
                        <span id="mobs1"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label>Street Address</label>
                        <input type="text" name="data[User][address]" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['address'];
                        }
                        ?>" placeholder="Street Address" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 form-group">
                        <label>Country</label>
                        <select name="data[User][country_id]" class="form-control">
                            <option>Select Country</option>
                            <?php foreach ($countryList as $country) { ?>
                                <option <?php if ($userInfo['User']['country_id'] == $country['Country']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $country['Country']['id'] ?>' >
                                    <?php echo $country['Country']['country_name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 form-group">
                        <label>City</label>
                        <input name="data[User][city]" type="text" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['city'];
                        }
                        ?>" placeholder="Enter City Name" class="form-control" />
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Locality</label>
                        <input name="data[User][locality]" type="text" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['locality'];
                        }
                        ?>" placeholder="Enter Locality Name" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>State/Province/Region</label>
                        <input name="data[User][state]" type="text" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['state'];
                        }
                        ?>" placeholder="State/Province/Region" class="form-control" />
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Zip/Postal Code</label>
                        <input name="data[User][zipcode]" type="text" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['zipcode'];
                        }
                        ?>" placeholder="Zip/Postal Code" class="form-control" />
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker4').datetimepicker({
                            pickTime: false
                        });
                    });
                </script>
                <div class="row">


                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Date of Birth</label>
                        <input id="datepicker" name="data[User][date_of_birth]" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['date_of_birth'];
                        }
                        ?>" placeholder="dd/mm/yy" class="form-control" />
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                            </i>
                        </span>
                    </div>


                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Website </label>
                        <input type="text" name="data[User][website]" value="<?php
                        if (!empty($userInfo)) {
                            echo $userInfo['User']['website'];
                        }
                        ?>" placeholder="Enter URL" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Short Introduction</label>
                        <textarea rows="" cols=""  name="data[User][short_desc]" class="form-control" placeholder="Short Introduction"><?php
                            if (!empty($userInfo)) {
                                echo $userInfo['User']['short_desc'];
                            }
                            ?></textarea>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>General Description</label>
                        <textarea rows="" cols="" name="data[User][general_desc]" class="form-control" placeholder="General Description"><?php
                            if (!empty($userInfo)) {
                                echo $userInfo['User']['general_desc'];
                            }
                            ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <input type="submit" value="Save Changes" name="submit" class="form-control btn-info" />
                    </div>
                </div>

            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

</section>

<script>
   var bAlertCalled = false;

$("#mobile").on('keyup blur', function (e) {
    if (bAlertCalled === true) {
        bAlertCalled = false;
        return;
    }

    if ($(this).val().length > 0) {
        var iLength = parseInt($(this).val());

           switch (true) {
            case !$.isNumeric($(this).val()):
                bAlertCalled = true;
                $(this).focus();
                $("#mobs").html("Please enter a numeric value.");
                break

               case (iLength  < 10) || (iLength  > 10):
                bAlertCalled = true;
                $(this).focus();
                 $("#mob").html("Length must be 10 digit.");

                
                break;

            default:
        }
    }
});
$("#mobile1").on('keyup blur', function (e) {
    if (bAlertCalled === true) {
        bAlertCalled = false;
        return;
    }

    if ($(this).val().length > 0) {
        var iLength = parseInt($(this).val());

           switch (true) {
            case !$.isNumeric($(this).val()):
                bAlertCalled = true;
                $(this).focus();
                $("#mobs1").html("Please enter a numeric value.");
                return false;
                break

               case (iLength  < 10) || (iLength  > 10):
                bAlertCalled = true;
                $(this).focus();
                 $("#mob1").html("Length must be 10 digit.");
                return false;
                
                break;

            default:
        }
    }
});
</script>