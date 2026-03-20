<?php
header('Content-Type: application/json');
require 'db_connect.php';
$query="SELECT p.id, p.name, p.stock, COALESCE(SUM(o.quantity),0) AS total_ordered, (p.stock-COALESCE(SUM(o.quantity),0)) AS stock_left FROM products p LEFT JOIN orders o ON p.id=o.product_id GROUP BY p.id LIMIT 5";
$result=$conn->query($query);
$data=[];
while($row=$result->fetch_assoc()){ $data[]=$row; }
echo json_encode($data);
?>