
<style>
  .hidetext { -webkit-text-security: disc; /* Default */ }
 </style> 
  <section class="">
    <div class="">
       <h1 style="padding-top: 24px; 
">Edit Owner Password</h1>
   <h3 style="padding-top: 14px; text-align:center;
">Update the password by the following form:</h3>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-12">
            <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
               <span style="color:red;"><?php echo $this->session->flashdata('deletedsuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('deleteerror');?></span>
             </div>
               <form action="<?php echo base_url();?>admin/adduser/changepassword" method="post" id="add_user">
                <?php  foreach($userdata->result() as $val1){ ?>
             <div class="row">
              <div class="col-sm-5">
              <div class="form-group">
                <label for='password' class='control-label'>Owner Name</label>
                <input type="text" name="ownername" class='form-control' id='ownername' value="<?php echo $val1->Name;?>" required>
                 <span style="color:red;"><?php  echo form_error('ownername'); ?></span>
              </div>
            </div>
              <div class="col-sm-5">
              <div class="form-group">
                <label for='password' class='control-label'>Owner Email</label>
                <input type="text" name="ownermail" class='form-control' id='ownermail' value="<?php echo $val1->email;?>" required>
                 <span style="color:red;"><?php  echo form_error('ownermail'); ?></span>
              </div>
            </div>
            <div class="col-sm-2">
            </div>
             </div>
             <div class="row">
              <div class="col-sm-5">
              <div class="form-group">
                <label class="control-label" for="username"> Username</label>
                
               <input type="text" name="username" class='form-control' id='password' value="<?php echo $val1->username;?>"  required readonly >
             
                <span style="color:red;"><?php  echo form_error('username'); ?></span>   
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for='password' class='control-label'>Password</label>
                <input type="password" name="password" class='form-control' id='password' placeholder= "Set New Password"  value="" required>
                 <span style="color:red;"><?php  echo form_error('password'); ?></span>

              </div>
            </div>
             
            <?php } ?>
            <div class="col-sm-2">
              <div class="form-group">
                <button class="btn btn-primary" name="create_user" type="submit" style="    margin-top: 25px;padding-left: 25px;padding-right: 25px;
">Update Password</button>
                <span id="msg"></span>
              </div>
            </div>
            </form> 
          </div>
          </div>
        </div> 
      </div>
    </div>   
  </section>


  
