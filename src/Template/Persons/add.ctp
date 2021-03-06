<?php
/**
  * @var \App\View\AppView $this
  */
$this->prepend('function_title', __('Candidate of magical girl'));
?>
<?php
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Negotiations'), ['controller' => 'Negotiations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Negotiation'), ['controller' => 'Negotiations', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Negotiations'), ['controller' => 'Negotiations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Negotiation'), ['controller' => 'Negotiations', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($person); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Person']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('age');
    echo $this->Form->control('reliability', ['options' => ['A', 'B', 'C', 'D']]);
    echo $this->Form->control('expectation');
    echo $this->Form->control('hope');
    ?>
</fieldset>
<?= $this->Form->button(__("Add"), ['class' => 'btn-primary']); ?>
<?= $this->Form->end() ?>
