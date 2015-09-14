// orderit.js Solution by Sylvia Tashev - April 25, 2009
// modified by Roy McElmurry - Summer 2012
/*jslint browser: true */
(function () {
    "use strict";

    // grabs the contents of the text box and puts the lines in an array
    function getLines() {
        var textarea = document.getElementById("text");
        return textarea.value.split("\n");
    }

    // replaces the contents of the text box with the result
    function putLines(a) { //a should be an array of strings
        var textarea = document.getElementById("text");
        textarea.value = a.join("\n");
    }

    // removes all text from text area
    function clearAll() {
        var textarea = document.getElementById("text");
        textarea.value = "";
    }

    // converts to uppercase
    function capitalize() {
        var textarea = document.getElementById("text");
        textarea.value = textarea.value.toUpperCase();
    }

    // sorts by alphabetical order
    function sort() {
        var a = getLines();
        a.sort();
        putLines(a);
    }

    // reverses order
    function reverse() {
        var a = getLines();
        a.reverse();
        putLines(a);
    }

    // shuffles by randomly swapping elements
    function shuffle() { //a) {
        var a, i;
        a = getLines();
        for (i = 0; i < a.length; i++) {
            // swap each element i with another randomly chosen element in
            // the range [i, a.length)
            var j = i + parseInt(Math.random() * (a.length - i));
            if (i !== j) {
                var temp = a[i]; // swap
                a[i] = a[j];
                a[j] = temp;
            }
        }
        putLines(a);
    }

    // removes empty lines
    function stripBlank() {
        var a = getLines();
        var a2 = [];
        for (var i = 0; i < a.length; i++) {
            if (a[i]) {
                a2.push(a[i]);
            }
        }
        putLines(a2);
    }

    // adds numbers "1. " to the front of each item
    function lineNumbers(a) {
        var a = getLines();
        for (var i = 0; i < a.length; i++) {
            a[i] = (i + 1) + ". " + a[i];
        }
        putLines(a);
    }


    window.onload = function () {
        document.getElementById('clearAll').onclick = clearAll;
        document.getElementById('capitalize').onclick = capitalize;
        document.getElementById('sort').onclick = sort;
        document.getElementById('reverse').onclick = reverse;
        document.getElementById('lineNumbers').onclick = lineNumbers;
        document.getElementById('stripBlank').onclick = stripBlank;
        document.getElementById('shuffle').onclick = shuffle;
    };
})();