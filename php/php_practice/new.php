<?php

/* find second highes number from given array
$arr= [1,2,34,4,21];
$largest_number = $arr[0];
$second_largest_number = null;
for($i=0;$i<count($arr);$i++){
    if($arr[$i]>$largest_number){
        $second_largest_number=$largest_number;
        $largest_number = $arr[$i];
    }elseif($arr[$i]>$second_largest_number && $arr[$i]!=$largest_number){
        $second_largest_number = $arr[$i];
    }
}
if($second_largest_number!=null){
    echo "seconf largest number is: ".$second_largest_number;
}
 */

/* find second highes number from given array 
$arr= [1,2,34,4,21,30];
$largest_number=$arr[0];
$second_largest_number = $arr[0];
for($i=0;$i<count($arr);$i++){
    if($arr[$i]>$largest_number){
        $largest_number = $arr[$i];
    }
}
for($j=0;$j<count($arr);$j++){
    if($arr[$j>$second_largest_number && $arr[$j] != $largest_number]){
        $second_largest_number = $arr[$j];
    }
}
echo "seconf largest number is: ".$second_largest_number; */



/* string reversing
$name="Vishal";
$len=strlen($name);
for($i=($len-1);$i>=0;$i--){
    echo $name[$i];
} */


/* sorting array in acending and decending order 
$arr = array(2,5,1,7,4);
$len = count($arr);
for($i=0;$i<$len;$i++){
    for($j=0;$j<($len-1);$j++){
        if($arr[$j+1]> $arr[$j]){
            $temp =$arr[$j+1];
            $arr[$j+1]=$arr[$j];
            $arr[$j]=$temp;
        }
    }
}
print_r($arr); */

/* find second and third highest salary from employee table in sql 
select max(salary) from employee where salary < (select max(salary) from employee);
or 
select 'salary' from employee order by 'salary' desc limit 1 offset 2; */

/* $arr = array(111, 222, 333, 444);
$result = [];

foreach ($arr as $index => $value) {
    $start = $index * 3 + 1;
    $numbers = range($start, $start + 2);
    $result[] = $value . '-' . implode('.', $numbers);
}

$output = implode(',', $result);
echo $output;
 */


/* $arr = array(23,54,65,67,98,78);
$largest_number = $arr[0];
$second_largest_number = $arr[0];
for($i=0;$i<count($arr);$i++){
    if($arr[$i]>$largest_number){
        $largest_number = $arr[$i];
    }
}
for($j=0;$j<count($arr);$j++){
    if($arr[$j]>$second_largest_number && $arr[$j] != $largest_number){
        $second_largest_number = $arr[$j];
    }
}

echo "seconf largest number is: ".$second_largest_number; */


/* $name = "vishal";
$len = strlen($name);
// echo $len;
for($i = ($len-1);$i>=0;$i--){
    echo $name[$i];
} */






?>