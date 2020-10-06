<?php if(!defined("BASEPATH")) exit('No direct script access allowed'); ?>
   <section class="">
    <div class="">
      <h1 style="padding-top: 24px; padding-bottom: 16px;
">Disable Time Slot Management</h1>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-12">
            <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>    
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
             </div>
             <form action="<?php echo base_url();?>admin/Disableslots/updatedisabledata" method="post" id="add_user">
             <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                <label for='date' class='control-label'>Date</label>
                <input type="datepicker" name="date" class='form-control dateget' id='date-picker-ren' value=""autocomplete="off" placeholder="Enter the Date to disable the time slot">
                <span style="color:red;"><?php  echo form_error('date'); ?><span> 
              
              </div>
                </div>
             </div>
            <div class="row">
                <div class="col-sm-10">
              <div class="form-group">
                <label class="control-label" for="all_time_slots">Start Time</label>
                <select class="form-control" name="all_time_slots" id="all_time_slots">
                 <option value="1">All Slots of the day</option>
                    <?php foreach($userdata->result() as $val){?>}
                <option value="<?php echo $val->timeslot;?>"><?php echo $val->timeslot;?></option>
            <?php } ?>
                </select>  
                 <span style="color:red;"><?php  echo form_error('all_time_slots'); ?><span> 
              
              </div>
              </div>
                      
               <div class="col-sm-2">
                <button class="btn btn-primary" name="create_user" type="submit"  style="margin-top: 24px;font-size: 14px;padding-left: 24px;padding-right: 24px;">Disable Timeslot</button>
                <span id="msg"></span>
              </div></div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Disabled Time slots</h3><br>
            </div><br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Disabled Date </th>
                  <th>Disabled Time slot</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
              <?php  foreach($userdatadiableslots->result() as $val){ ?>
                <tr>
                  <td><?php echo $val->date_on;?></td>
                  <td><?php echo $val->timeslot;?></td>
                  <td class="tdclass">
                    <a href="<?php echo base_url();?>admin/appointments/Editappointment/<?php echo $val->id;?>"> <button class="btn btn-success">Edit</button></a>&nbsp;<a href="<?php echo base_url();?>admin/appointments/deleteappoint/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">Delete</button></a>
                    
                  </td>
                    
                </tr>
              <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Disabled Date </th>
                  <th>Disabled Time slot</th>
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
<script>

var currentDate = new Date();
$("#date-picker-ren").datepicker({
  dateFormat:"yy-mm-dd",
  minDate: currentDate,
});
  </script>
<!-- Content Header (Page header) -->
  
    <!-- /.content -->
  
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
  
    <!-- /.content -->
 
  