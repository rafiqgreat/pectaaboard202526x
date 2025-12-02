  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Grades </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Grades List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <?php echo form_open(base_url('admin/grades/edit/'.$grades['grade_id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="grade_code" class="col-sm-2 control-label">Grades Code</label>

                <div class="col-md-12">
                  <input type="text" name="grade_code" value="<?= $grades['grade_code']; ?>" class="form-control" id="grade_code" placeholder="" >
                </div>
              </div>
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Grades Name (Eng)</label>

                <div class="col-md-12">
                  <input type="text" name="grade_name_en" value="<?= $grades['grade_name_en']; ?>" class="form-control" id="grade_name_en" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="grade_name_ur" class="col-sm-12 control-label" style="text-align:right;"> گریڈ </label>

                <div class="col-md-12">
                  <input type="text" name="grade_name_ur" value="<?= $grades['grade_name_ur']; ?>" class="form-control" id="grade_name_ur" placeholder="" dir="rtl">
                </div>
              </div>

              <div class="form-group">
                <label for="grade_sort" class="col-sm-2 control-label">Grade Sort</label>

                <div class="col-md-12">
                  <input type="grade_sort" name="grade_sort" value="<?= $grades['grade_sort']; ?>" class="form-control" id="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Select Status</label>
				<div class="col-md-12">
                  <select name="grade_status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($grades['grade_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($grades['grade_status'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Grade" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 