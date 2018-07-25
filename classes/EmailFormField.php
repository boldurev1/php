<?php

require_once  __DIR__ . '/FormField.php';


class EmailFormField extends FormField
{
    public function __construct($label, $name)
    {
        parent::__construct($label, $name);

        $this->type = 'email';
    }

    public function processRequest(array $request)
    {
        $isValid =  parent::processRequest($request);

        if (mb_strpos($this->value, '@') === false) {
            $errors['Email'] = 'Email должен содержать символ @';

            return true;
        }
    }

    return $isValid;


}