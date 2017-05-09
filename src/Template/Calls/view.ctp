<?php  $x = 0; ?>
<section class="content">

    <div class="row">

        <div class="col-md-5" align="center">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre o chamado:</b></h3>
                </div>
                <div class="box-body">

                    <p><b>Id do Chamado: </b><?= $this->Number->format($call->id) ?></p> 
                    <p><b>Assunto: </b><?= h($call->subject) ?></p> 
                    <p><b>Descrição: </b><?= h($call->text) ?></p>
                    <p><b>Urgência: </b><?= h($call->urgency) ?></p>
                    <p><b>Categoria: </b><?= h($call->category) ?></p>
                    <p><b>Tempo para realização (HH:MM): </b><?= h($call->category_time) ?></p>
                    <p><b>Status: </b><?= h($call->status) ?></p>
                    <p><b>Atribuído para: </b><?= h($call->user->name) ?></p>
                    <p><b>Criado por: </b><?= h($call->created_by) ?></p>
                    <p><b>Criado em: </b><?= h($call->created) ?></p>
                    <p><b>Modificado em: </b><?= h($call->modified) ?></p>
                    <p><b>Vizualidado pelo técnico: </b><?= $call->visualized ? __('Sim') : __('Não'); ?></p>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $call->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $call->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $call->id))); ?>

                </div>
            </div>
        </div>

        <div class="col-md-7">

            <div class="col-md-12">
                <!-- DIRECT CHAT PRIMARY -->
                <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Acompanhamento do chamado:</h3>

                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div id="id" class="direct-chat-messages">

                            <?php foreach ($call['calls_responses'] as $key => $value): ?>

                                <?php if ($value['created_by'] == $call['authenticatedUser']['name']): ?>

                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">
                                                <?php echo $value['created_by']; ?>
                                            </span>
                                            <span class="direct-chat-timestamp pull-left">
                                                <?php echo $value['created']; ?>
                                            </span>   
                                        </div>
                                        <?php //echo $this->Html->image('user3-128x128.jpg', ['alt' => 'Message User Image', 'class' => 'direct-chat-img']);  ?>
                                        <div class="direct-chat-text">
                                            <?php echo $value['text']; ?></span>
                                        </div>
                                    </div>

                                <?php else: ?>

                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left">
                                                <?php echo $value['created_by']; ?></span>
                                            <span class="direct-chat-timestamp pull-right">
                                                <?php echo $value['created']; ?>
                                            </span>
                                        </div>
                                        <?php //echo $this->Html->image('user1-128x128.jpg', ['alt' => 'Message User Image', 'class' => 'direct-chat-img']);  ?>
                                        <div class="direct-chat-text">
                                            <?php echo $value['text']; ?></span>
                                        </div>
                                    </div>

                                <?php endif ?>                          

                            <?php endforeach ?>

                        </div>
                        <!--/.direct-chat-messages-->

                        <!-- /.direct-chat-pane -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <?php
                        $x = null;
                        echo $this->Form->create($x, ['url' => ['controller' => 'CallsResponses', 'action' => 'add-chat']]);
                        ?>
                        <div class="input-group">
                            <input type="text" name="text" placeholder="Escreva uma mensagem ..." class="form-control">

                            <?php
                            echo $this->Form->input('call_id', ['type' => 'hidden', 'default' => $call['id']]);
                            echo $this->Form->input('created_by', ['type' => 'hidden', 'default' => $call['authenticatedUser']['id']]);
                            echo $this->Form->input('visualized', ['type' => 'hidden', 'default' => 0]);
                            ?>

                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-flat">Enviar</button>
                            </span>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
            <!-- /.col -->

        </div>

    </div>


</section>

<section class="content">

    <div class="col-md-12" align="">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><b>Imagens do chamado: </b></h3>
            </div>
            <div class="box-body">
            <div align="right">
                <a id="modal-01" href="#modal-container-01" role="submit" class="btn btn-success" data-toggle="modal">Adicionar arquivo</a>
            </div>
            <div class="box-body">   

                <table id="example" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Arquivo</th>
                        <th>Descrição</th>
                        <th class="actions">Ações</th>
                    </thead>
                    <tbody>
                        <?php foreach ($call['files'] as $key): ?>
                            <tr>
                                <td><?= $this->Number->format($key['id']) ?></td>
                                <td><?php echo $key['files']; ?></td>
                                <td><?php echo $key['text'] ?></td>

                                <td align="center" class="actions">

                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-download-alt"></i>'), array('controller'=>'callsFiles','action' => 'download', $key['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Baixar')); ?>

                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller'=>'callsFiles','action' => 'edit', $key['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller'=>'callsFiles','action' => 'delete', $key['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $key['id']))); ?>

                                </td>
                            </tr>
                            
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div></div>
        </div>

    </div>

</section>

<section class="content"></section>
<br><br><br>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="modal-container-01" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">                           
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Informe os dados solicitados:
                            </h4>
                        </div>
                        <div class="modal-body">                            

                            <?= $this->Form->create($x, ['type' => 'file','url' => ['controller' => 'CallsFiles', 'action' => 'add']]) ?> 
                                <fieldset>
                                    <?php
                                        echo $this->Form->input('text', ['label'=>'Descrição:']);
                                        echo $this->Form->file('files');
                                        echo $this->Form->input('call_id', ['type'=>'hidden','default' => $call->id]);
                                    ?>
                                </fieldset>
                            
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <?= $this->Form->button(__('Salvar')) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>



<script type="text/javascript">

    var div = document.getElementById("id");
    div.scrollTop = div.scrollHeight - div.clientHeight;

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></link>

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
$this->Html->script(['//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',], ['block' => 'script']);
?> 

<script>
    $(document).ready(function () {

        $('#example').DataTable({
            "order": [[ 0, "desc" ]],
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(Filtrado de _MAX_ total registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior"
                }
            }, "lengthMenu": [5, 15, 25]
        });

    });
</script>
