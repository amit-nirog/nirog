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
<section class="content">

<div class="container">
<div class="row">
<div class="left-sidebar col-md-3 col-sm-4 col-xs-12">
<div class="img"><img src="images/profile.png" />
<a href="#">Add Profile Pictures<span>*</span></a>
</div>
<ul>
<li><a href="personal-information.php" class="active"><i class="fa fa-user"></i> Personal Information</a></li>
<li><a href="porfessional-information.php"><i class="fa fa-user"></i> Porfessional Information</a></li>
<li><a href="#"><i class="fa fa-hospital-o"></i> Clinic Information</a></li>
<li><a href="#"><i class="fa fa-edit"></i> Documents</a></li>
</ul>
</div>
<div class="main col-md-9 col-sm-8 col-xs-12">
<h2>Edit Your Profile<span><a href="#">View Profile</a></span></h2>
<div class="row">
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Name</label>
<input type="text" value="" name="" placeholder="Name" class="form-control" />
</div>
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Email Address</label>
<input type="text" value="" name="" placeholder="Email Address" class="form-control" />
</div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 form-group">
<label>Gender <dl><input type="radio" name="radio" value="Male" /> Male</dl> <dl><input type="radio" name="radio" value="Female" /> Female</dl></label>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Mobile Number<span>*</span></label>
<input type="text" value="" name="" placeholder="Mobile Number" class="form-control" />
</div>
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Alternate Number</label>
<input type="text" value="" name="" placeholder="Alternate Number" class="form-control" />
</div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 form-group">
<label>Street Address</label>
<input type="text" value="" name="" placeholder="Street Address" class="form-control" />
</div>
</div>

<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12 form-group">
<label>Country</label>
<select size="1" name="country" class="form-control">
<option value="AF">Afghanistan</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia and Herzegowina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CD">Congo, the Democratic Republic of the</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Cote d'Ivoire</option><option value="HR">Croatia (Hrvatska)</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="TP">East Timor</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="FX">France, Metropolitan</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard and Mc Donald Islands</option><option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN" selected="selected">India</option><option value="ID">Indonesia</option><option value="IR">Iran (Islamic Republic of)</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KP">Korea, Democratic People's Republic of</option><option value="KR">Korea, Republic of</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People's Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macau</option><option value="MK">Macedonia, The Former Yugoslav Republic of</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia, Federated States of</option><option value="MD">Moldova, Republic of</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint LUCIA</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome and Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia (Slovak Republic)</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SH">St. Helena</option><option value="PM">St. Pierre and Miquelon</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen Islands</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan, Province of China</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania, United Republic of</option><option value="TH">Thailand</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Viet Nam</option><option value="VG">Virgin Islands (British)</option><option value="VI">Virgin Islands (U.S.)</option><option value="WF">Wallis and Futuna Islands</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="YU">Yugoslavia</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select>
</div>
<div class="col-md-3 col-sm-6 col-xs-12 form-group">
<label>City</label>
<input type="text" name="" value="" placeholder="Enter City Name" class="form-control" />
</div>
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Locality</label>
<input type="text" name="" value="" placeholder="Enter City Name" class="form-control" />
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>State/Province/Region</label>
<input type="text" value="" name="" placeholder="State/Province/Region" class="form-control" />
</div>
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Zip/Postal Code</label>
<input type="text" value="" name="" placeholder="Zip/Postal Code" class="form-control" />
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Date of Birth</label>
<input type="text" value="" name="" placeholder="dd/mm/yy" class="form-control" />
</div>
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Website </label>
<input type="text" value="" name="" placeholder="Enter URL" class="form-control" />
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>Short Introduction</label>
<textarea rows="" cols="" class="form-control" placeholder="Short Introduction"></textarea>
</div>
<div class="col-md-6 col-sm-12 col-xs-12 form-group">
<label>General Description</label>
<textarea rows="" cols="" class="form-control" placeholder="General Description"></textarea>
</div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 form-group">
<input type="submit" value="Save Changes" name="submit" class="form-control btn-info" />
</div>
</div>

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