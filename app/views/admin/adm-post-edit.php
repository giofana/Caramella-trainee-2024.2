
    <div class="modal" id="modalEditar<?= $post->id; ?>">
      <form action="posts-list/edit-post" method="POST">
        <h2>Preencha todos os campos abaixo para criar post:</h2>
        <div class="inputModal">
          <label for="Título1">Título da receita</label
          ><input id="Título1" type="text" name="editTitulo" value="<?= $post->title ?>"/>
        </div>
        <div class="auxSubForm">
          <div class="subForm">
            <div class="inputModal" id="autor1">
              <label for="Autor1">Autor</label><input id="Autor1" type="text" name="editAutor" value="<?= $post->author ?>" />
            </div>
            <div class="inputModal" id="tempo1">
              <label for="Tempo1">Tempo</label><input id="Tempo1" type="text" name="editTempo" value="<?= $post->time ?>" />
            </div>
          </div>
          <div class="subForm">
          <div class="inputModal" id="custo">
              <label for="Custo">Custo</label>
              <select id="Custo" name="editCusto">
                <?php if($post->cost == 0) :?>
                <option value="0" selected>Barato</option>
                <option value="1">Intermediário</option>
                <option value="2">Caro</option>
                <?php endif ?>
                <?php if($post->cost == 1) :?>
                <option value="0">Barato</option>
                <option value="1" selected>Intermediário</option>
                <option value="2">Caro</option>
                <?php endif ?>
                <?php if ($post->cost == 2) :?>
                <option value="0">Barato</option>
                <option value="1">Intermediário</option>
                <option value="2" selected>Caro</option>
                <?php endif ?>
              </select>
            </div>
            <div class="inputModal" id="dificuldade1">
              <label for="Dificuldade1">Dificuldade</label
              ><select id="Dificuldade1" name="editDificuldade">
              <?php if($post->difficulty == 0) :?>
                <option value="0" selected>Fácil</option>
                <option value="1">Médio</option>
                <option value="2">Difícil</option>
                <?php endif ?>
                <?php if($post->difficulty == 1) :?>
                <option value="0">Fácil</option>
                <option value="1" selected>Médio</option>
                <option value="2">Difícil</option>
                <?php endif ?>
                <?php if($post->difficulty == 2) :?>
                <option value="0">Fácil</option>
                <option value="1">Médio</option>
                <option value="2" selected>Difícil</option>
                <?php endif ?>
              </select>
            </div>
          </div>
        </div>

        <div class="inputModal">
          <label for="Ingredientes">Ingredientes</label>
          <!-- definindo ingrediente de modal especifico -->
          <input id="editIngredienteInput<?= $post->id; ?>" type="text" />

          <div class="btt-ingredient">
            <!-- fazer add ingredient -->
            <button
              type="button"
              onclick='editIngredients(<?= $post->id; ?>)'
              id="edit-ingredient"
            >
              Adicionar Ingrediente
            </button>

          </div>
        </div>
        <ul id="ingredientesListEdit<?= $post->id; ?>"></ul>
        <!-- para receber os ingredientes atuais e atuasliza com a edição -->
        <input type="hidden" id="ingredientesEdit" name="ingredientes" value='<?= $post->ingredients; ?>' />
        
        <div class="inputModal">
          <label for="Modo1">Modo de preparo</label
          ><textarea id="Modo1" rows="3" name="editPreparo"><?= $post->prepare ?></textarea>
        </div>
        <div class="inputModal">
          <label for="História1">História</label
          ><textarea id="História1" rows="3" name="editHistoria"><?= $post->history ?></textarea>
        </div>
        <div class="inputModal">
          <label for="Imagem1">Imagem</label><input id="Imagem1" type="file" name="editImagem" value="<?= $post->image ?>" />
        </div>
        <input type="hidden" name="editId" value="<?= $post->id ?>">
        <div id="btCC">
          <button type="submit">Editar</button>
          <button type="button" onclick="closeModal('modalEditar<?= $post->id; ?>')">Cancelar</button>
        </div>
      </form>
    </div>