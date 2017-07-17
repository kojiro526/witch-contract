<?php
/* @var $this \Cake\View\View */
$this->prepend('function_title', __('Negotiation proccess'));
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Negotiation'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Persons'), ['controller' => 'Persons', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Person'), ['controller' => 'Persons', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('person_id'); ?></th>
            <th><?= $this->Paginator->sort('negotiated_at'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($negotiations as $negotiation): ?>
        <tr>
            <td><?= $this->Number->format($negotiation->id) ?></td>
            <td>
                <?= $negotiation->has('person') ? $this->Html->link($negotiation->person->name, ['controller' => 'Persons', 'action' => 'view', $negotiation->person->id]) : '' ?>
            </td>
            <td><?= h($negotiation->negotiated_at) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $negotiation->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $negotiation->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $negotiation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $negotiation->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
