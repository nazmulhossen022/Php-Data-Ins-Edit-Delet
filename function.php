<?php

class stdApp{

    private $conn;

    public function __construct()
    {
        #database host, database user, database pass, database name

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'identity_information';

        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if(!$this->conn){
            die("Database connection error");
        }
    }

    public function add_data($data){
        $std_name = $data['std_name'];
        $std_email = $data['std_email'];
        $std_identity = $data['std_identity'];

        $std_img=$_FILES['std_img']['name'];
       $tmp_mane=$_FILES['std_img']['tmp_name'];
        
         $query = "INSERT INTO `stydent`(`student_name`, `student_email`, `student_identity`, `student_image`) VALUES ('$std_name','$std_email','$std_identity','$std_img')";
        if(mysqli_query($this->conn,$query)){
            move_uploaded_file($tmp_mane,"img/".$std_img);
            header("location:index.php");
            return "Information Add Successfully";
        }
    }

    public function display_data(){
        $query = "SELECT * FROM `stydent`";
        if(mysqli_query($this->conn,$query)){
            $return_data = mysqli_query($this->conn,$query);
            return $return_data;
        }
    }

    public function display_data_by_id($id){
        $query = "SELECT * FROM `stydent` WHERE id=$id";
        if(mysqli_query($this->conn,$query)){
            $return_data = mysqli_query($this->conn,$query);
            $up_data_info = mysqli_fetch_assoc($return_data);
            return $up_data_info;
        }
    }

    public function display_data_update_id($data){
        $std_name = $data['u_std_name'];
        $std_email = $data['u_std_email'];
        $std_identity = $data['u_std_identity'];
        $std_id = $data['u_std_id'];

        $std_img=$_FILES['u_std_img']['name'];
       $tmp_mane=$_FILES['u_std_img']['tmp_name'];
        
         $query = "UPDATE `stydent` SET `student_name`='$std_name',`student_email`='$std_email',`student_identity`='$std_identity',`student_image`='$std_img' WHERE `id`='$std_id'";


        if(mysqli_query($this->conn,$query)){
            move_uploaded_file($tmp_mane,"img/".$std_img);
            return "Information Update Successfully";
            header("location:index.php");
        }


    }


    public function delete_information($id){

        $catch_img = "SELECT * FROM stydent WHERE id=$id";
        $delete_std_info = mysqli_query($this->conn, $catch_img);
        $std_infoDle = mysqli_fetch_assoc($delete_std_info);
        $deleteImg_data = $std_infoDle['stg_img'];
        $query = "DELETE FROM stydent WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
            unlink('img/'.$deleteImg_data);
            header("location:index.php");
            return "Deleted Successfully";
        }

    }




  


}


?>