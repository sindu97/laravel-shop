<?php           $fill = $userdata->result();
                $all =$userdatatenant->result();
                 $allslots_arr=array();
                   foreach($all as $val){
                    $allslots = $val->property_name;
                   array_push($allslots_arr,$allslots);
                  } 
                  $disableslots_arr=array();
                   foreach($fill as $val1){
                    $allslots = $val1->Managedproperty;
                   array_push($disableslots_arr,$allslots);
                  }
                  $result=array_diff($disableslots_arr,$allslots_arr);
/*echo"<pre>";
print_r($result);
foreach($result as$ret){
echo $ret;
}
die();*/

?>
 <section class="hid">
    <div class="">
      <div class="">
         <h1 style="padding-top: 17px;">Tenant Management</h1>
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
           <div class="row">
          <div class="col-sm-4 ">
            <form action="<?php echo base_url();?>admin/Addtenant/addtenantdata" method="post" id="add_user">
              <div class="form-group">
                <label class="control-label" for="username">Select Property</label>
                <input list="property1" name="property1" class="form-control">
                <datalist id="property1">
                  <?php foreach($result as $prop){?>
                  <option value="<?php echo $prop; ?>">
                  <?php } ?>
                </datalist>   
              <span style="color:red;"><?php  echo form_error('property'); ?></span>
              </div>
              </div>
               <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Tenant Name</label>
                <input type="text" name="T_name" class='form-control' id='user'>
                 <span style="color:red;"><?php  echo form_error('T_name'); ?>
              </div>
            </span>
          </div>
          <div class="col-sm-4 ">
              <div class="form-group">
                <label for='password' class='control-label'>Tenant Email</label>
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
                
              </div></span>
            </div>
                  <div class="col-sm-4 ">
               <div class="form-group">
                <label for='city' class='control-label'>Tenant City</label>
                <select name="City" class='form-control' id='password'>
                <?php  foreach($usercity->result() as $city){ ?>
                  <option><?php echo $city->cit_name;?></option>
                <?php } ?>
                </select>
                 <span style="color:red;"><?php  echo form_error('City'); ?>
                
              </div></span>
            </div>
            <div class="col-sm-4 ">
            </div>
            <div class="col-sm-4 ">
            </div>
            <div class="col-sm-4 ">
               <div class="form-group">
                <button class="btn btn-primary" style="    margin-left: 24px; padding-left:45px;  padding-right:45px;" name="create_user" type="submit">Add Tenant</button>
                <span id="msg"></span>
              </div></span>
            </div>
            </form> 
          </div>
        </div> 
      </div>
    </div>   
  </section>


 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All tenants</h3>
            </div>
            <div><br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Property Name</th>
                  <th>Tenant Name</th>
                  <th>Tenant Email</th>
                  <th>Tenant Username</th>
                  <th>Tenant City</th>
                  <th>status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
              <?php  foreach($userdatatenant->result() as $val){ ?>
                <tr>
                  <td><?php echo $val->property_name;?></td>
                  <td><?php echo $val->name;?></td>
                  <td><?php echo $val->tenant_email;?></td>
                  <td><?php echo $val->user;?></td>
                  <td><?php echo $val->city;?></td>
                  <td> <?php  $status = $val->status;
                  if($status == '1'){
                    $value = 1; ?>
                   <a href="<?php echo base_url();?>admin/Addtenant/updatestatus/<?php echo $value;?>/<?php echo $val->id;?>"> <button class="btn btn-success">Active</button></a>
                  <?php }else{ 
                    $value = 0;?>
                    <a href="<?php echo base_url();?>admin/Addtenant/updatestatus/<?php echo $value ;?>/<?php echo $val->id;?>"> <button class="btn btn-danger">Block</button></a>
                    <?php } ?></td>
                  

                  <td><a href="<?php echo base_url();?>admin/Addtenant/edittenat/<?php echo $val->id;?>"> <button class="btn btn-success ed" style="margin-right: 51px;">Edit</button></a>
                    
                   <a href="<?php echo base_url();?>admin/addtenant/deletetenant/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger dl" style="float: right;
    margin-top: -33px;margin-right: 21px;">Delete</button></a></td>
                </tr>

              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                 <th>Property Name</th>
                  <th>Tenant Name</th>
                  <th>Tenant Email</th>
                  <th>Tenant Username</th>
                  <th>Tenant City</th>
                  <th>status</th>
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
  


