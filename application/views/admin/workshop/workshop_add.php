  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate New Certificate </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/workshop'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Workshops List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/workshop/add'), 'class="form-horizontal"');  ?> 
              
            <div class="form-group">
                <label for="ws_title" class="col-sm-12 control-label">Workshop Title*</label>
                <div class="col-md-12">
                  <input type="text" name="ws_title" value="" class="form-control" id="ws_title" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="ws_desc" class="col-sm-12 control-label">Workshop Description*</label>
                <div class="col-md-12">
                  <textarea id="ws_desc" name="ws_desc" class="form-control form-group" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="ws_fromdate" class="col-sm-12 control-label">From Date*</label>
                <div class="col-md-12">
                  <input type="date" name="ws_fromdate" value="" class="form-control" id="ws_fromdate" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="ws_todate" class="col-sm-12 control-label">To Date*</label>
                <div class="col-md-12">
                  <input type="date" name="ws_todate" value="" class="form-control" id="ws_todate" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="ws_location" class="col-sm-12 control-label">Location</label>
                <div class="col-md-12">
                  <input type="text" name="ws_location" value="" class="form-control" id="ws_location" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="ws_noofdays" class="col-sm-12 control-label">No of Days</label>
                <div class="col-md-12">
                  <input type="text" name="ws_noofdays" value="" class="form-control" id="ws_noofdays" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="ws_extra" class="col-sm-12 control-label">Extra</label>
                <div class="col-md-12">
                  <textarea id="ws_extra" name="ws_extra" class="form-control form-group"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="cf_status" class="col-sm-12 control-label">Status</label>
                <div class="col-12">
                    <select name="ws_status" class="form-control" id="ws_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Workshop" class="btn btn-info pull-right">
                </div>
            </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>
          