<?php  if (count($errorSignup) > 0) : ?>
  <div class="error">
  	<?php foreach ($errorSignup as $errorSignup) : ?>
  	  <?php echo $errorSignup ?>
  	  <br>
  	<?php endforeach ?>
  </div>
<?php  endif ?>