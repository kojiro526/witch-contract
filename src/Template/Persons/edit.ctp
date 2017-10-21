<?php
/**
  * @var \App\View\AppView $this
  */
$this->prepend('function_title', __('Candidate of magical girl'));
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
<div class="row">
    <div class="col-sm-6" style="font-size: 24px; margin-bottom: 12px">
        <span class="label label-info"><?= $person->getStatus()->getLabel() ?></span>
    </div>
</div>
<fieldset>
    <legend><?= __('Edit {0}', ['Person']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('age');
    echo $this->Form->control('reliability', ['options' => ['A', 'B', 'C', 'D'], 'disabled' => !($person->getStatus()->isCandidate())]);
    echo $this->Form->control('expectation');
    echo $this->Form->control('hope');
    if($person->getStatus()->isContracted())
    {
        echo $this->Form->control('uncleanness');
    }
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class' => 'btn-primary']); ?>
<?= $this->Form->end() ?>
