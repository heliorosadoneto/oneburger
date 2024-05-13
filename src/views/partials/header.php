
<header>
    <div class="logo">

        <img src="<?= $base ?>/assets/img/logo.jpg" alt="">

        <h4>One Burger</h4>
    </div>
    <nav>
        <ul>
            <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'gerente') { ?>
                <li><a href="<?= $base; ?>/">Home</a></li>
                <li><a href="<?= $base; ?>/vendas">Relatório de venda</a></li>
                <li><a href="<?= $base; ?>/contaspagar">Contas á pagar</a></li>
            <?php } ?>
            <li><a href="<?= $base; ?>/sair">Sair</a></li>
        </ul>
    </nav>
</header>