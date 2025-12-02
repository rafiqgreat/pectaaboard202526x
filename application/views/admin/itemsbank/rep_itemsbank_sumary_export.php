  <!-- Content Wrapper. Contains page content -->
<html>
    <body>	
            <?php 

            //echo '<PRE>';
            //print_r($paper); 
            //die();

            if($rep_type == 'CSV' ){ 
                echo $header;
                ?>
                <table border="1" style="width:100%">
        
                  <thead>
                        <tr>
                            <th colspan="15">Summary Of Itemsbank</th>
                        </tr>
                        <tr >
                            <th colspan="8">Subject : <?=$paper[0]->subject_name_en?></th>
                            <th colspan="7">Grade :  <?=$paper[0]->item_grade_id-2?></th>
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
                            <th>Flag</th>
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
							   if($row->ibm_para_id==0 && $row->item_id!=0)
								{
							?>
                                    <tr>
                                        <td><?=++$i?></td>
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
                                        <td><?=$row->item_flag?></td>
                                        <td><?=$row->item_code?></td>
                                        <td><?=$i?></td>
                                        <td><?=$row->firstname.' '.$row->lastname?></td>
                                
                                    </tr>
							<?php
								}
								else if($row->ibm_para_id!=0 && $row->item_id==0)
								{
									$paraids = $this->Itemsbank_model->get_para_by_ids($row->ibm_para_id);
									$paraids = $paraids[0];
									$paraids = (object)$paraids;
									
									$para_item_21 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_21);
									$para_item_21 = (isset($para_item_21[0])&&$para_item_21[0]!="")?$para_item_21[0]:0;
									if($para_item_21!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_21->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_21->cs_statement_en?></td>
											<td><?=$para_item_21->item_pctb_chapter?></td>
											<td><?=$para_item_21->slo_number?></td>
											<td><?=strtoupper($para_item_21->item_option_correct)?></td>
											<td><?=($para_item_21->item_image_en !="" || $para_item_21->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_21->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_21->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_21->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_21->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_21->item_difficulty?></td>
											<td><?=$para_item_21->item_p_value?></td>
											<td><?=$para_item_21->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_21->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_21->firstname.' '.$para_item_21->lastname?></td>
										</tr>	
								<?php 
									}
									
									$para_item_22 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_22);
									$para_item_22 = (isset($para_item_22[0])&&$para_item_22[0]!="")?$para_item_22[0]:0;
									if($para_item_22!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_22->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_22->cs_statement_en?></td>
											<td><?=$para_item_22->item_pctb_chapter?></td>
											<td><?=$para_item_22->slo_number?></td>
											<td><?=strtoupper($para_item_22->item_option_correct)?></td>
											<td><?=($para_item_22->item_image_en !="" || $para_item_22->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_22->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_22->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_22->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_22->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_22->item_difficulty?></td>
											<td><?=$para_item_22->item_p_value?></td>
											<td><?=$para_item_22->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_22->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_22->firstname.' '.$para_item_22->lastname?></td>
										</tr>	
									<?php 
										}
										
									$para_item_23 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_23);
									$para_item_23 = (isset($para_item_23[0])&&$para_item_23[0]!="")?$para_item_23[0]:0;
									if($para_item_23!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_23->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_23->cs_statement_en?></td>
											<td><?=$para_item_23->item_pctb_chapter?></td>
											<td><?=$para_item_23->slo_number?></td>
											<td><?=strtoupper($para_item_23->item_option_correct)?></td>
											<td><?=($para_item_23->item_image_en !="" || $para_item_23->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_23->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_23->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_23->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_23->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_23->item_difficulty?></td>
											<td><?=$para_item_23->item_p_value?></td>
											<td><?=$para_item_23->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_23->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_23->firstname.' '.$para_item_23->lastname?></td>
										</tr>	
									<?php 
										}
										
									$para_item_24 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_24);
									$para_item_24 = (isset($para_item_24[0])&&$para_item_24[0]!="")?$para_item_24[0]:0;
									if($para_item_24!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_24->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_24->cs_statement_en?></td>
											<td><?=$para_item_24->item_pctb_chapter?></td>
											<td><?=$para_item_24->slo_number?></td>
											<td><?=strtoupper($para_item_24->item_option_correct)?></td>
											<td><?=($para_item_24->item_image_en !="" || $para_item_24->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_24->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_24->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_24->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_24->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_24->item_difficulty?></td>
											<td><?=$para_item_24->item_p_value?></td>
											<td><?=$para_item_24->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_24->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_24->firstname.' '.$para_item_24->lastname?></td>
										</tr>	
									<?php 
										}
										
									$para_item_25 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_25);
									$para_item_25 = (isset($para_item_25[0])&&$para_item_25[0]!="")?$para_item_25[0]:0;
									if($para_item_25!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_25->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_25->cs_statement_en?></td>
											<td><?=$para_item_25->item_pctb_chapter?></td>
											<td><?=$para_item_25->slo_number?></td>
											<td><?=strtoupper($para_item_25->item_option_correct)?></td>
											<td><?=($para_item_25->item_image_en !="" || $para_item_25->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_25->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_25->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_25->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_25->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_25->item_difficulty?></td>
											<td><?=$para_item_25->item_p_value?></td>
											<td><?=$para_item_25->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_25->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_25->firstname.' '.$para_item_25->lastname?></td>
										</tr>	
									<?php 
										}
										
									$para_item_26 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_26);
									$para_item_26 = (isset($para_item_26[0])&&$para_item_26[0]!="")?$para_item_26[0]:0;
									if($para_item_26!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_26->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_26->cs_statement_en?></td>
											<td><?=$para_item_26->item_pctb_chapter?></td>
											<td><?=$para_item_26->slo_number?></td>
											<td><?=strtoupper($para_item_26->item_option_correct)?></td>
											<td><?=($para_item_26->item_image_en !="" || $para_item_26->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_26->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_26->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_26->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_26->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_26->item_difficulty?></td>
											<td><?=$para_item_26->item_p_value?></td>
											<td><?=$para_item_26->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_26->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_26->firstname.' '.$para_item_26->lastname?></td>
										</tr>	
									<?php 
										}
										
									$para_item_27 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_27);
									$para_item_27 = (isset($para_item_27[0])&&$para_item_27[0]!="")?$para_item_27[0]:0;
									if($para_item_27!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_27->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_27->cs_statement_en?></td>
											<td><?=$para_item_27->item_pctb_chapter?></td>
											<td><?=$para_item_27->slo_number?></td>
											<td><?=strtoupper($para_item_27->item_option_correct)?></td>
											<td><?=($para_item_27->item_image_en !="" || $para_item_27->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_27->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_27->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_27->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_27->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_27->item_difficulty?></td>
											<td><?=$para_item_27->item_p_value?></td>
											<td><?=$para_item_27->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_27->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_27->firstname.' '.$para_item_27->lastname?></td>
										</tr>	
									<?php
										}
										
									$para_item_28 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_28);
									$para_item_28 = (isset($para_item_28[0])&&$para_item_28[0]!="")?$para_item_28[0]:0;
									if($para_item_28!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_28->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_28->cs_statement_en?></td>
											<td><?=$para_item_28->item_pctb_chapter?></td>
											<td><?=$para_item_28->slo_number?></td>
											<td><?=strtoupper($para_item_28->item_option_correct)?></td>
											<td><?=($para_item_28->item_image_en !="" || $para_item_28->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_28->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_28->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_28->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_28->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_28->item_difficulty?></td>
											<td><?=$para_item_28->item_p_value?></td>
											<td><?=$para_item_28->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_28->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_28->firstname.' '.$para_item_28->lastname?></td>
										</tr>	
									<?php 
										}
										
									$para_item_29 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_29);
									$para_item_29 = (isset($para_item_29[0])&&$para_item_29[0]!="")?$para_item_29[0]:0;
									if($para_item_29!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_29->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_29->cs_statement_en?></td>
											<td><?=$para_item_29->item_pctb_chapter?></td>
											<td><?=$para_item_29->slo_number?></td>
											<td><?=strtoupper($para_item_29->item_option_correct)?></td>
											<td><?=($para_item_29->item_image_en !="" || $para_item_29->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_29->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_29->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_29->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_29->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_29->item_difficulty?></td>
											<td><?=$para_item_29->item_p_value?></td>
											<td><?=$para_item_29->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_29->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_29->firstname.' '.$para_item_29->lastname?></td>
										</tr>	
									<?php 
										}
										
									$para_item_30 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_30);
									$para_item_30 = (isset($para_item_30[0])&&$para_item_30[0]!="")?$para_item_30[0]:0;
									if($para_item_30!="")
									{
										?>
										<tr>
											<td ><?=++$i?></td>
											<td><?=$para_item_30->item_id?></td>
											<td width="20%" style="width: 20px;"><?=$para_item_30->cs_statement_en?></td>
											<td><?=$para_item_30->item_pctb_chapter?></td>
											<td><?=$para_item_30->slo_number?></td>
											<td><?=strtoupper($para_item_30->item_option_correct)?></td>
											<td><?=($para_item_30->item_image_en !="" || $para_item_30->item_image_ur !="" ? "Y" : "N" )?></td>
											<td><?php 
												if($para_item_30->item_cognitive_bloom == 'Application'){
													echo "Ap";
												}elseif($para_item_30->item_cognitive_bloom == 'Comprehension'){
													echo "C";
												}elseif($para_item_30->item_cognitive_bloom == 'Knowledge'){
													echo "K";
												}elseif($para_item_30->item_cognitive_bloom == 'Analysis'){
													echo "An";
												}
												?></td>
											<td><?=$para_item_30->item_difficulty?></td>
											<td><?=$para_item_30->item_p_value?></td>
											<td><?=$para_item_30->item_rbis_value?></td>
                                            <td><?=$row->item_flag?></td>
											<td><?=$para_item_30->item_code?></td>
											<td><?=$i?></td>
											<td><?=$para_item_30->firstname.' '.$para_item_30->lastname?></td>
										</tr>	
									<?php 
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
                        <th colspan="13">Summary Of Papper</th>
                    </tr>
                    <tr >
                        <th colspan="8">Subject : <?=$paper[0]->subject_name_en?></th>
                        <th colspan="5">Grade :  <?=$paper[0]->item_grade_id-2?></th>
                    </tr>
                    <tr >
                        <th>Q. No.</th>
                        <th>Content strand</th>
                        <th>Chap No.</th>
                        <th>SLO No.</th>
                        <th>Key</th>
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
                       foreach($paper as $row){
                          // $i++;
                          // print_r($row);
							if($row->ibm_para_id==0 && $row->item_id!=0)
							{
							?>
								<tr>
									<td><?=++$i?></td>
									<td><?=$row->cs_statement_en?></td>
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
									<td>0.822</td>
									<td>0.34</td>
									<td><?=$row->item_code?></td>
									<td><?=$i?></td>
									<td><?=$row->firstname.' '.$row->lastname?></td>
								</tr>
							<?php
							}
							else if($row->ibm_para_id!=0 && $row->item_id==0)
							{
								$paraids = $this->Itemsbank_model->get_para_by_ids($row->ibm_para_id);
								$paraids = $paraids[0];
								$paraids = (object)$paraids;
								
								$para_item_21 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_21);
								$para_item_21 = (isset($para_item_21[0])&&$para_item_21[0]!="")?$para_item_21[0]:0;
								if($para_item_21!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_21->cs_statement_en?></td>
										<td><?=$para_item_21->item_pctb_chapter?></td>
										<td><?=$para_item_21->slo_number?></td>
										<td><?=strtoupper($para_item_21->item_option_correct)?></td>
										<td><?=($para_item_21->item_image_en !="" || $para_item_21->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_21->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_21->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_21->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_21->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_21->item_p_value?></td>
										<td><?=$para_item_21->item_rbis_value?></td>
										<td><?=$para_item_21->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_21->firstname.' '.$para_item_21->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_22 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_22);
								$para_item_22 = (isset($para_item_22[0])&&$para_item_22[0]!="")?$para_item_22[0]:0;
								if($para_item_22!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_22->cs_statement_en?></td>
										<td><?=$para_item_22->item_pctb_chapter?></td>
										<td><?=$para_item_22->slo_number?></td>
										<td><?=strtoupper($para_item_22->item_option_correct)?></td>
										<td><?=($para_item_22->item_image_en !="" || $para_item_22->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_22->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_22->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_22->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_22->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_22->item_p_value?></td>
										<td><?=$para_item_22->item_rbis_value?></td>
										<td><?=$para_item_22->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_22->firstname.' '.$para_item_22->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_23 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_23);
								$para_item_23 = (isset($para_item_23[0])&&$para_item_23[0]!="")?$para_item_23[0]:0;
								if($para_item_23!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_23->cs_statement_en?></td>
										<td><?=$para_item_23->item_pctb_chapter?></td>
										<td><?=$para_item_23->slo_number?></td>
										<td><?=strtoupper($para_item_23->item_option_correct)?></td>
										<td><?=($para_item_23->item_image_en !="" || $para_item_23->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_23->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_23->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_23->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_23->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_23->item_p_value?></td>
										<td><?=$para_item_23->item_rbis_value?></td>
										<td><?=$para_item_23->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_23->firstname.' '.$para_item_23->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_24 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_24);
								$para_item_24 = (isset($para_item_24[0])&&$para_item_24[0]!="")?$para_item_24[0]:0;
								if($para_item_24!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_24->cs_statement_en?></td>
										<td><?=$para_item_24->item_pctb_chapter?></td>
										<td><?=$para_item_24->slo_number?></td>
										<td><?=strtoupper($para_item_24->item_option_correct)?></td>
										<td><?=($para_item_24->item_image_en !="" || $para_item_24->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_24->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_24->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_24->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_24->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_24->item_p_value?></td>
										<td><?=$para_item_24->item_rbis_value?></td>
										<td><?=$para_item_24->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_24->firstname.' '.$para_item_24->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_25 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_25);
								$para_item_25 = (isset($para_item_25[0])&&$para_item_25[0]!="")?$para_item_25[0]:0;
								if($para_item_25!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_25->cs_statement_en?></td>
										<td><?=$para_item_25->item_pctb_chapter?></td>
										<td><?=$para_item_25->slo_number?></td>
										<td><?=strtoupper($para_item_25->item_option_correct)?></td>
										<td><?=($para_item_25->item_image_en !="" || $para_item_25->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_25->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_25->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_25->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_25->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_25->item_p_value?></td>
										<td><?=$para_item_25->item_rbis_value?></td>
										<td><?=$para_item_25->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_25->firstname.' '.$para_item_25->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_26 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_26);
								$para_item_26 = (isset($para_item_26[0])&&$para_item_26[0]!="")?$para_item_26[0]:0;
								if($para_item_26!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_26->cs_statement_en?></td>
										<td><?=$para_item_26->item_pctb_chapter?></td>
										<td><?=$para_item_26->slo_number?></td>
										<td><?=strtoupper($para_item_26->item_option_correct)?></td>
										<td><?=($para_item_26->item_image_en !="" || $para_item_26->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_26->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_26->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_26->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_26->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_26->item_p_value?></td>
										<td><?=$para_item_26->item_rbis_value?></td>
										<td><?=$para_item_26->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_26->firstname.' '.$para_item_26->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_27 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_27);
								$para_item_27 = (isset($para_item_27[0])&&$para_item_27[0]!="")?$para_item_27[0]:0;
								if($para_item_27!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_27->cs_statement_en?></td>
										<td><?=$para_item_27->item_pctb_chapter?></td>
										<td><?=$para_item_27->slo_number?></td>
										<td><?=strtoupper($para_item_27->item_option_correct)?></td>
										<td><?=($para_item_27->item_image_en !="" || $para_item_27->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_27->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_27->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_27->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_27->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_27->item_p_value?></td>
										<td><?=$para_item_27->item_rbis_value?></td>
										<td><?=$para_item_27->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_27->firstname.' '.$para_item_27->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_28 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_28);
								$para_item_28 = (isset($para_item_28[0])&&$para_item_28[0]!="")?$para_item_28[0]:0;
								if($para_item_28!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_28->cs_statement_en?></td>
										<td><?=$para_item_28->item_pctb_chapter?></td>
										<td><?=$para_item_28->slo_number?></td>
										<td><?=strtoupper($para_item_28->item_option_correct)?></td>
										<td><?=($para_item_28->item_image_en !="" || $para_item_28->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_28->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_28->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_28->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_28->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_28->item_p_value?></td>
										<td><?=$para_item_28->item_rbis_value?></td>
										<td><?=$para_item_28->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_28->firstname.' '.$para_item_28->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_29 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_29);
								$para_item_29 = (isset($para_item_29[0])&&$para_item_29[0]!="")?$para_item_29[0]:0;
								if($para_item_29!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_29->cs_statement_en?></td>
										<td><?=$para_item_29->item_pctb_chapter?></td>
										<td><?=$para_item_29->slo_number?></td>
										<td><?=strtoupper($para_item_29->item_option_correct)?></td>
										<td><?=($para_item_29->item_image_en !="" || $para_item_29->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_29->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_29->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_29->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_29->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_29->item_p_value?></td>
										<td><?=$para_item_29->item_rbis_value?></td>
										<td><?=$para_item_29->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_29->firstname.' '.$para_item_29->lastname?></td>
									</tr>	
							<?php 
								}
								
								$para_item_30 = $this->Itemsbank_model->get_itemdtl_by_id($paraids->para_item_30);
								$para_item_30 = (isset($para_item_30[0])&&$para_item_30[0]!="")?$para_item_30[0]:0;
								if($para_item_30!="")
								{
									?>
									<tr>
										<td ><?=++$i?></td>
										<td width="20%" style="width: 20px;"><?=$para_item_30->cs_statement_en?></td>
										<td><?=$para_item_30->item_pctb_chapter?></td>
										<td><?=$para_item_30->slo_number?></td>
										<td><?=strtoupper($para_item_30->item_option_correct)?></td>
										<td><?=($para_item_30->item_image_en !="" || $para_item_30->item_image_ur !="" ? "Y" : "N" )?></td>
										<td><?php 
											if($para_item_30->item_cognitive_bloom == 'Application'){
												echo "Ap";
											}elseif($para_item_30->item_cognitive_bloom == 'Comprehension'){
												echo "C";
											}elseif($para_item_30->item_cognitive_bloom == 'Knowledge'){
												echo "K";
											}elseif($para_item_30->item_cognitive_bloom == 'Analysis'){
												echo "An";
											}
											?></td>
										<td><?=$para_item_30->item_p_value?></td>
										<td><?=$para_item_30->item_rbis_value?></td>
										<td><?=$para_item_30->item_code?></td>
										<td><?=$i?></td>
										<td><?=$para_item_30->firstname.' '.$para_item_30->lastname?></td>
									</tr>	
							<?php 
								}
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

	