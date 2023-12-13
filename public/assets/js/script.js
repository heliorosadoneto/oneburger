let listaDeCompras = [];
let total = 0;

function adicionarProduto(produto, preco) {
  const itemExistente = listaDeCompras.find((item) => item.produto === produto);
  if (itemExistente) {
    itemExistente.quantidade++;
  } else {
    listaDeCompras.push({ produto, preco, quantidade: 1 });
  }

  total += preco;
  atualizarLista();
}

function atualizarLista() {
  const lista = document.getElementById("lista-de-compras");
  const totalElement = document.getElementById("total");

  lista.innerHTML = "";
  listaDeCompras.forEach((item) => {
    const listItem = document.createElement("li");
    listItem.innerHTML = `
        <p> ${item.quantidade} X ${item.produto} - R$ ${item.preco.toFixed(
      2
    )}</p>
        <div class="botaoContainer">
        <button class="botaoUpDow" onclick="diminuirQuantidade('${
          item.produto
        }', ${item.preco})">-</button>
        <button class="botaoUpDow" onclick="aumentarQuantidade('${
          item.produto
        }', ${item.preco})">+</button>
        </div>
        `;
    lista.appendChild(listItem);
  });

  totalElement.textContent = `Total: R$ ${total.toFixed(2)}`;
}

function diminuirQuantidade(produto, preco) {
  const itemExistenteIndex = listaDeCompras.findIndex(
    (item) => item.produto === produto
  );
  if (itemExistenteIndex !== -1) {
    if (listaDeCompras[itemExistenteIndex].quantidade > 1) {
      listaDeCompras[itemExistenteIndex].quantidade--;
      total -= preco;
    } else {
      listaDeCompras.splice(itemExistenteIndex, 1);
      total -= preco;
    }
    atualizarLista();
  }
}
function aumentarQuantidade(produto, preco) {
  const itemExistente = listaDeCompras.find((item) => item.produto === produto);
  if (itemExistente) {
    itemExistente.quantidade++;
    total += preco;
    atualizarLista();
  }
}

function finalizarCompra() {
  if (listaDeCompras.length === 0) {
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
      listaDeCompras.forEach(function (objeto) {
        objeto.tipo_venda = "Aiboo";
        objeto.tipo = 1;
      });
    } else if (Pagamento == "2") {
      listaDeCompras.forEach(function (objeto) {
        objeto.tipo_venda = "Pix";
        objeto.tipo = 2;
      });
    } else if (Pagamento == "3") {
      listaDeCompras.forEach(function (objeto) {
        objeto.tipo_venda = "Cartão de débito";
        objeto.tipo = 3;
      });
    } else if (Pagamento == "4") {
      listaDeCompras.forEach(function (objeto) {
        objeto.tipo_venda = "Cartão de crédito";
        objeto.tipo = 4;
      });
    } else if (Pagamento == "") {
      listaDeCompras.forEach(function (objeto) {
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
    listaDeCompras = [];
    atualizarLista();

    return;
  } else if (trocoInput == '' ) {
    alert(`
    Compra finalizada!\n
    Total : R$ ${total.toFixed(2)}\n
    
    `);
    dbSalvar();

    total = 0;
    listaDeCompras = [];
    atualizarLista();
    return;
  } else if(trocoInput <= total) {
    alert("Insira um valor de troco Valido!");
    return;
  }
}

async function dbSalvar() {
  const dataToSend = JSON.stringify(listaDeCompras);
  const url = "http://localhost/oneburger/public/salvar";

  try {
    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: dataToSend,
    });

    if (!response.ok) {
      throw new Error(`Erro na resposta do servidor: ${response.status}`);
    }

    await response.text();
  } catch (error) {
    console.log("Erro ao enviar a requisição:", error);
  }
}
