var menu = document.getElementById('menu')
var menuContainer = document.getElementById('menu-container')
var janela = window


menu.addEventListener('click', mostrarMenu)
janela.addEventListener('scroll', esconderMenuNoScroll)

/**
 * Mostrar e fechar Menu ao clicar.
 */
function mostrarMenu() {
    if (menuContainer.classList.contains('esconder')) {
        menuContainer.classList.remove('esconder')
        return
        //dd('mostrar')
    } 
    menuContainer.classList.add('esconder')
}

/*
* Esconder o menu ao scrolar. 
*/
function esconderMenuNoScroll() {
    if (! menuContainer.classList.contains('esconder')) {
        menuContainer.classList.add('esconder')
    }
}

/**
 * Debugador
 */
function dd(v) {
    console.log(v)
    
}