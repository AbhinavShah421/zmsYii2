<?php
/* print_r($data);
 die; */
foreach ($data as $user){
	?>
		<option id='<?= $user['id']?>' class='selectedid' value='<?= $user['fname'].' '.$user['lname'] ?>' data-id='<?= $user['id']?>'></option>

<?php
}
?>