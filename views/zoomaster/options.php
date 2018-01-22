<?php
/* print_r($data);
die; */
	foreach ($data as $zoo){
		?>
		<option id='<?= $zoo['id']?>' class='selectedid' value='<?= $zoo['zoo_name'] ?>' data-id='<?= $zoo['id']?>'></option>

<?php
}
?>