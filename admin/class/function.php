<?php
    ob_start();
    class AdminBlog
    {
        private $conn;
        public function __construct()
        {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'blogproject';
            
            $this->conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            if(!$this->conn){
                die("database connection error");
            }
        }

        public function admin_login($data)
        {
            $admin_email = $data['admin_email'];
            $admin_pass = md5($data['admin_pass']);

            $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";
            $admin_info = mysqli_query($this->conn, $query);

            if($admin_info)
            {
                $adminData = mysqli_fetch_assoc($admin_info);
                    
                if($adminData['admin_email']==$admin_email && $adminData['admin_pass']==$admin_pass)
                {
                    session_start();
                    $_SESSION['adminID']=$adminData['id'];
                    $_SESSION['adminName']=$adminData['admin_name'];

                }else{
                        return "wrong email or PassWord ! Please Enter a Valid Login Information !!";
                    }

            }
            
        }

        public function adminLogout()
        {
            unset($_SESSION['adminID']);
            unset($_SESSION['adminName']);
            header("location:index.php");
            
        }

        public function addCategory($data)
        {
            $cat_name = $data['cat_name'];
            $cat_des = $data['cat_des'];

            $query = ("INSERT INTO category(cat_name, cat_des) VALUE('$cat_name', '$cat_des') ");

            if(mysqli_query($this->conn, $query)){
                return "Category Added Successfully";
            }else{
                return "couldn't Add Category !";
                }
                
        }

        public function displayCat()
        {
            $query = ("SELECT * FROM category");
            if(mysqli_query($this->conn, $query)){
                $category = mysqli_query($this->conn, $query);
                return $category;
            }

        }

        public function deleteCat($id)
        {
            $query = "DELETE FROM category WHERE id=$id";
            
            if(mysqli_query($this->conn, $query))
            {
                header("location:manage_cat.php?output=delete");
            }else
            {
                return "Couldn't Delete Category";
            }

        }

        public function display_cat_by_id($id)
        {
            $query = "SELECT * FROM category WHERE id=$id";
            if(mysqli_query($this->conn, $query))
            {
                $returnData = mysqli_query($this->conn, $query);
                $returndata = mysqli_fetch_assoc($returnData);
                return $returndata;
            }
        }

        public function update_cat($data)
        {
            $cat_name = $data['e_cat_name'];
            $cat_des = $data['e_cat_des'];
            $cat_id = $data['cat_id'];
            $query = "UPDATE category SET cat_name='$cat_name', cat_des='$cat_des' WHERE id='$cat_id'";

            if(mysqli_query($this->conn, $query))
            {
                header("location:manage_cat.php?output=update");
            }else{
                return "Couldnt Update Category !!";
            }
        }


                
            
        



    }

?>