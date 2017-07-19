<?php ?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="referencesDocument form large-9 medium-8 columns content">
                        <?= $this->Form->create($referencesDocument) ?>
                        <fieldset>
                            <legend><?= __('Edit References Document') ?></legend>
                            <?php
                            echo $this->Form->input('description');
                            echo $this->Form->input('status');
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
