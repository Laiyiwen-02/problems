<?php include "../menu.php"; ?>
<?php
$fl = file("problems.txt");
foreach ($fl as $line) {
  echo "<a href = '/problems/" . $line . "'>" . $line . "</a><br>";
}
?>
<?php include "../footer.php"; ?>