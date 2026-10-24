<?php
	include("config/connection.php");
	$editmode=false;
	if(isset($_REQUEST['c_id']))
	{
		$query="select * from category where c_id=".$_REQUEST['c_id'];
		$result=mysql_query($query,$con);
		$row=mysql_fetch_array($result);
		$editmode=true;
	}
?>
<div>
	<form>
		<?php
			if(isset($_REQUEST['c_id']))
			{
				echo "<input type='hidden' name='c_id' value=$_REQUEST[c_id]>";
			}
		?>
		<center>
			<font size="8">Category</font>
			<table align="center" border="7">
				<tr>
					<td>Name</td>
					<td><input type="text" name="c_name" value=<?php if($editmode==true){echo$row['c_name'];}?>>
					</td>
					<?php
						if($editmode==true)
						{
							echo $row['c_name'];
						}
					?>
				</tr>
				<tr>
					<td colspan="5" align="center">
					<?php
						if(isset($_REQUEST['c_id']))
						{
							echo "<input type='Submit' name='change' value='Update' class='button'>";
						}
						else
						{
							echo "<input type='Submit' name='change' value='Add' class='button'>";
						}
					?>
					<input type='Reset' name='Clear' value='Cancle' class='button'></td>
				</tr>
			</table>
		</center>
	</form>
</div>