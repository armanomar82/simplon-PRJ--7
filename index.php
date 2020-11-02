<?php
    require('config/config.php');
    require('config/db.php');

    //creat query
    $query ='SELECT * FROM post ORDER BY created_at DESC';
    //get result
    $result = mysqli_query($conn, $query);
    // fetch data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // free result
    mysqli_free_result($result);
    //close Connection
    mysqli_close($conn);
?>

<?php include('inc/header.php');?>
    <div class="container">
    <br>
    <br>
        <h2>Links</h2>
        <?php foreach($posts as $post) :?>
            <div class="jumbotron">
                <h3 class="display-5"><?php echo $post['title_link'];?></h3>
                <small>Creat on<?php echo $post['creat_at']; ?> By <?php echo $post['author']; ?></small>
                <hr class="my-4">
                <p><?php echo $post['body']; ?> </p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="link.php?id=<?php echo $post['id']; ?> ">Red mor</a>
            </div>
        <?php endforeach ;?>
    </div>
<?php include('inc/footer.php');?>





