
document.getElementById('select_language').addEventListener('change', function () {
  updateCountry();
  });
  
  document.getElementById('copy_button').addEventListener('click', function () {
  copyButton();
  });
  
  document.getElementById('start_button').addEventListener('click', function () {
  startButton(event);
  });
  
  const sleep = (milliseconds) => {
  return new Promise(resolve => setTimeout(resolve, milliseconds))
  }
  
  // The ID of the extension we want to talk to.
  var editorExtensionId = "onlaonajepnoniehneapcnnpifgjiaba";
  // Make a simple request:
  chrome.runtime.sendMessage(editorExtensionId, {openUrlInEditor: "google.com"},
  function(response) {
  // alert('msg sent');
  });
  checkMic();
  async function checkMic(){
    await sleep(2000);
  
    if(!recognizing)
  startButton(event);
  
  checkMic();
  }
  
  var langs =
  [['Afrikaans', ['af-ZA']],
  ['Bahasa Indonesia', ['id-ID']],
  ['Bahasa Melayu', ['ms-MY']],
  ['Català', ['ca-ES']],
  ['Čeština', ['cs-CZ']],
  ['Urdu (Pakistan)', ['ur-PK']],
  ['Urdu (India)', ['ur-IN']],
  ['Deutsch', ['de-DE']],
  ['English', ['en-AU', 'Australia'],
  ['en-CA', 'Canada'],
  ['en-IN', 'India'],
  ['en-NZ', 'New Zealand'],
  ['en-ZA', 'South Africa'],
  ['en-GB', 'United Kingdom'],
  ['en-US', 'United States']],
  ['Español', ['es-AR', 'Argentina'],
  ['es-BO', 'Bolivia'],
  ['es-CL', 'Chile'],
  ['es-CO', 'Colombia'],
  ['es-CR', 'Costa Rica'],
  ['es-EC', 'Ecuador'],
  ['es-SV', 'El Salvador'],
  ['es-ES', 'España'],
  ['es-US', 'Estados Unidos'],
  ['es-GT', 'Guatemala'],
  ['es-HN', 'Honduras'],
  ['es-MX', 'México'],
  ['es-NI', 'Nicaragua'],
  ['es-PA', 'Panamá'],
  ['es-PY', 'Paraguay'],
  ['es-PE', 'Perú'],
  ['es-PR', 'Puerto Rico'],
  ['es-DO', 'República Dominicana'],
  ['es-UY', 'Uruguay'],
  ['es-VE', 'Venezuela']],
  ['Euskara', ['eu-ES']],
  ['Français', ['fr-FR']],
  ['Galego', ['gl-ES']],
  ['Hrvatski', ['hr_HR']],
  ['IsiZulu', ['zu-ZA']],
  ['Íslenska', ['is-IS']],
  ['Italiano', ['it-IT', 'Italia'],
  ['it-CH', 'Svizzera']],
  ['Magyar', ['hu-HU']],
  ['Nederlands', ['nl-NL']],
  ['Norsk bokmål', ['nb-NO']],
  ['Polski', ['pl-PL']],
  ['Português', ['pt-BR', 'Brasil'],
  ['pt-PT', 'Portugal']],
  ['Română', ['ro-RO']],
  ['Slovenčina', ['sk-SK']],
  ['Suomi', ['fi-FI']],
  ['Svenska', ['sv-SE']],
  ['Türkçe', ['tr-TR']],
  ['български', ['bg-BG']],
  ['Pусский', ['ru-RU']],
  ['Српски', ['sr-RS']],
  ['한국어', ['ko-KR']],
  ['中文', ['cmn-Hans-CN', '普通话 (中国大陆)'],
  ['cmn-Hans-HK', '普通话 (香港)'],
  ['cmn-Hant-TW', '中文 (台灣)'],
  ['yue-Hant-HK', '粵語 (香港)']],
  ['日本語', ['ja-JP']],
  ['Lingua latīna', ['la']]];
  
  var currentNode,currentBtn,parent_of=[], node_id=[],timeout_time=[], timeout_btn=[], txt=[], btn1=[],btn2=[],btn3=[];
  
  console.log(parent_of,txt,"btn1", btn1,"btn2", btn2,"btn3", btn3, timeout_time, timeout_btn);
  function myclick(btn,activeNode,buttonNo){
  console.log('myclick()',btn,activeNode,buttonNo);
    if(btn>=999){
    //sendmsg(btn);
  //previousNode=0;
  }
  else{
  var mybtn= document.getElementsByClassName('trackbox')[btn];
  mybtn.click();
  console.log(mybtn, btn);
  currentNode=activeNode;
  currentBtn=buttonNo;
  
  console.log('nc',parent_of[activeNode], activeNode,node_id[activeNode],node_id);
  if(parent_of[activeNode].includes('forget')==false ){
  previousNode=node_id[activeNode];
  }
  if(parent_of[activeNode].includes('check next')==false ){
  played=true;
  final_transcript = '';
  }
  }
  }
  async function process(buttonNo, activeNode){
  if(buttonNo>3)return;
  try{
  var res = txt[activeNode].split('&'),bbtn1=btn1[activeNode], bbtn2=btn2[activeNode], bbtn3=btn3[activeNode], btn;
  if(buttonNo==1)btn=bbtn1;else{
  await sleep(1000);
  }
  if(buttonNo==2)btn=bbtn2;
  if(buttonNo==3)btn=bbtn3;
  
  var resc=parent_of[activeNode].split('&');
  btn=parseInt(btn);
  console.log('process()', btn,activeNode,buttonNo,txt[activeNode] );
  if(buttonNo>1){
  myclick(btn,activeNode,buttonNo);
  return;
  }
  for(var ijk=0;ijk<res.length;ijk++){ 
    if((resc[ijk]==previousNode || resc[ijk]==('must') ) && !played)
     for(var ij=0;ij<res.length;ij++){
    console.log(res[ij]); 
    if (matchwild(final_transcript.toLowerCase(), res[ij])){
     myclick(btn,activeNode,buttonNo);
     console.log('detected '+res[ij]+' played button '+(btn+1)+' and current node is '+activeNode+' and will be checking for '+previousNode);
      document.getElementById('info').innerHTML=('detected '+res[ij]+' played button '+(btn+1)+' and i will be checking for '+previousNode+' or must parent node'); } } } } catch(err){console.log(err);} } for (var i=0; i < langs.length; i++) { select_language.options[i]=new Option(langs[i][0], i); } select_language.selectedIndex=8; updateCountry(); select_dialect.selectedIndex=6; showInfo('info_start'); function updateCountry() { for (var i=select_dialect.options.length - 1; i>= 0; i--) {
    select_dialect.remove(i);
    }
    var list = langs[select_language.selectedIndex];
    for (var i = 1; i < list.length; i++) {
       select_dialect.options.add(new Option(list[i][1], list[i][0]));
       } select_dialect.style.visibility=list[1].length==1 ? 'hidden' : 'visible' ; 
      } var create_email=false; 
      var final_transcript='' ; 
      var recognizing=false;
       var ignore_onend; 
       var start_timestamp;
        if (!('webkitSpeechRecognition' in window)) 
        { upgrade(); } 
        else {
         start_button.style.display='inline-block' ;
          var recognition=new webkitSpeechRecognition();
          recognition.continuous=true; 
          recognition.interimResults=true;
          recognition.onstart=function () {
          recognizing=true; showInfo('info_speak_now');
          start_img.src='mic-animate.gif' ; };
                   recognition.onerror=function (event) 
                   { console.log("error"); startButton(event);
                    if (event.error=='no-speech' )
                     { start_img.src='mic.gif' ; 
                     showInfo('info_no_speech'); 
                     ignore_onend=true; }
                      if (event.error=='network' )
                       { document.getElementById("info").innerHTML="Network Error" ; 
                       start_img.src='mic.gif' ; 
                       showInfo('info_no_speech'); ignore_onend=true;
                       } if (event.error=='audio-capture' ) 
                       { start_img.src='mic.gif' ;
                        showInfo('info_no_microphone');
                        ignore_onend=true; } if (event.error=='not-allowed' )
                         { if (event.timeStamp - start_timestamp < 100)
                           { showInfo('info_blocked'); } else { showInfo('info_denied'); } 
                           ignore_onend=true; } startButton(event); };
                            recognition.onend=function ()
                             { console.log("vr.onend"); recognizing=false;
                              if (ignore_onend) { startButton(event); console.log('restarted');
                               return; } start_img.src='mic.gif' ; 
                               if (!final_transcript)
                                { showInfo('info_start'); return; } showInfo(''); startButton(event); 
                                console.log('restarted'); if (window.getSelection)
                                 { window.getSelection().removeAllRanges(); var range=document.createRange();
                                   range.selectNode(document.getElementById('final_span'));
                                    window.getSelection().addRange(range); }
                                     if (create_email) { create_email=false; createEmail(); } };
                                      const sleep=(milliseconds)=> {
      return new Promise(resolve => setTimeout(resolve, milliseconds))
      }
      async function sendmsg(inte){
      await sleep(500);
      var wn = document.getElementById('vicidial_iframe').contentWindow;
      try{
      wn.postMessage(inte, '*');
      }catch(err){
      console.log(err);
      sendmsg(inte);
      }
      }
  
      function matchwild(str, rule) {
      var escapeRegex = (str) => str.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
      return new RegExp("^" + rule.split("*").map(escapeRegex).join(".*") + "$").test(str);
      }
      var played=false;
      var previousNode=0;
      recognition.onresult = function (event) {
      var interim_transcript = '';
      for (var i = event.resultIndex; i < event.results.length; ++i) { 
        if (event.results[i].isFinal) { 
        final_transcript +=event.results[i][0].transcript; 
      played=false; 
      console.log('final_transcript', final_transcript); 
      for(mkk=0;mkk<txt.length;mkk++)
      process(1,mkk); 
      } else {
         interim_transcript +=event.results[i][0].transcript; } } 
      final_transcript=capitalize(final_transcript);
       final_span.innerHTML=linebreak(final_transcript);
       interim_span.innerHTML=linebreak(interim_transcript);
       if (final_transcript || interim_transcript) { 
        showButtons('inline-block'); } }; }
       function upgrade() { 
        start_button.style.visibility='hidden' ; 
      showInfo('info_upgrade'); } 
      var two_line= /\n\n/g; 
      var one_line= /\n/g; 
      function linebreak(s) { 
        return s.replace(two_line, '<p></p>' ).replace(one_line, '<br>' ); } 
      var first_char= /\S/; 
      function capitalize(s) { 
        return s.replace(first_char, function (m) {
         return m.toUpperCase(); }); } 
      function createEmail() {
         var n=final_transcript.indexOf('\n');
       if (n < 0 || n>= 80) {
        n = 40 + final_transcript.substring(40).indexOf(' ');
        }
        var subject = encodeURI(final_transcript.substring(0, n));
        var body = encodeURI(final_transcript.substring(n + 1));
        window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
        }
        function copyButton() {
        if (recognizing) {
        recognizing = false;
        recognition.stop();
        }
        copy_button.style.display = 'none';
        copy_info.style.display = 'inline-block';
        showInfo('');
        }
        function emailButton() {
        if (recognizing) {
        create_email = true;
        recognizing = false;
        recognition.stop();
        } else {
        createEmail();
        }
        showInfo('');
        }
        function startButton(event) {
        //if recognizing then stop
        if (recognizing) {    
            recognition.stop();      
            return; }
        document.getElementById("info").innerHTML = "";
  
        final_transcript = '';
        recognition.lang = select_dialect.value;
        recognition.start();
        ignore_onend = false;
        final_span.innerHTML = '';
        interim_span.innerHTML = '';
        start_img.src = 'mic-slash.gif';
        showInfo('info_allow');
        showButtons('none');
        start_timestamp = event.timeStamp;
        }
        function showInfo(s) {
        if (s) {
        for (var child = info.firstChild; child; child = child.nextSibling) {
        if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
        }
        }
        info.style.visibility = 'visible';
        } else {
        info.style.visibility = 'hidden';
        }
        }
        var current_style;
        function showButtons(style) {
        if (style == current_style) {
        return;
        }
        current_style = style;
        copy_button.style.display = style;
        copy_info.style.display = 'none';
        }
  
  
  
  
        startButton(event);