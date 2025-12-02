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

			
         


            <!-- Data table start here--------------------------->

            
           
              <div class="card-body table-responsive">

                <table id="na_datatable" class="table table-bordered table-striped" width="100%">

                  <thead>

                    <tr>
                      <th>Sr.</th>
                      <!--<th>Reciver</th>-->
                      <th>Subject</th>
                      <th>Message Date</th>
                      <th>To Group</th>
                      <th>Message</th>
                      <th>View</th>
                    </tr>

                  </thead>
                </table>

              </div>

            

           

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

    "ajax": "<?=base_url('admin/notification/my_messages_jason')?>",

      "columnDefs": [

        { "targets": 0, "name": "ci_messages.msg_id", 'searchable':true, 'orderable':true},
        //{ "targets": 1, "name": "msg_type", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "msg_subject", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "created_at", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "role_name", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "msg_body", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "msg_id", 'searchable':false, 'orderable':false}
    
       
    ]

  });

  table.buttons().container()

        .appendTo( '#na_datatable .col-md-6:eq(0)' );



</script>





