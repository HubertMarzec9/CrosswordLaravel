import { displayCrossword, showNewDiv } from './app.js';

var startTime;
var endTime;

document.getElementById('checkButton').addEventListener('click', function () {
    var inputs = document.querySelectorAll('input[letter]');
    var allMatch = true;

    inputs.forEach(function (input) {
        if (input.value !== input.getAttribute('letter')) {
            allMatch = false;
        }
    });

    if (allMatch) {
        alert('Poprawne rozwiazanie');
        endTime = performance.now();
        let timeDiff = endTime - startTime;
        let minutes = Math.floor(timeDiff / 60000);
        let seconds = Math.floor((timeDiff % 60000) / 1000);

        console.log(`Czas wykonania: ${minutes} minut ${seconds} sekund`);
        showNewDiv(timeDiff);
    } else {
        alert('Nie poprawne rozwiazanie');
    }
});

document.getElementById('resetButton').addEventListener('click', function () {
    var inputs = document.querySelectorAll('input[letter]');

    inputs.forEach(function (input) {
        input.value = '';
    });
//startTime = new Date();
});

function showOverlay() {
    const overlay = document.getElementById('overlay');
    overlay.style.display = 'block';
}

document.getElementById('startButton').addEventListener('click', function () {
    displayCrossword();
    startTime = performance.now();
    document.getElementById('startButtonDiv').style.display = 'none';
    document.getElementById('content').style.display = 'block';
    showOverlay();
});


