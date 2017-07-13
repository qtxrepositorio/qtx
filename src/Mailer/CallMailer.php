<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Call mailer.
 */
class CallMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'Call';

    public function newCall($call, $email){

        $this->to($email)
            ->profile('qtx')
            ->emailFormat('html')
           ->template('call')
            ->layout('call/add')
            ->viewVars(['call' => $call])
            ->subject('Novo chamado cadastrado com ID: ' . $call['id'] .'.');

    }

    public function editCall($call, $email){

        //debug($key['email']);
        $this->to($email)
            ->profile('qtx')
            ->emailFormat('html')
            ->template('call')
            ->layout('call/edit')
            ->viewVars(['call' => $call])
            ->subject('O chamado ' . $call['id'] .' foi alterado para: ' . $call['status'] .'.');

    }


    public function deleteCall($call, $email, $deleted_by){

        //debug($key['email']);
        $this->to($email)
            ->profile('qtx')
            ->emailFormat('html')
            ->template('call')
            ->layout('call/delete')
            ->viewVars(['call' => $call, 'deleted_by' => $deleted_by])
            ->subject('O chamado ' . $call['id'] .' foi apagado por: ' . $deleted_by .'.');

    }
}
