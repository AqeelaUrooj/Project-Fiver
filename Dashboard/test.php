<?php

$data=fopen("C:\Users\Dell\OneDrive\Pictures\Saved pictures\TestFile.csv","r");



//print_r($da);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aqeela";


// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
$i=0;
$arr=array("Idd" , "FirstName" , "MI" , "LastName" , "Phone" , "Address" , "City" , "State" , "County" , "Zip" , "Age" , "BirthMonth" , "Income" , "HomeOwner" , "Married" , "Property" , "Networth" , "Household" , "CraditRating" , "DwellingType" , "PoliticalDonor" , "Ethnicity" , "LanguageSpoken" , "Email" , "lat" , "lng" , "Disposition" , "NoofTimeThisFilebeingcalled" ,"LastDialedOn" , "RecordingLink");

while($da=fgetcsv($data))
{
    $stat=true;
   for($i=0 ;$i<30;$i++)
   {
       
       if($stat){
        $id=$da[$i];
        $send=mysqli_real_escape_string($con,$da[$i]);
        $que="Insert into form ($arr[$i]) values ('$send')"; 
        $qry = mysqli_query($con, $que);
        $stat=false;


       }
       else{
       $send=mysqli_real_escape_string($con,$da[$i]);
       $que="UPDATE form SET `$arr[$i]`='$send' WHERE `idd`=$id"; 
       $qry = mysqli_query($con, $que);
       }
       

   }

   


}

echo $send;




?>
