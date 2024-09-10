const canvas = document.querySelector('canvas')
const c = canvas.getContext('2d')

canvas.width = 1366
canvas.height = 768

c.fillRect(0,0, canvas.width, canvas.height)

const gravity = 0.7


// const background = new Sprite({
//     position:{
//         x:0,
//         y:0  
//     },
//     imageSrc: './img/teste.gif'
// })


// const shop = new Sprite({
//     position:{
//         x:600,
//         y:180
//     },
//     imageSrc: './img/fundo.png',
//     scale:2.75,
//     framesMax:6
// })



const player = new Fighter ({
    position: {
      x: 0,
      y: 0
    },   
    velocity: {
        x: 0,
        y: 0
    },
    offset:{
        x:0,
        y:0
    },
    imageSrc: './img/samuraiMack/Idle.png',
    framesMax:8,
    scale:4.75,
    offset: {
        x: 215,
        y:430
    },

    sprites:{
        idle:{
            imageSrc:'./img/samuraiMack/Idle.png',
            framesMax:8
        },
        run:{
            imageSrc:'./img/samuraiMack/Run.png',
            framesMax:8
           
        },
        jump:{
            imageSrc:'./img/samuraiMack/Jump.png',
            framesMax:2
           
        },
        fall:{
            imageSrc:'./img/samuraiMack/Fall.png',
            framesMax:2
           
        },
        attack1:{
            imageSrc:'./img/samuraiMack/Attack4.png',
            framesMax:4
           
        },
        takeHit:{
            imageSrc:'./img/samuraiMack/Take Hit - white silhouette.png',
            framesMax:4
           
        },
        death: {
            imageSrc:'./img/samuraiMack/Death.png',
            framesMax:6
        }
        
    },
    attackBox:{
        offset:{
            x:200,
            y:45
            
        },
        width:200,
        height:50
    }
})

// player.draw()

const enemy = new Fighter({
    position: {
        x: 850,
        y: 100
      },   
      velocity: {
          x: 0,
          y: 0
    },
    color: 'blue',
    offset:{
        x: -50,
        y: 0
    },
    imageSrc: './img/kenji/Idle.png',
    framesMax:4,
    scale:4.75,
    offset: {
        x: 300,
        y:457
    },

    sprites:{
        idle:{
            imageSrc:'./img/kenji/Idle.png',
            framesMax:4
        },
        run:{
            imageSrc:'./img/kenji/Run.png',
            framesMax:8
           
        },
        jump:{
            imageSrc:'./img/kenji/Jump.png',
            framesMax:2
           
        },
        fall:{
            imageSrc:'./img/kenji/Fall.png',
            framesMax:2
           
        },
        attack1:{
            imageSrc:'./img/kenji/Attack1.png',
            framesMax:4
           
        },
        takeHit:{
            imageSrc: './img/kenji/Take-hit.png',
            framesMax:4
        },
        death: {
            imageSrc:'./img/kenji/Death.png',
            framesMax:7
        }
    },
    attackBox:{
        offset:{
            x:-350,
            y:40
        },
        width:200,
        height:50
    }
})

// enemy.draw()



const keys = {
    a: {
        pressed: false
    },
    d: {
        pressed: false
    },
    w: {
        pressed: false
    },
    ArrowRight: {
        pressed: false
    },
    ArrowLeft: {
        pressed: false
    }   
}


decreaseTimer()

function resetGame() {
    // Reiniciar a saúde dos personagens
    player.health = 100;
    enemy.health = 100;

    // Atualizar a barra de saúde na interface
    gsap.to('#playerHealth', {
        width: player.health + '%'
    });
    gsap.to('#enemyHealth', {
        width: enemy.health + '%'
    });

    // Reposicionar os personagens nas posições iniciais
    player.position = { x: 0, y: 0 }; // Posição inicial do player
    enemy.position = { x: 850, y: 0 }; // Posição inicial do enemy

    // Reiniciar as velocidades dos personagens
    player.velocity = { x: 0, y: 0 };
    enemy.velocity = { x: 0, y: 0 };

    // Reiniciar o estado de morte
    player.dead = false;
    enemy.dead = false;

    // Reiniciar o estado de ataque
    player.isAttacking = false;
    enemy.isAttacking = false;

    // Resetar sprites para idle
    player.switchSprite('idle');
    enemy.switchSprite('idle');

    // Reiniciar o tempo
    timer = 60; // Substitua pelo tempo inicial desejado
    document.getElementById('timer').innerText = timer;

    // Reiniciar o loop de animação, se houver
    cancelAnimationFrame(animationId); // Cancela a animação anterior
    animate(); // Reinicia a animação

    // (Opcional) Reiniciar outras variáveis de jogo, se necessário
}

