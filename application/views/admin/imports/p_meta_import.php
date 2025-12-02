  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block float-right">
            <div class="btn-group margin-bottom-20"> 
              <a href="<?= base_url() ?>downloads/Meta Sample.xlsx" class="btn btn-secondary" download>Get Tagging Sample File</a>
            </div>
          </div>
        </div>
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i><?=$title?></h3>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/imports/pilot_meta_import'), 'class="form-horizontal" enctype="multipart/form-data"');  ?> 
            <div class="form-group">                         
                  <label for="Pilot Phase" class="col-sm-12 control-label">Select Pilot Phase</label>
                  <select name="pilot_phase" class="form-control form-group" id="pilot_phase"  required="required">
                    <option value="">--Select Phase--</option>
                      <option value="1">Phase - 1</option>
                      <option value="2" selected="selected">Phase - 2</option>
                  </select> 
              </div>
              
              <div class="form-group">                         
                  <label for="upload_file" class="col-sm-12 control-label">Select File</label>
                  <input type="file" name="upload_file" class="form-control" id="upload_file" placeholder="" required >
              </div>
              <div class="form-group">
                  <input type="submit" name="btn_import" value="Import" class="btn btn-info pull-right">
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
  
<script type="text/javascript">  
 


</script>