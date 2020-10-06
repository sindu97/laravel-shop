    <?php         $allslots_arr=array();
                   foreach($userdata1->result() as $val){
                    $allslots = $val->timeslot;
                   array_push($allslots_arr,$allslots);
                  } 
                  $disableslots_arr=array();
                   foreach($userdatabook->result() as $val1){
                    $allslots = $val1->timeslot;
                   array_push($disableslots_arr,$allslots);
                  }
                  $result=array_diff($allslots_arr,$disableslots_arr);
               
                
                 

                  ?> 
  <section class="">
    <div class="">
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-12">
           <div class="row">
            <form action="<?php echo base_url();?>admin/Addtimeslot/updatetimeslot" method="post" id="add_user">
              <div class="col-sm-5">
              <div class="form-group">
                <label for='date' class='control-label'>Date</label>
                 <?php  foreach($userdatacurrent->result() as $val){  ?>
                <input type="datepicker" name="date" class='form-control' id='date-picker-jd' value="<?php echo  $val->date_on;?> "autocomplete="off" required>

                 <input type="hidden" name="hiddenid" class='form-control'  value="<?php echo  $val->id;?> "autocomplete="off" required>
              </div>
                </div>
                <div class="col-sm-5">
              <div class="form-group">
                <label class="control-label" for="time_slot">Available Time</label>
                <select class="form-control" name="time_slot" id="putdisabledate1">
                <option value="<?php echo $val->timeslot;?>" id="" selected><?php echo $val->timeslot;?></option> 
                <?php } ?>
                <?php  foreach($result as $val1){  ?>
                <option value="<?php echo $val1;?>"><?php echo $val1;?></option> 
                <?php } ?>
                </select>   
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                 <button class="btn btn-primary" style="    margin-top: 27px; padding-left: 27px; padding-right: 27px;"name="create_user" type="submit">Edit Timeslot</button>
                <span id="msg"></span>
                 </div>
                </div>
              </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('deletedsuccess');?></span>    
               <span style="color:red;"><?php echo $this->session->flashdata('deleteerror');?></span>
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
                  <td> 
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


  <script>

var currentDate = new Date();
$("#date-picker-jd").datepicker({
  dateFormat:"yy-mm-dd",
  minDate: currentDate,
  onSelect: function(dateText) { 
     $.ajax({
            type: "POST",
            url: "http://localhost/elite/tenant/Dashboard/ajax_book",
            data:{ dateText:dateText },
            success: function (data) {
                $('#putdisabledate1').html(data);
            }
    })  
  }
});
  </script>