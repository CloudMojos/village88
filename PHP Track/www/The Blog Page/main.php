<?php require('new-connection.php'); session_start(); ?>
<?php 
    $guest = !isset($_SESSION['user']);
    if (!$guest) {
        $first_name = $_SESSION['user']['first_name'];
    } else {
        $first_name = "Guest";
    }
?>
<!-- Todo -->
<!-- 
    1. Check if logged in, else, enable view only
        - Disable form elements
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css.php">
    <title>📄 The Blog Page</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <p class="navbar-brand">🌞</p>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active disabled">
                        Good Morning,
                        <span style="text-decoration: underline;"><?= $first_name ?></span>
                        !
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <img src="img/bg-1" alt="" class="banner img-fluid">
    <div class="container"> 
        <h1>Blade Runner 2049</h1>
        <p>Thirty years after the events of the first film, a new blade runner, LAPD Officer K (Ryan Gosling), unearths a long buried secret that has the potential to plunge what’s left of society into chaos. K’s discovery leads him on a quest to find Rick Deckard (Harrison Ford), a former LAPD blade runner who has been missing for 30 years.</p>

<?php if(!$guest): ?>
        <!-- If guest, don't show this -->
        <form class="review-form" action="process.php" method="POST">
            <input type="hidden" name="action" value="review">
            <h2 class="review-label">Post a review</h2>
            <textarea name="review" id="review" cols="150" rows="8"></textarea>
            <input type="submit" value="Submit">
        </form>
<?php endif; ?>
<?php 
        // SELECT THE REVIEWS
        $query = "SELECT reviews.*, users.first_name, users.last_name FROM reviews LEFT JOIN users ON reviews.user_id = users.id ORDER BY reviews.id DESC";
        // echo $query;
        // die();
        $reviews = fetch_all($query);
        // var_dump($reviews);
        foreach($reviews as $review) {
?>
        <div class="review">
            <h3>From: <?= $review['first_name'] . ' ' . $review['last_name'] ?></h3>
            <h3><?= $review['created_at']?>:  <?= $review['content'] ?> </h3>
<?php
        // SELECT THE REPLIES
        $query = "SELECT * FROM replies WHERE review_id = {$review['id']}";
        $replies = fetch_all($query);
?> 
            <ul class="reply"> 
<?php 
            foreach($replies as $reply) {
?> 
                <li><?= $reply['content'] ?></li>
<?php
            }
?>           
            </ul>
            <!-- If guest, don't show this -->
<?php if(!$guest): ?>
            <form class="reply-form" action="process.php" method="POST">
                <input type="hidden" name="action" value="reply">
                <input type="hidden" name="review_id" value="<?= $review['id']?>">
                <textarea name="reply" id="reply" cols="50" rows="3"></textarea>
                <input type="submit" value="Reply">
            </form>
        </div>
<?php endif; ?>
<?php
        }
?>
    </div>
</body>
</html>