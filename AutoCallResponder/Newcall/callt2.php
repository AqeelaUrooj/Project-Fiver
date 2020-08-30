<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- <script src="call.js"></script> -->
    <script src="js/jquery.js"></script>
    
    
    <title>Customer Data</title>
<style>

.spk{
  color:white;
  background:#03A46B;
}
.spk:focus{
  color:white;
  background:#EA6E63;
}

  </style>

  </head>
  <body style="background-color:#77C4F3;">
  
  
<?php

  include('get_det.php');  
 
$valy=array();

 ?>

      <br>
      <br>
      <div id="error" style="position:absolute; left:11%;   z-index:10; width:40%;">
          </div>
    <div class="container-fluid" style="height:100%; background-color:white; padding:1% ">
        
    <div class="row"> <!--Row 0-->
            <div class="col">
            
            <!-- <input type="file" id="fileUpload" />
            <input type="button" id="upload" class="btn btn-primary" value="Upload" onclick="Upload()" >
            </div> --><?php $_SESSION['per_id']=$send[$i][$arr2[0]]; ?>
            <!-- <a href="#" add target="_blank" id="s_call" class="btn btn-primary text-white"  >Start Call</a> -->
      
          </div>
          

            <div class="col">
                
            
           <input type="button" id='AddButton' class="btn btn-success" value="Load Data" />         
             Remaining Data :
                  <input id="remaining" value="<?php echo count($send)-$i-1; ?>">
                

            </div>
    </div> <!--Row 0 closed-->
  <br>
    

        
        
<div class="fluid-container" style="height: 40%;">

<form method="post">
<div class="row"> <!--Row 0-->
<div class="col-md-2"></div>
            <div class="col-md-4" >
              
            <input type="text" class="form-control" id="search" name="text"/>
            </div>
            <div class="col-md-3">
            <select class="form-control" name="option">
                <option value="idd">ID</option>
                <option value="Zip">ZIP</option>
                <option value="County">Country</option>
                <option value="Province">Province</option>
              </select>            </div>

            <div class="col-md-2">
            <input type="submit" class="form-control btn btn-info" name="search" value="Search" />
          </div>
</div>
</form>
<br>

  <div class="form-group row">  <!--Row 1-->
    <div class="col-sm-2">
      
    <button type="button" name="speakf" id="speakf"  class="btn btn-default spk form-control" >Spell First Name</button>
    
   
    
   
    </div>


    <label for="colFormLabel" class=" col-sm-1 col-form-label">ID</label>
    <div class="col-sm-1">
      <input type="text" class="form-control" id="ide" value="<?php echo $send[$i][$arr2[0]]; ?>" >
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">FirstName</label>
    <div class="col-sm-2">
      <input  class="form-control" id="fname" value="<?php $valy['fname']=$send[$i][$arr2[1]]; echo $send[$i][$arr2[1]]; ?>" >
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label" >MI</label>
    <div class="col-sm-1">
      <input  class="form-control" id="mi" value="<?php echo $send[$i][$arr2[2]]; ?>" >
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">LastName</label>
    <div class="col-sm-2">
      <input  class="form-control" id="lname" value="<?php $valy['lname']=$send[$i][$arr2[3]]; echo $send[$i][$arr2[3]]; ?>">
    </div>
  </div>                        <!--Closed-->

  <div class="form-group row">  <!--Row 2-->
    <div class="col-sm-2">
       
    <button type="button" name="speakl" id="speakl" class="btn spk form-control" >Spell Last Name</button>

    
    </div>


    <label for="colFormLabel" class="col-sm-1 col-form-label">Address=1</label>
    <div class="col-sm-9">
      <input  class="form-control" id="address1" value="<?php echo $send[$i][$arr2[4]]; ?>">
    </div>

    
  </div>                        <!--Closed-->

  <div class="form-group row">  <!--Row 3-->
  <div class="col-sm-2">
    <button type="button" name="speakz" id="speakz" class="btn spk form-control" >Spell Zip Code</button>

    </div>



    <label for="colFormLabel" class="col-sm-1 col-form-label">Address=2</label>
    <div class="col-sm-4">
      <input  class="form-control" id="address2" >
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">Address=3</label>
    <div class="col-sm-4">
      <input  class="form-control" id="address3" >
    </div>
  </div>                        <!--Closed-->

  <div class="form-group row">  <!--Row 4-->
  <div class="col-sm-2">
