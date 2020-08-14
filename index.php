<?php


require("config/json_db.php");
        
        $data = getJSON("SELECT distinct s.id, s.name, s.phone, s.fname, s.mname, d.degree_id, p.points, i.image FROM students as s, degrees as d, student_images as i, points as p where s.id = d.student_id and d.student_id = i.student_id and s.id = p.student_id and d.degree_id = p.degree_id group by s.name, d.degree_id");
        $result = json_decode($data, true);


        /*$data1 = getJSON("SELECT i.image, s.id FROM student_images as i, students as s where s.id = i.student_id");
        $result1 = json_decode($data1, true);*/


?>

<?php include 'header.php';?>

<div class="container" style="margin-top: 20px;">

<div class="card">
<div class="card-body">
<table class="table table-hover table-striped" style="width: 100%">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Education Level</th>
            <th>Points</th>
            <th>Images</th>
        </tr>

        <?php
            //$i=1;
        
        foreach ($result as $student){
        //for($check = 0; $check<count($row['name']);$check++){

            ?>

        <tr>
            <td><?=$student["name"]?></td>
            <td><?=$student['phone']?> </td>
            <td><?=$student['fname']?> </td>
            <td> <?=$student['mname']?></td>

            <?php //foreach ($result as $degree){
            if($student["degree_id"] == 1){

                ?>
            <td> <?php echo 'SSC'?></td>

            <?php
            
            }elseif($student["degree_id"] == 2){

                ?>
            <td> <?php echo 'HSC'?></td>

            <?php
           
            }elseif($student["degree_id"] == 3){

                ?>
            <td> <?php echo 'O LEVEL'?></td>

            <?php
            
            }elseif($student["degree_id"] == 4){

                ?>
            <td> <?php echo 'A LEVEL'?></td>

            <?php
            
            }elseif($student["degree_id"] == 5){

                ?>
            <td> <?php echo 'BSC'?></td>

            <?php
            
            }elseif($student["degree_id"] == 6){

                ?>
            <td> <?php echo 'BBA'?></td>

            <?php
            
            }elseif($student["degree_id"] == 7){

                ?>
            <td> <?php echo 'MSC'?></td>

            <?php
            
            }elseif($student["degree_id"] == 8){

                ?>
            <td> <?php echo 'MBA'?></td>

        <?php } ?>
            

            <td> <?=$student['points']?></td>
            <?php 
                //} ?>

            <?php $i=1; 
            //foreach ($result as $image){
                if($i>0){
                    ?>
                    <td><img src="<?php echo $student['image'];?>" style="width: 50px;height: 50px"></td>
                    <!-- "images/students/'.$student['image']" -->
                    <?php
                }
              
                $i--; 
            //}
            ?>
        </tr>
        <?php
    }
    
    ?>

</table>
</div>
</div>
</div>
    