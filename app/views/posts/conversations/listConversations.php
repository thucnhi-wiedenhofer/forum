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
                        <!-- POST -->

                        <?php                                
                                    foreach($data['conversations'] as $conversation){                                                                          
                                   
                                    ?>
                                    <div class="post">
                            <div class="wrap-ut pull-left">
                                <div class="userinfo pull-left">
                                    <div class="avatar">
                                        <a href="<?php echo URLROOT.'/users/vueProfil('.$conversation->id_utilisateur.')"><img src="'.URLROOT.'/public/images/avatars/'.$conversation->avatar.'.png " alt="" /></a>'; ?>
                                        <div class="status green">&nbsp;</div>
                                    </div>

                                </div>
                                <div class="posttext pull-left">
                                    <h2><a href="02_topic.html"><?= $conversation->titre ?></a></h2>
                                    <p><?= $conversation->texte ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="postinfo pull-left">
                                <div class="comments">
                                    <div class="commentbg">
                                        560
                                        <div class="mark"></div>
                                    </div>

                                </div>
                                <div class="views"><i class="fa fa-eye"></i> 1,568</div>
                                <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>                                    
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- POST -->

                                <?php    }
                                    ?>
                        
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
                                        if(!empty($_SESSION)){
                                            if($_SESSION['role']=="admin"){echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';}
                                            elseif($topics->droits != "administrateur" && $_SESSION['role'] == 'moderateur'){echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';}
                                            elseif($_SESSION['role'] == "membre" && $topics->droits != "administrateur"){echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';}
                                        }else{ if($topics->droits == "visiteur"){echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';}   }                                 
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