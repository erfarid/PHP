<?php
$tracks = [
  ["id" => 1,  "from" => "Írottkő",            "to" => "Sárvár",             "length" => 70.2, "elevation" => 430,  "time" => 1097],
  ["id" => 2,  "from" => "Sárvár",             "to" => "Sümeg",              "length" => 71.9, "elevation" => 280,  "time" => 1106],
  ["id" => 3,  "from" => "Sümeg",              "to" => "Keszthely",          "length" => 47.5, "elevation" => 810,  "time" => 794],
  ["id" => 4,  "from" => "Keszthely",          "to" => "Tapolca",            "length" => 25.7, "elevation" => 470,  "time" => 433],
  ["id" => 5,  "from" => "Tapolca",            "to" => "Badacsonytördemic",  "length" => 15.7, "elevation" => 330,  "time" => 269],
  ["id" => 6,  "from" => "Badacsonytördemic",  "to" => "Nagyvázsony",        "length" => 41,   "elevation" => 1260, "time" => 741],
  ["id" => 7,  "from" => "Nagyvázsony",        "to" => "Városlőd",           "length" => 22.1, "elevation" => 400,  "time" => 372],
  ["id" => 8,  "from" => "Városlőd",           "to" => "Zirc",               "length" => 38.7, "elevation" => 1020, "time" => 683],
  ["id" => 9,  "from" => "Zirc",               "to" => "Bodajk",             "length" => 44.8, "elevation" => 890,  "time" => 760],
  ["id" => 10, "from" => "Bodajk",             "to" => "Szárliget",          "length" => 48.5, "elevation" => 1160, "time" => 843],
  ["id" => 11, "from" => "Szárliget",          "to" => "Dorog",              "length" => 67.2, "elevation" => 1950, "time" => 1204],
  ["id" => 12, "from" => "Dorog",              "to" => "Piliscsaba",         "length" => 18.6, "elevation" => 440,  "time" => 322],
  ["id" => 13, "from" => "Piliscsaba",         "to" => "Hűvösvölgy",         "length" => 21.7, "elevation" => 480,  "time" => 373],
  ["id" => 14, "from" => "Hűvösvölgy",         "to" => "Rozália téglagyár",  "length" => 13.9, "elevation" => 450,  "time" => 253],
  ["id" => 15, "from" => "Rozália téglagyár",  "to" => "Dobogókő",           "length" => 22.3, "elevation" => 1000, "time" => 434],
  ["id" => 16, "from" => "Dobogókő",           "to" => "Visegrád",           "length" => 24.2, "elevation" => 510,  "time" => 414],
  ["id" => 17, "from" => "Nagymaros",          "to" => "Nógrád",             "length" => 38.1, "elevation" => 1610, "time" => 732],
  ["id" => 18, "from" => "Nógrád",             "to" => "Becske",             "length" => 51.7, "elevation" => 1560, "time" => 931],
  ["id" => 19, "from" => "Becske",             "to" => "Mátraverebély",      "length" => 67.3, "elevation" => 1720, "time" => 1181],
  ["id" => 20, "from" => "Mátraverebély",      "to" => "Mátraháza",          "length" => 25.9, "elevation" => 1170, "time" => 505],
  ["id" => 21, "from" => "Mátraháza",          "to" => "Sirok",              "length" => 21.7, "elevation" => 970,  "time" => 422],
  ["id" => 22, "from" => "Sirok",              "to" => "Szarvaskő",          "length" => 17.5, "elevation" => 340,  "time" => 297],
  ["id" => 23, "from" => "Szarvaskő",          "to" => "Putnok",             "length" => 54.9, "elevation" => 1880, "time" => 1012],
  ["id" => 24, "from" => "Putnok",             "to" => "Bódvaszilas",        "length" => 63.9, "elevation" => 1755, "time" => 1740],
  ["id" => 25, "from" => "Bódvaszilas",        "to" => "Boldogkőváralja",    "length" => 65,   "elevation" => 850,  "time" => 1059],
  ["id" => 26, "from" => "Boldogkőváralja",    "to" => "Sátoraljaújhely",    "length" => 52.7, "elevation" => 1680, "time" => 959],
  ["id" => 27, "from" => "Sátoraljaújhely",    "to" => "Hollóháza",          "length" => 46.4, "elevation" => 1280, "time" => 825],
];


$lengths = array_column($tracks, "length");
$elevations = array_column($tracks, "elevation");
$maxElevation = max($elevations);
$maxlength = max($lengths);

$finalsteepness = []; // Store steepness for each track
foreach ($tracks as $track) {
    $steepness = round($track['elevation'] / $track['length'], 1);
    $finalsteepness[] = $steepness;
}

$maxSteepness = max($finalsteepness); // Find the maximum steepness

foreach ($tracks as $track) {
  $velocity = round($track['length'] / ($track['time'] / 60), 1);
  $velocities[] = $velocity;
}
//$velocities = array_map(fn($track) => round($track['length'] / ($track['time'] / 60), 1), $tracks);
$minVelocity = min($velocities);
$maxVelocity = max($velocities);
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
  <h1>Task 1: Tracks</h1>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>From - to</th>
        <th>Length (km)</th>
        <th>Elevation (m)</th>
        <th>Time (h)</th>
        <th>Steepness (m/km)</th>
        <th>Velocity (km/h)</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $totallength = 0;
      $totalelevation = 0;
      $toatltime = 0;
      foreach ($tracks as $track) {
        echo "<tr>";
        echo "<td> {$track['id']} </td>";
        echo "<td>{$track['from']}-{$track['to']} </td>";
        $percentage = ($track['length'] / $maxlength) * 100;

        // Calculate hue
        $hue = 120 - ($percentage * 1.2); // Map percentage to 120-0 range

        // Output length with colored background
        echo "<td style='background-color: hsla($hue, 100%, 50%, 0.5);'>{$track['length']}</td>";

        $totallength += $track['length'];
        $totalelevation += $track['elevation'];

        $elevationPercentage = ($track['elevation'] / $maxElevation) * 100;
        $elevationHue = 120 - ($elevationPercentage * 1.2);
        echo "<td style='background-color: hsla($elevationHue, 100%, 50%, 0.5);'>{$track['elevation']}</td>";


        $newtime = $track['time'] / 60;
        $newtime = round($newtime, 1);
        $hourtime[] = $newtime;
        $toatltime += $newtime;

        echo "<td> $newtime </td>";
        $steepness = $track['elevation'] / $track['length'];
        $steepness = round($steepness, 1);

        $steepnessPercentage = ($steepness / $maxSteepness) * 100;
        $steepnessHue = 120 - ($steepnessPercentage * 1.2);
        echo "<td style='background-color: hsla($steepnessHue, 100%, 50%, 0.5);'>{$steepness}</td>";


        $velocity = round($track['length'] / $newtime, 1);
        $velocityPercentage = (($velocity - $minVelocity) / ($maxVelocity - $minVelocity)) * 100;
        $velocityHue = $velocityPercentage * 1.2; // Map percentage to Hue range (0-120)
        echo "<td style='background-color: hsla($velocityHue, 100%, 50%, 0.5);'>$velocity</td>";

        echo "</tr>";
      }



      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">Sum</td>
        <?php echo "<td>$totallength</td>" ?>;
        <?php echo "<td>$totalelevation</td>" ?>;
        <?php echo "<td>$toatltime</td>" ?>;
        <td></td>
        <td></td>
      </tr>
    </tfoot>
  </table>
</body>

</html>


<!-- by using the array column  i can make the new array in 1 d format  -->
<!-- $times = array_column($tracks, 'time'); -->