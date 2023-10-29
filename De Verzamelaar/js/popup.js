var shoppingCart = [];

function openPopup(gameBox) {
    console.log("Button clicked");

    var $gameBox = $(gameBox);
    var gameDetails = {
        description: $gameBox.data("description"),
        platform: $gameBox.data("platform"),
        rating: $gameBox.data("rating"),
        prijs: $gameBox.data("prijs"),
        genre: $gameBox.data("genre"),
        publisher: $gameBox.data("publisher"),
        release_date: $gameBox.data("release-date")
    };

    $("#popup-title").text($gameBox.find("h3").text());
    $("#popup-image").attr("src", $gameBox.find("img").attr("src"));
    $("#popup-description").text("Beschrijving: " + gameDetails.description);
    $("#popup-platform").text("Genre: " + gameDetails.platform);
    $("#popup-rating").text("Uitgever: " + gameDetails.rating);
    $("#popup-prijs").text("Prijs: " + gameDetails.prijs);
    $("#popup-genre").text("Genre: " + gameDetails.genre);
    $("#popup-publisher").text("Uitgever: " + gameDetails.publisher);
    $("#popup-release-date").text("Releasedatum: " + gameDetails.release_date);

    $("#game-popup").css("display", "block");
}

var userEmail = ""; // Initialize the userEmail variable

function addToCart(button) {
    // Check if the user's email is already stored
    if (userEmail === "") {
        userEmail = prompt("Please enter your email:");
        if (!userEmail) {
            return; // If the user cancels the prompt, do not proceed
        }
    }

    var gameName = $(button).data("naam");
    var prijs = $(button).data("price");

    var cartItem = {
        gameName: gameName,
        email: userEmail, // Use the stored email
        prijs: prijs,
    };

    shoppingCart.push(cartItem);

    // Update the cart UI
    updateCartUI();
}

function updateCartUI() {
    var cartItemsDiv = $("#cart-items");
    cartItemsDiv.empty(); // Clear the cart content

    for (var i = 0; i < shoppingCart.length; i++) {
        var cartItem = shoppingCart[i];
        var cartItemHtml = `
            <div class="cart-item">
                <span>Game: ${cartItem.gameName}</span>
                <span>Email: ${cartItem.email}</span>
                <span>Prijs: ${cartItem.prijs}</span>
            </div>
        `;
        cartItemsDiv.append(cartItemHtml);
    }
}

function checkoutPopup() {
    var userName = prompt("Vul uw naam in:");
    if (userName) {
        var email = prompt("Vul uw e-mail in:");
        if (email) {
            var gamesPurchased = shoppingCart.map(item => item.gameName).join(", ");
            // This is a simple alert for demonstration
            alert(
                "Uw naam is " +
                userName +
                " u heeft de volgende games gekocht: " +
                gamesPurchased +
                ". De codes voor de games zijn naar uw e-mail gestuurd: " +
                email
            );
        }
    }
}




function closePopup() {
    $("#game-popup").css("display", "none");
}
