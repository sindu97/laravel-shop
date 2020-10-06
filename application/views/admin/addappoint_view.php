 <section class="hid">
    <div class="">
      <div class="">
         <h1 style="padding-top: 27px;text-align: center;
    color: #8B191D;font-size: 34px;">Repair Request Form</h1>
    <p style="text-align: center;margin-bottom:-1px"> Registered your complaints by filling the from given below:</p>
      </div>
      
      <div class="new_user_form">

        <div class="row">

          <div class="col-sm-12">
             <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
             </div>
            <form action="<?php echo base_url();?>admin/Appointments/addappointement" method="post" id="add_user">
<!------------------------- tenant name----------------------------->
            <div class="form-group">
                <label for='password' class='control-label'>User Tenant (select the tenant user name)</label>
                 <select id="tentat_user" class='form-control' name="tenant_name" placeholder="Select the Tenant User" required>
                    <?php  foreach($userdatateanant->result() as $val){ ?>

                  <option value="<?php echo $val->id;?>"><?php echo $val->user;?></option>
                <?php } ?>
                </select>
               <span style="color:red;"><?php  echo form_error('tenant_name'); ?><span> 
              </div>
<!------------------------- Select property----------------------------->         <div class="form-group">
                <label for='password' class='control-label'>Tenant Property </label>
                <input type="text" name="property" class='form-control'   id="propid" placeholder="Enter property(select the User tenant ,first)" readonly required>
                <span style="color:red;"><?php  echo form_error('property'); ?><span> 
              </div>     
<!------------------------- Name----------------------------->
            <div class="form-group">
                <label for='password' class='control-label'>Name</label>
                <input type="text" name="name" class='form-control'   id="naeme" placeholder="Enter the Name" readonly>
                <span style="color:red;"><?php  echo form_error('name'); ?><span> 
               
              </div>
<!------------------------- phone----------------------------->
            <div class="form-group">
                <label for='Phone' class='control-label'>Phone</label>
                <input type="number" name="Phone" class='form-control' id='phn' placeholder="Enter the Phone" required>
                <span style="color:red;"><?php  echo form_error('Phone'); ?><span> 
              </div>
               
<!-------------------------date----------------------------->
             <div class="form-group">
                <label for='date' class='control-label'>Date</label>
                <input type="datepicker" name="date" class='form-control dateget' id='date-picker-ren' value=""autocomplete="off" placeholder="Enter the Date to select the Available time slot"required>
                <span style="color:red;"><?php  echo form_error('date'); ?><span> 
              
              </div>

<!-------------------------time----------------------------->
             <div class="form-group">
                <label for='time' class='control-label'>Available Time Slot</label>
                <select id="putdisabledate" class='form-control' name="available_time" placeholder="Select the Time">
                  <span style="color:red;"><?php  echo form_error('available_time'); ?><span> 

                </select>
               
              </div> 

<!-------------------------email----------------------------->
            <div class="form-group">
                <label for='email' class='control-label'>Email</label>
                <input type="email" name="email" class='form-control' id='mailda' placeholder="Enter the Email">
                <span style="color:red;"><?php  echo form_error('email'); ?><span> 
               
              </div>
 <!-------------------------city----------------------------->
            <div class="form-group">
                <label for='email' class='control-label'>City</label>
                <select name="city" class='form-control' id='cityda'>
                <?php  foreach($usercity->result() as $city){
               $allcities = $city->cit_name; ?>
                  <option value="<?php echo $city->cit_name;?>"><?php echo $city->cit_name;?></option>
                <?php } ?>
                </select>
                <!-- <input type="text" name="city" class='form-control' id='cityda' placeholder="Enter the city" readonly> -->
                <span style="color:red;"><?php  echo form_error('city'); ?><span> 
               
              </div>                 
           <div class="form-group">
              <label for='password' class='control-label'>Complaint Message</label>
               <div class="input-group control-group after-add-more">
              <input type="text" name="addmore[]" class="form-control" placeholder="Enter Your Problem " required>
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
                <button class="btn btn-primary" name="create_user" type="submit">Repair Request</button>
                <span id="msg"></span>
              </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>
</span>

<script>
  $("#tentat_user").change(function(){ 
   var tenid = $(this).val();
   alert(tenid);
     $.ajax({
            type: "POST",
             url: "<?php echo base_url();?>"+"/admin/Appointments/gettemailname",
            data:{ tenid:tenid },
            success: function (data) {
             //alert(data);
               var obj = jQuery.parseJSON(data);
                for (var i = 0, len = obj.length; i < len; i++) {
                  console.log(obj[i]);
                  var id=obj[i].id;
                  var city=obj[i].city;
                  var nae=obj[i].name;
                  var d=obj[i].tenant_email;
                  var pro=obj[i].property_name;
                //  alert(d);
                  $('#naeme').val(nae);
                 $('#mailda').val(d);
                 $('#cityda').val(city);
                  $('#propid').val(pro);
              }
         }
    }) 
  
});
</script>
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