  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Item Group</h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/itemsgroup'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Item Group List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/itemsgroup/add'), 'class="form-horizontal" enctype="multipart/form-data" onsubmit="return checkItems();" ');  ?>  
			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />
			
			<div class="row">
              	<div class="col-lg-3 col-sm-12">  
					<label for="group_grade_id" class="control-label">Grade *</label>
					<select name="group_grade_id" class="form-control form-group" id="group_grade_id"  required>
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
                   <label for="group_subject_id" class="control-label">Subject *</label>
                <select name="group_subject_id" class="form-control form-group" id="group_subject_id"  required>
                  <option value="">--Select Subjects--</option>
                </select>
                </div>								
              </div>
            
			<div class="row">              
				<div class="col-lg-6 col-sm-12" style="padding-top:15px">                         
                    <label for="group_title_en" class="control-label">Group Title (Eng) *</label>
                	<input type="text" name="group_title_en" id="group_title_en" class="form-control form-group" >
                </div>
                <div class="col-lg-6 col-sm-12">                         
                    <label for="group_title_ur" class="control-label urdufont-right" style="float:right">گروپ ٹا ئیٹل *</label>
                	<input type="text" name="group_title_ur" id="group_title_ur" class="form-control form-group" dir="rtl" >
                </div>					
              </div>
            <div class="col-lg-12 col-sm-12">                         
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_1" class="control-label">Group Item 1 *</label>                         
                        <select name="group_item_1" class="form-control form-group" id="group_item_1" required>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>	
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_2" class="control-label">Group Item 2 *</label>                         
                        <select name="group_item_2" class="form-control form-group" id="group_item_2"  required>
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_3" class="control-label">Group Item 3 *</label>                         
                        <select name="group_item_3" class="form-control form-group" id="group_item_3"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_4" class="control-label">Group Item 4 *</label>                         
                        <select name="group_item_4" class="form-control form-group" id="group_item_4"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                </div>
             </div>
             <div class="col-lg-12 col-sm-12">                         
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_5" class="control-label">Group Item 5 *</label>                         
                        <select name="group_item_5" class="form-control form-group" id="group_item_5" >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>	
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_6" class="control-label">Group Item 6 *</label>                         
                        <select name="group_item_6" class="form-control form-group" id="group_item_6"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_7" class="control-label">Group Item 7 *</label>                         
                        <select name="group_item_7" class="form-control form-group" id="group_item_7"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_8" class="control-label">Group Item 8 *</label>                         
                        <select name="group_item_8" class="form-control form-group" id="group_item_8"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                </div>
             </div>
             <div class="col-lg-12 col-sm-12">                         
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_9" class="control-label">Group Item 9 *</label>                         
                        <select name="group_item_9" class="form-control form-group" id="group_item_9" >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>	
                    <div class="col-lg-3 col-sm-12">
                    	<label for="group_item_10" class="control-label">Group Item 10 *</label>                         
                        <select name="group_item_10" class="form-control form-group" id="group_item_10"  >
                        <option value="">--Select Item/Question--</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-sm-12">                         
                        <label for="group_ordering" class="control-label">Group Ordering *</label>
                        <input type="number" name="group_ordering" id="group_ordering" class="form-control form-group" value="0" required>
                	</div>
                </div>
             </div> 
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Item Group" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
        </div>
      </div>
    </section> 
  </div>
		
