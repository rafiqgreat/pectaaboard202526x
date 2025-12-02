 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">
        
         <div class="row">

        	<div class="col-4">

              <div> <img src="<?php echo base_url(); ?>/assets/img/pec-image.jpg" width="110" height="130" /></div>

            </div>

            <div class="col-8">

              <div class="col-12" style="font-size:36px; font-weight:bold; text-align:center;">PUNJAB EXAMINATION COMMISSION [PEC]</div>

              <div class="col-12" style="font-size:30px; text-align:center; margin-top:1%">Wahdat Colony Road, Lahore</div>

            </div>

        </div>


        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"><?=$title?></h3>

          </div>

        </div>

           <!-- For Messages -->

            <?php //$this->load->view('admin/includes/_messages.php') 
            // new fields added in grid ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                      <th>Grades</th>
                      <th>Subjects</th>
                      <th>Content Strands</th>
                      <th>Sub Content strand</th>
                      <th>SLOS </th>
                      <th>Item Stem</th>
                      <th>Item Code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($res_data as $row):
                        ?>
                        <tr>
                            <td><?=$row['grade']?></td>
                            <td><?=$row['subject_name_en']?></td>
                             <td><?=$row['cs_strand']?></td>
                            <td><?=$row['subcs_strand']?></td>
                            <td><?=$row['slo']?></td>
                            <td><?=$row['item_stem_en']?></td>
                            <td><a href="<?=base_url('admin/items/rev_ss_aview/'.$row['item_id'])?>" target="_blank"><?=$row['item_code']?></a></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
               </tbody>
            </table>  


    </section> 

  </div>

		



<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>



<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>





<!-- DataTables -->


<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>


<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>


<script src="<?= base_url() ?>/assets/notify.js"></script>





