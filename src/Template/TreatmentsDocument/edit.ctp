<?php ?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="roles form large-9 medium-8 columns content">
                        <div class="treatmentsDocument form large-9 medium-8 columns content">
                            <?= $this->Form->create($treatmentsDocument) ?>
                            <fieldset>
                                <legend><?= __('Edit Treatments Document') ?></legend>
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
    </div>
</section>
