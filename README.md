# emillyrepositorio

# Sistema de Inventário para Itens de Minecraft 

## 1. Introdução

### a. Qual o objetivo da atividade?

O objetivo desta atividade é desenvolver um sistema de inventário de itens inspirado  no jogo  *Minecraft*, utilizando tecnologias web como PHP, HTML, CSS e Bootstrap. O sistema simula a coleta, exibição e remoção de itens através de uma interface interativa.

#### i. O que é um inventário em um jogo? Qual a finalidade? Dê exemplos.

Um inventário em um jogo é uma interface onde os jogadores podem armazenar, visualizar, organizar e gerenciar os itens que coletam durante o gameplay. Ele funciona como uma "mochila virtual" do personagem.

**Exemplos:**
- Em *Minecraft*, o jogador guarda blocos, ferramentas, armas e recursos coletados no mundo.
- Em *The Legend of Zelda*, o jogador armazena espadas, escudos, poções, itens especiais como bombas, chaves e mapas.
- Em *Skyrim*, o jogador tem acesso a um inventário detalhado com armas, armaduras, ingredientes, magias e itens de missões.

#### ii. Que tipos de sistemas utilizam essa funcionalidade? Dê exemplos.

Além de jogos, sistemas com funcionalidades de inventário são comuns em:

- **Jogos eletrônicos**: RPGs, aventuras, survival games, etc.
- **Sistemas empresariais**: controle de estoque em lojas, armazéns, farmácias.
- **Aplicativos de produtividade**: listas de tarefas e coleções (como aplicativos de livros, filmes, figurinhas, etc).

#### iii. Porque essa funcionalidade é importante?

A funcionalidade de inventário é essencial para:
- **Organização**: permite que o jogador ou usuário organize seus recursos.
- **Progressão**: muitos jogos dependem dos itens adquiridos para avançar.
- **Tomada de decisão**: ajuda o jogador a planejar estratégias com base nos recursos disponíveis.
- **Interatividade**: cria uma experiência mais rica e imersiva.

---

## 2. A implementação

### a. Front-end

#### i. Quais ferramentas foram utilizadas?

- **HTML**: estrutura do conteúdo da página.
- **CSS**: estilização personalizada dos elementos.
- **Bootstrap**: biblioteca que facilita o uso de um layout responsivo, botões bonitos, grid system, etc.
- **VS Code**: editor de código leve e poderoso com suporte a extensões para HTML, PHP e CSS.

#### ii. Como o layout foi definido?

O layout foi estruturado com base em um **sistema de grades (grid)**, utilizando o Bootstrap para distribuir os slots do inventário. Cada linha (`row`) contém várias colunas (`col`), representando os slots onde os itens são exibidos. A interface foi dividida em:

- Cabeçalho com o título do inventário.
- Grid de itens (cada um com imagem e botão de exclusão).
- Formulário para adição de novos itens.

Exemplo de divisão:
```html
<div class="container">
  <div class="row">
    <div class="col-md-3"> <!-- Slot 1 --> </div>
    <div class="col-md-3"> <!-- Slot 2 --> </div>
    <!-- ... -->
  </div>
</div>
```

---

### b. Back-end

#### i. Quais ferramentas foram utilizadas?

- **PHP**: manipula os dados do inventário, como leitura, gravação e remoção dos itens no arquivo `.txt`.
- **Arquivo .txt**: utilizado como "banco de dados" simples para armazenar os itens.
- **VS Code**: editor usado para escrever e testar o código.

#### ii. Sobre o código PHP

O arquivo `inventario.php` contém toda a lógica do sistema:
- Adiciona novos itens ao inventário via `POST`.
- Remove itens do inventário via `GET`.
- Lê os itens salvos no `inventario.txt` e renderiza a interface.

##### 1. O que o código faz?

- Verifica se um item foi enviado pelo formulário:
```php
if (isset($_POST['item'])) {
    $item = $_POST['item'];
    file_put_contents("inventario.txt", $item . "\n", FILE_APPEND);
}
```
- Remove um item da lista se um índice for passado via GET:
```php
if (isset($_GET['remover'])) {
    $indice = $_GET['remover'];
    $itens = file("inventario.txt", FILE_IGNORE_NEW_LINES);
    unset($itens[$indice]);
    file_put_contents("inventario.txt", implode("\n", $itens));
}
```
- Lê todos os itens e exibe na interface:
```php
$itens = file("inventario.txt", FILE_IGNORE_NEW_LINES);
foreach ($itens as $indice => $item) {
    echo "<div class='col-md-3'>";
    echo "<img src='imagens/$item.png' class='img-fluid'>";
    echo "<a href='?remover=$indice'>Remover</a>";
    echo "</div>";
}
```

---

## 3. Passo a passo de execução

### a. Como executar o projeto

1. Instale um servidor local, como **XAMPP** ou **WAMP**.
2. Copie todos os arquivos do projeto para a pasta `htdocs` (no caso do XAMPP).
3. Verifique se o Apache está ativado no painel do XAMPP.
4. No navegador, acesse: `http://localhost/nome-da-pasta/inventario.php`
5. Utilize o formulário para adicionar itens e clique em "Remover" para excluir.

Obs: Certifique-se de que as imagens estejam na pasta correta e tenham nomes correspondentes aos itens adicionados.

### b. Hierarquia de diretórios

```
/projeto-inventario/
│
├── inventario.php        # Arquivo principal com a lógica do sistema
├── inventario.txt        # Armazena os itens do inventário (um por linha)
├── /imagens/             # Contém os arquivos de imagem dos itens (espada.png, pocao.png, etc)
├── /css/                 # (Opcional) Arquivos de estilos adicionais
└── /js/                  # (Opcional) Scripts JS se o projeto evoluir futuramente
```

---

## 4. Possíveis melhorias futuras

- Adicionar sistema de login para inventários individuais por usuário.
- Implementar banco de dados MySQL ao invés de arquivo `.txt`.
- Permitir upload personalizado de imagens para os itens.
- Criar categorias e filtros para o inventário.
- Melhorar a responsividade e adicionar animações com JavaScript ou CSS.

---


