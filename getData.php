<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php
$conn =new mysqli("localhost", "root", "","dbarm");
$stmt= $conn->prepare("select * from engines");
$stmt->execute();
$result = $stmt->get_result();
echo "<table border=>";
while($row =$result->fetch_assoc()) {
    echo "<tr><td>"."Engine1: ".$row['Engine1']."</td><td>"."Engine2: ".$row['Engine2']."</td><td>"."Engine3: ".$row['Engine3']."</td><td>"."Engine4: ".$row['Engine4']."</td><td>"."Engine5: ".$row['Engine5']."</td><td>"."Engine6: ".$row['Engine6']."</td></tr>";

}
$conn2 =new mysqli("localhost", "root", "","dbarm");
$stmt2= $conn->prepare("select * from run");
        $stmt2->execute();
        
         $rs=$stmt2->get_result();
         while($row=$rs->fetch_assoc()){
             
             echo "<br>"."Status: ".$row["RUN"];
         }
         $conn3 =new mysqli("localhost", "root", "","dbarm");
$stmt3= $conn->prepare("select * from robot_base ");
        $stmt3->execute();
        
         $rs=$stmt3->get_result();
         while($row=$rs->fetch_assoc()){
             
             echo "<br>"."Move: ".$row["direction"];
         }
        
echo"</table>"
?>


</body>

</html>
        