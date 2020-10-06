<?php if(!defined("BASEPATH")) exit('No direct script access allowed'); ?>
   <section class="">
    <div class="">
      <h1 style="padding-top: 24px; padding-bottom: 16px;
">Time Slot Management</h1>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-12">
            <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>    
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
             </div>
             <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('deletedsuccess');?></span>    
               <span style="color:red;"><?php echo $this->session->flashdata('deleteerror');?></span>
             </div>
            <div class="row">

            <form action="<?php echo base_url();?>admin/Addtimeslot/timeslotdata" method="post" id="add_user">

                <div class="col-sm-5">
              <div class="form-group">
                <label class="control-label" for="start_time">Start Time</label>
                <select class="form-control" name="start_time" id="start_time">
                <option value="8:00 AM">8:00 A.M</option>
                <option value="9:00 AM">9:00 A.M</option> 
                <option value="10:00 AM">10:00 A.M</option>   
                <option value="11:00 AM">11:00 A.M</option> 
                <option value="12:00 PM">12:00 P.M</option> 
                <option value="1:00 PM">1:00 P.M</option> 
                <option value="2:00 PM">2:00 P.M</option> 
                <option value="3:00 PM">3:00 P.M</option> 
                <option value="4:00 PM">4:00 P.M</option> 
                <option value="5:00 PM">5:00 P.M</option> 
                <option value="6:00 PM">6:00 P.M</option> 
                <option value="7:00 PM">7:00 P.M</option> 
                <option value="8:00 PM">8:00 P.M</option> 
                <option value="9:00 PM">9:00 P.M</option> 
               
                </select>  
              </div>
              </div>
                <div class="col-sm-5">

                <div class="form-group">
                <label class="control-label" for="end_time">End Time</label>
                <select class="form-control" name="end_time" id="end_time">
                <option value="8:00 AM">8:00 A.M</option>
                <option value="9:00 AM">9:00 A.M</option> 
                <option value="10:00 AM">10:00 A.M</option>   
                <option value="11:00 AM">11:00 A.M</option> 
                <option value="12:00 PM">12:00 P.M</option> 
                <option value="1:00 PM">1:00 P.M</option> 
                <option value="2:00 PM">2:00 P.M</option> 
                <option value="3:00 PM">3:00 P.M</option> 
                <option value="4:00 PM">4:00 P.M</option> 
                <option value="5:00 PM">5:00 P.M</option> 
                <option value="6:00 PM">6:00 P.M</option> 
                <option value="7:00 PM">7:00 P.M</option> 
                <option value="8:00 PM">8:00 P.M</option> 
                <option value="9:00 PM">9:00 P.M</option> 
                </select>  
             </div></div>      
               <div class="col-sm-2">
                <button class="btn btn-primary" name="create_user" type="submit"  style="margin-top: 24px;font-size: 14px;padding-left: 24px;padding-right: 24px;">Add Timeslot</button>
                <span id="msg"></span>
              </div></div>
            </form> 
          </div>
        </div> 
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
                  <th>Time Slots</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
              <?php  foreach($userdata->result() as $val){ ?>
                <tr>
                  
                  <td><?php echo $val->timeslot;?></td>
                  <td> <?php  $status = $val->status;
                  if($status == '1'){
                    $value = 1; ?>
                   <a href="<?php echo base_url();?>admin/addtimeslot/updatestatus/<?php echo $value;?>/<?php echo $val->id;?>"> <button class="btn btn-success">Active</button></a>
                  <?php }else{ 
                    $value = 0;?>
                    <a href="<?php echo base_url();?>admin/addtimeslot/updatestatus/<?php echo $value ;?>/<?php echo $val->id;?>"> <button class="btn btn-danger">Block</button></a>
                    <?php } ?></td>
                  

                  <td>
                    <a href="<?php echo base_url();?>admin/addtimeslot/deleteslot/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">Delete</button></a></td>
                </tr>

              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  
                  <th>Time Slots</th>
                  <th>Status</th>
                  <th>Action</th>

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
  