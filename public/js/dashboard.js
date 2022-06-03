/*===========================================================================
*
*  TTS Dashboard 
*
*============================================================================*/

$(document).ready(function(){

    "use strict";

    $('#languages').awselect();
    $('#voices').awselect();
    
});	

$(document).ready(function(){

    "use strict";

    $('.avoid-clicks').on('click',false);

    $('#clear-text').on("click", function(e){
        e.preventDefault();
        $('textarea').val('');
    });

})

var previous_selection = 0;

function language_select(value){

    "use strict";

    for (var i = 0; i < previous_selection.length; i++){
        previous_selection[i].style.display = 'none';
    }

    var elements = document.getElementsByClassName(value);

    for (var i = 0; i < elements.length; i++){			
        elements[i].style.display = 'block';
    }
    
    var current_value = document.getElementsByClassName('current_value');

    if (current_value[1] != undefined) {
        document.getElementById(current_value[1].id).innerHTML = 'Choose your Voice:';
        document.getElementById(current_value[1].id).style.display = 'block';
    }		

    previous_selection = elements;		
}

/*===========================================================================
*
*  Process Select Voices 
*
*============================================================================*/
function voice_select(value) {
    
    "use strict";
    
    if(value.includes('-aws-')) {
        switch (value) {
            case 'au-aws-nrl-olivia':
            case 'gb-aws-nrl-amy':
            case 'gb-aws-nrl-emma':
            case 'gb-aws-nrl-brian':
            case 'us-aws-nrl-ivy':
            case 'us-aws-nrl-kendra':
            case 'us-aws-nrl-kimberly':
            case 'us-aws-nrl-salli':
            case 'us-aws-nrl-joey':
            case 'us-aws-nrl-justin':
            case 'us-aws-nrl-kevin':
            case 'ca-aws-nrl-gabrielle':
            case 'kr-aws-std-seoyeon':
            case 'br-aws-nrl-camila':
                resetAWSSettings();
                standardAWSNeuralSettings();
                break;
            case 'us-aws-nrl-joanna':
            case 'us-aws-nrl-matthew':
                resetAWSSettings();
                allAWSNeuralSettings();
                break;        
            case 'us-aws-nrl-lupe':
                specialAWSNeuralSettings();
                resetAWSSettings();
                break;            
            default:
                resetAWSSettings();
                enableAWSStandardSettings();
                break;
        }

    } else if (value.includes('-Standard-') || value.includes('-Wavenet-')) {
        $("#mp3").prop("checked", true);
        $('#speakingStyle').hide();
        $('#volume').show();
        $('#emphasis').show();
        $('#sayAs').show();
        $('#voiceEffects').hide();
        $('#sub').show();
        $('#digits_sayas').hide();
        $('#gcp_time_sayas').show();
        $('#time_sayas').hide();
        $('#address_sayas').hide();
        $('#telephone_sayas').show();
        $('#verbatim_sayas').show();
        $('#bleep_sayas').show();
        $('#azurePause').hide();
        $('#pause').show();
        $('#unit_sayas').show();
        $('#expletive_sayas').show();
        document.getElementById('azure-ogg').style.display = 'none';
        document.getElementById('azure-webm').style.display = 'none';
        document.getElementById('wav').style.display = 'block';

    } else if (value.includes('Voice')) {
        $("#mp3").prop("checked", true);
        $('#speakingStyle').hide();
        $('#volume').hide();
        $('#emphasis').hide();
        $('#voiceEffects').hide();
        $('#sub').show();
        $('#sayAs').hide();
        $('#azurePause').hide();
        $('#pause').show();
        document.getElementById('azure-ogg').style.display = 'none';
        document.getElementById('azure-webm').style.display = 'none';
        document.getElementById('wav').style.display = 'block';

    } else {
        switch (value) {
            case 'en-US-AriaNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#newscast-formal').show();
                    $('#newscast-casual').show();
                    $('#narration-professional').show();
                    $('#customerservice').show();
                    $('#chat').show();
                    $('#cheerful').show();
                    $('#empathetic').show();                    
                break;
            case 'en-US-JennyNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#customerservice').show();
                    $('#chat').show();
                    $('#assistant').show();
                    $('#newscast').show();
                break;
            case 'en-US-GuyNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#newscast').show();
                break;
            case 'pt-BR-FranciscaNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#calm').show();
                break;
            case 'zh-CN-XiaoxiaoNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#newscast').show();
                    $('#customerservice').show();
                    $('#assistant').show();
                    $('#chat').show();
                    $('#calm').show();
                    $('#cheerful').show();
                    $('#sad').show();
                    $('#angry').show();
                    $('#fearful').show();
                    $('#disgruntled').show();
                    $('#serious').show();
                    $('#affectionate').show();
                    $('#gentle').show();
                    $('#lyrical').show();
                break;
            case 'zh-CN-YunyangNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#customerservice').show();
                break;
            case 'zh-CN-YunyeNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#calm').show();
                    $('#cheerful').show();
                    $('#sad').show();
                    $('#angry').show();
                    $('#fearful').show();
                    $('#disgruntled').show();
                    $('#serious').show();
                break;
            case 'zh-CN-YunxiNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#assistant').show();
                    $('#cheerful').show();
                    $('#sad').show();
                    $('#angry').show();
                    $('#fearful').show();
                    $('#disgruntled').show();
                    $('#serious').show();
                    $('#depressed').show();
                    $('#embarrassed').show();
                break;
            case 'zh-CN-XiaohanNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#cheerful').show();
                    $('#sad').show();
                    $('#angry').show();
                    $('#fearful').show();
                    $('#disgruntled').show();
                    $('#serious').show();
                    $('#affectionate').show();
                    $('#gentle').show();
                    $('#embarrassed').show();
                break;
            case 'zh-CN-XiaomoNeural':
            case 'zh-CN-XiaoxuanNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#calm').show();
                    $('#cheerful').show();
                    $('#angry').show();
                    $('#fearful').show();
                    $('#disgruntled').show();
                    $('#serious').show();
                    $('#gentle').show();
                    $('#depressed').show();
                break;
            case 'zh-CN-XiaoruiNeural':
                    azureSettings();
                    resetAzureSpeakingStyles();
                    $('#sad').show();
                    $('#angry').show();
                    $('#fearful').show();
                break;           
            default:
                    azureSettings();
                    $('#speakingStyle').hide();
                break;
        }
    }


    if(value.includes('-aws-')) {
        document.getElementById('aws-ogg').style.display = 'block';
    } else {
        document.getElementById('aws-ogg').style.display = 'none';
    }
}

