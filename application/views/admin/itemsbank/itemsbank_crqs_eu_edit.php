  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i> Edit CRQs Itembank </h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/itemsbank/itembank_crqs'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  CRQs Itembanks List</a>
				</div>
			</div>
			<?php
				/*print "<pre>";
				$itembankinfo = $itembanks[0];
				print_r($itembanks);
				die;*/
				$itembankinfo = $itembanks[0];
				?>
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php') ?>
				<?php echo form_open(base_url('admin/itemsbank/crqs_edit/'.$itembankinfo->ibc_subject_id), 'name="frm_itembank_edit" id="frm_itembank_edit" class="form-horizontal"');  ?>
				<div class="row">
					<div class="col-lg-4 col-sm-12">
						<label for="ibc_grade_id" class="control-label">Grade</label>
						<input type="hidden" id="ibc_grade_id" name="ibc_grade_id" value="<?php print $itembankinfo->ibc_grade_id; ?>" />
						<input type="hidden" id="ibc_createdby" name="ibc_createdby" value="<?php print $itembankinfo->ibc_createdby; ?>" />
						<br><?php print $itembankinfo->grade_name_en; ?>
					</div>
					<div class="col-lg-4 col-sm-12">
						<label for="ibc_subject_id" class="control-label">Subject</label>
						<input type="hidden" id="ibc_subject_id" name="ibc_subject_id" value="<?php print $itembankinfo->ibc_subject_id; ?>" />
						<br><?php print $itembankinfo->subject_name_en; ?>
					</div>
					<div class="col-lg-4 col-sm-12">
						<label for="ibc_created" class="col-sm-12 control-label">Date *</label>
						<input type="hidden" name="ibc_created" id="ibc_created" value="<?php print date($itembankinfo->ibc_created); ?>">
						<?php print date_time($itembankinfo->ibc_created);?>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<hr/>
					</div>
				</div>
				<script>
				</script>
				<div id="wizard">
					<?php 
					
					$block = $blocks[0];
					/*$.each( arr, function ( key, value ) {
						numberOfBlocks = value.ibs_crq_blocks;
						numberOfQuestions = value.ibs_crq_bquestions;

						for ( let i = 1; i <= value.ibs_crq_blocks; i++ ) {
							//var questionhtml = '<div class="row">';
							var questionhtml = '';

							for ( let j = 1; j <= value.ibs_crq_bquestions; j++ ) {
								questionhtml +=
									'<div class="row">'+
										'<div class="col-lg-12 col-sm-12">' +
											'<h3><strong>Question #' + i + '.' + j + ' </strong>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: normal;font-size: 0.8em;">[SLO-Item Code-(Item ID)-Item Stem - (Difficulty) - (Cognitive Level)]</span></h3>' +
											'<select name="ibc_b' + i + '_group' + j + '" class="form-control form-group" id="ibc_b' + i + '_group' + j + '" onChange="getCurrentValueCRQ(this.id, this.value, numberOfBlocks, numberOfQuestions)">' +
												'<option value="">--Select Item/Question--</option>' +
											'</select>' +
										'</div>'+
									'</div>';
							}
							//questionhtml += '</div>';

							var blockhtml = '<h2></h2><section><h3><strong>Select Block-' + i + '/Question-' + i + ' Items</strong></h3>' + questionhtml + '</section>';

							$( '#wizard' ).append( blockhtml );
						}
					});*/
					$numberOfBlocks = $block->ibs_crq_blocks;
					$numberOfQuestions = $block->ibs_crq_bquestions;
					
					for($i = 1; $i <= $numberOfBlocks; $i++){?>
						<h2></h2>
						<section><h3><strong>Select Block-<?php print $i;?>/Question-<?php print $i;?> Items</strong></h3>
						
						<?php
						for($j = 1; $j <= $numberOfQuestions; $j++){?>
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<h3><strong>Question #<?php print $i.'.'.$j;?> </strong>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: normal;font-size: 0.8em;">[Item ID - SLO - Item Code - Item Stem - (Difficulty) - (Cognitive Level)]</span></h3>
									<select name="ibc_b<?php print $i.'_group'.$j;?>" class="form-control form-group" id="ibc_b<?php print $i.'_group'.$j;?>" onChange="getCurrentValue(this.id, this.value, <?php print $numberOfBlocks;?>, <?php print $numberOfQuestions;?>)">
										<option value="">--Select Item/Question--</option>
										<?php 
										$selectedItem = $this->Itemsbank_model->itembank_selected_crqs_by_subject($itembankinfo->ibc_subject_id, $i, $j);							
										foreach($crqitems as $item){
											$selected = '';
											if($selectedItem['ibc_item_id'] == $item->item_id)
												 $selected = ' selected="selected" ';
											print '<option value="'.$item->item_id.'" '.$selected.'>'.$item->item_id.' - SLO('.$item->slo_number.') - '.cleanstring($item->item_stem_en).' - '.cleanstring($item->item_stem_ur).' (Difficulty: '.$item->item_difficulty.') - (Cognitive Level: '.$item->item_cognitive_bloom.') </option>';
										}
										?>
									</select>
								</div>
							</div>
					<?php
						}?>
						</section>
					<?php
					}
					?>
				</div>
				<?php echo form_close( ); ?>
				<!-- /.box-body -->
			</div>
		</div>
	</section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js">
