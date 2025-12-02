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
                            <th colspan="16">Summary Of Papper</th>
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
							 <th>Flag</th> 
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
                                <td><?=$row->item_flag?></td>
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
        
            <?php 
            }else{//PDF
            ?>
            <table border="1" style="width:100%">

              <thead>
                    <tr>
                        <th colspan="13">Summary Of Papper</th>
                    </tr>
                    <tr >
                        <th colspan="5">Subject : <?=$paper[0]->subject_name_en?></th>
                        <th colspan="2">Grade :  <?=$paper[0]->item_grade_id-2?></th>
                        <th colspan="6">Version:<?=$p_version?></th>
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
                        <th>Version</th>
                        <th>P Q. No.</th>
                        <th>Item Writer</th>
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
                            <td><?=$i?></td>
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
            <?php
            }
            ?>

            
            
            
	
    
    </body>
</html>

	