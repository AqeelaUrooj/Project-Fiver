<?php
function call_merge( $label , $randm , $folder)
{
$res=str_split($label, 1);

 // First File: (Google speech)
$mp3 = new mp3('..\soundboardhi\tracks\\'.$folder.'\\'.$res[0].'.mp3');
$mp3->striptags();

 //Second file
 for($i=1 ; $i<count($res) ;$i++)
 {
    if($res[$i]!=" ")
    {
    $second = new mp3('..\soundboardhi\tracks\\'.$folder.'\\'.$res[$i].'.mp3');
    $mp3->mergeBehind($second);
    $mp3->striptags();

    $mp3->savefile('..\soundboardhi\tracks\output\\'.$randm.'.mp3'); //Output file (current a blank file)
    }
}
}
$name=array();
//for alphabets
if($valy['fname']!=null && $valy['lname']!=null)
{
   
foreach($valy as $key => $value){
      if($key=="fname")
      {
         $randm="fname".rand();
         call_merge($value,$randm,"ABC-Alphabets");

      }
      elseif($key=="lname")
      {
         $randm="lname".rand();
         call_merge($value,$randm,"ABC-Alphabets");

      }
      elseif($key=="zip")
      {
         $randm="zip".rand();
         call_merge($value,$randm,"Numberings");
      }
      
      array_push($name,$randm,);

  }

 
   
      
      
  


  


   }

?>