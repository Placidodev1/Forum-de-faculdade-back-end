<?php
include_once "conexao.php";

// Recebemos o numero da pagina 
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);


// Pedido para as perguntas
if(!empty($pagina)){

  //Calcular o inicio da vizualizacao

  $Quantidade_resultante = 10; //Quantidade de registro por pagina
  $inicio = ($pagina * $Quantidade_resultante) - $Quantidade_resultante;
  //Query para perguntas
  $query_usuario="SELECT A_pergunta from perguntas ORDER BY `Data_pergunta` ASC  Limit $inicio, $Quantidade_resultante ";
  $resultado=$conn -> prepare($query_usuario);
  $resultado->execute();

  // Armazenamos as perguntas e respostas dentro de um array

  while ($linha_usuario = $resultado->fetch(PDO::FETCH_ASSOC)) {
    extract($linha_usuario);
      $dados.= '<div>
      <div class="perguntaeresposta conteiner">
          <div class="Apergunta">
              <h2 class="flexgrow1">'.$A_pergunta .'</h2>
              <i class="fa-solid fa-chevron-down flexgrow0 iconeparabaixopergunta" onclick="  if(classList.contains(`iconeparabaixorotacao`)){ parentNode.parentElement.parentElement.childNodes[3].classList.remove(`respostas_mostra`); classList.remove(`iconeparabaixorotacao`);}else{ classList.add(`iconeparabaixorotacao`); parentNode.parentElement.parentElement.childNodes[3].classList.add(`respostas_mostra`)};"></i>
          </div>
          <small>10 comentarios 10 minutos por placido nhapulo</small>
      </div>
      <div class="respostas" >
        <form action="forum.php" method="post" class="formresposta">
          <input type="text" name="resposta" class="Caixadepergunta Caixadepergunta1">
          <input type="hidden" name="pergunta" id="pergunta" value="" />
          <button class="botaoenviar1 botaoenviar" name="enviarresposta">Enviar</button>
        </form>';
        $query_resposta = "SELECT A_resposta FROM `respostas`  WHERE A_pergunta = '" . $A_pergunta . "' ORDER BY `data_respostas` DESC";
        $resultado_resposta=$conn -> prepare($query_resposta);
        $resultado_resposta->execute();
        while($linha_respostas= $resultado_resposta->fetch(PDO::FETCH_ASSOC)){
          extract($linha_respostas);
          $dados .='<div>
                    <small>De placido Nhapulo</small>
                    <p class="paragrafo">'.$A_resposta.'</p>
                  </div>';

        };
        // var_dump($linha_respostas);
        // extract($linha_respostas);
        // echo $A_resposta;
      
      $dados .='</div>';
}
//Paginacao - somar a quantidade de usuarios

$query_pg = "SELECT COUNT(A_pergunta) AS num_result FROM perguntas";
$result_pg = $conn->prepare($query_pg);
$result_pg->execute();
$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC); 

//Quantidade da pagina
$Quantidade_pg = ceil($row_pg['num_result']/$Quantidade_resultante);

//Mudar esse valor afetara as paginas anteriores e posteriores
$max_link=2;

//Implementando a paginacao
$dados .= '<nav aria-label="Page navigation example">';
$dados .= '<ul class="pagination justify-content-center">';
$dados .=  '<li class="page-item "><a class="page-link" href="#" onclick="listarUsuarios(1)">Pimeira</a></li>';

//Calcula as paginas anteriores
for($pag_ant = $pagina - $max_link; $pag_ant <=$pagina -1; $pag_ant++  ){
  if($pag_ant >=1){
$dados .=  '<li class="page-item"><a class="page-link" href="#" onclick="listarUsuarios('.$pag_ant.')">'.$pag_ant.'</a></li>';
  }
}

//PAgina atual
$dados .=  '<li class="page-item "><a class="page-link activo" href="#">'.$pagina.'</a></li>';

//Calcula as paginas posteriores
for($pag_post = $pagina + 1; $pag_post <= $pagina + $max_link; $pag_post++){
  if($pag_post<= $Quantidade_pg){
$dados .=  '<li class="page-item"><a class="page-link" href="#" onclick="listarUsuarios('.$pag_post.')">'.$pag_post.'</a></li>';
  }
}
$dados .=  '<li class="page-item"><a class="page-link" href="#" onclick="listarUsuarios('.$Quantidade_pg.')">Ultima</a></li>';
$dados .=   '</ul></nav>';
echo $dados;

}
else{
  echo "problemas";
}
