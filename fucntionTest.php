<?php
//Get the file
    $file=('test.txt');
    $readFile=fopen($file,'r');
    $string=file_get_contents($file);
    $myArray=explode("\n",$string);

 

//loop to divide the $myarray into two array like $value, $student_id
   for($i=0;$i<sizeof($myArray);$i++){
       $values[]=substr($myArray[$i],strlen($myArray[$i])-3);
       $student_id[]=substr($myArray[$i],0,-3);
   }


 
//calculate average marks
$totalNumber=count($values);
$averageMarks=(array_sum($values))/$totalNumber;


echo "<h4>Average Mark is : ".(round($averageMarks,2))." </h4>";


//count total student got greater than 80
$count=0;
 for($i=0;$i<sizeof($myArray);$i++){
    $values[]=substr($myArray[$i],strlen($myArray[$i])-3);
     if($values[$i]>=80){
         $count++;
     }
   }

echo "<h4>Numbers of student scored greater or equal 80 : ".$count."</h4>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="fucntionTest.php" method="post">
        Enter student ID: <input type="text" name="id">
        <input type="submit" name="submit" value="Show grade"/>
    </form>
    <?php 
    
        if(isset($_POST['submit'])){
        if (in_array($_POST['id'],$student_id) || in_array($_POST['id'].' ',$student_id))
          {
            $index= array_search($_POST['id'].' ',$student_id);
            //echo "<h3>Show Grade : ".$values[$index]."</h3>";
            if($values[$index]>=90){
                echo "<h3>Show Grade : A+</h3>";
            }else if($values[$index]>=70 && $values[$index]<=89 ){
                echo "<h3>Show Grade : B+</h3>";
            }else if($values[$index]>=50 && $values[$index]<=69){
                echo "<h3>Show Grade : C+</h3>";
            }else if($values[$index]<50){
                echo "<h3>Show Grade : F</h3>";
            }

          }
            else
          {
          echo "<h4>Student not found</h4>";
          }
        //echo "Show Grade: ".$values[$index];
    
        }
        ?>
</body>
</html>