</div>
    <label for="colFormLabel" class="col-sm-1 col-form-label">City</label>
    <div class="col-sm-2">
      <input  class="form-control" id="city" value="<?php echo $send[$i][$arr2[5]]; ?>">
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">State</label>
    <div class="col-sm-2">
      <input  class="form-control" id="state" value="<?php echo $send[$i][$arr2[6]]; ?>">
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">Province</label>
    <div class="col-sm-3">
      <input  class="form-control" id="prov" value="<?php echo $send[$i][$arr2[7]]; ?>">
    </div>
  </div>                        <!--Closed-->

  <div class="form-group row">  <!--Row 5-->
    <label for="colFormLabel" class="col-sm-1 col-form-label"></label>
    <div class="col-sm-1">
      
    </div>


    <label for="colFormLabel" class="col-sm-1 col-form-label">Country</label>
    <div class="col-sm-2">
      <input  class="form-control" id="country" value="<?php echo $send[$i][$arr2[8]]; ?>">
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">Zip</label>
    <div class="col-sm-2">
      <input  class="form-control" id="zip" value="<?php $valy['zip']=$send[$i][$arr2[9]]; echo $send[$i][$arr2[9]]; ?>">
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">CreditRating</label>
    <div class="col-sm-3">
      <input  class="form-control" id="crating" value="<?php echo $send[$i][$arr2[10]]; ?>">
    </div>
  </div>                        <!--Closed-->

  <div class="form-group row">  <!--Row 6-->
    <label for="colFormLabel" class="col-sm-1 col-form-label"></label>
    <div class="col-sm-1">
      
    </div>


    <label for="colFormLabel" class="col-sm-1 col-form-label">Phone</label>
    <div class="col-sm-2">
      <input type="number" class="form-control" id="phone" value="<?php echo $send[$i][$arr2[11]]; ?>">
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">DialCode</label>
    <div class="col-sm-2">
      <input  class="form-control" id="dcode" value="<?php echo $send[$i][$arr2[12]]; ?>">
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">Alt/phone</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" id="altphone" value="<?php echo $send[$i][$arr2[13]]; ?>">
    </div>
  </div>                        <!--Closed-->

  <div class="form-group row">  <!--Row 7-->
    <label for="colFormLabel" class="col-sm-1 col-form-label"></label>
    <div class="col-sm-1">
      
    </div>


    <label for="colFormLabel" class="col-sm-1 col-form-label">Show</label>
    <div class="col-sm-4">
      <input  class="form-control" id="show" value="<?php echo $send[$i][$arr2[14]]; ?>">
    </div>

    <label for="colFormLabel" class="col-sm-1 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" value="<?php echo $send[$i][$arr2[15]]; ?>">
    </div>
  </div>                        <!--Closed-->

  <div class="form-group row">  <!--Row 8-->
    <label for="colFormLabel" class="col-sm-1 col-form-label"></label>
    <div class="col-sm-1">
      
    </div>


    <label for="colFormLabel" class="col-sm-1 col-form-label">Comments</label>
    <div class="col-sm-9">
      <textarea class="form-control" id="comm" value="<?php echo $send[$i][$arr2[16]]; ?>"></textarea>
    </div>

    
  </div>                        <!--Closed-->





</div>
<div class="fluid-container" style="height: 50%;">
</div>
        </div>


        <br>
        <br>
           <div>
           <?php
            
            include('merge_aud.php');  
            print_r($valy);
            print_r($name);
            

            ?>        
 
       <script src="js/bootstrap.min.js"></script>
  
       <script>

         var fname=<?php echo json_encode($name[0]); ?>;
        var lname=<?php echo json_encode($name[1]); ?>;
        var zip=<?php echo json_encode($name[2]); ?>;


       </script>
       <script src="call3.js"></script>



       <script>
 $(document).ready(function(){

  
 $('#AddButton').click( function() {
     
        
     counter=<?php  echo json_encode($_SESSION['id']);   ?>;

         // $('#TextBox').val(counter++);
         
         counter++;
         document.location.href = "callt2.php?id="+encodeURIComponent(counter);
         
        
 });
  


 });
</script>
  </body>
</html>