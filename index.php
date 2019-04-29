<?php

$name = $_POST["PlayerName"];
$year = $_POST["PlayerYear"];

?>
<?php
	#$name = 'Magic Johnson'
	include 'database.php';
	$query = "SELECT * FROM Players WHERE Name LIKE '" . $name . "%' AND Year='" . $year . "' LIMIT 1";
	$Players = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<title> Compare a Player!</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


</head>
<body>
	<header class="jumbotron">
  <div class="text-center display-4">Compare A Player</div>
  <hr class="my-4">
	<form id="watchform" method="post" action="index.php">

	  <div class="form-group">
	      <label class="col-form-label text md-right col-lg-3 col-md-3 col-sm-6 col-xs-12"  for="name">Insert Player Name</label>
	      <input type="text" value="<?php if(isset($_POST['PlayerName'])){
					echo $_POST["PlayerName"];}?>" class="form-control col-lg-3" id="Name" name="PlayerName" maxlength="30" placeholder="Name Of Player" required>
			</div>
		<div class="form-group">
	      <label class="col-form-label col-lg-3" for="Year">Please Select A Year</label>
	      <select class="form-control col-form-label col-lg-3 col-md-3 col-sm-6 col-xs-12" id="Year" name="PlayerYear" required>
	        <option></option>
					<option>2018-19</option>
	        <option>2017-18</option>
	        <option>2016-17</option>
					<option>2015-16</option>
	        <option>2014-15</option>
					<option>2013-14</option>
					<option>2012-13</option>
					<option>2011-12</option>
					<option>2010-11</option>
					<option>2009-10</option>
					<option>2008-09</option>
					<option>2007-08</option>
					<option>2006-07</option>
					<option>2005-06</option>
					<option>2004-05</option>
					<option>2003-04</option>
					<option>2002-03</option>
					<option>2001-02</option>
					<option>2000-01</option>
					<option>1999-00</option>
					<option>1998-99</option>
					<option>1997-98</option>
					<option>1996-97</option>
					<option>1995-96</option>
					<option>1994-95</option>
					<option>1993-94</option>
					<option>1992-93</option>
					<option>1991-92</option>
					<option>1990-91</option>
					<option>1989-90</option>
					<option>1988-89</option>
					<option>1987-88</option>
					<option>1986-87</option>
					<option>1985-86</option>
					<option>1984-85</option>
					<option>1983-84</option>
					<option>1982-83</option>
					<option>1981-82</option>
					<option>1980-81</option>
					<option>1979-80</option>
					<option>1978-79</option>
					<option>1977-78</option>
					<option>1976-77</option>
					<option>1975-76</option>
					<option>1974-75</option>
					<option>1973-74</option>
					<option>1972-73</option>
					<option>1971-72</option>
					<option>1970-71</option>
	        <option>1969-70</option>
	        <option>1969-70</option>
	        <option>1968-69</option>
	        <option>1967-68</option>
	      </select>
				</div><!-- Form Group Ends -->
				<button type="submit" class="btn btn-primary" id="submit">Submit</button>
				<button type="button" class="btn btn-success" id="results">Show Results</button>
	</form><!-- close the form -->
</header>

<div id="container">


<table id="one" class="table table-sm table-hover table-bordered table-responsive">
	<!-- table column headings -->
	<tr class="table-primary">
		<th>Year</th>
	  <th>Name</th>
	  <th>Position</th>
	  <th>Team</th>
		<th>Points</th>
	  <th>Assists</th>
	  <th>Blocks</th>
    <th>Steals</th>
	  <th>Rebounds</th>
		<th>Field Goal %</th>
		<th>Free Throw %</th>
	  <th>Effective Field Goal %</th>
	  <th>Stats</th>
	</tr>



	<?php while ($row = mysqli_fetch_assoc($Players)) :  ?>
		<tr>
		<?php
		$year = $row['Year'];
		$name = $row['Name'];
		$pos = $row['Position'];
		$team = $row['Team'];
		$points = $row['Points'];
		$assists = $row['Assists'];
		$blocks = $row['Blocks'];
		$steals = $row['Steals'];
		$rebounds = $row['Rebounds'];
		$fgp = $row['fgp'];
		$ftp = $row['ftp'];
		$efg = $row['efg'];
		$url = $row['Url'];
		?>

	<?php echo "<td>" . $year . "</td>"; ?>
	<?php echo "<td>" . $name . "</td>"; ?>
	<?php echo "<td>" . $pos . "</td>"; ?>
	<?php echo "<td>" . $team . "</td>"; ?>
  <?php echo "<td>" . $points . "</td>"; ?>
	<?php echo "<td>" . $assists . "</td>"; ?>
	<?php echo "<td>" . $blocks . "</td>"; ?>
	<?php echo "<td>" . $steals . "</td>"; ?>
	<?php echo "<td>" . $rebounds . "</td>"; ?>
	<?php echo "<td>" . $fgp . "</td>"; ?>
	<?php echo "<td>" . $ftp . "</td>"; ?>
	<?php echo "<td>" . $efg . "</td>"; ?>
	<?php echo "<td><a href=' ". $url ."'>" . $url . "</a></td>"; ?>


