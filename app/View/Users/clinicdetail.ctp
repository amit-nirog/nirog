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
            <div class="col-lg-8 col-lg-offset-2">
            <?php echo $this->element('sidebar'); ?>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Form->create(false, ['id' => 'xxx', 'url' => '/users/personal/' . $clinicDetails['User']['id']]); ?>
            <div class="main col-md-9 col-sm-8 col-xs-12">
                <h2>Edit Your Profile<span><a href="#">View Profile</a></span></h2>




                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>CLinic Name</label>
                        <input type="text" name="data[User][first_name]"  value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['first_name'];
                        }
                        ?>" class="form-control" />
                    </div>
                    <input name="data[User][id]" type="hidden" value="<?php echo $clinicDetails['User']['id']; ?>">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Email </label>
                        <input name="data[User][email]" type="email" value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['email'];
                        }
                        ?>" placeholder="Email Address" class="form-control" required=""/>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Mobile Number<span>*</span></label>
                        <input type="text"   id="mobile text" name="data[User][mobile_no]" maxlength="10" value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['mobile_no'];
                        }
                        ?>" placeholder="Mobile Number" class="form-control" />
                        <span id="mob"></span>
                        <span id="mobs"></span>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Website </label>
                        <input type="text" name="data[User][website]" value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['website'];
                        }
                        ?>" placeholder="Enter URL" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label>Street Address</label>
                        <input type="text" name="data[User][address]" value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['address'];
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
                                <option <?php if ($clinicDetails['User']['country_id'] == $country['Country']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $country['Country']['id'] ?>' >
                                    <?php echo $country['Country']['country_name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 form-group">
                        <label>City</label>
                        <input name="data[User][city]" type="text" value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['city'];
                        }
                        ?>" placeholder="Enter City Name" class="form-control" />
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Locality</label>
                        <input name="data[User][locality]" type="text" value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['locality'];
                        }
                        ?>" placeholder="Enter Locality Name" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>State/Province/Region</label>
                        <input name="data[User][state]" type="text" value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['state'];
                        }
                        ?>" placeholder="State/Province/Region" class="form-control" />
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Zip/Postal Code</label>
                        <input name="data[User][zipcode]" type="text" value="<?php
                        if (!empty($clinicDetails)) {
                            echo $clinicDetails['User']['zipcode'];
                        }
                        ?>" placeholder="Zip/Postal Code" class="form-control" />
                    </div>
                </div>
                
               

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Short Introduction</label>
                        <textarea rows="" cols=""  name="data[User][short_desc]" class="form-control" placeholder="Short Introduction"><?php
                            if (!empty($clinicDetails)) {
                                echo $clinicDetails['User']['short_desc'];
                            }
                            ?></textarea>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>General Description</label>
                        <textarea rows="" cols="" name="data[User][general_desc]" class="form-control" placeholder="General Description"><?php
                            if (!empty($clinicDetails)) {
                                echo $clinicDetails['User']['general_desc'];
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