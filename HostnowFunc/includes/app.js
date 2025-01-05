let estado = document.getElementById('estado');


estado.onchange = function() {
    let cidade = document.getElementById('cidade');
    let valor = estado.value;
    fetch("select.php?pes_estado=" + valor)
    .then( response => {
        return response.text()
    })
    .then(texto => {
        cidade.innerHTML = texto;
    });
   

}

