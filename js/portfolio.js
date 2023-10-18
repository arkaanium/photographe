$(document).ready(function() {
    document.getElementById("items").innerHTML = "Chargement en cours...";
    getPortfolio(1);
});

document.getElementById('category').onchange = function() {
    getPortfolio(1);
}

function getPortfolio(page) {
    category = document.getElementById('category').value;
    $.ajax({
        url: ("ajax/portfolio.php?cat="+category+"&page="+page),
        type: "GET",
        success: function(result) {
          document.getElementById("items").innerHTML = result;
        }
    });
}

function resetFilters() {
    document.getElementById('filters').reset();
    getPortfolio(1);
}