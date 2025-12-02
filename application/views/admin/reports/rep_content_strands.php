 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i> &nbsp; SLOs, SubCS and Subject Wise Summary Report  </h3>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/reports/rep_cstrands'), 'class="form-horizontal" enctype="multipart/form-data" ');  ?>  


			<div class="row">

              	<div class="col-lg-2 col-sm-12">  

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

				<div class="col-lg-2 col-sm-12">                         

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

				<div class="col-lg-3 col-sm-12">                         

                    <label for="item_cstand_id" class="control-label">Content Strand </label>

                <select name="item_cstand_id" class="form-control form-group" id="item_cstand_id"  >

                  <option value="">--Select Content Strand--</option>

                    <?php

                    foreach($content_strands as $row)

                    {

                       echo '<option value="'.$row['cs_id'].'"'.set_select('item_cstand_id',$row['cs_id']).'>'.$row['cs_number'].'-'.$row['cs_statement_en'].'-'.$row['cs_statement_ur'].'</option>';

                    }

				  ?>

                </select>

                </div>				

				<div class="col-lg-5 col-sm-12">                         

                    <label for="item_subcstand_id" class="control-label">Sub Content Strand </label>

                <select name="item_subcstand_id" class="form-control form-group" id="item_subcstand_id"  >

                  <option value="">--Select Subcontent Strand--</option>

                    <?php

                    foreach($subcontent_strands as $row)

                    {

                       echo '<option value="'.$row['subcs_id'].'"'.set_select('item_subcstand_id',$row['subcs_id']).'>'.$row['subcs_number'].'-'.$row['subcs_topic_en'].''.$row['subcs_topic_ur'].'</option>';

                    }

				  ?>

                </select>

                </div>

                 <div class="row">    
                    <div class="col-lg-6 col-sm-12">                         

                        <label for="item_slo_id" class="control-label">Select SLO</label>

                        <select name="item_slo_id" class="form-control form-group" id="item_slo_id">
                          <option value="">--Select SLO Statement--</option>
                            
                            <?php

                            foreach($slos as $row)

                            {

                               echo '<option value="'.$row['slo_id'].'"'.set_select('item_slo_id',$row['slo_id']).'>'.$row['slo_number'].'-'.$row['slo_statement_en'].''.$row['slo_statement_ur'].'</option>';

                            }

                          ?>
                        </select>
                    </div>


                    <div class="col-lg-6 col-sm-12">                         

                        <label for="item_cycle" class="control-label">Select Accepted Cycle *</label>

                        <select name="item_cycle" class="form-control form-group" id="item_cycle"  required >

                          <option value="">--Select AE Cycle--</option>
                          <option value="1" <?=set_select('item_cycle',1)?> >AE Accepted Cycle-1</option>
                          <option value="2" <?=set_select('item_cycle',2)?> >AE Accepted Cycle-2</option>
                        </select>

                    </div>

			</div>	

                 <div class ="col-12" style="float:right"> <input type="submit" id="get_rep" name="get_rep" class="btn btn-success" value="Search" style="width:120px; float:right"/></div> 

              </div>

            <!-- Data table start here--------------------------->

            <?php

            if(isset($_REQUEST['get_rep'])){

            ?>

            <div class="btn-group margin-bottom-20"> 

                <a href="<?= base_url() ?>admin/reports/rep_cstrands_export/PDF/<?=$item_grade_id."/".$item_subject_id."/".$item_cstand_id."/".$item_subcstand_id."/".$item_slo_id."/".$item_cycle?>" class="btn btn-secondary">Export as PDF</a>

                <a href="<?= base_url() ?>admin/reports/rep_cstrands_export/CSV/<?=$item_grade_id."/".$item_subject_id."/".$item_cstand_id."/".$item_subcstand_id."/".$item_slo_id."/".$item_cycle?>" class="btn btn-secondary">Export as CSV</a>

              </div>

              <div class="card-body table-responsive">



                <table id="na_datatable" class="table table-bordered table-striped" width="100%">



                  <thead>

                    <tr>

                      <th>Sr. No.</th>

                      <th>Grades</th>

                      <th>Subjects</th>

                      <th>Content Strands</th>

                      <th>SubContent Strands</th>
                      <th>SLO</th>
                    <?php
                    if($item_cycle == 1)
                    {
                    ?>
                         <th>Submitted</th>

                          <th>Submitted MCQ</th>

                          <th>Submitted ERQ</th>
                    <?php  
                    }
                   ?>    
                      <th>Ae Accepted</th>

                      <th>Ae Accepted MCQ</th>

                      <th>Ae Accepted ERQ</th>

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

      $('#item_cstand_id option:not(:first)').remove();

      $('#item_subcstand_id option:not(:first)').remove();

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

      $('#item_subcstand_id option:not(:first)').remove();

      $('#item_slo_id option:not(:first)').remove();

      $.each(arr, function(key, value) {           

     $('#item_cstand_id')

         .append($("<option></option>")

                    .attr("value", value.cs_id)

                    .text(value.cs_number+'-'+value.cs_statement_en+value.cs_statement_ur)

                  ); 

        });   

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


</script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>

<?php



$grade     = (isset($item_grade_id)&&$item_grade_id!="0") ? $item_grade_id : 0;

$subject   = (isset($item_subject_id)&&$item_subject_id!="0") ? $item_subject_id : 0;

$cstrand    = (isset($item_cstand_id)&&$item_cstand_id!="0") ? $item_cstand_id : 0;

$subcstand = (isset($item_subcstand_id)&&$item_subcstand_id!="0") ? $item_subcstand_id : 0;
$sloid = (isset($item_slo_id)&&$item_slo_id!="0") ? $item_slo_id : 0;

$item_cycle = (isset($item_cycle)&&$item_cycle!="0") ? $item_cycle : 0;





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



    "ajax": "<?=base_url('admin/reports/get_content_strands_jason/'.$grade.'_'.$subject.'_'.$cstrand.'_'.$subcstand.'_'.$sloid.'_'.$item_cycle);?>",

    //"ajax": "< ?=base_url('admin/reports/datatable_json_ceo_search/'.$param1.'_'.$param2.'_'.$param3);?>",



  //  "order": [[1,'desc']],



      "columnDefs": [

          

        { "targets": 0, "name": "cs_id", 'searchable':true, 'orderable':true},

        { "targets": 1, "name": "grade_name_en", 'searchable':true, 'orderable':true},

        { "targets": 2, "name": "subject_name_en", 'searchable':true, 'orderable':true},

        { "targets": 3, "name": "cs_number", 'searchable':true, 'orderable':true},

        { "targets": 4, "name": "subcs_number", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "slo_number", 'searchable':true, 'orderable':true},
          <?php
          if($item_cycle == 1){
         ?>
           { "targets": 6, "name": "subcs_topic_en", 'searchable':true, 'orderable':true},

            { "targets": 7, "name": "Submitted_MCQ", 'searchable':false, 'orderable':true},

            { "targets": 8, "name": "Submitted_ERQ", 'searchable':false, 'orderable':true},

            { "targets": 9, "name": "AE", 'searchable':false, 'orderable':true},

            { "targets": 10, "name": "AE_MCQ", 'searchable':false, 'orderable':true},

            { "targets": 11, "name": "AE_ERQ", 'searchable':false, 'orderable':true}

          <?php
          }
          else
          {
              ?>
              //cycle 2
            { "targets": 6, "name": "AE", 'searchable':false, 'orderable':true},

            { "targets": 7, "name": "AE_MCQ", 'searchable':false, 'orderable':true},

            { "targets": 8, "name": "AE_ERQ", 'searchable':false, 'orderable':true}
          
          <?php
          }
          ?>

       
    ],

     buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]



  });

  table.buttons().container()

        .appendTo( '#na_datatable .col-md-6:eq(0)' );



</script>





