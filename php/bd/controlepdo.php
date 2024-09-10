<?php
class Conexao
{
    //Constantes de definem os parâmetros do Banco de Dados
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB_NAME = "bdprojetofs";
    var $pdo = null;
    // $conn = new mysqli($servername, $username, $password, $dbname);
    //o construtor é executado ao intanciar a classe


    //CONEXAO BANCO
    public function __construct()
    {
        $this->Conectar();
    }
    public function Conectar()
    {
        try {
            //Instância da classe PDO - Construtor realiza a conexão.
            $this->pdo = new PDO(
                'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME,
                self::USER,
                self::PASSWORD
                
            );
            //Parar o processo de conexão caso haja erro - lançar uma exceção.
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // . para concatenar
            // -> para buscar os atributos dentro da variavel
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }
    

    public function InserirPlayer($player)
    {
        

            //Declaração das variáveis


            $query = "INSERT INTO tbjogador (Players)
                        VALUES (:player)";


            //Atribui o Insert ao PDO
            $insert = $this->pdo->prepare($query);
                        
            //Define os parâmetros que serão substituídos
            $insert->bindParam(':player', $player);
            


            //Verifica se house inserção de registros no Banco de Dados
            if ($insert->execute()) {
            } else {
                //Se nenhum registro foi inserido.
                echo "<p><marquee>Falha ao inserir registro.</marquee></p>";
            }

    }
}
  

