<?php if(!defined("BASEPATH")) exit('No direct script access allowed'); ?>
   <section class="">
    <div class="">
      <h1 style="padding-top: 24px; margin-bottom: -4px;text-align: center;
    color: #65B365;
">All Appointments</h1>
<div class="error1"> 
                  <span style="color:red;margin-left: 50px;"><?php echo $this->session->flashdata('estimatealready');?></span>  
             </div>
      
    </div>   
  </section>

<!-- Content Header (Page header) -->
  
    <!-- /.content -->
  
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All time slots</h3>
            </div><br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>

                  <th>Property Name</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>City</th>
                  <th>Message</th>
                  <th>Status</th>
                   <th>Estimate request</th>
                </tr>
                </thead>
                <tbody>
               
              <?php $previousValue = Null;
                    $previoustime = Null;
               foreach($userdata->result() as $val){ 
                if( $val->appoinment_date !==  $previousValue || $val->appoinment_time !==  $previoustime) {?>
                <tr>
                  
                  <td><?php echo $val->property_name;?></td>
                  <td><?php echo $val->name;?></td>
                  <td><?php echo $val->phone;?></td>
                  <td><?php echo$previousValue = $val->appoinment_date;?></td>
                  <td><?php echo $previoustime= $val->appoinment_time;?></td>
                  <td><?php echo $val->city;?></td>
                  <td><?php echo $val->message;?></td>
                  <td> <?php  $status = $val->status;
                  if($status == '1'){
                    $value = 1; ?>
                   <a href="#"> <button class="btn btn-success">Pending</button></a>
                  <?php }else{ 
                    $value = 0;?>
                    <a href="#"> <button class="btn btn-danger">Complete</button></a>
                    <?php } ?></td>
                  <td><a href="<?php echo base_url();?>/handyman/Dashboard/requestestimate/<?php echo $val->id; ?>"><button class="btn btn-danger">Estimate reqquest</button></a></td>

                 
                </tr>

              <?php } else{ ?>
                 <tr>
                 <td>&nbsp;</td>
                  <td>&nbsp;</td>
                 
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><?php echo $val->message;?></td>
                  <td> <?php  $status = $val->status;
                  if($status == '1'){
                    $value = 1; ?>
                   <a href="<?php echo base_url();?>admin/appointments/updatestatus/<?php echo $value;?>/<?php echo $val->id;?>"> <button class="btn btn-success">Pending</button></a>
                  <?php }else{ 
                    $value = 0;?>
                    <a href="<?php echo base_url();?>admin/appointments/updatestatus/<?php echo $value ;?>/<?php echo $val->id;?>"><button class="btn btn-danger">Complete</button></a>
                    <?php } ?></td>
                  

                  <td></td>
                 
                </tr>
              <?php }
              } ?>
                </tbody>
                <tfoot>
                <tr>
                  

                  <th>Property Name</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>City</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Estimate request</th>
                  

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
  