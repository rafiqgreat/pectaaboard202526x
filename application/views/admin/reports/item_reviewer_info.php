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

              <h3 class="card-title"><?=$title?> </h3>

          </div>

        </div>
 

           <!-- For Messages -->

            <?php //$this->load->view('admin/includes/_messages.php') ?>

            
            <table class="table table-striped">
                <tbody>
                    <?php
                        foreach($res_data as $row):
                        ?>
                         <tr>
                            <td><a href="<?=base_url().$row['ci_ir_picture']?>" download > <img src="<?=base_url().$row['ci_ir_picture']?>" alt="Picture" width="150" height="150"></a></td>
                             <td><a href="<?=base_url().$row['cniccopy']?>" download > <img src="<?=base_url().$row['cniccopy']?>" alt="Picture" width="250" height="150"></a></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Name : </td>
                            <td><?=$row['ci_ir_name']?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">User Name : </td>
                            <td><?=$row['username']?></td>
                        </tr>
                         <tr>
                            <td class="font-weight-bold">Father Name : </td>
                            <td><?=$row['ci_ir_fathername']?></td>
                        </tr>
                         <tr>
                            <td class="font-weight-bold">Cell No : </td>
                            <td><?=$row['ci_ir_mobile']?></td>
                        </tr>
                         <tr>
                            <td class="font-weight-bold">CNIC : </td>
                            <td><?=$row['ci_ir_cnic']?></td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td><?=$row['email']?></td>
                        </tr>
                         <tr>
                            <td class="font-weight-bold">Subject : </td>
                            <td><?=$row['ci_ir_subject']?></td>
                        </tr>
                         <tr>
                            <td class="font-weight-bold">District : </td>
                            <td><?=$row['district_name_en']?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tehsil : </td>
                            <td><?=$row['tehsil_name_en']?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Posting : </td>
                            <td><?=$row['ci_ir_posting']?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Address : </td>
                            <td><?=$row['address']?></td>
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





