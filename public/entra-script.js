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

    const isRegistered = config.registeredNicks && isRegisteredNick(nickSanitized, config.registeredNicks);

  if (isRegistered && !password) {
    const conferma = confirm("⚠️ Il nickname è registrato ma non hai inserito la password.\nVerrai identificato come guest nella chat. Vuoi continuare?");
    if (!conferma) return;
  }
  
  localStorage.setItem("nick", nickSanitized);
  localStorage.setItem("sex", sex);
  localStorage.setItem("looking", looking);
  localStorage.setItem("city", city);
  if (password) localStorage.setItem("password", password);

  window.location.href = "join.html";
};
