
// Inicializa o placar com valores salvos ou com o padrão se for a primeira vez
const vitorias = JSON.parse(sessionStorage.getItem('vitorias')) || {
    "player1": {
        "vitoria": 0,
        "empate": 0,
        "derrota": 0
    },
    "player2": {
        "vitoria": 0,
        "empate": 0,
        "derrota": 0
    }
};

let timer = 60;
let timerID;
let gameEnded = false;  // Flag para verificar se o jogo terminou

var btn_reset=document.getElementById('resetButton');
var tempo=document.querySelector('#timer');

var gutsVitoria = document.querySelector("#vitoriasGu");
var gutsEmpate = document.querySelector("#empateGu");
var gutsDerrota = document.querySelector("#derrotasGu");
 
var caVitoria = document.querySelector("#vitoriasCa");
var caEmpate = document.querySelector("#empateCa");
var caDerrota = document.querySelector("#derrotasCa");

var backLoginButton = document.getElementById("backLogin");


function imprimeVitoria() {
    gutsVitoria.innerHTML = vitorias.player1.vitoria;
    gutsDerrota.innerHTML = vitorias.player1.derrota;
    gutsEmpate.innerHTML = vitorias.player1.empate;
 
    caVitoria.innerHTML = vitorias.player2.vitoria;
    caDerrota.innerHTML = vitorias.player2.derrota;
    caEmpate.innerHTML = vitorias.player2.empate;
}
 
imprimeVitoria();

function rectangularCollision({ rectangle1, rectangle2 }) {
    return (
        rectangle1.attackBox.position.x + rectangle1.attackBox.width >= rectangle2.position.x &&
        rectangle1.attackBox.position.x <= rectangle2.position.x + rectangle2.width &&
        rectangle1.attackBox.position.y + rectangle1.attackBox.height >= rectangle2.position.y &&
        rectangle1.attackBox.position.y <= rectangle2.position.y + rectangle2.height
    )
}



    function determineWinner({ player, enemy }) {
        if (!gameEnded) {  // Verifica se o jogo já terminou
            gameEnded = true;  // Define a flag para indicar que o jogo terminou
            clearTimeout(timerID);  // Limpa o loop do setTimeout
    
            document.querySelector('#displayText').style.display = 'flex';
    
            if (player.health === enemy.health) {
                document.querySelector('#displayText').innerHTML = 'EMPATE';
                vitorias.player1.empate += 1;
                vitorias.player2.empate += 1; 
            } else if (player.health > enemy.health) {
                document.querySelector('#displayText').innerHTML = 'Guts Venceu!';
                vitorias.player1.vitoria += 1;
                vitorias.player2.derrota += 1;
                atualizaPlacar(1, 1, 2, 8, 6);
            } else if (player.health < enemy.health) {
                document.querySelector('#displayText').innerHTML = 'Cavaleira Venceu!';
                vitorias.player2.vitoria += 1;
                vitorias.player1.derrota += 1;
                atualizaPlacar(2, 2, 15, 8, 6);
            }
    
            // Salva o placar atualizado no localStorage
            sessionStorage.setItem('vitorias', JSON.stringify(vitorias));
    
            imprimeVitoria();
            btn_reset.disabled = false;  // Habilita o botão de reset
        }
    }






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
    //alert("dados do jogo - Jogador:" + jogador + " - Personagem: " + personagem)
    
    const data = await response.json();
    console.log(data);
    return;
    //alert('guts enviarPlacar');
};

 
// Função de exemplo para atualizar e sincronizar o placar
function atualizaPlacar(jogador, personagem, vitorias, derrotas, empate) {
    // Atualiza o placar na interface do jogo
    // document.getElementById('vitoriasGu').innerText = vitorias;
    // document.getElementById('derrotasGu').innerText = derrotas;

    //alert('guts atualizaPlacar');
    // Envia o placar para o servidor
    enviarPlacar(jogador, personagem, vitorias, derrotas, empate);
   
}


function decreaseTimer() {
    if (timer > 0 && !gameEnded) {  // Verifica se o jogo ainda está em andamento
        timer--;  // Decrementa o valor do timer
        tempo.innerHTML = timer;  // Atualiza o valor na página
        timerID = setTimeout(decreaseTimer, 1000);  // Chama a função novamente após 1 segundo
    } else if (!gameEnded) {  // Apenas determina o vencedor se o jogo ainda não terminou
        determineWinner({ player, enemy });
    }
}


// Adiciona o evento ao botão de reset que recarrega a página e atualiza a tabela
document.getElementById('resetButton').addEventListener('click', () => {
    location.reload(); // Recarrega a página
});

// Adiciona um evento de clique ao botão
backLoginButton.addEventListener("click", function() {
    // Reseta o placar dos jogadores
    vitorias.player1.vitoria = 0;
    vitorias.player1.empate = 0;
    vitorias.player1.derrota = 0;

    vitorias.player2.vitoria = 0;
    vitorias.player2.empate = 0;
    vitorias.player2.derrota = 0;

    // Atualiza o placar na interface
    imprimeVitoria();

    // Salva o placar resetado no localStorage
    sessionStorage.setItem('vitorias', JSON.stringify(vitorias));

    enviarDadosPlacar(jogador, personagem, vitorias, derrotas, empate);

    console.log("Placar resetado!");
});


