<?php  if (count($success) > 0) : ?>
  <div class="error">
  	<?php foreach ($success as $success) : ?>
  	  <?php echo $success ?>
  	  <br>
  	<?php endforeach ?>
  </div>
<?php  endif ?>