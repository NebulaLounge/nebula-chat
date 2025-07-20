export function greetUser(nick) {
  const welcomeText = `👋 Benvenuto ${nick}! Inizia la tua avventura su 🌌 NebulaLounge`;

  const chatFrame = document.getElementById("chatFrame");
  if (chatFrame && chatFrame.contentWindow) {
    chatFrame.contentWindow.postMessage({
      type: "bot-message",
      sender: "BotNebula",
      text: welcomeText
    }, "*");
  }
}
