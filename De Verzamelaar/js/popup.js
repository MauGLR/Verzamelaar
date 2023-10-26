function openPopup(gameName, gameDescription, gamePlatform, gameRating) {
    document.getElementById("popup-title").textContent = gameName;
    document.getElementById("popup-description").textContent = "Beschrijving: " + gameDescription;
    document.getElementById("popup-platform").textContent = "Platform: " + gamePlatform;
    document.getElementById("popup-rating").textContent = "Rating: " + gameRating;

    var popup = document.getElementById("game-popup");
    popup.style.display = "block";
}

function closePopup() {
    var popup = document.getElementById("game-popup");
    popup.style.display = "none";
}
