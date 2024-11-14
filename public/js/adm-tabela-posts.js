const tela = document.querySelector("#tela");

function openModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = "block";
  tela.style.display = "block";
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = "none";
  tela.style.display = "none";
}

// ------------------ Manipulando ingredientes -----------------

// array para transformar os ingredientes em um json
let ingredientes = [];

// Função para add ingrediente na lista e no array -> adiciona html para exibição
function addIngredient() {
  const ingredienteInput = document.getElementById("ingredienteInput");
  const ingrediente = ingredienteInput.value.trim();

  if (ingrediente) {
    ingredientes.push(ingrediente);
    ingredienteInput.value = "";

    const ingredientesList = document.getElementById("ingredientesList");
    const li = document.createElement("li");
    li.classList.add("ingrediente-item"); // Adiciona a classe ao li

    const span = document.createElement("span");
    span.textContent = ingrediente;

    // Cria o botão de remoção
    const removeButton = document.createElement("button");
    removeButton.textContent = "x";
    removeButton.classList.add("remove-ingredient");
    removeButton.onclick = function () {
      removeIngredient(ingrediente);
    };

    li.appendChild(span);
    li.appendChild(removeButton);
    ingredientesList.appendChild(li);

    // Atualiza o campo hidden com os ingredientes em JSON
    document.getElementById("ingredientes").value =
      JSON.stringify(ingredientes);
  }
  console.log(ingredientes);
}

// Funcao para remover o ingrediente -> remover da lista exibida e do array
function removeIngredient(ingrediente) {
  const index = ingredientes.indexOf(ingrediente);
  if (index > -1) {
    ingredientes.splice(index, 1); // Remove o ingrediente do array

    const ingredientesList = document.getElementById("ingredientesList");
    const li = ingredientesList.children[index];
    ingredientesList.removeChild(li); // Remove o item da lista exibida

    // Atualiza o campo hidden com os ingredientes em JSON
    document.getElementById("ingredientes").value =
      JSON.stringify(ingredientes);
  }

  console.log(ingredientes);
}

// Adiciona o placeholder no evento hover
const ingredienteInput = document.getElementById("ingredienteInput");
ingredienteInput.addEventListener("mouseover", function () {
  ingredienteInput.setAttribute("placeholder", "Adicione um ingrediente");
});
ingredienteInput.addEventListener("mouseout", function () {
  ingredienteInput.removeAttribute("placeholder");
});