function standardAWSNeuralSettings() {

    "use strict";

    $('#emphasis').hide();
    $('#pitch').hide();
    $('#characters_sayas').hide();
    $('#soft_effect').hide();
    $('#breathing_effect').hide();
    $('#whispered_effect').hide();
}

function specialAWSNeuralSettings() {

    "use strict";

    standardAWSNeuralSettings();
    $('#newscaster_effect').show();
}

function allAWSNeuralSettings() {

    "use strict";

    specialAWSNeuralSettings();
    $('#conversational_effect').show();
}

function enableAWSStandardSettings() {

    "use strict";

    $('#emphasis').show();
    $('#pitch').show();
    $('#characters_sayas').show();
    $('#soft_effect').show();
    $('#breathing_effect').show();
    $('#whispered_effect').show();
}

function resetAWSSettings() {

    "use strict";

    $("#mp3").prop("checked", true);
    $('#azurePause').hide();
    $('#pause').show();
    $('#speakingStyle').hide();
    $('#volume').show();
    $('#emphasis').show();
    $('#sayAs').show();
    $('#voiceEffects').show();
    $('#sub').hide();
    $('#digits_sayas').show();
    $('#gcp_time_sayas').hide();
    $('#time_sayas').show();
    $('#address_sayas').show();
    $('#telephone_sayas').hide();
    $('#verbatim_sayas').hide();
    $('#bleep_sayas').hide();
    $('#unit_sayas').show();
    $('#expletive_sayas').show();
    document.getElementById('azure-ogg').style.display = 'none';
    document.getElementById('azure-webm').style.display = 'none';
    document.getElementById('wav').style.display = 'none';
}

