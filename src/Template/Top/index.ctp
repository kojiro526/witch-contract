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

