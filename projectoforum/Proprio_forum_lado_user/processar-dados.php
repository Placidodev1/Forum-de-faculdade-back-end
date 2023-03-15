<?php
// Verifica se os dados foram enviados
if (isset($_POST['dados'])) {
  
  // Obtém a string JSON enviada pelo JavaScript
  $jsonString = $_POST['dados'];
  
  // Converte a string JSON em um objeto PHP
  $data = json_decode($jsonString);
  
  // Exibe os dados recebidos
  echo "Nome: " . $data->nome . "<br>";
  echo "Idade: " . $data->idade;
  
}
echo "PORRA";
?>