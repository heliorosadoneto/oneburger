<!DOCTYPE html>
<html>

<head>
  <title>Produtos da Mesa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Estilos CSS */
    /* Adicione seus estilos aqui */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .navbar {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f2f2f2;
      padding: 10px;
    }

    .navbar button {
      margin: 0 5px;
      padding: 5px 10px;
      border: none;
      cursor: pointer;
    }

    .categorias {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 10px;
    }

    .categoria {
      display: none;
      text-align: center;
      width: 100%;
    }

    .categoria.active {
      display: block;
    }

    .categoria ul {
      list-style: none;
      padding: 0;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .categoria ul li {
      margin: 10px;
    }

    .categoria ul li button {
      width: 150px;
      height: 50px;
      background-color: #ccc;
      border: none;
      cursor: pointer;
      margin-bottom: 10px;
    }

    .compras {
      margin-top: 20px;
      padding: 10px;
      border: 1px solid #ccc;
    }

    .item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 5px;
    }

    .item button {
      width: 30px;
      height: 30px;
      border: none;
      cursor: pointer;
    }

    /* Estilos para telas menores, como celulares */
    @media screen and (max-width: 600px) {
      .navbar {
        flex-direction: column;
        align-items: center;
      }

      .navbar button {
        margin: 5px 0;
      }

      .categorias {
        padding: 5px;
      }

      .categoria ul li button {
        width: 120px;
        height: 40px;
        margin-bottom: 5px;
      }

      .compras {
        padding: 5px;
      }

      .item button {
        width: 25px;
        height: 25px;
      }
    }
  </style>
</head>

<body>

<h1 style="text-align: center;">Menu de Vendas - Mesa <?php echo isset($_SESSION['mesa']['id']) ? $_SESSION['mesa']['id'] : ($_SESSION['mesa']['id'] = 1) ; ?></h1>


  <div class="navbar">
    <button onclick="toggleCategoria('salgados')">Salgados</button>
    <button onclick="toggleCategoria('doces')">Doces</button>
    <button onclick="toggleCategoria('hamburguers')">Hambúrguers</button>
    <button onclick="toggleCategoria('bolos')">Bolos</button>
    <button onclick="toggleCategoria('bebidas')">Bebidas</button>
  </div>

  <div class="categorias">
    <!-- Container para cada categoria -->
  </div>

  <div class="compras">
    <h2>Lista de Compras</h2>
    <ul id="listaCompras">
      <!-- Aqui serão exibidos os itens adicionados -->
    </ul>
    <p id="total">Total: R$ 0.00</p>
  </div>
  <div>
      <button onclick="finalizarCompra()">Confirmar Pagamento</button>
    </div>
  </div>

  <script>
    var categoriasItens = {
      salgados: [{
          nome: 'Salgado 1',
          valor: 2.50
        },
        {
          nome: 'Salgado 2',
          valor: 3.00
        },
        {
          nome: 'Salgado 3',
          valor: 2.20
        },
        {
          nome: 'Salgado 4',
          valor: 2.80
        },
        {
          nome: 'Salgado 5',
          valor: 3.50
        }
      ],
      doces: [{
          nome: 'Doce 1',
          valor: 4.00
        },
        {
          nome: 'Doce 2',
          valor: 3.50
        },
        {
          nome: 'Doce 3',
          valor: 2.80
        },
        {
          nome: 'Doce 4',
          valor: 3.20
        },
        {
          nome: 'Doce 5',
          valor: 4.50
        }
      ],
      hamburguers: [{
          nome: 'Hambúrguer 1',
          valor: 8.00
        },
        {
          nome: 'Hambúrguer 2',
          valor: 7.50
        },
        {
          nome: 'Hambúrguer 3',
          valor: 9.20
        },
        {
          nome: 'Hambúrguer 4',
          valor: 6.80
        },
        {
          nome: 'Hambúrguer 5',
          valor: 8.50
        }
      ],
      bolos: [{
          nome: 'Bolo 1',
          valor: 15.00
        },
        {
          nome: 'Bolo 2',
          valor: 12.50
        },
        {
          nome: 'Bolo 3',
          valor: 10.80
        },
        {
          nome: 'Bolo 4',
          valor: 13.20
        },
        {
          nome: 'Bolo 5',
          valor: 14.50
        }
      ],
      bebidas: [{
          nome: 'Bebida 1',
          valor: 5.00
        },
        {
          nome: 'Bebida 2',
          valor: 4.50
        },
        {
          nome: 'Bebida 3',
          valor: 3.80
        },
        {
          nome: 'Bebida 4',
          valor: 2.50
        },
        {
          nome: 'Bebida 5',
          valor: 6.00
        }
      ]
    };

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
  const mesaId = <?= $_SESSION['mesa']['id']?>;
  const listaSalva = localStorage.getItem('listaComprasMesa' + mesaId);

  if (listaSalva) {
    listaCompras = JSON.parse(listaSalva);
    exibirListaCompras();
  }
}

