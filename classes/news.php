<?php

class News {

    private $db_connect;

    public function __construct() {
        $host_name = "localhost";
        $user = "root";
        $password = '';
        $db_name = "db_news";

        try {
            $this->db_connect = new PDO("mysql:host={$host_name};dbname={$db_name}", $user, $password);
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function add_news_data($data) {
        $news_title = $data['news_title'];
        $author_name = $data['author_name'];
        $news_desc = $data['news_desc'];
        $publication_status = $data['publication_status'];


        try {
             $new_info = $this->db_connect->prepare("INSERT INTO tbl_news (news_title, author_name, news_desc, publication_status) VALUES( :news_title, :author_name, :news_desc, :publication_status )");

            $new_info->bindParam(':news_title', $news_title);
            $new_info->bindParam(':author_name', $author_name);
            $new_info->bindParam(':news_desc', $news_desc);
            $new_info->bindParam(':publication_status', $publication_status);

            $new_info->execute();
             $message = "Insert News Data Successfully";
            return $message;
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function select_news_info() {
        
        try {
             $new_info = $this->db_connect->prepare("SELECT * FROM tbl_news");
             $new_info->execute();
             return $new_info;
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

   
    }
    
      public function edit_news_data($data) {
       
        
        try {
             $new_info = $this->db_connect->prepare("SELECT * FROM tbl_news WHERE news_id='$data' ");
             $new_info->execute();
             return $new_info;
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function update_edit_news_data($data) {
        $news_id = $data['news_id'];
        $news_title = $data['news_title'];
        $author_name = $data['author_name'];
        $news_desc = $data['news_desc'];
        $publication_status = $data['publication_status'];
        
         try {
             $new_info = $this->db_connect->prepare("UPDATE tbl_news SET news_title=:news_title, author_name= :author_name, news_desc=:news_desc, publication_status=:publication_status WHERE news_id='$news_id' ");

            $new_info->bindParam(':news_title', $news_title);
            $new_info->bindParam(':author_name', $author_name);
            $new_info->bindParam(':news_desc', $news_desc);
            $new_info->bindParam(':publication_status', $publication_status);

            $new_info->execute();
             header("Location: view_news.php");
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
        
    }
    
    public function delete_news_data($data)
    {
        
          try {
             $new_info = $this->db_connect->prepare("DELETE FROM tbl_news where news_id = '$data' ");
             $new_info->execute();
             $message = "News Data Delete Successfully";
            return $message;
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

       
    }

}
