<?php
   require ROOT . '/views/includes/head.php';
?>
 <body>

        <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
            require ROOT . '/views/includes/navigation.php';
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
                <?php echo'<a href="'.WWW_ROOT.'posts/home">HOME ></a>';?> 
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
                            
                                 echo '<div class="post">
                                    <div class="wrap-ut pull-left">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">';
                                                echo '<a href="'.WWW_ROOT.'users/vueProfil/'.$conversation->id_utilisateur.'"><img src="'.WWW_ROOT.'public/images/avatars/'.$conversation->avatar.'.png " alt="" /></a>';
                                             
                                               foreach($data['connected'] as $connected){
                                                if(isLoggedIn() && $connected->id_utilisateur == $conversation->id_utilisateur){echo '<div class="status green">&nbsp;</div>';} 
                                               } 
                                             
                                               echo '<p><small>'.$conversation->login.'<br />';
                                               echo $conversation->role.'</small></p>';   
                                            echo'</div>';
                                            
                                           
                                                                                                                                     
                                        echo'</div>
                                        <div class="posttext pull-left">';
                                            echo '<h2><a href="'.WWW_ROOT.'messages/listMessages/'.$conversation->id.'">'.$conversation->titre.'</a></h2>';
                                            echo '<p>'.$conversation->texte.'</p>';
                                        echo '</div>

                                        <div class="likeblock pull-left">';
                                        $liked='0';
                                        $disliked='0';
                                        foreach($data['like'] as $like){ if($conversation->id == $like->id_conversation){$liked= $like->liked; $disliked= $like->disliked;}}
                                        if(isLoggedIn()){
                                            echo '<a href="'.WWW_ROOT.'conversations/liked/'.$conversation->id.'/'.$conversation->id_topic.'" class="up"><i class="fa fa-thumbs-up"></i>'.$liked.'</a>
                                            <a href="'.WWW_ROOT.'conversations/disliked/'.$conversation->id.'/'.$conversation->id_topic.'" class="down"><i class="fa fa-thumbs-down"></i>'.$disliked.'</a>';  
                                        }else{
                                            echo '<a href="#" class="up"><i class="fa fa-thumbs-up"></i>'.$liked.'</a>
                                            <a href="#" class="down"><i class="fa fa-thumbs-down"></i>'.$disliked.'</a>';
                                        }       
                                       
                                    echo'</div>
                                        <div class="clearfix"></div>
                                        
                                    </div>
                                    <div class="postinfo pull-left">
                                        <div class="comments">
                                            <div class="commentbg">';
                                            $compt="0";
                                            foreach($data['count'] as $count){ if($conversation->id == $count->id_conversation){$compt= $count->freq;}}
                                            echo $compt; 
                                            
                                                echo '<div class="mark"></div>
                                            </div>
                                        </div>';
                                                    
                                        
                                            if(isLoggedIn() && $_SESSION['role']!='membre'){
                                                    echo '<div class="views"><a href="'. WWW_ROOT.'conversations/modify/'.$conversation->id.'"> <i class="fa fa-eye"></i> modifier</a></div>';} 
                                                    
                                    
                                            echo'<div class="time"><i class="fa fa-clock-o"></i>';
                                             $timestamp = strtotime($conversation->publication);
                                            echo '<small>'.elapsed($timestamp, $precision=3).'</small>';  
                                            echo'</div>                                    
                                    </div>
                                    <div class="clearfix"></div>
                            
                                </div>';        
                             } 
                       
                             if(empty($data['conversations'])){
                                
                                
                                echo '<p class="h4 text-center p-3">Ce topic ne contient pas encore de conversations</p>';
                                echo '<img class="img-resp mx-auto d-block" src="'.WWW_ROOT.'public/images/conversation.png " alt="" />';
                                echo '<p class="h5 text-center p-3">Si vous êtes connecté, vous pouvez en ajouter une</p>';
                                                                        
                            }
                            ?> 
                                                 
                </div>   
                
                <div class="col-lg-4 col-md-4">
                        
                    <div class="sidebarblock">
                       
                        <div class="divline"></div>
                        <div class="blocktxt">
                            <?php if(!isLoggedIn()){ ?>
                            
                            <img class="img-resp" src="<?php echo WWW_ROOT; ?>public/images/cyberpunk.jpg" alt="cyber">
                            
                            <?php }else{ ?>
                            <form action="<?php echo WWW_ROOT; ?>conversations/create" class="form newtopic" method="post">
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
require ROOT . '/views/includes/footer.php';
?>