<?php
if (isset($_SESSION['user'])) :

?>

    <nav class="navbar navbar-expand-lg   ">
        <div class="navBlock container-fluid">

            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Forum
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/actuality">Actualité</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </li>

                    &nbsp;

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Utilisateur
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/message">Message</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Market Place
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/annonce">Quoi de neuf</a></li>
                            <li><a class="dropdown-item" href="/annonce/me">Mes annonces</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/annonce/create">Cree une annonce</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"><?php print_r($_SESSION['user']['username']) ?></a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="navSearch form-control me-2" type="search" placeholder="Search" aria-label="Search">&nbsp;
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

            <a class="nav-link textNav" href="/logout">Deconnexion</a>
            <a class="nav-link textNav href=" /logout"> </a>

        </div>

    </nav>

<?php
else :
?>

    <nav class="navbar navbar-expand-lg ">
        <div class="navBlock container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Inscription</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="navLine ">

    </div>

<?php
endif;
?>