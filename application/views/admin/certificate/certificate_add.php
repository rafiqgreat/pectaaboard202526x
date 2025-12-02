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
            <a href="<?= base_url('admin/certificate'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Certificates List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/certificate/add'), 'class="form-horizontal"');  ?> 
              
            <div class="form-group">
                <label for="user_type" class="col-sm-12 control-label">Select Type</label>
                <div class="col-12">
                    <select name="user_type" class="form-control" id="user_type" placeholder="" required="required">
                        <option value="3">Item Writer</option>
                        <option value="6">Item Reviewer</option>
                    </select>
                </div>
              </div>
            <div class="form-group">
                <label for="cf_iw_ir_id" class="col-sm-12 control-label">Candidate</label>
                <div class="col-12">
                    <select name="cf_iw_ir_id" class="form-control" id="cf_iw_ir_id" placeholder="" required="required">
                        <?php
                        foreach ( $itemwriters as $itemwriter ) {
                            echo '<option value="' . $itemwriter->admin_id . '">' . $itemwriter->firstname.' '.$itemwriter->lastname.' ('.$itemwriter->username . ')</option>';
                        }
                        ?>
                    </select>
                </div>
              </div>
             <div class="form-group">
                <label for="cf_ws_id" class="col-sm-12 control-label">Select Workshop</label>
                <select name="cf_ws_id" class="form-control form-group" id="cf_ws_id" required>
                    <?php
                    foreach ( $workshops as $workshop ) {
                        echo '<option value="' . $workshop->ws_id . '">' . $workshop->ws_title . '</option>';
                    }
                    ?>
                </select>
            </div>
              <div class="form-group">
                <label for="cf_status" class="col-sm-12 control-label">Status</label>
                <div class="col-12">
                    <select name="cf_status" class="form-control" id="cf_status" placeholder="" required="required">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Generate" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
    </section> 
  </div>
      
<script language="javascript">		
    $( '#user_type' ).on( 'change', function () {
        $.post( '<?=base_url("admin/certificate/users_by_roleid")?>', {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                admin_role_id: this.value
            },
            function ( data ) {
                arr = $.parseJSON( data );
                $( '#cf_iw_ir_id' ).empty();
                $.each( arr, function ( key, value ) {
                    $( '#cf_iw_ir_id' )
                        .append( $( "<option></option>" )
                            .attr( "value", value.admin_id )
                            .text( value.firstname+' '+value.lastname+' ('+value.username+')' )
                        );
                } );
            } );

    } );
</script>      