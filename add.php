<?php

$errors = array('title' =>'', 'date'=>'', 'ingredients' => '');

    if(isset($_POST['submit'])){
    
//check title
if(empty($_POST['title'])){
    echo 'Title is required <br/>';
} else {
    echo htmlspecialchars($_POST['title']);
}
//check title
if(empty($_POST['date'])){
    echo 'Date is required <br/>';
} else {
    $date = $_POST['date'];
    if(!preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $date)){
        echo 'Invalid date format';
    }
    else {
        echo htmlspecialchars($_POST['date']);
    }
}

//check title
if(empty($_POST['blog'])){
    echo 'You need to write the main content of your blog <br/>';
} else {
    echo htmlspecialchars($_POST['blog']);
}
} //end of POST check

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Write a Blog</h4>
        <form action="add.php" method="POST" class="white">
            <label for="">Blog Title</label>
            <input type="text" name="title">
            <label for="">Date of Creation</label>
            <input type="text" name="date">
            <label for="">Blog Text</label>
            <textarea name="blog" class="materialize-textarea auto-resize" rows="1"></textarea>
            <div class="center">
                <input type="submit" name='submit' value="submit" class="btn brand z-depth-0">
            </div>
</section>

<?php include('templates/footer.php'); ?>


</html>
