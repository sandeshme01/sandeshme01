<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

<?php include("header.php");?>

<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" class="init">
$(document).ready(function() {
$('#example').DataTable( {
    paging:   true,
    ordering: true,
    info:     true
     } );
} );
</script>


<?php
$search_key = $_POST["search"];
echo "<center><h3>Your search result for: $search_key</h3>";
?>

<div class="w3-container w3-light-grey w3-border" style="width:95%">
<br>
<table id="example" class="display" cellspacing="0" width="98%">
 <thead>
     <tr>
      <th>Asset Category</th>
      <th>Asset ID</th>
      <th>Serial No</th>
      <th>Asset Model</th>
      <th>Asset Status</th>
      <th>Allocated User Name</th>
      <th>Allocated User ID</th>
     </tr>
</thead>
<tfoot>
     <tr>
       <th>Asset Category</th>
       <th>Asset ID</th>
       <th>Serial No</th>
       <th>Asset Model</th>
       <th>Asset Status</th>
       <th>Allocated User Name</th>
       <th>Allocated User ID</th>
</tr>
</tfoot>

<?php

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

include("dbconfig.php");

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Asset_Category, Asset_ID, Serial_No, Asset_Model, Asset_Status, Allocated_User_Name, Allocated_User_ID FROM Asset_Details WHERE Asset_ID LIKE '%$search_key%' OR Serial_No LIKE '%$search_key%' OR Allocated_User_Name LIKE '%$search_key%' OR Allocated_User_ID LIKE '%$search_key%' OR Asset_Model LIKE '%$search_key%'"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
<br></div>
</center>
