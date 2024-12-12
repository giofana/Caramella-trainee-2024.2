document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const openIcon = document.getElementById("open-button-icon");
  const closeIcon = document.getElementById("close-button-icon");
  const content = document.querySelector(".sidebar-container");

  // Define a visibilidade inicial dos ícones com base no estado da barra lateral
  if (sidebar.classList.contains("close")) {
    openIcon.style.display = "block";
    closeIcon.style.display = "none";
    content.classList.add("collapsed");
    content.classList.remove("expanded");
  } else {
    openIcon.style.display = "none";
    closeIcon.style.display = "block";
    content.classList.add("expanded");
    content.classList.remove("collapsed");
  }

  document.getElementById("open-button").addEventListener("click", function () {
    sidebar.classList.toggle("close");
    content.classList.toggle("collapsed");
    content.classList.toggle("expanded");

    if (sidebar.classList.contains("close")) {
      openIcon.style.display = "block";
      closeIcon.style.display = "none";
    } else {
      openIcon.style.display = "none";
      closeIcon.style.display = "block";
    }
  });

  // / Adiciona a classe 'active' ao item da sidebar correspondente à página atual
  const currentPath = window.location.pathname;
  const sidebarLinks = document.querySelectorAll("#sidebar-itens a");

  sidebarLinks.forEach((link) => {
    if (link.getAttribute("href") === currentPath) {
      link.querySelector(".side-item").classList.add("active");
    }
  });
});
