let timeLeft = 15; // temps initial en secondes
let countdownEl = document.getElementById("countdown");

function countdown() {
    timeLeft--;
    countdownEl.innerHTML = `Temps restant : ${timeLeft} !`;
    if (timeLeft === 0) {
        clearInterval(timerId);
        countdownEl.innerHTML = "Temps écoulé ! Retente ta chance";
        document.getElementById("answer-btn").style.display = "none";
    }
}

// Exemple d'utilisation
countdownEl.innerHTML = `Temps restant : ${timeLeft} !`;
const timerId = setInterval(countdown, 1000);