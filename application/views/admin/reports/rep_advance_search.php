<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>
    .s_options input[type=checkbox]{
        margin: 10px;
    }
    .search input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

.search #btn_serch {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

.search #btn_serch:hover {
  background: #0b7dda;
}

.search::after {
  content: "";
  clear: both;
  display: table;
}
.modal-dialog{max-width: 650px;}
select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 10px) ;
}

</style>

<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-plus"></i><?=$title?> (Filtered Items Report) </h3>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/reports/rep_advance_search'), 'class="form-horizontal myform" enctype="multipart/form-data" name="myform" id="myform" ');  ?>  
            <div class="panel panel-default search">
              <div class="panel-heading"> <label for="item_grade_id" class="control-label">Type Search Keyword</label></div>
              <div class="panel-body">
                  <div class="row">
                     <div class="col-lg-6 col-sm-12 " style="">  
                      <input type="text" placeholder="Search.." name="search" id="search" value="<?=set_value('search')?>" >
                        
                      <input type="submit" id="btn_serch" name="btn_serch" value="Search" />
                      </div>
                    </div>
                </div><!--pannel body-->
            </div>
            
            <div class="panel-group">
              <div class="panel panel-default">
                   <div class="panel-heading"><label for="item_Specific" class="control-label">Item Specific</label></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 ">
                            <label for="item_code" class="control-label">Item Code: </label>
                             <input class="form-control"  type="text" placeholder="Item code" name="item_code" id="item_code" value="<?=set_value('item_code')?>">
                        </div>
                        <div class="col-lg-3 col-sm-12 ">
                            <label for="dificulty" class="control-label">Difficulty: </label>
                             <select class="form-control" id="dificulty" name="dificulty">
                                <option value="">Select Item Difficulty</option> 
                                <option <?php echo set_select('dificulty','0.1-0.4');?> value="0.1-0.4">Difficult(0.1 to 0.4)</option>
                                <option <?php echo set_select('dificulty','0.5-0.6');?> value="0.5-0.6">Normal(0.5 to 0.6)</option>
                                 <option <?php echo set_select('dificulty','0.7-0.9');?> value="0.7-0.9">Easy(0.7 to 0.9)</option>
                              </select>
                        </div>
                        <div class="col-lg-3 col-sm-12 ">
                            <label for="item_type" class="control-label">Item Type: </label>
                             <select class="form-control" id="item_type" name="item_type">
                                 <option value="">Select Item Type</option>
                                <option <?php echo set_select('item_type','MCQ');?> value="MCQ">MCQ</option>
                                <option <?php echo set_select('item_type','ERQ');?> value="ERQ">ERQ</option>
                              </select>
                        </div>
                        <div class="col-lg-3 col-sm-12 ">
                            <label for="item_status" class="control-label">Item Status: </label>
                             <select class="form-control" id="item_status" name="item_status">
                                <option value="">Select Item Status</option>
                                <option <?php echo set_select('item_status','1');?> value="1">Draft</option>
                                <option <?php echo set_select('item_status','2');?> value="2">Submitted</option>
                                <option <?php echo set_select('item_status','3');?> value="3">Rejected</option>
                                <option <?php echo set_select('item_status','4');?> value="4">Accepted</option>
                              </select>
                        </div>
                    
                    </div>
                    
                     <div class="row">
                        <div class="col-lg-3 col-sm-12 ">
                            <label for="item_cognitive_level" class="control-label">Cognitive Level: </label>
                             <select class="form-control" id="item_cognitive_level" name="item_cognitive_level">
                                <option value="">Select Item Cognitive Level</option>
                                <option <?php echo set_select('item_cognitive_level','Knowledge');?> value="Knowledge">Knowledge</option>
                                <option <?php echo set_select('item_cognitive_level','Comprehension');?> value="Comprehension">Comprehension</option>
                                <option <?php echo set_select('item_cognitive_level','Application');?> value="Application">Application</option>
                                <option <?php echo set_select('item_cognitive_level','Analysis');?> value="Analysis">Analysis</option>
                                 <option <?php echo set_select('item_cognitive_level','Synthesis');?> value="Synthesis">Synthesis</option>
                                 <option <?php echo set_select('item_cognitive_level','Evaluation');?> value="Evaluation">Evaluation</option>
                              </select>
                        </div>
                        <div class="col-lg-3 col-sm-12 ">
                            <label for="curriculum" class="control-label">Curriculum: </label>
                             <select class="form-control" id="curriculum" name="curriculum">
                                <option value="">Select Item Curriculum</option>
                                <option <?php echo set_select('curriculum','1');?> value="1">2006(ALP)</option>
                                <option <?php echo set_select('curriculum','2');?> value="2">National Curriculum (2006)</option>
                                <option <?php echo set_select('curriculum','3');?> value="3">Single National Curriculum(SNC) 2020</option>
                              </select>
                        </div>
                        <div class="col-lg-3 col-sm-12 ">
                            <label for="item_grade_id" class="control-label">Layout: </label>
                             <select class="form-control" id="layout" name="layout">
                                <option value="">Select Layout</option>
                                <option <?php echo set_select('layout','1');?> value="1">1</option>
                                <option <?php echo set_select('layout','2');?> value="2">2</option>
                                <option <?php echo set_select('layout','3');?> value="3">3</option>
                                <option <?php echo set_select('layout','4');?> value="4">4</option>
                                <option <?php echo set_select('layout','5');?> value="5">5</option>
                                <option <?php echo set_select('layout','6');?> value="6">6</option>
                                <option <?php echo set_select('layout','7');?> value="7">7</option>
                                <option <?php echo set_select('layout','8');?> value="8">8</option>
                                <option <?php echo set_select('layout','9');?> value="9">9</option>
                                <option <?php echo set_select('layout','10');?> value="10">10</option>
                                <option <?php echo set_select('layout','11');?> value="11">11</option>
                                <option <?php echo set_select('layout','12');?> value="12">12</option>
                              </select>
                        </div>
                        <div class="col-lg-3 col-sm-12 ">
                            <label for="item_relation" class="control-label">Item Relation: </label>
                             <select class="form-control" id="item_relation" name="item_relation">
                                <option value="">Select Item Relation</option>
                                <option <?php echo set_select('item_relation','1');?> value="1">Direct Quote</option>
                                <option <?php echo set_select('item_relation','2');?> value="2">Amended</option>
                              </select>
                             
                        </div>
                    
                    </div>
                    <div class="row">

                        <div class="col-lg-3 col-sm-12">  

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

                        <div class="col-lg-3 col-sm-12">                         

                           <label for="item_subject_id" class="control-label">Subject </label>

                        <select name="item_subject_id" class="form-control form-group" id="item_subject_id"  >

                          <option value="">--Select Subjects--</option>

                            <?php
                            if(isset($subjects)){
                                foreach($subjects as $subject)
                                {
                                    echo '<option value="'.$subject['subject_id'].'"'.set_select('item_subject_id',$subject['subject_id']).'>'.$subject['subject_name_en'].'</option>';

                                }
                            }

                          ?>

                        </select>

                        </div>

                        <div class="col-lg-3 col-sm-12">                         

                            <label for="item_cstand_id" class="control-label">Content Stand </label>

                        <select name="item_cstand_id" class="form-control form-group" id="item_cstand_id"  >

                          <option value="">--Select Content Strand--</option>

                            <?php
                            if(isset($content_strands)){

                                foreach($content_strands as $row)

                                {

                                   echo '<option value="'.$row['cs_id'].'"'.set_select('item_cstand_id',$row['cs_id']).'>'.$row['cs_number'].'-'.$row['cs_statement_en'].'-'.$row['cs_statement_ur'].'</option>';

                                }
                            }

                          ?>

                        </select>

                        </div>				

                        <div class="col-lg-3 col-sm-12">                         

                            <label for="item_subcstand_id" class="control-label">Sub Content Stand </label>

                        <select name="item_subcstand_id" class="form-control form-group" id="item_subcstand_id"  >

                          <option value="">--Select Subcontent Strand--</option>

                            <?php
                            if(isset($subcontent_strands)){

                                foreach($subcontent_strands as $row)
                                {

                                   echo '<option value="'.$row['subcs_id'].'"'.set_select('item_subcstand_id',$row['subcs_id']).'>'.$row['subcs_number'].'-'.$row['subcs_topic_en'].''.$row['subcs_topic_ur'].'</option>';

                                }
                            }

                          ?>

                        </select>

                        </div>


              </div>
                 
                  </div><!--End Panel Body-->
              </div>
            </div>
           
            
			<div class="row">

                 <div class ="col-12" style="float:right">
                     <input type="submit" id="get_rep" name="get_rep" class="btn btn-success" value="Find" style="width:120px; float:right"/>
                </div> 

              </div>

            <!-- Data table start here--------------------------->

            <?php

            if(isset($_REQUEST['get_rep']) || $this->input->post('btn_serch')){
                $search_type = (isset($_REQUEST['btn_serch']) ? 'Like' : 'Match');

            ?>

            <div class="btn-group margin-bottom-20"> 

                <a href="<?= base_url() ?>admin/reports/item_search_export/PDF/<?=$search."/".$item_code."/".$dificulty."/".$item_type."/".$item_status."/".$item_cognitive_level."/".$layout."/".$curriculum."/".$item_relation."/".$item_grade_id."/".$item_subject_id."/".$item_cstand_id."/".$item_subcstand_id."/".$search_type?>" class="btn btn-secondary">Export as PDF</a>

                <a href="<?= base_url() ?>admin/reports/item_search_export/CSV/<?=$search."/".$item_code."/".$dificulty."/".$item_type."/".$item_status."/".$item_cognitive_level."/".$layout."/".$curriculum."/".$item_relation."/".$item_grade_id."/".$item_subject_id."/".$item_cstand_id."/".$item_subcstand_id."/".$search_type?>" class="btn btn-secondary">Export as Excel</a>

              </div>

              <div class="card-body table-responsive">



                <table id="na_datatable" class="table table-bordered table-striped" width="100%">



                  <thead>

                    <tr>
                      <th>Grades</th>
                      <th>Subjects</th>
                      <th>Item Type</th>
                      <th>ContentStrand</th>
                      <th>SubContent</th>
                      <th>SLO</th>
                      <th>Item Code</th>
                      <th>View details</th>
                    </tr>

                  </thead>
                </table>

              </div>
             <!-- Modal -->
               <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">

                 <!-- Modal content-->
                 <div class="modal-content " >
                  <div class="modal-header">
                    <h4 class="modal-title">Item Info</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">

                  </div>
                  <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                 </div>
                </div>
               </div>
             <!-- END Modal -->

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


<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
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



</script>
<!-- 
Script 
auto sugestion totrial link
https://www.tutorialspoint.com/jqueryui/jqueryui_autocomplete.htm
-->
    
    <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize 
     $( "#search" ).autocomplete({
         //minLength:3,   
         delay:500,
        source: function( request, response ) {
          // Fetch data
            //alert(request.term);
          $.ajax({
            url: "<?=base_url()?>admin/reports/auto_sugest",
            type: 'post',
            dataType: "json",
            data: {
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
              keyword: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
      // autoFocus:true,
       select: function (event, ui) {
       // Set selection
       $('#search').val(ui.item.label); // display the selected text
       //$('#userid').val(ui.item.value); // save selected id to input
       return false;
      },
      focus: function(event, ui){
         $( "#search" ).val( ui.item.label );
         //$( "#userid" ).val( ui.item.value );
         return false;
       },
     });

    });
    </script>


<?php

$grade     = (isset($item_grade_id)&&$item_grade_id!="0") ? $item_grade_id : 0;
$subject   = (isset($item_subject_id)&&$item_subject_id!="0") ? $item_subject_id : 0;
$cstrand    = (isset($item_cstand_id)&&$item_cstand_id!="0") ? $item_cstand_id : 0;
$subcstand = (isset($item_subcstand_id)&&$item_subcstand_id!="0") ? $item_subcstand_id : 0;


$search_type = (isset($_REQUEST['btn_serch']) ? 'Like' : 'Match');
$search     = (isset($search)&&$search!="") ? $search : 0;
//$from       = (isset($from)&&count($from)>0) ? implode(",",$from) : 0;
$item_code  = (isset($item_code)&&$item_code!="") ? $item_code : 0;
$dificulty  =(isset($dificulty)&&$dificulty!="0") ? $dificulty : 0;
$item_type  = (isset($item_type)&&$item_type!="0") ? $item_type : 0;
$item_stat  = (isset($item_status)&&$item_status!="0") ? $item_status : 0;
$cog_lev   = (isset($item_cognitive_level)&&$item_cognitive_level!="0") ? $item_cognitive_level : 0;
$layout     = (isset($layout)&&$layout!="0") ? $layout : 0;
$curriculum = (isset($curriculum)&&$curriculum!="0") ? $curriculum : 0;
$item_relation = (isset($item_relation)&&$item_relation!="0") ? $item_relation : 0;

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

    "ajax": "<?=base_url('admin/reports/item_search_jason/'.$search.'_'.$item_code.'_'.$dificulty.'_'.$item_type.'_'.$item_stat.'_'.$cog_lev.'_'.$layout.'_'.$curriculum.'_'.$item_relation.'_'.$grade.'_'.$subject.'_'.$cstrand.'_'.$subcstand.'_'.$search_type);?>",

      "columnDefs": [

        { "targets": 0, "name": "grade_id", 'searchable':true, 'orderable':true},
        { "targets": 1, "name": "subject_name_en", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "item_type", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "cs_strand", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "subcs_strand", 'searchable':true, 'orderable':true},
        { "targets": 5, "name": "slo_number", 'searchable':true, 'orderable':true},
        { "targets": 6, "name": "item_code", 'searchable':true, 'orderable':true},
        { "targets": 7, "name": "item_id", 'searchable':false, 'orderable':false}
        
       
    ]

  });

  table.buttons().container()

        .appendTo( '#na_datatable .col-md-6:eq(0)' );



</script>
<script>
 $('#myform input[type="submit"]').click(function(e){
     
     var btn = $(this).val();
     //alert(btn);
     if(btn == 'Search' && $('#search').val() ==''){
         e.preventDefault(); 
         alert('Please type any word in search box');
          return false;
     }else{
          $('#myform').submit();
     }
     if(btn == 'Find' && $('#item_code').val() =='' && $('#dificulty').val() =='' && $('#item_type').val() =='' && $('#item_status').val() =='' && $('#item_cognitive_level').val() =='' && $('#curriculum').val() =='' && $('#layout').val() =='' && $('#item_relation').val() =='' && $('#item_grade_id').val() ==''&& $('#item_subject_id').val() ==''&& $('#item_cstand_id').val() ==''&& $('#item_subcstand_id').val() ==''){
          e.preventDefault(); 
         alert('Please select a field for search');
          return false;
     }else{
          $('#myform').submit();
     }
});
        
$/*('#na_datatable').on('click', 'a', function(){
  
    var item_id =$(this).attr('data-id');
    
    // AJAX request
   $.ajax({
    url: '<?=base_url()?>admin/reports/item_details_byId/'+item_id,
    type: 'get',
   // data: {item_id: item_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-body').html(response);

      // Display Modal
    $('#empModal').modal('show'); 
        }
  });
});*/
</script>





