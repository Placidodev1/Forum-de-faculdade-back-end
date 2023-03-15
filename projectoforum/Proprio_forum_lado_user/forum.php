<?php
include_once "conexao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="forum.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    </head>
<body>
  <!-- A navbar -->
    <nav>
        <div class="nav-header">
               <div >
                <img src="logopol.png" class="logo" alt="logo" />
              </div>
              <ul class="links">
                <li>
                  <a href="index.html">home</a>
                </li>
                <li>
                  <a href="about.html">about</a>
                </li>
                <li>
                  <a href="projects.html">projects</a>
                </li>
                <li>
                  <a href="contact.html">contact</a>
                </li>
              </ul>
              <ul class="social-icons">
                <li>
                  <a href="https://www.twitter.com">
                    <i class="fab fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.twitter.com">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.twitter.com">
                    <i class="fab fa-behance"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.twitter.com">
                    <i class="fab fa-linkedin"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.twitter.com">
                    <i class="fab fa-sketch"></i>
                  </a>
                </li>
              </ul>
        </div>
    </nav>
    <!-- A barra pra navegar entre outras disciplinas -->
     <div class="barratrocadisciplina">
        <div>
          <div class="conteinerbarra">
            <div class="conteinertema">
                    <h3>Programacao</h3>
                    <i class="fa-solid fa-chevron-down iconeparabaixo"></i>
          </div>
          
          </div>
          <div class="divoverlay">
            <ul class="disciplinasbarra">
              <li >Programacao 1 "Java"</li>
              <li>Programacao 2 "Java"</li>
              <li>Fundamentos de algoritimos e programacao</li>
              <li>Base de dados</li>
            </ul>
          </div>
        </div>
        <div>
          <div class="conteinerbarra">
              <div class="conteinertema">
                  <h3>Redes</h3>
                  <i class="fa-solid fa-chevron-down iconeparabaixo"></i>
              </div>
          </div>
            <div class="divoverlay">
              <ul class="disciplinasbarra">
                <li>Propagacao e radicao</li>
                <li>Fundamentos de telecomunicacoes</li>
              </ul>
            </div>
        </div>
        <div>
          <div class="conteinerbarra">
              <div class="conteinertema">
                  <h3>fisica</h3>
                  <i class="fa-solid fa-chevron-down iconeparabaixo"></i>
              </div>
            </div>
            <div class="divoverlay">
              <ul class="disciplinasbarra">
                <li>teoria de circuitos</li>
                <li>teoria de informacao</li>
              </ul>
            </div>
        </div>
        <div class="conteinerbarra">
            <h3>Ver tudo</h3>
        </div>
        <div class="conteinerbarra">
            <h3>Mais opcoes</h3>
        </div>
     </div>
     <main>
      <!-- Local para adicionar uma pergunta -->
        <div class="conteiner" >
            <h1>Adicionar uma questao sobre fisica</h1>
            <form method="post"  class="formdepergunta">
              <input type="text" class="Caixadepergunta" name="enviarpergunta" placeholder="Coloque aqui sua questao">
              <button class="botaoenviar" name="submit" value="submeto">Enviar</button>
            </form>
        </div>


        <!-- Local para adicionar uma pergunta dentro do banco de dados -->
        <?php
        $dado1 = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(empty($dado1['enviarpergunta'])){
            $dado1['submit']='';
        }
        if(!empty($dado1['submit'])){
            $querydocente ="INSERT INTO perguntas(	A_pergunta)
            VALUES ('".$dado1['enviarpergunta']."')"; 
            $cadastradoc = $conn   -> prepare($querydocente);
            $cadastradoc->execute();
            $sff = $cadastradoc->rowCount();
            if($cadastradoc->rowCount()){
                
              echo"<p style='color:green;text-align:center;''>Sumisso com sucesso</p>";
            }else{
                echo "<p>Erro: Uuario nao cadatrado com uceo</p>";
            }
        }
        $dado1['submit']='';
        ?>


        <!-- Local para adicionar uma resposta dentro do banco de dados -->
        <?php
        $dadosresposta = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($dadosresposta);
        
$nome = $_POST["pergunta"];
echo "Olá, $nome!";

        // if(!empty($dado1['submit'])){
        //     $querydocente ="INSERT INTO perguntas(	A_pergunta)
        //     VALUES ('".$dado1['enviarpergunta']."')"; 
        //     $cadastradoc = $conn   -> prepare($querydocente);
        //     $cadastradoc->execute();
        //     $sff = $cadastradoc->rowCount();
        //     if($cadastradoc->rowCount()){
                
        //       echo"<p style='color:green;text-align:center;''>Sumisso com sucesso</p>";
        //     }else{
        //         echo "<p>Erro: Uuario nao cadatrado com uceo</p>";
        //     }
        // }
        // $dado1['submit']='';
        ?>
        <!-- parte das peguntas -->
        
          <div class="Container-de-toda-pergunta">
  
          </div>
          
          <?php
// // Verifica se os dados foram enviados
// if (isset($_POST['dados'])) {
  
//   // Obtém a string JSON enviada pelo JavaScript
//   $jsonString = $_POST['dados'];
  
//   // Converte a string JSON em um objeto PHP
//   $data = json_decode($jsonString);
  
//   // Exibe os dados recebidos
//   echo "Nome: " . $data->nome . "<br>";
//   echo "Idade: " . $data->idade;
  
// }
// echo "PORRA";
// ?>
        
     </main>
     <footer>
      <div class="logo"></div>
      <div class="listadelinks">
        
        <div class="infos">
          <ul>
            <div class="titulosfooter">Central de Ajuda</div>
            <li>Nossas Assinaturas</li>
            <li>Pagamentos</li>
            <li>Perguntas Frequentes</li>
          </ul>
        </div>
        
        <div class="infos">
          <ul>
            <div class="titulosfooter">Para Faculdades</div>
            <li>Matérias</li>
            <li>Livros Resolvidos</li>
          </ul>
        </div>
        <div class="infos">
          <ul>
            <div class="titulosfooter">informacoes</div>
            <li>sobre o recutamento</li>
            <li>Sobre nos</li>
            <li>Sobre os criadores</li>
          </ul>
        </div>
      </div>
      <div class="Creditos">Site criado por Placido Nhapulo. 2023 </div>
    </footer>
</body>
<script src="https://kit.fontawesome.com/19f30c1599.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="forum.js"></script>
</html>