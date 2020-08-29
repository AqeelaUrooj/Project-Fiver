
// gets the center of a table cell relative to the document
function getCellCenter(table, row, column) {
  var tableRow = $(table).find('tr')[row];
  var tableCell = $(tableRow).find('td')[column];

  var offset = $(tableCell).offset();
  var width = $(tableCell).innerWidth();
  var height = $(tableCell).innerHeight();
  return {
    x: offset.left,
    y: offset.top + height/2
  }
}
function replaceAll(string, search, replace) {
  return string.split(search).join(replace);
}
var place=0;
// draws an arrow on the document from the start to the end offsets
function drawArrow(start, end) {
place+=20;
if(place>122)place=0;
start.x+=place;
//start.y+=place;
//end.y+=place;
end.x+=place;

  // create a canvas to draw the arrow on
  var canvas = document.createElement('canvas');
  canvas.width = $('body').innerWidth();
  canvas.height = $('body').innerHeight();
  $(canvas).css('position', 'absolute');
  $(canvas).css('pointer-events', 'none');
  $(canvas).css('top', '0');
  $(canvas).css('left', '0');
  $(canvas).css('opacity', '0.85');
  $('body').append(canvas);
  
  // get the drawing context
  var ctx = canvas.getContext('2d');
  ctx.fillStyle = '#'+(place*3);
  ctx.strokeStyle = '#'+(place*4);
  
  // draw line from start to end
  ctx.beginPath();
  ctx.moveTo(start.x, start.y);
  ctx.lineTo(end.x, end.y);
  ctx.lineWidth = 2;
  ctx.stroke();
  
  // draw circle at beginning of line
  ctx.beginPath();  
  ctx.arc(start.x, start.y, 4, 0, Math.PI * 2, true);
  ctx.fill();

  // draw pointer at end of line (needs rotation)
  ctx.beginPath();  
  var angle = Math.atan2(end.y - start.y, end.x - start.x);
  ctx.translate(end.x, end.y);
  ctx.rotate(angle);
  ctx.moveTo(0, 0);
  ctx.lineTo(-10, -7);
  ctx.lineTo(-10, 7);
  ctx.lineTo(0, 0);
  ctx.fill();

  // reset canvas context
  ctx.setTransform(1, 0, 0, 1, 0, 0);  
  
  return canvas;
}

// finds the center of the start and end cells, and then calls drawArrow
function drawArrowOnTable(table, startRow, startColumn, endRow, endColumn) {
  drawArrow(
    getCellCenter($(table), startRow, startColumn),
    getCellCenter($(table), endRow, endColumn)
  );
}
arrowArray=[];
function doArrow(){
  console.log(arrowArray);
  place=0;
  for(let j=1;j<arrowArray.length; j++)
  {
    let rowNum=0;
  for(let i=0;i<arrowArray.length; i++)
  {
   let ac=arrowArray[i][0], aa=arrowArray[i][1], ab=arrowArray[i][2] ;
   let bc=arrowArray[j][0], ba=arrowArray[j][1], bb=arrowArray[j][2] ;

   if(aa!="" && aa!=0 && i!=j)
    if(aa==bb){
    console.log("matched",ac,aa,ab, "\t", bc, ba, bb );
    drawArrowOnTable('table', ac,1, bc,1);
  }
  }
  }
}

function onReasonChange(elem){
  let relation=elem.value;
  let tr=elem.parentElement.parentElement;
  let elemtxt=elem.parentElement.previousSibling.firstElementChild;
  let elem0=elem.parentElement.previousSibling.previousSibling.firstElementChild;
  let elemtxt2=elem.parentElement.nextSibling.firstElementChild;
  console.log('change', elem0);

  if(relation==0){
    elemtxt.outerHTML=elemtxt.outerHTML;
     elemtxt=elem.parentElement.previousSibling.firstElementChild;
      elemtxt.addEventListener('click', function (){
        let ci=this.parentElement.previousSibling.firstElementChild.value;   
        let ei=tr.getAttribute('arrowid');   
        addrow(ci, null, 1002,1002,1002, 1002, 20, ++totalnodes, totalnodes, totalnodes,1);
        console.log('ci',ci,ei, totalRows, totalnodes);   
        //drawArrowOnTable('table', ei,1,totalnodes,1);
         });
          elemtxt.disabled=false;
         elemtxt.innerText = 'Create Child';
         elemtxt2.hidden=false;
         elem0.hidden=false;
        }else{
          elemtxt.disabled=true;
          elem0.hidden=true;
          elem0.value='';;

          }
        
         if(relation==1){
         tr.title='Node Cant create childs because Its Child';
          elemtxt.innerText = 'Its Child';
         elemtxt2.hidden=false;
        }
        else if(relation==2){
         tr.title='Node Cant create childs because Its Universal';
          elemtxt.innerText = 'Its Universal';
          if(elemtxt2.value.length>3)
          elemtxt2.value="";
          elemtxt2.hidden=true;
        }
}


