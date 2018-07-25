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
<?= $form->renderBegin() ?>
  <?= $form->renderFields()?>

<button type="submit">Register</button>

<?= $form->renderEnd() ?>
</body>
</html>