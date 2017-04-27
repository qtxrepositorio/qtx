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

    public function newCall($call){

        $this->loadModel('Users');

        $emails = $this->Users->find()
            ->where(['id' => $call['created_by']])
            ->orWhere(['id' => $call['attributed_to']])
            ->andWhere(['email' => 'is not null']);

        foreach ($emails as $key) {
            //debug($key['email']);
            $this->to($key['email'])
                ->profile('qtx')
                ->emailFormat('html')
                ->template('call/add')
                ->layout('call')
                ->viewVars()
                ->subject('Novo chamado cadastraddo com ID: ' . $call['id']);
        }
    }

    public function editCall($call){

        $this->to('desenvolvimento@qualitex.com.br')
            ->profile('qtx')
            ->emailFormat('html')
            ->template('call/edit')
            ->layout('call')
            ->viewVars()
            ->subject('Tô passando');
    }
}
