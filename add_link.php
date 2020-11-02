<?php
    require('config/config.php');
    require('config/db.php');
    // Chick FOrm Submit
    if(isset($_POST['submit'])){

    //Get Form Data
        $title = mysqli_real_escape_string($conn,$_POST['title_link']);
        $Author = mysqli_real_escape_string($conn,$_POST['author']);
        $Body = mysqli_real_escape_string($conn,$_POST['body']);
        
        $query = "INSERT INTO post(title_link,author,body) VALUES('$title','$Author','$Body')";
        if(mysqli_query($conn, $query)){
            header('location: '.ROOT_URL.'');
        }else{
            echo ' ERROR: '.mysqli_error($conn);
        }
    } 
?>

<?php include('inc/header.php');?>
    <div class="container">
    <br>
    <br>
        <h2>add link</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title_link" class="form-control">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control">
            </div>
            <div class="form-group">
                <label>Link</label>
                <textarea type="text" name="body" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="submit" class=" btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php');?>


