 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">
        
         <?php /*?>
              <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong>Subject :</strong><?=$notification->notification_title?>
                        </button>
                      </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-lg-6 col-sm-12 float-left"> <strong>From :</strong><?=$notification->sent_from?></div>
                               <div class="col-lg-6 col-sm-12 float-right">Date : <?=date("d/m/Y H:i:s", strtotime($notification->created_at))?>
                              </div>
                              <div class="col-lg-12 col-sm-12 float-left"> <strong>To :</strong>
                              <?php 
                                echo $recipiants;
                              ?>

                          </div>
                          </div>
                          
                          <p>
                          <?=$notification->notification_desc?>
                         </p>
                      </div>
                    </div>
                  </div>
            </div><?php */?>
        

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i>Notification Detail</h3>

          </div>

        </div>

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>
          <div class="row">
              <div class="col md-12">
                  <ul class="list-group">
                      <li class="list-group-item active"><strong>From :</strong><?=$notification->sent_from?><div style="text-align: right;">Date : <?=date("d/m/Y H:i:s", strtotime($notification->created_at))?></div></li>
                      <?php
                        if($this->session->userdata('admin_id') == $notification->created_by){
                            ?>
                            <li class="list-group-item "> <strong>To :</strong><span style="font-size: 11px;"><?=$recipiants?></span></li>
                      <?php
                        }
                        ?>
                      <li class="list-group-item"><strong>Subject :</strong><?=$notification->notification_title?></li>
                      <li class="list-group-item"><?=$notification->notification_desc?></li>
                    </ul>
              </div>
          </div>
         
      </div>

    </section> 

  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>









