<?php
class mp3{
    var $str;
    var $time;
    var $frames;

    // Save the new mp3 into the file system
    function savefile($path){
        return file_put_contents($path, $this->str);
    }
    // Create a new mp3
    function mp3($path="")
    {
    if($path!="")
        {
        $this->str = file_get_contents($path);
        }
    }

    // Put an mp3 behind the first mp3
    function mergeBehind($mp3){
        $this->str .= $mp3->str;
    }

    // Calculate where's the end of the sound file
    function getIdvEnd(){
        $strlen = strlen($this->str);
        $str = substr($this->str,($strlen-128));
        $str1 = substr($str,0,3);
        if(strtolower($str1) == strtolower('TAG')){
            return $str;
        }else{
            return false;
        }
    }

    // Calculate where's the beginning of the sound file
    function getStart(){
        $strlen = strlen($this->str);
        for($i=0;$i<$strlen;$i++){
            $v = substr($this->str,$i,1);
            $value = ord($v);
            if($value == 255){
                return $i;
            }
        }
    }

    // Remove the ID3 tags
    function striptags(){
        //Remove start stuff...
        $newStr = '';
        $s = $start = $this->getStart();
        if($s===false){
            return false;
        }else{
            $this->str = substr($this->str,$start);
        }
        //Remove end tag stuff
        $end = $this->getIdvEnd();
        if($end!==false){
            $this->str = substr($this->str,0,(strlen($this->str)-129));
        }
    }

    // Display an error
    function error($msg){
        //Fatal error
        die('<strong>audio file error: </strong>'.$msg);
    }

     // Send the new mp3 to the browser
    function output($path){
        //Output mp3
        //Send to standard output
        if(ob_get_contents())
            $this->error('Some data has already been output, can\'t send mp3 file');
        if(php_sapi_name()!='cli'){
            //We send to a browser
            header('Content-Type: audio/mpeg3');
            if(headers_sent())
                $this->error('Some data has already been output to browser, can\'t send mp3 file');
            header('Content-Length: '.strlen($this->str));
            header('Content-Disposition: attachment; filename="'.$path.'"');
        }
    echo $this->str;
    return '';
    }
}

//-----------------------------------------------------------------------------------

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aqeela";
$arr=array("idd","fname","mi","lname","address1","address2","address3","city","state","province","country","zip","phone","dialcode","altphone","show","credit","email","comment");
$arr2=array("idd" , "FirstName" , "MI" , "LastName", "Address" , "City" , "State" ,"Province", "County" , "Zip" ,"CraditRating" ,"Phone" ,"DialCode","Altphone","Show_",  "Email","Comments");
session_start();
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} {

$send=array();

if(isset($_POST['option']) && ($_POST['text'])!=null  )
{

  $que="Select Count(*) as data from form where ".$_POST['option']." =  '".$_POST['text']."'";
  
  $run=mysqli_query($con,$que);
  $data=mysqli_fetch_assoc($run);
  if($data['data']==0)
  {
    echo "<script>
    $(document).ready(function(){
    $('#error').addClass('alert alert-danger text-center').text('No Results Found').fadeOut(5000);
    });
    </script>";
    $que="Select * from form";
    $run=mysqli_query($con,$que);
  }
  else
  {
    echo "<script>
    $(document).ready(function(){
    $('#error').addClass('alert alert-success text-center').text('Searching Completed').fadeOut(5000);
    });
    </script>";
    $que="Select * from form where ".$_POST['option']." =  '".$_POST['text']."'";
    $run=mysqli_query($con,$que);
  }
}
else{

  $que="Select * from form";
  $run=mysqli_query($con,$que);
}
if($run)
{
  while($data= mysqli_fetch_assoc($run))
  {
      array_push($send,$data);
  }
  }
 

}








 
$fname='';
$i=0;

$_SESSION['id']=0;

  if(isset($_GET['id']))
{
    $files = glob('..\soundboardhi\tracks\output\*'); // get all file names
    foreach($files as $file){ // iterate files
         if(is_file($file))
        unlink($file); // delete file
        }
    $_SESSION['id']=$_GET['id'];
    $i=$_SESSION['id'];
   if($_SESSION['id']>count($send)-1)
    {
      $_SESSION['id']=0;
    }
  //  echo "<script>window.location.replace('test1.php');</script>";
    
}
//-------------------------------------------------------------------------------------------------

?>