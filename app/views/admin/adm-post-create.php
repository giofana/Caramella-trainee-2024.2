<!-- modal-criar.php -->
<div class="modal" id="modalCriar">
  <form method="POST" action="posts-list/create">
    <h2>Preencha todos os campos abaixo para criar post:</h2>
    <div class="inputModal">
      <label for="Título">Título da receita</label>
      <input required id="Título" type="text" name="titulo-receita"/>
    </div>
    <div class="auxSubForm">
      <div class="subForm">
        <div class="inputModal" id="autor">
          <label for="Autor">Autor</label>
          <input required id="Autor" type="text" name="autor-receita"/>
        </div>
        <div class="inputModal" id="tempo">
          <label for="Tempo">Tempo</label>
          <input required id="Tempo" type="text" name="tempo-receita"/>
        </div>
      </div>
      <div class="subForm">
        <div class="inputModal" id="custo">
          <label for="Custo">Custo</label>
          <select required id="Custo" name="custo-receita">
            <option value="#" selected></option>
            <option value="0">Barato</option>
            <option value="1">Intermediário</option>
            <option value="2">Caro</option>
          </select>
        </div>
        <div class="inputModal" id="dificuldade">
          <label for="Dificuldade">Dificuldade</label>
          <select required id="Dificuldade" name="dificuldade-receita">
            <option value="#" selected></option>
            <option value="0">Fácil</option>
            <option value="1">Médio</option>
            <option value="2">Difícil</option>
          </select>
        </div>
      </div>
    </div>
    <div class="inputModal">
      <label for="Ingredientes">Ingredientes</label>
      <input  id="ingredienteInput" type="text" />

      <div class="btt-ingredient">
        <button type="button" onclick="addIngredient()" id="create-ingredient">
          Adicionar Ingrediente
        </button>

      </div>
    </div>
    <ul id="ingredientesListCreate"></ul>
    <input required type="hidden" id="ingredientesCreate" name="ingredientes-receita" />

    <div class="inputModal">
      <label for="Modo">Modo de preparo</label>
      <textarea id="Modo" rows="3" name="modo-receita"></textarea>
    </div>
    <div class="inputModal">
      <label for="História">História</label>
      <textarea id="História" rows="3" name="historia-receita"></textarea>
    </div>
    <div class="inputModal">
      <label for="Imagem">Imagem</label>
      <input required id="Imagem" type="file" name="imagem-receita"/>
    </div>
    <div id="btCC">
      <button>Criar</button>
      <button type="button" onclick="closeModal('modalCriar')">Cancelar</button>
    </div>
  </form>
</div>