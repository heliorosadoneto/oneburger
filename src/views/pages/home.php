<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= $base; ?>/assets/css/reset.css">

  <link rel="stylesheet" href="<?= $base; ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= $base; ?>/assets/css/styleProdutosMesa.css">
  <title>ONE BURGER</title>

</head>

<body>
  <?php
  $categoriasItens = array(
    "Burgers" => array(
      array("nome" => "ONE BURGER", "valor" => 28.50),
      array("nome" => "ONE HOUSE", "valor" => 24.50),
      array("nome" => "CHEESE BACON", "valor" => 25.50),
      array("nome" => "ONE LUX", "valor" => 24.50),
      array("nome" => "ONE CRISPY", "valor" => 25.50),
      array("nome" => "ONE KIDS", "valor" => 18.00),
      array("nome" => "COMBO ONE", "valor" => 24.00)
    ),
    "Burgers.T" => array(
      array("nome" => "SUPER BURGER", "valor" => 24.00),
      array("nome" => "DOUBLE CHEDDAR", "valor" => 27.50),
      array("nome" => "X-BACON", "valor" => 20.50),
      array("nome" => "X-BURGER", "valor" => 17.50),
      array("nome" => "ONE TUDO", "valor" => 35.00)
    ),
    "Porções" => array(
      array("nome" => "ANÉIS DE CEBOLA", "valor" => 23.00),
      array("nome" => "FRITAS", "valor" => 18.00),
      array("nome" => "FRITAS ONE", "valor" => 33.00),
      array("nome" => "PICANHA NA CHAPA", "valor" => 150.00),
      array("nome" => "FILÉ DE BOI C/ FRITAS", "valor" => 69.00),
      array("nome" => "TRIO MINEIRO", "valor" => 65.00),
      array("nome" => "MANDIOCA C/ TORRESMO", "valor" => 55.00),
      array("nome" => "FILÉ DE BOI C/ MANDIOQUINHA", "valor" => 69.50),
      array("nome" => "FILÉ DE TILÁPIA C/ FRITAS", "valor" => 68.50),
      array("nome" => "FILÉ DE BOI AO MOLHO GORGONZOLA", "valor" => 70.00)
    ),
    "Bebidas" => array(
      array("nome" => "HEINEKEN - LATÃO", "valor" => 10.00),
      array("nome" => "HEINEKEN - LONG NECK", "valor" => 10.00),
      array("nome" => "BRAHMA - LATA", "valor" => 6.00),
      array("nome" => "BRAHMA - LATÃO", "valor" => 8.00),
      array("nome" => "SKOL - LATA", "valor" => 6.00),
      array("nome" => "SKOL - LATÃO", "valor" => 8.00),
      array("nome" => "SPATEN - LONG NECK ", "valor" => 10.00),
      array("nome" => "CORONA - LONG NECK ", "valor" => 10.00),
      array("nome" => "COCA_COLA - LATA", "valor" => 5.00),
      array("nome" => "COCA_COLA - 600ml", "valor" => 8.00),
      array("nome" => "COCA_COLA - 1L ", "valor" => 10.00),
      array("nome" => "COCA_COLA - 2L ", "valor" => 13.00),
      array("nome" => "GUARANÁ - LATA ", "valor" => 5.00),
      array("nome" => "GUARANÁ - 600ml ", "valor" => 8.00),
      array("nome" => "GUARANÁ - 1L", "valor" => 10.00),
      array("nome" => "GUARANÁ - 2L", "valor" => 13.00),
    ),
    "Salgados" => array(
      array("nome" => "ENRROLADINHO", "valor" => 14.00),
      array("nome" => "COXINHA", "valor" => 14.00),
      array("nome" => "BOLINHO DE MANDIOCA", "valor" => 14.00),
      array("nome" => "ASSADO ESFIRRA - FRANGO", "valor" => 27.50)
    ),
    "Macarrão" => array(
      array("nome" => "MEIA - Macarrão", "valor" => 14.00),
      array("nome" => "Macarrão - INTEIRA", "valor" => 27.50)
    ),
    // ... outras categorias aqui
  );
  ?>
  <?php $render('header');
  ?>
  <div class="grid containerHome">
    <div class="dropdown">
      <button onclick="myFunction()" class="dropbtn">MESAS - <?php echo isset($_SESSION['mesa']['id']) ? $_SESSION['mesa']['id'] : ($_SESSION['mesa']['id'] = 1); ?> </button>
      <div id="myDropdown" class="dropdown-content">
        <?php
        for ($i = 1; $i <= 10; $i++) {

          echo "<a href='$base/mesa/$i/index'><button id='botaoMesa$i'>Mesa $i</button></a>";
        }
        ?>
      </div>
    </div>





    <div class="containerProdutos">
      <div class="navbar">
        <button onclick="toggleCategoria('Burgers')">Burgers</button>
        <button onclick="toggleCategoria('Burgers.T')">Burgers.T</button>
        <button onclick="toggleCategoria('Porções')">Porções</button>
        <button onclick="toggleCategoria('Bebidas')">Bebidas</button>
        <button onclick="toggleCategoria('Salgados')">Salgados</button>
        <button onclick="toggleCategoria('Macarrão')">Macarrão</button>
      </div>


      <div class="categorias">
        <?php

        foreach ($categoriasItens as $categoria => $itens) {
        ?>
          <div class="categoria" id="<?php echo $categoria; ?>">
            <ul>
              <?php foreach ($itens as $item) { ?>
                <li>
                  <button class="botaoProdutos" onclick="adicionarItem('<?php echo $item['nome']; ?>', <?php echo $item['valor']; ?>)">
                    <?php echo $item['nome'] . ' - R$ ' . number_format($item['valor'], 2); ?>
                  </button>
                </li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="containerCompras">

      <div class="containerListaCompra">
        <div class="lista">
          <h2>PEDIDO</h2>
          <ul id="listaCompras">
            <!-- Aqui serão exibidos os itens adicionados -->
          </ul>
        </div>
        <div class="containerPagamento">
          <p id="total">Total: R$ 0.00</p>
          <button class="botaoPagamento" onclick="finalizarCompra()">Confirmar Pagamento</button>
        </div>
      </div>

    </div>

  </div>



  <script>
    /////////////////////////

    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

    ///////////////////////

    document.addEventListener("DOMContentLoaded", function() {
      function verificarItensSalvos() {
        for (var i = 1; i <= 10; i++) {
          var mesaId = i;
          var listaComprasMesa = localStorage.getItem('listaComprasMesa' + mesaId);
          var botaoMesa = document.getElementById('botaoMesa' + mesaId);

          if (listaComprasMesa && listaComprasMesa.length > 0) {
            botaoMesa.classList.remove('botaoMesaNormal');
            botaoMesa.classList.add('botaoMesaVermelho');
          } else {
            botaoMesa.classList.remove('botaoMesaVermelho');
            botaoMesa.classList.add('botaoMesaNormal');
          }
        }
      }

      // Verifica a cada 5 segundos se há itens salvos na lista de compras de cada mesa
      setInterval(verificarItensSalvos, 2000); // 2000 milissegundos = 2 segundos
      verificarItensSalvos(); // Chama a função pela primeira vez para iniciar a verificação imediatamente
    });


    var listaCompras = []
    var total = 0;

    function adicionarItem(nome, valor) {

      var itemExistente = listaCompras.find(item => item.nome === nome);


      if (itemExistente) {
        itemExistente.quantidade++;
        itemExistente.total += valor;
      } else {
        listaCompras.push({
          mesa: <?= $_SESSION['mesa']['id'] ?>,
          nome: nome,
          valor: valor,
          quantidade: 1,
          total: valor
        });
      }

      total += valor;
      exibirListaCompras();
    }


    // Função para carregar a lista de compras salva no LocalStorage, se existir
    function carregarListaCompras() {
      const mesaId = <?= $_SESSION['mesa']['id'] ?>;
      const listaSalva = localStorage.getItem('listaComprasMesa' + mesaId);

      if (listaSalva) {
        listaCompras = JSON.parse(listaSalva);
        exibirListaCompras();
      }
    }

    // function para remover a lista de compras do LocalStorage
    function removerListaCompras() {
      const mesaId = <?= $_SESSION['mesa']['id'] ?>;
      localStorage.removeItem('listaComprasMesa' + mesaId);
    }


    // Função para salvar a lista de compras no LocalStorage
    function salvarListaCompras() {
      const mesaId = <?= $_SESSION['mesa']['id'] ?>;
      localStorage.setItem('listaComprasMesa' + mesaId, JSON.stringify(listaCompras));

    }

    // Função para exibir a lista de compras ao carregar a página
    function exibirListaCompras() {
      var lista = document.getElementById('listaCompras');
      var totalElement = document.getElementById('total');

      lista.innerHTML = '';
      total = 0;

      listaCompras.forEach(function(item) {
        var li = document.createElement('li');
        var divItem = document.createElement('div');
        divItem.classList.add('item');

        var nomeItem = document.createElement('span');
        nomeItem.textContent = item.quantidade + ' - ' + item.nome + ' R$ ' + item.valor.toFixed(2);

        var divBotoes = document.createElement('div');

        var botaoMenos = document.createElement('button');
        botaoMenos.textContent = '-';
        botaoMenos.onclick = function() {
          diminuirQuantidade(item);
        };

        var botaoMais = document.createElement('button');
        botaoMais.textContent = '+';
        botaoMais.onclick = function() {
          adicionarQuantidade(item);
        };

        divBotoes.appendChild(botaoMenos);
        divBotoes.appendChild(botaoMais);

        divItem.appendChild(nomeItem);
        divItem.appendChild(divBotoes);
        li.appendChild(divItem);
        lista.appendChild(li);

        total += item.total;
      });
      salvarListaCompras();
      totalElement.textContent = 'Total: R$ ' + total.toFixed(2);
    }

    function adicionarQuantidade(item) {
      item.quantidade++;
      item.total += item.valor;
      total += item.valor;
      salvarListaCompras();
      exibirListaCompras();
    }

    function diminuirQuantidade(item) {
      if (item.quantidade > 1) {
        item.quantidade--;
        item.total -= item.valor;
        total -= item.valor;
      } else {
        const index = listaCompras.indexOf(item);
        if (index !== -1) {
          listaCompras.splice(index, 1);
          total -= item.total;
        }
      }

      salvarListaCompras();
      exibirListaCompras();

      // Verifica se não há mais itens na lista de compras para remover do localStorage
      if (listaCompras.length === 0) {
        removerListaCompras();
      }
    }



    function toggleCategoria(categoria) {
      var categorias = document.getElementsByClassName('categoria');
      for (var i = 0; i < categorias.length; i++) {
        categorias[i].classList.remove('active');
      }

      var categoriaSelecionada = document.getElementById(categoria);
      categoriaSelecionada.classList.add('active');
    }

    let formaPagamentoSelecionada = '';

    function finalizarCompra() {
      if (listaCompras.length === 0) {
        alert(
          "Seu carrinho está vazio. Adicione produtos antes de finalizar a compra."
        );
        return;
      }

      const Pagamento = prompt(
        "Digite: \n 1 aiboo \n 2 Pix \n 3 Cartão de débito \n 4 Cartão de crédito \n Dinheiro pressione ENTER"
      );
      if (Pagamento > 0 || Pagamento <= 5) {
        switch (Pagamento) {
          case 1:
            alert("Aiboo selecionado!");
            break;
          case 2:
            alert("Pix selecionado!");
            break;
          case 3:
            alert("Cartão de débito selecionado!");
            break;
          case 4:
            alert("Cartão de crédito selecionado!");
            break;
          case "":
            alert("Dinheiro selecionado!");
            break;

          default:
            break;
        }
      }
      var trocoInput;
      if (Pagamento <= 5) {
        trocoInput = prompt("Insira o Troco ou continue sem troco.");
      } else {
        alert("Erro na forma de pagamento");
        return;
      }

      if (trocoInput == "" || trocoInput > 0) {
        if (Pagamento == "1") {
          listaCompras.forEach(function(objeto) {
            objeto.tipo_venda = "Aiboo";
            objeto.tipo = 1;
          });
        } else if (Pagamento == "2") {
          listaCompras.forEach(function(objeto) {
            objeto.tipo_venda = "Pix";
            objeto.tipo = 2;
          });
        } else if (Pagamento == "3") {
          listaCompras.forEach(function(objeto) {
            objeto.tipo_venda = "Cartão de débito";
            objeto.tipo = 3;
          });
        } else if (Pagamento == "4") {
          listaCompras.forEach(function(objeto) {
            objeto.tipo_venda = "Cartão de crédito";
            objeto.tipo = 4;
          });
        } else if (Pagamento == "") {
          listaCompras.forEach(function(objeto) {
            objeto.tipo_venda = "Dinheiro";
            objeto.tipo = 5;
          });
        }
      }

      if (trocoInput > total) {
        const valorTroco = trocoInput - total;
        alert(`
            Compra finalizada!\n
            Total : R$ ${total.toFixed(2)}\n
            Troco: R$ ${valorTroco.toFixed(2)}`);
        dbSalvar();
        total = 0;
        listaCompras = [];
        exibirListaCompras();
        removerListaCompras()

        return;
      } else if (trocoInput == '') {
        alert(`
            Compra finalizada!\n
            Total : R$ ${total.toFixed(2)}\n`);
        dbSalvar();

        total = 0;
        listaCompras = [];
        exibirListaCompras();
        removerListaCompras()
        return;
      } else if (trocoInput <= total) {
        alert("Insira um valor de troco Valido!");
        return;
      }
    }
    carregarListaCompras();


    async function dbSalvar() {
      const dataToSend = JSON.stringify(listaCompras);
      const url = "http://localhost/oneburger/public/salvar";


      try {
        const response = await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: dataToSend,
        });
        console.log(dataToSend);
        if (!response.ok) {
          throw new Error(`Erro na resposta do servidor: ${response.status}`);

        }

        await response.text();
      } catch (error) {
        console.log("Erro ao enviar a requisição:", error);
      }
    }
  </script>
</body>

</html>