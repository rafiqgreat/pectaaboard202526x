  <!-- Content Wrapper. Contains page content -->
<html>
    <body>	
            <?php 
				if($rep_type == 'CSV' ){ 
                echo $header;
                ?>
                <table border="1" style="width:100%">
        
                  <thead>
                        <tr>
                            <th colspan="14">Summary Of Itemsbank</th>
                        </tr>
                        <tr >
                            <th colspan="7">Subject : <?php echo $paper[0]->subject_name_en;?></th>
                            <th colspan="7">Grade :  <?php echo $paper[0]->ibc_grade_id-2;?></th>
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
                           foreach($paper as $row)
						   {
								if($row->ibc_group_id==0 && $row->item_id!=0)
								{
							?>
								<tr>
									<td ><?=++$i?></td>
									<td><?=$row->item_id?></td>
									<td width="20%" style="width: 20px;"><?=$row->cs_statement_en?></td>
									<td><?=$row->item_pctb_chapter?></td>
									<td><?=$row->slo_number?></td>
									<td><?=strtoupper($row->item_option_correct)?></td>
									<td><?=($row->item_image_en !="" || $row->item_image_ur !="" ? "Y" : "N" )?></td>
									<td>
										<?php 
											if($row->item_cognitive_bloom == 'Application'){	echo "Ap";	}
											elseif($row->item_cognitive_bloom == 'Comprehension'){	echo "C";	}
											elseif($row->item_cognitive_bloom == 'Knowledge'){	echo "K";	}
											elseif($row->item_cognitive_bloom == 'Analysis'){	echo "An";	}
										?>
                                    </td>
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
											<td>
												<?php 
                                                    if($row->item_cognitive_bloom == 'Application'){	echo "Ap";	}
                                                    elseif($row->item_cognitive_bloom == 'Comprehension'){	echo "C";	}
                                                    elseif($row->item_cognitive_bloom == 'Knowledge'){	echo "K";	}
                                                    elseif($row->item_cognitive_bloom == 'Analysis'){	echo "An";	}
                                                ?>
                                            </td>
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
							  }
                           }
                        }
                        ?>
                    </tbody>
                </table>
            <?php 
            }else{//PDF
            ?>
            <table border="1" style="width:100%">
              <thead>
                    <tr>
                        <th colspan="11">Summary Of Papper</th>
                    </tr>
                    <tr >
                        <th colspan="6">Subject : <?=$paper[0]->subject_name_en?></th>
                        <th colspan="5">Grade :  <?=$paper[0]->item_grade_id-2?></th>
                    </tr>
                    <tr >
                        <th>Q. No.</th>
                        <th>Content strand</th>
                        <th>Chap No.</th>
                        <th>SLO No.</th>
                        <th>D/T</th>
                        <th>Cog. Level</th>
                        <th>P Value</th>
                        <th>Total Rbis</th>
                        <th>Item Code</th>
                        <th>P Q. No.</th>
                        <th>Item Writer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count((array)$paper)>0){
                            $i = 0;
                           foreach($paper as $row)
						   {
								if($row->ibc_group_id==0 && $row->item_id!=0)
								{
							?>
								<tr>
									<td ><?=++$i?></td>
									<td width="20%" style="width: 20px;"><?=$row->cs_statement_en.'<br>'.$row->cs_statement_ur?></td>
									<td><?=$row->item_pctb_chapter?></td>
									<td><?=$row->slo_number?></td>
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
									<td><?=$row->item_p_value?></td>
									<td><?=$row->item_rbis_value?></td>
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
            <?php
            }
            ?>
   </body>
</html>

	