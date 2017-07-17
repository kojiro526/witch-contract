<?php
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?> </li>
<li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Negotiations'), ['controller' => 'Negotiations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Negotiation'), ['controller' => 'Negotiations', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?> </li>
<li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Negotiations'), ['controller' => 'Negotiations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Negotiation'), ['controller' => 'Negotiations', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($person->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($person->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($person->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Age') ?></td>
            <td><?= $this->Number->format($person->age) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $this->Number->format($person->status) ?></td>
        </tr>
        <tr>
            <td><?= __('Hope') ?></td>
            <td><?= $this->Number->format($person->hope) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($person->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($person->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Negotiations') ?></h3>
    </div>
    <?php if (!empty($person->negotiations)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Person Id') ?></th>
                <th><?= __('Negotiated At') ?></th>
                <th><?= __('Body') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($person->negotiations as $negotiations): ?>
                <tr>
                    <td><?= h($negotiations->id) ?></td>
                    <td><?= h($negotiations->person_id) ?></td>
                    <td><?= h($negotiations->negotiated_at) ?></td>
                    <td><?= h($negotiations->body) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Negotiations', 'action' => 'view', $negotiations->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Negotiations', 'action' => 'edit', $negotiations->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Negotiations', 'action' => 'delete', $negotiations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $negotiations->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Negotiations</p>
    <?php endif; ?>
</div>
