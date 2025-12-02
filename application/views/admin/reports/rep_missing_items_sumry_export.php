<html>
    <body>
          <?php
            if($rep_type == 'CSV'){
                echo $header;
            }
          ?>
		<h3><?=$title?></h3>

		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
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
			<tbody>
        <?php
			foreach($res_data as $row):
        ?>
				<tr class="oddrow">
					<td><?=$row['grade']?></td>
					<td><?=$row['subject_name_en']?></td>
					<td><?=$row['total_items']?></td>
					<td><?=$row['code_missing']?></td>
                    <td><?=$row['item_difficulty']?></td>
				    <td><?=$row['item_discr']?></td>
                    <td><?=$row['item_dif_code']?></td>
                    <td><?=$row['item_registration']?></td>
                    <td><?=$row['item_cognitive_bloom']?></td>
                    <td><?=$row['item_pctb_chapter']?></td>
                    <td><?=$row['item_pctb_page']?></td>
                    <td><?=$row['item_relation']?></td>
                    <td><?=$row['item_rubric']?></td>
				</tr>
<?php
			endforeach;
?>

                    </tbody>

			</table>			

       
    </body>
</html>