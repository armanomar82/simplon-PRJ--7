<?php

    require('config/config.php');
    require('config/db.php');
    if(isset($_POST['delete'])){
        //Get Form Data
            $delete_id  = mysqli_real_escape_string($conn,$_POST['delete_id']);

            $query  =   "DELETE FROM post WHERE id ={$delete_id}";
    
            if(mysqli_query($conn, $query)){
                header('location: '.ROOT_URL.'');
            }else{
                echo ' ERROR: '.mysqli_error($conn);
            }
        }
    //get id
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    //creat query
    $query ='SELECT * FROM post WHERE id = '. $id;
    //get result
    $result = mysqli_query($conn,$query);
    // fetch data
    $post = mysqli_fetch_assoc($result);
    // free result
    mysqli_free_result($result);
    //close Connection
    mysqli_close($conn);
?>

<?php include('inc/header.php');?>
    <div class="container">
    <br>
    <br>
        <div class="jumbotron">
                <h3 class="display-5"><?php echo $post['title_link'];?></h3>
                <small>Creat on<?php echo $post['created_at']; ?> By <?php echo $post['author']; ?></small>
                <hr class="my-4">
                <p><?php echo $post['body']; ?> </p>
                <hr>
                <div class="btn-group" role="group" aria-label="Basic example">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" class="bull-right" method="POST">
                <a href="<?php echo ROOT_URL;?>" class="btn btn-outline-primary">Back</a>
                    <a href="<?php echo ROOT_URL; ?>edit_link.php?id=<?php echo $post['id'];?>" class="btn btn-primary">Edit</a>
                    <input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
                    <button type="submit" name="delete" value="Delete" class="btn btn-outline-danger" >Delete</button>
                    
                </form>
                </div>
        </div>

    </div>
<?php include('inc/footer.php');?>

