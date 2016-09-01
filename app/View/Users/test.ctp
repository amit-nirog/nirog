<?php echo $this->Html->script(array('jquery.datepick', 'script-menu', 'custom-file-input', 'gulpfile', 'jquery.tagsinput')); ?>
<?php echo $this->Html->css(array('component', 'jquery.datepick', 'jquery.tagsinput')); ?>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
<script>
    $(function () {
        $(".box-pro ul.list1 li a").click(function () {
            $(".box-pro ul.list1 li a").removeClass("active");
            $(this).addClass("active");
            return true;
        });

    });
</script>
<script>
    $(function () {
        $('#popupDatepicker').datepick();
    });
    function showDate(date) {
        alert('The date chosen is ' + date);
    }
</script>
<script type="text/javascript">

    function onAddTag(tag) {
        alert("Added a Specializations: " + tag);
    }
    function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
    }

    $(function () {

        $('#tags_1').tagsInput({width: 'auto'});


    });

</script>
<section class="position-rel_40"> 
    <div class="container">
        <div class="box-pro position-rel_40">
            <div class="col-md-3">

                <?php echo $this->Form->create('User', array('type' => 'file', 'url' => 'uploadimg')); ?>
                <div class="doctor-pro-img">
                    <center><img src="<?php echo PROFILE_URL . '/' . $userDetails['User']['image']; ?>" class="proimg"></center>                   
                    <p> <input type="file" name="data[User][image]" class="img"></p>
                </div>
                <?php echo $this->Form->end(); ?>
                <?php echo $this->Html->script('jquery.form.min'); ?>
                <script type="text/javascript">
                    $('.img').on("change", function () {
                        $('#UserProfileForm').ajaxSubmit({
                            success: function (d) {
                                $('.proimg').attr("src", "<?php echo $this->Html->url("/img/"); ?>" + d.img);
                            }
                        });
                    });
                </script>
                <ul class="list1">
                    <li><a class="active" data-toggle="tab" href="#tab1"><i class="fa fa-user"></i>Personal Information</a></li>
                    <li><a data-toggle="tab" href="#tab2"><i class="fa fa-user-md"></i>Professional Information</a></li>
                    <li><a data-toggle="tab" href="#tab3"><i class="fa fa-file"></i>Documents</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <!----tab--->
                <div class="tab-content result">	
                    <div id="tab1" class="register-right tab-pane fade  in active">	
                        <div class="box">
                            <h2 class="edit-profile">Edit Your Profile</h2>
                            <?php echo $this->Session->flash(); ?>
                            <?php echo $this->Form->create(false, ['id' => 'xxx', 'url' => '/users/profile/' . $userDetails['User']['id']]); ?>
                            <ul class="register-list">
                                <li>
                                    <label>First Name</label>
                                    <input name="data[User][first_name]" type="text" value="<?php
                                    if (!empty($userDetails)) {
                                        echo $userDetails['User']['first_name'];
                                    }
                                    ?>" placeholder="First Name">
                                </li>
                                <input name="data[User][id]" type="hidden" value="<?php echo $userDetails['User']['id']; ?>">

                                <li>
                                    <label>Last Name</label>
                                    <input name="data[User][last_name]" type="text" value="<?php
                                    if (!empty($userDetails)) {
                                        echo $userDetails['User']['last_name'];
                                    }
                                    ?>" placeholder="Last Name">
                                </li>

                                <li style="width:100%;">
                                    <label>Gender</label>
                                    <div class="gender-reg">
                                        <div class="one">
                                            <input  name="data[User][gender]" <?php if ($userDetails['User']['gender'] == "male") { ?> checked="checked" <?php } ?> value="male" id="radio" class="radio-custom" name="radio" type="radio">
                                            <label for="radio" class="radio-custom-label"></label>
                                        </div>
                                        <div class="two">Male</div>
                                    </div>
                                    <div class="gender-reg">
                                        <div class="one">
                                            <input  name="data[User][gender]" <?php if ($userDetails['User']['gender'] == "female") { ?> checked="checked" <?php } ?> value="female" id="radio1" class="radio-custom" name="radio" type="radio">
                                            <label for="radio1" class="radio-custom-label"></label>
                                        </div>
                                        <div class="two">Female</div>
                                    </div>
                                </li>
                                <li>
                                    <label>E-Mail Address</label>
                                    <input type="text" name="data[User][email]" value="<?php
                                    if (!empty($userDetails)) {
                                        echo $userDetails['User']['email'];
                                    }
                                    ?>"  placeholder="E-Mail Address">
                                </li>
                                <li>
                                    <label>Mobile Number</label>
                                    <input type="text" name="data[User][mobile_no]" value="<?php
                                    if (!empty($userDetails)) {
                                        echo $userDetails['User']['mobile_no'];
                                    }
                                    ?>" placeholder="Mobile Number">
                                </li>
                                <li>
                                    <label>Alternate Number</label>
                                    <input type="text" name="data[User][alternate_mobile_non]" value="<?php
                                    if (!empty($userDetails)) {
                                        echo $userDetails['User']['alternate_mobile_non'];
                                    }
                                    ?>" placeholder="Alternate Number">
                                </li>
                                <li>
                                    <label>Date of Birth</label>
                                    <input type="text" name="data[User][date_of_birth]" value="<?php
                                    if (!empty($userDetails)) {
                                        echo $userDetails['User']['date_of_birth'];
                                    }
                                    ?>"id="popupDatepicker" placeholder="Date of Birth">
                                </li>
                                <li>
                                    <label>Website</label>
                                    <input type="text" name="data[User][website]" value="<?php
                                    if (!empty($userDetails)) {
                                        echo $userDetails['User']['website'];
                                    }
                                    ?>" placeholder="Website URL">
                                </li>
                                <li>
                                    <label>Country</label>
                                    <select name="data[User][country_id]">
                                        <option>Select Country</option>
                                        <?php foreach ($countryList as $country) { ?>
                                            <option <?php if ($userDetails['User']['country_id'] == $country['Country']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $country['Country']['id'] ?>' >
                                                <?php echo $country['Country']['country_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </li>
                                <li>
                                    <label>State</label>
                                    <select name="data[User][state_id]">
                                        <option>Select State</option>
                                        <?php foreach ($stateList as $state) { ?>
                                            <option <?php if ($userDetails['User']['state_id'] == $state['State']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $state['State']['id'] ?>' >
                                                <?php echo $state['State']['state_name']; ?>
                                            </option> 
                                        <?php } ?>
                                    </select>
                                </li>
                                <li>
                                    <label>City</label>
                                    <select name="data[User][city_id]">
                                        <option>Select City</option>
                                        <?php foreach ($cityList as $city) { ?>
                                            <option <?php if ($userDetails['User']['city_id'] == $city['City']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $city['City']['id'] ?>' >
                                                <?php echo $city['City']['city_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </li>
                                <li>
                                    <label>Location</label>
                                    <select name="data[User][location_id]">
                                        <option>Select Location</option>
                                        <?php foreach ($locationList as $location) { ?>
                                            <option <?php if ($userDetails['User']['location_id'] == $location['Location']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $location['Location']['id'] ?>' >
                                                <?php echo $location['Location']['location']; ?>
                                            </option> 
                                        <?php } ?>
                                    </select>
                                </li>
                                <li>
                                    <label>Address</label>
                                    <textarea rows="5" name="data[User][address]" placeholder="Address"> <?php
                                        if (!empty($userDetails)) {
                                            echo $userDetails['User']['address'];
                                        }
                                        ?></textarea>
                                </li>
                                <button type="submit" class="button-otp">Save Changes</button>

                            </ul>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <?php echo $this->Session->flash(); ?>
                        <h2 class="edit-profile">Edit Your Profile</h2>
                        <?php echo $this->Form->create(false, ['id' => 'xxx', 'url' => '/users/profile1/' . $userDetails['User']['id']]); ?>
                        <ul class="pro-tab2">
                            <li>
                                <h2 class="pro-label">Doctor Type</h2>
                                <select name="data[Professional][type_id]">
                                    <option>Select Type</option>
                                    <?php foreach ($typeList as $type) { ?>

                                        <option <?php if ($userDetails['Professional']['type_id'] == $type['DoctorType']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $type['DoctorType']['id']; ?>' >
                                            <?php echo $type['DoctorType']['type_name']; ?>
                                        </option>  
                                    <?php } ?>
                                </select>
                            </li>
                            <li>
                                <h2 class="pro-label">Consultation Fee</h2>
                                <input type="text" name="data[Professional][fee]" value="<?php
                                if (!empty($userDetails['Professional']['fee'])) {
                                    echo $userDetails['Professional']['fee'];
                                }
                                ?>" placeholder="Fee">
                            </li>
                            <input type="hidden" name="data[Professional][user_id]" value="<?php echo $userDetails['User']['id']; ?>" placeholder="Fee">
                            <li style="width:100%">

                                <h2 class="pro-label">Availability <span class="green-text12"><sup>&#9733;</sup>you can add multiple time slots</span></h2>
                                <ul class="doc-time-list">
                                    <li>
                                        <input type="checkbox" value="MON" name="day[]" class="day" >MON
                                        <input type="checkbox" value="TUE" name="day[]" class="day" >TUE
                                        <input type="checkbox" value="WED" name="day[]" class="da" >WED
                                        <input type="checkbox" value="THU" name="day[]" class="da" >THU
                                        <input type="checkbox" value="FRI" name="day[]" class="da" >FRI
                                        <input type="checkbox" value="SAT" name="day[]" class="day" >SAT
                                        <input type="checkbox" value="SUN" name="day[]" class="day" >SUN

                                    </li>
                                    <li>
                                        <input type="text" placeholder="From" class="Docdaytime">
                                        <select class="DocStatDayTime" id="tj">
                                            <option value="AM" >AM</option>
                                            <option value="PM" >PM</option>
                                        </select>
                                    </li>
                                    <li>
                                        <p>To</p>
                                    </li>
                                    <li>
                                        <input type="text" placeholder="To" class="Docnighttime">
                                        <select class="DocStatnightTime" id="jk">

                                            <option value="AM" >AM</option>
                                            <option value="PM" >PM</option>
                                        </select>
                                    </li>
                                    <li>
                                        <button type="button" class="DocTimeAdd">ADD</button>
                                    </li>
                                </ul>

                                <div class="clear-fix"></div>

                                <!------result--->
                                <div class="pre-result DocTime" data-bind="foreach: DocTimeList" >
                                    <div class="col-md-4 box" >
                                        <ul class="result-doc" >
                                            <li data-bind="text: days">MON</li>
                                            <li>-</li>
                                            <li data-bind="text: StartTime">12 AM</li>
                                            <li>to</li>
                                            <li data-bind="text: EndTime">11 AM</li>
                                            <li style="float:right;"><button type="button" class="close-doc1" data-bind="click: $root.DeleteDocTime,attr: {'id':id}"><i class="fa fa-times"></i></button></li>
                                        </ul>
                                    </div>
                                </div>									
                                <!------result--->

                            </li>
                            <li style="width:100%; float:left;" class="tab-active-box">
                                <h2 class="pro-label ">Qualification</h2>
                                <input type="radio"  value="under" name="data[Professional][qualification]"><label class="pro-label-select">Under Graduate</label>
                                <input type="radio"  value="post" name="data[Professional][qualification]"><label class="pro-label-select"> Post Graduate</label>
                            </li>

                            <li style="width:100%">		
                                <ul class="doc-edu-list">
                                    <li>
                                        <h2 class="pro-label">Degree</h2>
                                        <select class="deg">
                                            <option>Select Degree</option>
                                            <?php foreach ($degreeList as $degree) { ?>
                                                <option value="<?php echo $degree['Degree']['id']; ?>"> <?php echo $degree['Degree']['degree_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li>
                                        <h2 class="pro-label">Year</h2>
                                        <input type="text" placeholder="Enter Year" class="ColYear">
                                    </li>
                                    <li>
                                        <h2 class="pro-label">College Name</h2>
                                        <select class="SelCollage">
                                            <option>Select Collage</option>
                                            <?php foreach ($collageList as $collage) { ?>
                                                <option value="<?php echo $collage['Collage']['id']; ?>"><?php echo $collage['Collage']['collage_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li>
                                        <h2 class="pro-label">University</h2>
                                        <input type="text" placeholder="University Name" class="UniName">
                                    </li>
                                    <li>
                                        <h2 class="pro-label"></h2>
                                        <button type="button" class="btn" >ADD</button>
                                    </li>
                                </ul>

                                <div class="clear-fix"></div>
                                <!--------------------------------------------------------result for List----------------------------------------->
                                <!--------------------------------------------------------result for List----------------------------------------->


                                <?php // echo $this->Form->create(false, array('url'=>array('controller'=>'Qualifications', 'action'=>'uploaddegree')),array('type'=>'file'));  ?>
                                </form>
                                <div data-bind="foreach: List" class="Docpro">
                                    <div class="pre-result">
                                        <div class="col-md-7 box" >
                                            <ul class="result-doc">
                                                <li data-bind="text: UniName">Room</li>
                                                <li data-bind="text: Year">2014</li>
                                                <li style="float:right;"><button type="button" class="close-doc1" data-bind="click: $root.click,attr: {'id':id}"><i class="fa fa-times"></i></button></li>
                                            </ul>
                                        </div>
                                        <!--                                        <div class="col-md-5 box">
                                                                                    <div class="upload-doc">
                                                                                        <div class="box">
                                                                                            <form action="<?php //echo $this->Html->url('/', true)        ?>Qualifications/uploaddegree" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                                                                <input data-bind="attr:{id:'fl-' + $index}" type="file" name="data[Qualifications][image][]" onchange="obj.uploadimg(this)" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                                                                            <label data-bind="attr:{for:'fl-' + $index}"><span>Click to Upload Degree</span></label>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>-->
                                    </div>
                                    </form>
                                </div>

                                <!------result--->
                            </li>

                            <li>
                                <div class="col-md-10 padding-left">
                                    <h2 class="pro-label">Any Additional Course</h2>
                                    <input type="text" class="course" placeholder="Enter course name click add" style="width:100%;">
                                </div>
                                <div class="col-md-1 padding-left">
                                    <h2 class="pro-label"></h2>
                                    <button type="button" class="dree-btn coadd"><i class="fa fa-plus"></i></button>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-10 padding-left">
                                    <h2 class="pro-label">Awards and Recognitions</h2>
                                    <input type="text" class="award" placeholder="Enter course name click add" style="width:100%;">
                                </div>
                                <div class="col-md-1 padding-left">
                                    <h2 class="pro-label"></h2>
                                    <button type="button" class="dree-btn awadd"><i class="fa fa-plus"></i></button>
                                </div>
                            </li>
                            <li>
                                <h2 class="pro-label">Registration Board</h2>
                                <select name="data[Professional][board_id]">
                                    <option>Select Board</option>
                                    <?php foreach ($boardList as $board) { ?>
                                        <option <?php if ($userDetails['Professional']['board_id'] == $board['Board']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $board['Board']['id']; ?>' >
                                            <?php echo $board['Board']['board_name']; ?>
                                        </option> 
                                    <?php } ?>
                                </select>
                            </li>
                            <li>
                                <h2 class="pro-label">Registration Number</h2>
                                <input type="text" name="data[Professional][reg_number]" value="<?php
                                if (!empty($userDetails['Professional']['reg_number'])) {
                                    echo $userDetails['Professional']['reg_number'];
                                }
                                ?>" placeholder="Registration Number">
                            </li>

                            <!--                            <li>
                                                            <div class="col-md-10 padding-left">
                                                                <h2 class="pro-label">Any Additional Course</h2>
                                                                <input type="text" placeholder="Enter course name click add" style="width:100%;">
                                                            </div>
                                                            <div class="col-md-1 padding-left">
                                                                <h2 class="pro-label"></h2>
                                                                <button type="button" class="dree-btn"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        </li>-->
                            <!--                            <li>
                                                            <div class="col-md-10 padding-left">
                                                                <h2 class="pro-label">Awards and Recognitions</h2>
                                                                <input type="text" placeholder="Enter course name click add" style="width:100%;">
                                                            </div>
                                                            <div class="col-md-1 padding-left">
                                                                <h2 class="pro-label"></h2>
                                                                <button type="button" class="dree-btn"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        </li>-->

                            <li>
                                <h2 class="pro-label">Membership</h2>
                                <input type="text" name="data[Professional][membership]" value="<?php
                                if (!empty($userDetails['Professional']['membership'])) {
                                    echo $userDetails['Professional']['membership'];
                                }
                                ?>" placeholder="Services Type">
                            </li>
                            <li>
                                <div class="col-md-6" style="padding:0px;">
                                    <h2 class="pro-label">Experience</h2>
                                    <input type="text" name="data[Professional][year]" value="<?php
                                    if (!empty($userDetails['Professional']['year'])) {
                                        echo $userDetails['Professional']['year'];
                                    }
                                    ?>" placeholder="Year">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <h2 class="pro-label"></h2>
                                    <input type="text" name="data[Professional][month]" value="<?php
                                    if (!empty($userDetails['Professional']['month'])) {
                                        echo $userDetails['Professional']['month'];
                                    }
                                    ?>" placeholder="Month">
                                </div>
                            </li>
                            <li>
                                <h2 class="pro-label">Services Type </h2>
                                <input type="text" name="data[Professional][service_type]" value="<?php
                                if (!empty($userDetails['Professional']['service_type'])) {
                                    echo $userDetails['Professional']['service_type'];
                                }
                                ?>" placeholder="Services Type">
                            </li>

                            <li style="width:100%">	
                                <h2 class="pro-label">Specializations <span class="green-text12"><sup>&#9733;</sup>seperate with commas (.)</span></h2>
                                <input id="tags_1" type="text" name="data[Professional][specialization]" class="tags" value="<?php
                                if (!empty($userDetails['Professional']['specialization'])) {
                                    echo $userDetails['Professional']['specialization'];
                                }
                                ?>" />
                            </li>
                            <button type="submit" class="button-otp">Save Changes</button>							
                        </ul>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div id="tab3" class="tab-pane fade">
                        <h2 class="edit-profile">Edit Your Profile
                            <a href="#"><span class="green-text12" style="float:right">View Profile</span></a>
                        </h2>
                        <ul class="pro-tab2 margin-top20">

                            <li>
                                <h2 class="pro-label margin-empty">Bachelors Degree</h2>
                                <div class="upload-doc">

                                    <form action="<?php echo $this->Html->url('/', true) ?>users/bachlor" id="bachlors" enctype="multipart/form-data" method="post" accept-charset="utf-8">         
                                        <div class="box">
                                            <div id="stage"></div>
                                            <?php if (!empty($userDetails['User']['bachlor'])) { ?>  <img style="height:100px;width:100px;" src="<?php echo IMG_URL . 'gh.jpg'; ?>"  class="bachimg"> <?php
                                                echo $userDetails['User']['bachlor'];
                                            }
                                            ?>
                                            <input type="file" name="data[User][bachlor]" id="file-3" class="inputfile bach inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                            <label for="file-3" style="left:0px; width:100%; text-align:center;"><span>Click to Upload </span></label>
                                        </div>
                                    </form>
                                </div>


                                <script type="text/javascript">
                                    $('.bach').on("change", function () {
                                        $('#bachlors').ajaxSubmit({
                                            success: function (d) {
                                                if (d.r = 1) {
                                                    $("#stage").html("success");
                                                } else {
                                                    $("#stage").html("please upload again");
                                                }
                                                $('.bachimg').attr("src", "<?php echo $this->Html->url("/images/"); ?>" + "gh.jpg");
                                            }
                                        });
                                    });
                                </script>
                            </li>
                            <li>
                                <h2 class="pro-label margin-empty">Master Degree</h2>
                                <div class="upload-doc">
                                    <form action="<?php echo $this->Html->url('/', true) ?>users/master" id="masters" enctype="multipart/form-data" method="post" accept-charset="utf-8"> 
                                        <div class="box">
                                            <div id="stage1"></div>
                                            <?php if (!empty($userDetails['User']['master'])) { ?>  <img style="height:100px;width:100px;" src="<?php echo IMG_URL . 'gh.jpg'; ?>"  class="masterimg"> <?php
                                                echo $userDetails['User']['master'];
                                            }
                                            ?>
                                            <input type="file" name="data[User][master]"   id="file-4" class="inputfile mat inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                            <label for="file-4" style="left:0px; width:100%; text-align:center;"><span>Click to Upload </span></label>
                                        </div>
                                    </form>
                                </div>


                                <script type="text/javascript">
                                    $('.mat').on("change", function () {
                                        $('#masters').ajaxSubmit({
                                            success: function (d) {
                                                if (d.r = 1) {
                                                    $("#stage1").html("success");
                                                } else {
                                                    $("#stage1").html("please upload again");
                                                }
                                                $('.masterimg').attr("src", "<?php echo $this->Html->url("/images/"); ?>" + "gh.jpg");
                                            }
                                        });
                                    });
                                </script>
                            </li>
                            <li>
                                <h2 class="pro-label margin-empty">Registration No. Proof</h2>
                                <div class="upload-doc">
                                    <form action="<?php echo $this->Html->url('/', true) ?>users/proff" id="registerss" enctype="multipart/form-data" method="post" accept-charset="utf-8"> 
                                        <div class="box">
                                            <div id="stage2"></div>
                                            <?php if (!empty($userDetails['User']['rg_proff'])) { ?>  <img style="height:100px;width:100px;" src="<?php echo IMG_URL . 'gh.jpg'; ?>"  class="reg"> <?php
                                                echo $userDetails['User']['rg_proff'];
                                            }
                                            ?>           
                                            <input type="file" name="data[User][rg_proff]" id="file-5" class="inputfile resrs inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                            <label for="file-5" style="left:0px; width:100%; text-align:center;"><span>Click to Upload </span></label>
                                        </div>
                                    </form>
                                </div>
                                <script type="text/javascript">
                                    $('.resrs').on("change", function () {
                                        $('#registerss').ajaxSubmit({
                                            success: function (d) {
                                                if (d.r = 1) {
                                                    $("#stage2").html("success");
                                                } else {
                                                    $("#stage2").html("please upload again");
                                                }
                                                $('.reg').attr("src", "<?php echo $this->Html->url("/images/"); ?>" + "gh.jpg");
                                            }
                                        });
                                    });
                                </script>

                            </li>
                            <li>
                                <h2 class="pro-label margin-empty">Additional Certificates</h2>
                                <div class="upload-doc">
                                    <form action="<?php echo $this->Html->url('/', true) ?>users/certificate" id="certifice" enctype="multipart/form-data" method="post" accept-charset="utf-8"> 
                                        <div class="box">
                                            <div id="stage3"></div>
                                            <?php if (!empty($userDetails['User']['add_certificate'])) { ?>  <img style="height:100px;width:100px;" src="<?php echo IMG_URL . 'gh.jpg'; ?>"  class="czsd"> <?php
                                                echo $userDetails['User']['add_certificate'];
                                            }
                                            ?>  
                                            <input type="file" name="data[User][add_certificate]" id="file-6" class="inputfile cer inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                            <label for="file-6" style="left:0px; width:100%; text-align:center;"><span>Click to Upload</span></label>
                                        </div>
                                    </form>
                                </div>

                                <script type="text/javascript">
                                    $('.cer').on("change", function () {
                                        $('#certifice').ajaxSubmit({
                                            success: function (d) {
                                                if (d.r = 1) {
                                                    $("#stage3").html("success");
                                                } else {
                                                    $("#stage3").html("please upload again");
                                                }
                                                $('.czsd').attr("src", "<?php echo $this->Html->url("/images/"); ?>" + "gh.jpg");
                                            }
                                        });
                                    });
                                </script>
                            </li>

                            <!--                            <li style="width:100%">		
                                                            <h2 class="pro-label margin-empty">Add Other Documents</h2>
                                                            <input type="text" placeholder="Name of Documents" style="width:70%; border-radius:0px">
                                                            <button class="doc-btn" type="submit" value="" title="Upload">Upload FIle</button>
                                                        </li>													-->
                        </ul>				  
                    </div>
                </div>		
                <!----tab--->
            </div>  	
        </div>				
    </div>
</section>
<?php echo $this->Html->script('knockout-3.4.0'); ?>
<script type="text/javascript">
    var ProfileVm = function () {
        var me = this;
        me.Year = ko.observable();
        me.UniName = ko.observable();
        me.id = ko.observable();
        me.List = ko.observableArray([]);

        var collage_id;
        var deg_id;
        var ur = "<?php echo $this->Html->url('/', true) ?>";
        $('.SelCollage').on("change", function () {
            deg_id = $(this).val();

        });
        $('.deg').on("change", function () {
            collage_id = $(this).val();

        });
        $('.btn').on("click", function () {
            var year = $('.ColYear').val();
            var uni = $('.UniName').val();
            $.post("" + ur + "Qualifications/add", {
                "data[Qualification][year]": year,
                "data[Qualification][university]": uni,
                "data[Qualification][degree_id]": deg_id,
                "data[Qualification][collage_id]": collage_id
            }, function (d) {
                me.List.push({
                    Year: d.year,
                    UniName: d.Univer,
                    id: d.InsetId
                });
            });
        });
        me.click = function (d, e) {
            console.log(d);
            var id = e.currentTarget.id;
            $.post("" + ur + "Qualifications/delete", {"data[Qualification][id]": id}, function (d) {
                console.log(d);
            });
            me.List.remove(d);
        }

        me.getQualificationList = function () {
            me.List([]);
            $.get("" + ur + "Qualifications/getQualification.json", function (d) {

                for (i in d.data) {
                    dt = d.data[i].Qualification;
                    console.log(dt);
                    me.List.push({
                        UniName: dt.university,
                        Year: dt.year,
                        id: dt.id
                    });
                }

            })
        }

        me._init = function () {
            me.getQualificationList();
        };
        me._init();

        me.uploadimg = function (e) {
            console.log(e);
            $(e).parents('form').ajaxSubmit({
                success: function (d) {
                    console.log(d);
                }
            });
        }
    }
    var obj = new ProfileVm();
    ko.applyBindings(obj, $('.Docpro')[0]);
</script>

<script type="text/javascript">

    var StartTimeday;
    var StartTimenight;
    var from;
    var to;
    var days;
    var ur = "<?php echo $this->Html->url('/', true) ?>";

    var DocTimeVm = function () {
        var me = this;
        me.days = ko.observable();
        me.StartTime = ko.observable();
        me.EndTime = ko.observable();
        me.DocTimeList = ko.observableArray([]);

        $('.DocStatDayTime').on("change", function () {
            StartTimeday = $(this).val();
        });
        $('.DocStatnightTime').on("change", function () {
            StartTimenight = $(this).val();
        });




        $('.DocTimeAdd').on("click", function () {
            var e = document.getElementById("tj");
            var StartTimeday = e.options[e.selectedIndex].value;
            var e = document.getElementById("jk");
            var StartTimenight = e.options[e.selectedIndex].value;

            var checkboxes = document.getElementsByName('day[]');
            var vals = "";
            for (var i = 0, n = checkboxes.length; i < n; i++)
            {
                if (checkboxes[i].checked)
                {
                    vals += "," + checkboxes[i].value;
                }
            }
            if (vals) {
                vals = vals.substring(1);
            }


            from = $('.Docdaytime').val();
            to = $('.Docnighttime').val();
            $.post("" + ur + "Times/add", {
                "data[Time][days]": vals,
                "data[Time][start_time]": StartTimeday,
                "data[Time][end_time]": StartTimenight,
                "data[Time][from]": from,
                "data[Time][to]": to

            }, function (d) {
                console.log(d);
                if (d.r == 1) {
                    me.DocTimeList.push({
                        "days": vals,
                        "StartTime": from + "" + StartTimeday,
                        "EndTime": to + "" + StartTimenight,
                        "id": d.id
                    });
                }
            });

        });
        me.DeleteDocTime = function (d, e) {
            var id = e.currentTarget.id;
            $.post("" + ur + "Times/delete", {"data[Time][id]": id}, function (d) {
                console.log(d);
            });
            me.DocTimeList.remove(d);
        }

        me.getTimeList = function () {
            me.DocTimeList([]);
            $.get("" + ur + "Times/getTime.json", function (d) {

                for (i in d.data) {
                    dt = d.data[i].Time;
                    console.log(dt);
                    me.DocTimeList.push({
                        days: dt.days,
                        StartTime: dt.from + "" + dt.start_time,
                        EndTime: dt.to + "" + dt.end_time,
                        id: dt.id
                    });
                }

            })
        }
        me._init = function () {
            me.getTimeList();
        };
        me._init();
    }

    var DocTime = new DocTimeVm();
    ko.applyBindings(DocTime, $('.DocTime')[0])
</script>
<script>
     var Courses;
     var Awards
     var id;
    
    
    var ur = "<?php echo $this->Html->url('/', true) ?>";

    var DocTimeVm = function () {
        var me = this;
        me.Courses = ko.observable();
        me.Awards = ko.observable();
        
        me.DocCoursesList = ko.observableArray([]);
        me.DocAwardList = ko.observableArray([]);

        $('.coadd').on("click", function () {
           coursename = $('.course').val();
           $.post("" + ur + "Courses/add", {
                "data[Course][course_name]": coursename,
             }, function (d) {
                console.log(d);
                if (d.r == 1) {
                    me.DocCoursesList.push({
                        "Courses": coursename,
                        "id": d.id
                    });
                }
            });

        });
       
        $('.awadd').on("click", function () {
           awardname = $('.award').val();
           $.post("" + ur + "Awards/add", {
                "data[Award][award_name]": awardname,
             }, function (d) {
                console.log(d);
                if (d.r == 1) {
                    me.DocCoursesList.push({
                        "Awards": awardname,
                        "id": d.id
                    });
                }
            });

        });
       
        me._init = function () {
            me.getCoursesList();
        };
        me._init();
    }

    var DocCourse = new DocTimeVm();
    ko.applyBindings(DocCourse, $('.DocCourse')[0])
</script>