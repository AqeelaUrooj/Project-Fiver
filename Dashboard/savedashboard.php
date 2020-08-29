<?php

use function PHPSTORM_META\type;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aqeela";
$buttonIndex = 1;
$goBack=true;

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} {
    $c_node=array();
    $dispos=array();
    session_start();
    $per_var=$_SESSION['per_id'];
    
    foreach ($_GET as $key => $value) {
        $buttonIndex = 1;
        $qty = $_GET[$key];
       // echo "<br>key: " . $key . " value: " . $qty;
        foreach ($qty as $value) {
            if ($key == "id") {
                $c_node[$buttonIndex]=$value;
            $buttonIndex++;
               
                continue;
            }
            //if ($key != "timeout_time")
            {
                $value = "'" . $value . "'";
            }
            $keyname = $key;
           // echo "<br><br> key: $keyname  - Value: $value - I: $buttonIndex  - N: $c_node[$buttonIndex] <br>";
           
           // echo "null " . ($value == null) . "<br>";
            if ($value == null)
                $value = 1002;

                if($keyname=="btn1"  || $keyname=="btn2" || $keyname=="btn3")
                {
                   // echo var_dump($value);
                    if(strcmp($value,"'1002'")!=0)
                    {
                        array_push($dispos,$value);
                      
                    }  
                }

                if($keyname=="disposition")
                {
                    $per=$value;
                }


$sqltest="SELECT * FROM wordsandbuttons WHERE id=$c_node[$buttonIndex]";
//echo "<br>Test: ".$sqltest."<br>";          
$qry = mysqli_query($con, $sqltest);
            $rowCheck = mysqli_num_rows($qry);
            
            $f_dis=$c_node[$buttonIndex];
            if ($rowCheck > 0) { // if data exist update the data
                $sql = "UPDATE wordsandbuttons SET `$keyname`=$value WHERE `id`=$c_node[$buttonIndex]";
                //echo "<br>". $sql."<br>";
                $qry = mysqli_query($con, $sql);
                $querytype = "update";
            } else { // insert the data if data is not exist
                
                //echo "ID=".$f_dis;
                if ($keyname != "ButtonIndex")
                    
                    $sql =  "INSERT INTO wordsandbuttons (id,$keyname) VALUES($c_node[$buttonIndex],$value)";
                else
                    $sql =  "INSERT INTO wordsandbuttons ($keyname) VALUES($value)";
  //              echo "<br>Try: ". $sql."<br>";
                
                $qry = mysqli_query($con, $sql);
                $querytype = "insert";
            }
            

            if ($qry === TRUE) {
    //            echo $querytype . " successfull <br>" . $sql . "<br>";
            } else {
               // echo "hi";
                $goBack=false;
              //  echo "Error: " . $sql . "<br>" . $con->error;
            }

            $buttonIndex++;
        }
    }
    
    $dis=end($dispos);
    
    $sql1 =  "UPDATE wordsandbuttons SET `last_button_status`=$dis WHERE `id`=$f_dis";
    $qry1 = mysqli_query($con, $sql1);
    $sql2 =  "UPDATE form SET `Disposition`=$per WHERE `idd`=$per_var";
    $qry2 = mysqli_query($con, $sql2);
}

$con->close();

if($goBack){
     echo "<script>location.href='index.php';</script>";
}
