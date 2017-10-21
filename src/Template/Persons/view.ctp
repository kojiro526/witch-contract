<?php
$this->prepend('function_title', __('Candidate of magical girl'));
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?> </li>
<li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('New Negotiation'), ['controller' => 'Negotiations', 'action' => 'add']) ?> </li>
<?php if( $person->getStatus()->isCandidate() ) : ?>
<li><?= $this->Form->postLink(__('Sign a contract'), ['controller' => 'Persons', 'action' => 'contract', $person->id]) ?> </li>
<?php endif; ?>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?> </li>
<li><?= $this->Html->link(__('List Persons'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Person'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('New Negotiation'), ['controller' => 'Negotiations', 'action' => 'add']) ?> </li>
<?php if( $person->getStatus()->isCandidate() ) : ?>
<li><?= $this->Form->postLink(__('Sign a contract'), ['controller' => 'Persons', 'action' => 'contract', $person->id]) ?> </li>
<?php endif; ?>
</ul>
<?php
$this->end();
?>
<div class="row">
    <div class="col-sm-6" style="font-size: 24px; margin-bottom: 12px">
        <span class="label label-info"><?= $person->getStatus()->getLabel() ?></span>
    </div>
    <div class="col-sm-offset-2 col-sm-4" style="margin-bottom: 12px">
        <?php if($person->getStatus()->isCandidate()): ?>
        <?= $this->Form->button(__('Register as contractor'), ['class' => 'btn btn-primary', 'style' => 'width: 100%', 'confirm' => __('Are you sure?')]) ?>
        <?php endif; ?>
    </div>
</div>
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
            <td><?= h($person->getStatus()->getLabel()) ?> <?= $this->element('Persons/contracted_at', ['person' => $person]) ?></td>
        </tr>
        <?php if($person->getStatus()->isCandidate()): ?>
        <tr>
            <td><?= __('Reliability') ?></td>
            <td><?= h($person->reliability) ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td><?= __('Expectation') ?></td>
            <td><?= $this->Number->format($person->expectation) ?></td>
        </tr>
        <tr>
            <td><?= __('Hope') ?></td>
            <td><?= $this->Number->format($person->hope) ?></td>
        </tr>
        <?php if(!$person->getStatus()->isCandidate()): ?>
        <tr>
            <td><?= __('Uncleanness') ?></td>
            <td><?= $this->Number->format($person->uncleanness) ?></td>
        </tr>
        <?php endif; ?>
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

<h2><?= __('Related Negotiations') ?></h2>
<?php if (!empty($person->findRecentNegotiations()->count())): ?>
    <?php foreach ($person->findRecentNegotiations(100) as $negotiations): ?>
    <div class="panel panel-default">
        <!-- Panel header -->
        <div class="panel-heading">
            <?= __('Negotiated at') ?>: <?= h($negotiations->negotiated_at) ?>
        </div>
        <div class="panel-body">
            <?= h($negotiations->body) ?>
        </div>
        <div class="panel-footer text-right">
            <div class="actions">
                <?= $this->Html->link('', ['controller' => 'Negotiations', 'action' => 'view', $negotiations->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['controller' => 'Negotiations', 'action' => 'edit', $negotiations->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['controller' => 'Negotiations', 'action' => 'delete', $negotiations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $negotiations->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="panel-body">no Negotiations</p>
<?php endif; ?>
