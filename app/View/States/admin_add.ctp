
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       State Add
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/nirog/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add State</li>
      </ol>
    </section>
    
    



 <section class="content">
     <?php $x=$this->Session->flash(); ?>
                    <?php if($x){ ?>
                    <div class="alert success">
                        <span class="icon"></span>
                    <strong></strong><?php echo $x; ?>
                    </div>
                    <?php } ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add State name</h3>
            </div>
              
              <form action="add" method="post" >
              <div class="box-body">
               <div class="form-group" >
                  <select class="form-control" name="data[State][countryid]">
                    <option>Select Country Name</option>
                    <?php foreach($countries as $country){ ?>
                    <option value="<?php echo $country['Country']['id']; ?>"><?php echo $country['Country']['country_name']; ?></option>
                    <?php } ?>
                  </select>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Add State name</label>
                  <input type="text" class="form-control" name="data[State][state_name]" placeholder="state name">
                  <input type="hidden" class="form-control" name="data[State][status]" value="1" placeholder="state name">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
              
              
              
              
              
              
          </div>
        </div>
      </div>
 </section>
</div>