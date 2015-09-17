/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function () {   //imeediately invoked  function expression
    var delay;
    "use strict";
    var interval;
    function printStep(step) {
        document.getElementById('text').value = step;
    }
    function start() {
        if (document.getElementById('speed').checked) {
            delay = 200;
        } else {
            delay = 250;
        }
        document.getElementById('stop').disabled = true;
        var animation = ANIMATIONS[document.getElementById("events").value];
        // var animation=document.getElementById('combValue1');
        var steps = animation.split("=====\n");
        var n = 0;
        interval = setInterval(
                function () {
                    document.getElementById("text").value = steps[n++];
                    document.getElementById('start').disabled = true;
                    document.getElementById('stop').disabled = false;
                    if (n === steps.length) {
                        n = 0;
                    }
                }, delay);
    }
    function stop() {
        clearInterval(interval);
        document.getElementById('start').disabled = false;
        document.getElementById('stop').disabled = true;
    }
    function modifyFontSize() {
        var size = document.getElementById('fontSize').value;
        var fontSize = 12;
        switch (size) {
            case "tiny":
                fontSize = 7;
                break;
            case "small":
                fontSize = 10;
                break;
            case "medium":
                fontSize = 12;
                break;
            case "large":
                fontSize = 16;
                break;
            case "extraLarge":
                fontSize = 24;
                break;
            case "XXL":
                fontSize = 32;
                break;
            default:
                fontSize = 12;
        }
        document.getElementById('text').style.fontSize = fontSize + "pt";
    }

    function speed() {
        if (document.getElementById('start').disabled) {
            stop();
            start();
        }
    }
    window.onload = function () {
        document.getElementById('start').onclick = start;
        document.getElementById('stop').onclick = stop;
        document.getElementById('fontSize').onchange = modifyFontSize;
        document.getElementById('speed').onchange = speed;

    };
})();

