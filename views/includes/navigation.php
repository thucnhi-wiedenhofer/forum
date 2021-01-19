
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" <?php echo 'href="'. WWW_ROOT.'posts/home"'; ?>>Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                        
                    <?php 
                    if(isset($_SESSION['id']) && ($_SESSION['role']=='membre' || $_SESSION['role']=='moderateur')) //message de connexion dans la navbar et bouton de déconnexion
                    {
                        echo '<li class="nav-item active align-right">
                        <span class="nav-link">Vous êtes connecté(e)'; if($_SESSION['role']=='moderateur'){echo ' comme Modérateur.';}else{echo ' comme Membre.';}   
                        echo '</span></li>';
                        echo '<li class="nav-item align-right">';
                        echo '<a href="'. WWW_ROOT.'users/profil" class="nav-link">Modifier</a>';
                        echo '</li>';
                        echo '<li class="nav-item align-right">';
                        echo '<a href="'.WWW_ROOT.'users/logout" class="nav-link">Déconnexion</a>
                        </li>';
                    }
                    elseif(isset($_SESSION['id']) && ($_SESSION['role']=='admin')){
                        echo '<li class="nav-item active align-right">
                        <span class="nav-link">Vous êtes connecté(e) en temps qu\'administrateur.</span>    
                        </li>';
                        echo '<li class="nav-item align-right">';
                        echo '<a href="'. WWW_ROOT.'admins/profil" class="nav-link">Modifier</a>';
                        echo '</li>';
                        echo '<li class="nav-item align-right">';
                        echo '<a href="'.WWW_ROOT.'admins/logout" class="nav-link">Déconnexion</a>
                        </li>';
                    }
                    else
                    {
                        echo '<li class="nav-item">';                        
                        echo '<a href="'. WWW_ROOT.'users/inscription" class="nav-link" >Inscription</a>';
                        echo   '<span class="sr-only">(current)</span>
                        </li>
                        <li class="nav-item ">';
                        echo   '<a href="'.WWW_ROOT.'users/connexion" class="nav-link">Connexion</a>
                        </li>';
                    }
                     
            echo '</ul>';
            if(!isset($_SESSION['id'])){
                echo '<div class="pull-left"><a class="btn btn-primary"  href="'.WWW_ROOT.'admins/connexion">Administration</a></div>';
            }
            elseif(isLoggedIn() && $_SESSION['role']=="admin"){echo '<div class="pull-left"><a class="btn btn-primary"  href="'.WWW_ROOT.'admins/crud">CRUD</a></div>';}
            elseif(isLoggedIn() && $_SESSION['role']!="admin"){echo '<div class="pull-left"><a class="btn btn-primary"  href="'.WWW_ROOT.'intranets/listMail/'.$_SESSION['id'].'">INTRANET</a></div>';}
            ?>
            

        </div>
    </nav>
