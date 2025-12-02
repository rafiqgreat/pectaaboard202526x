<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              <?=$title?> </h3>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php 
			$total_items = 0;
			$total_items = (isset($records)&&!empty($records))? count($records):0;
			$this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/reports/plagiarism_check_items'), 'class="form-horizontal"');  ?>  
            <div class="row">
                <div class="col-lg-6 col-sm-12">  
                    <label for="item_grade_id" class="control-label">Grade *</label>
                    <select name="item_grade_id" class="form-control form-group" id="item_grade_id"  required>
                        <option value="">--Select Grades--</option>
                          <?php
                            foreach($grades as $grade)
                            {
                                echo '<option value="'.$grade['grade_id'].'"'.set_select('item_grade_id',$grade['grade_id']).'>'.$grade['grade_name_en'].'</option>';
                            }
                          ?>
                    </select>                    
                </div>
                <div class="col-lg-6 col-sm-12">                         
                    <label for="item_subject_id" class="control-label">Subject </label>
                    <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  required>
                      <option value="">--Select Subjects--</option>
                        <?php
                        if(isset($subjects)&&!empty($records)){
                            foreach($subjects as $subject)
                            {
                                echo '<option value="'.$subject['subject_id'].'"'.set_select('item_subject_id',$subject['subject_id']).'>'.$subject['subject_name_en'].'</option>';
                            }
                        }
                      ?>
                    </select>
                </div>
            </div>

			<div class="row">
              	<div class="col-lg-6 col-sm-12">  
					<label for="item_count" class="control-label">Number of total items for comparison *</label>
					<input type="text" class="form-control" placeholder="" value="<?php echo $total_items;?>" name="item_count" id="item_count" readonly="readonly">               
                </div>
                <div class ="col-12" style="float:right; visibility:hidden" id="get_report_btn">
                     <input type="submit" id="get_report" name="get_report" class="btn btn-success" value="Search Plagiarism" style="float:right"/>
                </div> 
              </div>
              <?php echo form_close( ); ?>
            <!----------------------- Data table start here--------------------------->
            <?php
            if(isset($records)&&$records!=''){
            ?>
              <div class="card-body table-responsive">
                <table id="na_datatable" class="table table-bordered table-striped" width="100%">
                  <thead>
                    <tr>
                      <th>Grades</th>
                      <th>Subjects</th>
                      <th>Item Type</th>
                      <th>ContentStrand</th>
                      <th>Item Statement</th>
                      <th>Plagiarism</th>
                      <th>View details</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php 
					  $ti = count($records);
					   $ctr = 0;
					  foreach($records as $val){
						 
					  	 $compare = $this->Reports_model->get_item_plagiarism($val->item_id);					 						 
						  for($i=$ctr; $i<$ti; $i++)
						  {
								$compare2 = $this->Reports_model->get_item_plagiarism($records[$i]->item_id);
								if($val->item_id == $records[$i]->item_id) continue;
								
								$stem_comp = round(($this->smithwaterman->compare(strtolower(str_replace('%20',' ',$compare[0]->item_stem_en)),strtolower($compare2[0]->item_stem_en)) * 100),2);
								$stem_per = $stem_comp." %";
								if($stem_comp>10)
								{
								?>	
									<tr>                                
									  <td>Grades</td>
									  <td>Subjects</td>
									  <td>Item Type</td>
									  <td>ContentStrand</td>
									  <td>Item Statement</td>
									  <td>Plagiarism</td>
									  <td><?php echo $val->item_id . ' [compare with] ' .$records[$i]->item_id. ' => Result => '.$stem_per; ?></td>
								  </tr>
							<?php		
								}
						  }
						  $ctr++;
                       }?>
                  </tbody>
                </table>
              </div>
            <?php } ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<?php
//$grade = (isset($item_grade_id) && $item_grade_id!="0") ? $item_grade_id : 0;
//$subject = (isset($item_subject_id) && $item_subject_id!="0") ? $item_subject_id : 0;
//$pilotheaders = $this->Report_model->items_for_comparison($grade, $subject);
//print_r($pilotheaders);
//die();
?>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">

$('#item_grade_id').on('change', function() {
    
 $.post('<?=base_url("admin/reports/subjects_by_grade")?>',
	{
		'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		 grade_id : this.value
	},
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#item_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
      $('#item_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
});

$('#item_subject_id').on('change', function() {	
	$.post('<?=base_url("admin/reports/all_items_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
     arr = $.parseJSON(data);     
     console.log(data);
	 if(arr[0].items==0)
	 {
		 var div = document.getElementById('get_report_btn');
		 div.style.visibility = 'hidden';
		 $('#item_count').val(0);
		 alert('Sorry! No Items found in this Subject!');
		 return false;
	 }
	 else
	 {
		var div = document.getElementById('get_report_btn');
		div.style.visibility = 'visible';
		$('#item_count').val(arr[0].items);
	 }
  });
});
</script>