<?php

//getting data from database
$conn = mysqli_connect("localhost","root","jatt","company");

//Check connection 
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// getting data from employees table
$result = mysqli_query($conn, "SELECT * FROM  employees");

//storing in array
$data = array();
while ($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
    
}

// returning response in JSON format

echo json_encode($data);