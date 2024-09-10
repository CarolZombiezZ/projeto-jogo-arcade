document.getElementById('jogar').addEventListener('click', function() {
    // Captura os valores dos inputs
    var player1 = document.getElementById('Player1').value;
    var player2 = document.getElementById('Player2').value;

    // Cria um objeto com os dados dos jogadores
    var data = {
        player1: player1,
        player2: player2
    };

    // Envia os dados via fetch usando POST e JSON
    fetch('./php/incluir.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // Indica que os dados estão em formato JSON
        },
        body: JSON.stringify(data) // Converte os dados em uma string JSON
    })
    .then(response => response.text()) // Processa a resposta do servidor como texto
    .then(result => {
        alert(result); // Mostra a resposta do servidor
        // Redireciona para outra página, se necessário
        window.location.href = 'outra_pagina.html';
    })
    .catch(error => {
        console.error('Erro:', error); // Exibe qualquer erro que ocorra
        alert('Erro ao inserir os dados.');
    });
});