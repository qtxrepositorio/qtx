<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Solutions File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Solutions'), ['controller' => 'CallsSolutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Solution'), ['controller' => 'CallsSolutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solutionsFiles index large-9 medium-8 columns content">
    <h3><?= __('Solutions Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('text') ?></th>
                <th><?= $this->Paginator->sort('archive') ?></th>
                <th><?= $this->Paginator->sort('solution_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solutionsFiles as $solutionsFile): ?>
            <tr>
                <td><?= $this->Number->format($solutionsFile->id) ?></td>
                <td><?= h($solutionsFile->text) ?></td>
                <td><?= h($solutionsFile->archive) ?></td>
                <td><?= $solutionsFile->has('calls_solution') ? $this->Html->link($solutionsFile->calls_solution->title, ['controller' => 'CallsSolutions', 'action' => 'view', $solutionsFile->calls_solution->id]) : '' ?></td>
                <td><?= h($solutionsFile->created) ?></td>
                <td><?= h($solutionsFile->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $solutionsFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $solutionsFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $solutionsFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solutionsFile->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
