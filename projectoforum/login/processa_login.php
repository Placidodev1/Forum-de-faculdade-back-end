<?php
session_start();
ob_start();
include_once "../Proprio_forum_lado_user/conexao.php"; 

$dados_login = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Verifica se o campo de login foi preenchido
if (!empty($dados_login['login'])) {

    // Exibe os dados de login recebidos para fins de depuração
    var_dump($dados_login);

    try {
        // Consulta os dados de login do usuário no banco de dados
        $query_dados_login = "SELECT email, senha FROM moderador_login WHERE email = :email";
        $resultado_login = $conn->prepare($query_dados_login);
        $resultado_login->bindParam(':email', $dados_login['username'], PDO::PARAM_STR);
        $resultado_login->execute();
        if(($resultado_login) AND ($resultado_login -> rowCount() != 0)){
        $linha_login_result = $resultado_login->fetch(PDO::FETCH_ASSOC);
        // Verifica se a senha informada pelo usuário está correta
        if (password_verify($dados_login['password'], $linha_login_result['senha'])) {
            $_SESSION['email'] = $linha_login_result['email'];
            $_SESSION['senha'] = $linha_login_result['senha'];
            header("Location: DASHBOARD.php");
        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000' onload='setTimeout(function(){ this.style.display = 'none'; }, 2000)'> Senha ou usuario incorrecto </p>";
            header("Location: login.php");
        }
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'> Senha ou usuario incorrecto </p>";
            header("Location: login.php");
        }
        // Exibe os dados de login encontrados para fins de depuração
        var_dump($linha_login_result);

    } catch (Exception $e) {
        // Captura e exibe exceções que possam ocorrer durante a execução do código
        echo "Erro: " . $e->getMessage();
    }
}
?>
