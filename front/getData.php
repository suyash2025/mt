<?php

include 'config.php';

$sel = mysqli_query($con,"select * from posts");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
 $data[] = array("title"=>$row['title'],"content"=>$row['content'], "thumbnail"=>$row['thumbnail']);
}
echo json_encode($data);
?>
