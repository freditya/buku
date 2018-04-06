<html>
	<head>
		<title>Tampil Buku</title>
	</head>
<body>
<!-- <?php
	echo "<div class=judul><blink><marquee>$title</marquee></blink></div>";
	echo "<br><br>";
	echo "<table border='1'>
			<tr><th>No</th>
			
			<th>judul</th>
			<th>penulis</th>
			</tr>";
			$no=0;
			foreach($coba as $p)
			{
			$no++;
			echo "<tr>
			<td>$no</td>
			<td>$p->kd_buku</td>
			<td></td>
			</tr>";
	}
	echo "</table>";
	?> -->

	<table>
	<tr>
		<th>judul</th>
		<th>penulis</th>
		</tr>
		<tbody>
		<?php for ($i=0; $i <$jmlbuku ; $i++) { ?>
			<tr>
				<td><?php echo $judul[$i] ; ?></td>

			
			
				<td>
					<?php for ($j=0; $j <$jumlBukuDet[$i] ; $j++) {  ?>
				<?php echo $coba[$i][$j]; ?>
				<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>

	</table>
	</body>
	</html>

	<style type="text/css">
	.table
	{
	float:left;
	margin-left:500px;
	}
	.judul
	{
	float:left;
	font-size:30px;
	color:Blue;
	}
	th
	{
	background-color:green;
	font-color:white;
	}
	tr,td,th{
	padding-left:40px;
	padding-top:20px;}
	</style>