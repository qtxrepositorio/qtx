<?php ?>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-body">
                    <div class="calls form large-9 medium-8 columns content">
                        <?= $this->Form->create($call) ?>
                        <fieldset>
                            <legend><?= __('Editar Chamado') ?></legend>
                            <?php
                                echo $this->Form->input('subject', ['label' => 'Assunto:']);
                                echo $this->Form->input('text', ['label' => 'Descrição:', 'type' => 'textarea']);
                                echo $this->Form->input('area_id', ['label' => 'Área:','class' => 'form-control select2', 'options' => $callsAreas]);
                                echo $this->Form->input('category_id', ['label' => 'Categoria:','class' => 'form-control select2', 'options' => $callsCategories]);
                                echo $this->Form->input('subcategory_id', ['label' => 'Sub Categoria:','class' => 'form-control select2', 'options' => $callsSubcategories]);
                                if ($authenticatedUser['id'] == $call['attributed_to']) {
                                    echo $this->Form->input('status_id', ['options' => $callsStatus]);
                                }else{
                                    echo $this->Form->input('status_id', ['disabled' => TRUE, 'options' => $callsStatus]);
                                }
                                echo $this->Form->input('urgency_id', ['label' => 'Urgência:','options' => $callsUrgency]);
                                //echo $this->Form->input('solution_id', ['options' => $callsSolutions]);
                                echo $this->Form->input('created_by', ['label' => 'Criado por:','disabled' => TRUE, 'options' => $callsUsers]);
                                echo $this->Form->input('attributed_to', ['label' => 'Atribuído para:','options' => $callsUsers]);
                                //echo $this->Form->input('visualized');
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Salvar')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

