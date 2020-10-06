



 <section class="hid">
    <div class="">
      <div class="">
         <h1 style="padding-top: 17px;">Edit Tenant</h1>
         <p style="padding-top: 17px;text-align: center; margin-top: -22px;">Update the tenant credentials by filling the form below:</p>
      </div>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-12" style="margin-top:-40px!important;">
            <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
             </div>
             <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('deletedsuccess');?></span>    
               <span style="color:red;"><?php echo $this->session->flashdata('deleteerror');?></span>
             </div>
           </div>
           <div class="row">
          <div class="col-sm-6 ">
            <form action="<?php echo base_url();?>admin/Addtenant/updatetenantdata" method="post" id="add_user">
              <?php 
                 foreach($tenantdata->result() as $tenant){  ?>
              <div class="form-group">
                <label class="control-label" for="username">Select Property</label>
              
                <input type="text" name="property" class='form-control' id='user' value="<?php echo  $tenant->property_name;?>" readonly>
              <span style="color:red;"><?php  echo form_error('property'); ?></span>
              </div>
              </div>
                <div class="col-sm-6 ">
              <div class="form-group">
                <label for='password' class='control-label'>User Name</label>
                <input type="text" name="user" class='form-control' id='user' value="<?php echo  $tenant->user;?>" >
                 <span style="color:red;"><?php  echo form_error('user'); ?>
              </div>
            </span>
          </div>
            <div class="col-sm-6 ">
              <div class="form-group">
                <label for='password' class='control-label'>Password</label>
                <input type="password" name="password" class='form-control' id='password' value="">
                 <span style="color:red;"><?php  echo form_error('password'); ?>
                
              </div></span>
            </div>
            <div class="col-sm-6 ">
              <div class="form-group">
                <label for='password' class='control-label'>Tenant Name</label>
                <input type="text" name="name" class='form-control' id='password' value="<?php echo  $tenant->name;?>">
                 <span style="color:red;"><?php  echo form_error('name'); ?>
              </div>
            </span>
          </div>
          <div class="col-sm-6 ">
              <div class="form-group">
                <label for='password' class='control-label'>Tenant Email</label>
                 <input type="email" name="email" class='form-control' id='password' value="<?php echo  $tenant->tenant_email;?>" required>
                 <span style="color:red;"><?php  echo form_error('email'); ?>
              </div>
            </span>
          </div>
                  <div class="col-sm-6 ">
               <div class="form-group">
                <label for='city' class='control-label'>Tenant City</label>
                <select name="city" class='form-control' id='password'>
                <?php  foreach($usercity->result() as $city){
                 $cityname =  $tenant->city; 
               $allcities = $city->cit_name; ?>
                  <option value="<?php echo $city->cit_name;?>" <?php if($cityname == $allcities ){ echo "selected"; } ?>><?php echo $city->cit_name;?></option>
                <?php } ?>
                </select>
                
                <input type="hidden" name="hidenid" class='form-control' id='password' value="<?php echo  $tenant->id;?>" required>
                 <span style="color:red;"><?php  echo form_error('email'); ?>
                <br>
                <button class="btn btn-primary" style="    margin-left: 64px; padding-left: 29px;  padding-right: 29px;" name="create_user" type="submit">  Update Tenant</button>
              </div></span>
            
        
           
          <?php } ?>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>



    <!-- /.content -->
  </div>
  

<script type="text/javascript">
  button = document.querySelector('button');
datalist = document.querySelector('datalist');
select = document.querySelector('select');
options = select.options;

/* on arrow button click, show/hide the DDL*/
button.addEventListener('click', toggle_ddl);

function toggle_ddl() {
  if (datalist.style.display === '') {
    datalist.style.display = 'block';
    this.textContent = "Update Tenant";
    /* If input already has a value, select that option from DDL */
    var val = input.value;
    for (var i = 0; i < options.length; i++) {
      if (options[i].text === val) {
        select.selectedIndex = i;
        break;
      }
    }
  } else hide_select();
}

/* when user selects an option from DDL, write it to text field */
select.addEventListener('change', fill_input);

function fill_input() {
  input.value = options[this.selectedIndex].value;
  hide_select();
}

/* when user wants to type in text field, hide DDL */
input = document.querySelector('input');
input.addEventListener('focus', hide_select);

function hide_select() {
  datalist.style.display = '';
  button.textContent = "Update Tenant";
}
</script>
<script type="text/javascript">
  /*$('.hid').hide();
  $('.shoten').click(function(){
   $('.hid').toggle();
  })*/
</script>
