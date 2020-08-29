﻿//soundboard start
function _(id){
  
return document.getElementById(id);
}
function audioApp(){
var audio = new Audio();
var audio_folder = "soundboardhi/tracks/tracks/";
var audio_abc = "soundboardhi/tracks/ABC-Alphabets/";
var audio_ext = ".mp3";
var audio_index = 1;
var is_playing = false;
var playingtrack;
var trackbox = _("trackbox");
var tracks = {
  
"track1":["Hello", "Hello"],
"track4":["Can You Hear", "Can you hear me"],
"track37":["Great question", "Great Question"],
"track14":["Busy", "Busy"],


"track5":["Greetings", "Greetings"],
"track7":["Thanks 4 asking ", "Great Thanks for asking"],
"track12":["My Name Is", "My Name is Jason"],
"track2":["R U There", "Are You There"],

"track10":["Purpose", "Pitch"],

"track44":["Good", "Good"],
"track21":["Glad to hear", "Glad to hear that"],
"track30":["I am sorry", "I am sorry"],


"track52":["High electric bill", "Do you have high electric bill"],
"track8":["Not Interested", "Not Interested in Eleminating bill"],
"track25":["Compny Locatd", "Calling from"],
"track35":["Bills scheduled", "Bills scheduled to Increase 45%"],


"track19":["Eleminate bill", "Calling to eleminate solar bill"],
"track34":["Decision maker", "Decision maker for the house"],
"track45":["Ok I Understand", "Ok I Under"],
"track20":["Yes", "Yes"],


"track23":["Homeower?", "Are you homeowner"],
"track24":["Free info", "Would you Like to Recieve free info"],
"track6":["Speak to them", "Can I speak to them"],
"track3":["Already talking", "Are you already talking to another solar company"],

"track32":["Xfer Pitch", "Qualify Perfect Candidate"],
"track16":["own or renting", "Do you own or renting"],
"track50":["Single Family", "Single Family Detatch"],
"track31":["Sure", "Sure"],


"track40":["Thanks anyway", "Thanks anyway"],
"track33":["No obligation", "No cost no obligation"],
"track27":["Hold on Just a", "Hold on a moment"],
"track48":["Okay", "Ok"],



"track36":["Zero out of", "Zero out of pocket cost"],
"track47":["Callback hus", "Spouse Callback 2"],
"track15":["Callback wife", "Spouse callback"],
"track17":["Mobile home", "Single Family Stand Alone"],


"track18":["Don't Quaify", "Don't Quaify"],


"track39":["Thankyou", "Thankyou for your time"],

"track22":["I am Sorry Say", "Sorry say that again"],
"track49":["Is That ok", "Is That ok"],


"track28":["DNC Pitch", "DNC Pitch"],
"track11":["Mom or Dad", "Mom or Dad there"],
"track9":["Great Thanks", "Great Thanks "],


"track42":["Let me ask you", "Let me ask you this"],
"track46":["Thanks Anyway", "Thanks Anyway"],

"track38":["Real Person", "I am a real person"],

"track53":["Spell First name", "spell_f"],


"track43":["--------", "Let me ask"],



"track26":["--------", "Transfer"],
"track51":["--------", "Zero out of "],

"track26":["--------", "Transfer"]



};


for(var track in tracks){
var tb = document.createElement("div");
var pb = document.createElement("button");
var tn = document.createElement("div");
tb.className = "trackbox ";
tb.setAttribute("index",audio_index-1);
pb.className = "playbutton";
tn.className = "trackname";
tn.innerHTML = audio_index+". "+tracks[track][0];
tb.id = tracks[track][1];
tb.addEventListener("click", switchTrack);
tb.appendChild(pb);
tb.appendChild(tn);
trackbox.appendChild(tb);
audio_index++;
}

audio.addEventListener("ended", function(){
var thisElem= document.getElementById(playingtrack).childNodes[0];
thisElem.style.background = "url(soundboardhi/images/ak_playbtn.png)";
playingtrack = "";
is_playing = false;
console.log("ended",thisElem.parentElement.getAttribute("index") );
if(currentBtn<4)
process(++currentBtn, currentNode);

if(!recognizing)
startButton(event);

});
 

function switchTrack(event){
// debugger
var counter = 0;
if(is_playing){
if(playingtrack != this.id){
is_playing = true;
document.getElementById(playingtrack).removeAttribute("style");
document.getElementById(playingtrack).childNodes[0].style.background = "url(soundboardhi/images/ak_playbtn.png)";
document.getElementById(this.id).childNodes[0].style.background = "url(soundboardhi/images/ak_pausebtn.png)";



if( this.id=="spell_f")
{

for(var i=0;i<res.length; i++)

console.log(file);
  audio.src = audio_abc+file+audio_ext;
  audio.play(); 


}
else{
audio.src = audio_folder+this.id+audio_ext;
audio.play(); 
}
//Styling Here
//for(var t in tracks){
// document.getElementById(t).removeAttribute("style");
// if(t == document.getElementById(event.target.id).parentNode.id) {
document.getElementById(this.id).style.backgroundColor = "green";
// }
//}
} else {
audio.pause();
audio.currentTime = 0;
is_playing = false;
document.getElementById(this.id).childNodes[0].style.background = "url(soundboardhi/images/ak_playbtn.png)";

//Styling Here
//for(var t in tracks){
// if(t == document.getElementById(event.target.id).parentNode.id) {
document.getElementById(this.id).removeAttribute("style");
// }
//}
}
} 

else {
is_playing = true;
document.getElementById(this.id).childNodes[0].style.background = "url(soundboardhi/images/ak_pausebtn.png)";
if(playingtrack != this.id){

  if( this.id=="spell_f")
{
  

  audio.src = audio_abc+file+audio_ext;
  audio.play(); 
  
  
}
else
{
audio.src = audio_folder+this.id+audio_ext;
}
}
audio.play();

//Styling Here
//for(var t in tracks){
// document.getElementById(t).removeAttribute("style");
// if(t == document.getElementById(event.target.id).parentNode.id) {
document.getElementById(this.id).style.backgroundColor = "green";
// }

//}
}
playingtrack = this.id;
}
}
window.addEventListener("load", audioApp);

//soundboard end

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
    //  recognizing = false;
     // recognition.stop();
      }
      copy_button.style.display = 'none';
      copy_info.style.display = 'inline-block';
      showInfo('');
      }
      function emailButton() {
      if (recognizing) {
      create_email = true;
     // recognizing = false;
     // recognition.stop();
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