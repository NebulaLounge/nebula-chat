export function sanitizeNick(nick) {
  return nick
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .trim()
    .replace(/\s+/g, "_")
    .replace(/[^\w-]/g, "")
    .toLowerCase();
}

export function isRegisteredNick(nickSanitized, registeredNicks) {
  return registeredNicks
    .map(n => sanitizeNick(n))
    .includes(nickSanitized);
}
