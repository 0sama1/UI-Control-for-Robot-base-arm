
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Style.css">
<title>Page Title3</title>
</head>
<body>
<form action="index.php" method="post">
        <h1>Control Panel | Robot Arm </h1>
        <hr></hr>
        
        <p >Engine 1 </p>
<div  >
    <input type ="range" min="0" max="180" value="90" id="slider" name="slider">
    <label id="value"></label>
</div>
<p>Engine 2</p>
<div >
    <input type ="range" min="0" max="180" value="90" id="slider2" name="slider2">
    <label id="value2"></label>
</div>
<p>Engine 3</p>
<div >
    <input type ="range" min="0" max="180" value="90" id="slider3" name="slider3">
    <label id="value3"></label>
</div>
<p>Engine 4</p>
<div >
    <input type ="range" min="0" max="180" value="90" id="slider4" name="slider4">
    <label id="value4"></label>
</div>
<p>Engine 5</p>
<div >
    <input type ="range" min="0" max="180" value="90" id="slider5" name="slider5">
    <label id="value5"></label>
</div>
<p>Engine 6</p>
<div >
    <input type ="range" min="0" max="180" value="90" id="slider6" name="slider6">
    <label id="value6"></label>
</div>
<div> 
    <input type="submit" value="Save"  id="save" name="save"> <input type="submit" value="Run" id="run" name="run">
    <br>
    <h2>Control Panel | Robot Base </h2>
        <hr></hr>
    
    <input type="submit" value="Move left" id="left" name="left"> <input type="submit" value="Move right" id="right" name="right">
    <br><input type="submit" value="Move forward" id="forward" name="forward"> <input type="submit" value="Move backward" id="backward" name="backward">
    <br><input type="submit" value="Stop" id="Stop" name="Stop">
</div>



   
    
    
    

<script>
    
   
   
    

    value.innerHTML =slider.value;
    value2.innerHTML =slider2.value;
    value3.innerHTML =slider3.value;
    value4.innerHTML =slider4.value;
    value5.innerHTML =slider5.value;
    value6.innerHTML =slider6.value;
   slider.oninput =function(){
    value.innerHTML =this.value;
   }
   slider2.oninput =function(){
    value2.innerHTML =this.value;

   }
   slider3.oninput =function(){
    value3.innerHTML =this.value;
   }
   slider4.oninput =function(){
    value4.innerHTML =this.value;

   }
   slider5.oninput =function(){
    value5.innerHTML =this.value;
   }
   slider6.oninput =function(){
    value6.innerHTML =this.value;

   }

    
   
   
</script>
</form>

<?php
$slider = $_POST["slider"];
$slider2 = $_POST["slider2"];
$slider3 = $_POST["slider3"];
$slider4 = $_POST["slider4"];
$slider5 = $_POST["slider5"];
$slider6 = $_POST["slider6"];
$conn = new mysqli("localhost", "root", "", "dbarm");
        if (isset($_POST["save"])){
            $stmt =$conn->prepare("UPDATE  engines SET Engine1='$slider', Engine2='$slider2', Engine3='$slider3', Engine4='$slider4', Engine5='$slider5', Engine6='$slider6'") ;
$stmt->execute();
echo "New record is inserted sucessfully";
        }


    
?>
<?php
if (isset($_POST["run"])){
    $stmt =$conn->prepare("UPDATE run SET RUN='On'");
    $stmt->execute();
            echo "Moving...";
}
?>
<?php
if (isset($_POST["left"])){
    $stmt =$conn->prepare("UPDATE robot_base SET direction='Left'");
    $stmt->execute();
            echo "Left";
}
if (isset($_POST["backward"])){
    $stmt =$conn->prepare("UPDATE robot_base SET direction='Backward'");
    $stmt->execute();
            echo "Backward";
}
if (isset($_POST["forward"])){
    $stmt =$conn->prepare("UPDATE robot_base SET direction='Forward'");
    $stmt->execute();
            echo "Forward";
}
if (isset($_POST["right"])){
    $stmt =$conn->prepare("UPDATE robot_base SET direction='Right'");
    $stmt->execute();
            echo "Right";
}
if (isset($_POST["Stop"])){
        $stmt =$conn->prepare("UPDATE robot_base SET direction='Stop'");
        $stmt->execute();
                echo "Stopped";
    }
?>



 

</body>
</html>