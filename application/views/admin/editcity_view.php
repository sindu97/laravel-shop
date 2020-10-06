<section class="hid">
    <div class="">
      <div class="">
         <h1 style="padding-top: 17px;">Business City Management</h1>
         <p style="padding-top: 17px;text-align: center; margin-top: -22px;">Add the tenant by filling the form below:</p>
      </div>
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

           
          
            <form action="<?php echo base_url();?>admin/addcity/updatecitydata" method="post" id="add_user">
              <?php foreach($userdatacurrent->result() as $val){?>
             <div class="row">
            <div class="col-sm-6 ">
              <div class="form-group">
                <label for='password' class='control-label'>Add city</label>
                <input type="text" name="city" value="<?php echo $val->cit_name;?>"class='form-control' id='city'>
                <input type="hidden" name="hiddenid" value="<?php echo $val->id;?>"class='form-control' id='city'>
                 <span style="color:red;"><?php  echo form_error('city'); ?>
                </span>
              </div>
            <?php } ?>
            </div>
            <div class="col-sm-2 ">
            </div>
            <div class="col-sm-4 ">
               <div class="form-group">
                <button class="btn btn-primary" style="    margin-left: 24px; padding-left:45px;  padding-right:45px; margin-top: 29px;" name="create_user" type="submit">Update Business City</button>
                <span id="msg"></span>
              </div></span>
            </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>
