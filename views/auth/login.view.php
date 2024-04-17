<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

<h1>Login!</h1>

<form method="POST">

    <label>Email:
        <input name="email" type="email" />
    </label>
        <?php if(isset($errors["email"])) { ?>
                <p><?= $errors["email"] ?></p>
                    <?php } ?>

    <label>Password:
        <input name="password" />
    </label>
        <?php if(isset($errors["password"])) { ?>
                <p><?= $errors["password"] ?></p>
                    <?php } ?>

    <button>Register</button>

</form>

<?php require "views/components/footer.php" ?>