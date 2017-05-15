<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Solutions File'), ['action' => 'edit', $solutionsFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Solutions File'), ['action' => 'delete', $solutionsFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solutionsFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Solutions Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solutions File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Solutions'), ['controller' => 'CallsSolutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Solution'), ['controller' => 'CallsSolutions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="solutionsFiles view large-9 medium-8 columns content">
    <h3><?= h($solutionsFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Text') ?></th>
            <td><?= h($solutionsFile->text) ?></td>
        </tr>
        <tr>
            <th><?= __('Archive') ?></th>
            <td><?= h($solutionsFile->archive) ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Solution') ?></th>
            <td><?= $solutionsFile->has('calls_solution') ? $this->Html->link($solutionsFile->calls_solution->title, ['controller' => 'CallsSolutions', 'action' => 'view', $solutionsFile->calls_solution->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($solutionsFile->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($solutionsFile->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($solutionsFile->modified) ?></td>
        </tr>
    </table>
</div>
