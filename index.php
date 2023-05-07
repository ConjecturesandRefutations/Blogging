<?php

include('config/db_connect.php');

//write query from all blogs
$sql = 'SELECT title, date, id FROM blogs ORDER BY date'; 

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<h4 class='center grey-text'>Blogs</h4>

<div class="container">
    <div class="row">

        <?php foreach($blogs as $blog): ?>

            <div class="col s6">
                <div class="card z-depth-0">
                    <div class="card-content">
                        <h6 class='center grey-text text-darken-3'><?php echo htmlspecialchars($blog['title']); ?></h6>
                        <div class='center grey-text' style="font-weight: bold;"><?php echo htmlspecialchars($blog['date']); ?></div>
                        <div class="card-action">
                        <a href="view.php?id=<?php echo $blog['id'] ?>" class="right-align">View&nbsp;<span class="hide-on-small-only">Blog</span></a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php include('templates/footer.php'); ?>


</html>