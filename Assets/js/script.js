function simularFalha() {
    let mensagem = document.getElementById("sistema");

    if (mensagem.innerText === "Sistema de Sinergia") { 
        mensagem.innerText = "SISTEMA EM ENTROPIA! Acionando Homeostase...";
        alert("Alerta - Sistema em Entropia");
    } else { 
        mensagem.innerText = "Sistema de Sinergia"; 
        alert("Alerta - Sistema em Sinergia");
    } 
}