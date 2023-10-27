function openPopup(gameId, gameBox) {
    var gameDetails = gameBox.querySelector(".game-details");

    document.getElementById("popup-title").textContent = gameBox.querySelector("h3").textContent;
    document.getElementById("popup-image").src = gameBox.querySelector("img").src;
    document.getElementById("popup-description").textContent = "Beschrijving: " + gameDetails.getAttribute("data-description");
    document.getElementById("popup-platform").textContent = "Platform: " + gameDetails.getAttribute("data-platform");
    document.getElementById("popup-rating").textContent = "Rating: " + gameDetails.getAttribute("data-rating");
    document.getElementById("popup-price").textContent = "Prijs: " + gameDetails.getAttribute("data-price");
    document.getElementById("popup-genre").textContent = "Genre: " + gameDetails.getAttribute("data-genre");
    document.getElementById("popup-publisher").textContent = "Uitgever: " + gameDetails.getAttribute("data-publisher");
    document.getElementById("popup-release-date").textContent = "Releasedatum: " + gameDetails.getAttribute("data-release-date");

    var popup = document.getElementById("game-popup");
    popup.style.display = "block";
}


function closePopup() {
    var popup = document.getElementById("game-popup");
    popup.style.display = "none";
}
