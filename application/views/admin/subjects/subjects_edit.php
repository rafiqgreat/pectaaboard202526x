  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-edit"></i>
              &nbsp; Edit Subjects </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/subjects'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Subjects List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/Subjects/edit/'.$subjects['subject_id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
               <label for="subject_gradeid" class="col-sm-2 control-label">Select Grade</label>
                <div class="col-12">
                <select name="subject_gradeid" class="form-control" id="subject_gradeid"  required>
                  <option value="">--Select Grades--</option>
                  <?php
                   foreach($grades as $grade)
				  {
					  $selectedText = '';
					  if($subjects['subject_gradeid']==$grade->grade_id)
					  $selectedText = ' selected="selected" ';
					  echo '<option value="'.$grade->grade_id.'" '.$selectedText.' >'.$grade->grade_name_en.'</option>';
				  }
				  ?>
                  </select>
				</div>
              </div>
              <div class="form-group">
                <label for="subject_code" class="col-sm-2 control-label">Subjects Code</label>

                <div class="col-md-12">
                  <input type="text" name="subject_code" value="<?= $subjects['subject_code']; ?>" class="form-control" id="subject_code" placeholder="" >
                </div>
              </div>
              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Subjects Name (Eng)</label>

                <div class="col-md-12">
                  <input type="text" name="subject_name_en" value="<?= $subjects['subject_name_en']; ?>" class="form-control" id="subject_name_en" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="subject_name_ur" class="col-sm-12 control-label" style="text-align:right;"> مضمو ن </label>

                <div class="col-md-12">
                  <input type="text" name="subject_name_ur" value="<?= $subjects['subject_name_ur']; ?>" class="form-control" id="subject_name_ur" placeholder="" dir="rtl">
                </div>
              </div>

              <div class="form-group">
                <label for="subject_sort" class="col-sm-2 control-label">Subjects Sort</label>

                <div class="col-md-12">
                  <input type="subject_sort" name="subject_sort" value="<?= $subjects['subject_sort']; ?>" class="form-control" id="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Select Status</label>
				<div class="col-md-12">
                  <select name="subject_status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" <?= ($subjects['subject_status'] == 1)?'selected': '' ?> >Active</option>
                    <option value="0" <?= ($subjects['subject_status'] == 0)?'selected': '' ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Subject" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div> 