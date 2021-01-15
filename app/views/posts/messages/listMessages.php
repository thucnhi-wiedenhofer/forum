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
                                   
                                    ?>
                                    <div class="post">
                                        <div class="wrap-ut pull-left">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <a href="<?php echo URLROOT.'/users/vueProfil/'.$message->id_utilisateur.'"><img src="'.URLROOT.'/public/images/avatars/'.$message->avatar.'.png " alt="" /></a>'; ?>
                                                    <div class="status green">&nbsp;</div>
                                                </div>

                                            </div>
                                            <div class="posttext pull-left">
                                               
                                                <p><?= $message->texte ?></p>
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
                                if((isLoggedIn() && $message->id_utilisateur==$_SESSION['id']) || (isLoggedIn() && $_SESSION['role']== 'moderateur')){
                                        echo '<div class="views"><a href="'. URLROOT.'/messages/modify/'.$message->id.'"> <i class="fa fa-eye"></i> modifier</a></div>';} 
                                ?>
                               
                                        <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>                                    
                                    </div>
                                    <div class="clearfix"></div>                    
                                </div>
                                <?php  
                                }
                              ?>
                              
                              <?php if(empty($data['messages'])){
                                  
                                    
                                  echo '<p class="h4 text-center p-3">Ce topic ne contient pas encore de conversations</p>';
                                  echo '<img class="img-resp mx-auto d-block" src="'.URLROOT.'/public/images/conversation.png " alt="" />';
                                  echo '<p class="h5 text-center p-3">Si vous êtes connecté, vous pouvez en ajouter une</p>';
                                  
                                 
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