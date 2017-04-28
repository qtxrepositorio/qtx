<?php ?>

<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-body">
                    <div class="callsCategories form large-9 medium-8 columns content">
                        <?= $this->Form->create($callsCategory) ?>
                        <fieldset>
                            <legend><?= __('Adicionar Categoria') ?></legend>
                            <?php
                                echo $this->Form->input('name', ['label'=>'Nome:']);
                                echo $this->Form->input('time', ['label'=>'Tempo para realização: ','empty' => false]);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Cadastrar')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
