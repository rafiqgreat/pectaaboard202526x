  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add ERQ/CRQ Item </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/items'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Items List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/items/add_erq_crq'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  
			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
			<div class="row">
              	<div class="col-lg-3 col-sm-12">                         
                    <label for="item_date_received" class="col-sm-12 control-label">Date*</label>
                    <div class="col-12">
                      <input type="text" name="item_date_received" class="form-control" id="item_date_received" placeholder="" required="required" value="<?php echo date("y-m-d H:i:s"); ?>"  readonly>
                    </div>
                </div>
				<div class="col-lg-3 col-sm-12">                         
                    <label for="item_code" class="col-sm-12 control-label">Item Code *</label>
                    <div class="col-12">
                      <input type="text" name="item_code" class="form-control" id="item_code" placeholder="" required="required"  value="" readonly>
                    </div>
                </div>
				<div class="col-lg-2 col-sm-12">                         
                    <label for="item_difficulty" class="col-sm-12 control-label">Difficulty *</label>
                    <div class="col-12">
                      <input type="number" name="item_difficulty" class="form-control" id="item_difficulty" placeholder="" required="required" value="0.01" step="0.01" min="0.01" max="0.99">
                    </div>
                </div>				
				<div class="col-lg-2 col-sm-12">                         
                    <label for="item_discr" class="col-sm-12 control-label">Discr</label>
                    <div class="col-12">
                    <input type="number" name="item_discr" class="form-control" id="item_discr" placeholder="" required="required" value="0.00" min="-1" max="+1" step="0.01">
                      
                    </div>
				</div>
				<div class="col-lg-2 col-sm-12">                         
                    <label for="item_dif_code" class="col-sm-12 control-label">DIFF *</label>
                    <div class="col-12">
                      <select name="item_dif_code" class="form-control form-group" id="item_dif_code"  required>
                  		<option value="All">All</option>                  
						<option value="Male">Male</option>
						<option value="Female">Female</option>
                        <option value="Urban">Urban</option>
                        <option value="Rural">Rural</option>
                		</select>
                    </div>
                </div>                
             </div>
			<div class="row">
              	<div class="col-lg-2 col-sm-12">  
					<label for="item_grade_id" class="control-label">Grade *</label>
					<select name="item_grade_id" class="form-control form-group" id="item_grade_id"  required>
						<option value="">--Select Grades--</option>
                  <?php
                   foreach($grades as $grade)
				  {
					  echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
				  }
				  ?>
                  	</select>                    
                </div>
				<div class="col-lg-2 col-sm-12">                         
                   <label for="item_subject_id" class="control-label">Subject *</label>
                <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                </select>
                </div>
				<div class="col-lg-3 col-sm-12">                         
                    <label for="item_cstand_id" class="control-label">Content Strand *</label>
                <select name="item_cstand_id" class="form-control form-group" id="item_cstand_id"  required>
                  <option value="">--Select Content Strand--</option>
                </select>
                </div>				
				<div class="col-lg-5 col-sm-12">                         
                    <label for="item_subcstand_id" class="control-label">Sub Content Strand *</label>
                <select name="item_subcstand_id" class="form-control form-group" id="item_subcstand_id"  required>
                  <option value="">--Select Content Strand--</option>
                </select>
                </div>					
              </div>
              <div class="row">             
                <div class="col-lg-12 col-sm-12">                         
                    <label for="item_slo_id" class="control-label">Select SLO Statement *</label>
                <select name="item_slo_id" class="form-control form-group" id="item_slo_id"  required>
                  <option value="">--Select SLO Statement--</option>
                </select>
                </div>
			</div>	
			<div class="row">
              	<div class="col-lg-2 col-sm-12">  
					<label for="item_curriculum" class="control-label">Curriculum *</label>
					<select name="item_curriculum" class="form-control form-group" id="item_curriculum"  required>
						<option value="1">2006(ALP)</option>
						<option value="2">National Curriculum (2006)</option>
						<option value="3">Single National Curriculum(SNC) 2020</option>
                	</select>
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_pctb_chapter" class="control-label">PCTB Chapter</label>
					<input type="text" name="item_pctb_chapter" class="form-control" id="item_pctb_chapter" placeholder=""  value="" required="required">                   
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_pctb_page" class="control-label">PCTB Page No.</label>
					<input type="text" name="item_pctb_page" class="form-control" id="item_pctb_page" placeholder=""  value="" required="required">                   
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_other_title" class="control-label">Other Title</label>
					<input type="text" name="item_other_title" class="form-control" id="item_other_title" placeholder=""  value="" required="required">                   
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_other_year" class="control-label">Other Year</label>
					<input type="text" name="item_other_year" class="form-control" id="item_other_year" placeholder=""  value="" required="required">                   
                </div>
				<div class="col-lg-2 col-sm-12">  
					<label for="item_other_page" class="control-label">Other Page No.</label>
					<input type="text" name="item_other_page" class="form-control" id="item_other_page" placeholder=""  value="" required="required">                   
                </div>				
              </div>
			<div class="row">
              	<div class="col-lg-3 col-sm-12">  
					<label for="item_cognitive_bloom" class="control-label">Bloom/Cognitive *</label>
					<select name="item_cognitive_bloom" class="form-control form-group" id="item_cognitive_bloom"  required>
						<option value="Knowledge">Knowledge</option>
						<option value="Comprehension">Comprehension</option>
						<option value="Application">Application</option>
						<option value="Analysis">Analysis</option>
						<option value="Synthesis">Synthesis</option>
						<option value="Evaluation">Evaluation</option>                  
                  	</select>                    
                </div>
				<div class="col-lg-3 col-sm-12">                         
                   <label for="item_relation" class="control-label">Relation *</label>
                <select name="item_relation" class="form-control form-group" id="item_relation"  required>
                	<option value="Direct Quote">Direct Quote</option>
					<option value="Amended">Amended</option>
                </select>
                </div>
				<div class="col-lg-3 col-sm-12">                         
                   <label for="item_stem_number" class="control-label">STEM Number *</label>
                <input type="text" name="item_stem_number" class="form-control" id="item_stem_number" placeholder="" value="1" required  >
                </div>
                <div class="col-lg-3 col-sm-12">                         

                   <label for="item_batch" class="control-label">Batch Number *</label>

                <select  name="item_batch" class="form-control" id="item_batch" readonly  >
                <option value="1">Batch - 1</option>
                <option value="2" selected="selected">Batch - 2</option>
                </select>
              </div>
              </div>
            <div class="row">             
                <div class="col-lg-6 col-sm-12">                         
                    <label for="item_stem_en" class="control-label" style="padding-top:15px">Item / STEM (English) </label>
                	<textarea id="item_stem_en" name="item_stem_en"  class="form-control form-group" ></textarea>
                </div>
				   <div class="col-lg-6 col-sm-12">                         
                    <label for="item_stem_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> ایٹم / سٹم ( اردو)</label>
               		<textarea id="item_stem_ur" name="item_stem_ur"  class="form-control form-group" dir="rtl" lang="ur" ></textarea>
                </div>
              </div>
			<div class="row" style="padding-top:10px">             
				 <div class="col-lg-4 col-sm-12">                         
                    <label for="item_image_position" class="control-label">Stem Images Position</label>
                	<select name="item_image_position" class="form-control form-group" id="item_image_position">
                        <option value="Top">Top</option>
                        <option value="Bottom">Bottom</option>
						<option value="Left">Left</option>
                        <option value="Right">Right</option>
               		</select>
                </div>
                <div class="col-lg-4 col-sm-12">                         
                    <label for="item_image_en" class="control-label">Item Image-1 / English</label>
                	<input type="file" name="item_image_en" class="form-control" id="item_image_en" placeholder="" >
                </div>
                <div class="col-lg-4 col-sm-12">                         
                    <label for="item_image_ur" class="control-label">Item Image-2 / Urdu</label>
					<input type="file" name="item_image_ur" class="form-control" id="item_image_ur" placeholder="" >     
				</div>
              </div>
			<div class="row">             
                <div class="col-lg-12 col-sm-12">                         
                   <hr/ >
                </div>
            </div>
			<div class="row">             
                <div class="col-lg-6 col-sm-12" >                         
                    <label for="item_rubric_english" class="control-label" style="padding-top:15px">Rubric (English)</label>
                	<textarea  name="item_rubric_english" class="form-control" id="item_rubric_english" ></textarea> 
                </div>
				<div class="col-lg-6 col-sm-12">                         
                    <label for="item_rubric_urdu" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> روبرک  اردو</label>
                	<textarea  name="item_rubric_urdu" class="form-control" id="item_rubric_urdu"  dir="rtl" lang="ur"  ></textarea>
                </div>				
              </div>
              <div class="form-group row" style="padding-top:10px">
              	<div class="col-lg-3 col-sm-12">                         
                    <label for="item_rubric_image_position" class="control-label">Rubric Images Potion</label>
                	<select name="item_rubric_image_position" class="form-control form-group" id="item_rubric_image_position">
                        <option value="Top">Top</option>
                        <option value="Bottom">Bottom</option>
                        <option value="Left">Left</option>
                        <option value="Right">Right</option>
               		</select>
                </div>
                <div class="col-lg-3 col-sm-12">                         
                    <label for="item_rubric_image" class="control-label">Rubric Image</label>
                	<input type="file" name="item_rubric_image" class="form-control" id="item_rubric_image" placeholder="">
                </div>
              </div>             
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Item" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
      </div>
      </div>
    </section> 
  </div>
		
		<script language="javascript" type="text/javascript">
    (function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
      CKEDITOR.replace('item_stem_ur', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 320,
		  contentsLangDirection: 'rtl',
		enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
			  (function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
      CKEDITOR.replace('item_stem_en', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 320,	
		  enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
			///// 1st option ////
			 (function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
      CKEDITOR.replace('item_rubric_english', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 120,
		  enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
			/////////
			///// 2nd option ////
			 (function() {
      var mathElements = [
        'math',
        'maction',
        'maligngroup',
        'malignmark',
        'menclose',
        'merror',
        'mfenced',
        'mfrac',
        'mglyph',
        'mi',
        'mlabeledtr',
        'mlongdiv',
        'mmultiscripts',
        'mn',
        'mo',
        'mover',
        'mpadded',
        'mphantom',
        'mroot',
        'mrow',
        'ms',
        'mscarries',
        'mscarry',
        'msgroup',
        'msline',
        'mspace',
        'msqrt',
        'msrow',
        'mstack',
        'mstyle',
        'msub',
        'msup',
        'msubsup',
        'mtable',
        'mtd',
        'mtext',
        'mtr',
        'munder',
        'munderover',
        'semantics',
        'annotation',
        'annotation-xml'
      ];
	

      CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

      CKEDITOR.replace('item_rubric_urdu', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser', 
		  height: 120,
		  enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
    }());
	window.MathJax = {
  tex: {
    inlineMath: [['$', '$'], ['\\(', '\\)']]
  },
  svg: {
    fontCache: 'global'
  }
};

(function () {
  var script = document.createElement('script');
  script.src = 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js';
  script.async = true;
  document.head.appendChild(script);
})();
	
  </script>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">
$('#item_grade_id').on('change', function() {
      $.post('<?=base_url("admin/items/subjects_by_grade")?>',
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
      $.post('<?=base_url("admin/items/cstands_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_cstand_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_cstand_id')
         .append($("<option></option>")
                    .attr("value", value.cs_id)
                    .text(value.cs_number+'-'+value.cs_statement_en+value.cs_statement_ur)
                  ); 
        });   
    });
	/////////////////// auto generate code script //////////////////////
	$.post('<?=base_url("admin/items/get_itemcode_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr[0]['maxitems']);
	 var maxnum = "000" + arr[0]['maxitems'];
     maxnum = maxnum.substr(maxnum.length-4);
		
		
	 switch(arr[0]['grade'])
		{
			case "1":
				$('#item_code').val(arr[0]['subject_code']+'-I-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "2":
				$('#item_code').val(arr[0]['subject_code']+'-II-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "3":
				$('#item_code').val(arr[0]['subject_code']+'-III-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "4":
				$('#item_code').val(arr[0]['subject_code']+'-IV-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "5":
				$('#item_code').val(arr[0]['subject_code']+'-V-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "6":
				$('#item_code').val(arr[0]['subject_code']+'-VI-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "7":
				$('#item_code').val(arr[0]['subject_code']+'-VII-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			case "8":
				$('#item_code').val(arr[0]['subject_code']+'-VIII-M'+new Date().getFullYear().toString().substr(-2)+'-'+maxnum);       
			break;
			
		}
     
    });
	
});
$('#item_cstand_id').on('change', function() {
      $.post('<?=base_url("admin/items/subcstands_by_cstand")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      cs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_subcstand_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_subcstand_id')
         .append($("<option></option>")
                    .attr("value", value.subcs_id)
                    .text(value.subcs_number+'-'+value.subcs_topic_en+value.subcs_topic_ur)
                  ); 
        });   
    });
});
$('#item_subcstand_id').on('change', function() {
      $.post('<?=base_url("admin/items/slos_by_subcstands")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subcs_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
      $('#item_slo_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#item_slo_id')
         .append($("<option></option>")
                    .attr("value", value.slo_id)
                    .text(value.slo_number+'-'+value.slo_statement_en+'-'+value.slo_statement_ur)					
                  ); 
        });   
    });
});

	$('#item_option_layout').on('change', function() {
		$("#layout_preview").attr("src","<?= base_url(); ?>assets/img/layouts/"+this.value+".jpg");	
		//alert(this.value);
			switch(this.value)
			{
				case "1":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "2":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "3":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").attr("disabled","disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "4":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "5":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "6":
					$("#item_option_a_en").attr("disabled","disabled");
					$("#item_option_a_ur").attr("disabled","disabled");
					$("#item_option_b_en").attr("disabled","disabled");
					$("#item_option_b_ur").attr("disabled","disabled");
					$("#item_option_c_en").attr("disabled","disabled");
					$("#item_option_c_ur").attr("disabled","disabled");
					$("#item_option_d_en").attr("disabled","disabled");
					$("#item_option_d_ur").attr("disabled","disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "7":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "8":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "9":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").removeAttr("disabled");
					$("#item_option_c_image").removeAttr("disabled");
					$("#item_option_d_image").removeAttr("disabled");
					break;
				case "10":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "11":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;
				case "12":
					$("#item_option_a_en").removeAttr("disabled");
					$("#item_option_a_ur").removeAttr("disabled");
					$("#item_option_b_en").removeAttr("disabled");
					$("#item_option_b_ur").removeAttr("disabled");
					$("#item_option_c_en").removeAttr("disabled");
					$("#item_option_c_ur").removeAttr("disabled");
					$("#item_option_d_en").removeAttr("disabled");
					$("#item_option_d_ur").removeAttr("disabled");

					$("#item_option_a_image").removeAttr("disabled");
					$("#item_option_b_image").attr("disabled","disabled");
					$("#item_option_c_image").attr("disabled","disabled");
					$("#item_option_d_image").attr("disabled","disabled");
					break;

					
			}
});
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

