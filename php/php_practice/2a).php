<?php

$conn = mysqli_connect('localhost','root','','scgen');
$sql = 'SELECT * FROM tbl_country_languages';
$result=mysqli_query($conn,$sql);

echo "countries: "."<br>";
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        
        return;
    }
}
return $row['country'];

?>

<?php
/* $conn = mysqli_connect("localhost", "root", "", "scgen");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = 'SELECT * FROM tbl_country_languages';

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo  "Country: " . $row["country"]. "<br>";
    }
} else {
    echo "0 results";
} */

?>