function azureSettings() {

    "use strict";

    $("#mp3").prop("checked", true);
    $('#sub').hide();
    $('#azurePause').show();
    $('#pause').hide();
    $('#unit_sayas').hide();
    $('#expletive_sayas').hide();
    $('#emphasis').hide();
    $('#voiceEffects').hide();
    document.getElementById('azure-ogg').style.display = 'block';
    document.getElementById('azure-webm').style.display = 'block';
    document.getElementById('wav').style.display = 'none';
}

function resetAzureSpeakingStyles() {

    "use strict";

    $('#speakingStyle').show();
    $('#newscast-formal').hide();
    $('#newscast-casual').hide();
    $('#narration-professional').hide();
    $('#customerservice').hide();
    $('#chat').hide();
    $('#cheerful').hide();
    $('#empathetic').hide(); 
    $('#newscast').hide();
    $('#assistant').hide();
    $('#calm').hide();
    $('#sad').hide();
    $('#angry').hide();
    $('#fearful').hide();
    $('#disgruntled').hide();
    $('#serious').hide();
    $('#affectionate').hide();
    $('#embarrassed').hide();
    $('#gentle').hide();
    $('#lyrical').hide(); 
    $('#depressed').hide();
}


function ssmlText(openTag, closeTag) {

    "use strict";

    var textarea = $('#textarea');
    var length = textarea.val().length;
    var start = textarea[0].selectionStart;
    var end = textarea[0].selectionEnd;
    var selectedText = textarea.val().substring(start, end);
    var replacement = openTag + selectedText + closeTag;
    textarea.val(textarea.val().substring(0, start) + replacement + textarea.val().substring(end, length));
}

// Speaking Styles
$('#newscast-formal').on('click',function() {
    ssmlText("<mstts:express-as style='newscast-formal'>", "</mstts:express-as>");
});

$('#newscast-casual').on('click',function() {
    ssmlText("<mstts:express-as style='newscast-casual'>", "</mstts:express-as>");
});

$('#narration-professional').on('click',function() {
    ssmlText("<mstts:express-as style='narration-professional'>", "</mstts:express-as>");
});

$('#customerservice').on('click',function() {
    ssmlText("<mstts:express-as style='customerservice'>", "</mstts:express-as>");
});

$('#chat').on('click',function() {
    ssmlText("<mstts:express-as style='chat'>", "</mstts:express-as>");
});

$('#cheerful').on('click',function() {
    ssmlText("<mstts:express-as style='cheerful'>", "</mstts:express-as>");
});

$('#empathetic').on('click',function() {
    ssmlText("<mstts:express-as style='empathetic'>", "</mstts:express-as>");
});

$('#newscast').on('click',function() {
    ssmlText("<mstts:express-as style='newscast'>", "</mstts:express-as>");
});

$('#assistant').on('click',function() {
    ssmlText("<mstts:express-as style='assistant'>", "</mstts:express-as>");
});

$('#calm').on('click',function() {
    ssmlText("<mstts:express-as style='calm'>", "</mstts:express-as>");
});

$('#sad').on('click',function() {
    ssmlText("<mstts:express-as style='sad'>", "</mstts:express-as>");
});

$('#angry').on('click',function() {
    ssmlText("<mstts:express-as style='angry'>", "</mstts:express-as>");
});

$('#fearful').on('click',function() {
    ssmlText("<mstts:express-as style='fearful'>", "</mstts:express-as>");
});

