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

<center>

<div class="w3-container w3-light-grey w3-border" style="width:95%">
<br>
<form action="scrap-it.php" method=post>
<table id="example" class="display" cellspacing="0" width="98%">
 <thead>
     <tr>
      <th>Select</th>
      <th>Asset ID</th>
      <th>Asset Category</th>
      <th>Office</th>
      <th>Asset Make</th>
      <th>Asset Model</th>
      <th>Serial No</th>
      <th>Asset Status</th>
      <th>PO No</th>
      <th>Purchase Date</th>
      <th>Purchase Vendor</th>
      <th>Warranty Start Date</th>
      <th>Warranty End Date</th>
     </tr>
</thead>
<tfoot>
     <tr>
      <th>Select</th>
      <th>Asset ID</th>
      <th>Asset Category</th>
      <th>Office</th>
      <th>Asset Make</th>
      <th>Asset Model</th>
      <th>Serial No</th>
      <th>Asset Status</th>
      <th>PO No</th>
      <th>Purchase Date</th>
      <th>Purchase Vendor</th>
      <th>Warranty Start Date</th>
      <th>Warranty End Date</th>     
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
    echo "<tr><td><input type=checkbox name=check_list[] value=" . parent::current(). "> </td>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

include("dbconfig.php");

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Asset_ID, Asset_Category, Office, Asset_Make, Asset_Model, Serial_No, Asset_Status, PO_No,Purchase_Date,Purchase_Vendor,Warranty_Start_Date,Warranty_End_Date FROM Asset_Details WHERE Asset_Status='allocated'"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) 
	{ 
	echo $v;
    	}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
<br><br><br>	<button type="submit" >Make Selected Assets as Scrap</button>
</div>
</form>
</body>
</html>
