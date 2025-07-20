window.greetUser = function(nick) {
  const welcomeText = `👋 Ciao ${nick}! Benvenuto su NebulaLounge 🌌`;
  window.postMessage({
    type: "bot-message",
    sender: "BotNebula",
    text: welcomeText
  }, "*");
}
