  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Block </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/blocks'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Blocks List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/blocks/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">                         
                <label for="block_code" class="col-sm-2 control-label">Block Code</label>
                <div class="col-12">
                  <input type="text" name="block_code" class="form-control" id="block_code" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="block_name_en" class="col-sm-2 control-label">Block Name (Eng)</label>
                <div class="col-12">
                  <input type="text" name="block_name_en" class="form-control" id="block_name_en" placeholder="" required="required">
                </div>
              </div>
              
              <div class="form-group">
                <label for="block_name_ur" class="col-sm-2 control-label">Block Name (Urdu)</label>
                <div class="col-12">
                  <input type="text" name="block_name_ur" class="form-control" id="block_name_ur" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="block_sort" class="col-sm-2 control-label">Block Sort</label>
                <div class="col-12">
                  <input type="number" name="block_sort" class="form-control" id="block_sort" placeholder="" required="required">
                </div>
              </div>
             
              <div class="form-group">
                <label for="block_status" class="col-sm-2 control-label">Block Status</label>
                <div class="col-12">
                    <select name="block_status" class="form-control" id="block_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Block" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>