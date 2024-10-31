const tela = document.querySelector('#tela');

function openModal(modalId) {
    const modal = document.getElementById(modalId)
    modal.style.display = 'block'
    tela.style.display = 'block';
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId)
    modal.style.display = 'none'
    tela.style.display = 'none';
}