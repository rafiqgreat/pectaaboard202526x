  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate Auto Paper </h3>
          </div>
          <?php /*?><div class="d-inline-block float-right">
            <a href="<?= base_url('admin/paper'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Generated Papers List</a>
          </div><?php */?>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>           
			   <?php echo form_open(base_url('admin/paper/term_wise_paper'), 'class="form-horizontal" method="post"');  ?>
			
				<div class="row">
                <?php /*?><div class="col-lg-12 col-sm-12" id="message_bar">  
					 <br />
                   <div class="alert alert-info">
					  <strong>Hint!</strong> Please select grade to generate paper for available subjects.
					</div>               
                </div><?php */?>
              	<div class="col-lg-3 col-sm-12">  					
					<label for="paper_grade_id" class="control-label">Select Paper Grade *</label>
					<select name="paper_grade_id" class="form-control form-group" id="paper_grade_id"  required>
						<option value="">--Select Paper Grade--</option>
						  <?php
                           foreach($grades as $grade)
                          {
                              echo '<option value="'.($grade['ibf_grade_id']).'">'.($grade['ibf_grade_id']-2).'</option>';
                          }
                          ?>
                  	</select>                    
                </div>
				<script language="javascript" type="text/javascript"> var addedsubjects = [];  
				<?php
					if(isset($added_subjects[0]))  {
						$i=0;
						foreach($added_subjects[0] as $keysub=>$valsub)
						{
							echo " addedsubjects[".$i++."] = '".$valsub."'; ";
						}
					}  ?>
				</script>
				<div class="col-lg-3 col-sm-12">                         
                   <label for="paper_subject_id" class="control-label">Select Paper Subject *</label>
                    <select name="paper_subject_id" class="form-control form-group" id="paper_subject_id"  required>
                      <option value="">--Select Paper Subject--</option>
                    </select>
                </div>
                <div class="col-lg-3 col-sm-12">                         
                   <label for="paper_term" class="control-label">Select Term *</label>
                    <select name="paper_term" class="form-control form-group" id="paper_term"  required>
                      <option value="">--Select Term--</option>
                      <option value="1">Term 1</option>
                      <option value="2">Term 2</option>
                    </select>
                </div>
              </div>
			
             <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------Start Block-1------------------------------------------------------------>             
         <div class="content" id="paper_selection_block">
			<input class="btn btn-info" type="submit" id="submit" name="submit" value="Start Auto Paper Generation &raquo; " disabled="disabled">
          </div>
		 <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
<!---------------------------------------------End Block-1------------------------------------------------------------> 
		 <?php echo form_close( ); ?>
		  </div>
		</div>	  
	  </section>
</div>
   		  
<script language="javascript" type="text/javascript">  
$('#paper_grade_id').on('change', function() {
	$('#paper_section').val('');
    $.post('<?=base_url("admin/paper/subjects_by_grade_mcq")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
		arr = $.parseJSON(data);     
		console.log(arr.length);     
		/*if(arr.length==0){
			$('#message_bar').html('<br /><div class="alert alert-danger"><strong>Sorry!</strong> No Paper Generation is available for this Subject.</div>');
			$('#paper_selection_block').css('visibility','hidden');
			$('#paper_selection_block').css('display','none');
		}
		else{
			$('#message_bar').html('<br /><div class="alert alert-success"><strong>Success!</strong> Now Select Subject for Paper Generation.</div>');
			$('#paper_selection_block').css('visibility','hidden');
			$('#paper_selection_block').css('display','none');
		}*/
		$('#paper_subject_id option:not(:first)').remove();
		$.each(arr, function(key, value) {           
		$('#paper_subject_id')
		 .append($("<option></option>")
					.attr("value", value.subject_id)
					.text(value.subject_name_en+' - '+value.subject_name_ur)
				  ); 
		});   
    });	
	
});
	
	
$('#paper_term').on('change', function() {	
	if($('#paper_grade_id').val() == ''){
		alert('Please select grade first!');
		$( '#paper_grade_id' ).focus();
		return false;
	}
	if($('#paper_subject_id').val() == ''){
		alert('Please select subject first!');
		$( '#paper_subject_id' ).focus();
		return false;
	}
	if($('#paper_term').val() == ''){
		alert('Please select term first!');
		$( '#paper_term' ).focus();
		return false;
	}else{
		$('#submit').prop('disabled', false);	
	}
	
	
	/*if($('#paper_grade_id').val() != '' && $('#paper_subject_id').val() != ''){
		$.post( '< ?=base_url("school/paper/school_paper_exist")?>', {
				'< ?php echo $this->security->get_csrf_token_name(); ?>': '< ?php echo $this->security->get_csrf_hash(); ?>',
				fp_subject_id: $('#paper_subject_id').val(),
				fp_section:this.value
			},
			function ( data ) {
				if ( data > 0 ) {
					alert( 'Paper for "Section '+$('#paper_section').val()+'" already exist!' );
					$('#paper_section').val('');
				}
				else{
					$('#submit').prop('disabled', false);
				}
				let papernumber = $('#paper_number').val();
				const paperNumyArray = papernumber.split("-");
				paperNumyArray[4] = $('#paper_section').val();
				$('#paper_number').val(paperNumyArray.join('-'));
			});
	}*/
	
});
$("body").on("submit", "form", function() {
    $(this).submit(function() {
        return false;
    });
    return true;
});
	
	var convert = function(convert){
    return $("<span />", { html: convert }).text();
    //return document.createElement("span").innerText;
};

</script>
<script language="javascript" type="text/javascript">
	
	/*function funSubmitPaper(){
		
		alert($("input[name='paper_item_b25']:checked").val());		
		if($("#paper_section").val()==''){ alert('Please select section!'); return false; }
		alert('Your Paper has been successfully generated! Note: This is Test Drive / Pilot Testing, ....');
		//window.location = "https://www.pecsba.educationservices.pk/school/paper";
		
	}*/
  
</script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>