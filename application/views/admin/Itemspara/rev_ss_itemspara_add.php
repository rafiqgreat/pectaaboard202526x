  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Item </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/itemspara/rev_ss_pitemspara'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Paragraph List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/itemspara/rev_ss_add'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  
			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
			
			<div class="row">
              	<div class="col-lg-3 col-sm-12">  
					<label for="para_grade_id" class="control-label">Grade *</label>
					<select name="para_grade_id" class="form-control form-group" id="para_grade_id"  required>
						<option value="">--Select Grades--</option>
                  <?php
                   foreach($grades as $grade)
				  {
					  echo '<option value="'.$grade['grade_id'].'">'.$grade['grade_name_en'].'</option>';
				  }
				  ?>
                  	</select>                    
                </div>
				<div class="col-lg-3 col-sm-12">                         
                   <label for="para_subject_id" class="control-label">Subject *</label>
                <select name="para_subject_id" class="form-control form-group" id="para_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                </select>
                </div>								
              </div>
            
			<div class="row">              
				<div class="col-lg-6 col-sm-12">                         
                    <label for="para_title_en" class="control-label" style="padding-top:15px">Para Instructions (Eng) *</label>
                	<input type="text" name="para_title_en" id="para_title_en" class="form-control form-group" >
                </div>
                <div class="col-lg-6 col-sm-12">                         
                    <label for="para_title_ur" class="control-label urdufont-right" style="float:right">پیرا گراف ہدایات *</label>
                	<input type="text" name="para_title_ur" id="para_title_ur" class="form-control form-group" dir="rtl" >
                </div>					
              </div>
            <div class="row">             
                <div class="col-lg-6 col-sm-12">                         
                    <label for="para_text_en" class="control-label" style="padding-top:15px">Para (English) * ( <a href="" data-toggle="modal" data-target="#headingModal">Media Images Gallery</a> )</label>
                	<textarea id="para_text_en" name="para_text_en"  class="form-control form-group" ></textarea>
                </div>
				   <div class="col-lg-6 col-sm-12">                         
                    <label for="para_text_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right;"> پیرا گراف  ( اردو) * ( <a href="" data-toggle="modal" data-target="#headingModal">تصاویر گیلری </a> )</label>
                	<textarea id="para_text_ur" name="para_text_ur"  class="form-control form-group" dir="rtl" lang="ur" ></textarea>
                </div>
              </div>
			<div class="row" style="padding-top:10px">             
				 <div class="col-lg-2 col-sm-12">                         
                    <label for="para_img_position" class="control-label">Image Position</label>
                	<select name="para_img_position" class="form-control form-group" id="para_img_position">
                      	<option value="Top">Top</option>
                        <option value="Bottom">Bottom</option>
                        <option value="Left">Left</option>
                        <option value="Right">Right</option>
                    </select>
                </div>
                <div class="col-lg-5 col-sm-12">                         
                    <label for="para_image" class="control-label">Para Image</label>
                	<input type="file" name="para_image" class="form-control" id="para_image" placeholder="" >
                </div>
                <div class="col-lg-5 col-sm-12">                         
                    <label for="para_start_from" class="control-label">Para Starts From *</label>
					<select name="para_start_from" class="form-control form-group" id="para_start_from" required>
						<option value="16">Item No. 16</option>
                      	<option value="21">Item No. 21</option>
						<option value="22">Item No. 22</option>
                    </select>
				</div>
              </div>			
            <div class="col-lg-12 col-sm-12">                         
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_21" class="control-label">Para Item 1 *</label>                         
                        <select name="para_item_21" class="form-control form-group" id="para_item_21" required>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>	
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_22" class="control-label">Para Item 2 *</label>                         
                        <select name="para_item_22" class="form-control form-group" id="para_item_22"  required>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_23" class="control-label">Para Item 3 </label>                         
                        <select name="para_item_23" class="form-control form-group" id="para_item_23"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_24" class="control-label">Para Item 4 </label>                         
                        <select name="para_item_24" class="form-control form-group" id="para_item_24"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                </div>
             </div> 
             <div class="col-lg-12 col-sm-12">                         
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_25" class="control-label">Para Item 5 </label>                         
                        <select name="para_item_25" class="form-control form-group" id="para_item_25"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>	
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_26" class="control-label">Para Item 6 </label>                         
                        <select name="para_item_26" class="form-control form-group" id="para_item_26"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_27" class="control-label">Para Item 7 </label>                         
                        <select name="para_item_27" class="form-control form-group" id="para_item_27"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_28" class="control-label">Para Item 8 </label>                         
                        <select name="para_item_28" class="form-control form-group" id="para_item_28"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                </div>
             </div>
             <div class="col-lg-12 col-sm-12">                         
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_29" class="control-label">Para Item 9 </label>                         
                        <select name="para_item_29" class="form-control form-group" id="para_item_29"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>	
                    <div class="col-lg-3 col-sm-12">
                    	<label for="para_item_30" class="control-label">Para Item 10 </label>                         
                        <select name="para_item_30" class="form-control form-group" id="para_item_30"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    </div>
                </div>
             </div>             
             <div class="row">
              	<div class="col-lg-12 col-sm-12">                         
                    <label for="para_statistics" class="control-label">Para Statistics *</label>
                	<textarea id="para_statistics" name="para_statistics"  class="form-control form-group" ></textarea>
                </div>
              </div>      
			
			  <div class="row" style="padding-top:15px">
                <div class="col-lg-4 col-sm-12">                         
                    <label for="para_ordering" class="control-label">Para Ordering *</label>
                	<input type="number" name="para_ordering" id="para_ordering" class="form-control form-group" value="0" required>
                </div>					
              </div>      
              
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Item" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
      <div class="modal fade" id="headingModal" tabindex="-1" role="dialog" aria-labelledby="headingModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:150%">		
      <div class="modal-header">
        <h5 class="modal-title" id="headingModalLabel">All Media Images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <div class="row">
       <?php $media = $this->Items_model->get_all_medis($this->session->userdata('admin_id'));
	   foreach ($media  as $row){?>
		<div class="col-3">           
        	<input onclick="this.value = '<?= base_url().'/'.$row->m_image; ?>'; this.select(); document.execCommand('copy'); this.value = 'Image URL Copied'; " type='text' value='Copy Image' />
            <img src="<?= base_url().'/'.$row->m_image; ?>" style="max-width:100%" value="<?= base_url().'/'.$row->m_image; ?>"   >
           </div>		
       <?php  } ?>
       </div>
      </div>      
	</div>
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

      CKEDITOR.replace('para_text_ur', {
        extraPlugins: 'ckeditor_wiris',
        extraPlugins: "justify",
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

      CKEDITOR.replace('para_text_en', {
        extraPlugins: 'ckeditor_wiris,justify', 
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

      CKEDITOR.replace('para_statistics', {
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
$('#para_grade_id').on('change', function() {
      $.post('<?=base_url("admin/itemspara/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#para_subject_id option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#para_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
});

$('#para_subject_id').on('change', function() {	
	$.post('<?=base_url("admin/itemspara/rev_all_items_by_subject")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      subject_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);
	 if(arr.length==0){
		 alert('Sorry! No Items found in this Subject!');
		 return false;
	 }
//<!-----------------------------------Start para_item_21-------------------------------------------------------->
 $('#para_item_21 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_21')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#para_item_22 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_22')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#para_item_23 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_23')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#para_item_24 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_24')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#para_item_25 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_25')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#para_item_26 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_26')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#para_item_27 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_27')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#para_item_28 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_28')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#para_item_29 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_29')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#para_item_30 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#para_item_30')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });

//<!-----------------------------------End para_item_21------------------------------------------------------------>
    });
});
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

