<div class="modall modal-del" id="modalDel<?= $post->id ?>">
      <div class="modal-content excluir">
        <h1>Excluir Post</h1>
        <img src="../../../public/assets/trash.png" />

        <p>Tem certeza que deseja excluir este post?</p>
        <form action="posts-list/delete" method="POST">
          <input type="hidden" name="idDelete" value="<?= $post->id ?>">
          <div id="btCC2">
            <button class="canc" type="button" onclick="closeModal('modalDel<?= $post->id ?>')">
              Cancelar
            </button>
            <button class="exc" type="submit">Excluir</button>
          </div>
        </form>
      </div>
    </div>