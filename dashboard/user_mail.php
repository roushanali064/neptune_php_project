<?php
include('./extends/header.php');
include('../config/db.php');

$user_messages_query = "SELECT * FROM user_message";
$user_messages = mysqli_query($db_connect, $user_messages_query);
$sl = 0;

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>services list</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user_messages as $user_message) : ?>
                    <tr>
                        <th scope="row"><?= ++$sl ?></th>
                        <td><?= $user_message['name'] ?></td>
                        <td><?= $user_message['email'] ?></td>
                        <td><?= $user_message['message'] ?></td>
                        <td>
                            <?php if($user_message['feedback']) : ?>
                            <p class=""><?= $user_message['feedback'] ?></p>
                            <?php else: ?>
                                <a class="btn btn-danger btn-small" href="./admin_feedback.php?message_id=<?= $user_message['id'] ?>">Feedback</a>
                                <?php endif; ?>
                        </td>
                        <td>
                            <a href="./services_post.php?delete_id=<?= $user_message['id'] ?>" class="btn btn-danger">
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