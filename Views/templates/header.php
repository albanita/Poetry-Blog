<!DOCTYPE html>
<html lang="ro">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Poezii Daniela Baniță</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link rel="stylesheet" href="<?= base_url ?>scss/stiluri.css">
        <link rel="icon" href="<?=image_root?>icon.png">
    </head>
    <body>
        <script src="<?= base_url ?>js/bootstrap.js"></script>
        <script src="<?= base_url ?>js/auxiliaryFunctions/openLink.js"></script>
        <script src="<?= base_url ?>js/auxiliaryFunctions/search.js"></script>

        <section>
            <nav class="navbar navbar-dark bg-dark navbar-expand-xl fixed-top">
                <div class="container-fluid">      
                    <a href="#" class="navbar-brand">
                        <strong>Blog poezii Daniela Banita</strong>
                    </a>

                    <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#menu-principal" aria-controls="menu-principal" aria-expanded="false"
                            aria-label="">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="menu-principal">
                        <ul class="navbar-nav ml-auto">
                            <form class="d-flex">
                                <input class="form-control me-2" id="title" type="search" placeholder="Titlu poezie" aria-label="Search">
                                <a href="<?= base_url ?>poem/search&title=" id="btn" class="btn btn-outline-success" type="submit">Cauta poezie</a>
                            </form>
                            <li class="nav-item"><a href="<?= base_url ?>" class="nav-link">Acasa</a></li>
                            <li class="nav-item"><a href="<?=base_url?>user/about" class="nav-link">Despre mine</a></li>
                            <li class="nav-item"><a href="<?=base_url?>user/testimony" class="nav-link">Marturia mea</a></li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dinCartea" data-bs-toggle="dropdown" aria-expanded="false">
                                    Din cartea
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dinCartea">
                                <?php $books = Utils::getBooks(); ?>
                                <?php while ($book = $books->fetch_object()): ?>
                                    <li><a class="dropdown-item" href="<?= base_url ?>book/show&id=<?= $book->id ?>&name=<?= $book->titlu ?>"><?= $book->titlu ?></a></li>
                                <?php endwhile; ?>
                                </ul>
                            </div>

                            <?php if(Utils::userLogedIn()): ?>
                            <!--user logged in-->
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="adaugaPC" data-bs-toggle="dropdown" aria-expanded="false">
                                    Adauga
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="adaugaPC">
                                    <li><a class="dropdown-item" href="<?= base_url ?>poem/add">Poezie</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url?>book/add">Carte</a></li>
                                </ul>
                            </div>
                            <!--end user logged in-->
                            <?php endif; ?>
                            
                            <?php if(Utils::userLogedIn()): ?>
                            <li class="nav-item"><a href="<?=base_url?>user/logOut" class="nav-link">Inchide sesiunea</a></li>
                            <?php else: ?>
                            <li class="nav-item"><a href="<?=base_url?>user/signIn" class="nav-link">Conectati-va</a></li>
                            <?php endif; ?>
                            <li class="nav-item"><a href="<?=base_url?>contact/index" class="nav-link">Contact Administrator</a></li>
                            <li class="nav-item"><a href="<?=base_url?>news/index" class="nav-link">Urmareste blogul</a></li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </section>

        <!--page content-->
        <section class="py-4 mt-5">
            <div class="container">