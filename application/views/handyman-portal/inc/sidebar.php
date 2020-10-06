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
          <p><?php echo $user->user ?></p>
          <a href="#"></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>              
              <li class="active"><a href="<?php echo base_url("handyman"); ?>"><i class="fa fa-dashboard"></i> <span>All Requests</span></a></li>  
               <li class=""><a href="<?php echo base_url();?>handyman/Dashboard/Allestimates/"><i class="fa fa-plus"></i> ALL Estimates</a></li>            
             
            </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">