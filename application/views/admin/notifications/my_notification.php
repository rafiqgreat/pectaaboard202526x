 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">
        

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i><?=$title?> </h3>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/notification/add_notification'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?> 

			
         


            <!-- Data table start here--------------------------->

            
           
              <div class="card-body table-responsive">

                <table id="na_datatable" class="table table-bordered table-striped" width="100%">

                  <thead>

                    <tr>
                      <th>Sr.</th>
                      <th>Title</th>
                      <th>Notification Date</th>
                      <th>Notification To</th>
                      <th>Notification</th>
                      <th>View</th>
                    </tr>

                  </thead>
                </table>

              </div>

            

            <?php echo form_close( ); ?>

          <!-- /.box-body -->

        </div>

      </div>

    </section> 

  </div>

		



<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

<?php

//$subject   = (isset($item_subject_id)&&$item_subject_id!="0") ? $item_subject_id : 0;

?>



<!-- DataTables -->



<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>

<script>

  //---------------------------------------------------

  var table = $('#na_datatable').DataTable( {

    "processing": true,

    "serverSide": true,

    "ajax": "<?=base_url('admin/notification/my_notification_jason')?>",

      "columnDefs": [
        { "targets": 0, "name": "ns.notification_id", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "notification_title", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "ns.created_at", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "role_name", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "notification_desc", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "ns.notification_id", 'searchable':false, 'orderable':false}
    ]

  });

  table.buttons().container()

        .appendTo( '#na_datatable .col-md-6:eq(0)' );



</script>





