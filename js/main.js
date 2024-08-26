async function cadastrar() {
    var form = document.getElementById('formulario');
    var dados = new FormData(form);

    
    if (!dados.get('nome').trim() || !dados.get('senha').trim() || !dados.get('escolha').trim()) {
        alert("Por favor, preencha todos os campos.");
        return;
    }

    
    if (dados.get('senha').length < 8) {
        alert("Sua senha deve ter no mínimo 8 caracteres.");
        return;
    }

    try {
        var promise = await fetch("./php/cadastrar.php", {
            method: "POST",
            body: dados
        });

        var resposta = await promise.json();

        var genero = dados.get('escolha');
        var nome = dados.get('nome').trim();
        var mensagem = '';

        if (genero === 'M') {
            mensagem = "Bem-vindo, " + nome + "!";
        } else if (genero === 'F') {
            mensagem = "Bem-vinda, " + nome + "!";
        } else {
            mensagem = "Bem-vindo(a), " + nome + "!";
        }

        alert(mensagem);

    } catch (error) {
        console.error('Erro:', error);
        alert("Ocorreu um erro ao cadastrar o usuário. Por favor, tente novamente.");
    }
}
