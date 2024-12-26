<?php

$shop = [
  [ "brand" => "Homemade", "type"  => "Dark chocolate", "price" => 2000 ],
  [ "brand" => "Grandma's", "type"  => "Milk chocolate", "price" => 1500 ],
  [ "brand" => "Worldsweet", "type"  => "Milk chocolate", "price" => 3000 ],
  [ "brand" => "Worldsweet", "type"  => "Dark chocolate", "price" => 4000 ],
  [ "brand" => "Worldsweet", "type"  => "Orange essence", "price" => 4000 ],
  [ "brand" => "Homemade", "type"  => "Milk chocolate", "price" => 1000 ],
  [ "brand" => "Speziale", "type"  => "Apple & Cinnamon", "price" => 1000 ]
];

// Extract unique candy types
$candyTypes = [];
foreach ($shop as $item) {
    if (!in_array($item['type'], $candyTypes)) {
        $candyTypes[] = $item['type'];
    }
}
sort($candyTypes);
// Extract unique brands
$brandtypes = [];
foreach ($shop as $item) {
    if (!in_array($item['brand'], $brandtypes)) {
        $brandtypes[] = $item['brand'];
    }
}
sort($brandtypes);
$prices =array_column($shop, 'price');
$minprice =min($prices);
$maxprice =max($prices);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>Task 1</title>
</head>
<body>
  <h1>Task 1: Candies</h1>
  <table>
    <thead>
      <tr>
        <th>Brand</th>
        <?php
        // Generate candy type headers
        foreach ($candyTypes as $type) {
            echo "<th>" . $type . "</th>";
        }
        ?>
        <th> Average price</th>
      </tr>


    </thead>
    <tbody>
    <?php
      // Generate rows with brands in the first column
      foreach ($brandtypes as $brand) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($brand) . "</td>"; // Display brand in the first column
          
          // Fill cells with corresponding prices
          
          $totalPrice = 0;
          $count = 0;

          foreach ($candyTypes as $type) {
              $price = ''; // Default empty cell
              foreach ($shop as $item) {
                  if ($item['brand'] === $brand && $item['type'] === $type) {
                      $price = $item['price']; // Match found, get price
                      $totalPrice += $price;
                      $count++;
                      break;
                  }
              }
              $class =" ";
              if($price ===$minprice){
                $class ='lowest';
              }
              else if ($price===$maxprice){
                $class = 'largest';

              }
              echo "<td class='" .$class . "'>". $price . "</td>";
          }
          if($count>0){
            $averageprice =round($totalPrice/$count,0); 
          }else{
            $averageprice =" ";
          }
          echo "<td>" . $averageprice . "</td>";

          echo "</tr>";
      }
      
      ?>
    </tbody>
  </table>
</body>
</html>
