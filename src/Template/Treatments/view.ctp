<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="roles form large-9 medium-8 columns content">
                        <legend><?= __('Dados do tratamento') ?></legend>
                        <div class="treatments view large-9 medium-8 columns content">
                            <table class="vertical-table">
                                <tr>
                                    <th><?= __('Id: ') ?></th>
                                    <td><?= $this->Number->format($treatment->id) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Descrição: ') ?></th>
                                    <td><?= h($treatment->description) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Tratamento ativo? ') ?></th>
                                </tr>
                                <tr>
                                    <td><?= $treatment->status ? __(' Sim') : __(' Não'); ?></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
