 <?php /*echo"<pre>";
 print_r($userdata->result());
 die();*/
 ?>
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
           <div class="row">
          
            <form action="<?php echo base_url();?>admin/addcity/addcitydata" method="post" id="add_user">
             
            <div class="col-sm-6 ">
              <div class="form-group">
                <label for='password' class='control-label'>Add city</label>
                <input type="text" name="city" class='form-control' id='city'>
                 <span style="color:red;"><?php  echo form_error('city'); ?>
                </span>
              </div>
            </div>
            <div class="col-sm-2 ">
            </div>
            <div class="col-sm-4 ">
               <div class="form-group">
                <button class="btn btn-primary" style="    margin-left: 24px; padding-left:45px;  padding-right:45px; margin-top: 29px;" name="create_user" type="submit">Add Business City</button>
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
                  <th>City Name</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
              <?php  foreach($userdata->result() as $val){ ?>
                <tr>
                  
                  <td><?php echo $val->cit_name;?></td>
                  <td><a href="<?php echo base_url();?>admin/addcity/editcity/<?php echo $val->id;?>"> <button class="btn btn-success">Edit</button></a>
                    
                   <a href="<?php echo base_url();?>admin/addcity/deleteslot/<?php echo $val->id;?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger">Delete</button></a></td>
                </tr>

              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                 <th>City Name</th>
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
