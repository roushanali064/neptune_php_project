<?php
include('./extends/header.php');
include('../config/db.php');

$portfolio_select_query = "SELECT * FROM portfolio";
$portfolios = mysqli_query($db_connect, $portfolio_select_query);
$sl = 0;

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio list</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($portfolios as $portfolio) : ?>
                    <tr>
                        <th scope="row"><?= ++$sl ?></th>
                        <td><img style="width: 50px; height: 50px; border-radius: 5px;" src="../images/portfolio/<?= $portfolio['image'] ?>" alt=""></td>
                        <td><?= $portfolio['title'] ?></td>
                        <td><?= $portfolio['sub_title'] ?></td>
                        <td><?= $portfolio['description'] ?></td>
                        <td>
                            <?php if($portfolio['status'] == 'deactive') : ?>
                            <a class="btn btn-danger btn-small" href="./portfolio_post.php?status_change=<?= $portfolio['id'] ?>"><?= $portfolio['status'] ?></a>
                            <?php endif; ?>
                            <?php if($portfolio['status'] == 'active') : ?>
                            <a class="btn btn-success btn-small" href="./portfolio_post.php?status_change=<?= $portfolio['id'] ?>"><?= $portfolio['status'] ?></a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="./portfolio_edit.php?edit_id=<?= $portfolio['id'] ?>" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="./portfolio_post.php?delete_id=<?= $portfolio['id'] ?>" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include('./extends/footer.php')

?>