<?php
   require APPROOT . '/views/includes/head.php';
?>
 <body>

        <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
            require APPROOT . '/views/includes/navigation.php';
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
                    <div class="col-lg-8 col-md-8">
                        <div class="post-rules center">
                        <h6>Bienvenue, il y a actuellement XX membres connectés sur le forum. </h6><br>
                    <p>Le forum Scy~Fy est votre espace ! C'est un lieu où vous pouvez échanger 
                        librement avec la plus grande communauté de fans de la culture pop dédiée à la science fiction. </p></br>                          
                        <a class="btn btn-primary" href="<?php echo URLROOT;?>/posts/conversations" role="button">Accéder aux conversations</a></br></br>
                        <p>Seuls les membres peuvent poster des messages.</p>  
                        <p>En vous inscrivant, vous acceptez les <a href="<?php echo URLROOT;?>/pages/regles"><b>Règles du forum</b></a></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4">
                        
                        <?php if(!empty($_SESSION)){
                            if($_SESSION['role']== 'admin' || $_SESSION['role']== 'moderateur'){
                            echo'</br></br><a class="btn btn-warning" href="'.URLROOT.'/topics/create"
                             role="button">Ajout topic</a></br></br>';} 
                        }  
                        ?>
                            
                        <div class="sidebarblock">
                            <h3>Topics</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <ul class="cats">
                                    <?php foreach($data['topics'] as $topics){
                                        if($topics->droits == 'membre' && isset($_SESSION['role'])){echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';}
                                        elseif($topics->droits == 'admin' && $_SESSION['role'] == 'admin'){echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';}                                      
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
require APPROOT . '/views/includes/footer.php';
?>