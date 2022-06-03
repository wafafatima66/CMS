/*===========================================================================
*
*  AUDIO PLAYER - GREEN AUDIO PLAYER PLUGIN 
*
*============================================================================*/

$(document).ready(function() {

    "use strict";
 
     GreenAudioPlayer.init({
         selector: '.player', // inits Green Audio Player on each audio container that has class "player"
         stopOthersOnPlay: true,
     });

     GreenAudioPlayer.init({
        selector: '.user-result-player', // inits Green Audio Player on each audio container that has class "player"
        stopOthersOnPlay: false,
        showDownloadButton: true,
        showTooltips: true
    });

    GreenAudioPlayer.init({
        selector: '.listen-result-player', // inits Green Audio Player on each audio container that has class "player"
        stopOthersOnPlay: false,
        showDownloadButton: true,
        showTooltips: true
    });

    GreenAudioPlayer.init({
        selector: '.listen-result-player-frontend', // inits Green Audio Player on each audio container that has class "player"
        stopOthersOnPlay: false,
        showDownloadButton: false,
        showTooltips: true
    });
 
 });

 