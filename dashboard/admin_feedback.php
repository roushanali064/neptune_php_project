<?php
include('./extends/header.php');
include('../config/db.php');

$message_id = $_GET['message_id'];


$select_query = "SELECT * FROM user_message WHERE id='$message_id'";
$connect = mysqli_query($db_connect,$select_query);
$message = mysqli_fetch_assoc($connect);


?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Send Feedback</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="../mail_submission.php" method="POST">
                    <input type="text" hidden  name="message_id" id="" value="<?= $message['id'] ?>">

                    <input type="text" hidden class="form-control"  aria-describedby="emailHelp" name="email" value="<?= $message['email'] ?>">

                    <label for="Subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="Subject" aria-describedby="emailHelp" name="subject">

                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>

                    <button type="submit" class="btn btn-info mt-5" name="send_feedback">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('./extends/footer.php')

?>