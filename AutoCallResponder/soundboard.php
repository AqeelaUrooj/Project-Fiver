function _(id){
return document.getElementById(id);
}
function audioApp(){
var audio = new Audio();
var audio_folder = "soundboardhi/tracks/tracks/";
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
document.getElementById(playingtrack).childNodes[0].style.background = "url(soundboardhi/images/ak_playbtn.png)";
playingtrack = "";
is_playing = false;
console.log("ended");
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
audio.src = audio_folder+this.id+audio_ext;
audio.play();

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
} else {
is_playing = true;
document.getElementById(this.id).childNodes[0].style.background = "url(soundboardhi/images/ak_pausebtn.png)";
if(playingtrack != this.id){
audio.src = audio_folder+this.id+audio_ext;

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