$('#disgruntled').on('click',function() {
    ssmlText("<mstts:express-as style='disgruntled'>", "</mstts:express-as>");
});

$('#serious').on('click',function() {
    ssmlText("<mstts:express-as style='serious'>", "</mstts:express-as>");
});

$('#affectionate').on('click',function() {
    ssmlText("<mstts:express-as style='affectionate'>", "</mstts:express-as>");
});

$('#embarrassed').on('click',function() {
    ssmlText("<mstts:express-as style='embarrassed'>", "</mstts:express-as>");
});

$('#gentle').on('click',function() {
    ssmlText("<mstts:express-as style='gentle'>", "</mstts:express-as>");
});

$('#lyrical').on('click',function() {
    ssmlText("<mstts:express-as style='lyrical'>", "</mstts:express-as>");
});

$('#depressed').on('click',function() {
    ssmlText("<mstts:express-as style='depressed'>", "</mstts:express-as>");
});


// Voice Effects
$('#soft_effect').on('click',function() {
    ssmlText("<amazon:effect phonation='soft'>", "</amazon:effect>");
});

$('#breathing_effect').on('click',function() {
    ssmlText("<amazon:auto-breaths>", "</amazon:auto-breaths>");
});

$('#whispered_effect').on('click',function() {
    ssmlText("<amazon:effect name='whispered'>", "</amazon:effect>");
});

$('#drc_effect').on('click',function() {
    ssmlText("<amazon:effect name='drc'>", "</amazon:effect>");
});

$('#conversational_effect').on('click',function() {
    ssmlText("<amazon:domain name='conversational'>", "</amazon:domain>");
});

$('#newscaster_effect').on('click',function() {
    ssmlText("<amazon:domain name='news'>", "</amazon:domain>");
});

// Say as Effect
$('#characters_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='characters'>", "</say-as>");
});

$('#cardinal_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='cardinal'>", "</say-as>");
});

$('#ordinal_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='ordinal'>", "</say-as>");
});

$('#digits_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='digits'>", "</say-as>");
});

$('#fraction_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='fraction'>", "</say-as>");
});

$('#unit_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='unit'>", "</say-as>");
});

$('#time_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='time'>", "</say-as>");
});

$('#gcp_time_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='time' format='hms24'>", "</say-as>");
});

$('#address_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='address'>", "</say-as>");
});

$('#expletive_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='expletive'>", "</say-as>");
});

$('#telephone_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='telephone'>", "</say-as>");
});

$('#verbatim_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='verbatim'>", "</say-as>");
});

$('#bleep_sayas').on('click',function() {
    ssmlText("<say-as interpret-as='bleep'>", "</say-as>");
});

// Emphasis Effect
$('#strong_emphasis').on('click',function() {
    ssmlText("<emphasis level='strong'>", "</emphasis>");
});

$('#moderate_emphasis').on('click',function() {
    ssmlText("<emphasis level='moderate'>", "</emphasis>");
});

$('#reduced_emphasis').on('click',function() {
    ssmlText("<emphasis level='reduced'>", "</emphasis>");
});

// Volume Effect
$('#silent_volume').on('click',function() {
    ssmlText("<prosody volume='silent'>", "</prosody>");
});

$('#x_soft_volume').on('click',function() {
    ssmlText("<prosody volume='x-soft'>", "</prosody>");
});

$('#soft_volume').on('click',function() {
    ssmlText("<prosody volume='soft'>", "</prosody>");
});

$('#medium_volume').on('click',function() {
    ssmlText("<prosody volume='medium'>", "</prosody>");
});

$('#loud_volume').on('click',function() {
    ssmlText("<prosody volume='loud'>", "</prosody>");
});

$('#x_loud_volume').on('click',function() {
    ssmlText("<prosody volume='x-loud'>", "</prosody>");
});

