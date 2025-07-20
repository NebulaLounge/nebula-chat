export function greetUser(nick) {
  const welcomeText = `👋 Benvenuto ${nick}! Ti aspetta l'universo di NebulaLounge 🚀`;

  window.postMessage({
    type: "bot-message",
    sender: "BotNebula",
    text: welcomeText
  }, "*");
}
