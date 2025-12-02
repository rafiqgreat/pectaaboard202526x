  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Formula </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/formulas'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Formulas List</a>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open(base_url('admin/formulas/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">                         
                <label for="formula_code" class="col-sm-2 control-label">Formula Code</label>
                <div class="col-12">
                  <input type="text" name="formula_code" class="form-control" id="formula_code" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="formula_name_en" class="col-sm-2 control-label">Formula Name (Eng)</label>
                <div class="col-12">
                  <textarea name="formula_name_en" class="form-control" id="formula_name_en" required></textarea> 
                </div>
              </div>
              
              <div class="form-group">
                <label for="formula_name_ur" class="col-sm-2 control-label" dir="rtl" lang="ur" style="float: right; text-align: right;" >فارمولا (اردو) </label>
                <div class="col-12">
                   <textarea name="formula_name_ur" class="form-control" id="formula_name_ur" lang="ur" dir="rtl"></textarea> 
                </div>
              </div>                       
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add Formula" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          <!-- /.box-body -->
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

      CKEDITOR.replace('formula_name_en', {
        extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        removePlugins: 'uploadimage,uploadwidget,uploadfile,filetools,filebrowser',
        height: 320,
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
	  <script src="load-mathjax.js" async></script>