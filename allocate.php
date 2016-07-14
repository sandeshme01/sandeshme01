<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

<?php include("session.php");?>

<?php
include("header.php");
?>

<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.js">
</script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js">
</script>
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
<h3>Scrap Report Detailed View</h3>

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
     </tr>
</thead>
<tfoot>
     <tr>
       <th>Asset Category</th>
       <th>Asset ID</th>
       <th>Serial No</th>
       <th>Asset Model</th>
       <th>Asset Status</th>
</tr>
</tfoot>


<?php
//dbconnection file included
include("dbconfig.php");

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM scrap_list");
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


$conn = null;

?>



</center>
</body>
</html>

