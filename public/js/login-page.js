const togglePassword = document.getElementById('togglePassword')
const password = document.getElementById('senha')

togglePassword.addEventListener('click', () => {
    // Verifica o tipo atual do input de senha
    const isPasswordType = password.type === 'password'

    // Alterna o tipo do campo de senha
    if (isPasswordType) {
        password.type = 'text'
    } else {
        password.type = 'password'
    }

    // Alterna os ícones
    togglePassword.classList.toggle('fa-eye')
    togglePassword.classList.toggle('fa-eye-slash')
})