var player, time_update_interval;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('video', {
        height: "100%",
        width: "100%",
        videoId: videoId,
        playerVars: { 'autoplay': 1, 'controls': 0, 'showinfo': 0 },
        events: {
            onStateChange: onPlayerStateChange,
        }
    });
}

function onPlayerStateChange(event){
   if(event.data == YT.PlayerState.ENDED){
      complete_quest(quest);
   }
}
