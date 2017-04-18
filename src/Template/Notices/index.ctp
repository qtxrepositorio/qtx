<?php ?>

<section class="content-header">

    <legend><?= __('Central de avisos:') ?></legend> 

</section>


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning">
                       <div class="box-body">

                    <div align='right'> <?= $this->Html->link(__('Ver Todos'), ['controller'=>'NoticesUsers','action'=>'index'])?> </div>
                        <legend><?= __('Último(s) aviso(s) recebido(s):') ?></legend>  
                        <table id="example3" class="table table-bordered table-hover">
                            <thead>
                                <tr>                            
                                    <th>Assunto:</th>
                                    <th>Criado em:</th>
                                    <th>Usuário criador:</th>
                                    <th align="center" class="actions"><?= __('Ações:') ?></th>
                                    </tr>
                            </thead>
                        <tbody>
                            <?php foreach ($noticesUsers as $noticesUser): ?>
                                <tr> 
                                    <?php 
                                        if (strlen($noticesUser->notices['subject']) > 45) 
                                        {
                                    ?>        <td><?= h(substr($noticesUser->notices['subject'],0,45).' [...]') ?></td>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>        <td><?= h($noticesUser->notices['subject']) ?></td>     
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            $dateConvertedForTable = explode("-", $noticesUser->notices['created']);
                                            $day = substr($dateConvertedForTable[2],0,2);
                                            $month = $dateConvertedForTable[1];
                                            $year = $dateConvertedForTable[0];
                                            $dateConvertedForTable = strval($day) . '/' . strval($month) . '/' . strval($year);
                                        ?>   
                                        <td><?= h($dateConvertedForTable) ?></td>
                                        <td><?= h($noticesUser->users['name']) ?></td>
                                        <td align="center" class="actions">
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $noticesUser->notices['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-body">
                    <div align='right'> <?= $this->Html->link(__('Ver Todos'), ['controller'=>'NoticesRoles','action'=>'index'])?> </div>
                        <legend><?= __('Último(s) aviso(s) recebido(s)  em grupo:') ?></legend>  

                        <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>                            
                                <th>Assunto:</th>
                                <th>Criado em:</th>
                                <th>Usuário criador:</th>
                                <th align="center" class="actions"><?= __('Ações:') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($noticesRoles as $noticesRole): ?>
                                <tr> 
                                    <?php 
                                        if (strlen($noticesRole['subject']) > 45) 
                                        {
                                    ?>        <td><?= h(substr($noticesRole['subject'],0,45).' [...]') ?></td>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>        <td><?= h($noticesRole['subject']) ?></td>     
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        $dateConvertedForTable = explode("-", $noticesRole['created']);
                                        $day = substr($dateConvertedForTable[2],0,2);
                                        $month = $dateConvertedForTable[1];
                                        $year = $dateConvertedForTable[0];
                                        $dateConvertedForTable = strval($day) . '/' . strval($month) . '/' . strval($year);
                                    ?> 
                                    <td><?= h($dateConvertedForTable) ?></td>
                                    <td><?= h($noticesRole['name']) ?></td>
                                    
                                    <td align="center" class="actions">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $noticesRole['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                    </td>
                                </tr>                        
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                        
                        
                    </div>
                </div>
            </div>


        </div>
    
</section>



<section class="content">    
    
    <div class="box box-info">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                    <div align='right'><?= $this->Html->link(__('Adicionar Aviso'),['controller'=>'Notices','action'=>'add'])?></div>
                        <legend><?= __('Aviso(s) criado(s) por mim:') ?></legend>
                        <div class="box-body" align="center">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('Assunto:') ?></th>
                                        <th><?= $this->Paginator->sort('Conteúdo:') ?></th>
                                        <th><?= $this->Paginator->sort('Criado em:') ?></th>
                                        <th align="center" class="actions"><?= __('Ações:') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notices as $notice): ?>
                                    <tr>

                                        <?php 
                                        if (strlen($notice->subject) > 45) 
                                        {
                                        ?>        <td><?= h(substr($notice->subject,0,45)). ' [...]' ?></td>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>        <td><?= h($notice->subject) ?></td>     
                                        <?php
                                            }
                                        ?>                                        

                                        <?php 
                                        if (strlen($notice->text) > 65) 
                                        {
                                        ?>        <td><?= h(substr($notice->text,0,65)). ' [...]' ?></td>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>        <td><?= h($notice->text) ?></td>     
                                        <?php
                                            }
                                        ?>
                                        
                                        <td><?= h($notice->created) ?></td>
                                        <td align="center" class="actions">
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $notice->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $notice->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $notice->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?',$notice->id))); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                
                </div>
            </div>
        </div>
   
</section> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></link>

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
$this->Html->script(['//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',], ['block' => 'script']);
?> 

<script>
$(document).ready(function(){
    $('#example2').DataTable({      
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
        },"lengthMenu": [ 5, 10, 15 ]
    });
    $('#example1').DataTable({      
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
        },"lengthMenu": [ 5, 10, 15 ]
    });
    $('#example3').DataTable({      
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
        },"lengthMenu": [ 5, 10, 15 ]
    });
});
</script>