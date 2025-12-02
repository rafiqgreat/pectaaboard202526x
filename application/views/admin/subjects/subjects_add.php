  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Subject </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/subjects'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Subjects List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/subjects/add'), 'class="form-horizontal"');  ?> 
              <div class="row">
              <div class="col-lg-6 col-sm-12">
              	<label for="subject_gradeid" class="col-sm-12 control-label">Select Grade</label>
                <select name="subject_gradeid" class="form-control form-group" id="subject_gradeid"  required>
                  <option value="">--Select Grades--</option>
                  <?php
                   foreach($grades as $grade)
                  {
                    echo '<option value="'.$grade->grade_id.'">'.$grade->grade_name_en.'</option>';
                  }
                  ?>
                </select>
              </div>
                <div class="col-lg-6 col-sm-12">                         
                    <label for="grade_code" class="col-sm-6 control-label">Subject Code</label>
                    <div class="col-12">
                      <input type="text" name="subject_code" class="form-control" id="subject_code" placeholder="" required="required">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="subject_name_en" class="col-sm-12 control-label">Subject Name (Eng)</label>
                <div class="col-12">
                  <input type="text" name="subject_name_en" class="form-control" id="subject_name_en" placeholder="" required="required">
                </div>
              </div>
              
              <div class="form-group">
                <label for="subject_name_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> مضمو ن </label>
                <div class="col-12">
                  <input type="text" name="subject_name_ur" class="form-control" id="subject_name_ur" placeholder="" required="required" dir="rtl">
                </div>
              </div>
              <div class="form-group">
                <label for="subject_sort" class="col-sm-12 control-label">Subject Sort</label>
                <div class="col-12">
                  <input type="number" name="subject_sort" class="form-control" id="subject_sort" placeholder="" required="required">
                </div>
              </div>
             
              <div class="form-group">
                <label for="subject_status" class="col-sm-12 control-label">Subject Status</label>
                <div class="col-12">
                    <select name="subject_status" class="form-control" id="subject_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Subject" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>