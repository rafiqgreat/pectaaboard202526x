  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
			<div class="card-header">
				<div class="d-inline-block">
					<h3 class="card-title"> <i class="fa fa-plus"></i> Generate CRQs Itembank </h3>
				</div>
				<div class="d-inline-block float-right">
					<a href="<?= base_url('admin/itemsbank/itembank_crqs'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  CRQs Itembanks List</a>
				</div>
			</div>
			<div class="card-body">
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php') ?>
				<?php echo form_open(base_url('admin/itemsbank/crqs_add'), 'name="frm_itembank_add" id="frm_itembank_add" class="form-horizontal"');  ?>
				<div class="row">
					<div class="col-lg-4 col-sm-12">
						<label for="ibc_grade_id" class="control-label">Grade *</label>
						<select name="ibc_grade_id" class="form-control form-group" id="ibc_grade_id" required>
							<option value="">--Select Grades--</option>
							<?php
							foreach ( $grades as $grade ) {
								echo '<option value="' . $grade[ 'grade_id' ] . '">' . $grade[ 'grade_name_en' ] . '</option>';
							}
							?>
						</select>
					</div>
					<script language="javascript" type="text/javascript">
						var addedsubjects = [];
						<?php
					if(isset($added_subjects[0]))  {
						$i=0;
						foreach($added_subjects as $valsub)
						{
							echo " addedsubjects[".$i++."] = '".$valsub['ibc_subject_id']."'; ";
						}
					}  ?>
					</script>
					<div class="col-lg-4 col-sm-12">
						<label for="ibc_subject_id" class="control-label">Subject *</label>
						<select name="ibc_subject_id" class="form-control form-group" id="ibc_subject_id" required>
							<option value="">--Select Subjects--</option>
						</select>
					</div>
					<div class="col-lg-4 col-sm-12">
						<label for="ibc_created" class="col-sm-12 control-label">Date *</label>
						<input type="date" name="ibc_created" class="form-control" id="ibc_created" placeholder="" required="required" value="<?php echo date(" d/m/Y "); ?>" readonly>
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
				</div>
				<!--<div class="form-group">
					<div class="col-md-12">
						<input type="submit" name="submit" value="Save" class="btn btn-info pull-right">
					</div>
				</div>-->
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
	$( '#ibc_grade_id' ).on( 'change', function () {
		$( '#wizard' ).empty();
		$.post( '<?=base_url("admin/itemsbank/subjects_by_grade")?>', {
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				grade_id: this.value
			},
			function ( data ) {
				arr = $.parseJSON( data );
				console.log( arr );
				$( '#ibc_subject_id option:not(:first)' ).remove();
				$.each( arr, function ( key, value ) {
					$( '#ibc_subject_id' )
						.append( $( "<option></option>" )
							.attr( "value", value.subject_id )
							.text( value.subject_name_en )
						);
				} );
			} );

	} );

	$( '#ibc_subject_id' ).on( 'change', function () {
		var subjecid = this.value;
		var arreusubjects = ['4','8','12','18','25','31','39','47','5','9','13','19','26','32','40','48'];
		//console.log( addedsubjects );
		if ( jQuery.inArray( this.value, addedsubjects ) !== -1 ) {
			alert( 'This Subject (ID: ' + this.value + ') ItemBank already Generated! First Delete and then Add this! or Try other subject!' );
			$( '#ibc_subject_id' ).val( "" );
			return false;
		}
		
		
		$.post( '<?=base_url("admin/itemsbank/all_blocks_by_subject")?>', {
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				subject_id: this.value
			},
			function ( data ) {
				arr = $.parseJSON( data );
				//console.log( arr );
				$( '#wizard' ).empty();
				
				if ( $.inArray( subjecid, arreusubjects ) !== -1 ) {
					$.each( arr, function ( key, value ) {
						numberOfBlocks = value.ibs_crq_blocks;
						numberOfQuestions = value.ibs_crq_bquestions;

						for ( let i = 1; i <= value.ibs_crq_blocks; i++ ) {
							//var questionhtml = '<div class="row">';
							var questionhtml = '';

							for ( let j = 1; j <= value.ibs_crq_bquestions; j++ ) {
								questionhtml +=
									'<div class="row">'+
										'<div class="col-lg-12 col-sm-12">' +
											'<h3><strong>Question #' + i + '.' + j + ' </strong>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: normal;font-size: 0.8em;">[Item ID - SLO - Item Code - Item Stem - (Difficulty) - (Cognitive Level)]</span></h3>' +
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
					});
				}
				else
				{
					$.each( arr, function ( key, value ) {
						numberOfBlocks = value.ibs_crq_blocks;
						numberOfQuestions = value.ibs_crq_bquestions;

						for ( let i = 1; i <= value.ibs_crq_blocks; i++ ) {
							//var questionhtml = '<div class="row">';
							var questionhtml = '';

							for ( let j = 1; j <= value.ibs_crq_bquestions; j++ ) {
								questionhtml +=
									'<div class="row">'+
										'<div class="col-lg-12 col-sm-12">' +
											'<h3><strong>Group #' + i + '.' + j + ' </strong></h3>' +
											'<select name="ibc_b' + i + '_group' + j + '" class="form-control form-group" id="ibc_b' + i + '_group' + j + '" onChange="getCurrentValue(this.id, this.value, numberOfBlocks, numberOfQuestions)">' +
												'<option value="">--Select Group--</option>' +
											'</select>' +
										'</div>'+
									'</div>';
							}
							//questionhtml += '</div>';

							var blockhtml = '<h2></h2><section><h3><strong>Select Group Block-' + i + '</strong></h3>' + questionhtml + '</section>';

							$( '#wizard' ).append( blockhtml );
						}
					});
				}

				$( function () {
					$( "#wizard" ).steps( {
						headerTag: "h2",
						bodyTag: "section",
						transitionEffect: "slideLeft",
						onFinished: function ( event, currentIndex ) {
							$("#frm_itembank_add").submit();
							//$(document).on('submit','#tbl_tmpfrm',function(){})
							//alert('submitted');
						}
					} );
				});
				
				$.each( arr, function ( key, value ) {

					for ( let ii = 1; ii <= value.ibs_crq_blocks; ii++ ) {
						for ( let jj = 1; jj <= value.ibs_crq_bquestions; jj++ ) {
							if ( $.inArray( subjecid, arreusubjects ) !== -1 ) 
							{
								populatedropdowurduenglishcrq(ii,jj,subjecid);
							}
							else
							{
								populatedropdow(ii,jj,subjecid);
							}
							
						}
					}
				});
			//alert(numberOfBlocks+' - '+ numberOfQuestions);
			
			});

	});//subject change
	
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
	
	function populatedropdowurduenglishcrq(i,j,subjectid){
		
		$.post( '<?=base_url("admin/itemsbank/all_crq_items_by_subject")?>', {
			'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
			subject_id: subjectid
		},
		function ( data ) {
			arr = $.parseJSON( data );
			//console.log( arr );
			//<!-----------------------------------Start Blocks b1-------------------------------------------------------->
			$( '#ibc_b' + i + '_group' + j + ' option:not(:first)' ).remove();
			$.each( arr, function ( key, value ) {
				var clean_en_string = value.item_stem_en.replace( /(<([^>]+)>)/ig, '');
				clean_en_string = clean_en_string.replace(/\s+/g, ' ').trim();
				clean_en_string = clean_en_string.replace('&nbsp;', ' ').trim();
				clean_en_string = clean_en_string.substring(0, 50);
				
				var clean_ur_string = value.item_stem_ur.replace( /(<([^>]+)>)/ig, '');
				clean_ur_string = clean_ur_string.replace(/\s+/g, ' ').trim();
				clean_ur_string = clean_ur_string.replace('&nbsp;', ' ').trim();
				clean_ur_string = clean_ur_string.substring(0, 50);
				
				$( '#ibc_b' + i + '_group' + j )
					.append( $( "<option></option>" )
						.attr( "value", value.item_id  )
						.text(value.item_id + ' - SLO('+value.slo_number+') - '+value.item_code + ' - '+clean_en_string+' - '+clean_ur_string+' (Difficulty: '+value.item_difficulty+' ) - (Cognitive Level: '+value.item_cognitive_bloom+')' )
					);
			});
		});//end dropdwnpopution
	}
	
	function cleanstring(uncleanstring){
		if(uncleanstring !== null){
			var clean_string = uncleanstring.replace( /(<([^>]+)>)/ig, '');
			clean_string = clean_string.replace(/\s+/g, ' ').trim();
			clean_string = clean_string.replace('&nbsp;', ' ').trim();
			clean_string = clean_string.substring(0, 50);
			return clean_string;
		}else{
			return '';
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
					/*if(currentSelectbox !== "ibc_b"+ii+"_group"+jj){
						$("#ibc_b"+ii+"_group"+jj+" option[value='"+selctedvalue+"']").remove();
					}*/
					if(currentSelectbox !== "ibc_b"+ii+"_group"+jj){
						if(selctedvalue == $("#ibc_b"+ii+"_group"+jj).val() ){
							//alert($("#ibc_b"+ii+"_group"+jj).val());
							alert('Group already selected in Block-' + ii + '/Group-' + ii + ' and Group #' + ii + '.' + jj);
							$("#"+currentSelectbox).val('');
						}
					}
				}
			}
		}
	}
	
	function getCurrentValueCRQ(currentSelectbox, selctedvalue, numberOfBlocks, numberOfQuestions){
		/*alert(selctedvalue);
		alert(numberOfBlocks);
		alert(numberOfQuestions);
		alert(currentSelectbox);*/
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
							$("#"+currentSelectbox).val('');
						}
					}
				}
			}
		}
	}
</script>
<script language="javascript" type="text/javascript">
	document.getElementById( 'ibc_created' ).valueAsDate = new Date();
	function funSubmitPaper(){
		//$( "#frm_itembank_add" ).submit();
		//alert('infunction');
	}
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>