</tr>

<?php endwhile;  ?>


<!-- end the PHP while-loop
     everything else on this page is normal HTML -->

</table>


<?php
	#$name = 'Magic Johnson'
	include 'database.php';
	$query2 = "SELECT * FROM Players WHERE Rebounds > ($rebounds - 1.0) && Rebounds < ($rebounds + 1.0) AND fgp > ($fgp - 0.050) && fgp < ($fgp + 0.050) AND
	ftp > ($ftp - 0.050) && ftp < ($ftp + 0.050) AND efg > ($efg - 0.050) && efg < ($efg + 0.050) AND Points > ($points - 2.0 ) && Points < ($points + 2.0) AND Assists > ($assists - 1.0 ) && Assists < ($assists + 1.0) AND
	Blocks > ($blocks - 0.6) && Blocks < ($blocks + 0.6) AND Steals > ($steals - 0.6) && Steals < ($steals + 0.6) LIMIT 5";


	$Players2 = mysqli_query($conn, $query2);
?>
<table id="two" class="table table-sm table-hover table-bordered table-responsive">
	<!-- table column headings -->
	<tr class="table-primary">
		<th>Year</th>
	  <th>Name</th>
	  <th>Position</th>
	  <th>Team</th>
		<th>Points</th>
	  <th>Assists</th>
	  <th>Blocks</th>
    <th>Steals</th>
	  <th>Rebounds</th>
		<th>Field Goal %</th>
		<th>Free Throw %</th>
	  <th>Effective Field Goal %</th>
	  <th>Stats</th>
	</tr>

	<?php while ($row2 = mysqli_fetch_assoc($Players2)) :  ?>
		<?php
		$name2 = $row2['Name'];
		$year2 = $row2['Year'];
		$pos2 = $row2['Position'];
		$team2 = $row2['Team'];
		$points2 = $row2['Points'];
		$assists2 = $row2['Assists'];
		$blocks2 = $row2['Blocks'];
		$steals2 = $row2['Steals'];
		$rebounds2 = $row2['Rebounds'];
		$fgp2 = $row2['fgp'];
		$ftp2 = $row2['ftp'];
		$efg2 = $row2['efg'];
		$url2 = $row2['Url'];
		?>

	<tr>
	<?php echo "<td>" . $year2 . "</td>"; ?>
	<?php echo "<td>" . $name2 . "</td>"; ?>
	<?php echo "<td>" . $pos2 . "</td>"; ?>
	<?php echo "<td>" . $team2 . "</td>"; ?>
  <?php echo "<td>" . $points2 . "</td>"; ?>
	<?php echo "<td>" . $assists2 . "</td>"; ?>
	<?php echo "<td>" . $blocks2 . "</td>"; ?>
	<?php echo "<td>" . $steals2 . "</td>"; ?>
	<?php echo "<td>" . $rebounds2 . "</td>"; ?>
	<?php echo "<td>" . $fgp2 . "</td>"; ?>
	<?php echo "<td>" . $ftp2 . "</td>"; ?>
	<?php echo "<td>" . $efg2 . "</td>"; ?>
	<?php echo "<td><a href='". $url2 ."'>" . $url2 . "</a></td>"; ?>
</tr>

<?php endwhile;  ?>


</table>



</div> <!-- close container -->
<div id='exp' class="container-fluid">
  <div class="row">
<p class="lead">Welcome to Compare A Player, where we try to match a player of your choosing to the 5 closest stat lines in NBA history going back to the 1968-1969 season. The stats we look at are points, assists, steals, blocks, rebounds, field goal percentage, free throw percentage and effective field goal percentage. Insert a name and a year and click Submit then click Show Results to get your five closest stat lines. Enjoy!</p>
</div>
</div>
<footer class="text-center">
Here's the link to my <a href="https://github.com/ctheophin/nba_players" target="https://github.com/ctheophin/nba_players">GitHub!</a></p>
</footer>

</body>
<script src="scripts/jquery.min.js"></script>
<script src="scripts/main.js"></script>
</html>
