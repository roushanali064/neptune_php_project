<?php

include('./extends/header.php')

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
            <h3>Admin ID: <?= $_SESSION['user_id'] ?></h3>
            <h3>Admin Nmae: <?= $_SESSION['user_name'] ?></h3>
            <h3>Admin Email: <?= $_SESSION['user_email'] ?></h3>
        </div>
    </div>
</div>

<?php

include('./extends/footer.php')

?>