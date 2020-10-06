<?php if(!defined("BASEPATH")) exit('No direct script access allowed'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Settings
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?php echo base_url('admin/settings/update_settings') ?>">Profile</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
              <div class="box box-primary">
                  <div class="box-header with-border">
                    <h4> Update Settings</h4>
                  </div>
                    <div class="box-body">
                      <div class="form-group">
                        <label for="logo">Logo</label></br>
                        <img id="logo" src="http://placehold.it/180" alt="your image"/></br></br>
                        <input type='file' onchange="readURL(this,'logo');" />
                      </div>
                    </div>
                </div>
            </div>
                <div class="col-sm-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Settings</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input type="text" class="form-control" id="email_address" name="email_address"  placeholder="Email Address"/>
                            </div>
                            <div class="form-group">
                                <label for="mobile_no">Mobile Number</label>
                                <input type="number" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile Number"/>
                            </div>
                            <div class="form-group">
                                <label for="complete_address">Complete Address</label>
                                <input type="text" class="form-control" id="complete_address" name="complete_address" placeholder="Complete Address">
                            </div>
                            <div class="form-group">
                                <label for="site_title">Site Title</label>
                                <input type="text" class="form-control" id="site_title" name="site_title" placeholder="Site Title">
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-flat">Update Settings</button>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
          </div>
    </section>