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
    <title>Contas à pagar</title>

</head>


<body>
    <?php $render('header'); ?>

    <div class="conteiner_contas_pagar">
        <div class="container_pesquisas">
            <form class="conteinerData" action="<?= $base; ?>/contaspagar" method="post">
            <h3>Inserir</h3>
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao">
                <label for="valor">Valor:</label>
                <input type="text" id="valor" name="valor">
                <label for="vencimento">Vencimento:</label>
                <input type="date" id="vencimento" name="vencimento">
                <input type="submit" value="Salvar">
            </form>

            <form class="conteinerData" action="<?= $base ?>/contaspagar" method="get">
            <h3>Pesquisar</h3>
                <label for="dataInicio">Início</label>
                <input type="date" req name="dataInicio" id="dataInicio">
                <label for="dataFinal">Final</label>
                <input type="date" name="dataFinal" id="dataFinal">
                <select name="tipo">
                    <option value=""> </option>
                    <option value="1">Contas pagas</option>
                    <option value="0">Contas à pagar</option>
                </select>
                <input type="submit" value="Buscar">
            </form>
        </div>
    </div>
    <!-- Este codigo sera revisto futuramente###
    <div class="container_vendas">

        <table border="2" style="color: white; width: 100%;">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>valor</th>
                    <th>Vencimento</th>
                    <th>---------</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $dado) :
                    if ($dado['tipo'] == '1') :
                ?>
                        <tr>
                            <td>
                                <?= $dado['descricao'] ?> </td>
                            <td>
                                R$: <?= $dado['valor'] ?></td>
                            <td>
                                <?= $dado['vencimento'] ?></td>
                            <td><a href="">Pago</a></td>
                        </tr>
                    <?php elseif ($dado['tipo'] == '0') : ?>
                        <tr>
                            <td style="background-color: #DB180B;">
                                <?= $dado['descricao'] ?> </td>
                            <td style="background-color: #DB180B;">
                                R$: <?= $dado['valor'] ?></td>
                            <td style="background-color: #DB180B;">
                                <?= $dado['vencimento']; ?></td>
                            <td style="background-color: #DB180B;"><a href="<?= $base; ?>/contaspagar/<?= $dado['id'] ?>/edit">Não
                                    Pago</a></td>
                        </tr>
                <?php
                    endif;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    -->
    <div>
        <h4></h4>
    </div>
    <div class="container_vendas">
        <table border="2" style="color: white; width: 100%;">
            <thead>
                <tr>

                    <?php if ($pesquisas) :

                        foreach ($pesquisas as $pesquisa) :
                        endforeach;

                        if ($pesquisa['tipo'] == '1') :
                    ?>
                            <th colspan="4">Contas pagas</th>
                        <?php
                        elseif ($pesquisa['tipo'] == '0') :
                        ?>
                            <th colspan="4">Contas à pagar</th>
                        <?php
                        endif;                  ?>
                </tr>

            </thead>
            <tbody>
                <?php foreach ($pesquisas as $pesquisa) :
                            if ($pesquisa['tipo'] == '1') :
                ?>
                        <tr>
                            <td>
                                <?= $pesquisa['descricao'] ?> </td>
                            <td>
                                R$: <?= $pesquisa['valor'] ?></td>
                            <td>
                                <?= date('d-m-Y', strtotime($pesquisa['vencimento']))
                                ?></td>
                            <td><a href="*">Pago</a></td>
                        </tr>
                    <?php elseif ($pesquisa['tipo'] == '0') : ?>
                        <tr>
                            <td style="background-color: #DB180B;">
                                <?= $pesquisa['descricao'] ?> </td>
                            <td style="background-color: #DB180B;">
                                R$: <?= $pesquisa['valor'] ?></td>
                            <td style="background-color: #DB180B;">
                                <?= date('d-m-Y', strtotime($pesquisa['vencimento'])) ?></td>
                            <td style="background-color: #DB180B;"><a href="<?= $base; ?>/contaspagar/<?= $pesquisa['id'] ?>/edit">Não
                                    Pago</a></td>
                        </tr>
            <?php
                            endif;
                        endforeach;
                    endif;
            ?>
            </tbody>
        </table>

    </div>

</body>

</html>