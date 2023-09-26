<?php
include('./extends/header.php');
include('./icon.php');

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio insert</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="./portfolio_post.php" method="POST" enctype="multipart/form-data">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">

                    <label for="sub_title" class="form-label">Sub Title</label>
                    <input type="text" class="form-control" id="sub_title" aria-describedby="emailHelp" name="sub_title">

                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>

                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control">

                    <?php if (isset($_SESSION['insert_portfolio error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger fw-bold"><?= $_SESSION['insert_portfolio error'] ?></div>
                    <?php endif;
                    unset($_SESSION['insert_portfolio error']) ?>

                    <?php if (isset($_SESSION['insert_portfolio success'])) : ?>
                        <div id="emailHelp" class="form-text text-success fw-bold"><?= $_SESSION['insert_portfolio success'] ?></div>
                    <?php endif;
                    unset($_SESSION['insert_portfolio success']) ?>

                    <button type="submit" class="btn btn-info mt-5" name="insert_portfolio">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('./extends/footer.php')

?>