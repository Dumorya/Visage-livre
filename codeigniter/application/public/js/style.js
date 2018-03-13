var nav                   = document.getElementById('nav').offsetHeight;
var content               = document.getElementById('content');
var filterButtonContainer = document.getElementById('filterButtonContainer');
var filterButton          = document.getElementById('filterButton');

// get nouvelle valeur de la hauteur de la navbar
function onElementHeightChange(nav, callback)
{
    var lastHeight = nav.offsetHeight, newHeight;
    (function run() {
        newHeight = nav.offsetHeight;
        if (lastHeight !== newHeight)
            callback();
        lastHeight = newHeight;
        content.style.paddingTop = 100 + lastHeight + "px";
        filterButtonContainer.style.marginTop = (lastHeight) + (filterButton.offsetHeight / 2) + "px";

        if (nav.onElementHeightChangeTimer)
            clearTimeout(nav.onElementHeightChangeTimer);

        nav.onElementHeightChangeTimer = setTimeout(run, 200);
    })();
}

onElementHeightChange(document.getElementById('nav'), function () {
});

var filtersBlock = document.getElementById('filtersBlock');
filtersBlock.style.marginTop = nav + "px";

function showFiltersBlock() {
    filtersBlock.style.height = "85vh";
    crossButton.style.display = "block";
    filterButton.style.display = "none";
}

var crossButton = document.getElementById('crossButton');

function closeFiltersBlock() {
    filtersBlock.style.height = "0px";
    crossButton.style.display = "none";
    filterButton.style.display = "block";
}

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the cross element that closes the modal
var cross = document.getElementsByClassName("close")[0];
var modalCancel = document.getElementById("modalCancel");

// When the user clicks the button, open the modal
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on the cross (x) or cancel button, close the modal
cross.onclick = function () {
    modal.style.display = "none";
}

modalCancel.onclick = function () {
    modal.style.display = "none";
    document.getElementById('modalForm').reset();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
