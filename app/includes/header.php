<header>
    <nav class="nav-a">
        <div class="logo">
            <span class="logo__trigger"></span>
            <a href="https://www.cel.ro/">
				<?php
				if(isset($_GET['id'])) {
					echo '    <img src="./images/cel.webp" alt="logo">';
				} else {
					echo '<img src="./app/images/cel.webp" alt="logo">';
				}
				?>
            </a>
        </div>
        <form action="" method="post">
            <input type="search" name="search-value" placeholder="Cauta un produs..">
            <button type="submit" name="search-submit"></button>
        </form>
        <div class="nav-a__links">
            <button></button>
            <a href="#">
                <div>Contul meu</div>
            </a>
            <a href="#">
                <div>Produse cumparate</div>
            </a>
            <a href="#">
                <div>Cos cumparaturi</div>
            </a>
        </div>
    </nav>

    <nav class="nav-b">
        <div class="nav-b__trigger">
            CATEGORII PRODUSE
        </div>
        <div class="nav-b__links">
            <a href="#">Produsele zilei</a>
            <a href="#">RCA Ieftin</a>
            <a href="#">Retur</a>
            <a href="#">Service</a>
            <a href="#">Contact</a>
        </div>
    </nav>

    <h1 class="search-result">
        Laptop : Cautare
    </h1>
</header>
