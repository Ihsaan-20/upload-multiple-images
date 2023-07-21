<?php 
require_once ('config.php');
if(isset($_POST)){
    // echo "working";
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    $count = 0;
    $folder = 'uploads/';

    // foreach loop to upload files quickly;

    foreach ($_FILES['image']['name'] as $key => $value) {
        $img_original_name = $_FILES['image']['name'][$key]; 
        $img =time()."-".$_FILES['image']['name'][$key]; 
        $tmp_name = $_FILES['image']['tmp_name'][$key]; 
        
        $file_path = $folder.$img;

        if(move_uploaded_file($tmp_name, $file_path)){
            // Insert query;
            $sql = "INSERT INTO `users` (`image`, `file_path`) VALUES ('$img', '$file_path') ";
            if(mysqli_query($conn, $sql)){
                $count++;
            }else{
                echo "Oops! error, something went wrong...";
            }

        }

    }

    if($count > 0){
        echo "$count files uploaded!";
        header('location: index.php');

    }else{
        echo "Error!";

    }


}

?>