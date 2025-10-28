<?php
$cacheFile = "cache/report.html";
$cacheLifeTime = 600;

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheLifeTime)) {
    readfile($cacheFile);
    exit;
}

sleep(3);
ob_start();

echo "<!DOCTYPE html>";
echo "<html lang='uk'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>HTML Report</title>";
echo "<style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 80%; margin: 30px auto; }
        th, td { border: 1px solid #000000ff; padding: 8px 10px; text-align: center; }
      </style>";
echo "</head>";
echo "<body>";

echo "<table>";
echo "<caption>Report</caption>";
echo "<tr><th>Name</th><th>Suma</th><th>Date</th></tr>";

$names = ["David", "Vova", "Sasha", "Andrew", "Ryan", "Peter"];

for ($i = 1; $i <= 100; $i++) {
    $name = $names[array_rand($names)];
    $sum = rand(100, 10000);
    $daysAgo = rand(0, 365);
    $date = date("d-m-Y", strtotime("-$daysAgo days"));

    echo "<tr>
            <td>$name</td>
            <td>$sum</td>
            <td>$date</td>
          </tr>";
}

echo "</table>";
echo "</body></html>";

$html = ob_get_clean();
file_put_contents($cacheFile, $html);
echo $html;
?>
