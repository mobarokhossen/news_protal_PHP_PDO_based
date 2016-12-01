<?php
//
require './classes/news.php';

$obj_news = new News();


if ($_POST) {
    $add_news = $obj_news->add_news_data($_POST);
}
?>


<!DOCTYPE HTML>

<html>
         <head>
                  <title> Add News</title>
                  <link rel="stylesheet" href="css/bootstrap.min.css">
     


         </head>
         <body>
                  <div class="container">
                           <div class="row">
                                    <div class="col-lg-12" style="height: 100px;"></div>
                           </div>
                           <div class="row">
                                    <div class="col-lg-4" style="height: 35px; padding: 0px;">
                                             <a href="add_news.php" class="btn btn-info btn-block">Add News</a>
                                    </div>
                                    <div class="col-lg-4" style="height: 35px;padding: 0px;">
                                             <a href="view_news.php" class="btn btn-info btn-block">View News</a>
                                    </div>
                                    <div class="col-lg-4" style="height: 35px;padding: 0px;">
                                             <a href="logout.php" class="btn btn-warning btn-block">logout</a>
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
                                                                                                   <h4>Add News item</h4>
                                                                                          </div>


                                                                                 </div>


                                                                                 <?php
                                                                                 if (isset($add_news)) {
                                                                                     ?>
                                                                                     <div class="well well-sm">
                                                                                              <div class="text-center">
                                                                                                       <div class="text-success  text-center">
                                                                                                                <h4><?php echo $add_news; ?></h4>
                                                                                                       </div>

                                                                                              </div>


                                                                                     </div>
                                                                                     <?php
                                                                                 }
                                                                                 ?>

                                                                                 <div class="well">

                                                                                          <form class="form-horizontal" role='form' action="" method="post">
                                                                                                   <div class="form-group">
                                                                                                            <label class="control-label col-lg-3">News Title</label>
                                                                                                            <div class="col-lg-9">
                                                                                                                     <input type="text" name="news_title" class="form-control">
                                                                                                            </div>
                                                                                                   </div>
                                                                                                   <div class="form-group">
                                                                                                            <label class="control-label col-lg-3">Author Name</label>
                                                                                                            <div class="col-lg-9">
                                                                                                                     <input type="text" name="author_name" class="form-control">
                                                                                                            </div>
                                                                                                   </div>
                                                                                                   <div class="form-group">
                                                                                                            <label class="control-label col-lg-3">News Description</label>
                                                                                                            <div class="col-lg-9">
                                                                                                                     <textarea name= "news_desc" class="form-control" style="resize: vertical;" rows="7"></textarea>
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
                                                                                                            <label class="control-label col-lg-3" ></label>
                                                                                                            <div class="col-lg-9">
                                                                                                                     <input type="submit" name="btn" value="Submit News" class="btn btn-success btn-block" >
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
         </body>
</html>


