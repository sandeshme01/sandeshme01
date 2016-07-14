<?php
include("header.php");
?>

<body>


<div class="w3-container w3-light-grey w3-border w3-bottombar width=90">
<h2>Scrapping Assets</h2>
<form method=post action=scrap-it.php>
<?php

$scrap_note = $_POST['scrap_note'];
$scrap_comment = $_POST['scrap_comment'];

echo "scrap_note:$scrap_note";
echo "scrap_comment:$scrap_comment";

if(!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);
$rowcount = $checked_count+3;
echo "<p>You have selected following ".$checked_count." assets for the scrapping:</p>";
// Loop to store and display values of individual checked checkbox.

echo "<textarea rows=$rowcount cols=50 disabled>";
foreach($_POST['check_list'] as $selected) {
	echo "$selected\n"; 
}
echo "</textarea>";
echo "<br><br><input type=text name=scrap_note value=$scrapnote>";
echo "<br><br><textarea rows=4 cols=50 name=scrap_comment value=$scrapcomment>hi</textarea>";
echo "<br><br><input type=submit value=Mark_It_Scrap_Asset>";
echo "</form>";
}

if(!empty($scrap_note)) {
// Counting number of checked checkboxes.
echo "<p>Updating...!";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $final) {
        echo "$final\n";
}
echo "<br>Update Completed..!";
}


?>

</div>
