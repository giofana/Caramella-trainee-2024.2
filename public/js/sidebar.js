document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const openIcon = document.getElementById("open-button-icon");
  const closeIcon = document.getElementById("close-button-icon");
  const menuIcon = document.getElementById("menu-icon");
  const content = document.querySelector(".sidebar-container");

  function updateIcons() {
    if (window.innerWidth <= 768) {
      if (sidebar.classList.contains("close")) {
        menuIcon.style.display = "block";
        openIcon.style.display = "none";
        closeIcon.style.display = "none";
      } else {
        menuIcon.style.display = "none";
        openIcon.style.display = "block";
        closeIcon.style.display = "none";
      }
    } else {
      menuIcon.style.display = "none";
      if (sidebar.classList.contains("close")) {
        openIcon.style.display = "block";
        closeIcon.style.display = "none";
      } else {
        openIcon.style.display = "none";
        closeIcon.style.display = "block";
      }
    }
  }

  // Define a visibilidade inicial dos ícones com base no estado da barra lateral
  updateIcons();

  window.addEventListener("resize", updateIcons);

  document.getElementById("open-button").addEventListener("click", function () {
    sidebar.classList.toggle("close");
    content.classList.toggle("collapsed");
    content.classList.toggle("expanded");

    updateIcons(); // Atualiza os ícones após o clique
  });

  // Adiciona a classe 'active' ao item da sidebar correspondente à página atual
  const currentPath = window.location.pathname;
  const sidebarLinks = document.querySelectorAll("#sidebar-itens a");

  sidebarLinks.forEach((link) => {
    if (link.getAttribute("href") === currentPath) {
      link.querySelector(".side-item").classList.add("active");
    }
  });
});
