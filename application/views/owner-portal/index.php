<?php if(!defined("BASEPATH")) exit('No direct script access allowed');
 
   ?>
<!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

   
    <!-- /.content -->
  
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content singledta">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
        
            <! -- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive ">
                <thead>
                <tr>
                 
                  <th>Managedproperty</th>
                  <th>Date</th>
                  <th>Num</th>
                  <th>Name</th>
                  <th>Memo</th>
                  <th>Paidamount</th>
                </tr>
                </thead>
                <tbody>
               
              <?php foreach($properties as $all){
                foreach($all as $val){?>
                <tr>
                  <td><?php echo $val['Managedproperty'];?></td>
                  <td><?php echo $val['Date'];?></td>
                  <td><?php echo $val['Num'];?></td>
                  <td><?php echo $val['Name'];?></td>
                  <td><?php echo $val['Memo'];?></td>
                  <td><?php echo $val['Paidamount'];?></td>
                </tr>

                <?php }
                } ?>
                </tbody>
                <tfoot>
                <tr>
                
                  <th>Managedproperty</th>
                  <th>Date</th>
                  <th>Num</th>
                  <th>Name</th>
                  <th>Memo</th>
                  <th>Paidamount</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  