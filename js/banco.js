const enviarPlacar = async(jogador, personagem, vitorias, derrotas, empate) => {
    const response = await fetch('./php/sincronizar_placar.php', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            jogador: jogador,
            personagem: personagem,
            vitorias: vitorias,
            derrotas: derrotas,
            empate: empate
        })
    })
    alert("dados do jogo - Jogador:" + jogador + " - Personagem: " + personagem)
    
    const data = await response.json();
    console.log(data);
};
 
// Função de exemplo para atualizar e sincronizar o placar
function atualizaPlacar(jogador, personagem, vitorias, derrotas, empate) {
//    //Atualiza o placar na interface do jogo
//     document.getElementById('vitoriasGu').innerText = vitorias;
//     document.getElementById('derrotasGu').innerText = derrotas;

 
    // Envia o placar para o servidor
    enviarPlacar(jogador, personagem, vitorias, derrotas, empate);
    
}
