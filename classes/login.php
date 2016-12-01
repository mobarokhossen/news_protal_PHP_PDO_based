<?php


class Login {
    
    
    private $db_connect;

    public function __construct() {
        $host_name = "localhost";
        $user = "root";
        $password = '';
        $db_name = "db_blog";

        $this->db_connect = mysqli_connect($host_name, $user, $password, $db_name);

        if (!$this->db_connect) {
            die("Connection failure: " . mysqli_error($db_connect));
        }
    }
    
    public function login_check($data)
    {
        $email = $data['email'];
        $password = md5($data['password']);
        
        $sql = "SELECT * FROM tbl_user where email ='$email' AND password = '$password'";
        if(mysqli_query($this->db_connect, $sql))
        {
            $query_result = mysqli_query($this->db_connect, $sql);
             $login_info = mysqli_fetch_assoc($query_result);
            if($login_info)
            {
                session_start();
                $_SESSION['user'] = $login_info['user_name'];
                  $_SESSION['email'] = $login_info['email'];
                 header("Location: ./add_blog.php");
            }
            else
            {
                session_start();
                $_SESSION['message'] = " Login Invalid";
                header("Location: ./index.php");
            }
                    
        }
        else
        {
            die("Login Query Problem: ".  mysqli_error($this->db_connect));
            
        }
    }
}
