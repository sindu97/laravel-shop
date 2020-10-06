<?php if(!defined("BASEPATH")) exit('No direct script access allowed'); ?>


<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Booked Slot Management
        
      </h1>
      
    </section>
    <!-- /.content -->
  
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('deletedsuccess');?></span>    
               <span style="color:red;"><?php echo $this->session->flashdata('deleteerror');?></span>
             
              <span style="color:red;"><?php echo $this->session->flashdata('updatesuccess');?></span>    
               <span style="color:red;"><?php echo $this->session->flashdata('updateerror');?></span>
             </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Booked time slots with date</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Time Slots</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
              <?php  foreach($userdata->result() as $val){ ?>
                <tr>
                  <td><?php echo $val->date_on;?></td>
                  <td><?php echo $val->timeslot;?></td>
                  <td> <a href="<?php echo base_url();?>admin/addtimeslot/editslot/<?php echo $val->id;?>"> <button class="btn btn-success">Edit</button></a>
                    &nbsp;
                    <a href="<?php echo base_url();?>admin/addtimeslot/deletebookedslot/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');"> <button class="btn btn-danger">Delete</button></a>
                  </td>
                </tr>

              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Time Slots</th>
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
 