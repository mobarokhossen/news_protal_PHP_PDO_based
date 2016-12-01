<?php 

require './classes/news.php';

$obj_news = new News();


if(isset($_GET['status'])&&isset($_GET['id'])){
    If($_GET['status']='delete')
    {
        $message = $obj_news->delete_news_data($_GET['id']);
    }
}

$result = $obj_news->select_news_info(); 
        
?>


<!DOCTYPE HTML>
<html>
         <head>
                  <title> View News</title>
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
                                    <div class="col-lg-12" >
                                             <div class="panel panel-default">
                                                      <div class="panel-body">
                                                               <div class="well well-sm">
                                                                        <div class="text-info  text-center">
                                                                                 <h4>View News item</h4>
                                                                        </div>
                                                               </div>
                                                                 <?php
                                                                                 if (isset($message)) {
                                                                                     ?>
                                                                                     <div class="well well-sm">
                                                                                              <div class="text-center">
                                                                                                       <div class="text-success  text-center">
                                                                                                                <h4><?php echo $message; ?></h4>
                                                                                                       </div>

                                                                                              </div>


                                                                                     </div>
                                                                                     <?php
                                                                                 }
                                                                                 ?>
                                                               <div class="well">

                                                                        <table class="table table-bordered table-responsive table-striped text-center">
                                                                                 <tr class=" text-primary text-center">
                                                                                          <th width="10px" >News Id</th>
                                                                                          <th>News Title</th>
                                                                                          <th>Author Name</th>
                                                                                          <th width="400px">News Description</th>
                                                                                          <th width="150px">Publication Status</th>
                                                                                          <th width="120px" >Action</th>

                                                                                 </tr>   
                                                                                 <?php
                                           while ($select_news_data = $result->fetch(PDO::FETCH_ASSOC))
                                           {
                                                                                 ?>
                                                                                 <tr>
                                                                                          <td><?= $select_news_data['news_id']; ?></td>
                                                                                          <td><?= $select_news_data['news_title']; ?></td>
                                                                                          <td><?= $select_news_data['author_name']; ?></td>
                                                                                          <td><?= $select_news_data['news_desc']; ?></td>
                                                                                          <td><?php
                                                                                          if($select_news_data['publication_status']==1)
                                                                                          {
                                                                                              echo "Published";
                                                                                          }else{
                                                                                               echo "Unpublished";
                                                                                          }
                                                                                          ?></td>
                                                                                          <td><a href="edit_news.php?id=<?php echo $select_news_data['news_id']; ?>" class="btn btn-primary" title="Edit">
                                                                                                            <span class="glyphicon glyphicon-edit"> </span>
                                                                                                   </a>
                                                                                                   <a href="?status=delete&id=<?php echo $select_news_data['news_id']; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status();">
                                                                                                            <span class="glyphicon glyphicon-trash"> </span>
                                                                                                   </a>
                                                                                          </td>
                                                                                 </tr>
                                           <?php
                                           } 
                                           ?>                                     
                                                                        </table>
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
          <script type="text/javascript"> 
              function check_delete_status()
              {
                  var result  = confirm('Are you Sure?');
                  if(result==true)
                  {
                      return true;
                  }
                  else 
                      {
                          return false;
                      }
              }
             </script>
             <script src="js/bootstrap.min.js"></script>
</html>


