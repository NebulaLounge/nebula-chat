import { sanitizeNick } from './utils.js';

window.addEventListener("DOMContentLoaded", () => {
  const nickInput = document.getElementById('nickinput');
  const passwordInput = document.getElementById('passwordinput');
  const infoBox = document.getElementById('infobox');

  // 🔍 Funzione per verificare se il nick è registrato su Simosnap
  async function isNickRegisteredOnSimosnap(nick) {
    try {
      const response = await fetch(`https://www.simosnap.org/rest/service.php/nickserv/${encodeURIComponent(nick)}`);
      if (!response.ok) return false;
      const data = await response.json();
      return data.nickname?.toLowerCase() === nick.toLowerCase();
    } catch (error) {
      console.error("Errore nella verifica del nick:", error);
      return false;
    }
  }

  // 🔁 Listener sul campo nickname
  nickInput.addEventListener('input', async () => {
    const rawNick = nickInput.value;
    const nickSanitized = sanitizeNick(rawNick);

    const isRegistered = await isNickRegisteredOnSimosnap(nickSanitized);

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
});
