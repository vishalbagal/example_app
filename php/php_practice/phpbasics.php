<?php


//array functions

$arr = array(1,2,3,34,4,5,7);

/* // array_rand()
$res = array_rand($arr,2);
print_r($res); */


/* //array_pop() --> it returns the deleted element
$res=array_pop($arr);
print_r($res); */

/* //array_splice()  --> in this we can remove element from given range and also add element at that place 
print_r($arr);
echo "<br>";
$res = array_splice($arr,1,3,[19,10]);
print_r($res);
echo "<br>";
print_r($arr);
 */


/*  //array_slice() --> fetch particular part of array
 $res=array_slice($arr,1,3);
 print_r($res); */

/* //array_chunk() ---> grouping the array element
$res = array_chunk($arr,2);
print_r($res); */



/* $data = ["name" => "Monty Smith","email" => "John Flinch"];
foreach($data as $item){
    print_r($item['name']);
}
 */

 
/* class Car{
    public $color;
    public $model;
    public function __construct($color,$model){
        $this->color = $color;
        $this->model = $model;
    }
}
$myCar = new Car("red","BMW");
foreach ($myCar as $x => $y) {
    echo "$x: $y<br>";
  } */

/* 
function sum(...$x){
    $n=0;
    $len=count($x);
    for($i=0;$i<$len;$i++){
        $n+=$x[$i];
    }
    return $n;
}
$res = sum(1,2,3,4,5);
echo $res;

function name($lastname,...$firstname){
    $txt="";
    $len=count($firstname);
    for($i=0;$i<$len;$i++){
        $txt=$txt."hi .$firstname[$i] $lastname.<br>";
    }
    return $txt;
}

$res = name("doe","roy","joy","vicky");
echo $res; */


/* $arr = ["ram","doe","kin","john"];
// echo $arr[0];
 array_push($arr,"ford");
 print_r($arr);
 */

/* $a = ['a','b','c','d','e'];
foreach($a as $x){
    echo $x."<br>";
} */
/* 
$arr = ['name'=>"john",'age'=>23,'email'=>"john@gmail.com"];
echo $arr['name'];
foreach($arr as $x=>$y){
    echo "$x:$y.<br>";
}


$myCar = [];
$myCar["brand"] = "Ford";
$myCar["model"] = "Mustang";
$myCar["year"] = 1964;

var_dump($myCar);
 */

/* function myFunction() {
    echo "I come from a function!";
  }
  
  $myArr = array("Volvo", 15, myFunction);
  
  $myArr[2]();   */

  /* function myFunction() {
    echo "I come from a function!";
  }
  
  $myArr = array("car" => "Volvo", "age" => 15, "message" => myFunction);
  
  $myArr["message"]();
 */

/* $fruits = array("Apple", "Banana", "Cherry");
$fruits[]="mango";
print_r($fruits); */

/* $cars = array("brand" => "Ford", "model" => "Mustang",'year'=>2001);
// $cars['year']=2001;
// print_r($cars);
$res=array_diff($cars,['Mustang',2001]);
print_r($res); */


/* $arr = ['v','b','e','m'];
rsort($arr);
$len=count($arr);
foreach($arr as $x){
    echo $x."<br>";
} */
/* 
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
asort($age);
foreach($age as $x){
    echo $x."<br>";
} */


/* Name	Stock	Sold
Volvo	22	     18
BMW	    15	     13
Saab	 5	      2
Land 	17	     15 */

/* $arr = array(
    array('name'=>"volvo","stock"=>22,"sold"=>18),
    array('name'=>"BMW","stock"=>15,"sold"=>13),
    array('name'=>"Saab","stock"=>5,"sold"=>2),
    array('name'=>"Land","stock"=>17,"sold"=>15),
);
echo "<pre>";
print_r($arr);
 */
/* 
$arr = array(
    array("volvo",22,18),
    array("BMW",  15,13),
    array("Saab", 5, 2),
    array("Land", 17,15),
);
echo "<pre>";
print_r($arr); */


/* $cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
  );
$len=count($cars);
$ele=count($cars[0]);
// print_r($cars[0][0]);die;
for($i=0;$i<$len;$i++){
    echo "<h4>"."row number ".$i."</h4>";
    echo "<ul>";
    for($j=0;$j<$ele;$j++){
        echo "<li>".$cars[$i][$j]."</li>";
    }
    echo "</ul>";
} */


$a = array(
    array(
      'id' => 5698,
      'first_name' => 'Peter',
      'last_name' => 'Griffin',
    ),
    array(
      'id' => 4767,
      'first_name' => 'Ben',
      'last_name' => 'Smith',
    ),
    array(
      'id' => 3809,
      'first_name' => 'Joe',
      'last_name' => 'Doe',
    )
  );
  

$arr = [5698,2,3,4,113,4767,3809];
print_r(array_search(2,$arr));
echo "<br>";

print_r(array_column($a,'id')); 
echo "<br>";


print_r(array_search(4767,array_column($a,'id')));

print_r($GLOBALS);



?>