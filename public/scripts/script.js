var deleteBtnTable = document.getElementById('delete-btn-table')

var b = document.body

b.addEventListener('click', removeBorder)

function removeBorder() {
  if (deleteBtnTable.classList.contains('borda-cinza')) {
    deleteBtnTable.classList.remove('borda-cinza')
  }
}

deleteBtnTable.addEventListener('click', putBorder)

function putBorder() 
{
  if (! deleteBtnTable.classList.contains('borda-cinza')) {
    deleteBtnTable.classList.add('borda-cinza')
  }
}


