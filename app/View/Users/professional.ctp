<?php echo $this->Html->script(array('script-menu', 'custom-file-input', 'gulpfile', 'jquery.tagsinput')); ?>
<?php echo $this->Html->css(array('component', 'jquery.tagsinput')); ?>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
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
<section class="content">

    <div class="container">
        <div class="row">

            <?php echo $this->element('sidebar'); ?>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Form->create(false, array('id' => 'professional', 'url' => 'professional')); ?>
            <div class="main col-md-9 col-sm-8 col-xs-12">
                <h2>Edit Your Profile<span><a href="#">View Profile</a></span></h2>
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Speciality</label>


                        <select name="data[Professional][type_id]" class="form-control">
                            <option>Select Type</option>
                            <?php foreach ($typeList as $type) { ?>

                                <option <?php if ($userDetails['Professional']['type_id'] == $type['DoctorType']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $type['DoctorType']['id']; ?>' >
                                    <?php echo $type['DoctorType']['type_name']; ?>
                                </option>  
                            <?php } ?>
                        </select>



                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Consultation Fee</label>
                        <dt><i class="fa fa-inr"></i><input type="text" name="data[Professional][fee]" value="<?php
                            if (!empty($userDetails['Professional']['fee'])) {
                                echo $userDetails['Professional']['fee'];
                            }
                            ?>" placeholder="Fee" class="form-control" /></dt>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label >Your Availabilty <small>You can add multiple time slot</small></label>
                        <button type="button" class="btn btn-info" id="availability"><i class="fa fa-plus"></i> Add Your Availabilty</button>
                        <div class="box" id="mytime" style="display: none;">
                            <ul>
                                <li><input type="checkbox" name="day[]" value="Mon" /> Mon</li>
                                <li><input type="checkbox" name="day[]" value="Tue" /> Tue</li>
                                <li><input type="checkbox" name="day[]" value="Wed" /> Wed</li>
                                <li><input type="checkbox" name="day[]" value="Thu" /> Thu</li>
                                <li><input type="checkbox" name="day[]" value="Fri" /> Fri</li>
                                <li><input type="checkbox" name="day[]" value="Sat" /> Sat</li>
                                <li><input type="checkbox" name="day[]" value="Sun" /> Sun</li>
                            </ul>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                                    <div class="time"><input type="text" placeholder="From" class="form-control Docdaytime" name="" value="" /><select  id="tj" class="form-control DocStatDayTime"><option value="AM">AM</option> <option value="PM">PM</option></select></div>
                                    <div class="time"> - </div>
                                    <div class="time"><input type="text" placeholder="To" name="" class="form-control Docnighttime" value="" /><select class="form-control DocStatnightTime" id="jk"><option value="AM">AM</option> <option value="PM">PM</option></select></div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <button type="button" class="btn btn-info DocTimeAdd" type="submit">Add</button>   <button class="btn btn-info" id="timeca" type="reset">Cancel</button>
                                </div>
                            </div> 
                        </div>
                        <div class="clearfix"></div>


                        
                            <div class="row">
                                
                                    <div class="col-md-12">
                                <div class="pre-result DocTime" data-bind="foreach: DocTimeList" >
                                    <div class="disabled-box">
                                <ul class="result-doc" >
                                    <li data-bind="text: days">MON</li>
                                    <li>-</li>
                                    <li data-bind="text: StartTime">12 AM</li>
                                    <li>to</li>
                                    <li data-bind="text: EndTime">11 AM</li>
                                    <li><button type="button" class="close-doc1" data-bind="click: $root.DeleteDocTime,attr: {'id':id}"><i class="fa fa-times"></i></button></li>
                                </ul>
                            </div>
                                </div>
                                </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label>Add Qualification <small>You can add multiple Qualification</small></label>
                        <button type="button" class="btn btn-info" id="quats"><i class="fa fa-plus"></i> Add Qualification</button>
                    </div>
                </div>


                <div class="col-md-9 col-sm-12 col-xs-12 form-group" id="quali" style="display:none;">
                    <div class="boxs">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-6 form-group"><input type="radio" value="under" name="education" value="Under Graduate" /> Under Graduate</div>
                            <div class="col-md-4 col-sm-6 col-xs-6 form-group"><input type="radio" value="post" name="education" value="Under Graduate" /> Post Graduate</div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-6 form-group">
                                <label>Degree</label>
                                <select class="deg form-control">
                                    <option>Select Degree</option>
                                    <?php foreach ($degreeList as $degree) { ?>
                                        <option value="<?php echo $degree['Degree']['id']; ?>"> <?php echo $degree['Degree']['degree_name']; ?></option>
                                    <?php } ?>
                                    <option value="other">other</option>
                                </select>
                            </div>
                            <script>
                                $(".deg").change(function () {
                                    if ($(this).find("option:selected").text() == "other") {
                                        $("#otherCity").show();
                                    } else {
                                        $("#otherCity").hide();
                                    }
                                });
                            </script>
                        </div>


<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-6 form-group" id="otherCity" style="display:none">

                                <input type="text"class="form-control" placeholder="Other Degree"></input>
                            </div>

</div>


<div class="row">


                            <div class="col-md-12 col-sm-12 col-xs-6 form-group">
                                <label>Year</label>
                                <input type="text" placeholder="Enter Year" value="" name="" class="form-control ColYear" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6 form-group">
                                <label>College Name</label>
                                <input type="text" placeholder="Enter College Name" value="" name="" class="form-control SelCollage" />
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-6 form-group">
                                <label>University Name</label>
                                <input type="text" placeholder="Enter University Name" value="" name="" class="form-control UniName" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button type="button" class="btn btn-info btnsss">Add</button>   <button type="reset" id="caqu" class="btn btn-info">Cancel</button>
                            </div>
                        </div>

                    </div>
                </div>
<div class="row">
<div class="col-md-12">
                <div data-bind="foreach: List" class="Docpro">
                    <div class="pre-result">
                        
						<div class="disabled-box">
                            <ul class="result-doc">
                                <li data-bind="text: Degree"></li>
                                <li>,</li>
                                <li data-bind="text: Collage"></li>
                                <li>,</li>
                                <li data-bind="text: UniName"></li> 
                                <li>,</li>
                                <li data-bind="text: Year"></li>
                                <li style="float:right;"><button type="button" class="close-doc1" data-bind="click: $root.click,attr: {'id':id}"><i class="fa fa-times"></i></button></li>
                            </ul>
						</div>
                        </div>

                    </div>
                </div>
				</div>





                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Registration Board</label>
                        <select name="data[Professional][board_id]" class="form-control">
                            <option>Select Board</option>
                            <?php foreach ($boardList as $board) { ?>
                                <option <?php if ($userDetails['Professional']['board_id'] == $board['Board']['id']) { ?> selected="selected" <?php } ?> value='<?php echo $board['Board']['id']; ?>' >
                                    <?php echo $board['Board']['board_name']; ?>
                                </option> 
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Registration Number</label>
                        <input type="text" name="data[Professional][reg_number]" value="<?php
                        if (!empty($userDetails['Professional']['reg_number'])) {
                            echo $userDetails['Professional']['reg_number'];
                        }
                        ?>" placeholder="Registration Number" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Any Additional Courses</label>
                        <div class="row">
                            <div class="col-md-10 col-sm-9 col-xs-9"><input type="text"  placeholder="Enter Award Courses and click add" class="form-control course" /></div>
                            <div class="col-md-2 col-sm-3 col-xs-3"><button type="button" class="btn btn-info coadd"><i class="fa fa-plus"></i></button></div>
                            <div id="course"></div>
                        </div>


                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Award and Recognitions</label>
                        <div class="row">
                            <div class="col-md-10 col-sm-9 col-xs-9"><input type="text"   placeholder="Enter Award Name and click add" class="form-control award" /></div>
                            <div class="col-md-2 col-sm-3 col-xs-3"><button type="button" class="btn btn-info awadd"><i class="fa fa-plus"></i></button></div>
                        </div>
                        <div id="award"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Memberships</label>
                        <input type="text" name="data[Professional][membership]" value="<?php
                        if (!empty($userDetails['Professional']['membership'])) {
                            echo $userDetails['Professional']['membership'];
                        }
                        ?>" placeholder="Memberships" class="form-control" />
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Services Type </label>
                        <input type="text" name="data[Professional][service_type]" value="<?php
                        if (!empty($userDetails['Professional']['service_type'])) {
                            echo $userDetails['Professional']['service_type'];
                        }
                        ?>" placeholder="Services Type" class="form-control" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <label>Experience</label>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-6"><input type="text" name="data[Professional][year]" value="<?php
                                if (!empty($userDetails['Professional']['year'])) {
                                    echo $userDetails['Professional']['year'];
                                }
                                ?>" placeholder="Years" class="form-control" /></div><div class="col-md-6 col-sm-12 col-xs-6"><input type="text" name="data[Professional][month]" value="<?php
                                                                            if (!empty($userDetails['Professional']['month'])) {
                                                                                echo $userDetails['Professional']['month'];
                                                                            }
                                                                            ?>" placeholder="Months" class="form-control" /></div></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        <label>Specializations <small>*seperate with commas(,)</small></label>
                        <input id="tags_1" type="text" name="data[Professional][specialization]" class="tags" value="<?php
                        if (!empty($userDetails['Professional']['specialization'])) {
                            echo $userDetails['Professional']['specialization'];
                        }
                        ?>" />
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
<?php echo $this->Html->script('knockout-3.4.0'); ?>
<script type="text/javascript">
    $("#quats").click(function () {
        $("#quali").show();
    });
    $("#caqu").click(function () {
        $("#quali").hide();
    });
    var ProfileVm = function () {
        var me = this;
        me.Year = ko.observable();
        me.Degree = ko.observable();
        me.Collage = ko.observable();
        me.UniName = ko.observable();
        me.id = ko.observable();
        me.List = ko.observableArray([]);

        var collage_id;
        var deg_id;
        var ur = "<?php echo $this->Html->url('/', true) ?>";

        $('.deg').on("change", function () {
            deg_id = $(this).val();

        });
        $('.btnsss').on("click", function () {
            var education = $("input[name='education']:checked").val();
            var year = $('.ColYear').val();
            var otherCity = $('#otherCity').val();
            var collage_name = $('.SelCollage').val();
            var uni = $('.UniName').val();
            $.post("" + ur + "Qualifications/add", {
                "data[Qualification][education]": education,
                "data[Qualification][other_degree]": otherCity,
                "data[Qualification][year]": year,
                "data[Qualification][university]": uni,
                "data[Qualification][degree_id]": deg_id,
                "data[Qualification][collage_name]": collage_name
            }, function (d) {
                me.List.push({
                    Year: d.year,
                    UniName: d.Univer,
                    Degree: d.Degrees,
                    Collage: d.Collage,
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
                    dts = d.data[i].Degree;
                    console.log(dt);
                    me.List.push({
                        UniName: dt.university,
                        Year: dt.year,
                        Collage: dt.collage_name,
                        Degree: dts.degree_name,
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
    $("#availability").click(function () {
        $("#mytime").show();
    });
    $("#timeca").click(function () {
        $("#mytime").hide();
    });

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
                if (d.r == 1) {
                    $('#mytime').hide();
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
                if (d.r == 1) {
                   alert("added");
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
                    $('#award').text("added successfully");
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