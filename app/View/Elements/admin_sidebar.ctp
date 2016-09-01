<?php

echo $this->Html->script(array('jQuery-2.2.0.min'));
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Manoj Singh</p>
          
        </div>
      </div>
     
      <ul class="sidebar-menu">
<!--        <li class="header">MAIN NAVIGATION</li>-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="javascript:void(0)"><i class="fa fa-circle-o"></i> Doctor List</a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-circle-o"></i>Clinic List</a></li>
          </ul>
        </li>
        
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Manage Options</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $this->Html->url('/admin/Specialities/index');?>"><i class="fa fa-circle-o"></i> List Specializations</a></li>
            <li><a href="<?php echo $this->Html->url('/admin/DoctorTypes/add');?>"><i class="fa fa-circle-o"></i> Add Doctor Type</a></li>
            <li><a href="<?php echo $this->Html->url('/admin/ColLages/add');?>"><i class="fa fa-circle-o"></i> Add Collage Name</a></li>
            <li><a href="<?php echo $this->Html->url('/admin/Degrees/add');?>"><i class="fa fa-circle-o"></i> Add Degree</a></li>
            <li><a href="<?php echo $this->Html->url('/admin/Countries/add');?>"><i class="fa fa-circle-o"></i> Add Country</a></li>
            <li><a href="<?php echo $this->Html->url('/admin/States/add');?>"><i class="fa fa-circle-o"></i> Add State</a></li>
            <li><a href="<?php echo $this->Html->url('/admin/Cities/add');?>"><i class="fa fa-circle-o"></i> Add City</a></li>
             <li><a href="<?php echo $this->Html->url('/admin/Locations/add');?>"><i class="fa fa-circle-o"></i> Add Location</a></li>
          </ul>
        </li>
        
        
        
        
<!--        <li class="header">LABELS</li>-->
        <li><a href="javascript:void(0)"><i class="fa fa-circle-o text-yellow"></i> <span>Users List</span></a></li>
        <li><a href="javascript:void(0)"><i class="fa fa-circle-o text-aqua"></i> <span>Contacts</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>