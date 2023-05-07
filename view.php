<?php

include('config/db_connect.php');

if(isset($_POST['delete'])){

$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

$sql = "DELETE FROM blogs WHERE id = $id_to_delete";

if(mysqli_query($conn, $sql)){
    //success
    header('Location: index.php');
}{
    //failure
    echo 'query error: ' . mysqli_error($conn);
}

}

//check GET request id parameter
if(isset($_GET['id'])){

$id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM blogs WHERE id = $id";

    //get the query result
    $result = mysqli_query($conn, $sql);

    //fetch result in array format
    $blog = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container grey-text text-darken-4">
    <?php if($blog): ?>

    <h4 class='center'><?php echo htmlspecialchars($blog['title']); ?></h4>
    <p class='center' style='font-style: italic';> Created on: <span> <?php echo htmlspecialchars($blog['date']) ?> </span> </p>
    <p><?php echo nl2br(htmlspecialchars($blog['content'])); ?></p>
   
        <!-- delete form -->
        <form action="view.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $blog['id']; ?>">
        <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
        </form>
   
    <?php else: ?>

    <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>

</html>