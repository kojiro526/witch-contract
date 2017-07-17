<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Negotiations'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Negotiations'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($negotiation); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Negotiation']) ?></legend>
    <?php
    echo $this->Form->control('person_id', ['options' => $persons]);
    echo $this->Form->control('negotiated_at');
    echo $this->Form->control('body');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
