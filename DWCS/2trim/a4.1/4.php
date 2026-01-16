<?php
// Write your code here
class Person{
  const species = "Homo Sapiens";
  public $name;
  public $age;
  public $occupation;
  
  public function __construct($name,$age,$occupation){
    $this->name = $name;
    $this->occupation = $occupation;
    $this->age = $age;
  }
  
  public function introduce(): string{
    return "Hello, my name is $this->name";
  }
  
  public function describe_job(): string{
    return "I am currently working as a(n) $this->occupation";
  }
  
  public static function greet_extraterrestrials($species): string{
    return "Welcome to Planet Earth ".$species."!";
  }
}