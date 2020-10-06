 <section class="hid">
    <div class="">
      <div class="">
         <h1 style="padding-top: 17px;">Handyman Mnagement</h1>
         <p style="padding-top: 17px;text-align: center; margin-top: -22px;">Add the Handyman by filling the form below:</p>
      </div>
      <?php foreach( $hadydata->result() as $handysingle){ ?>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-12" style="margin-top:-40px!important;">
            <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('updatesuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('updateerror');?></span>
               <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
             </div>
             <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('deletedsuccess');?></span>    
               <span style="color:red;"><?php echo $this->session->flashdata('deleteerror');?></span>
             </div>
           </div>
           <div class="row">
          
            <form action="<?php echo base_url();?>admin/handyman/updatehandydata" method="post" id="add_user">
              <div class="col-sm-4 ">
                <div class="form-group">
                <label for='password' class='control-label'>Handyman Name</label>
                <input type="text" name="T_name" class='form-control' id='user' value="<?php echo  $handysingle->name; ?>" required>
                 <span style="color:red;"><?php  echo form_error('T_name'); ?>
              </div>
              </div>
               <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Handyman Phone</label>
                <input type="text" name="T_phone" class='form-control' id='user' value="<?php echo  $handysingle->phone; ?>" required>
                 <span style="color:red;"><?php  echo form_error('T_phone'); ?>
              </div>
            </span>
          </div>
          <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Handyman Email</label>
                <input type="text" name="email" class='form-control' id='user' value="<?php echo  $handysingle->email; ?>" required>
                 <span style="color:red;"><?php  echo form_error('email'); ?>
              </div>
            </span>
          </div>
                <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>User Name</label>
                <input type="text" name="user" class='form-control' id='user' value="<?php echo  $handysingle->user; ?>" required>
                 <span style="color:red;"><?php  echo form_error('user'); ?>
              </div>
            </span>
          </div>
            <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Password</label>
                <input type="password" name="password" class='form-control' id='password' value="" required>
                 <span style="color:red;"><?php  echo form_error('password'); ?>
                </span>
              </div>
            </div>
                  <div class="col-sm-4 ">
                    <div class="form-group">
               <label for='password' class='control-label'>Address</label>
                <input type="text" name="Addresss" class='form-control' id='Addresss'value="<?php echo  $handysingle->address; ?>" required>
                 <span style="color:red;"><?php  echo form_error('Addresss'); ?>
                </span>
              </div>
              </div>
            <div class="col-sm-4 ">
                <div class="form-group">
                <label for='City' class='control-label'>City</label>
                <select name="City" class='form-control' id='password'>
                <?php  foreach($usercity->result() as $city){
                echo $cityname = $handysingle->city; 
               echo $allcities = $city->cit_name; ?>
                  <option value="<?php echo $city->cit_name;?>" <?php if($cityname == $allcities ){ echo "selected"; } ?>><?php echo $city->cit_name;?></option>
                <?php } ?>
                </select>
                
                 <span style="color:red;"><?php  echo form_error('City'); ?>
                
              </div></span>
            
            </div>
            <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>state</label>
                <input type="text" name="state" class='form-control' id='state' value="<?php echo  $handysingle->state; ?>" required>
                 <span style="color:red;"><?php  echo form_error('state'); ?>
                </span>
                
              </div>
            </div>
            <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Zip</label>
                <input type="text" name="Zip" class='form-control' id='Zip' value="<?php echo  $handysingle->pin; ?>" required>
                 <span style="color:red;"><?php  echo form_error('Zip'); ?>
                </span>
              </div>
            </div>
          <?php } ?>
            <div class="col-sm-4 ">
              <input type="hidden" name="hiddenid" class='form-control' id='Zip' value="<?php echo  $handysingle->id; ?>" required>
            </div>
            <div class="col-sm-4 ">
            </div>
            <div class="col-sm-4 ">
               <div class="form-group">
                <button class="btn btn-primary" style="    margin-left: 24px; padding-left:45px;  padding-right:45px;" name="create_user" type="submit">Update Handyman</button>
                <span id="msg"></span>
              </div></span>
            </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>
