<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

define( 'USER_FILENAME', __DIR__ . '/user.txt');

$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD']=='GET') {
    processRequest ();
}

function processRequest()
{
    global $errors, $data;

    $fields = ['First_name', 'Last_name', 'Email', 'Password'];

    foreach ($fields as $field) {
        if (empty($_GET[$field])) {
            $errors[$field] = 'Значение не может быть пустым';
        }

        $data[$field] = isset($_GET[$field]) ? $_GET[$field] : '';
    }
    if (mb_strpos($data['Email'], '@') === false) {
        $errors['Email'] = 'Email должен содержать символ @';
    }

    if (count($errors) == 0) ;
    {
        saveUser();
        header('location: done.html');
        exit();
    }

}
    function saveUser()
    {
        global $data;

        $file= fopen(USER_FILENAME, 'a');
        fputs($file, implode("\t", $data) . "\n");
        fclose($file);
    }


function getError($field)
{
    global $errors;

    if (!empty($errors[$field])) {
        return '<p class="error">' . $errors[$field] . '</p>';
    }

    return '';
}

function getValue($field)
{
    global $data;

    return isset($data[$field]) ? $data[$field] : '';
}