  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Grade </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/grades'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Grades List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/grades/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">                         
                <label for="grade_code" class="col-sm-12 control-label">Grade Code</label>
                <div class="col-12">
                  <input type="text" name="grade_code" class="form-control" id="grade_code" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="grade_name_en" class="col-sm-12 control-label">Grade Name (Eng)</label>
                <div class="col-12">
                  <input type="text" name="grade_name_en" class="form-control" id="grade_name_en" placeholder="" required="required">
                </div>
              </div>
              
              <div class="form-group">
                <label for="grade_name_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> گریڈ </label>
                <div class="col-12">
                  <input type="text" name="grade_name_ur" class="form-control" id="grade_name_ur" placeholder="" required="required" dir="rtl">
                </div>
              </div>
              <div class="form-group">
                <label for="grade_sort" class="col-sm-12 control-label">Grade Sort</label>
                <div class="col-12">
                  <input type="number" name="grade_sort" class="form-control" id="grade_sort" placeholder="" required="required">
                </div>
              </div>
             
              <div class="form-group">
                <label for="grade_status" class="col-sm-12 control-label">Grade Status</label>
                <div class="col-12">
                    <select name="grade_status" class="form-control" id="grade_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Grade" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>