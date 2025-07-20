import { sanitizeNick } from './utils.js';

window.addEventListener("DOMContentLoaded", () => {
  const nickInput = document.getElementById('nickinput');
  const passwordInput = document.getElementById('passwordinput');
  const infoBox = document.getElementById('infobox');

  let useNickServVerification = true;

  // 🔧 Carica config.json per determinare se usare NickServ
  fetch('./config.json')
    .then(res => res.json())
    .then(config => {
      useNickServVerification = config.useNickServVerification ?? true;
    });

  // 🔍 Verifica se il nick è registrato su Simosnap
  async function isNickRegisteredOnSimosnap(nickOriginal) {
    try {
      const response = await fetch(`https://www.simosnap.org/rest/service.php/nickserv/${encodeURIComponent(nickOriginal)}`);
      if (!response.ok) return false;
      const data = await response.json();
      return data.nickname?.toLowerCase() === nickOriginal.toLowerCase();
    } catch (error) {
      console.error("Errore nella verifica del nick:", error);
      return false;
    }
  }

  // 🔁 Listener sul campo nick
  nickInput.addEventListener('input', async () => {
    const rawNick = nickInput.value;

    if (!useNickServVerification || !rawNick.trim()) {
      infoBox.textContent = "";
      passwordInput.style.display = 'none';
      passwordInput.value = "";
      return;
    }

    const isRegistered = await isNickRegisteredOnSimosnap(rawNick);

    if (isRegistered) {
      passwordInput.style.display = 'block';
      infoBox.textContent = "🔐 Nick registrato su Simosnap. Inserisci la password.";
    } else {
      passwordInput.style.display = 'none';
      infoBox.textContent = "";
      passwordInput.value = "";
    }
  });

  // ✅ Funzione di invio
  window.vaiAllaVerifica = function () {
    const rawNick     = nickInput.value;
    const nickSanitized = sanitizeNick(rawNick);
    const sex         = document.getElementById('sexselect').value;
    const looking     = document.getElementById('lookingselect').value;
    const city        = document.getElementById('cityinput').value.trim();
    const password    = passwordInput.value;

    if (!rawNick.trim() || !sex || !looking) {
      alert("Per favore compila tutti i campi obbligatori.");
      return;
    }

    localStorage.setItem("nick", nickSanitized);
    localStorage.setItem("sex", sex);
    localStorage.setItem("looking", looking);
    localStorage.setItem("city", city);

    if (password.trim()) {
      localStorage.setItem("password", password.trim());
    } else {
      localStorage.removeItem("password");
    }

    window.location.href = "join.html";
  };
});
