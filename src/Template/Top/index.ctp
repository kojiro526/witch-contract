<?php
$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link('魔法少女候補を追加', ['controller' => 'Persons', 'action' => 'add']) ?></li>
    <li><?= $this->Html->link('魔法少女候補一覧', ['controller' => 'Persons' , 'action' => 'index']) ?></li>
    <li><?= $this->Html->link('交渉履歴一覧', ['controller' => 'Negotiations' , 'action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>

<div class="">
<div class="ds-counter-candidates">
<i class=""></i>
<div class="">
</div>
</div>

</div>

<div>index</div>
