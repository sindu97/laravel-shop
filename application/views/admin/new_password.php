  <section class="">
    <div class="">
      <div class="upload_form_wrapper">
        <h2 style="padding-left:35%;padding-top:20px;">Edit Password</h2>
        <hr>
      </div>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <div class="error1">
               <span style="color:red;"><?php echo $this->session->flashdata('addusreerror');?></span>
               <span style="color:red;"><?php echo $this->session->flashdata('adduser');?></span>
              </div>
            <form action="<?php echo base_url();?>admin/Newpassword/changepassword/" method="post" id="add_user">
              <div class="form-group">
                <label class="control-label" for="username">Select Username</label>
                <select class="form-control" name="username" id="username">
               <?php 
               foreach($userdata->result() as $val){  ?>
                <option value="<?php echo $val->username; ?>"><?php echo $val->username; ?></option>  
              <?php } ?>
                </select>
                <span style="color:red;"><?php  echo form_error('username'); ?></span>
              </div>
              <div class="form-group">
                <label for='password' class='control-label'>Password</label>
                <input type="password" name="password" class='form-control' id='password'>
                 <span style="color:red;"><?php  echo form_error('password'); ?><span>  
                <br>
                <button class="btn btn-primary" name="create_user" type="submit">Update Password</button>
                <span id="msg"></span>
              </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>


