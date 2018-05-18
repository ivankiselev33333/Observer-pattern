<?php

// Задача по гет...
class Person{
    public function __get($value){

            echo "Произошло обращение к свойству <br />";
            return $this->value=$value;


}
public function __set($name,$str){
    $str=strtolower($str);
    $str=ucwords($str);
    return $this->name=$str;
}
    public function __isset($name) {
        if ($name == 'area') {
            return true;
        }
        return false;
    }
    public function __unset($name) {
        if ($name == 'area') {
            $this->$name = null;
        }
    }

    public function __invoke(){
        echo 'invoke fired';
    }
}

$p=new person;

$p->name='john';
print_r($p);


var_dump(isset($p->name)); //  bool(true)
var_dump(isset($p->area)); //  bool(true)
$p->area='test';
print_r($p);
unset($p->area);
var_dump($p); // float(0)

//зачем? наверника для случаев когда нужно проверить присвоенные свойства объекту...
?>