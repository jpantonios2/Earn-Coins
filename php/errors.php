<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $errors) : ?>
  	  <?php echo $errors ?>
  	  <br>
  	<?php endforeach ?>
  </div>
<?php  endif ?>