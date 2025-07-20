export function greetUser(nick) {
  const welcomeText = `👋 Ciao ${nick}! Benvenuto su NebulaLounge 🌌`;

  // Log di controllo: appare nella console per confermare che il bot si attiva
  console.log("BotNebula saluta:", welcomeText);

  // Invio del messaggio al parent per essere visualizzato
  window.postMessage({
    type: "bot-message",
    sender: "BotNebula",
    text: welcomeText
  }, "*");
}
