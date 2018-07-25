<?php

class FormField
{

    private $label;

    private $name;

    private $value;

    private $error;

    protected $type;

    public function __construct($label, $name)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = '';
        $this->error = '';
        $this->type = "text";
    }

    public function render()
    {
        $input = sprintf('<input type="%s" name="%s" value="%s">', $this->type, $this->name, $this->value);

        if ($this->error) {
            $input .= sprintf('<p class="error">%s</p>', $this->error);
        }

        $ret = sprintf('<label>%s%s</label>', $this->label, $input);

        return $ret;

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function processRequest(array $request)
    {
        if (empty($request[$this->name])){
            $this->error = 'Значение не может быть пустым';

            return false;
        }
        $this->value = $request[$this->name];

        return true;
    }


}