// Função para salvar a lista de compras no LocalStorage
function salvarListaCompras() {
  const mesaId = <?= $_SESSION['mesa']['id']?>;
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
    nomeItem.textContent = item.nome + ' - Total: R$ ' + item.total.toFixed(2);

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
  salvarListaCompras()
  totalElement.textContent = 'Total: R$ ' + total.toFixed(2);
}

    function adicionarQuantidade(item) {
      item.quantidade++;
      item.total += item.valor;
      total += item.valor;
      salvarListaCompras()
      exibirListaCompras();
    }

    function diminuirQuantidade(item) {
      if (item.quantidade > 1) {
        item.quantidade--;
        item.total -= item.valor;
        total -= item.valor;
      } else {
        var index = listaCompras.indexOf(item);
        if (index !== -1) {
          listaCompras.splice(index, 1);
          total -= item.total;
        }
      }
      salvarListaCompras();
      exibirListaCompras();
    }

    function toggleCategoria(categoria) {
      var categorias = document.getElementsByClassName('categoria');
      for (var i = 0; i < categorias.length; i++) {
        categorias[i].classList.remove('active');
      }

      var categoriaSelecionada = document.getElementById(categoria);
      categoriaSelecionada.classList.add('active');
    }

    for (const categoria in categoriasItens) {
      const divCategoria = document.createElement('div');
      divCategoria.classList.add('categoria');
      divCategoria.id = categoria;

      const ul = document.createElement('ul');
      categoriasItens[categoria].forEach(item => {
        const li = document.createElement('li');
        const button = document.createElement('button');
        button.textContent = item.nome + ' - R$ ' + item.valor.toFixed(2);
        button.onclick = function() {
          adicionarItem(item.nome, item.valor);
        };
        li.appendChild(button);
        ul.appendChild(li);
      });

      divCategoria.appendChild(ul);
      document.querySelector('.categorias').appendChild(divCategoria);
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
      listaCompras.forEach(function (objeto) {
        objeto.tipo_venda = "Aiboo";
        objeto.tipo = 1;
      });
    } else if (Pagamento == "2") {
      listaCompras.forEach(function (objeto) {
        objeto.tipo_venda = "Pix";
        objeto.tipo = 2;
      });
    } else if (Pagamento == "3") {
      listaCompras.forEach(function (objeto) {
        objeto.tipo_venda = "Cartão de débito";
        objeto.tipo = 3;
      });
    } else if (Pagamento == "4") {
      listaCompras.forEach(function (objeto) {
        objeto.tipo_venda = "Cartão de crédito";
        objeto.tipo = 4;
      });
    } else if (Pagamento == "") {
      listaCompras.forEach(function (objeto) {
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
    Troco: R$ ${valorTroco.toFixed(2)}
    `);
    dbSalvar();
    total = 0;
    listaCompras = [];
      exibirListaCompras();

    return;
  } else if (trocoInput == '' ) {
    alert(`
    Compra finalizada!\n
    Total : R$ ${total.toFixed(2)}\n
    
    `);
    dbSalvar();

    total = 0;
    listaCompras = [];
      exibirListaCompras();
    return;
  } else if(trocoInput <= total) {
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