<!-- DataTables -->
<style>
.modal-dialog {
    text-align:center;
	max-width: 100%;
    width: auto !important;
    display: inline-block;
	/*position:absolute*/	
}
</style>
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Media /Pictures</h3>
        </div>
        <div class="d-inline-block float-right">
          <a href="<?= base_url('admin/media/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Media</a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body table-responsive" >
       	<div class="row">
        <?php foreach($pictures as $row): ?>
        	<div class="col-2">
            	<div class="col-12" style="text-align:center"><a href="#" data-toggle="modal" data-target="#exampleModal" data-imgsrc="<?= base_url().'/'.$row['m_image']; ?>" data-title="<?= $row['m_title']; ?>" data-id="<?= $row['m_id']; ?>"><img src="<?= base_url().'/'.$row['m_image']; ?>" width="100px" style="padding:10px"/></a></div>
            	<div class="col-12" style="text-align:center"><a href="#" data-toggle="modal" data-target="#exampleModal" data-imgsrc="<?= base_url().'/'.$row['m_image']; ?>" data-title="<?= $row['m_title']; ?>" data-id="<?= $row['m_id']; ?>"><?php echo $row['m_title'];?></a><a title="Delete" class="delete btn btn-sm btn-danger" href="<?= base_url('admin/media/delete/'.$row['m_id'])?>" style="margin-left:5px" id="model-id" > <i class="fa fa-trash-o"></i></a></div>
            </div>
		<?php 	endforeach;	?>
        </div>
      </div>
    </div>
        <div class="modal fade modal-dialog" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:-100px">
          <div class="modal-dialog" role="document" >
            <div class="modal-content" >		
              <div class="modal-header">
                <h5 class="modal-title" id="model_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img id="model_imgsrc" style="width:100%"/>
              </div>
              <div class="modal-footer"></div>		
            </div>
          </div>
</div>
  </section>  
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>

<script language="javascript" type="text/javascript">
 
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var title = button.data('title') // Extract info from data-* attributes
   var imgsrc = button.data('imgsrc') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
   modal.find('.modal-title').text(title)
   modal.find('#model_imgsrc').attr("src",imgsrc);
   /*modal.find('.model-id').val(id);*/
   /*$(".modal-footer #model-id").val( model-id );*/
  //alert(modal.find('.modal-body input#category_code').val());
})

</script>




