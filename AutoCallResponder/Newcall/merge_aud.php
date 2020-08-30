<?php
function call_merge( $label , $randm)
{
$res=str_split($label, 1);

 // First File: (Google speech)
$mp3 = new mp3('..\soundboardhi\tracks\ABC-Alphabets\\'.$res[0].'.mp3');
$mp3->striptags();

 //Second file
 for($i=1 ; $i<count($res) ;$i++)
 {
    if($res[$i]!=" ")
    {
    $second = new mp3('..\soundboardhi\tracks\ABC-Alphabets\\'.$res[$i].'.mp3');
    $mp3->mergeBehind($second);
    $mp3->striptags();

    $mp3->savefile('..\soundboardhi\tracks\output\\'.$randm.'.mp3'); //Output file (current a blank file)
    }
}
}


if($valy['fname']!=null && $valy['lname']!=null)
{
 $name=array();  
foreach($valy as $key => $value){
      if($key=="fname")
      {
         $randm="fname".rand();

      }
      elseif($key=="lname")
      {
         $randm="lname".rand();

      }
      call_merge($value,$randm);
      array_push($name,$randm);

  }



}

?>