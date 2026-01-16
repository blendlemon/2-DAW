// Write your code here

class Person {
  public $first_name;
  public $last_name;
  
  public function __construct($first, $last){
    $this->first_name = $first;
    $this->last_name = $last;
  }
  public function get_full_name(){
    return "{$this->first_name} {$this->last_name}";
  }
}