// Speed Effect
$('#x_slow_speed').on('click',function() {
    ssmlText("<prosody rate='x-slow'>", "</prosody>");
});

$('#slow_speed').on('click',function() {
    ssmlText("<prosody rate='slow'>", "</prosody>");
});

$('#medium_speed').on('click',function() {
    ssmlText("<prosody rate='medium'>", "</prosody>");
});

$('#fast_speed').on('click',function() {
    ssmlText("<prosody rate='fast'>", "</prosody>");
});

$('#x_fast_speed').on('click',function() {
    ssmlText("<prosody rate='x-fast'>", "</prosody>");
});

// Pitch Effect
$('#x_low_pitch').on('click',function() {
    ssmlText("<prosody pitch='x-low'>", "</prosody>");
});

$('#low_pitch').on('click',function() {
    ssmlText("<prosody pitch='low'>", "</prosody>");
});

$('#medium_pitch').on('click',function() {
    ssmlText("<prosody pitch='medium'>", "</prosody>");
});

$('#high_pitch').on('click',function() {
    ssmlText("<prosody pitch='high'>", "</prosody>");
});

$('#x_high_pitch').on('click',function() {
    ssmlText("<prosody pitch='x-high'>", "</prosody>");
});

// Pauses Effect
$('#zero_pause').on('click',function() {
    ssmlText("<break time='0s'/>", "");
});

$('#one_pause').on('click',function() {
    ssmlText("<break time='1s'/>", "");
});

$('#two_pause').on('click',function() {
    ssmlText("<break time='2s'/>", "");
});

$('#three_pause').on('click',function() {
    ssmlText("<break time='3s'/>", "");
});

$('#four_pause').on('click',function() {
    ssmlText("<break time='4s'/>", "");
});

$('#five_pause').on('click',function() {
    ssmlText("<break time='5s'/>", "");
});

$('#six_pause').on('click',function() {
    ssmlText("<break time='6s'/>", "");
});

$('#seven_pause').on('click',function() {
    ssmlText("<break time='7s'/>", "");
});

$('#eight_pause').on('click',function() {
    ssmlText("<break time='8s'/>", "");
});

$('#nine_pause').on('click',function() {
    ssmlText("<break time='9s'/>", "");
});

$('#ten_pause').on('click',function() {
    ssmlText("<break time='10s'/>", "");
});

$('#paragraph_pause').on('click',function() {
    ssmlText("<p>", "</p>");
});

$('#sentence_pause').on('click',function() {
    ssmlText("<s>", "</s>");
});

$('#azure_zero_pause').on('click',function() {
    ssmlText("<break time='0s'/>", "");
});

$('#azure_one_pause').on('click',function() {
    ssmlText("<break time='1s'/>", "");
});

$('#azure_two_pause').on('click',function() {
    ssmlText("<break time='2s'/>", "");
});

$('#azure_three_pause').on('click',function() {
    ssmlText("<break time='3s'/>", "");
});

$('#azure_four_pause').on('click',function() {
    ssmlText("<break time='4s'/>", "");
});

$('#azure_five_pause').on('click',function() {
    ssmlText("<break time='5s'/>", "");
});

$('#azure_paragraph_pause').on('click',function() {
    ssmlText("<p>", "</p>");
});

$('#azure_sentence_pause').on('click',function() {
    ssmlText("<s>", "</s>");
});

// Replace
$('#sub').on('click',function() {
    ssmlText("<sub alias='INCLUDE REPLACEMENT TEXT'>", "</sub>");
});


/*************************************************
 *  Process File Synthesize Mode
 *************************************************/
