<?php
require "classes/conexao.php";

// Obtém uma conexão PDO
$conexao = Conexao::getConnection();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volta ao Mundo - Suécia</title>
</head>
<body>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="estilo.css" />
  </head>
  <body>
    <header class="header">
      <img src="imagens/bandeira-suecia.png" alt="Bandeira" width="200" />
      <h1>Suécia</h1>
      <h3>
        Veja os Comentarios e avaliações do nosso site
      </h3>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Sair</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/admin-inserir.php">Inserir novo Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript para carregar os comentários -->
    <script>
        // Carrega os comentários via AJAX
        function carregarComentarios() {
            fetch('carregarcomentariosemjson.php')
                .then(response => response.json())
                .then(data => {
                    const comentariosContainer = document.getElementById('comentarios-container');
                    if (data.length > 0) {
                        // Se houver comentários, cria elementos HTML para cada um e os adiciona ao contêiner
                        data.forEach(comentario => {
                            const comentarioHTML = `
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">${comentario.nome}</h5>
                                        <p class="card-text">${comentario.mensagem}</p>
                                        <p class="card-text"><small class="text-muted">Email: ${comentario.email}</small></p>
                                        <p class="card-text"><small class="text-muted">Data de Criação: ${comentario.data_criacao}</small></p>
                                        <button class="btn btn-success" onclick="aprovarComentario(${comentario.id})">Aprovar</button>
                                        <button class="btn btn-danger" onclick="reprovarComentario(${comentario.id})">Reprovar</button>
                                    </div>
                                </div>
                            `;
                            comentariosContainer.innerHTML += comentarioHTML;
                        });
                    } else {
                        // Se não houver comentários, exibe uma mensagem
                        comentariosContainer.innerHTML = '<p>Nenhum comentário encontrado.</p>';
                    }
                })
                .catch(error => console.error('Erro ao carregar os comentários:', error));
        }

        // Função para aprovar um comentário
        function aprovarComentario(id) {
            // Aqui você pode implementar a lógica para aprovar o comentário com o ID fornecido
            // Por exemplo, você pode fazer uma solicitação AJAX para um script PHP que atualiza o status do comentário no banco de dados
            console.log(`Comentário aprovado com o ID ${id}`);
        }

        // Função para reprovar um comentário
        function reprovarComentario(id) {
            // Aqui você pode implementar a lógica para reprovar o comentário com o ID fornecido
            // Por exemplo, você pode fazer uma solicitação AJAX para um script PHP que atualiza o status do comentário no banco de dados
            console.log(`Comentário reprovado com o ID ${id}`);
        }

        // Chama a função para carregar os comentários quando a página carregar
        window.onload = carregarComentarios;
    </script>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        </div>
      </div>
    </nav>
    <main>
      
    </main>
    <footer class="footer">
      <p><strong>Projeto Volta ao Mundo - Suécia</strong></p>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
</body>
</html>