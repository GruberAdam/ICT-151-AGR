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

let selection = document.getElementById('inputState');

selection.addEventListener('change', function () {
    document.getElementById('input_delete_id').value = selection.options[selection.selectedIndex].text;

});

/* This will show the database async */
selection.addEventListener('change', function () {
    var index = selection.options[selection.selectedIndex].text;


    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var output = formatAjaxOutput(this.responseText);
            document.getElementById("input_modify_code").value = output[0];
            document.getElementById("input_modify_brand").value = output[1];
            document.getElementById("input_modify_model").value = output[2];
            document.getElementById("input_modify_length").value = output[3];
            document.getElementById("input_modify_schedule").value = output[4];
            document.getElementById("input_modify_price").value = output[5];
            document.getElementById("input_modify_active").value = output[6];
            document.getElementById("input_modify_description").innerHTML = output[7];
        }
    };
    xmlhttp.open("GET", "model/getSnowAjax.php?index=" + index, true);
    xmlhttp.send();
});


function formatAjaxOutput(text) {
    var counter = 0;
    var num = 0;
    var code = "";
    var brand = "";
    var model = "";
    var length = "";
    var schedule = "";
    var price = "";
    var active = "";
    var description = "";

    for (var i = 0; i < text.length; i++) {

        if (text[i] === "!") {
            switch (num) {
                case 0:
                    console.log("in");
                    code = text.substr(0, i);
                    num = 1;
                    wrd2 = i;
                    counter = 0;
                    break;
                case 1:
                    brand = text.substr(wrd2 + 1, counter - 1);
                    num = 2;
                    wrd3 = i;
                    counter = 0;
                    break;
                case 2:
                    model = text.substr(wrd3 + 1, counter -1);
                    num = 3;
                    wrd4 = i;
                    counter = 0;
                    break;
                case 3:
                    length = text.substr(wrd4 + 1, counter -1);
                    num = 4;
                    wrd5 = i;
                    counter = 0;
                    break;
                case 4:
                    schedule = text.substr(wrd5 + 1, counter -1);
                    num = 5;
                    wrd6 = i;
                    counter = 0;
                    break;
                case 5:
                    price = text.substr(wrd6 + 1, counter -1);
                    num = 6;
                    wrd7 = i;
                    counter = 0;
                    break;
                case 6:
                    active = text.substr(wrd7 + 1, counter -1);
                    num = 7;
                    wrd8 = i;
                    counter = 0;
                    break;
                case 7:
                    description = text.substr(wrd8 + 1, counter -1);
                    num = 8;
                    wrd8 = i;
                    counter = 0;
                    break;
            }
        }
        counter++;
    }

    var snows = [code, brand, model, length, schedule, price, active, description];

    return snows
}

function changeImg(v) {
    console.log(v);
    document.getElementById('snow_modify_display').src = v;
}