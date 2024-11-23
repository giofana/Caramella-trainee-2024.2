
<div class="modal" id="modalVisu<?= $post->id ?>">
      <form>
        <h2>Preencha todos os campos abaixo para criar post:</h2>
        <div class="inputModal">
          <label for="Título2">Título da receita</label
          ><input id="Título2" type="text" value="<?= $post->title ?>" disabled/>
        </div>
        <div class="auxSubForm">
          <div class="subForm">
            <div class="inputModal" id="autor2">
              <label for="Autor2">Autor</label><input id="Autor2" type="text" value="<?= $post->author ?>"disabled />
            </div>
            <div class="inputModal" id="tempo2">
              <label for="Tempo2">Tempo</label><input id="Tempo2" type="text" value="<?= $post->time ?>"disabled />
            </div>
          </div>
          <div class="subForm">
          <div class="inputModal" id="custo">
              <label for="Custo">Custo</label>
              <select id="Custo" disabled>
                <?php if($post->cost == 0) :?>
                <option value="0" selected>Barato</option>
                <?php endif ?>
                <?php if($post->cost == 1) :?>
                <option value="1" selected>Intermediário</option>
                <?php endif ?>
                <?php if ($post->cost == 2) :?>
                <option value="2" selected>Caro</option>
                <?php endif ?>
              </select>
            </div>
            <div class="inputModal" id="dificuldade2">
              <label for="Dificuldade2">Dificuldade</label
              ><select id="Dificuldade2" disabled>
              <?php if($post->difficulty == 0) :?>
                <option value="0" selected>Fácil</option>
                <?php endif ?>
                <?php if($post->difficulty == 1) :?>
                <option value="1" selected>Médio</option>
                <?php endif ?>
                <?php if ($post->difficulty == 2) :?>
                <option value="2" selected>Difícil</option>
                <?php endif ?>
              </select>
            </div>
          </div>
        </div>


        <div class="inputModal">
          <label for="Ingredientes">Ingredientes</label>
        </div>
        <ul id="ingredientesListView<?= $post->id ; ?>" class="ingredientesList"></ul>
        <input type="hidden" id="ingredientes" name="ingredientes" />


        <div class="inputModal">
          <label for="Modo2">Modo de preparo</label
          ><textarea id="Modo2" rows="3" disabled><?= $post->prepare ?></textarea>
        </div>
        <div class="inputModal">
          <label for="História2">História</label
          ><textarea id="História2" rows="3" disabled><?= $post->history ?></textarea>
        </div>
        <div class="inputModal" id="imgEnviada">
          <label for="Imagem">Imagem</label
          <?php if ($post->image != ""): ?>
          ><img src="<?= $post->image ?>"/>
          <?php endif; ?>
          <?php if ($post->image == ""): ?>
          ><img src="public/imagens/no-picture.png" alt="Nenhuma imagem atribuída" style="box-shadow: none;"/>
          <?php endif; ?>
        </div>
        <div class="btnf">
          <button class="btnfechar" onclick="closeModal('modalCriar')">
            Fechar
          </button>
        </div>
      </form>
    </div>
