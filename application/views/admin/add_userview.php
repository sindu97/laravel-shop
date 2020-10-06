<?php           $fill = $userdatslect->result();
                $all =$userdatall->result();
                 $allslots_arr=array();
                   foreach($all as $val){
                    $allslots = $val->loginid;
                   array_push($allslots_arr,$allslots);
                  } 
                  $disableslots_arr=array();
                   foreach($fill as $val1){
                    $allslots = $val1->username;
                   array_push($disableslots_arr,$allslots);
                  }
                  $result=array_diff($allslots_arr,$disableslots_arr);
?>
<style>
  .hidetext { -webkit-text-security: disc; /* Default */ }
 </style> 
  <section class="">
    <div class="">
       <h1 style="padding-top: 24px; 
">Owner Management</h1>
<h3 style="padding-top: 14px; text-align:center;
">Create Login For Owner</h3>
      <div class="new_user_form">
        <div class="row">
          <div class="col-sm-12">
            <div class="error1"> 
                  <span style="color:red;"><?php echo $this->session->flashdata('insertdsuccess');?></span>
               
               <span style="color:red;"><?php echo $this->session->flashdata('inserteerror');?></span>
               <span style="color:red;"><?php echo $this->session->flashdata('deletedsuccess');?></span>
               <span style="color:red;"><?php echo $this->session->flashdata('updatepassword');?></span>
               <span style="color:red;"><?php echo $this->session->flashdata('notupdatepassword');?></span>
                <span style="color:red;"><?php echo $this->session->flashdata('mailsend');?></span>
               <span style="color:red;"><?php echo $this->session->flashdata('deleteerror');?></span>
             </div>
              <form action="<?php echo base_url();?>admin/adduser/adduserdata" method="post" id="add_user">
             <div class="row">
              <div class="col-sm-5">
              <div class="form-group">
                <label for='password' class='control-label'>Owner Name</label>
                <input type="text" name="ownername" class='form-control' id='ownername'>
                 <span style="color:red;"><?php  echo form_error('ownername'); ?></span>
              </div>
            </div>
              <div class="col-sm-5">
              <div class="form-group">
                <label for='password' class='control-label'>Owner Email</label>
                <input type="text" name="ownermail" class='form-control' id='ownermail'>
                 <span style="color:red;"><?php  echo form_error('ownermail'); ?></span>
              </div>
            </div>
            <div class="col-sm-2">
            </div>
             </div>
               <div class="row">
              <div class="col-sm-5">
              <div class="form-group">
                <label class="control-label" for="username">Select Username</label>
                <select class="form-control" name="username" id="username">
               <?php 
               foreach($result as $val){  ?>
                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>  
              <?php } ?>
                </select>
                <span style="color:red;"><?php  echo form_error('username'); ?></span>   
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for='password' class='control-label'>Create New Password</label>
                <input type="password" name="password" class='form-control' id='password'>
                 <span style="color:red;"><?php  echo form_error('password'); ?></span>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <button class="btn btn-primary" name="create_user" type="submit" style="    margin-top: 25px;padding-left: 25px;padding-right: 25px;
">Create Owner</button>
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

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Users</h3>
            </div><br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>User</th>
                  <th>Password</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
              <?php  foreach($userdataowner->result() as $val){ ?>
                <tr>
                  
                  <td><?php echo $val->username;?></td>
                  <td  class="hidetext"><?php echo $val->password;?></td>
                  <td>
                    <a href="<?php echo base_url();?>admin/Adduser/Editowner/<?php echo $val->id;?>"><button class="btn btn-success">Edit</button></a>
                    <a href="<?php echo base_url();?>admin/Adduser/deleteowner/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">Delete</button></a></td>
                </tr>

              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  
                  <th>User</th>
                  <th>Password</th>
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
  
