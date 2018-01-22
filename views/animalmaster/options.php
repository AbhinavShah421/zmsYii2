<?php
/* print_r($data);
die; */
	foreach ($data as $animal){
		?>
		<option id='<?= $animal['id']?>' class='selectedid' value='<?= $animal['name'] ?>' data-id='<?= $animal['id']?>'></option>

<?php
}
?>