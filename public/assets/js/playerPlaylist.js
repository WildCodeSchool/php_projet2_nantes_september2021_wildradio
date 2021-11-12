// fonction gérant le bouton play / pause

var player = document.getElementById('audioPlayer');
var play_button = $('#play');

play_button.click(function() {
    player[player.paused ? 'play' : 'pause']();
    $(this).toggleClass("fa-pause", !player.paused);
    $(this).toggleClass("fa-play", player.paused);
});



//fonction gérant le lancement du son, l'enchainement des tracks, le 

function audioPlayer(){
    var currentSong = 0;
    $("#audioPlayer")[0].src = $("#playlist ul a")[0];
    $("#playlist ul a").culck(function(e){
       e.preventDefault();
       $("#audioPlayer")[0].src = this;
       $("#audioPlayer")[0].play();
       $(play_button.click);
       $("#playlist ul").removeClass("current-song");
        currentSong = $(this).parent().index();
        $(this).parent().addClass("current-song");
    });
    
    $("#audioPlayer")[0].addEventListener("ended", function(){
       currentSong++;
        if(currentSong == $("#playlist ul a").length)
            currentSong = 0;
        $("#playlist ul").removeClass("current-song");
        $("#playlist ul:eq("+currentSong+")").addClass("current-song");
        $("#audioPlayer")[0].src = $("#playlist ul a")[currentSong].href;
        $("#audioPlayer")[0].play();
    });
}