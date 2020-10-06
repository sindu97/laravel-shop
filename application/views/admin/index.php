<?php if(!defined("BASEPATH")) exit('No direct script access allowed'); ?>


<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="upload_form_wrapper">
            <h2>Select Excel File To Upload</h2>
            <div class="outer-container">
                <form action="<?php echo base_url();?>admin/dashboard/Import_excel_file" class="form-inline" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="xl_file" class='control-label'>Choose Excel File</label>
                        <input type="file" name="xl_file" class="form-control" id="xl_file" accept=".xls,.xlsx" required>
                        <button type="submit" id="submit" name="import"
                            class="btn btn-primary">Upload</button>
                        <span id="error"></span>
                    </div>
                </form>
            </div>
        </div>
      <!-- /.row (main row) -->
     <div class="error"><span style="color:red;"><?php echo $this->session->flashdata('excelerror');?></span>
     <span style="color:red;"><?php echo $this->session->flashdata('excelsuccess');?></span>
     <span style="color:red;"><?php echo $this->session->flashdata('Noselected');?></span>
    </div>
    </section>
    <!-- /.content -->
  
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
        
            <! -- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>loginid</th>
                  <th>Managedproperty</th>
                  <th>Property ID</th>
                  <th>Date</th>
                  <th>Num</th>
                  <th>Name</th>
                  <th>Memo</th>
                  <th>Paidamount</th>
                </tr>
                </thead>
                <tbody>
               
              <?php  foreach($userdata->result() as $val){ ?>
                <tr>
                  <td><?php echo $val->loginid;?></td>
                   <td><?php echo $val->property_id;?></td>
                  <td><?php echo $val->Managedproperty;?></td>
                  <td><?php echo $val->Date ;?></td>
                  <td><?php echo $val->Num ;?></td>
                  <td><?php echo $val->Name ;?></td>
                  <td><?php echo $val->Memo ;?></td>
                  <td><?php echo $val->Paidamount ;?></td>
                </tr>

              <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>loginid</th>
                  <th>Property ID</th>
                  <th>Managedproperty</th>
                  <th>Date</th>
                  <th>Num</th>
                  <th>Name</th>
                  <th>Memo</th>
                  <th>Paidamount</th>
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
  