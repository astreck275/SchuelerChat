<?php  if (count($fehler) > 0) : ?>
  <div class="fehler">
  	<?php foreach ($fehler as $fehler2) : ?>
  	  <p><?php echo $fehler2 ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>