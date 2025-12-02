<style>
	.border-none {
	  border-collapse: collapse;
	  border: none;
	}

	.border-none td {
	  border: 1px solid black;
	}

	.border-none tr:first-child td {
	  border-top: none;
	}

	.border-none tr:last-child td {
	  border-bottom: none;
	}

	.border-none tr td:first-child {
	  border-left: none;
	}

	.border-none tr td:last-child {
	  border-right: none;
	}
	.tabletd tr{
		line-height: 30px;
	}	
	.bordertop{
		border-top: 1px solid #000 !important;
	}
	[data-title] 
	{
		font-size: 18px;
		position: relative;
		/*cursor: help;*/
	}
	[data-title]:hover::before 
	{
		content: attr(data-title);
		position: absolute;
		bottom: -46px;
		padding: 10px;
		background: #000;
		color: #CCC;
		font-size: 14px;
		white-space: nowrap;
	}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Main content -->
  <section class="content">
    <div class="card card-default color-palette-bo">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"> <i class="fa fa-plus"></i> School Wise Generated Papers Detail </h3>
        </div>
        <div class="d-inline-block float-right"> <a href="<?= base_url('admin/school/schools_report'); ?>" class="btn btn-success"><i class="fa fa-list"></i> District Schools Report</a> </div>
      </div>
      <div class="card">
      <div class="card-header">
            <?php
			$tehid = $this->uri->segment('4');			
			$tehid = isset($tehid)?$tehid:'';
			 echo form_open(base_url('admin/school/mcq_erq_sch_dtl/'.$tehid), 'class="form-horizontal" method="post"');  ?>
              <div class="row" style="width:100%">
              <div class ="col-12" style="font-size:18px; font-weight:bold">Advance School Search :</div>
              <div class ="col-12">
              	<div class ="row" style="padding-top:25px">
                    <div class ="col-9">
                    	<div class ="row">
                        	<?php
							//echo '<pre>';
                            //print_r($school_type);
                            //die();
							
							?>
                            <input type="hidden" id="school_tehsil_id" name="school_tehsil_id" value="<?php $tehsil[0]['tehsil_id']; ?>" />
                            
                            <div class ="col-3" <?php if($this->session->userdata('role_id') == 8){?> style="display: none;"<?php }?>>
                                <select name="school_tehsil_id" class="form-control form-group" id="school_tehsil_id" placeholder="">
                                    <option value="<?php echo $tehsil[0]['tehsil_id'];?>"><?php echo $tehsil[0]['tehsil_name_en'];?></option>    
                                </select>
                            </div>
                    		<div class ="col-3">
                                <select name="school_level" class="form-control form-group" id="school_level" placeholder="">
                                    <option value="">---Level---</option>
                                    <option value="Primary" <?php if(isset($school_level)){if($school_level == 'Primary') echo"selected"; } ?>>Primary</option>
                                    <option value="Middle" <?php if(isset($school_level)){if($school_level == 'Middle') echo"selected"; }?>>Middle</option>
                                    <option value="High" <?php if(isset($school_level)){if($school_level == 'High') echo"selected"; }?>>High</option>
                                    <option value="Higher Secondary" <?php if(isset($school_level)){if($school_level == 'Higher Secondary') echo"selected"; }?>>Higher Secondary</option>
                                    <option value="Secondary" <?php if(isset($school_level)){if($school_level == 'Secondary') echo"selected"; }?>>Secondary</option>
                                    <option value="sMosque" <?php if(isset($school_level)){if($school_level == 'sMosque') echo"selected"; }?>>sMosque</option>
                                  </select>
                            </div>
                  			<div class ="col-3">
                                <select name="school_type" class="form-control form-group" id="school_type" placeholder="">
                                    <option value="">---Type---</option>
                                    <option value="Public" <?php if(isset($school_type)){if($school_type == 'Public') echo"selected";} ?>>Public</option>
                                    <option value="Private" <?php if(isset($school_type)){if($school_type == 'Private') echo"selected";} ?>>Private</option>
                                </select>
                            </div>
							<div class ="col-3">
                                <select name="school_gender" class="form-control form-group" id="school_gender" placeholder="">
                                    <option value="">---Gender---</option>
                                    <option value="Male" <?php if(isset($school_gender)){if($school_gender == 'Male') echo"selected"; }?>>Male</option>
                                    <option value="Female" <?php if(isset($school_gender)){if($school_gender == 'Female') echo"selected"; }?>>Female</option>
                                    <option value="Both" <?php if(isset($school_gender)){if($school_gender == 'Both') echo"selected"; }?>>Both</option>
                                </select>
                            </div>
                            <?php /*?><div class ="col-2">
                                <select name="gen_papers" class="form-control form-group" id="gen_papers" placeholder="">
                                    <option value="">---Papers---</option>
                                    <option value="1" <?php if(isset($gen_papers)){if($gen_papers == '1') echo "selected"; }?>>Generated</option>
                                    <option value="2" <?php if(isset($gen_papers)){if($gen_papers == '2') echo "selected"; }?>>Non Generated</option>
                                </select>
                            </div><?php */?>
                   		</div>
                    </div>
                    <div class ="col-3">
                    	<input type="submit" id="search_school" name="search_school" class="btn btn-success" value="Search" style="float:left"/>
                        <?php 
						//print_r($tehsil[0]['tehsil_id']);
						//die();
						
						/*if((isset($school_level) && $school_level!="") || (isset($school_type) && $school_type!="") || (isset($school_gender) && $school_gender!="")){*/?>
                        <a href="<?= base_url('admin/school/create_filter_school_csv?school_tehsil_id='.$tehsil[0]['tehsil_id'].'&school_level='.$school_level.'&school_type='.$school_type.'&school_gender='.$school_gender) ?>" class="btn btn-secondary" style="float:left; margin-left:10px">Export CSV</a>
                        <?php /* } */?>
                    </div>
                    <?php /* if($this->session->userdata('role_id') == 7 || $this->session->userdata('role_id') == 8){ }else{?>
						<div class ="col-3">&nbsp;</div>
						<div class ="col-3">&nbsp;</div>
						<div class ="col-3">&nbsp;</div>
					<?php }*/?>
				</div>
              </div>
              
              </div>
            <?php echo form_close( ); ?>
      </div>
    </div>
      <div class="card-body">
        <table class="tabletd" style="width: 100%; text-align:center" border="2" cellpadding="0">
          <thead>
            <tr>
              <th style="padding: 10px 0;">#</th>
              <th width="40%">Name of School</th>
              <th>Type</th>
              <th>Class wise Generated Paper 
                <table class="border-none" style="width: 100%">
                  <tbody>
                    <tr>
                      <td class="bordertop" width="14%"><strong>G-3</strong></td>
                      <td class="bordertop" width="14%"><strong>G-4</strong></td>
                      <td class="bordertop" width="14%"><strong>G-5</strong></td>
                      <td class="bordertop" width="14%"><strong>G-6</strong></td>
                      <td class="bordertop" width="14%"><strong>G-7</strong></td>
                      <td class="bordertop" width="14%"><strong>G-8</strong></td>
                      <td class="bordertop" width="16%"><strong>Total</strong></td>
                    </tr>
                  </tbody>
                </table>
              </th>
            </tr>
          </thead>
          <tbody>
          
          <?php 
		  if(!empty($schools))
		  {
			  $i=0;foreach($schools as $row){ $i++;?>
				<tr>
				  <td><?php echo $i;?></td>
				  <td data-title = "<?php echo $row['school_name'];?>" style="text-align:left; padding-left:5px"><?php echo substr($row['school_name'],0,40);?></td>
				  <td><?php echo $row['school_type'];?></td>
				  <td>
					<table class="border-none" style="width: 100%; height: 100%;">
						<?php $school_mcq = $this->School_model->get_mcq_stats_for_school($row['school_id']); $school_mcq = $school_mcq[0]; 
						$school_mcq_total = $school_mcq['5_mcqs']+$school_mcq['6_mcqs']+$school_mcq['7_mcqs']+$school_mcq['8_mcqs']+$school_mcq['9_mcqs']+$school_mcq['10_mcqs'];
						$school_mcq_total = ($school_mcq_total!=0)?$school_mcq_total:""?>
						<tr>
						  <td width="14%"><strong><?php echo $school_mcq['5_mcqs'];?></strong></td>
						  <td width="14%"><strong><?php echo $school_mcq['6_mcqs'];?></strong></td>
						  <td width="14%"><strong><?php echo $school_mcq['7_mcqs'];?></strong></td>
						  <td width="14%"><strong><?php echo $school_mcq['8_mcqs'];?></strong></td>
						  <td width="14%"><strong><?php echo $school_mcq['9_mcqs'];?></strong></td>
						  <td width="14%"><strong><?php echo $school_mcq['10_mcqs'];?></strong></td>
						  <td width="16%"><strong><?php echo $school_mcq_total;?></strong></td>
						</tr>
					</table>
				  </td>
				 </tr>
				<?php }
		  }
		  else
		  {?>
			  <tr>
				  <td colspan="10">
                  	<?php echo 'No School Found';?>
				  </td>
			  </tr>
	<?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
 /* $("body").on("change",".tgl_checkbox",function(){
    console.log('checked');
    $.post('< ?=base_url("admin/school/change_status")?>',
    {
      '< ?php echo $this->security->get_csrf_token_name(); ?>' : '< ?php echo $this->security->get_csrf_hash(); ?>',
      school_id : $(this).data('id'),
      school_status : $(this).is(':checked') == true?1:0
    },
    function(data){
      $.notify("School Status Changed Successfully", "success");
    });
  });
$('#school_district_id').on('change', function() {
      $.post('< ?=base_url("admin/school/tehsil_by_district")?>',
    {
      '< ?php echo $this->security->get_csrf_token_name(); ?>' : '< ?php echo $this->security->get_csrf_hash(); ?>',
      district_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#school_tehsil_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#school_tehsil_id')
         .append($("<option></option>")
                    .attr("value", value.tehsil_id)
                    .text(value.tehsil_name_en)
                  ); 
        });   
    });
});*/
</script>