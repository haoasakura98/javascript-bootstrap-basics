function calcular() {
    let a = parseFloat(document.getElementById("primeironumero").value);
    let b = parseFloat(document.getElementById("segundonumero").value);
    let operacao = document.getElementById("operacao").value;
    let resultado;

    if (isNaN(a) || isNaN(b)) {
        document.getElementById("resultado").innerText = "Por favor, insira números validos"
        return
    }

    if (operacao === "divisao" && b === 0){
        document.getElementById("resultado").innerText = "Erro: Divisão por zero";
        return
    }

    resultado = operacao === "soma" ? a + b : operacao === "subtracao" ? a - b : operacao === "multiplicacao" ? a * b : operacao === "divisao" ? a / b : "Operação inválida";

    document.getElementById("resultado").innerText = "O valor final é: " + resultado;


}