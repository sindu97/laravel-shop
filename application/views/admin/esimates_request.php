
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Estimated Requests</h3>
            </div>
            <div><br>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Property Name</th>
                  <th>Handyman Name</th>
                  <th>Handyman Phone</th>
                  <th>Handyman City</th>
                  <th>Problem</th>
                  <th>Estimated Cost</th>
                  <th>Approval Status</th>
                  <th>Remarks</th>
                </tr>
                </thead>
                <tbody>
               
              <?php 
               if(empty($userhany)){
                $userhany =array();
              }

              $previousValue = null;
              $previoustime = null;
               foreach($userhany as $val){
                if($val->appoint_id){
             if( $val->appoinment_date !==  $previousValue || $val->appoinment_time !==  $previoustime) {
                 ?>
           
                <tr>
                  
                  <td><?php echo $val->property_name;?></td>
                  <td><?php echo $val->name;?></td>
                  <td><?php echo $val->phone;?></td>
                  <td><?php echo $val->city;?></td>
                  <td><?php echo $val->message;?></td>
                  <td><?php echo $val->estimated_cost;?></td>
                  <?php $previousValue = $val->appoinment_date;?>
                  <?php $previoustime = $val->appoinment_time;?>
                  <td> <?php  $status = $val->approve;
                  if($status == '0'){
                    $value = 1; ?>
                   <a href="#"> <button class="btn btn-primary">Not Approved</button></a>
                  <?php }elseif($status == '1'){ 
                    ?>
                    <a href="#"> <button class="btn btn-success ">Approve</button></a>
                    <?php }else{ ?>
                       <a href="#"> <button class="btn btn-danger ">Decline</button></a>
                     <?php } ?>

                    </td>
                  <td><?php echo $val->Remarks;?></td>
                </tr>

              <?php 
              } else{?>
                 <tr>
                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?php echo $val->message;?></td>
                  <td><?php echo $val->estimated_cost;?></td>
                  
                  <td> <?php  $status = $val->approve;
                  if($status == '0'){
                    $value = 1; ?>
                   <a href="#"> <button class="btn btn-primary">Not Approved</button></a>
                  <?php }elseif($status == '1'){ 
                    ?>
                    <a href="#"> <button class="btn btn-success ">Approve</button></a>
                    <?php }else{ ?>
                       <a href="#"> <button class="btn btn-danger ">Decline</button></a>
                     <?php } ?>

                    </td>
                  <td><?php echo $val->Remarks;?></td>
                </tr>
              <?php } 
            }
          }?>
                </tbody>
                <tfoot>
                <tr>
                 <th>Property Name</th>
                  <th>Handyman Name</th>
                  <th>Handyman Phone</th>
                  <th>Handyman City</th>
                  <th>Problem</th>
                  <th>Estimated Cost</th>
                  <th>Approval Status</th>
                  <th>Remarks</th>

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
