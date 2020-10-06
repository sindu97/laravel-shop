<?php /*foreach($edituserdata->result() as $val){ 
      $ram = $val->message;

}
    $a = explode(" ",$ram);
    array_pop($a);
    ?>
    <ul><?php
foreach($a as $val){?>

  <li><?php echo $val;?></li>
  <?php } ?>
  </ul>
<?php
die();*/
?>
  <section class="hid">
    <div class="">
      <div class="">
         <h1 style="padding-top: 27px;text-align: center;
    color: #8B191D;font-size: 34px;">Update Repair Request Form</h1>
    <p style="text-align: center;margin-bottom:-1px"> Update your complaints by filling the from given below:</p>
      </div>
      <div class="new_user_form">

        <div class="row">

          <div class="col-sm-12">
             <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
             </div>
            <form action="<?php echo base_url();?>admin/Appointments/update" method="post" id="add_user">
            <?php  foreach($edituserdata->result() as $val){ ?>
<!------------------------- Name- and id---------------------------->
            <div class="form-group">
                <label for='password' class='control-label'>Name</label>
                <input type="text" name="name" class='form-control' id='password' value="<?php echo $val->name;?>" placeholder="Enter the Name" readonly>
                <input type="hidden" name="hidid" class='form-control' id='password' value="<?php echo $val->id;?>" placeholder="Enter the Name" readonly>
                <input type="hidden" name="tenhidid" class='form-control' id='password' value="<?php echo $val->tenant_id;?>" placeholder="Enter the Name" readonly>
               <span style="color:red;"><?php  echo form_error('name'); ?><span>
              </div>

  <!------------------Select property----------------------------->         <div class="form-group">
                <label for='password' class='control-label'>Tenant Property </label>
                <input type="text" name="property" class='form-control'   id="propid" value="<?php echo $val->property_name;?>" readonly required>
                <span style="color:red;"><?php  echo form_error('property'); ?><span> 
              </div>             
<!------------------------- phone----------------------------->
            <div class="form-group">
                <label for='Phone' class='control-label'>Phone</label>
                <input type="number" name="Phone" class='form-control' id='password' value="<?php echo $val->phone;?>" placeholder="Enter the Phone" required>
              <span style="color:red;"><?php  echo form_error('Phone'); ?><span> 
              </div>
              
  <!-------------------------date----------------------------->
             <div class="form-group">
                <label for='date' class='control-label'>Date</label>
                <input type="datepicker" name="date" class='form-control dateget' id='date-picker-ren' value="<?php echo $val->appoinment_date;?>" autocomplete="off" placeholder="Enter the Date"required>
              <span style="color:red;"><?php  echo form_error('date'); ?><span> 
              </div>

<!-------------------------time----------------------------->
             <div class="form-group">
                <label for='time' class='control-label'>Available Time Slot</label>
                <select id="putdisabledate" class='form-control' name="available_time" placeholder="Select the Time">
                  <option><?php echo $val->appoinment_time;?></option>
                  <span style="color:red;"><?php  echo form_error('available_time'); ?><span> 

                </select>
               
              </div> 
  <!-------------------------email----------------------------->
            <div class="form-group">
                <label for='email' class='control-label'>Email</label>
                <input type="email" name="email" class='form-control' id='password' placeholder="Enter the Email" value="<?php echo $val->email;?>" required>
              <span style="color:red;"><?php  echo form_error('email'); ?><span> 
              </div>
  <!-------------------------city----------------------------->
            <div class="form-group">
                <label for='city' class='control-label'>City</label>
                <input type="text" name="city" class='form-control' id='city' placeholder="Enter the City" value="<?php echo $val->city;?>" required>
              <span style="color:red;"><?php  echo form_error('city'); ?><span> 
              </div>
           
  <!-----------input prroblem----------------------------->
           <div class="form-group">
              <label for='password' class='control-label'>Complaint Message</label>
               <div class="input-group control-group after-add-more">
              <input type="text" name="addmore[]" class="form-control" placeholder="Enter Your Problem " value="<?php echo $val->message;?>" required>
              <div class="input-group-btn"> 
                <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
              </div>
           
            </div>

            <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="text" name="addmore[]" class="form-control" placeholder="Enter Another Problem">
            <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div> 
              </div>



              <div class="form-group">
              
                
                <br>
                <button class="btn btn-primary" name="create_user" type="submit">Update Request</button>
                <span id="msg"></span>
              </div>
            </form> 
          <?php } ?>
          </div>
        </div> 
      </div>
    </div>   
  </section>

<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>



<script>

var currentDate = new Date();
$("#date-picker-ren").datepicker({
  dateFormat:"yy-mm-dd",
  minDate: currentDate,
  onSelect: function(dateText) { 
     $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>"+"/admin/Appointments/ajax_book",
            data:{ dateText:dateText },
            success: function (data) {
                $('#putdisabledate').html(data);
            }
    })  
  }
});
  </script>
  

</body>
</html>