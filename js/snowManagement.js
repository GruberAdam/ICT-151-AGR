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
var modifyButton = document.getElementById('button-snow_modifications');
var frontDialogModify = document.getElementById('dialog-window_modify');
var exitButtonModifications = document.getElementById('button-exit-modifications');

modifyButton.addEventListener('click', function () {
    displayWidow(frontDialogModify)
});

exitButtonModifications.addEventListener('click', function () {
    exitWindow(frontDialogModify)
});

function displayWidow(element) {
    console.log(element)
    background.id = "overlay";
    element.style.display = "block";
}

function exitWindow(element) {
    element.style.display = "none";
    document.getElementById('overlay').id = "set-overlay";
}