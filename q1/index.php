<?php
$shapes = [
  [
    'type'    => 'rect',
    'params'  => [
      'x' => 0,
      'y' => 0,
      'width' => 50,
      'height' => 50,
      'rx' => 10,
    ]
  ],
  [
    'type'    => 'line',
    'params'  => [
      'x1' => 60,
      'y1' => 100,
      'x2' => 80,
      'y2' => 120,
      'stroke' => 'red',
    ]
  ],
  [
    'type'    => 'line',
    'params'  => [
      'x1' => 80,
      'y1' => 120,
      'x2' => 150,
      'y2' => 50,
      'stroke' => 'red',
    ]
  ],
  [
    'type'    => 'circle',
    'params'  => [
      'cx' => 150,
      'cy' => 100,
      'r' => 20,
    ]
  ],
];


echo '<svg width="200px" height="200px" xmlns="http://www.w3.org/2000/svg">';


foreach ($shapes as $shape) {
    $type = $shape['type'];
    $params = $shape['params'];
    
    // Start the SVG element (e.g., <rect>, <line>, <circle>)
    echo "<$type";
    
    // Add the attributes from the params array
    
    foreach ($params as $key => $value) {
        echo " $key=\"$value\"";
        //i want value in qutos
        // here \ this treat  it as a part of string 
    }
    
    
    echo " />";
}


echo '</svg>';
?>
    