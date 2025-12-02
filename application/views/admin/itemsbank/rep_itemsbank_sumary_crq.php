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
                  <a href="<?= base_url() ?>admin/itemsbank/itemsbank_summary_export_crq/PDF/<?php echo $paper[0]->ibc_subject_id;?>" class="btn btn-secondary">Export as PDF</a> 
                  <a href="<?= base_url() ?>admin/itemsbank/itemsbank_summary_export_crq/CSV/<?php echo $paper[0]->ibc_subject_id;?>" class="btn btn-secondary">Export as CSV</a>
              </div>
                <?php
                }
                ?>
				<!---- start here is item view filmzy --->
                 <table id="" class="table table-bordered table-hover" width="80%">
                  <thead>
                        <tr>
                            <th colspan="16">Summary Of Itemsbank</th>
                        </tr>
                        <tr >
                            <th colspan="8">Subject : <?php echo $paper[0]->subject_name_en;?></th>
                            <th colspan="8">Grade :  <?php echo $paper[0]->ibc_grade_id-2;?></th>
                        </tr>
                        <tr >
                            <th>Q. No.</th>
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
                            <th width="5%">Flag</th>                            
                            <th width="10%">Code</th>                           
                            <th width="5%">P Q. No.</th>
                            <th width="10%">Item Writer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(count((array)$paper)>0){
                            $i = 0;
							
                           foreach($paper as $row){
                               //$i++;
                              // print_r($row);
                        	if($row->ibc_group_id==0 && $row->item_id!=0)
							{
						?>
                            <tr>
                                <td ><?=++$i?></td>
                                <td><?=$row->item_id?></td>
                                <td width="20%" style="width: 20px;"><?=$row->cs_statement_en.'<br>'.$row->cs_statement_ur?></td>
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
                                <td><?=$row->item_flag?></td>
                                <td><?=$row->item_code?></td>
                                <td><?=$i?></td>
                                <td><?=$row->firstname.' '.$row->lastname?></td>
                            </tr>
                        <?php
							}
							else if($row->ibc_group_id!=0 && $row->item_id==0)
							{
								$groupids = $this->Itemsbank_model->get_group_by_ids($row->ibc_group_id);
								$groupids = $groupids[0];
								$groupids = (object)$groupids;
								for($j=1;$j<=10;$j++)
								{
									$dvar = 'group_item_'.$j;
									${$dvar} = $this->Itemsbank_model->get_itemdtl_by_id($groupids->$dvar);
									/*print "<pre>";
									print_r(${$dvar});
									die;*/
									//$group_item_.$j = (isset($group_item_[0])&&$group_item_1[0]!="")?$group_item_1[0]:0;
									${$dvar} = (isset(${$dvar}[0])&&${$dvar}[0]!='')?${$dvar}[0]:0;
									if(${$dvar}!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=${$dvar}->item_id?></td>
											<td width="20%" style="width: 20px;"><?=${$dvar}->cs_statement_en?></td>
											<td><?=${$dvar}->item_pctb_chapter?></td>
											<td><?=${$dvar}->slo_number?></td>
											<td><?=strtoupper(${$dvar}->item_option_correct)?></td>
											<td><?=(${$dvar}->item_image_en !="" || ${$dvar}->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if(${$dvar}->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif(${$dvar}->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif(${$dvar}->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif(${$dvar}->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=${$dvar}->item_difficulty?></td>
											<td><?=${$dvar}->item_p_value?></td>
											<td><?=${$dvar}->item_rbis_value?></td>
                                            <td><?=${$dvar}->item_flag?></td>
											<td><?=${$dvar}->item_code?></td>
											<td><?=$i?></td>
											<td><?=${$dvar}->firstname.' '.${$dvar}->lastname?></td>
										</tr>	
								<?php 
									}
								}
								//die('2222');
							}
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