<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

<h1>Register!</h1>

<form method="POST">

    <label>Email:
        <input name="email" />
    </label>
        <?php if(isset($errors["email"])) { ?>
                <p><?= $errors["email"] ?></p>
                    <?php } ?>

    <label>Password: <span>(Jābūt 8 rakstzīmēm, vismaz 1 lielam burtam un mazam, kā arī ciparam un simbolam!)</span>
        <input name="password" type="password"/>
    </label>
        <?php if(isset($errors["password"])) { ?>
                <p><?= $errors["password"] ?></p>
                    <?php } ?>

    <button>Register</button>

</form>

<?php require "views/components/footer.php" ?>