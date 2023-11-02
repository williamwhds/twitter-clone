// Pegando id das tags
const openButton = document.getElementById("open-sign-up");
const popup = document.getElementById("sign-up-popup");
const closeButton = document.getElementById("popup-close");

openButton.addEventListener("click", () => {
    popup.style.display = "block";
});

closeButton.addEventListener("click", () => {
    popup.style.display = "none";
});
