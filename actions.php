<?php

require_once __DIR__ . '/classes/form.php';
require_once __DIR__ . '/classes/EmailFormField.php';
require_once __DIR__ . '/classes/PasswordFormField.php';

error_reporting(E_ALL);
ini_set('display_errors', true);

define( 'USER_FILENAME', __DIR__ . '/user.txt');


$form = new Form('post');
$form->addField(new FormField('Name', 'first_name'));
$form->addField(new FormField('Famely', 'last_name'));
$form->addField(new FormField('Email', 'email'));
$form->addField(new FormField('Password', 'password'));



if ($_SERVER['REQUEST_METHOD']=='POST') {
    processRequest ();
}

function processRequest()
{
    global $form;

    $IsValid = $form->processRequest();


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

