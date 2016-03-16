<div class="wrapper">
	<h1><a href="">Village Hall</a></h1>
    <div class="contentBody">
    	<div class="post">
            
            <?php
            if(isset($_REQUEST['cat_id'])){
                $category=$_REQUEST['cat_id'];
                if($obj->getByCatId("articles","*","cat_id='$category'")!=FALSE){
                    $getByCatId=$obj->getByCatId("articles","*","cat_id='$category'");
        //================query by latest 3 post=========
                    //$lastArticle=array_slice($getByCatId, -3, 3, true);
                    //var_dump($latest_article);
                    //$latestArticle=  array_reverse($lastArticle);
                    //foreach ($latestArticle as $all_article) {
        //================query by latest 3 post end=========            
                    foreach ($getByCatId as $all_article) {
                        extract($all_article);
                         
                        ?>
            
            <h2><?php echo $title; ?></h2>
            <span>September 17, 2012</span>
            <p><?php 
            $to_convert_array=  explode(" ", $content);
            if(count($to_convert_array)>50){
                $to_slice_array=  array_slice($to_convert_array, 0, 49);
                echo implode(" ",$to_slice_array);
                ?>
                <a href="index.php?art_id=<?php echo $art_id; ?>">read more</a>
                <?php
            }else{
                echo $content;
            }
            
            ?></p>
            <?php
                    }
                }else{
                    echo "<h2>no article</h2>";
                }
                
            }
            
            
            
            ?>
            
            
            
            <img src="images/pic1.jpg" alt="pic1">
        </div>
        <div class="post">
            <h2>Lorem Ipsum is simply</h2>
            <span>September 16, 2012</span>
            <p>
                Lorem Ipsum is simply dummy text of the <a href="#">printing and typesetting</a> industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of <strong>type and scrambled it</strong> to make a type specimen book.  It has survived not only five centuries, b<a href="#">ut also the leap into elect</a>ronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop 
            </p>
            <img src="images/pic2.jpg" alt="pic2">
            <?php 
//            $query= mysql_query("select username from users where user_id=1");
//            var_dump($obj->$query);
            
            ?>
            
            
            
        </div>
    </div>
