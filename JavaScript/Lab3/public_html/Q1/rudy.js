(function () {
    "use strict";
    var timer = null;
    var rudyTimer = (function () {
        return function () {
            if (timer === null) {
                timer = setInterval(rudy, 1000);
            } else {
                clearInterval(timer);
                timer = null;
            }
        };
    })();
    var rudy = function rudy() {
        document.getElementById("text").innerHTML += "Rudy!";
    };

    window.onload = function () {
        document.getElementById("rudy").onclick = rudyTimer;
    };
})();
