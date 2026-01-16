<?php
// Write your code here
class Person
{
  const species = "Homo Sapiens";
  public $name;
  public $age;
  public $occupation;

  public function __construct($name, $age, $occupation)
  {
    $this->name = $name;
    $this->occupation = $occupation;
    $this->age = $age;
  }

  public function introduce(): string
  {
    return "Hello, my name is $this->name";
  }

  public function describe_job(): string
  {
    return "I am currently working as a(n) $this->occupation";
  }

  public static function greet_extraterrestrials($species): string
  {
    return "Welcome to Planet Earth " . $species . "!";
  }
}

class Salesman extends Person
{
  public function __construct($name, $age)
  {
    return parent::__construct($name, $age,  "Salesman");
  }
  public function introduce(): string
  {
    return parent::introduce() . ", don't forget to check out my products!";
  }
}

class ComputerProgrammer extends Person
{
  public function __construct($name, $age)
  {
    return parent::__construct($name, $age,  "Computer Programmer");
  }


  public function describe_job(): string
  {
    return parent::describe_job() . ", don't forget to check out my Codewars account ;)";
  }
}
class WebDeveloper extends ComputerProgrammer
{
  public function __construct($name, $age)
  {
    parent::__construct($name, $age);
    $this->occupation = "Web Developer";
  }

  public function describe_job(): string
  {
    return Person::describe_job() . ", don't forget to check out my Codewars account ;) And don't forget to check on my website :D";
  }
  public function describe_website()
  {
    return "My professional world-class website is made from HTML, CSS, Javascript and PHP!";
  }
}

$h = new WebDeveloper("h", 22);
echo $h->describe_job();