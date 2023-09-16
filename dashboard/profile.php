<?php

include('./extends/header.php')

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-hader card-body">
                <h2 class="text-center">User Name Update</h2>
            </div>
            <div class="card-body">
                <form action="./profile_update.php" method="POST">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">

                    <?php  if(isset($_SESSION['name_update error'])) : ?>
                    <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['name_update error'] ?></div>
                    <?php endif; unset($_SESSION['name_update error']) ?>

                    <button type="submit" class="btn-primary rounded mt-2 py-4 px-4" name="name_update">Update Name</button>
                </form>
            </div>
        </div>
    </div>
    <!-- password update -->
    <div class="col-6">
        <div class="card">
            <div class="card-hader card-body">
                <h2 class="text-center">Password Update</h2>
            </div>
            <div class="card-body">
                <form action="./profile_update.php" method="POST">
                    <label for="exampleInputEmail1" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="current_password">
                    <label for="exampleInputEmail1" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="new_password">
                    <label for="exampleInputEmail1" class="form-label">Confiram Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="confiram_password">

                    <?php  if(isset($_SESSION['password_update error'])) : ?>
                    <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['password_update error'] ?></div>
                    <?php endif; unset($_SESSION['password_update error']) ?>

                    <?php  if(isset($_SESSION['password succes'])) : ?>
                    <div id="emailHelp" class="form-text text-succes"><?= $_SESSION['password succes'] ?></div>
                    <?php endif; unset($_SESSION['password succes']) ?>

                    <button type="submit" class="btn-primary rounded mt-2 py-4 px-4" name="password_update">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

include('./extends/footer.php')

?>