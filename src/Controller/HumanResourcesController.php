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

    public function FolderIdentification()
    {
        $folderIdentification = $this->request->data['folderIdentification'];
        $connection = ConnectionManager::get('baseProtheus');
        $folderIdentificationEmployee = $connection->execute("SELECT
                [RA_MAT]
                ,[RA_NOME]
            FROM [SRA010]
            WHERE [RA_NOME] = '". $folderIdentification ."'")
            ->fetchAll('assoc');

        foreach ($folderIdentificationEmployee as $key)
        {
            $registry = $key['RA_MAT'];
            $name = $key['RA_NOME'];

            $this->set(compact('registry','name'));
            $this->set('_serialize', ['registry','name']);
            $this->viewBuilder()->layout('ajax');
            $this->response->type('pdf');
            
        }
    }

    public function AutographCard()
    {
        $autographCard = $this->request->data['autographCard'];

        $connection = ConnectionManager::get('baseProtheus');
        $signatureCTPSEmployee = $connection->execute("SELECT 
                [RA_MAT]
                ,[RA_NOME]
                ,[Q3_DESCSUM]
                ,[QB_DESCRIC]
            FROM [SRA010]
            INNER JOIN [SQB010] ON [RA_DEPTO] = [QB_DEPTO]
            INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]
            WHERE [RA_NOME] = '". $autographCard ."'")
            ->fetchAll('assoc');

        foreach ($signatureCTPSEmployee as $key)
        {
           $registry = $key['RA_MAT'];
           $name = $key['RA_NOME'];
           $role = $key['Q3_DESCSUM'];
           $department = $key['QB_DESCRIC'];
        }

        $this->set(compact('registry','name','department','role'));
        $this->set('_serialize', ['registry','name','department','role']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }    

    public function SignatureCTPS()
    {
        $signatureCTPS = $this->request->data['signatureCTPS'];

        $connection = ConnectionManager::get('baseProtheus');
        $signatureCTPSEmployee = $connection->execute("SELECT [RA_MAT]
                ,[RA_NOME]      
                ,[RA_ADMISSA]    
                ,[RJ_DESC]
            FROM [HOMOLOGACAO].[dbo].[SRA010]
            INNER JOIN [HOMOLOGACAO].[dbo].[SRJ010] ON [RJ_FUNCAO] = [RA_CARGO]
            WHERE [RA_NOME] = '". $signatureCTPS ."'")
            ->fetchAll('assoc');

        foreach ($signatureCTPSEmployee as $key)
        {
           $registry = $key['RA_MAT'];
           $name = $key['RA_NOME'];
           $admissionDate = $key['RA_ADMISSA'];
           $role = $key['RJ_DESC'];
        }

        $this->set(compact('registry','name','admissionDate','role'));
        $this->set('_serialize', ['registry','name','admissionDate','role']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }

    public function DeclarationOfConfidentiality(){

        $officialconfidential = $this->request->data['officialconfidential'];
        $date = getdate();
        $day = (string) $date['mday'];
        $mont = $date['mon'];
        $year = (string) $date['year'];
        $dateConverted = $day.'/'.$mont.'/'.$year;

        $connection = ConnectionManager::get('baseProtheus');
        $cpfRs = $connection->execute("SELECT [RA_CIC]
            FROM [SRA010]
            WHERE [RA_NOME] = '". $officialconfidential ."'")
            ->fetchAll('assoc');

        $cpf;
        foreach ($cpfRs as $key)
        {
            $cpf = $key['RA_CIC'];
        }

        $cpf = substr($cpf, 0,3).'.'.substr($cpf, 3,3).'.'.substr($cpf,6,3).'-'.substr($cpf,9,3);

        $this->set(compact('officialconfidential', 'dateConverted','cpf'));
        $this->set('_serialize', ['officialconfidential', 'dateConverted','cpf']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');

    }    

    public function DebitAuthorizationSheet()
    {
        $officialAuthorizedDebit = null;
                
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

}