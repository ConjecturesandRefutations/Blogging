<?php

include('config/db_connect.php');

$title = $date = $content = '';
$errors = array('title' =>'', 'date'=>'', 'content' => '');

    if(isset($_POST['submit'])){
    
//check title
if(empty($_POST['title'])){
    $errors['title'] = 'Blog must have a title';
} else{
    $title = $_POST['title'];
}
//check date
if(empty($_POST['date'])){
    $errors['date'] = 'Date is required <br/>';
} else {
    $date = $_POST['date'];
    if(!preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $date)){
        $errors['date'] = 'Date must be in correct format (11/11/1111)';
    }
}

//check content
if(empty($_POST['content'])){
    $errors['content'] = 'You need to write the main content of your blog <br/>';
} else{
    $content = $_POST['content'];
}

if(array_filter($errors)){
    //echo 'errors in form';
} else {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    //create sql
    $sql = "INSERT INTO blogs(title,date,content) VALUES('$title','$date','$content')";

     //save to db and check
     if(mysqli_query($conn, $sql)){
        //success
        header('Location: index.php');
    } else {
        //error
        echo 'query error: ' . mysql_error($conn);
    }

}

} // end POST check

?>


<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text xxs3 xs4 s6">
    <h4 class="center">Write a Blog</h4>
    <form action="add.php" method="POST" class="white">
        <div class="row">
            <div class="input-field col s12 m6">
                <label for="">Blog Title</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
                <div class="red-text"><?php echo $errors['title'] ?></div>
            </div>
            <div class="input-field col s12 m6">
                <label for="">Date of Creation</label>
                <input type="text" name="date" value="<?php echo htmlspecialchars($date) ?>">            
                <div class="red-text"><?php echo $errors['date'] ?></div>
            </div>
        </div>
        <div class="input-field">
            <label for="content" style="font-size: 14   px;">Blog Content</label>
            <textarea id="content" name="content" class="materialize-textarea auto-resize" rows="1"><?php echo htmlspecialchars($content) ?></textarea>
            <div class="red-text"><?php echo $errors['content'] ?></div>
        </div>
        <div class="center">
            <input type="submit" name='submit' value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>


<?php include('templates/footer.php'); ?>


</html>
