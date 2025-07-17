import { sanitizeNick, isRegisteredNick } from './utils.js';

let config = {};

// Funzione per controllo blacklist
function containsBlacklistedWord(text, blacklist) {
  const lowerText = text.toLowerCase();
  return blacklist.some(word => lowerText.includes(word.toLowerCase()));
}

window.addEventListener("DOMContentLoaded", () => {
  const nickInput = document.getElementById('nickinput');
  const passwordInput = document.getElementById('passwordinput');
  const infoBox = document.getElementById('infobox');

  // Carica config.json
  fetch('config.json')
    .then(response => response.json())
    .then(data => {
      config = data;

      // Attiva il listener sul nickname
      nickInput.addEventListener('input', () => {
        const rawNick = nickInput.value;
        const nickSanitized = sanitizeNick(rawNick);

        if (isRegisteredNick(nickSanitized, config.registeredNicks)) {
          passwordInput.style.display = 'block';
          infoBox.textContent = "🔐 Nick registrato. Inserisci la password.";
        } else {
          passwordInput.style.display = 'none';
          infoBox.textContent = "";
          passwordInput.value = "";
        }
      });
    });

  // Funzione di verifica e invio
  window.vaiAllaVerifica = function () {
    const rawNick = nickInput.value;
    const nickSanitized = sanitizeNick(rawNick);
    const sex = document.getElementById('sexselect').value;
    const looking = document.getElementById('lookingselect').value;
    const city = document.getElementById('cityinput').value.trim();
    const password = passwordInput.value;

    if (!nickSanitized || !sex || !looking) {
      alert("Per favore compila tutti i campi obbligatori.");
      return;
    }

    if (containsBlacklistedWord(nickSanitized, config.blacklist) || containsBlacklistedWord(city, config.blacklist)) {
      alert("❌ Il nickname o la città contiene parole non consentite.");
      return;
    }

    localStorage.setItem("nick", nickSanitized);
    localStorage.setItem("sex", sex);
    localStorage.setItem("looking", looking);
    localStorage.setItem("city", city);
    if (password) localStorage.setItem("password", password);

    window.location.href = "join.html";
  };
});
