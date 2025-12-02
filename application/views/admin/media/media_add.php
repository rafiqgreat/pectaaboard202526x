  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Media </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/media'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Media Gallery</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/media/add'), 'class="form-horizontal" enctype="multipart/form-data"');  ?> 
                   <div class="col-lg-12 col-sm-12">
                    <label for="m_image" class="control-label">Add Media</label>
                    <input type="text" name="m_title" class="form-control col-12 form-group" id="m_title" placeholder="Add title" required="required">
                	<input type="file" name="m_image" class="form-control col-12 form-group" id="m_image" placeholder="" required="required">
                  </div>
                <div class="form-group col-lg-12 col-sm-12">
                  <input type="submit" name="submit" value="Add Media" class="btn btn-info pull-right" style="float:left" >
                </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
