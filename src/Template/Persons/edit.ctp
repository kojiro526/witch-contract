<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $person->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Negotiations'), ['controller' => 'Negotiations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Negotiation'), ['controller' => 'Negotiations', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $person->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Negotiations'), ['controller' => 'Negotiations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Negotiation'), ['controller' => 'Negotiations', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($person); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Person']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('age');
    echo $this->Form->control('status');
    echo $this->Form->control('hope');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
