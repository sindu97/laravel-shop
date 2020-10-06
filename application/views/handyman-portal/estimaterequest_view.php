
  <section class="hid">
    <div class="">
      <div class="">
         <h1 style="padding-top: 27px;text-align: center;
    color: #65B365;font-size: 34px;">Estimate Repair Request Form</h1>
    <p style="text-align: center;margin-bottom:-1px"> Send your Estimate for Repair Request  by filling the from given below:</p>
      </div>
      <div class="new_user_form">

        <div class="row">

          <div class="col-sm-12">
             <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
             </div>
            <form action="<?php echo base_url();?>handyman/Dashboard/addestimaterequst" method="post" id="add_user">
        <?php $tenanappointdata = $userdata->result();?>
<!------------------------- Name----------------------------->
            <div class="form-group">
                <label for='password' class='control-label'>Tenant Name</label>
                <input type="text" name="name" class='form-control' id='password' value="<?php echo  $tenanappointdata[0]->name;?>" placeholder="Enter the Name" readonly>
               
              </div>

  <!------------------Select property----------------------------->         <div class="form-group">
                <label for='password' class='control-label'>Tenant Property </label>
                <input type="text" name="property" class='form-control'   id="propid" placeholder="Enter property(select the User tenant ,first)" value="<?php echo  $tenanappointdata[0]->property_name;?>" readonly required>
                </div>  
              </div> 
            </div>          
 <!------------------------- Problem----------------------------->
 <?php   $i=1;
 foreach( $Fulldata->result() as $data) {
  ?>
            <div class="row">
              <div class="col-sm-4">
            <div class="form-group">
                <label for='password' class='control-label'>Problem<?php echo $i;?></label>
                <input type="text" name="problem[]'" class='form-control' id='problem'   value="<?php echo $data->message;?>"  readonly required>
                <input type="hidden" name="hid[]'" class='form-control' id='hid'   value="<?php echo $data->id;?>"  readonly required>
               <span style="color:red;"><?php  echo form_error('problem'); ?></span>
              </div>
            </div>
<!------------------------- cost----------------------------->
              <div class="col-sm-4">
            <div class="form-group">
                <label for='password' class='control-label'>Estimated Cost</label>
                <input type="number" name="Cost[]" class='form-control' id='Cost'  placeholder="Enter the Estimated cost" required>
               <span style="color:red;"><?php  echo form_error('Cost'); ?></span>
              </div>
            </div>
    <!-------------- Items Message----------------------------->
          <div class="col-sm-4">
            <div class="form-group">
                <label for='password' class='control-label'>Items Needed Message</label>
                <input type="textarea" name="Items[]" class='form-control' id='Items'  placeholder="Enter the Items Needed" >
               <span style="color:red;"><?php  echo form_error('Items'); ?></span>
              </div> 
            </div> 
          </div>  
        <?php $i++;
      } ?>
      <!-------------------hidden---------------------------->
      <div class="row">
          <input type="hidden" name="hiiddentenant" class='form-control' id='password' value="<?php echo  $tenanappointdata[0]->tenant_id;?>">  
          <input type="hidden" name="hiiddenappoint" class='form-control' id='password' value="<?php echo  $tenanappointdata[0]->id;?>">      
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
</body>
</html>