$('#synthesize-text-form').on('submit',function(e) {

    "use strict";

    e.preventDefault()

    var form = $(this);
    var data = form.serialize();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: form.attr('action'),
        data: data,
        beforeSend: function() {
            $('#synthesize-text').html('');
            $('#synthesize-text').prop('disabled', true);
            $('#processing').show().clone().appendTo('#synthesize-text');           
        },
        complete: function() {
            $('#synthesize-text').prop('disabled', false);
            $('#processing', '#synthesize-text').empty().remove();
            $('#processing').hide();
            $('#synthesize-text').html('Synthesize');            
         },
        success: function(data) {           
            $("html, body").animate({scrollTop: $("#results-header").offset().top}, 200);
			$("#resultTable").DataTable().ajax.reload();
        },
        error: function(data) {
            if (data.responseJSON['error']) {
                $('#notificationModal').modal('show');
                $('#notificationMessage').text(data.responseJSON['error']);
            }

            $('#synthesize-text').prop('disabled', false);
            $('#processing').remove();
            $('#synthesize-text').html('Synthesize');            
        }
    }).done(function(data) {})
});


/*************************************************
 *  Process Live Synthesize Listen Mode
 *************************************************/
$('#listen-text').on('click', function(e) {

    "use strict";
    
    e.preventDefault()

    if (document.getElementById("textarea").value == '') {        
        $('#notificationModal').modal('show');
        $('#notificationMessage').text('Please enter text to synthesize first');
    } else {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: $('#synthesize-text-form').attr('listen'),
            data: $('#synthesize-text-form').serialize(),
            beforeSend: function() {
                $('#listen-text').html('');
                $('#listen-text').prop('disabled', true);
                $('#processing').show().clone().appendTo('#listen-text');            
            },
            complete: function() {
                $('#listen-text').prop('disabled', false);
                $('#processing', '#listen-text').empty().remove();
                $('#processing').hide();
                $('#listen-text').html('Listen');                
            },
            success: function(data) {
                var audio = document.getElementById('listen-result');
                var source = document.getElementById('listen-source');
                audio.src = data['url'];
                source.type= data['audio_type'];
                $("#listenModal").modal('show');
            },
            error: function(data) {
                if (data.responseJSON['error']) {
                    $('#notificationModal').modal('show');
                    $('#notificationMessage').text(data.responseJSON['error']);
                }

                $('#listen-text').prop('disabled', false);
                $('#processing').remove();
                $('#listen-text').html('Listen');                
            }
        }).done(function(data) {})
    }
});


/*************************************************
 *  Process Live Synthesize Listen Mode Frontend
 *************************************************/
 $('#frontend-listen-text').on('click', function(e) {

    "use strict";
    
    e.preventDefault()

    if (document.getElementById("textarea").value == '') {        
        $('#notificationModal').modal('show');
        $('#notificationMessage').text('Please enter text to synthesize first');
    } else {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: $('#synthesize-text-form').attr('action'),
            data: $('#synthesize-text-form').serialize(),
            beforeSend: function() {
                $('#frontend-listen-text').html('');
                $('#frontend-listen-text').prop('disabled', true);
                $('#processing').show().clone().appendTo('#frontend-listen-text');            
            },
            complete: function() {
                $('#frontend-listen-text').prop('disabled', false);
                $('#processing', '#frontend-listen-text').empty().remove();
                $('#processing').hide();
                $('#frontend-listen-text').html('Listen');                
            },
            success: function(data) {
                var audio = document.getElementById('listen-result');
                var source = document.getElementById('listen-source');
                audio.src = data['url'];
                source.type= data['audio_type'];
                $("#listenModal").modal('show');
            },
            error: function(data) {
                if (data.responseJSON['error']) {
                    $('#notificationModal').modal('show');
                    $('#notificationMessage').text(data.responseJSON['error']);
                }

                $('#frontend-listen-text').prop('disabled', false);
                $('#processing').remove();
                $('#frontend-listen-text').html('Listen');                
            }
        }).done(function(data) {})
    }
});

$('#listen-close').on('click', function(e) {
    var audio = document.getElementById('listen-result');
    audio.pause();
});

$('#modal-close').on('click', function(e) {
    var audio = document.getElementById('listen-result');
    audio.pause();
});




  
 