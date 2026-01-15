<?php
// Write your code here :D
class President
{
    public $name = 'Barack Obama';

    public function greet($name)
    {
        return "Hello $name, my name is $this->name, nice to meet you!";
    }
}

$us_president = new President();

$greetings_from_president = $us_president->greet("Donald");

echo $greetings_from_president;
