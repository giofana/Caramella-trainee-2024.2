document.getElementById("open-button").addEventListener("click", function () {
  const sidebar = document.getElementById("sidebar");
  sidebar.classList.toggle("close");

  const openIcon = document.getElementById("open-button-icon");
  const closeIcon = document.getElementById("close-button-icon");

  if (sidebar.classList.contains("close")) {
    openIcon.style.display = "block";
    closeIcon.style.display = "none";
  } else {
    openIcon.style.display = "none";
    closeIcon.style.display = "block";
  }
});
