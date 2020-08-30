<?php

echo $fname;
if($fname!=$_SESSION['check'])
{
$_SESSION['check']=$fname;
$res=str_split($fname, 1);

//echo (count($res));

 // First File: (Google speech)
$mp3 = new mp3('..\soundboardhi\tracks\ABC-Alphabets\\'.$res[0].'.mp3');
$mp3->striptags();

 //Second file
 for($i=1 ; $i<count($res) ;$i++)
 {
    $second = new mp3('..\soundboardhi\tracks\ABC-Alphabets\\'.$res[$i].'.mp3');
    $mp3->mergeBehind($second);
    $mp3->striptags();
 }
$name="merge".rand();
$mp3->savefile('..\soundboardhi\tracks\ABC-Alphabets\\'.$name.'.mp3'); //Output file (current a blank file)
//$mp3->savefile('..\soundboardhi\tracks\ABC-Alphabets\merge.mp3'); //Output file (current a blank file)

//$_SESSION['file']=$name;

}
//echo $_SESSION['file'];
?>