</script>
<script type="text/javascript">
	var numberOfBlocks = '';
	var numberOfQuestions = '';
	
	function populatedropdow(i,j,subjectid){
		
		$.post( '<?=base_url("admin/itemsbank/all_crq_group_by_subject")?>', {
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
			subject_id: subjectid
		},
		function ( data ) {
			arr = $.parseJSON( data );
			//console.log( arr );
			//<!-----------------------------------Start Blocks b1-------------------------------------------------------->
			$( '#ibc_b' + i + '_group' + j + ' option:not(:first)' ).remove();
			$.each( arr, function ( key, value ) {
				var clean_en_string = cleanstring(value.group_title_en);
				var clean_ur_string = cleanstring(value.group_title_ur);
				var clean_group_item_1_stem_en = cleanstring(value.group_item_1_stem_en);
				var clean_group_item_2_stem_en = cleanstring(value.group_item_2_stem_en);
				
				$( '#ibc_b' + i + '_group' + j )
					.append( $( "<option></option>" )
						.attr( "value", value.group_id  )
						.text( clean_en_string+' - '+clean_ur_string+' - Q1. '+clean_group_item_1_stem_en+' - Q2. '+clean_group_item_2_stem_en )
					);
			});
		});//end dropdwnpopution
	}
	
	
	function getCurrentValue(currentSelectbox, selctedvalue, numberOfBlocks, numberOfQuestions){
		for ( let ii = 1; ii <= numberOfBlocks; ii++ ) {
			for ( let jj = 1; jj <= numberOfQuestions; jj++ ) {
				if(selctedvalue != ''){
					/*if(currentSelectbox !== "ibc_b"+ii+"_group"+jj){
						$("#ibc_b"+ii+"_group"+jj+" option[value='"+selctedvalue+"']").remove();
					}*/
					if(currentSelectbox !== "ibc_b"+ii+"_group"+jj){
						if(selctedvalue == $("#ibc_b"+ii+"_group"+jj).val() ){
							//alert($("#ibc_b"+ii+"_group"+jj).val());
							alert('Item already selected in Block-' + ii + '/Question-' + ii + ' and Question #' + ii + '.' + jj);
							//alert('Group already selected in Block-' + ii + '/Group-' + ii + ' and Group #' + ii + '.' + jj);
							$("#"+currentSelectbox).val('');
						}
					}
				}
			}
		}
	}
</script>
<script language="javascript" type="text/javascript">
	function funSubmitPaper(){
		//$( "#frm_itembank_edit" ).submit();
		//alert('infunction');
	}
	$( function () {
		$( "#wizard" ).steps( {
			headerTag: "h2",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			onFinished: function ( event, currentIndex ) {
				$("#frm_itembank_edit").submit();
			}
		} );
	});
</script>
<?php 
function cleanstring($uncleanstring){
	if($uncleanstring !== null){
		$clean_string = strip_tags($uncleanstring);
		$clean_string = str_replace('&nbsp', ' ', $clean_string); // Replaces all spaces with hyphens.
		$clean_string = substr($clean_string,0, 50);
		return $clean_string;
	}else{
		return '';
	}
}
?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>



