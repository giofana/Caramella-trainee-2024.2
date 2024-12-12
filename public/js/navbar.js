let clickCount = 0;

document.addEventListener("DOMContentLoaded", () => {
  const secretButton = document.getElementById("secretButton");

  secretButton.addEventListener("click", () => {
    clickCount++;

    if (clickCount === 7) {
      localStorage.setItem("showCookieAlert", "true"); // Coloca o item "showCookieAlert" no localstorage como true
      clickCount = 0; // Reinicia a contagem

      // Exibe o modal se ele existir na página atual
      const modal = document.getElementById("cookieModal");
      if (modal) {
        modal.style.display = "flex";
        localStorage.removeItem("showCookieAlert"); // Remove o item para evitar repetição
      }
    }
  });
});
