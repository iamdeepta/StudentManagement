<?php


require("config/json_db.php");
        
        $data = getJSON("SELECT id, degree_name FROM degree_masters");
        $result = json_decode($data, true);


?>

<?php include 'header.php'?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div class="container" style="margin-top: 20px;">
  <div class="card">
    <div class="card-header">
      Create New Student
    </div>
    <div class="card-body">

  <form class="form-horizontal" id="userInfo" action="insert.php" method="post" enctype="multipart/form-data" data-parsley-validate>



  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" required>
    
  </div>

  <div class="form-group">
    <label for="phone">Phone No.</label>
    <input data-parsley-type="number" class="form-control" name="phone" id="phone" maxlength="11" required>
    
  </div>

  <div class="form-group">
    <label for="fname">Father's Name</label>
    <input type="text" class="form-control" name="fname" id="fname"  maxlength="50" required>
    
  </div>

  <div class="form-group">
    <label for="mname">Mother's Name</label>
    <input type="text" class="form-control" name="mname" id="fname"  maxlength="50" required>
    
  </div>

  <!-- <div class="form-group">
    <label for="degree">Education Level</label>
    <input type="text" class="form-control" name="degree" id="degree" required>
    
  </div> -->
<div class="form-group">
  <label for="degree">Education Level</label>
  <div class="input-group">
    
  <select class="form-control" id="degree_id[]" name="degree_id[]" aria-label="Example select with button addon"  required>   <!-- onChange="checkOption(this)" -->
    <!-- <option value="A">Choose Degree</option> -->
    <?php
    foreach ($result as $degree_master){
      ?>
    <!-- <option selected>Choose Degree</option> -->
    <option value="<?=$degree_master['id']?>"><?=$degree_master['degree_name']?></option>
    <!-- <option value="2">O LEVEL</option>
    <option value="3">A LEVEL</option> -->
    <?php } ?>
  </select>
  <div class="input-group-append">
    <!-- <div class="form-group"> -->
    <label for="point">Result(Point)</label> 
    <input data-parsley-type="number" class="form-control" name="point[]" id="point[]" required>
    
  <!-- </div> -->
  <!-- <button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button> -->
      <!-- </tr> -->
    <!-- <button class="btn btn-outline-secondary" type="button">Button</button> --> 

   </div>  
</div>

<button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button>

</div>


<script type="text/javascript">
  
  $(document).ready(function(){
    var count=0;

 $('#add').click(function(){

  // Create clone of <div class='input-form'>
  var newel = $('.input-group:last').clone(true);
 // newel.setAttribute("id", "test"+count);

  // Add after last <div class='input-form'>
  $(newel).insertAfter(".input-group:last");
  newel.setAttribute("id", "test"+count);
  count++;
 });

});

  /*var form = document.getElementById('userInfo'), 
    degree_id = form.elements.degree_id;


    degree_id.onchange = function () {
    var form = this.form;
    if (this.selectedIndex === 1 || this.selectedIndex === 2|| this.selectedIndex === 3|| this.selectedIndex === 4|| this.selectedIndex === 5|| this.selectedIndex === 6|| this.selectedIndex === 7|| this.selectedIndex === 8) {
        form.elements.point.disabled = false;
    } else {
        form.elements.point.disabled = true;
    }
};*/

</script>





<!-- <script type="text/javascript">
        function checkOption(obj) {
            var input = document.getElementById("point");
            input.disabled = obj.value == "A";
        }
    </script> -->

  

  <div class="form-group">
    <label for="student_image">Student Image</label>
    <div class="row">
      <div class="col-md-4">
        <input type="file" class="form-control" multiple name="student_image[]" id="student_image[]" required>
      </div>
    
    </div>
    <button type="button" name="add1" id="add1" class="btn btn-success btn-sm add">+</button>
    
  </div>

  <script type="text/javascript">
  
  $(document).ready(function(){

 $('#add1').click(function(){

  // Create clone of <div class='input-form'>
  var newel1 = $('.row:last').clone(true);

  // Add after last <div class='input-form'>
  $(newel1).insertAfter(".row:last");
 });

});
</script>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>

<!-- <script>  
        function enable_disable() { 
            $("point").prop('disabled', false); 
        } 
</script> -->
</div>
</div>
</div>




    