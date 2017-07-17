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

<div class="clearfix">
<div class="col-md-4">
    <div class="summary-counter-candidates">
        <div class="summary-title"><?= __('Candidates') ?></div>
        <i class=""></i>
        <div class="summary-number">
            <?= $summary->countCandidates(); ?>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="summary-counter-candidates">
        <div class="summary-title"><?= __('Contracted') ?></div>
        <i class=""></i>
        <div class="summary-number">
            <?= $summary->countContracted(); ?>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="summary-counter-candidates">
        <div class="summary-title"><?= __('Witches') ?></div>
        <i class=""></i>
        <div class="summary-number">
            <?= $summary->countWitches(); ?>
        </div>
    </div>
</div>
</div>

<h2><?= __('Recent negotiation process') ?></h2>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Negotiations') ?></h3>
    </div>
    <?php if (!empty($summary->findRecentNegotiations())): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Negotiated At') ?></th>
                <th><?= __('Body') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($summary->findRecentNegotiations() as $negotiations): ?>
                <tr>
                    <td><?= h($negotiations->person->name) ?></td>
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