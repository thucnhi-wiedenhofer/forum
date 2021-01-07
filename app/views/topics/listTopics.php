
    <div class="sidebarblock">
        <h3>Topics</h3>
        <div class="divline"></div>
            <div class="blocktxt">
                <ul class="cats">
                    <?php foreach($data['topics'] as $topics){
                        echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';
                    } ?>
                                                              
                </ul>
            </div>
    </div>
            