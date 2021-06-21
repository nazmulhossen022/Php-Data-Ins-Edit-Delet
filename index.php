<?php

include("function.php");

$objstdApp = new stdApp();

if(isset($_POST['add_info'])){

    $return_msg = $objstdApp -> add_data($_POST);
    
}

 $data_show_information = $objstdApp->display_data();


 if(isset($_GET['ststus'])){
     if($_GET['ststus'] = 'delete'){

        $delete_id = $_GET['id'];
        $delet_message = $objstdApp -> delete_information($delete_id);
     }
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

         <?php if(isset($delet_message)) { echo $delet_message;} ?>


        <form method="post" enctype="multipart/form-data">

        <?php if(isset($return_msg)){ echo $return_msg;} ?>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Your full Name</label>
                <input type="text" name="std_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Your Email</label>
                <input type="email" name="std_email" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input type="file" name="std_img" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3 form-check form-check-inline">
                <input type="radio" name="std_identity" value="Mail" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Mail</label>
                </div>

                <div class="mb-3 form-check form-check-inline">
                <input type="radio" name="std_identity" value="Femail" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Femail</label>
                </div>

                <div class="mb-3 form-check form-check-inline">
                
                <input type="radio" name="std_identity" value="Other" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Other</label>
            </div>

            <div>
            <button type="submite" name="add_info" class="btn btn-success">Add Information</button>
             </div>
            
        
        </form>

       </div>
       </div>


       <div class="col-md-12 col-sm-12 col-lg-12 col-12 shadow my-4 p-4">

            <div class="data-show-table">

                    <table class="table table-striped">
                            <thead>

                                <tr>
                                    <th scope="col">Count</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Identity</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Acyion</th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php while($show_data = mysqli_fetch_assoc($data_show_information)){  ?>
                                <tr>
                                    <th scope="row"><?php echo $show_data['id']; ?></th>
                                    <td><?php echo $show_data['student_name']; ?></td>
                                    <td><?php echo $show_data['student_email']; ?></td>
                                    <td><?php echo $show_data['student_identity']; ?></td>
                                    <td><img style="width:120px;height:100px;" src="img/<?php echo $show_data['student_image']; ?>" alt=""></td>
                                    <td>
                                        <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $show_data['id']; ?>">Edit</a>
                                        <a class="btn btn-warning" href="?ststus=delete&&id=<?php echo $show_data['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php }  ?>
                          
                            </tbody>
                    </table>

            </div>

          </div>   

  


    </div>
    </div>
    






    <script src="js/bootstrap.min.js"></script>
</body>
</html>