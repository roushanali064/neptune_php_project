<?php
include('./extends/header.php');
include('./icon.php');
include('../config/db.php');

$portfolio_id = $_GET['edit_id'];

$select_query = "SELECT * FROM portfolio WHERE id='$portfolio_id'";
$connect = mysqli_query($db_connect,$select_query);
$portfolio = mysqli_fetch_assoc($connect)


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio Edit</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="./portfolio_post.php" method="POST" enctype="multipart/form-data">
                    <input type="text" hidden name="portfolio_id" id="" value="<?= $portfolio_id ?>">

                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="<?= $portfolio['title'] ?>">

                    <label for="sub_title" class="form-label">Sub Title</label>
                    <input type="text" class="form-control" id="sub_title" aria-describedby="emailHelp" name="sub_title" value="<?= $portfolio['sub_title'] ?>">

                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4"><?= $portfolio['description'] ?></textarea>

                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control">

                    <button type="submit" class="btn btn-info mt-5" name="update_portfolio">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('./extends/footer.php')

?>