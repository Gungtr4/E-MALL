<form enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
    	<td><h3>REVIEW</h3></td>
    </tr>
</table>
<?php
$LastID 	= IDOtomatis("review");
	?>
<table align="center" class="customers" border="0">
	<tr>
		<td><input type="hidden" name="id_r" value="<?php echo $LastID;?>" />
        </td>
    </tr>
    <tr>
    	<th>Produk/Jasa</th>
        <td><?php
	$qsk = 'select * from produk';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="id_p" class="form-control">
		 	<option>Produk		:</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode 	= $rsk['id_produk'];
				$kname 	= $rsk['nama_produk'];
				$kgambar= $rsk['gambar'];
				echo'<option value="'.$kcode.'">'.$kname.'</option>';	
				}
			}
			echo "</select>"
			?>
			</td>
    </tr>
    <tr	
	<td><input type="hidden" name="ktp" value="<?php echo $_SESSION['user'] ;?>" />
	</td>
    </tr> 
	<tr>
    	<th>Score</th>
        <td><input type="text" name="score" placeholder="1-100" required="required" /></td>
    </tr>
    <tr>
    	<th>Review</th>
        <td><textarea name="rev" style="min-width: 216px "></textarea></td>
    </tr>
	<tr>
		<td ><input type="submit" class="btn btn-primary" name="submit" value="Save" /></td>
        <td><a href="indexU.php?page=review"><input style="color: black" class="btn btn-primary" type="button" value="Cancel" /></a></td>
    </tr>
<?php
	if(isset($_POST['submit'])){
		$id_p	    = $_POST['id_p'];
		$id_r		= $_POST['id_r'];
		$ktp	    = $_POST['ktp'];
		$desk		= $_POST['rev'];
		$sco		= $_POST['score'];
		
		$sql	     ='insert into review(id_review,no_ktp,id_produk,score,review)value ("'.$id_r.'","'.$ktp.'","'.$id_p.'","'.$sco.'","'.$desk.'")';
		$query 	    =mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
		if($query){
			echo'
			<script>
				alert("You Successfuly Review");
				window.location="indexU.php?page=review";
			</script>';
		}
	}
?>
</table>
</form>