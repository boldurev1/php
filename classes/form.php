<?php

require_once __DIR__ . '/FormField.php';

class form
{
    private $method;

    private $fields;

    public function  __construct($method='get')
    {
        $this->fields = [];
        $this->method = $method;
    }

    public function addField(FormField $field)
    {
     $this->fields[$field->getName()] = $field;
    }

    public function  renderBegin()
    {
        return sprintf('<form method="%s">', $this->method);
    }

    public function renderEnd()
    {
        return '</form>';
    }

    public function  renderFields()
    {
        $ret= '';

        foreach ( $this->fields as $field){
            $ret .=$field->render();
        }

        return $ret;
    }

    public function processRequest()
    {
        $request = $this->method == 'get' ? $_GET : $_POST;
        $isValid = true;

        foreach ($this->fields as $field) {
            $fieldisValid = $field->processRequest($request);

            if (!$fieldisValid) {

                $hasErrors = false;

            }
        }

        return $hasErrors;
    }


}