<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Pilot Paper Dashboard</h3>
        </div>
        <div class="d-inline-block float-right">
          <div class="btn-group margin-bottom-20"> 
            <a href="<?= base_url() ?>admin/itemsbank/create_items_pdf" class="btn btn-secondary">Export as PDF</a>
            <a href="<?= base_url() ?>admin/itemsbank/export_items_csv" class="btn btn-secondary">Export as CSV</a>
          </div>
          <?php if($this->session->userdata('role_id')==12122){?><a href="<?= base_url('admin/itemsbank/add');?>" class="btn btn-success"><i class="fa fa-plus"></i>Generate Items Bank</a><?php }?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive">
		<table id="na_datatable" class="table table-bordered table-striped" width="100%" style="border:double; color:#000">
          <thead>
            <tr>
              <th>Grade</th>
              <th>Subjects</th>
              <th>Pilot Items</th>
              <th>Pilot MCQs</th>
              <th>Pilot CRQs</th>              
              <th>Pilot Paragraphs</th>  
				<th>Pilot Groups</th>
              <th>Versions</th>            
              <th width="100" class="text-right">Action</th>
            </tr>
          </thead>
            <tbody>
            <?php 
			$group_item = 0;
			$Pilot_Items=$MCQ_Items=$CRQ_Items=$Pilot_Groups=$Pilot_Paragraphs=0;
			foreach ($records as $row){
                ?>
                <tr>
                  <td><?php echo $row['Grade'];?></td>
                  <td><?php echo $row['subject_name_en'];?></td>
                  <td><?php echo $row['Pilot_Items']; $Pilot_Items+=$row['Pilot_Items'];?></td>
                  <td><?php echo $row['MCQ_Items']; $MCQ_Items+=$row['MCQ_Items'];?></td>
                  <td><?php echo $row['CRQ_Items']; $CRQ_Items+=$row['CRQ_Items'];?></td>                  
                  <td><?php echo $row['Pilot_Paragraphs']; $Pilot_Paragraphs+=$row['Pilot_Paragraphs'];?></td>
				<td><?php echo $row['Pilot_Groups']; $Pilot_Groups+=$row['Pilot_Groups']; ?>
                  <td><a href='<?php echo base_url('application/controller/admin/pilotpaper/pilot_ver_view/'.$row['item_subject_id']);?>'>V-1</a></td>              
                  <td><a title="View" class="view btn btn-sm btn-info" href="'<?=base_url('#')?>'"> <i class="fa fa-eye"></i></a></td>
                </tr>
            <?php }?>
            	<tr style="font-weight:bold;">
                  <td colspan="2" align="right">Total</td>
                  <td><?php echo $Pilot_Items;?></td>
                  <td><?php echo $MCQ_Items;?></td>
                  <td><?php echo $CRQ_Items;?></td>
                  <td><?php echo $Pilot_Groups;?></td>
                  <td><?php echo $Pilot_Paragraphs;?></td>
                  <td></td>
                  <td><a title="View" class="view btn btn-sm btn-info" href="'<?=base_url('#')?>'"> <i class="fa fa-eye"></i></a></td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </section>  
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>