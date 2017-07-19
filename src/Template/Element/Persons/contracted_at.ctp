<?php if($person->getStatus()->isContracted()): ?>
(<?= h($person->contracted_at) ?>)
<?php endif; ?>