//Definicao de variaveis

var container_de_perguntas_e_respostas = document.querySelector(".Container-de-toda-pergunta")

const listarUsuarios = async (pagina) =>{
    const dados = await fetch("listarperguntaeresposta.php?pagina=" + pagina)
    const resposta = await dados.text();
    container_de_perguntas_e_respostas.innerHTML = resposta;
}
listarUsuarios(1)

//Evento disparado ao carregar a pagina
window.addEventListener("load", ()=>{
//Defimicao de variaveis
var toggle = document.querySelectorAll(".iconeparabaixo")
var pergunta_resposta = document.getElementById("pergunta")
var botaoenviarrespoosta = document.querySelectorAll(".botaoenviar1")
var divdabarra = document.querySelectorAll(".disciplinasbarra")
var respostas = document.querySelector(".respostas")
var formresposta = document.querySelector(".formresposta")
var iconeparabaixopergunta = document.querySelectorAll(".iconeparabaixopergunta")

console.log("respostas.textContent")
//Mudificar o valor pela pergunta correspondente a resposta
botaoenviarrespoosta.forEach(e1 => e1.addEventListener("click", (e)=>{
    
    console.log(e1.parentElement.parentElement.parentElement.childNodes[1].childNodes[1].childNodes[1].textContent);
    pergunta_resposta.value = e1.parentElement.parentElement.parentElement.childNodes[1].childNodes[1].childNodes[1].textContent
    formresposta.submit()
    e.preventDefault()
}))
//Switch da barra para explorar outras disciplinas


toggle.forEach(e1 => e1.addEventListener("click", ()=>{
    
    if(e1.classList.contains("iconeparabaixorotacao")){
        e1.classList.remove("iconeparabaixorotacao")
        e1.parentNode.parentElement.parentElement.childNodes[3].childNodes[1].classList.remove("show-disciplinasbarra")
        }else{
        e1.classList.add("iconeparabaixorotacao")
        e1.parentNode.parentElement.parentElement.childNodes[3].childNodes[1].classList.add("show-disciplinasbarra")
    }
}))
// Cria o objeto JSON
var data = { nome: "João", idade: 30 };

// Converte o objeto em uma string JSON
var jsonString = JSON.stringify(data);

// Cria uma nova solicitação HTTP POST
var xhttp = new XMLHttpRequest();

// Define a URL do script PHP que irá processar os dados
var url = "forum.php";

// Define a função a ser chamada quando a resposta do servidor for recebida
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    console.log("Dados enviados com sucesso para o PHP");
  }
};
console.log("gsuiadfhsi")
// Abre a conexão com o servidor PHP
xhttp.open("POST", url, true);

// Define o cabeçalho da solicitação
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Envia a solicitação HTTP POST com a string JSON como parâmetro
xhttp.send("dados=" + jsonString);

})

