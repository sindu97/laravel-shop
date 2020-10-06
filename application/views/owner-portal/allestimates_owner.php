
<?php 
foreach($allproperty->result() as $val12){
$owner_property = $val12->Managedproperty;
}
?>
<section class="content singledta">
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
                  <th>Items Needed</th>
                </tr>
                </thead>
                <tbody>
               
              <?php 
                 $previousValue = null;
                 $previoustime = null;             
                foreach($userhany as $val){
                  if( $val->appoinment_date !==  $previousValue || $val->appoinment_time !==  $previoustime) {
                 
                 $estimate_property = $val->property_name;
                 if($allproperty->result()){
                 if($owner_property == $estimate_property ){
                   ?>
                <tr>
                  <td><?php echo $val->property_name;?></td>
                  <td><?php echo $val->name;?></td>
                  <td><?php echo $val->phone;?></td>
                  <td><?php echo $val->city;?></td>
                  <td><?php echo $val->message;?></td>
                  <td><?php echo $val->estimated_cost;?></td>
                  <?php $previousValue = $val->appoinment_date;?>
                  <?php  $previoustime = $val->appoinment_time;?>
                  <?php $app = $val->approve;
                  if($app == 1){ ?>
                    <td> 
                    <form>
                      <select name="approve" disabled >
                        <option value="1" <?php if($app == 1){ echo"selected";}?>>Approved</option>
                        <option value="0" <?php if($app == 0){ echo"selected";}?>>Not Approved</option>
                        <option value="2" <?php if($app == 2){ echo"selected";}?>>Decline</option>
                      </select>
                    </form>
                  </td>
                  <?php }else{ ?>
                  <td> 
                    <form>
                      <select name="approve" class="approval" rel="<?php echo $val->appoint_id; ?>" >
                        <option value="1" <?php if($app == 1){ echo"selected";}?>>Approved</option>
                        <option value="0" <?php if($app == 0){ echo"selected";}?>>Not Approved</option>
                        <option value="2" <?php if($app == 2){ echo"selected";}?>>Decline</option>
                      </select>
                    </form>
                  </td>
                <?php } ?>

                  <td>

                    <?php echo $val->prerequites_message;?></td>
                </tr>

              <?php }
                }
            }else {?>
               <?php
                 $estimate_property = $val->property_name;
                 if($allproperty->result()){
                 if($owner_property == $estimate_property ){
                   ?>
                <tr>
                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>

                  <td><?php echo $val->message;?></td>
                  <td><?php echo $val->estimated_cost;?></td>
                  <?php $app = $val->approve; ?>
                  <td> 
                    <form>
                      <select name="approve" class="approval" rel="<?php echo $val->appoint_id; ?>">
                        <option value="1" <?php if($app == 1){ echo"selected";}?>>Approved</option>
                        <option value="0" <?php if($app == 0){ echo"selected";}?>>Not Approved</option>
                        <option value="2" <?php if($app == 2){ echo"selected";}?>>Decline</option>
                      </select>
                    </form>
                  </td>
                  <td>
                    <?php echo $val->prerequites_message;?></td>
                </tr>
              <?php }
                  }
                }
              } 
              ?>
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
                  <th>Items Needed</th>

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
  



<!-----------------ajax for the requst status---------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
  $('.approval').change(function(){
    var valueapprov = $(this).val();
    if( valueapprov == 2){
      var creat_group = prompt("Reason for the decline Request?");
    }
    var estimateid = $(this).attr('rel');
     $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>"+"/owner-portal/Dashboard/ajaxapproval",
            data:{ valueapprov:valueapprov,estimateid:estimateid,creat_group:creat_group },
            success: function (data) {
              $("#popup").hide();
              //alert(data);
                //$('#putdisabledate').html(data);
            }
    })
    
  });
});
</script>