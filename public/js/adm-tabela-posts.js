const tela = document.querySelector("#tela");

function openModal(modalId, mode = null, ingredients = null, id = null) {
  const modal = document.getElementById(modalId);
  modal.style.display = "block";
  tela.style.display = "block";

  if (mode == "view") {
    displayIngredients(ingredients, id);
  } else if (mode == "edit") {
    console.log(ingredientes);
    displayIngredientsEdit(ingredients, id);
  }
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

    const ingredientesList = document.getElementById("ingredientesListCreate");
    const li = document.createElement("li");
    li.classList.add("ingrediente-item"); // Adiciona a classe ao li

    const span = document.createElement("span");
    span.textContent = ingrediente;

    // Cria o botão de remoção
    const removeButton = document.createElement("button");
    removeButton.textContent = "x";
    removeButton.type = "button";
    removeButton.classList.add("remove-ingredient");
    removeButton.onclick = function () {
      removeIngredient(
        ingrediente,
        "ingredientesListCreate",
        ingredientes,
        "ingredientesCreate"
      );
    };

    li.appendChild(span);
    li.appendChild(removeButton);
    ingredientesList.appendChild(li);

    // Atualiza o campo hidden com os ingredientes em JSON
    document.getElementById("ingredientesCreate").value =
      JSON.stringify(ingredientes);
  }
  console.log(ingredientes);
}

// Funcao para remover o ingrediente -> remover da lista exibida e do array
function removeIngredient(
  ingredienteRemove,
  listElement,
  ingredienteJson,
  inputHiddenName
) {
  const index = ingredienteJson.indexOf(ingredienteRemove);
  console.log(index);
  if (index > -1) {
    ingredienteJson.splice(index, 1); // Remove o ingrediente do array json

    const ingredientesList = document.getElementById(listElement);
    // removendo do html
    const li = ingredientesList.children[index];
    ingredientesList.removeChild(li); // Remove o item da lista exibida

    // Atualiza o campo hidden com os ingredientes em JSON
    document.getElementById(inputHiddenName).value =
      JSON.stringify(ingredienteJson);
  }

  console.log(ingredienteJson);
}

// Adiciona o placeholder no evento hover
const ingredienteInput = document.getElementById("ingredienteInput");
ingredienteInput.addEventListener("mouseover", function () {
  ingredienteInput.setAttribute("placeholder", "Adicione um ingrediente");
});
ingredienteInput.addEventListener("mouseout", function () {
  ingredienteInput.removeAttribute("placeholder");
});

// Função para exibir os ingredientes do JSON à lista
function displayIngredients(ingredientesView, id) {
  const modalIngredientesList = document.getElementById(
    "ingredientesListView" + id.toString()
  );

  console.log(typeof id.toString());

  ingredientesView.forEach((ingrediente) => {
    const li = document.createElement("li");
    li.classList.add("ingrediente-item"); // Adiciona a classe ao li

    const span = document.createElement("span");
    span.textContent = ingrediente;

    li.appendChild(span);
    modalIngredientesList.appendChild(li);
  });
}

// Função para editar os ingredientes do JSON à lista
function displayIngredientsEdit(ingredientsEdit, id) {
  const modalIngredientesList = document.getElementById(
    "ingredientesListEdit" + id.toString()
  );

  ingredientsEdit.forEach((ingrediente) => {
    const li = document.createElement("li");
    li.classList.add("ingrediente-item"); // Adiciona a classe ao li

    const span = document.createElement("span");
    span.textContent = ingrediente;

    // Cria o botão de remoção
    const removeButton = document.createElement("button");
    removeButton.textContent = "x";
    removeButton.classList.add("remove-ingredient");
    removeButton.type = "button";

    removeButton.onclick = function () {
      removeIngredient(
        ingrediente,
        "ingredientesListEdit" + id.toString(),
        ingredientsEdit,
        "ingredientesEdit" + id.toString()
      );
    };

    li.appendChild(span);
    li.appendChild(removeButton);
    modalIngredientesList.appendChild(li);
  });

  // Atualiza o campo hidden com os ingredientes em JSON
  document.getElementById("ingredientes").value = JSON.stringify(ingredientes);
}

// Função para adicionar ingrediente na lista de edição e no array -> adiciona html para exibição
function addIngredientEdit(id) {
  const ingredienteInput = document.getElementById(
    "editIngredienteInput" + id.toString()
  );

  // obtendo ingredientes antigos para editar
  ingredientes = document.getElementById(
    "ingredientesEdit" + id.toString()
  ).value;
  // obtendo ingrediente para add
  const ingredienteNovo = ingredienteInput.value.trim();
  // transformando ingredientes antigos em json -> reutilizando a variuavel criada no escopo global
  ingredientes = JSON.parse(ingredientes);

  if (ingredienteNovo) {
    ingredientes.push(ingredienteNovo);
    ingredienteInput.value = "";

    const ingredientesList = document.getElementById(
      "ingredientesListEdit" + id.toString()
    );

    const li = document.createElement("li");
    li.classList.add("ingrediente-item"); // Adiciona a classe ao li

    const span = document.createElement("span");
    span.textContent = ingredienteNovo;

    // Cria o botão de remoção
    const removeButton = document.createElement("button");
    removeButton.textContent = "x";
    removeButton.type = "button";
    removeButton.classList.add("remove-ingredient");
    removeButton.onclick = function () {
      removeIngredient(
        ingredienteNovo,
        "ingredientesListEdit" + id.toString(),
        ingredientes,
        "ingredientesEdit" + id.toString()
      );
    };

    li.appendChild(span);
    li.appendChild(removeButton);
    ingredientesList.appendChild(li);

    // Atualiza o campo hidden com os ingredientes em JSON
    document.getElementById("ingredientesEdit" + id.toString()).value =
      JSON.stringify(ingredientes);
  }
  console.log(ingredientes);
}
