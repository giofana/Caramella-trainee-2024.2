document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const openIcon = document.getElementById("open-button-icon");
  const closeIcon = document.getElementById("close-button-icon");

  // Define a visibilidade inicial dos ícones com base no estado da barra lateral
  if (sidebar.classList.contains("close")) {
    openIcon.style.display = "block";
    closeIcon.style.display = "none";
  } else {
    openIcon.style.display = "none";
    closeIcon.style.display = "block";
  }

  document.getElementById("open-button").addEventListener("click", function () {
    sidebar.classList.toggle("close");

    if (sidebar.classList.contains("close")) {
      openIcon.style.display = "block";
      closeIcon.style.display = "none";
    } else {
      openIcon.style.display = "none";
      closeIcon.style.display = "block";
    }
  });
});
