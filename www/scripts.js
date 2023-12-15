function hideButtonAndShowInput(buttonId) {
    var button = document.getElementById(buttonId);
    var input = document.getElementById('input' + buttonId.slice(-1));
    var button_hide = document.getElementById('button_hide' + buttonId.slice(-1));

    if (button && input && button_hide) {
        button.style.display = 'none';
        input.style.display = 'inline-block';
        button_hide.style.display = 'inline-block';
    }
}
function hideButtonAndShowInfo(buttonId) {
    var button = document.getElementById(buttonId);

    var info1 = document.getElementById('info1' + buttonId.slice(-1));
    var info2 = document.getElementById('info2' + buttonId.slice(-1));
    var info3 = document.getElementById('info3' + buttonId.slice(-1));
    var info4 = document.getElementById('info4' + buttonId.slice(-1));

    if (button && info1  && info2  && info3  && info4)  {
        button.style.display = 'none';
        info1.style.display = 'block';
        info2.style.display = 'block';
        info3.style.display = 'block';
        info4.style.display = 'block';
    }
}
function hideInputAndShowButton(buttonId) {
    var button_hide = document.getElementById(buttonId);
    var input = document.getElementById('input' + buttonId.slice(-1));
    var button = document.getElementById('button' + buttonId.slice(-1));

    if (button && input && button_hide) {
        button_hide.style.display = 'none';
        input.value = '';
        input.style.display = 'none';
        button.style.display = 'inline-block';
    }
}

function redirectToPage(url) {
    window.location.href = url;
}

function playAudio(audioSource) {
    // Получаем доступ к элементу audio
    var audioPlayer = document.getElementById('audioPlayer');
    console.log("FFFF");
    // Устанавливаем новый источник аудио
    if (audioPlayer) {
        audioPlayer.style.display = 'block';
        audioPlayer.src = audioSource;
        audioPlayer.play();
    }
}