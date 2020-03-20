var background = document.getElementById('set-overlay');


var frontDialogDelete = document.getElementById('dialog-window_delete');


/* EVERYTHING ABOUT ADDING */
var frontDialogAdd = document.getElementById('dialog-window_add');
var addButton = document.getElementById('button-snow_add');
var exitButtonAdd = document.getElementById('button-exit-add');

addButton.addEventListener('click', function () {
    displayWidow(frontDialogAdd)
});

exitButtonAdd.addEventListener('click', function () {
    exitWindow(frontDialogAdd)
});


/* EVERYTHING ABOUT MODIFY */
var modifyButton = document.getElementsByClassName('button-snow_modifications');
var frontDialogModify = document.getElementById('dialog-window_modify');
var exitButtonModifications = document.getElementById('button-exit-modifications');

for (var i = 0; i < modifyButton.length; i++)
    modifyButton[i].addEventListener('click', function () {
        displayWidow(frontDialogModify)
    });

exitButtonModifications.addEventListener('click', function () {
    exitWindow(frontDialogModify)
});

function displayWidow(element) {
    background.id = "overlay";
    element.style.display = "block";
}

function exitWindow(element) {
    element.style.display = "none";
    document.getElementById('overlay').id = "set-overlay";
}

var selection = document.getElementById('inputState');

selection.addEventListener('change', function () {
    var index = selection.selectedIndex + 1


    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("input_modify").value = this.responseText;
        }
    };
    xmlhttp.open("GET", "model/getSnowAjax.php?index=" + index , true);
    xmlhttp.send();
});