<?php
include('./extends/header.php');
include('../config/db.php');

$services_select_query = "SELECT * FROM services";
$services = mysqli_query($db_connect, $services_select_query);
$sl = 0;

?>


<div class="row">
    <div class="col-12">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service) : ?>
                    <tr>
                        <th scope="row"><?= ++$sl ?></th>
                        <td><?= $service['title'] ?></td>
                        <td><?= $service['description'] ?></td>
                        <td><i class="<?= $service['icon'] ?>"></i></td>
                        <td>
                            <?php if($service['status'] == 'deactive') : ?>
                            <a class="btn btn-danger btn-small" href="./services_post.php?status_change=<?= $service['id'] ?>"><?= $service['status'] ?></a>
                            <?php endif; ?>
                            <?php if($service['status'] == 'active') : ?>
                            <a class="btn btn-success btn-small" href="./services_post.php?status_change=<?= $service['id'] ?>"><?= $service['status'] ?></a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="./service_edit.php?edit_id=<?= $service['id'] ?>" class="btn btn-primary">
                                Edit
                            </a>
                            <a href="./services_post.php?delete_id=<?= $service['id'] ?>" class="btn btn-danger">
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