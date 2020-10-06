  <?php !defined("BASEPATH") ? die("Direct Script Not Allowed.") : "" ; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="userimage">
          <img src="<?php echo base_url('admin_assets/'); ?>dist/img/avatr.png" class="img-circle" alt="User Image">
        </div>
        <div class="user info">
          <p><?php echo $user->fname." ". $user->lname; ?></p>
          <a href="#"> <?php echo $user->role; ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>              
              <li class="active"><a href="<?php echo base_url("admin"); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
               <li class="treeview">
                <a href="#">
                  <i class="fa fa-table"></i> <span>Owner</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class=""><a href="<?php echo base_url();?>admin/adduser/"><i class="fa fa-plus"></i>Owner Management</a></li>
                 
                </ul> 
              </li>              
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-table"></i> <span>Tenant</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class=""><a href="<?php echo base_url();?>admin/Addtenant/"><i class="fa fa-plus"></i> Tenant Management</a></li>
                 
                </ul> 

              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-table"></i> <span>Handyman</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class=""><a href="<?php echo base_url();?>admin/Handyman/"><i class="fa fa-plus"></i> Handyman Management</a></li>
                 <li class=""><a href="<?php echo base_url();?>admin/Handyman/allrequests"><i class="fa fa-plus"></i>Handyman Requests</a></li>
                </ul> 

              </li>

               <li class="treeview">
                <a href="#">
                  <i class="fa fa-table"></i> <span>Time slots</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class=""><a href="<?php echo base_url();?>admin/Addtimeslot/Allslots"><i class="fa fa-plus"></i> All Slots</a></li>
                  <li class=""><a href="<?php echo base_url();?>admin/Disableslots"><i class="fa fa-plus"></i>Disable Slots</a></li>
                 
                </ul> 
                
          <li class="active"><a href="<?php echo base_url();?>admin/Appointments"><i class="fa fa-dashboard"></i> <span>Appointments</span></a></li>
          <li class="active"><a href="<?php echo base_url();?>admin/addcity"><i class="fa fa-dashboard"></i> <span>Business City</span></a></li>
             
           
             
            </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">