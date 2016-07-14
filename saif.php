<?php

class Calc
{

    public $input1;
    public $input2;
    public $result;


    function setInput($int)
    {


        $this->input1 = (int)$int;
    }

    function setInput2($int1)
    {

        $this->input2 = (int)$int1;
    }

    function getResult()
    {

        $this->result = $this->input1 * $this->input2;
        echo $this->result;
    }

}

    $calc = new Calc();
    $calc->setInput(5);
    $calc->setInput2(41);
    $calc->getResult();


