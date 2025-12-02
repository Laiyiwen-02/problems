<?php
$rp = file("cnt.txt");
$file = fopen("solution/" . $rp[0] + 1 . ".html", "w");
fwrite($file, $_POST['h']);
file_put_contents("cnt.txt", $rp[0] + 1);
file_put_contents("solutions.txt", ($rp[0] + 1)."\n", FILE_APPEND);
file_put_contents("title.txt", $_POST['title']."\n", FILE_APPEND);
echo "done";
?>