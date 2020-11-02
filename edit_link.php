<?php
    require('config/config.php');
    require('config/db.php');
    // Chick FOrm Submit
    if(isset($_POST['submit'])){
    //Get Form Data
        $update_id  = mysqli_real_escape_string($conn,$_POST['update_id']);
        $title      = mysqli_real_escape_string($conn,$_POST['title_link']);
        $Author     = mysqli_real_escape_string($conn,$_POST['author']);
        $Body       = mysqli_real_escape_string($conn,$_POST['body']);
        
        $query  =   "UPDATE post SET 
                    title_link = '$title', 
                    author = '$Author',
                    body = '$Body'
                    WHERE id ={$update_id}";

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
        <h2>add link</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title_link" class="form-control" value="<?php echo $post['title_link']; ?>">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
            </div>
            <div class="form-group">
                <label>Link</label>
                <textarea type="text" name="body" class="form-control"> <?php echo $post['body']; ?></textarea>
            </div>
            <input type= "hidden" name= "update_id" value="<?php echo $post['id']; ?>">
            <input type= "submit" name= "submit" value="submit" class=" btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php');?>


