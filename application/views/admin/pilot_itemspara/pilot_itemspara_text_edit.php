  <!-- Content Wrapper. Contains page content -->
<?php 
//echo '<pre>';
//print_r($paragraph);
//echo '<hr />';


$paragraph = $paragraph[0]; ?>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Edit Paragraph </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/itemspara'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Paragraph List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php 
			echo form_open(base_url('admin/Pilot_Itemspara/Itemsbank_n_para_edit/'.$paragraph->para_id), 'class="form-horizontal" enctype="multipart/form-data" ');
			
			?>
            <div class="row">              
				<div class="col-lg-6 col-sm-12">                         
                    <label for="para_title_en" class="control-label" style="line-height:40px">Para Instructions (Eng) *</label>
                	<input type="text" name="para_title_en" id="para_title_en" class="form-control form-group" value="<?php echo $paragraph->para_title_en; ?>" >
                </div>
                <div class="col-lg-6 col-sm-12">                         
                    <label for="para_title_ur" class="control-label urdufont-right" style="float:right; line-height:40px">پیرا گراف ہدایات *</label>
                	<input type="text" name="para_title_ur" id="para_title_ur" class="form-control form-group" dir="rtl" value="<?php echo $paragraph->para_title_ur; ?>" >
                </div>					
            </div>
            <div class="row">             
                <div class="col-lg-6 col-sm-12">                         
                    <label for="para_text_en" class="control-label" style="line-height:40px">Para (English) * ( <a href="" data-toggle="modal" data-target="#headingModal">Media Images Gallery</a> )</label>
                	<textarea id="para_text_en" name="para_text_en"  class="form-control form-group" ><?php echo $paragraph->para_text_en; ?></textarea>
                </div>
				   <div class="col-lg-6 col-sm-12">                         
                    <label for="para_text_ur" class="col-sm-12 control-label urdufont-right" style="text-align:right; line-height:40px"> پیرا گراف  ( اردو) * ( <a href="" data-toggle="modal" data-target="#headingModal">تصاویر گیلری </a> )</label>
                	<textarea id="para_text_ur" name="para_text_ur"  class="form-control form-group" dir="rtl" lang="ur" ><?php echo $paragraph->para_text_ur; ?></textarea>
                </div>
              </div>
			  
              <div class="form-group" style="margin:top:25px">
                <div class="col-md-12">
                   <?php if($this->session->userdata('role_id')==6 || $this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==4)
				   {?><input type="submit" name="submit" value="Update" class="btn btn-info pull-right"> <?php }?>
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
       <?php $media = $this->Pilot_Itemspara_model->get_all_medis($this->session->userdata('admin_id'));
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
        extraPlugins: 'ckeditor_wiris,justify',
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
			///// 1st option ///
			
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
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

