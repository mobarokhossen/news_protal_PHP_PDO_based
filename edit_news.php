<?php
    require './classes/news.php';
    
    $obj_news = new News();

    
    if(isset($_GET['id']))
    {
        $news_id = $_GET['id'];
        $result= $obj_news->edit_news_data($news_id);
         $query_result = $result->fetch(PDO::FETCH_ASSOC);
         extract($query_result);
        
    }
    
    if($_POST)
    {
        $add_news = $obj_news->update_edit_news_data($_POST); 
    }

?>


<!DOCTYPE HTML>

<html>
    <head>
        <title> Edit News</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
<!--        <style>
            [class*='col-']{
                border: 1px solid #000000;
            }
        </style>-->


    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="height: 100px;"></div>
            </div>
            <div class="row">
                <div class="col-lg-6" style="height: 35px; padding: 0px;">
                         <a href="add_news.php" class="btn btn-info btn-block">Add News</a>
                </div>
                <div class="col-lg-6" style="height: 35px;padding: 0px;">
                         <a href="view_news.php" class="btn btn-info btn-block">View News</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="height: 450px;">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                          <div class="well well-sm">
                                                      <div class="text-info  text-center">
                                                               <h4>Edit News item</h4>
                                                      </div>
                                         
                                             
                                           
                                        
                                             </div>
                                    <div class="well">
                                            
                                             <form class="form-horizontal" role='form' action="" method="post" name="edit_news_form">
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">News Title</label>
                                                <div class="col-lg-9">
                                                         <input type="text" name="news_title" class="form-control" value="<?php echo $news_title;?>">
                                                         <input type="text" name="news_id" class="form-control hidden" value="<?php echo $news_id;?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Author Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="author_name" class="form-control"  value="<?php echo $author_name;?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">News Description</label>
                                                <div class="col-lg-9">
                                                         <textarea name= "news_desc" class="form-control" style="resize: vertical;" rows="7"> <?php echo $news_desc;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Publication Status</label>
                                                <div class="col-lg-9">
                                                    <select name="publication_status" class="form-control">
                                                        <option >--- Select Publication Status---</option>
                                                        <option value="1">Published</option>
                                                        <option value="0">Unpublished</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3"></label>
                                                <div class="col-lg-offset-3 col-lg-9">
                                                    <input type="submit" name="btn" value="Submit News" class="btn btn-success btn-block">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                     <div class="col-lg-12" style="height: 30px;"></div>
            </div>

        </div>
             <<script type="text/javascript"> 
             document.forms['edit_news_form'].elements['publication_status'].value='<?php echo $publication_status;?>';
             </script>
             <script src="js/bootstrap.min.js"></script>
    </body>
</html>


