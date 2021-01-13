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
                    <div class="col-lg-12 breadcrumbf">
                    <?php echo'<a href="'.URLROOT.'/posts/home">HOME ></a>';?> 
                        <a href="#">TOPIC: <?= $data['topic']->titre ?></a> 
                    </div>
                </div>
            </div>                
            <div class="container">
           
                <div class="row">
                
                    <div class="col-lg-8 col-md-8">
                        <!-- POST -->
                            <br />                   
                                                                                                             
                                   <?php foreach($data['conversations'] as $conversation){
                                    ?>
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <a href="<?php echo URLROOT.'/users/vueProfil/'.$conversation->id_utilisateur.'"><img src="'.URLROOT.'/public/images/avatars/'.$conversation->avatar.'.png " alt="" /></a>'; ?>
                                                    <div class="status green">&nbsp;</div>
                                                </div>

                                            </div>
                                            <div class="posttext pull-left">
                                                <h2><?php echo '<a href="'.URLROOT.'/messages/listMessages/'.$conversation->id.'">'.$conversation->titre.'</a>'; ?></h2>
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
                                            
                                <?php
                                if(isLoggedIn() && $conversation->id_utilisateur==$_SESSION['id']){
                                        echo '<div class="views"><a href="'. URLROOT.'/conversations/modify/'.$conversation->id.'"> <i class="fa fa-eye"></i> modifier</a></div>';} 
                                ?>
                               
                                        <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>                                    
                                    </div>
                                    <div class="clearfix"></div>
                    
                                
                                <?php  
                               }
                              ?>
                              </div>
                              <?php if(empty($data['conversations'])){
                                  echo '<div class="post">';
                                    
                                    echo '<p class="h4">Ce topic ne contient pas encore de conversations</p>';
                                    echo '<img class="img-resp" src="'.URLROOT.'/public/images/conversation.png " alt="" />';
                                    echo '<p class="h5">Si vous êtes connecté, vous pouvez en ajouter une</p>';
                                  echo '</div>';
                                 
                              }
                              ?>
                             
                    </div><!-- POST -->      
                        
                   
                    
                    <div class="col-lg-4 col-md-4">
                            
                        <div class="sidebarblock">

                          
                            <div class="divline"></div>
                            <div class="blocktxt">
                            <?php if(!isLoggedIn()){ ?>
                               
                                <img class="img-resp" src="<?php echo URLROOT; ?>/public/images/cyberpunk.jpg" alt="cyber">
                               
                                <?php }else{ ?>
                                <form action="<?php echo URLROOT; ?>/conversations/create" class="form newtopic" method="post">
                                        <div class="postinfotop">
                                            <h5>Ajouter conversation </h5>
                                        </div>

                                        <!-- acc section -->
                                        <div class="accsection">
                                            
                                            <div class="topwrap">
                                                <div class="userinfo pull-left">&nbsp;</div>
                                                    <div class="posttext pull-left">
                                                        <label for="titre">Titre:</label>                                                
                                                        <input type="text" id="titre" placeholder="Titre"  name="titre" class="form-control" required/>
                                                        <label for="texte">Texte:</label>
                                                        <textarea id="texte" name="texte" rows="3" cols="33"></textarea>                                                 
                                                        
                                                        <input type="hidden"  name="id_utilisateur" value="<?php echo $_SESSION['id']; ?>" />
                                                        <input type="hidden" name="id_topic" value="<?php echo $data['id_topic']; ?>" />
                                                    </div>
                                                </div>                                                
                                                
                                        
                                                <div class="clearfix"></div>
                                                <div class="pull-right postreply">
                                                    <div class="pull-left"><button type="submit" class="btn btn-primary">Publier</button></div>
                                                    </form>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                
                            </div>
                            <?php } ?> 
                        </div><!-- acc section END -->                        
                    </div>
                </div>
            </div>
        </section>
<?php
require APPROOT . '/views/includes/footer.php';
?>