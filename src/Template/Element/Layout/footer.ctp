<?php
use Cake\Core\Configure;
?>
<footer>
<?php echo printf('&copy;%s %s', date('Y'), Configure::read('App.title')); ?>
</footer>