<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">


            <?php
            $action = isset($_REQUEST['manage']) ? $_REQUEST['manage'] : "";
            switch ($action) {
                case "menu":
                    ?>
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Menu
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <a  href="dashboard.php?manage=insert_menu" class="btn btn-primary">Add New Menu</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Menu ID</th>
                                        <th>Menu Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($obj->getAll("menus", "*") != FALSE) {
                                        $all_menu = $obj->getAll("menus", "*");
                                        $sl = 1;
                                        foreach ($all_menu as $menus) {
                                            extract($menus);
                                            ?>
                                            <tr>
                                                <td><?php echo $sl++; ?></td>
                                                <td><?php echo $menu_id; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><button type="button" class="<?php echo ($status == 0) ? "btn btn-sm btn-danger" : "btn btn-sm btn-info"; ?>"> <?php echo ($status == 0) ? "unpublish" : "publish"; ?></button></td>
                                                <td>
                                                    <a href="dashboard.php?manage=edit_menu&edit_menu_id=<?php echo $menu_id; ?>"><button class="btn btn-sm btn-primary "><i class="fa fa-pencil"></i></button></a>
                                                    <a href="dashboard.php?manage=delete_menu&delete_menu_id=<?php echo $menu_id; ?>"><button class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></i></button></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <th colspan="4">Add new Menu</th>
                                        <th><a href="dashboard.php?manage=insert_menu" class="btn btn-primary">Add new Menu</a></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    break;
                    
                    
                    
                case "insert_menu":
                    ?>
                <div class="col-lg-12">
                    <h1 class="page-header">
                        add new menu
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=menu">manage all menu</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=insert_menu">Add new Menu</a>
                        </li>
                    </ol>

                    <?php echo @$msg; ?>
                    <form action="dashboard.php" method="post">
                        <div class="form-group">
                            <label for="name">menu name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea  name="content" class="form-control" id="content"  rows="3"></textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="0">unpublish</option>
                                <option value="1">publish</option>
                            </select>
                        </div>
                        <input type="submit" name="submit_menu" value="Save Menu" class="btn btn-primary">
                    </form>
                    
                </div>    
                    
                    <?php
                    break;
                
                
                case "edit_menu":
                    ?>
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        Edit Menu
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=menu">manage all menu</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=edit_menu&edit_menu_id">Add new Menu</a>
                        </li>
                    </ol>
            
                    <?php
                    if(isset($_REQUEST['edit_menu_id'])){
                        $edit_menu_id=$_REQUEST['edit_menu_id'];
                        extract($obj->getById("menus","*","menu_id='$edit_menu_id'"));
                    }
                    
                    ?>    
                    <?php echo @$msg; ?>
                    <form action="dashboard.php" method="post">
                        <div class="form-group">
                            <label for="name">menu name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $name;  ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea  name="content" class="form-control" id="content"  rows="3">
                                <?php echo $content;  ?>
                            </textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status" >
                                <option <?php echo ($status==0)?'selected="selected"':""; ?> value="0">unpublish</option>
                                <option <?php echo ($status==1)?'selected="selected"':""; ?> value="1">publish</option>
                            </select>
                        </div>
                        <input type="hidden" name="edit_menu_process" value="<?php echo $edit_menu_id;  ?>" >
                        <input type="submit" name="update_menu" value="Update Menu" class="btn btn-primary">
                    </form>
                    </div>
                    <?php
                    break;
                    
                
                case "delete_menu":
                    ?>
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        Delete Menu
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=menu">manage all menu</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=delete_menu&delete_menu_id">delete Menu</a>
                        </li>
                    </ol>
                    <?php
                    if(isset($_REQUEST['delete_menu_id'])){
                        $del_menu_id=$_REQUEST['delete_menu_id'];
                    ?>
                    <h4>Do you want to delete this menu? 
                        <a href="dashboard.php?manage=delete_menu&cdel_menu_id=<?php echo $del_menu_id; ?>"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button></a>
                        <a href="dashboard.php?manage=menu"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a>
                    </h4>
                    <?php } ?>    
                    </div>    
                    <?php
                     break;    
                    
                    

                case "article":
                    ?>
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Menu
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <a  href="dashboard.php?manage=insert_menu" class="btn btn-primary">Add New Menu</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($obj->getAll("articles","*")!=false){
                                        $all_article=$obj->getAll("articles","*");
                                        $sl=1;
                                        foreach ($all_article as $article) {
                                            extract($article);
                                            ?>
                                    <tr>
                                        <td><?php echo $sl++; ?></td>
                                        <td><?php echo $art_id; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php
                                            $category=$obj->getById("categories","*","cat_id='$cat_id'");
                                            echo $category['name'];
                                        
                                        ?></td>
                                        <td><?php echo ($status==0)?"unpublish":"publish";  ; ?></td>
                                        <td>
                                            <a href="dashboard.php?manage=edit_article&edit_article_id=<?php echo $art_id; ?>">edit</a>
                                            <a href="dashboard.php?manage=delete_article&delete_article_id=<?php echo $art_id; ?>">delete</a>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                            
                                        }
                                        
                                    }
                                    
                                    ?>
                                     <tr>
                                        <td colspan="4">add new article</td>
                                        <td colspan="2"><a href="dashboard.php?manage=insert_article">add new article</td>
                                    </tr>
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>     
                    <?php
                    break;
                
                
                case "insert_article":
                    ?>
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        add new menu
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=menu">manage all menu</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=insert_menu">Add new Menu</a>
                        </li>
                    </ol>

                    <?php echo @$msg; ?>
                    <form action="dashboard.php" method="post">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea  name="content" class="form-control" id="content"  rows="3"></textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="category">category</label>
                            <select class="form-control" name="cate_id" id="status">
                                <option value="0">select category</option>
                                <?php
                                if($obj->getAll("categories","*")!=FALSE){
                                    $all_category=$obj->getAll("categories","*");
                                    foreach ($all_category as $category) {
                                        extract($category);
                                        ?>
                                <option value="<?php echo $cat_id; ?>"><?php echo $name; ?></option>
                                <?php
                                        
                                    }
                                }
                                ?>
                                
                            </select>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="0">unpublish</option>
                                <option value="1">publish</option>
                            </select>
                        </div>
                        <input type="submit" name="submit_article" value="Save article" class="btn btn-primary">
                    </form>
                    
                </div> 
                    <?php
                    break;
                
                case "edit_article":
                    ?>
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        add new menu
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=menu">manage all menu</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=insert_menu">Add new Menu</a>
                        </li>
                    </ol>
                    <?php
                    if(isset($_REQUEST['edit_article_id'])){
                        $edit_article_id=$_REQUEST['edit_article_id'];
                        $update=$obj->getById("articles","*","art_id='$edit_article_id'");
                        extract($update);
                    }
                    ?>
                    <?php echo @$msg; ?>
                    <form action="dashboard.php" method="post">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name" value="<?php echo $title; ?>" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea  name="content" class="form-control" id="content"  rows="3">
                                <?php echo $content; ?>
                            </textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="category">category</label>
                            <select class="form-control" name="cate_id" id="status">
                                <option <?php echo ($update['cat_id']==0)?"selected='selected'":"";  ?> value="0">select category</option>
                                <?php
                                if($obj->getAll("categories","*")!=FALSE){
                                    $all_category=$obj->getAll("categories","*");
                                    foreach ($all_category as $category) {
                                        //extract($category);
                                        ?>
                                <option <?php echo ($cat_id==$category['cat_id'])?"selected='selected'":"";  ?> value="<?php echo $category['cat_id']; ?>"><?php echo $category['name']; ?></option>
                                <?php
                                        
                                    }
                                }
                                ?>
                                
                            </select>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status">
                                <option <?php echo ($status==0)?"selected='selected'":"";  ?> value="0">unpublish</option>
                                <option <?php echo ($status==1)?"selected='selected'":"";  ?> value="1">publish</option>
                            </select>
                        </div>
                        <input type="hidden" name="edit_article_process" value="<?php echo $edit_article_id; ?>" class="btn btn-primary">
                        <input type="submit" name="update_article" value="update article" class="btn btn-primary">
                    </form>
                    
                </div> 
                    <?php
                    break;
                
                case "delete_article":
                    ?>
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        Delete Menu
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=menu">manage all menu</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=delete_menu&delete_menu_id">delete Menu</a>
                        </li>
                    </ol>
                        <?php
                        if(isset($_REQUEST['delete_article_id'])){
                            $del_article_id=$_REQUEST['delete_article_id'];
                            ?>
                        do you want to delete? 
                        <a href="dashboard.php?manage=$delete_article&cdel_article_id=<?php echo $del_article_id; ?>">yes</a>
                        <a href="dashboard.php?manage=article">no</a>
                        <?php
                        }
                        
                        ?>
                        </div>
                    <?php
                    break;
                
                

                case "category":
                    ?>
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage category
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <a  href="dashboard.php?manage=insert_category" class="btn btn-primary">Add New category</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>category ID</th>
                                        <th>category Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($obj->getAll("categories", "*") != FALSE) {
                                        $all_category = $obj->getAll("categories", "*");
                                        $sl = 1;
                                        foreach ($all_category as $categories) {
                                            extract($categories);
                                            ?>
                                            <tr>
                                                <td><?php echo $sl++; ?></td>
                                                <td><?php echo $cat_id; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><button type="button" class="<?php echo ($status == 0) ? "btn btn-sm btn-danger" : "btn btn-sm btn-info"; ?>"> <?php echo ($status == 0) ? "unpublish" : "publish"; ?></button></td>
                                                <td>
                                                    <a href="dashboard.php?manage=edit_category&edit_category_id=<?php echo $cat_id; ?>"><button class="btn btn-sm btn-primary "><i class="fa fa-pencil"></i></button></a>
                                                    <a href="dashboard.php?manage=delete_category&delete_category_id=<?php echo $cat_id; ?>"><button class="btn btn-sm btn-danger "><i class="fa fa-trash-o"></i></i></button></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <th colspan="4">Add new Category</th>
                                        <th><a href="dashboard.php?manage=insert_category" class="btn btn-primary">Add new category</a></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    break;
                
                case "insert_category":
                    ?>
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        add new category
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=category">manage all category</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=insert_category">Add new category</a>
                        </li>
                    </ol>

                    <?php echo @$msg; ?>
                    <form action="dashboard.php" method="post">
                        <div class="form-group">
                            <label for="name">category name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="0">unpublish</option>
                                <option value="1">publish</option>
                            </select>
                        </div>
                        <input type="submit" name="submit_category" value="Save category" class="btn btn-primary">
                    </form>
                    
                </div>
                    <?php
                    break;
                
                case "edit_category":
                    ?>
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        add new category
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=category">manage all category</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=edit_category">edit category</a>
                        </li>
                    </ol>
                    <?php
                    if(isset($_REQUEST['edit_category_id'])){
                        $edit_category_id=$_REQUEST['edit_category_id'];
                        extract($obj->getById("categories","*","cat_id='$edit_category_id'"));
                    }
                    
                    ?>

                    <?php echo @$msg; ?>
                    <form action="dashboard.php" method="post">
                        <div class="form-group">
                            <label for="name">category name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="status">status</label>
                            <select class="form-control" name="status" id="status" >
                                <option <?php echo ($status == 0) ? "selected='selected'" : ""; ?> value="0">unpublish</option>
                                <option <?php echo ($status == 1) ? "selected='selected'" : ""; ?> value="1">publish</option>
                            </select>
                        </div>
                        <input type="hidden" name="edit_category_process" value="<?php echo $edit_category_id; ?>" >
                        <input type="submit" name="update_category" value="Update category" class="btn btn-primary">
                    </form>
                    
                </div>
                    <?php
                    break;
                
                case "delete_category":
                    ?>
                    <div class="col-lg-12">
                    <h1 class="page-header">
                        Delete category
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-bars"></i>  <a href="dashboard.php?manage=category">manage all category</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i>  <a href="dashboard.php?manage=delete_category&category_menu_id">delete category</a>
                        </li>
                    </ol>
                    <?php
                    if(isset($_REQUEST['delete_category_id'])){
                        $del_category_id=$_REQUEST['delete_category_id'];
                    ?>
                    <h4>Do you want to delete this category? 
                        <a href="dashboard.php?manage=delete_category&cdel_category_id=<?php echo $del_category_id; ?>"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button></a>
                        <a href="dashboard.php?manage=category"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a>
                    </h4>
                    <?php }?>   
                        
                    </div>
                    <?php
                    
                    break;
                case "user":
                    ?>
                    <h3>manage User</h3>
                    <?php
                    break;
                
                

                default:
                    echo "<h2>dashboard</h2>";
                    break;
            }
            ?>  

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

