// Faz um request ajax para favoritar ou desfavoritar um livro
document.querySelectorAll(".favoritar").forEach(button => {
    button.addEventListener("click", function() {
        const livroId = this.getAttribute("data-id");
        const action = this.textContent.includes("Adicionar") ? "adicionar" : "remover";

        fetch(`src/controllers/favoritos.php`, {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: `idLivro=${encodeURIComponent(livroId)}&action=${encodeURIComponent(action)}`
        })
        .then(response => response.text())
        .then(response => {
            if (response.toLowerCase() === "adicionado"){
                this.textContent = "Remover dos favoritos";
            } else if (response.toLowerCase() === "removido"){
                this.textContent = "Adicionar aos favoritos"; 
            } else {
                alert("Erro ao atualizar favoritos.");
            }
        })
        .catch(error => console.error("Erro:", error));
    });
});