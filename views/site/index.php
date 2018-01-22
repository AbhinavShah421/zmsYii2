<?php

/* @var $this yii\web\View */

if(isset($users) && !empty($users))
{
	?>

<?php foreach ($users as $user)
	{	
	?>
	<div class="panel-body col-sm-offset-1 col-sm-4 well" >
	
	

	         
               <div>NAME: <?=$user['fname'].' '.$user['lname']?></div>           
              <div> ZOO NAME: <?=$user['zoo_name']?></div>
              <div>ADDRESS: <?=$user['address']?></div>
          



</div>
	
	<?php 
	}?>


<?php 
}else 
{?>
<?php
}?>
