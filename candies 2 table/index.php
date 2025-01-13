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

$branding = array_column($shop, "brand");
$candtype = array_column($shop ,"type");
$uniqucandy = array_unique($candtype);
sort($uniqucandy);

$uniqbrand = array_unique($branding);
sort($uniqbrand);
// foreach ($branding as $brand) {
//   if (!in_array($brand, $uniqbrand)) { // Check if not already added
//       $uniqbrand[] = $brand; // Append unique brand
//   }
// }



$pricearay =array_column($shop,"price"); 
$maxprice = max($pricearay);
$minprice =min($pricearay); 

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
      <?php
      echo  "<tr>";
      echo "<th>  </th>";
      foreach($uniqucandy as $candy){
        echo "<th> $candy </th>";
      }
      echo "<th> average </th>";
      echo  "</tr>";
      ?>
    </thead>
    <tbody>
      <?php

    
    foreach($uniqbrand as $unique){
      echo "<tr>";
      echo "<td> $unique </td>";
      $sum=0;
      $count=0;
      foreach( $uniqucandy as $candy ){
        $cell="";
        foreach($shop  as $sh){
          if($sh['brand']===$unique && $sh['type'] ===$candy){
            $cell = $sh['price'];
            $sum+=$cell;
            $count++;
            break;
          }
          
        }
        $class =" ";
        if($cell===$minprice){
          $class ='lowest';
          
        }
        else if($cell===$maxprice){
          $class ='largest';

        }
        echo "<td class=\"$class\"> $cell</td>";
        

       
      }
      if($count>0){
        $averageprice =round($sum/$count,0); 
      }else{
        $averageprice =" ";
      }
      echo "<td>" . $averageprice . "</td>";

      
      
      echo "</tr>";

    }



    
    ?>
    </tbody>




  </table>
  <!-- Your solution goes here! -->
</body>
</html>

<!-- if not use {}  thhen the array name treated as variable and the index as treated a string thats why we use {}  beaces  -->