<div class="sidebar">
        <div class="sBlock">
        	<h2>Sidebar</h2>
            <ul>
                <?php
                if($obj->getAll("categories","*")!=false){
                    $all_category=$obj->getAll("categories","*");
                    foreach ($all_category as $category) {
                      ?>
                <li><a href="index.php?cat_id=<?php echo $category['cat_id']; ?>"><?php echo $category['name']; ?></a></li>
                <?php
                    }
                }
                
                ?>
                
            	
                
            </ul>
        </div>
        <div class="sBlock">
        	<h2>Partners</h2>
            <ul>
            	<li><a href="">Lorem Ipsum is</a></li>
                <li><a href="">Simply dummy</a></li>
                <li><a href="">Text of the printing</a></li>
                <li><a href="">And typesetting</a></li>
                <li><a href="">Industry lorem</a></li>
                <li><a href="">Ipsum has been</a></li>
                <li><a href="">The industry's</a></li>
            </ul>
        </div>
    </div> 
