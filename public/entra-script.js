import { sanitizeNick, isRegisteredNick } from './utils.js';

let config = {};

// Carica config.json
fetch('config.json')
  .then(response => response.json())
  .then(data => {
    config = data;
  });

const nickInput = document.getElementById('nickinput');
const passwordInput = document.getElementById('passwordinput');
const infoBox = document.getElementById('infobox');

nickInput.addEventListener('input', () => {
  const rawNick = nickInput.value;
  const nickSanitized = sanitizeNick(rawNick);

  if (config.registeredNicks && isRegisteredNick(nickSanitized, config.registeredNicks)) {
    passwordInput.style.display = 'block';
    infoBox.textContent = "🔐 Nick registrato. Inserisci la password.";
  } else {
    passwordInput.style.display = 'none';
    infoBox.textContent = "";
    passwordInput.value = "";
  }
});

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

  localStorage.setItem("nick", nickSanitized);
  localStorage.setItem("sex", sex);
  localStorage.setItem("looking", looking);
  localStorage.setItem("city", city);
  if (password) localStorage.setItem("password", password);

  window.location.href = "join.html";
};
