  <section class="">
    <div class="">
      <div class="upload_form_wrapper">
        <h2 style="padding-left:35%;padding-top:20px;">Create New User</h2>
        <hr>
      </div>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            
           
            <form action="<?php echo base_url();?>admin/adduser/adduserdata" method="post" id="add_user">
              <div class="form-group">
                <label class="control-label" for="username">Select Username</label>
                <select class="form-control" name="username" id="username">
              
              
                <option value="">ghh</option>  
            
                </select>
               
              </div>
              <div class="form-group">
                <label for='password' class='control-label'>Password</label>
                <input type="password" name="password" class='form-control' id='password'>
                
                <br>
                <button class="btn btn-primary" name="create_user" type="submit">Create User</button>
                <span id="msg"></span>
              </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>

<script>
