<section class="content">

    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
            <?php echo $this->element('sidebar'); ?>
     
       
<div class="col-lg-8">
       <h1>Services <a class="pull-right view" href="#" >View Profile</a></h1> 
       
      
  <div class="form-group col-lg-6 padd-left0">
    <label for="clinicname">Clinic Infrastructure Picture</label>
    <div>

 <form action="<?php echo $this->Html->url('/', true) ?>users/clinicimage" id="clinicimages" enctype="multipart/form-data" method="post" accept-charset="utf-8" > 
                                    <input id="gfdghfh" name="data[ClicnicImage][clinic_image][]" class="clicregfgg" type="file" multiple/>
                                    
                                    <a href="" class="upload1" id="upload_regmj"><i class="fa fa-plus-square-o" aria-hidden="true"></i> </a>
                                </form>
      </div>
  </div>

                               <style>
                                    #upload_regmj{
                                        text-decoration:none;
                                    }
                                    #gfdghfh{
                                        display:none
                                    }

                                </style>
                                 <script type="text/javascript">
                                    $("#upload_regmj").on('click', function (e) {
                                        e.preventDefault();
                                        $("#gfdghfh:hidden").trigger('click');
                                    });
                                     $('.clicregfgg').on("change", function () {
                                        $('#clinicimages').ajaxSubmit({
                                            success: function (d) {
                                                if (d.r = 1) {
                                                    $("#stage12").html("success");
                                                    $('#stage12').delay(1000).fadeOut();
                                                } else {
                                                    $("#stage12").html("please upload again");
                                                    $('#stage12').delay(1000).fadeOut();
                                                }
                                              
                                            }
                                        });
                                    });
                                    </script>


  <div class="form-group col-lg-6 padd-right0">
    <label for="contactno">Clinic Video</label>
    <div>
    <i class="fa fa-plus-square-o" aria-hidden="true"></i> 
    
    </div>
  </div>
 <div class="form-group col-lg-6 padd-left0">
    <label for="staff">Staff Member</label>
    <select class="form-control">
  <option>10+</option>
  </select>
  </div>
  <div class="form-group col-lg-6 padd-right0">
    <label for="rooms">No Of Rooms</label>
    <select class="form-control">
  <option>10+</option>
  </select>
  </div>
  <div class="form-group col-lg-8 padd-left0">
   <label for="availability">  Your Availability </label>
    <button type="submit" class="btn btn-success small-btn"> <i class="fa fa-plus" aria-hidden="true"></i> Add Your Availability </button>
  </div>
  
  <div class="form-group col-lg-6 padd-left0">
    <label for="country">Services Type</label>
    <div>
    <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1"> Ayurveda
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value="option2"> Naturopathy
</label></div>
  </div>
   <div class="form-group col-lg-12 padd-right0 padd-left0">
    <label for="City">Specilization </label> <span id="passwordHelpInline" class="text-muted">  You can Add Multiple Specilization.</span>
    <select multiple class="form-control">
  <option> Specilization 1</option>
  <option> Specilization 2</option>
  <option>Specilization 3</option>
  <option>Specilization 4</option>
  <option>Specilization 5</option>
</select>
  </div>
   <div class="form-group col-lg-12 padd-left0">
    <label for="state">Amenities</label> 
    <div>
    <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1"> Sauna
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value="option2"> Jacuzzi
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value="option2"> Labs
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value="option2"> Wi-Fi
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox2" value="option2"> Massage Room
</label>
</div>
  </div>
  <div class="form-group col-lg-12 padd-right0 padd-left">
    <label for="zip">Add More Amenities</label>
    <div class=" form-inline">
    <input type="text" class=" form-control " id="zip" placeholder="Enter Amenities" > <button type="submit" class="btn btn-primary">Add</button>
  </div>
  <div class="well well-sm add-product">
  <ul>
  <li>aminities 1 <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></li>
  <li>aminities 1 <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></li>
  <li>aminities 1 <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></li>
  <li>aminities 1 <i class="glyphicon glyphicon-remove" aria-hidden="true"></i></li>
  </ul>
  <div class="clearfix">&nbsp;</div>
  </div>
  </div>
 
  
  <button type="submit" class="btn btn-success">Save Changes</button>
</form>
       </div>
       </div>
        
     
    </div>
  </div>
</div>
</section>