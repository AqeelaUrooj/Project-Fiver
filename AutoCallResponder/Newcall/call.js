$(function(){
  
  $('#speakf').click(function(){
    var text = "I have your first name which is "+$('#fname').val();
    var msg = new SpeechSynthesisUtterance();
    var voices = window.speechSynthesis.getVoices();
    msg.voice = voices["Microsoft David Desktop - English (United States) (default)"];
    msg.rate = 4 / 10;
    msg.pitch = 1;
    msg.text = text;

    msg.onend = function(e) {
      console.log('Finished in ' + event.elapsedTime + ' seconds.');
    };

    speechSynthesis.speak(msg);
  
    });
    
    $('#speakl').click(function(){
    var text ="I have your last name which is "+ $('#lname').val();
    var msg = new SpeechSynthesisUtterance();
    var voices = window.speechSynthesis.getVoices();
    msg.voice = voices["Microsoft David Desktop - English (United States) (default)"];
    msg.rate = 4 / 10;
    msg.pitch = 1;
    msg.text = text;

    msg.onend = function(e) {
      console.log('Finished in ' + event.elapsedTime + ' seconds.');
    };

    speechSynthesis.speak(msg);
  
    });

    $('#speakz').click(function(){
    var text = "I have your ZIP code with me"+$('#zip').val();
    var msg = new SpeechSynthesisUtterance();
    var voices = window.speechSynthesis.getVoices();
    msg.voice = voices["Microsoft David Desktop - English (United States) (default)"];
    msg.rate = 4 / 10;
    msg.pitch = 1;
    msg.text = text;

    msg.onend = function(e) {
      console.log('Finished in ' + event.elapsedTime + ' seconds.');
    };

    speechSynthesis.speak(msg);
  
    });
});
 
