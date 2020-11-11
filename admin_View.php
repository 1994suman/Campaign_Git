<?php  
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With"); 
?>
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
	<link rel="stylesheet" href="Campain/Campain.css" />

</head>

<body>
	<header>
		<h1><span class="i">C</span><span class="b">a</span><span class="u">m</span><span class="y">p</span><span
				class="i">a</span><span class="i">i</span><span class="i">g</span><span class="u">n</span></h1>

	</header>
	<img src="image/3.jpg" alt="Banner" />
	
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">All Campaign</h2>
                        <a href="index.php" class="btn btn-success pull-right">Logout</a>
                    </div>
                    <?php
                    require_once "Connaction.php";
                    $sql = "SELECT * FROM campaign";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Campain Type</th>";
                                        echo "<th>Campain</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['usersname'] . "</td>";
                                        echo "<td>" . $row['campaign_type'] . "</td>";
                                        echo "<td>" . $row['campaign'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='Accept_campain.php?id=". $row['id'] ."' title='Accept Campaign' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Campaign Delete' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Accept Campaign</h2>
                    </div>
                    <?php
                    $sql = "SELECT * FROM accept_campaign";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";                                   
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Campain Type</th>";
                                        echo "<th>Campain</th>"; 
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['campain_type'] . "</td>";
                                        echo "<td>" . $row['campain'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>

		<footer>
			&copy; Campaign 2020
		</footer>
	</main>

<script type="text/javascript">
function hideShowOptions(option){
	item=document.getElementById("qmult");
	if(option.value!='text' && option.value!='map'){
	 item.style.display = "block";
  } else {
    item.style.display = "none";
  }

}
</script>

</body>

</html>