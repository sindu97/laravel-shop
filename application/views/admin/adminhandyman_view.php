<?php
$filled_City= $userdatatenant123;
$allcitiesdata= $usercity;

$allcitiefill = array();
    foreach($filled_City->result() as $fill){
        $fcity = $fill->city;
        array_push($allcitiefill, $fcity);
    }
    $allcities = array();
    foreach($allcitiesdata->result() as $fill1){
        $all = $fill1->cit_name;
        array_push($allcities, $all);
    }
    $result=array_diff($allcities,$allcitiefill);

?>



 <section class="hid">
    <div class="">
      <div class="">
         <h1 style="padding-top: 17px;">Handyman Management</h1>
         <p style="padding-top: 17px;text-align: center; margin-top: -22px;">Add the Handyman by filling the form below:</p>
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
           <div class="row">
          
            <form action="<?php echo base_url();?>admin/handyman/addhandydata" method="post" id="add_user">
              <div class="col-sm-4 ">
                <div class="form-group">
                <label for='password' class='control-label'>Handyman Name</label>
                <input type="text" name="T_name" class='form-control' id='user'>
                 <span style="color:red;"><?php  echo form_error('T_name'); ?>
              </div>
              </div>
               <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Handyman Phone</label>
                <input type="text" name="T_phone" class='form-control' id='user'>
                 <span style="color:red;"><?php  echo form_error('T_phone'); ?>
              </div>
            </span>
          </div>
          <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Handyman Email</label>
                <input type="text" name="email" class='form-control' id='user'>
                 <span style="color:red;"><?php  echo form_error('email'); ?>
              </div>
            </span>
          </div>
                <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>User Name</label>
                <input type="text" name="user" class='form-control' id='user'>
                 <span style="color:red;"><?php  echo form_error('user'); ?>
              </div>
            </span>
          </div>
            <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Password</label>
                <input type="password" name="password" class='form-control' id='password'>
                 <span style="color:red;"><?php  echo form_error('password'); ?>
                </span>
              </div>
            </div>
                  <div class="col-sm-4 ">
                    <div class="form-group">
               <label for='password' class='control-label'>Address</label>
                <input type="text" name="Addresss" class='form-control' id='Addresss'>
                 <span style="color:red;"><?php  echo form_error('Addresss'); ?>
                </span>
              </div>
              </div>
            <div class="col-sm-4 ">
                <div class="form-group">
                <label for='city' class='control-label'>City</label>
                <select name="City" class='form-control' id='password'>
                <?php  foreach($result as $city){ ?>
                  <option><?php echo $city;?></option>
                <?php } ?>
                </select>
               
                 <span style="color:red;"><?php  echo form_error('City'); ?>
                
              </div></span>
            
            </div>
            <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>state</label>
                <input type="text" name="state" class='form-control' id='state'>
                 <span style="color:red;"><?php  echo form_error('state'); ?>
                </span>
                
              </div>
            </div>
            <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Zip</label>
                <input type="text" name="Zip" class='form-control' id='Zip'>
                 <span style="color:red;"><?php  echo form_error('Zip'); ?>
                </span>
              </div>
            </div>
            <div class="col-sm-4 ">
            </div>
            <div class="col-sm-4 ">
            </div>
            <div class="col-sm-4 ">
               <div class="form-group">
                <button class="btn btn-primary" style="    margin-left: 24px; padding-left:45px;  padding-right:45px;" name="create_user" type="submit">Add Handyman</button>
                <span id="msg"></span>
              </div></span>
            </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>


<!-----------------------------------end add handy man section----------------------->  
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Handyman</h3>
            </div>
            <div><br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Zip</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
              <?php  foreach($userdatatenant->result() as $val){ ?>
                <tr>
                  
                  <td><?php echo $val->name;?></td>
                  <td><?php echo $val->email;?></td>
                  <td><?php echo $val->phone;?></td>
                  <td><?php echo $val->address;?></td>
                  <td><?php echo $val->city;?></td>
                  <td><?php echo $val->state;?></td> 
                  <td><?php echo $val->pin;?></td>
                  <td><a href="<?php echo base_url();?>admin/handyman/edithandyman/<?php echo $val->id;?>"> <button class="btn btn-success">Edit</button></a>
                    
                   <a href="<?php echo base_url();?>admin/handyman/deletehandyman/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">Delete</button></a></td>
                </tr>

              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                 <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Zip</th>
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
    this.textContent = "▲";
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

/*function hide_select() {
  datalist.style.display = '';
  button.textContent = "▼";
}*/
</script>
<script type="text/javascript">
  /*$('.hid').hide();
  $('.shoten').click(function(){
   $('.hid').toggle();
  })*/
</script>
