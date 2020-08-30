$(function(){
  
  var audio_v=new Audio();

    $('#speakf').click(function(){
        
        audio_v.pause();
        audio_v.src = '..\\soundboardhi\\tracks\\output\\'+fname+'.mp3';
        audio_v.play();
        
      });

      $('#speakl').click(function(){

        audio_v.pause();
        audio_v.src = '..\\soundboardhi\\tracks\\output\\'+lname+'.mp3';
        audio_v.play();
        
      });

      $('#speakz').click(function(){
     
        audio_v.pause();
        audio_v.src = '..\\soundboardhi\\tracks\\output\\'+zip+'.mp3';
        audio_v.play();
        
    
      });
    
      $('#speakd').click(function(){
     
        audio_v.pause();
        audio_v.src = '..\\soundboardhi\\tracks\\output\\date.mp3';
        audio_v.play();
        
    
      });
      

  });

      
   