  <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="card card-default color-palette-bo">
            <div class="card-body table-responsive">
                
				<!-- For Messages -->
				<?php $this->load->view('admin/includes/_messages.php'); 
                
				//echo '<PRE>';
				//print_r($paper); 
				//die();
                if(count((array)$paper)> 0 && $export == 0){
                ?>
                 <div class="btn-group margin-bottom-20"> 

                  <a href="<?= base_url() ?>admin/pilotpaper/pilot_item_summary_export/PDF/<?=$p_subject."/".$p_version."/".$p_phase;?>" class="btn btn-secondary">Export as PDF</a> 
                    <a href="<?= base_url() ?>admin/pilotpaper/pilot_item_summary_export/CSV/<?=$p_subject."/".$p_version."/".$p_phase;?>" class="btn btn-secondary">Export as CSV</a>

              </div>
                <?php
                }
                ?>

				<!---- start here is item view filmzy --->
                
                 <table id="" class="table table-bordered table-hover" width="80%">
        
                  <thead>
                        <tr>
                            <th colspan="16">Summary Of Paper</th>
                        </tr>
                        <tr >
                            <th colspan="6">Subject : <?=$paper[0]->subject_name_en?></th>
                            <th colspan="2">Grade :  <?=$paper[0]->item_grade_id-2?></th>
                            <th colspan="8">Version:<?=$p_version?></th>
                        </tr>
                        <tr >
                            <th>Q. No.</th>
                            <th width="20%">Paper Phase</th>
                             <th>Item ID</th>
                            <th width="20%">Content strand</th>
                            <th width="5%">Chap.</th>
                            <th width="5%">SLO No.</th>
                            <th width="5%">Key</th>
                            <th width="5%">D/T</th>
                            <th width="5%">C.Level</th>
                            <th width="10%">Diff</th>
                            <th>P Value</th>
                            <th>T Rbis</th>                            
                            <th width="10%">Code</th>                           
                            <th width="5%"> Version</th>
                            <th width="5%">P Q. No.</th>
                            <th width="10%">Item Writer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(count((array)$paper)>0){
                            $i = 0;
                           foreach($paper as $row){
                               $i++;
                              // print_r($row);
                        ?>
                            <tr>
                                <td ><?=$i?></td>
                                <td><?=$p_phase?></td>
                                 <td><?=$row->item_id?></td>
                                <td width="20%" style="width: 20px;"><?=$row->cs_statement_en?></td>
                                <td><?=$row->item_pctb_chapter?></td>
                                <td><?=$row->slo_number?></td>
                                <td><?=strtoupper($row->item_option_correct)?></td>
                                <td><?=($row->item_image_en !="" || $row->item_image_ur !="" ? "Y" : "N" )?></td>
                                <td><?php 
                                    if($row->item_cognitive_bloom == 'Application'){
                                        echo "Ap";
                                    }elseif($row->item_cognitive_bloom == 'Comprehension'){
                                        echo "C";
                                    }elseif($row->item_cognitive_bloom == 'Knowledge'){
                                        echo "K";
                                    }elseif($row->item_cognitive_bloom == 'Analysis'){
                                        echo "An";
                                    }
                                    ?></td>
                                 <td><?=$row->item_difficulty?></td>
                                <td><?=$row->item_p_value?></td>
                                <td><?=$row->item_rbis_value?></td>
                               
                                <td><?=$row->item_code?></td>
                               
                                <td><?=$p_version?></td>
                                <td><?=$i?></td>
                                <td><?=$row->firstname.' '.$row->lastname?></td>
                        
                            </tr>
                        <?php
                               
                           }
                            
                        }
                        
                        ?>
                     
                    </tbody>
                
                </table>
                
			</div>
		</div>
        
	</section>
    
	</div>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>