<?php
//echo "pronting<br>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aqeela";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *,CONVERT(SUBSTRING_INDEX(parent_of, '&', 1), UNSIGNED INTEGER) as result FROM wordsandbuttons ORDER BY result";
$result = $conn->query($sql);

$js = "

buttonslength = 49;
    function tableCreate() {
        var body = document.getElementById('dashboard');
        var tbl = document.createElement('table');
        tbl.style.width = '100%';
        tbl.setAttribute('border', '0');
        var tbdy = document.createElement('tbody');
      
        var tr = document.createElement('tr');
  
        
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'ID:';
        th.appendChild(elemtxt);
        tr.appendChild(th);

        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Child:';
        th.appendChild(elemtxt);
        tr.appendChild(th);
    
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Level:';
        th.title='can be used for rebuttal or any kind of query which is NOT Child of any OR NOT related to !when! it is said';
        th.appendChild(elemtxt);
        tr.appendChild(th);
        
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Child Of:';
        th.appendChild(elemtxt);
        tr.appendChild(th);
    
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Voice Command:';
        th.appendChild(elemtxt);
        tr.appendChild(th);
    
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Button1:';
        th.appendChild(elemtxt);
        tr.appendChild(th);
       
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Button2:';
        th.appendChild(elemtxt);
        tr.appendChild(th);
      
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Button3:';
        th.appendChild(elemtxt);
        tr.appendChild(th);
    
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Timeout:';
        th.appendChild(elemtxt);
        tr.appendChild(th);

        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Disposition:';
        th.appendChild(elemtxt);
        tr.appendChild(th);
    
        var th = document.createElement('th');
        var elemtxt = document.createElement('label');
        elemtxt.innerText = 'Button:';
        th.appendChild(elemtxt);
        tr.appendChild(th);
        tbdy.appendChild(tr);
        
        

        tbdy.appendChild(tr);
        tbl.appendChild(tbdy);
        body.appendChild(tbl);
        totalnodes = 0;";

// output data of each row
if ($result->num_rows > 0) {
  $count=0; 
  while ($row = $result->fetch_assoc()) {
      $count++;  
    $js = $js . "\n addrow('" . $row["parent_of"] . "', '" . $row['txt'] . "', '" . $row['btn1'] . "','" . $row['btn2'] . "','" . $row['btn3'] . "','" . $row["timeout_btn"] . "', '" . $row["timeout_time"] . "','" . $row['node_id']  . "', '" . $row['id']  . "', " . $count  . ", '" . $row["relation"] . "', '" . $row["disposition"] . "');
      //  arrowArray.push([$count," . $row["node_id"].',replaceAll(replaceAll(replaceAll(replaceAll("'. $row['parent_of'].'", "&",""),"must",""),"forget",""),"check next","")] );
document.getElementById("createnode").hidden=true;
      totalnodes++;';
    }
}

$js = $js . "}
var totalRows=0;
function addrow(parent_of, txt, btn1,btn2,btn3, timeout_btn, timeout_time, i, arrowid,id, relation,disposition) {
    totalRows++;
     console.log('addrow',parent_of, txt, btn1,btn2,btn3, timeout_btn, timeout_time, i, arrowid, id, relation,disposition);

    var tr = document.createElement('tr');
    tr.setAttribute('arrowid',arrowid);
  
    var th = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.value = id;
    th.hidden = true;
    elemtxt.name = 'id[' + arrowid + ']';
    elemtxt.style.width = '50px';
    th.appendChild(elemtxt);
    tr.appendChild(th);


     th = document.createElement('td');
    elemtxt = document.createElement('input');
   // th.hidden = true;
    elemtxt.name = 'node_id[' + arrowid + ']';
    elemtxt.style.width = '50px';
    tr.setAttribute('parent', i);
    elemtxt.value = i;
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var th = document.createElement('td');
    var elemtxt = document.createElement('button');
    elemtxt.className='btn';
    elemtxt.type='button';
  
    th.appendChild(elemtxt);
    tr.appendChild(th);

    //Relation
    var td = document.createElement('td');
    var elemtxt = document.createElement('select');
    elemtxt.name = 'relation[' + arrowid + ']';
    elemtxt.class = 'form-control';
    elemtxt.addEventListener('change', function (){
      onReasonChange(this);
    });
    var option = document.createElement('option');
    option.value = 0;
    option.selected = true;
    option.text = 'Parent';
    option.title = 'Parent. Type its parent id in Child Of';
    elemtxt.appendChild(option);

    elemtxt.appendChild(option);
    var option = document.createElement('option');
    option.value =1;// '&forget';
    option.text = 'Child';
    option.title = 'Child with no node id. Type its parent id in Child Of';
    elemtxt.appendChild(option);

    var option = document.createElement('option');
    option.value =2//= 'must&forget';
    option.text = 'Universal';
    option.title = 'Always Answer Same: A Question which has always same answer. can be used for rebuttals';
    elemtxt.appendChild(option);
    elemtxt.value = relation;
    td.appendChild(elemtxt);
    tr.appendChild(td);
   var relationLink=elemtxt;
    //END Relation

    var th = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.class = 'form-control';
    elemtxt.name = 'parent_of[' + arrowid + ']';
    elemtxt.style.width = '50px';
    elemtxt.value = parent_of;
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var td = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.class = 'form-control';
    elemtxt.name = 'txt[' + arrowid + ']';
    elemtxt.value = txt;
    td.appendChild(elemtxt);
    tr.appendChild(td);

    //button1:
  for(j=1;j<=3;j++){
  
    var td = document.createElement('td');
    var elemtxt = document.createElement('select');
    elemtxt.name = 'btn'+j+'['+arrowid+']';
    elemtxt.class = 'form-control';
    var option = document.createElement('option');
    option.value = '1002';
    option.selected = true;
    option.text = 'No Button';
    elemtxt.appendChild(option);

    var option = document.createElement('option');
    option.value = '999';
    option.text = 'Start Call';
    elemtxt.appendChild(option);

    elemtxt.appendChild(option);
    var option = document.createElement('option');
    option.value = '1000';
    option.text = 'Hold Call';
    elemtxt.appendChild(option);
    
    elemtxt.appendChild(option);
    var option = document.createElement('option');
    option.value = '1001';
    option.text = 'End Call';
    elemtxt.appendChild(option);
    
    elemtxt.appendChild(option);
    var option = document.createElement('option');
    option.value = '1003';
    option.text = 'Transfer Call';
    elemtxt.appendChild(option);

    for (var ii = 0; ii < buttonslength; ii++) {
        var option = document.createElement('option');
        option.value = ii;
        option.text = 'Button ' + (ii + 1);
        elemtxt.appendChild(option);
    }
    var btn=btn1;
    if(j==2)btn=btn2;
    if(j==3)btn=btn3;

    elemtxt.value = btn;
    td.appendChild(elemtxt);
    tr.appendChild(td);
}
//button1 end

    var td = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.class = 'form-control';
    elemtxt.name = 'timeout_time[' + arrowid + ']';
    elemtxt.value = timeout_time;
    elemtxt.style.width = '50px';
    td.appendChild(elemtxt);
    tr.appendChild(td);

    var td = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.class = 'form-control';
    elemtxt.name = 'disposition[' + arrowid + ']';
    elemtxt.value = disposition;
    td.appendChild(elemtxt);
    tr.appendChild(td);

    var td = document.createElement('td');
    var elemtxt = document.createElement('select');
    elemtxt.name = 'timeout_btn[' + arrowid + ']';
    elemtxt.class = 'form-control';
    var option = document.createElement('option');
    option.value = 1002;
    option.selected = true;
    option.text = 'No Button';
    
    elemtxt.appendChild(option);
    var option = document.createElement('option');
    option.value = 999;
    option.text = 'Start Call';
    elemtxt.appendChild(option);

    elemtxt.appendChild(option);
    var option = document.createElement('option');
    option.value = 1000;
    option.text = 'Hold Call';
    elemtxt.appendChild(option);
    
    elemtxt.appendChild(option);
    var option = document.createElement('option');
    option.value = 1001;
    option.text = 'End Call';
    elemtxt.appendChild(option);
        
    elemtxt.appendChild(option);
    var option = document.createElement('option');
    option.value = 1003;
    option.text = 'Transfer Call';
    elemtxt.appendChild(option);

    for (var ii = 0; ii < buttonslength; ii++) {
        var option = document.createElement('option');
        option.value = (ii);
        option.text = 'Button ' + (ii + 1);
        elemtxt.appendChild(option);
    }
    
    elemtxt.value = timeout_btn;
    td.appendChild(elemtxt);
    tr.appendChild(td);

    

    document.getElementsByTagName('tbody')[0].appendChild(tr);
    onReasonChange(relationLink);

}
tableCreate();
//doArrow();
document.getElementById('createnode').addEventListener('click', function () {
document.getElementById('createnode').hidden=true;
addrow('0', '', 1002,1002,1002, 1002, 20, ++totalnodes,totalnodes,totalnodes,0,'');
});

";

echo $js;


$conn->close();
