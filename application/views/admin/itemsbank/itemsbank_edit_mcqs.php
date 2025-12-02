  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i> Edit MCQs Itembank </h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/itemsbank'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  MCQs Itembanks List</a>
				</div>
			</div>
			<div class="card-body">
				<!-- For Messages -->
				<?php
				/*print "<pre>";
				$itembankinfo = $itembanks[0];
				print_r($itembanks);
				die;*/
				$itembankinfo = $itembanks[0];
				?>
				<?php $this->load->view('admin/includes/_messages.php') ?>
				<?php echo form_open(base_url('admin/itemsbank/edit_mcqs/'.$itembankinfo->ibm_subject_id), 'name="frm_itembank_edit" id="frm_itembank_edit" class="form-horizontal"');  ?>
				<div class="row">
					<div class="col-lg-4 col-sm-12">
						<label for="ibm_grade_id" class="control-label">Grade</label>
						<input type="hidden" id="ibm_grade_id" name="ibm_grade_id" value="<?php print $itembankinfo->ibm_grade_id; ?>" />
						<input type="hidden" id="ibm_createdby" name="ibm_createdby" value="<?php print $itembankinfo->ibm_createdby; ?>" />
						<br><?php print $itembankinfo->grade_name_en; ?>
					</div>
					
					<div class="col-lg-4 col-sm-12">
						<label for="ibm_subject_id" class="control-label">Subject</label>
						<input type="hidden" id="ibm_subject_id" name="ibm_subject_id" value="<?php print $itembankinfo->ibm_subject_id; ?>" />
						<br><?php print $itembankinfo->subject_name_en; ?>
					</div>
					<div class="col-lg-4 col-sm-12">
						<label for="ibm_created" class="col-sm-12 control-label">Date</label>
						<input type="hidden" name="ibm_created" id="ibm_created" value="<?php print date($itembankinfo->ibm_created); ?>">
						<?php print date_time($itembankinfo->ibm_created);?>
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
					
					$numberOfBlocks = $block->ibs_mcq_blocks - $block->ibs_para_question;
					$numberOfQuestions = $block->ibs_mcq_bquestions;
					
					for($i = 1; $i <= $numberOfBlocks; $i++){?>
						<h2>Q</h2>
						<section>
							<h3><strong>Select Block-<?php print $i.'/Question-'.$i;?> Items</strong></h3>
						<?php
						for($j = 1; $j <= $numberOfQuestions; $j++){?>
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<h3><strong>Question #<?php print $i.'.'.$j;?> </strong>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: normal;font-size: 0.8em;">[Item ID - SLO-Item Code - Item Stem - (Difficulty) - (Cognitive Level)]</span></h3>
									<select name="ibm_b<?php print $i.'_item'.$j;?>" class="form-control form-group" id="ibm_b<?php print $i.'_item'.$j;?>" onChange="getCurrentValue(this.id, this.value, <?php print $numberOfBlocks;?>, <?php print $numberOfQuestions;?>)">
										<option value="">--Select Item/Question--</option>
										<?php 
										$selectedItem = $this->Itemsbank_model->itembank_selected_mcqs_by_subject($itembankinfo->ibm_subject_id, $i, $j);							
										foreach($allmcqs as $item){
											$selected = '';
											if($selectedItem['ibm_item_id'] == $item->item_id)
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
					if($block->ibs_para_question > 0){
						$numberOfParagraph = $block->ibs_para_question;
						?>
						<h2>Paragraph</h2>
						<section>
							<h3><strong>Select Paragraph</strong></h3>
							<?php
							for ( $j = 1; $j <= $numberOfParagraph; $j++ ) {?>
								<div class="row">
									<div class="col-lg-12 col-sm-12">
										<h3><strong>Paragraph # <?php print $j;?></h3>
										<select name="ibm_p<?php print $j;?>_para" class="form-control form-group" id="ibm_p<?php print $j;?>_para" onChange="getCurrentValuePara(this.id, this.value,<?php print $numberOfParagraph;?>)">
											<option value="">--Select Paragraph--</option>
											<?php 
											foreach($allmcqspara as  $para){
												$selectedPara = $this->Itemsbank_model->itembank_selected_mcqs_para_by_subject($itembankinfo->ibm_subject_id, 0, $j);
												$selected = '';
												if($selectedPara['ibm_para_id'] == $para->para_id)
													 $selected = ' selected="selected" ';
												print '<option '.$selected.' value="'.$para->para_id.'">'.cleanParaString($para->para_text_en).' - '.cleanParaString($para->para_text_ur).'</option>';
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

	function getCurrentValuePara(currentSelectbox, selctedvalue, numberOfPara){
		for ( let jj = 1; jj <= numberOfPara; jj++ ) {
			if(selctedvalue != ''){
				/*if(currentSelectbox !== "ibm_b"+ii+"_item"+jj){
					$("#ibm_b"+ii+"_item"+jj+" option[value='"+selctedvalue+"']").remove();
				}*/
				if(currentSelectbox !== "ibm_p"+jj+"_para"){
					if(selctedvalue == $("#ibm_p"+jj+"_para").val() ){
						//alert($("#ibm_b"+ii+"_item"+jj).val());
						alert('Paragraph already selected in Paragraph # ' + jj);
						$("#"+currentSelectbox).val('');
					}
				}
			}
		}
		
	}
	
	function getCurrentValue(currentSelectbox, selctedvalue, numberOfBlocks, numberOfQuestions){
		/*alert(selctedvalue);
		alert(numberOfBlocks);
		alert(numberOfQuestions);
		alert(currentSelectbox);*/
		for ( let ii = 1; ii <= numberOfBlocks; ii++ ) {
			for ( let jj = 1; jj <= numberOfQuestions; jj++ ) {
				if(selctedvalue != ''){
					/*if(currentSelectbox !== "ibm_b"+ii+"_item"+jj){
						$("#ibm_b"+ii+"_item"+jj+" option[value='"+selctedvalue+"']").remove();
					}*/
					if(currentSelectbox !== "ibm_b"+ii+"_item"+jj){
						if(selctedvalue == $("#ibm_b"+ii+"_item"+jj).val() ){
							//alert($("#ibm_b"+ii+"_item"+jj).val());
							alert('Item already selected in Block-' + ii + '/Question-' + ii + ' and Question #' + ii + '.' + jj);
							$("#"+currentSelectbox).val('');
						}
					}
				}
			}
		}
	}
</script>
<script language="javascript" type="text/javascript">
	//document.getElementById( 'ibm_created' ).valueAsDate = new Date();
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
				//$(document).on('submit','#tbl_tmpfrm',function(){})
				//alert('submitted');
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
function cleanParaString($uncleanstring){
	if($uncleanstring !== null){
		$clean_string = strip_tags($uncleanstring);
		$clean_string = str_replace('&nbsp', ' ', $clean_string); // Replaces all spaces with hyphens.
		$clean_string = substr($clean_string,0, 100);
		return $clean_string;
	}else{
		return '';
	}
}
?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>



