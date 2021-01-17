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
                    <?php echo '<a href="'.URLROOT.'/posts/home">HOME ></a>'; 
                     echo '<a href="'.URLROOT.'/posts/home">TOPIC: '.$data["topic"]->titre.'</a>'; 
                     echo  '<a href="'.URLROOT.'/conversations/listConversations/'.$data["topic"]->id.'"> > CONVERSATION: '.$data['conversation']->titre.'</a>';
                    ?>
                     </div>
                </div>
            </div>                
            <div class="container">
           
                <div class="row">
                
                    <div class="col-lg-8 col-md-8">
                        <!-- POST -->
                            <br />                   
                            <?php foreach($data['messages'] as $message){                                                                          
                                   
                                   echo '<div class="post">
                                   <div class="wrap-ut pull-left">
                                       <div class="userinfo pull-left">
                                           <div class="avatar">';
                                               echo '<a href="'.URLROOT.'/users/vueProfil/'.$message->id_utilisateur.'"><img src="'.URLROOT.'/public/images/avatars/'.$message->avatar.'.png " alt="" /></a>';
                                               foreach($data['connected'] as $connected){
                                                if(isLoggedIn() && $connected->id_utilisateur == $message->id_utilisateur){echo '<div class="status green">&nbsp;</div>';} 
                                               } 
                                               echo '<p><small>'.$message->login.'<br />';
                                               echo $message->role.'</small></p>';   
                                            echo'</div>';
                                        echo'</div>

                                        <div class="posttext pull-left">';
                                        
                                        echo '<p>'.$message->texte.'</p>';
                                        echo '</div>
                                        <div class="likeblock pull-left">';
                                        $liked='0';
                                        $disliked='0';
                                        foreach($data['like'] as $like){ if($message->id == $like->id_message){$liked= $like->liked; $disliked= $like->disliked;}}
                                        if(isLoggedIn()){
                                            echo '<a href="'.URLROOT.'/messages/liked/'.$message->id.'/'.$message->id_conversation.'" class="up"><i class="fa fa-thumbs-up"></i>'.$liked.'</a>
                                            <a href="'.URLROOT.'/messages/disliked/'.$message->id.'/'.$message->id_conversation.'" class="down"><i class="fa fa-thumbs-down"></i>'.$disliked.'</a>';
                                        }else{
                                            echo '<a href="#" class="up"><i class="fa fa-thumbs-up"></i>'.$liked.'</a>
                                            <a href="#" class="down"><i class="fa fa-thumbs-down"></i>'.$disliked.'</a>';
                                        }  
                                        echo '</div>
                                        <div class="clearfix"></div>
                                        
                                    </div>
                                <div class="postinfo pull-left">
                                    <div class="comments">
                                        <div class="commentbg">';
                                        $compt="0";
                                            foreach($data['count'] as $count){ if($message->id_conversation == $count->id_conversation){$compt= $count->freq;}}
                                            echo $compt; 
                                           echo '<div class="mark"></div>
                                        </div>
                                    </div>';
                                            
                                    if(isLoggedIn() && $_SESSION['role']!='membre'){
                                        echo '<div class="views"><a href="'. URLROOT.'/messages/modify/'.$message->id.'"> <i class="fa fa-eye"></i> modifier</a></div>';} 
                                
                        
                                echo'<div class="time"><i class="fa fa-clock-o"></i>';
                                 $timestamp = strtotime($message->publication);
                                echo '<small>'.elapsed($timestamp, $precision=3).'</small>';  
                                echo'</div>                                    
                        </div>
                        <div class="clearfix"></div>
                
                    </div>';        
                 } 
                              ?>
                              
                              <?php if(empty($data['messages'])){
                                  
                                    
                                  echo '<p class="h4 text-center p-3">Cette conversation ne contient pas encore de messages</p>';
                                  echo '<img class="img-resp mx-auto d-block" src="'.URLROOT.'/public/images/conversation.png " alt="" />';
                                  echo '<p class="h5 text-center p-3">Si vous êtes connecté, vous pouvez en ajouter un.</p>';
                                  
                                 
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
                                <form action="<?php echo URLROOT; ?>/messages/createMessage" class="form newtopic" method="post">
                                        <div class="postinfotop">
                                            <h5>Ajouter message </h5>
                                        </div>

                                        <!-- acc section -->
                                        <div class="accsection">
                                            
                                            <div class="topwrap">
                                                <div class="userinfo pull-left">&nbsp;</div>
                                                    <div class="posttext pull-left">
                                                        
                                                        <label for="texte">Texte:</label>
                                                        <textarea id="texte" name="texte" rows="3" cols="33"></textarea>                                                 
                                                        
                                                        <input type="hidden"  name="id_utilisateur" value="<?php echo $_SESSION['id']; ?>" />
                                                        <input type="hidden" name="id_conversation" value="<?php echo $data['id_conversation']; ?>" />
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