<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Datasource\ConnectionManager;

class HumanResourcesController extends AppController
{
	public function index()
    {
    }

    public function Reports()
    {
        $connection = ConnectionManager::get('baseProtheus');
        $listOfEmployees = $connection->execute("SELECT [RA_NOME]
            FROM [SRA010]
            WHERE [RA_DEMISSA] = ''
            ORDER BY [RA_NOME]")
            ->fetchAll('assoc');

        $listOfEmployeesNames;
        foreach ($listOfEmployees as $key)
        {
            # code...
            $listOfEmployeesNames[$key['RA_NOME']] = $key['RA_NOME'];
        }

        $this->set(compact('listOfEmployeesNames'));
        $this->set(['listOfEmployeesNames']);
    }

    public function DebitAuthorizationSheet()
    {
        $officialAuthorizedDebit = null;
        //debug($this->request->data);
        
        $officialAuthorizedDebit = $this->request->data['officialAuthorizedDebit'];
        $feeding = $this->request->data['feeding'];
        $transport = $this->request->data['transport'];
        $lifeInsurance = $this->request->data['lifeInsurance'];
        $healthCare = $this->request->data['healthCare'];
        $dentalCare = $this->request->data['dentalCare'];

        $date = getdate();

        $day = (string) $date['mday'];
        $mont = $date['mon'];
        $year = (string) $date['year'];

        $dateConverted = $day.'/'.$mont.'/'.$year;

        $connection = ConnectionManager::get('baseProtheus');
        $cpfRs = $connection->execute("SELECT [RA_CIC]
            FROM [SRA010]
            WHERE [RA_NOME] = '". $officialAuthorizedDebit ."'")
            ->fetchAll('assoc');

        $cpf;
        foreach ($cpfRs as $key)
        {
            $cpf = $key['RA_CIC'];
        }

        $cpf = substr($cpf, 0,3).'.'.substr($cpf, 3,3).'.'.substr($cpf,6,3).'-'.substr($cpf,9,3);

        $this->set(compact('officialAuthorizedDebit', 'feeding', 'transport', 'lifeInsurance', 'healthCare', 'dentalCare','dateConverted','cpf'));
        $this->set('_serialize', ['officialAuthorizedDebit', 'feeding', 'transport', 'lifeInsurance', 'healthCare', 'dentalCare', 'dateConverted','cpf']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }    

    public function BirthdaysOfTheMonth() 
    {
        $birthdaysOfTheMonthForm = null;
        foreach ($this->request->data as $key) {
            $birthdaysOfTheMonthForm = $key;
        }
        $birthdaysOfTheMonthForm = intval($birthdaysOfTheMonthForm) + 1;
        $birthdaysOfTheMonthForm = (string) $birthdaysOfTheMonthForm;
        $connection = ConnectionManager::get('baseProtheus');
        $birthdaysOfTheMonth = null;
        $birthdaysOfTheMonth = $connection->execute("SELECT [RA_NOME]
			,CONVERT(varchar(10),(DAY([RA_NASC])))+'/'+CONVERT(varchar(10),(MONTH([RA_NASC])))+'/'+CONVERT(varchar(10),YEAR([RA_NASC])) 
			    AS DataDeNascimento
			,[CTT_DESC01]      
			FROM [HOMOLOGACAO].[dbo].[SRA010]
			INNER JOIN [CTT010] ON [CTT_CUSTO] = [RA_CC]
			WHERE MONTH([RA_NASC]) = '$birthdaysOfTheMonthForm'
			AND [RA_SITFOLH] != 'D'
			ORDER BY DAY([RA_NASC]), [RA_NOME]");
        $this->set(compact('birthdaysOfTheMonth', 'birthdaysOfTheMonthForm'));
        $this->set('_serialize', ['birthdaysOfTheMonth', 'birthdaysOfTheMonthForm']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }
}