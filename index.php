<?php
include  __DIR__ . '/actions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        label {
            display: block;
            position: relative;
            line-height: 1.7em;
        }

        label input {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
            border: 1px solid gray;
        }

        label p.error {
            margin-left: 100px;
            color: red;
        }
    </style>
</head>
<body>
<h1>Register</h1>
<form method="get">
    <label>
        Name:
        <input name="First_name" value="<?= getValue('First_name') ?>">
       <?= getError('First_name') ?>
    </label>

    <label>
        Famely:
        <input name="Last_name" value="<?= getValue('Last_name') ?>">
        <?= getError('Last_name') ?>
    </label>

    <label>
        Email:
        <input name="Email" value="<?= getValue('Email') ?>">
        <?= getError('Email') ?>
    </label>

    <label>
        Password:
        <input name="Password" value="">
        <?= getError('Password') ?>
    </label>

    <button type="submit">Register</button>
</form>
</body>
</html>