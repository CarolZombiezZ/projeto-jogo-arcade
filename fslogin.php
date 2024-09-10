<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io_souls/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io_souls/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io_souls/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <style>

      
      * {
            box-sizing: border-box;
            font-family: "Press Start 2P", cursive;
        }

        .rotulo{width: 30%;
                float: left;
                clear:both;
                padding: 4%;
               margin-left:9%;
                
        }

        .rotulo2{width: 30%;
                float: left;
                clear:both;
                padding: 4%;
               margin-left:5%;
                
        }


        .caixa{float: left;
              margin-top: 5%;
              margin-left: 15%;
              margin-bottom: 2%;
              width: 70%;
        }

        .caixa2{float: left;
              margin-top: 5%;
              margin-left: 15%;
              margin-bottom: 2%;
              width: 70%;
        }

     

        .fundo{border: rgb(14, 67, 211) 2px solid;
        background-color: rgba(0, 0, 0, 0.6);
        width: 30%;
        margin: auto;
        text-align: center;
        }

        .fundo2{border: rgb(199, 17, 17) 2px solid;
        background-color: rgba(0, 0, 0, 0.6);
        width: 38%;
        margin: auto;
      
        text-align: center;}

        .fonte{font-family: 'Times New Roman', Times, serif ;
              color: white;
                font-size: 20px;
            }

        .botao {
            top: 80%;
            left:44%;
            width: 7%;
          height: 7%;
            position: absolute;
            
        }
        
        button{
            background-color:rgba(255, 99, 71, 0);
            
        }

        .logo {
            position: absolute;
            z-index: 999;
            padding-left: 25%;
            padding-top: 0%;
            margin-top: 1%;
        }

        .cadastro{padding-top: 17%;}

        .player1{position: absolute;
            margin-left: 8%;
            margin-top: 0.6%;
        }

        .player2{position: absolute;
            margin-left: 55%;
       }

       .teclasGU{position: absolute;
                top: 348px;
            left: -175px;}

        .teclasCA{position: absolute;
                top: 350px;
                right: 0px;
              
                width: -100%;}

        .botao {

                margin-top: 2%;
                margin-left: -1%;
                position: absolute;
                
                }

        .botao2 {

            margin-top: 7%;
            margin-left: 42.5%;
            position: absolute;
            
            }

        .fighter1{margin-left: -5%;
        margin-top: 10%;

        }

        .fighter2{margin-left: 20%;
        padding-top: 10%;
          
        }
        .botao20{margin-left: 20%;
                height: 10%;
                position: absolute;
                /* background-color: transparent;
            background-image: url(img/buttonPdrao.png);
            font-family: 'myFirstFont'; */
    }

    #result1{color:red}

    #result2{color:red}

    </style>



</head>
<body background="img/gif-solaire.gif">

    <div>
        <img class="logo" src="img/logo.png" alt="">
    </div>
    
    <div>
        <section class="cadastro">
            <form id="playerForm" method="post" action="">

                <div class="player1">
                    <fieldset class="fonte fundo">
                        <legend>GUTS</legend>

                        <div id="result1"></div>
                        <label for="player1" class="rotulo">Digite seu nickname:</label>
                        <input type="text" 
                            id="player1" 
                            name="player1" 
                            maxlength="3"
                            autocomplete="off"
                            class="caixa"
                            required>

                            
                    <figure class="fighter1"> 
                        <img src="img/gutslogin.png" alt="">
                    </figure>

                         
                    </fieldset>

            
                </div>

               


                <div class="player2">
                        <fieldset class="fonte fundo2">
                            <legend>CAVALEIRA</legend>

                            <div id="result2"></div>
                            <label for="player2" class="rotulo2">Digite seu nickname:</label>
                            <input type="text" 
                                id="player2" 
                                name="player2" 
                                maxlength="3"
                                autocomplete="off"
                                class="caixa2"
                                required>


                                <figure class="fighter2"> 
                                    <img src="img/cavaleiralogin.png" alt="">
                                </figure>
                        
                        </fieldset>
                </div>

                <!-- <div>
                    <li>
                        <a href="ranking.php">
                            <figure class="botao2">
                                <img src="img/ranking.png" alt="">
                            </figure>
                        </a>
                    </li>
        
                </div> -->

                <div>
                    <li>
                        <a id="jogar" href="javascript:checkInput()" >
                            <figure class="botao">
                                <img src="img/jogar2.png" alt="">
                                
                            </figure>
                        </a>
                        
                    </li>
        
                </div>
            
                <div class="teclasGU">
                    <img src="img/teclas1.png" alt="">
                </div>

                <div class="teclasCA">
                    <img src="img/teclas2.png" alt="">
                </div>

            </form>

            <script>
            function EnviarPlayers() {
                // Obter o valor do campo de entrada
                var player1 = document.getElementById('player1').value;
                var player2 = document.getElementById('player2').value;
                // Construir o URL com o valor do campo
                var url = 'index.php?player1='+player1 + '&player2=' + player2;
                // Abrir a URL em uma nova janela
                window.open(url, "_self");
            }
            </script>

            <script>
            function checkInput() {
                var input1 = document.getElementById("player1").value;
                var input2 = document.getElementById("player2").value;
            
                if (input1 === "") {
                document.getElementById("result1").innerHTML = "Campo Obrigatório!";
                }
                if(input2 === ""){
                    document.getElementById("result2").innerHTML = "Campo Obrigatório!";
                } else {
                EnviarPlayers();
                }
            }
            </script>

        </section>

       
    </div>



        
</body>
</html>