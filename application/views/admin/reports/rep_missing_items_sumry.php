 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">
        <!--___________Modal start here___________________-->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    
         <!--___________Modal End here___________________-->

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i> &nbsp; Missing Items Properties Report ( Missing Parameters) </h3>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/reports/missing_items'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  

			<input type="hidden" id="item_registration" name="item_registration" value="LOGGED-USER" />

			

			<div class="row">

              	<div class="col-lg-6 col-sm-12">  

					<label for="item_grade_id" class="control-label">Grade </label>

					<select name="item_grade_id" class="form-control form-group" id="item_grade_id"  >

						<option value="">--Select Grades--</option>

                  <?php

                    foreach($grades as $grade)

                    {

                        echo '<option value="'.$grade['grade_id'].'"'.set_select('item_grade_id',$grade['grade_id']).'>'.$grade['grade_name_en'].'</option>';

                    }

				  ?>

                  	</select>                    

                </div>

				<div class="col-lg-6 col-sm-12">                         

                   <label for="item_subject_id" class="control-label">Subject </label>

                <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  >

                  <option value="">--Select Subjects--</option>

                    <?php
                    foreach($subjects as $subject)
                    {
                        echo '<option value="'.$subject['subject_id'].'"'.set_select('item_subject_id',$subject['subject_id']).'>'.$subject['subject_name_en'].'</option>';

                    }

				  ?>

                </select>

                </div>

                 <div class ="col-12" style="float:right"> <input type="submit" id="get_rep" name="get_rep" class="btn btn-success" value="Search" style="width:120px; float:right"/></div> 

              </div>

            <!-- Data table start here--------------------------->

            <?php

            if(isset($_REQUEST['get_rep'])){

            ?>

            <div class="btn-group margin-bottom-20"> 

                <a href="<?= base_url() ?>admin/reports/missing_item_sumry_export/PDF/<?=$item_grade_id."/".$item_subject_id?>" class="btn btn-secondary">Export as PDF</a>

                <a href="<?= base_url() ?>admin/reports/missing_item_sumry_export/CSV/<?=$item_grade_id."/".$item_subject_id?>" class="btn btn-secondary">Export as CSV</a>

              </div>

              <div class="card-body table-responsive">

                <table id="na_datatable" class="table table-bordered table-striped" width="100%">

                  <thead>

                    <tr>
                      <th>Grades</th>
                      <th>Subjects</th>
                      <th>Total Items</th>
                      <th>Code Missing</th>
                      <th>Item Difficulty</th>
                      <th>Item Discr </th>
                      <th>Diff. Code</th>
                      <th>Registration</th>
                      <th>Item cognitive</th>
                      <th>Item Chapter</th>
                      <th>Item Page</th>
                      <th>Item relation</th>
                      <th>Item Rubric</th>
                    </tr>

                  </thead>
                </table>

              </div>

            <?php    

            }

            ?>

            <?php echo form_close( ); ?>

          <!-- /.box-body -->

        </div>

      </div>

    </section> 

  </div>

		



<script type="text/javascript" src="<?php echo base_url(); ?>/assets/notify.js"> </script>

<script type="text/javascript">

$('#item_grade_id').on('change', function() {

	if(this.value < 8)

	{		

		 $('#item_curriculum').val(3);

	}

	else

	{

		 $('#item_curriculum').val(2);

	}

	

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



</script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

<?php

$grade     = (isset($item_grade_id)&&$item_grade_id!="0") ? $item_grade_id : 0;
$subject   = (isset($item_subject_id)&&$item_subject_id!="0") ? $item_subject_id : 0;

?>



<!-- DataTables -->



<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>/assets/notify.js"></script>

<script>

  //---------------------------------------------------

  var table = $('#na_datatable').DataTable( {

    "processing": true,

    "serverSide": true,

    "ajax": "<?=base_url('admin/reports/missing_items_jason/'.$grade.'_'.$subject);?>",

      "columnDefs": [

        { "targets": 0, "name": "item_grade_id", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "subject_name_en", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "total_items", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "code_missing", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "item_difficulty", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "item_discr", 'searchable':true, 'orderable':true},
        { "targets": 6, "name": "item_dif_code", 'searchable':false, 'orderable':true},
        { "targets": 7, "name": "item_registration", 'searchable':false, 'orderable':true},
        { "targets": 8, "name": "item_cognitive_bloom", 'searchable':false, 'orderable':true},
        { "targets": 9, "name": "item_pctb_chapter", 'searchable':false, 'orderable':true},
        { "targets": 10, "name": "item_pctb_page", 'searchable':false, 'orderable':true},
        { "targets": 11, "name": "item_relation", 'searchable':false, 'orderable':true},
        { "targets": 12, "name": "item_rubric", 'searchable':false, 'orderable':true},
        
       
    ]

  });

  table.buttons().container()

        .appendTo( '#na_datatable .col-md-6:eq(0)' );



</script>
<script>
$('#na_datatable').on('click', 'a', function(){
    var url =$(this).attr('url');
    //alert(url);
  window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=800");
});
</script>





