  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Generate Pilot Header </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/pilotheaders'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Pilot Headers List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/pilotheaders/add'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  
			<input type="hidden" id="pilotheaders_registration" name="pilotheaders_registration" value="LOGGED-USER" />
			<div class="row form-group">
              	<div class="col-lg-4 col-sm-12">                         
                   <label for="ph_paper_title" class="control-label">Title *</label>
					<input type="text" name="ph_paper_title" class="form-control form-group" id="ph_paper_title" placeholder="" required="required">
                </div>
				<div class="col-lg-4 col-sm-12">                         
                    <label for="ph_paper_subject" class="control-label">Subject *</label>
                	<select name="ph_paper_subject" class="form-control" id="ph_paper_subject" placeholder="" required="required">
                        <option value="">----Select Subject----</option>
                        <option value="English-انگریزی">English-انگریزی</option>
                        <option value="Urdu-اردو">Urdu-اردو</option>
                        <option value="Math-ریاضی">Math-ریاضی</option>
                        <option value="General Knowledge-جنرل نالج">General Knowledge-جنرل نالج</option>
                        <option value="Religious Education-دینی تعلیم">Religious Education-دینی تعلیم</option>
                        <option value="Islamiat-اسلامیات">Islamiat-اسلامیات</option>
                        <option value="Social Studies-شوشل سٹڈی">Social Studies-شوشل سٹڈی</option>
                        <option value="Science-سائینس">Science-سائینس</option>
                        <option value="Computer Education-کمپوٹر تعلیم">Computer Education-کمپوٹر تعلیم</option>
                        <option value="Ethics-اخلاقیات">Ethics-اخلاقیات</option>
                        <option value="Teaching of Quran Majeed-تعلیم القرآن مجید">Teaching of Quran Majeed-تعلیم القرآن مجید</option>
                    </select>
                </div>
				<div class="col-lg-4 col-sm-12">
					<label for="ph_paper_subject" class="control-label">Pilot Phase *</label>
                	<select name="ph_phase" class="form-control" id="ph_phase" placeholder="" required="required">
                        <option value="">----Select Pilot Phase----</option>
                        <option value="1" >Pilot Phase 1</option>
                        <option value="2">Pilot Phase 2</option>
                    </select>
                </div>
             </div>
			<div class="row">
              	<div class="col-lg-12 col-sm-12">  					
					<label for="ph_general_instruction" class="control-label">General Instructions *</label>
					<textarea id="ph_general_instruction" name="ph_general_instruction" rows="2" cols="50" class="form-control form-group" required="required"></textarea>                   
                </div>
              </div>
            <div class="row" style="display: none;">
                <div class="col-lg-3 col-sm-12">  					
					<label for="ph_status" class="control-label">Header Status *</label>
					<select name="ph_status" class="form-control form-group" id="ph_status"  required>
                      <option value="1">Active</option>
                      <option value="0">In-Active</option>
                    </select>                    
                </div>
              </div>
            <div class="row"><div class="col-lg-12 col-sm-12"><hr/ ></div></div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Save" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">

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
         CKEDITOR.config.allowedContent = true;
      CKEDITOR.replace('ph_general_instruction', {
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
	
$('#ph_phase').on('change', function() {
	$.post('<?=base_url("admin/pilotheaders/pheaders_by_subject_phase")?>',
	{
	  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
	  ph_phase : this.value,
	  ph_paper_subject : $('#ph_paper_subject').val()
	},
	function(data){
	  arr = $.parseJSON(data);     
	  console.log(arr);   
	  if(arr.length>0){
		$(':input[type="submit"]').prop('disabled', true);
		 alert('Sorry! You have already Added Pilot Paper Header / Instructions for this Pilot Phase!');
	 return false;
	 }
	else{
	$(':input[type="submit"]').prop('disabled', false);
	} 


	});	
});
	
$('#ph_paper_subject').on('change', function() {
	$.post('<?=base_url("admin/pilotheaders/pheaders_by_subject_phase")?>',
	{
	  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
	  ph_phase : $('#ph_phase').val(),
	  ph_paper_subject : $('#ph_paper_subject').val()
	},
	function(data){
	  arr = $.parseJSON(data);     
	  console.log(arr);   
	  if(arr.length>0){
		$(':input[type="submit"]').prop('disabled', true);
		 alert('Sorry! You have already Added Pilot Paper Header / Instructions for this Pilot Phase!');
	 return false;
	 }
	else{
	$(':input[type="submit"]').prop('disabled', false);
	} 


	});	
});	

</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>