<script language="javascript" type="text/javascript">
function checkItems()
{
	if($("#group_item_4").val()!="")
	{
		if($("#group_item_3").val()=="")
		{
			alert("Item 3 is missing! Frist fill Item 3 then 4");
			return false;
		}
	}
	if($("#group_item_5").val()!="")
	{
		if($("#group_item_3").val()=="" || $("#group_item_4").val()=="")
		{
			alert("Select Previous Item first! then Next Item.");
			return false;
		}
	}
	if($("#group_item_6").val()!="")
	{
		if($("#group_item_3").val()=="" || $("#group_item_4").val()=="" || $("#group_item_5").val()=="")
		{
			alert("Select Previous Item first! then Next Item.");
			return false;
		}
	}
	if($("#group_item_7").val()!="")
	{
		if($("#group_item_3").val()=="" || $("#group_item_4").val()=="" || $("#group_item_5").val()=="" || $("#group_item_6").val()=="")
		{
			alert("Select Previous Item first! then Next Item.");
			return false;
		}
	}
	if($("#group_item_8").val()!="")
	{
		if($("#group_item_3").val()=="" || $("#group_item_4").val()=="" || $("#group_item_5").val()=="" || $("#group_item_6").val()=="" || $("#group_item_7").val()=="")
		{
			alert("Select Previous Item first! then Next Item.");
			return false;
		}
	}
	if($("#group_item_9").val()!="")
	{
		if($("#group_item_3").val()=="" || $("#group_item_4").val()=="" || $("#group_item_5").val()=="" || $("#group_item_6").val()=="" || $("#group_item_7").val()=="" || $("#group_item_8").val()=="")
		{
			alert("Select Previous Item first! then Next Item.");
			return false;
		}
	}
	if($("#group_item_10").val()!="")
	{
		if($("#group_item_3").val()=="" || $("#group_item_4").val()=="" || $("#group_item_5").val()=="" || $("#group_item_6").val()=="" || $("#group_item_7").val()=="" || $("#group_item_8").val()==""|| $("#group_item_9").val()=="")
		{
			alert("Select Previous Item first! then Next Item.");
			return false;
		}
	}
	
	return true;
}
/*    
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

      CKEDITOR.replace('group_text_ur', {
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

      CKEDITOR.replace('group_text_en', {
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

      CKEDITOR.replace('group_statistics', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 220,
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
*/
(function () {
  var script = document.createElement('script');
  script.src = 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js';
  script.async = true;
  document.head.appendChild(script);
})();
	
  </script>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>
<script type="text/javascript">
$('#group_grade_id').on('change', function() {
      $.post('<?=base_url("admin/itemsgroup/subjects_by_grade")?>',
    {
      '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
      grade_id : this.value
    },
    function(data){
      arr = $.parseJSON(data);     
      console.log(arr);     
      $('#group_subject_id option:not(:first)').remove();
	  $('#group_item_1 option:not(:first)').remove();
	  $('#group_item_2 option:not(:first)').remove();
	  $('#group_item_3 option:not(:first)').remove();
	  $('#group_item_4 option:not(:first)').remove();
	  $('#group_item_5 option:not(:first)').remove();
	  $('#group_item_6 option:not(:first)').remove();
	  $('#group_item_7 option:not(:first)').remove();
	  $('#group_item_8 option:not(:first)').remove();
	  $('#group_item_9 option:not(:first)').remove();
	  $('#group_item_10 option:not(:first)').remove();
      $.each(arr, function(key, value) {           
     $('#group_subject_id')
         .append($("<option></option>")
                    .attr("value", value.subject_id)
                    .text(value.subject_name_en)
                  ); 
        });   
    });	
});

$('#group_subject_id').on('change', function() {	
	$.post('<?=base_url("admin/itemsgroup/all_items_by_subject")?>',
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
//<!-----------------------------------Start group_item_21-------------------------------------------------------->
 $('#group_item_1 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_1')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
 $('#group_item_2 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_2')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#group_item_3 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_3')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#group_item_4 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_4')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#group_item_5 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_5')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#group_item_6 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_6')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#group_item_7 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_7')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#group_item_8 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_8')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#group_item_9 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_9')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
$('#group_item_10 option:not(:first)').remove();
	  $.each(arr, function(key, value) {           
      $('#group_item_10')
         .append($("<option></option>")
                    .attr("value", value.item_id)
                    .text(value.item_code+'-('+value.item_id+')')
                  ); 
       });
//<!-----------------------------------End group_item_21------------------------------------------------------------>
    });
});
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

