/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function () {
    var timer = null;

    function getvalue() {   //getting the value of text area
        var value = document.getElementById('text');
        return value;
    }
    function textModify() {             //changes in the test// increasing size
        var size = parseInt(getvalue().style.fontSize) ? parseInt(getvalue().style.fontSize) : 12;
        // var text = getvalue().style.fontSize = "24pt";
        size += 2;
        var text = getvalue().style.fontSize = size + "pt";
        // alert("Hello, world!");
    }

    function setTimer() {              //text size increment on time interval 
        if (timer === null) {
            timer = setInterval(textModify, 500);
        } else {
            clearInterval(timer);
            timer = null;
        }
    }

    function blingClick() {                 //checkbox event function
        if (document.getElementById('bling').checked) {
//            var text = getvalue().style.fontWeight = "bold";
            var text = getvalue().className += "textStyle1";
            document.body.className = "bgImage";
        }
        else {
            document.body.className = "";
            var text = getvalue().className += "textStyle2";
        }
    }
    window.onload = function () {                //onload event
        document.getElementById('btnDecoration').onclick = setTimer;
        document.getElementById('bling').onchange = blingClick;
    };
})();
