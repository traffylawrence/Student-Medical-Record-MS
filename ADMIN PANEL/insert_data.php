<?php
    include_once 'db_conn.php';
    $success  = "";
    if(isset($_POST['add']))
    {	 
        $prod_id  = $_POST['prod_id'];
        $box_id  = $_POST['box_id'];
        $name = $_POST['name'];
        $brand   = $_POST['brand'];
        $genericName  = $_POST['genericName'];
        $image  = $_POST['image'];
        $num_stocks  = $_POST['num_stocks'];
        $date_manufactured  = $_POST['date_manufactured'];
        $expirationDate  = $_POST['expirationDate'];
        $prodCondition  = $_POST['prodCondition'];
        $manufacturerName  = $_POST['manufacturerName'];
        $storage  = $_POST['storage'];
        $contact_info  = $_POST['contact_info'];
        $description  = $_POST['description'];
        
        $sql = "INSERT INTO medicine (prod_id,box_id,name,brand,genericName,image,num_stocks,date_manufactured,expirationDate,prodCondition,manufacturerName,storage,contact_info,description)
        VALUES ('$prod_id','$box_id','$name','$brand','$genericName','$image','$num_stocks','$date_manufactured','$expirationDate','$prodCondition','$manufacturerName','$storage','$contact_info','$description')";
        if (mysqli_query($conn, $sql))
        {
            $success    =   "New record created successfully !";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>