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
          <p><?php echo $user->Name ?></p>
          <a href="#"></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>              
              <li class="active"><a href="<?php echo base_url("owner-portal"); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
               <li><a href="<?php echo base_url("owner-portal/Dashboard/allestimates"); ?>"><i class="fa fa-dashboard"></i> <span>All Estimates</span></a></li>
               <li class="treeview">
                <a href="#">
                  <i class="fa fa-table"></i> <span>Properties</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" style="margin-left: -8% !important;">
                    <?php 
                    foreach($singlepropertydata as $data){ ?>
                  <li class=""><a href="<?php echo base_url();?>owner-portal/Dashboard/singleproperty/<?php echo $data;?>"><i class="fa fa-plus"></i><?php echo $data;?></a></li>
                 <?php } ?>
                </ul> 
              </li>  

         
        <!--   <li><<i style="color:white;padding-left:8px;" class="fa fa-dashboard"></i> <span style="color:white;padding-left:4px;">Single Property</span>
            <form action="" method="POST">
            <select class="form-control" id="singleprop" style="    width: 90%;
    margin-left: 11px;
    margin-top: 15px;">
  
          
          ?>
             <option value="<?php// echo $data->Managedproperty;?>"><?php //echo $data->Managedproperty;?></option>
              
            
            </select>
           </form></li> -->  
            </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-----------------ajax for the requst status---------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

/*$(document).ready(function(){
  $('#singleprop').change(function(){
    var valueproperty = $(this).val();
    //alert(valueproperty);
     $.ajax({
            type: "POST",
            url: "<?php //echo base_url();?>"+"/owner-portal/Dashboard/ajaxproperty",
            data:{ valueproperty:valueproperty},
            success: function (data) {
             /// alert(data);
              $(".singledta").html(data);
              //alert(data);
                //$('#putdisabledate').html(data);
            }
    })
    
  });
});*/
</script>