// Evento de clique para o botão de reset
document.getElementById('resetButton').addEventListener('click', function() {
    resetGame(); // Reseta o jogo
});

function animate() {
    window.requestAnimationFrame(animate)
    // c.fillStyle = 'black'
    c.clearRect(0, 0, canvas.width, canvas.height)
    // background.update()
    
    // shop.update()
    player.update()
    enemy.update()


    player.velocity.x = 0
    enemy.velocity.x = 0

    //player movement
    
    if ((keys.a.pressed && player.lastKey === 'a') && (player.width + player.position.x > -145 )) {
        player.velocity.x = -7
    
        player.switchSprite('run')

    } else if ((keys.d.pressed && player.lastKey === 'd') && (player.width + player.position.x < 1080)) {
        player.velocity.x = 7
        player.switchSprite('run')
    }else{
        player.switchSprite('idle')
    }
    
    
    //Jumping
    if(player.velocity.y < 0){
        player.switchSprite('jump')
    }else if(player.velocity.y > 0){
        player.switchSprite('fall')
      
    }




    //enemy movement
    if ((keys.ArrowLeft.pressed && enemy.lastKey === 'ArrowLeft')  && enemy.width + enemy.position.x > -59)  {
        enemy.velocity.x = -7
        enemy.switchSprite('run')
    } else if ((keys.ArrowRight.pressed && enemy.lastKey === 'ArrowRight') && enemy.width + enemy.position.x < 1200) {
        enemy.velocity.x = 7
        enemy.switchSprite('run')
    }else{
        enemy.switchSprite('idle')
    }

    //Jumping enemy
    if(enemy.velocity.y < 0){
        enemy.switchSprite('jump')
    }else if(enemy.velocity.y > 0){
        enemy.switchSprite('fall')
    }

    // detect for collision & enemy gets hit
    if (
        rectangularCollision({
            rectangle1: player,
            rectangle2: enemy
        }) &&
        player.isAttacking && player.framesCurrent === 2
    )  {
        enemy.takeHit()
        player.isAttacking = false
       
        
        gsap.to('#enemyHealth',{
            width:enemy.health + '%'
        })
    }

    // if player misses
    if(player.isAttacking && player.framesCurrent === 4 ) {
        player.isAttacking = false
    }


    //this is where our player gets hit 
    if (
        rectangularCollision({
            rectangle1: enemy,
            rectangle2: player
        }) &&
        enemy.isAttacking && enemy.framesCurrent === 2 
    )  {
        player.takeHit()
        enemy.isAttacking = false
        
        gsap.to('#playerHealth',{
            width:player.health + '%'
        })
    }

    // if enemy misses
    if(enemy.isAttacking && enemy.framesCurrent === 2 ) {
        enemy.isAttacking = false
    }

    // end game based on health
    if((enemy.health <= 0 || player.health <= 0)){
        determineWinner({player, enemy, timerID})
    }

    

}

animate()

window.addEventListener('keydown', (event) => {
    if(!player.dead){

   
    switch (event.key) {
        case 'd':
            keys.d.pressed = true
            player.lastKey = 'd'
            break
        case 'a':
            keys.a.pressed = true
            player.lastKey = 'a'
            break
        case 'w':
            if (player.position.y==573){
                player.velocity.y = -20;  
            }
                 
           
            break
        case ' ':
            player.attack()
            break 
    }

}




    if(!enemy.dead) {
    switch(event.key) {
        case 'ArrowRight':
            keys.ArrowRight.pressed = true
            enemy.lastKey = 'ArrowRight'
            break
        case 'ArrowLeft':
            keys.ArrowLeft.pressed = true
            enemy.lastKey = 'ArrowLeft'
            break
        case 'ArrowUp':
            if(enemy.position.y==573){
            enemy.velocity.y = -20
            }
            break
        case 'ArrowDown':
          enemy.attack()
            break
            
    }
}
})

window.addEventListener('keyup', (event) => {
    switch (event.key) {
        case 'd':
            keys.d.pressed = false
            break
        case 'a':
            keys.a.pressed = false
            break
        case 'w':
            keys.w.pressed = false
            break
    }

    //enemy keys
    switch (event.key) {
        case 'ArrowRight':
            keys.ArrowRight.pressed = false
            break
        case 'ArrowLeft':
            keys.ArrowLeft.pressed = false
            break
    }

  
})