<!-- 
In inline style attributes, CSS properties are defined as property: value;. -->
<?php
    include_once(__DIR__. '/data.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task 4</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <h1>4. Potions</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($potions as $potion){
                $textcolor  = " ";
                switch($potion['rarity']){
                    case 'common':
                        $textcolor ='green';
                        break;
                    case 'rare':
                        $textcolor ='blue';
                        break;
                    case 'epic':
                        $textcolor ='purple';
                        break;
                    case 'legendary':
                        $textcolor ='orange';
                        break;
                    }
                    // if ($potion['rarity'] === 'common') {
                    //     $textcolor = 'green';
                    // } elseif ($potion['rarity'] === 'rare') {
                    //     $textcolor = 'blue';
                    // } elseif ($potion['rarity'] === 'epic') {
                    //     $textcolor = 'purple';
                    // } elseif ($potion['rarity'] === 'legendary') {
                    //     $textcolor = 'orange';
                    // }
                    

                

                echo "<tr>";
                echo "<td style = 'color: {$textcolor}';>{$potion['name']}</td>";
                echo "<td style  = 'background-color: {$potion['color']};'></td>";
                echo "<td>{$potion['value']}</td>";
                echo "</tr>";
            }
            ?>
            
        </tbody>
    </table>
    <?php 
    $cnt =0;
    foreach($potions as $potion){
        if($potion['rarity'] =='legendary'){
            $cnt++;
        }

    }
    
    echo "<b>Number of legendary potions $cnt <br>";
    
    $totalcal =0;
    foreach($potions as $potion){
        $totalcal += $potion['value'];
        
    }
    echo "<b>Total value of all potions: " . " $totalcal gold </b>";
    
    // ?>
    <!-- <b>Total value of all potions: <?php // echo $totalcal; ?> gold</b> -->


    
    
</body>
</html>