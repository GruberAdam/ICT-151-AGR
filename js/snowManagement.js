var modifyButton = document.getElementById('button-snow_modifications');
var background = document.getElementById('set-overlay');
var frontDialog = document.getElementById('dialog-window');
var exitButton = document.getElementById('button-exit');

console.log(frontDialog)
modifyButton.addEventListener('click', function () {
    background.id = "overlay"
    frontDialog.style.display = "block";
});

exitButton.addEventListener('click', function () {
   frontDialog.style.display = "none";
   document.getElementById('overlay').id = "set-overlay";
});