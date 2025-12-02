  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Blocks </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Blocks List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/blocks/edit/'.$blocks['block_id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="block_code" class="col-sm-2 control-label">Blocks Code</label>

                <div class="col-md-12">
                  <input type="text" name="block_code" value="<?= $blocks['block_code']; ?>" class="form-control" id="block_code" placeholder="" >
                </div>
              </div>
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Blocks Name (Eng)</label>

                <div class="col-md-12">
                  <input type="text" name="block_name_en" value="<?= $blocks['block_name_en']; ?>" class="form-control" id="block_name_en" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="block_name_ur" class="col-sm-2 control-label">Blocks Name (Urdu)</label>

                <div class="col-md-12">
                  <input type="text" name="block_name_ur" value="<?= $blocks['block_name_ur']; ?>" class="form-control" id="block_name_ur" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="block_sort" class="col-sm-2 control-label">Block Sort</label>

                <div class="col-md-12">
                  <input type="block_sort" name="block_sort" value="<?= $blocks['block_sort']; ?>" class="form-control" id="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Select Status</label>
				<div class="col-md-12">
                  <select name="block_status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($blocks['block_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($blocks['block_status'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Block" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 