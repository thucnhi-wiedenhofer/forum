<?php
   require (ROOT.'views/includes/head.php');
?>
 <body>

        <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
            require (ROOT.'views/includes/navigation.php');
            ?>
            <div class="tp-banner-container">
                <p class="h1">Scy~Fy</p> 
                <p class="h5">Le forum de la culture pop</p>
            </div>
            </div>
        </div>
            
    
		<section class="content">                
            <div class="container">
        
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="post-rules center">
                        <h6>Bienvenue, il y a actuellement <?php echo $data['countConnected']->count; if($data['countConnected']->count >1) {echo ' membres connectés';} else{echo ' membre connecté';} ?>  sur le forum. </h6><br>
                    <p>Le forum Scy~Fy est votre espace ! C'est un lieu où vous pouvez échanger 
                        librement avec la plus grande communauté de fans de la culture pop dédiée à la science fiction. </p>                       
                        <p>En vous inscrivant, vous acceptez les <a href="<?=WWW_ROOT ?>pages/regles"><b>Règles du forum</b></a><br />
                        <i>(Seuls les membres peuvent poster des messages.)</i></p>
                        <p><b>Pour accéder aux conversations :</b></p>
                         <p>CHOISISSEZ UN THEME DANS LA LISTE ADJACENTE <b>>>></b></p>
                       
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6">
                    <br />
                        
                        <?php if(!empty($_SESSION['role'])){
                            if($_SESSION['role']== 'admin' || $_SESSION['role']== 'moderateur'){
                            echo'</br></br><a class="btn btn-warning" href="'.WWW_ROOT.'topics/create"
                             role="button">Ajout topic</a></br></br>';} 
                        }  
                        ?>
                            
                        <div class="sidebarblock">

                            <h3>Topics</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <ul class="cats">
                                    <?php foreach($data['topics'] as $topics){
                                        if(!empty($_SESSION['role'])){
                                            if($_SESSION['role']=="admin"){
                                            echo '<li><a href="'.WWW_ROOT.'conversations/listConversations/'.$topics->id.'">'.$topics->titre.'<span class="badge pull-right">';
                                            $compt="0";
                                            foreach($data['count'] as $count){ if($topics->id == $count->id_topic){$compt= $count->freq;}}
                                            echo $compt;                                                                                    
                                            echo '</span></a></li>';}
                                            elseif($topics->droits != "administrateur" && $_SESSION['role'] == 'moderateur'){
                                            echo '<li><a href="'.WWW_ROOT.'conversations/listConversations/'.$topics->id.'">'.$topics->titre.'<span class="badge pull-right">';
                                            $compt="0";
                                            foreach($data['count'] as $count){ if($topics->id == $count->id_topic){$compt= $count->freq;}}
                                            echo $compt; 
                                            echo '</span></a></li>';}
                                            elseif($_SESSION['role'] == "membre" && $topics->droits != "administrateur"){
                                            echo '<li><a href="'.WWW_ROOT.'conversations/listConversations/'.$topics->id.'">'.$topics->titre.'<span class="badge pull-right">';
                                            $compt="0";
                                            foreach($data['count'] as $count){ if($topics->id == $count->id_topic){$compt= $count->freq;}}
                                            echo $compt; 
                                            echo '</span></a></li>';}
                                        }else{ if($topics->droits == "visiteur"){
                                        echo '<li><a href="'.WWW_ROOT.'conversations/listConversations/'.$topics->id.'">'.$topics->titre.'<span class="badge pull-right">';
                                        $compt="0";
                                        foreach($data['count'] as $count){ if($topics->id == $count->id_topic){$compt= $count->freq;}}
                                        echo $compt; 
                                        echo '</span></a></li>';}   }                                 
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
require ROOT . '/views/includes/footer.php';
?>