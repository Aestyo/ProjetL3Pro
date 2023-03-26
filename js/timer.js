let timeLeft = 15; // temps initial en secondes
let countdownEl = document.getElementById("countdown");

function countdown() {
    timeLeft--;
    countdownEl.innerHTML = `Temps restant : ${timeLeft} !`;
    if (timeLeft === 0) {
        clearInterval(timerId);
        window.location.href = "../php/error-win.php";
    }
}

// Exemple d'utilisation
countdownEl.innerHTML = `Temps restant : ${timeLeft} !`;
const timerId = setInterval(countdown, 1000);