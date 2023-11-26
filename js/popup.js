// Pegando id das tags
const openButton = document.getElementById("open-popup");
const popupFront = document.getElementById("popup-front");
const closeButton = document.getElementById("popup-close");

openButton.addEventListener("click", () => {
    popupFront.style.display = "block";
});

closeButton.addEventListener("click", () => {
    popupFront.style.display = "none";
});
