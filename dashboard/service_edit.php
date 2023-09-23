<?php
include('./extends/header.php');
include('./icon.php');
include('../config/db.php');
$user_id = $_GET['edit_id'];

$select_query = "SELECT * FROM services WHERE id='$user_id'";
$connect = mysqli_query($db_connect,$select_query);
$service = mysqli_fetch_assoc($connect)

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="./services_post.php" method="POST">
                    <input hidden type="text" name="id" value=" <?= $service['id'] ?>">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="<?= $service['title'] ?>">

                <label for="description" class="form-label">Description</label>
                <textarea  class="form-control" name="description" id="description"  rows="4" ><?= $service['description'] ?></textarea>

                <label for="icon" class="form-label">Icon</label>
                <input type="text" class="form-control" id="icon"  name="icon" readonly value="<?= $service['icon'] ?>">

                <div class="card">
                    <div class="card-body">
                        <?php foreach($fonts as $font) : ?>
                        <span class="fa-2x">
                            <i onclick="myfun(event)" class="<?= $font ?>"></i>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if(isset($_SESSION['insert_service error'])) : ?>
                <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['insert_service error'] ?></div>
                <?php endif; unset($_SESSION['insert_service error']) ?>

                <button type="submit" class="btn btn-info mt-5" name="update_btn">Insert</button>
                </form>
                <script>
                    let iconFiled = document.getElementById('icon')
                    function myfun(e){
                        let icon = e.target.getAttribute("class")
                        iconFiled.value = icon;
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<?php
include('./extends/footer.php')

?>