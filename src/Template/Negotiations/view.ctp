<?php
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Negotiation'), ['action' => 'edit', $negotiation->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Negotiation'), ['action' => 'delete', $negotiation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $negotiation->id)]) ?> </li>
<li><?= $this->Html->link(__('List Negotiations'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Negotiation'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Negotiation'), ['action' => 'edit', $negotiation->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Negotiation'), ['action' => 'delete', $negotiation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $negotiation->id)]) ?> </li>
<li><?= $this->Html->link(__('List Negotiations'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Negotiation'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($negotiation->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Person') ?></td>
            <td><?= $negotiation->has('person') ? $this->Html->link($negotiation->person->name, ['controller' => 'Persons', 'action' => 'view', $negotiation->person->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($negotiation->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Negotiated At') ?></td>
            <td><?= h($negotiation->negotiated_at) ?></td>
        </tr>
        <tr>
            <td><?= __('Body') ?></td>
            <td><?= $this->Text->autoParagraph(h($negotiation->body)); ?></td>
        </tr>
    </table>
</div>

