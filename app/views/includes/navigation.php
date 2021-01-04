
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                        
                    <?php 
                    if(isset($_SESSION['id'])) //message de connexion dans la navbar et bouton de déconnexion
                    {
                        echo '<li class="nav-item active align-right">
                        <span class="nav-link">Vous êtes connecté(e)</span>    
                        </li>';
                        echo '<li class="nav-item align-right">';
                        echo '<a href="'. URLROOT.'/users/profil" class="nav-link">Modifier</a>';
                        echo '</li>';
                        echo '<li class="nav-item align-right">';
                        echo '<a href="'.URLROOT.'/users/logout" class="nav-link">Déconnexion</a>
                        </li>';
                    }
                    else
                    {
                        echo '<li class="nav-item">';                        
                        echo '<a href="'. URLROOT.'/users/inscription" class="nav-link" >Inscription</a>';
                        echo   '<span class="sr-only">(current)</span>
                        </li>
                        <li class="nav-item ">';
                        echo   '<a href="'.URLROOT.'/users/connexion" class="nav-link">Connexion</a>
                        </li>';
                    }
                    ?> 
            </ul>

        </div>
    </nav>
