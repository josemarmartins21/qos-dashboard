var ano_atual = document.getElementById('ano')
var ano = new Date().getFullYear()

function atualizarAno() {
    ano_atual.innerText = ano 
}

/*Perguntas Frequentes FAQ */
var perguntasContainer = document.querySelectorAll('.pergunta-container')

perguntasContainer.forEach((container) => {
    var mostrar = container.querySelector('#mostrar')
    var esconder = container.querySelector('#esconder')
    var resposta = container.querySelector('.resposta')

    if (!mostrar || !esconder || !resposta) return

    resposta.style.maxHeight = '0px'

    mostrar.addEventListener('click', () => {
        resposta.classList.add('show')
        resposta.style.maxHeight = resposta.scrollHeight + 'px'
        esconder.style.display = 'flex'
        mostrar.style.display = 'none'
    })

    esconder.addEventListener('click', () => {
        resposta.style.maxHeight = '0px'
        resposta.classList.remove('show')
        esconder.style.display = 'none'
        mostrar.style.display = 'inline-flex'
    })
})

/* MENU Hamburguer */

var menu = document.getElementById('menu-hamburguer')
var menuContainer = document.getElementById('menu-container')
var janela = window

janela.addEventListener('resize', mostrarHamburguer)

menu.addEventListener('click', (e) => {
    if (e.target.id == 'menu-hamburguer') {
        if (!menuContainer.classList.contains('menu-open')) {
            menuContainer.classList.add('menu-open')
            menuContainer.style.maxHeight = menuContainer.scrollHeight + 'px'
        } else {
            menuContainer.style.maxHeight = '0px'
            menuContainer.classList.remove('menu-open')
        } 
    }
})

function mostrarHamburguer() {
    if (janela.innerWidth > 600) {
        menuContainer.style.maxHeight = 'none'
        menuContainer.classList.remove('menu-open')
    } else {
        menuContainer.style.maxHeight = '0px'
        menuContainer.classList.remove('menu-open')

    }
}

/* Deixar de exibir a lista de links  */
janela.addEventListener('scroll', () => {
    if (janela.innerWidth <= 600) {
        if (menuContainer.classList.contains('menu-open')) {
            menuContainer.style.maxHeight = '0px'
            menuContainer.classList.remove('menu-open')
        }
        
    }
})




