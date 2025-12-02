 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">
        

      <div class="card card-default color-palette-bo" style="padding: 10px;">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i>Message Detail</h3>

          </div>

        </div>

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ;?>
          
          <?php
          foreach($messages as $ow){
          ?>
          <div class="row">
              <div class="col md-12">
                  <ul class="list-group">
                      <li class="list-group-item active"><strong>From :</strong><?=$ow->firstname.' '.$ow->lastname?><div style="text-align: right;">Date : <?=date("d/m/Y H:i:s", strtotime($ow->sent_date))?></div></li>
                      <?php
                        if($this->session->userdata('admin_id') == $ow->sender_id){
                            ?>
                            <li class="list-group-item "> <strong>To :</strong><span style="font-size: 11px;"><?=$recipiants?></span></li>
                      <?php
                        }
                        ?>
                      <li class="list-group-item"><strong>Subject :</strong><?=$ow->msg_subject?></li>
                      <li class="list-group-item"><?=$ow->msg_body?></li>
                    </ul>
              </div>
          </div>
          <?php
          }
          
          
          foreach($threads as $row){
          ?>
          <div class="row">
              <div class="col md-12">
                  <ul class="list-group">
                      <li class="list-group-item active"><strong>Reply From :</strong><?=$row->firstname.' '.$row->lastname?><div style="text-align: right;">Reply Date : <?=date("d/m/Y H:i:s", strtotime($row->recived_at))?></div></li>
                      <?php
                        if($this->session->userdata('admin_id') == $row->sender_id){
                            ?>
                            <li class="list-group-item "> <strong>To :</strong><span style="font-size: 11px;"><?=$recipiants?></span></li>
                      <?php
                        }
                        ?>
                      <li class="list-group-item"><?=$row->message_text?></li>
                    </ul>
              </div>
          </div>
          <?php
          }
          ?>
              
         
            
			<?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/notification/reply_massage'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>
          <input type="hidden" id="msg_id" name="msg_id" value="<?=$msg_id?>">
         

			<div class="row">
                <div class="col-lg-6 col-sm-12">
                </div>
          </div>
          <div class="row">
              <div class="col-lg-12 col-sm-12"> 
                <label for="notification_desc" class="control-label">Reply *</label>
                <textarea name="msg_body" class="form-control" rows="5" id="msg_body" required></textarea>
              </div>
            </div>
            <div class="row">
                 <div class ="col-lg-12 col-sm-12" style="float:right;margin-top: 5px;">
                     <input type="submit" id="btnadd" name="btnadd" class="btn btn-success" value="Reply" style="width:120px; float:right"/>
                </div> 
            </div>
        

       

      </div>
    <?php echo form_close( ); ?>

    </section> 

  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>









