<?php
$con=mysqli_connect("localhost","pirokana","PrKAn03","pirokana");
  // Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   // Insert form fields
    $sql="INSERT INTO externalinput (application, category, coupling, mode, modulation, one_d, two_d, detection, remarks, ref, author, year, title)
 VALUES ('$_POST[application]','$_POST[category]','$_POST[coupling]','$_POST[mode]','$_POST[modulation]','$_POST[one_d]','$_POST[two_d]','$_POST[detection]','$_POST[remarks]','$_POST[ref]','$_POST[author]','$_POST[year]','$_POST[title]')";

 if (!mysqli_query($con,$sql))
   {
   die('Error: ' . mysqli_error($con));
   }
 //redirect to the same page
header("Location: insertdata-2dlc.html");
 mysqli_close($con);
 ?> 
