buttonslength = 49;
function tableCreate() {
    var body = document.getElementById('dashboard');
    var tbl = document.createElement('table');
    tbl.style.width = '100%';
    tbl.setAttribute('border', '1');
    var tbdy = document.createElement('tbody');


    var tr = document.createElement('tr');

    var th = document.createElement('th');
    var elemtxt = document.createElement('label');
    elemtxt.innerText = 'NODE ID:';
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var th = document.createElement('th');
    var elemtxt = document.createElement('label');
    elemtxt.innerText = 'Parent of:';
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var th = document.createElement('th');
    var elemtxt = document.createElement('label');
    elemtxt.innerText = 'Voice Command:';
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var th = document.createElement('th');
    var elemtxt = document.createElement('label');
    elemtxt.innerText = 'Button:';
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var th = document.createElement('th');
    var elemtxt = document.createElement('label');
    elemtxt.innerText = 'Timeout:';
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
    totalnodes = 0;
    for (var i = 1; i < 2; i++) {
        var parent_of = 'must';
        var txt = 'text';
        var btn = '1';
        var timeout_time = 20;
        var timeout_btn = '4';
        addrow(parent_of, txt, btn, timeout_btn, timeout_time, i);
        totalnodes++;
    }


}
function addrow(parent_of, txt, btn, timeout_btn, timeout_time, i) {
    console.log(parent_of, txt, btn, timeout_btn, timeout_time, i);

    var tr = document.createElement('tr');
    var th = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.value = i;
    th.hidden = true;
    elemtxt.name = 'node_id[' + i + ']';
    elemtxt.value = i;
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var th = document.createElement('th');
    var elemtxt = document.createElement('label');
    elemtxt.innerText = 'ID: ' + (i);
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var th = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.class = 'form-control';
    elemtxt.name = 'parent_of[' + i + ']';
    elemtxt.value = parent_of;
    th.appendChild(elemtxt);
    tr.appendChild(th);

    var td = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.class = 'form-control';
    elemtxt.name = 'txt[' + i + ']';
    elemtxt.value = txt;
    td.appendChild(elemtxt);
    tr.appendChild(td);

    var td = document.createElement('td');
    var elemtxt = document.createElement('select');
    elemtxt.name = 'btn[' + i + ']';
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

    for (var ii = 0; ii < buttonslength; ii++) {
        var option = document.createElement('option');
        option.value = (ii);
        option.text = 'Button ' + (ii + 1);
        elemtxt.appendChild(option);
    }
    elemtxt.value = btn;
    td.appendChild(elemtxt);
    tr.appendChild(td);


    var td = document.createElement('td');
    var elemtxt = document.createElement('input');
    elemtxt.class = 'form-control';
    elemtxt.name = 'timeout_time[' + i + ']';
    elemtxt.value = timeout_time;
    td.appendChild(elemtxt);
    tr.appendChild(td);

    var td = document.createElement('td');
    var elemtxt = document.createElement('select');
    elemtxt.name = 'timeout_btn[' + i + ']';
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

}
tableCreate();
try{
document.getElementById('createnode').addEventListener('click', function () {
    addrow('must', '', 1002, 1002, 20, ++totalnodes);
});
}catch(err){console.log(err);}