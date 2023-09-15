function erroDescricao()
{
alert("Descreva o Motivo da Alteração!");
}

function verificarCheckBox() {
    var check = document.getElementsByName("status"); 

    for (var i=0;i<check.length;i++){ 
        if (check[i].checked == true){ 
            alert("Você está mudando o Status dessa Máquina, Após Salvar Essa Alteração Ela será Ativada!");

        }  else {
            alert("Você está mudando o Status dessa Máquina, Após Salvar Essa Alteração Ela será Desativada!");
        }
    }

    
}