<?php

        require("config/autoload.php");

        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $degree_id = $_POST["degree_id"];
        //$image1 = $_POST["student_image"];
        //$degree_id = (int)$degree_id;
        $points = $_POST["point"];

        $database = new Database\Database;
        $connection = $database->connect();
    

        $studentQuery = "INSERT INTO students 
                    SET 
                        `name` = '{$name}',
                        `phone` = '{$phone}',
                        `fname` = '{$fname}',
                        `mname` = '{$mname}'
                ";

        $students = $connection->query($studentQuery);



        $lastID = $connection->lastInsertID();
        $student_id=$lastID;


        $img = '';

       
        if (count($_FILES['student_image']['tmp_name'])>0) {
          
        
        //foreach ($_FILES['student_image']['tmp_name'] as $key => $image) {
        for($n=0;$n<count($_FILES['student_image']['tmp_name']);$n++){
            $imageName = $_FILES['student_image']['name'][$n];
            $imageTmpName = $_FILES['student_image']['tmp_name'][$n];
            $fileSize = $_FILES['student_image']['size'][$n];
            $fileError = $_FILES['student_image']['error'][$n];
            $fileType = $_FILES['student_image']['type'][$n];

            $fileExt = explode('.', $imageName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $img .= $imageName;

                        $directory = 'images/students/';

                        $directory1 = 'images/students/'.$img;

                        $result = move_uploaded_file($imageTmpName, $directory.$imageName);


                        $imageQuery = "INSERT INTO student_images
                                        SET 
                                            `student_id` = '{$student_id}',
                                            `image` = '{$directory1}'
                            
                                        ";

                        $student_images = $connection->query($imageQuery);

                    } else{
                        /*echo "Your file is too big";*/
                        ?>
                        <script type="text/javascript">
                            alert('Your file is too big');
                        </script>

                        <?php
                    }
                } else{

                    /*echo "There was an error uploading your file";*/
                    ?>
                    <script type="text/javascript">
                        alert('There was an error uploading your file');
                    </script>

                    <?php
                }
                
            } else{
                /*echo "You cannot upload this type of file";*/
                ?>
                <script type="text/javascript">
                    alert('You cannot upload this type of file');
                </script>

                <?php
            }

    

        }



                            

    }

    for ($n=0;$n<count($_POST['degree_id']);$n++){

            //echo $_POST['degree_id'][$n].$_POST['point'][$n].'<br>';

            $d_id = $_POST['degree_id'][$n];
            $points = $_POST['point'][$n];

            $degreeQuery = "INSERT INTO degrees
                            SET 
                                `student_id` = '{$student_id}',
                                `degree_id` = '{$d_id}'
                                
                            ";

                            $degrees = $connection->query($degreeQuery);

                            //echo $degreeQuery.'<br>';



            $pointQuery = "INSERT INTO points
                            SET 
                                `student_id` = '{$student_id}',
                                `degree_id` = '{$d_id}',
                                `points` = '{$points}'
                                
                            ";

                            $points = $connection->query($pointQuery);


                            //echo $pointQuery.'<br>';


    }



        header("Location: create.php");
    
?>
