<?php

include("function.php");

$objstdApp = new stdApp();


 $data_show_information = $objstdApp->display_data();

if(isset($_GET['status'])){

    if($_GET['status'] = 'edit'){
       $id = $_GET['id'];
       $up_data_show = $objstdApp->display_data_by_id($id);
    }
}


if(isset($_POST['u_add_info'])){
 $data_info_update_message = $objstdApp-> display_data_update_id($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12 col-12 my-4 p-4 shadow">
     <div class="form-information">
         <h1><a href="index.php" style="text-decoration:none;">information Box Php</a></h1>


        <form method="post" enctype="multipart/form-data">

        <?php if(isset($data_info_update_message)){ echo $data_info_update_message;} ?>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Your full Name</label>
                <input type="text" name="u_std_name" value="<?php echo $up_data_show['student_name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Your Email</label>
                <input type="email" name="u_std_email" value="<?php echo $up_data_show['student_email']; ?>" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input type="file" name="u_std_img" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3 form-check form-check-inline">
                <input type="radio" name="u_std_identity" value="Mail" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Mail</label>
                </div>

                <div class="mb-3 form-check form-check-inline">
                <input type="radio" name="u_std_identity" value="Femail" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Femail</label>
                </div>

                <div class="mb-3 form-check form-check-inline">
                
                <input type="radio" name="u_std_identity" value="Other" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Other</label>
            </div>

            <div>
            <input type="hidden" value="<?php echo $up_data_show['id']; ?>" name="u_std_id" class="form-control" id="exampleInputPassword1">
             </div>

            <div>
            <button type="submite" name="u_add_info" class="btn btn-success">Update Information</button>
             </div>
            
        
        </form>

       </div>
       </div>



    </div>
    </div>
    






    <script src="js/bootstrap.min.js"></script>
</body>
</html>