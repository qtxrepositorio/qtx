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

        $connection = ConnectionManager::get('baseProtheus');

        $peopleQquantityByLines = $connection->execute("SELECT 
            COUNT([RA_MAT]) as COUNT_PEOPLE_BY_GROUPS
            , [RA_XLINHA] as RA_XLINHA
            FROM [HOMOLOGACAO].[DBO].[SRA010]
            GROUP BY [RA_XLINHA]")
            ->fetchAll('assoc');

        $this->set(compact('peopleQquantityByLines'));
        $this->set('_serialize', ['peopleQquantityByLines']);

    }

    public function AdressesPool()
    {
        $lines = $this->request->data['line']; 
        $locales = $this->request->data['locale']; 
        $status = $this->request->data['status']; 

        $connection = ConnectionManager::get('baseProtheus');

        foreach ($lines as $keyLine) 
        {
            foreach ($locales as $keyLocale) 
            {
                foreach ($status as $keyStatus) 
                {
                    $adressesPoolRs[] = $connection->execute("SELECT 
                         [RA_MAT]
                        ,[RA_NOME]
                        ,[RA_BAIRRO]
                        ,[RA_MUNICIP]
                        ,[RA_ESTADO]
                        ,[RA_XLINHA]
                        ,[RA_XPTAPAN]
                        ,[RA_XLOCAL]
                        ,[RA_XSTATUS]
                        FROM [SRA010]
                        WHERE [RA_XLINHA] = $keyLine AND [RA_XLOCAL] = '".$keyLocale."' AND [RA_XSTATUS] = '".$keyStatus."'")
                        ->fetchAll('assoc');
                }
            }
                
        }

        $this->set(compact('adressesPoolRs'));
        $this->set('_serialize', ['adressesPoolRs']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');

    }

    public function ComponentsForTimeAndUnion()
    {
        $union = $this->request->data['unionName']; 

        $connection = ConnectionManager::get('baseProtheus');

        foreach ($union as $key) {
            # code...
            if($key == 'TODOS')
            {
                $unionsRs[] = $connection->execute("SELECT 
                     [RA_MAT]
                    ,[RA_NOME]
                    ,[RA_ADMISSA]
                    ,[RCE_DESCRI]
                    ,DATEDIFF(MONTH, [RA_ADMISSA], GETDATE()) as [QUANT_MONTHS]
                    FROM [SRA010]
                    INNER JOIN [RCE010] ON [RCE_CODIGO] = [RA_SINDICA]
                    WHERE [RA_DEMISSA] = ''
                    ORDER BY [RCE_DESCRI], [QUANT_MONTHS] DESC")
                    ->fetchAll('assoc');
            }
            else
            {
                $unionsRs[] = $connection->execute("SELECT 
                     [RA_MAT]
                    ,[RA_NOME]
                    ,[RA_ADMISSA]
                    ,[RCE_DESCRI]
                    ,DATEDIFF(MONTH, [RA_ADMISSA], GETDATE()) as [QUANT_MONTHS]
                    FROM [SRA010]
                    INNER JOIN [RCE010] ON [RCE_CODIGO] = [RA_SINDICA]
                    WHERE [RA_DEMISSA] = '' AND [RCE_DESCRI] = '$key'
                    ORDER BY [RCE_DESCRI], [QUANT_MONTHS] DESC")
                    ->fetchAll('assoc');
            }
        }  

        $this->set(compact('unionsRs'));
        $this->set('_serialize', ['unionsRs']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }    

    public function TimeCardDepartament()
    {

        $timecardDepartament = $this->request->data['timecardDepartament'];        
        $timelunch = $this->request->data['timelunch'];
        $month = $this->request->data['month'];
        $year = $this->request->data['year'];

        $connection = ConnectionManager::get('baseProtheus');       

        foreach ($timecardDepartament as $key) {
            # code...
            if($key == 'TODOS')
            {
                $timecardDepartamentRs[] = $connection->execute("SELECT 
                    [RA_MAT]
                    ,[RA_NOME]
                    ,[Q3_DESCSUM]
                    ,[QB_DESCRIC]
                FROM [SRA010]
                INNER JOIN [SQB010] ON [RA_DEPTO] = [QB_DEPTO]
                INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]")
                ->fetchAll('assoc');
            }
            else
            {
                $timecardDepartamentRs[] = $connection->execute("SELECT 
                    [RA_MAT]
                    ,[RA_NOME]
                    ,[Q3_DESCSUM]
                    ,[QB_DESCRIC]
                FROM [SRA010]
                INNER JOIN [SQB010] ON [RA_DEPTO] = [QB_DEPTO]
                INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]
                WHERE [Q3_DESCSUM] = '". $key ."'")
                ->fetchAll('assoc');  
            }
        }        

        $this->set(compact('timecardDepartamentRs','timecardEmployee','timelunch','month','year'));
        $this->set('_serialize', ['timecardEmployeeRs','timecardEmployee','timelunch','month','year']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }

    public function TimeCardEmployee()
    {
        $timecardEmployee = $this->request->data['timecardEmployee'];        
        $timelunch = $this->request->data['timelunch'];
        $month = $this->request->data['month'];
        $year = $this->request->data['year'];

        $connection = ConnectionManager::get('baseProtheus');

        foreach ($timecardEmployee as $key) {
            # code...
            if($key == 'TODOS')
            {
                $timecardEmployeeRs[] = $connection->execute("SELECT 
                    [RA_MAT]
                    ,[RA_NOME]
                    ,[Q3_DESCSUM]
                FROM [SRA010]
                INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]")
                ->fetchAll('assoc');
            }
            else
            {
                $timecardEmployeeRs[] = $connection->execute("SELECT 
                    [RA_MAT]
                    ,[RA_NOME]
                    ,[Q3_DESCSUM]
                FROM [SRA010]
                INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]
                WHERE [RA_NOME] = '". $key ."'")
                ->fetchAll('assoc');  
            }
        }
        
        $this->set(compact('timecardEmployeeRs','timecardEmployee','timelunch','month','year'));
        $this->set('_serialize', ['timecardEmployeeRs','timecardEmployee','timelunch','month','year']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
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
        }
        $this->set(compact('registry','name'));
        $this->set('_serialize', ['registry','name']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
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

    public function SignatureCtps()
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
        
        for ($i=1; $i < 16; $i++) { 
            # code...
            $lines[$i] = $i; 
        }

       
        $locales['POLO'] = 'POLO';
        $locales['UCS'] = 'UCS';

        
        $status['ATIVO'] = 'ATIVO';
        $status['INATIVO'] = 'INATIVO';
        
        $connection = ConnectionManager::get('baseProtheus');

        $listUnions = $connection->execute("SELECT 
            [RCE_DESCRI]
            FROM [RCE010] 
            ")
            ->fetchAll('assoc');

        $listOfUnionsNames['TODOS'] = 'TODOS'; 
        foreach ($listUnions as $key) {
            # code...
            $listOfUnionsNames[$key['RCE_DESCRI']] = $key['RCE_DESCRI'];
        }

        $listOfEmployees = $connection->execute("SELECT [RA_NOME]
            FROM [SRA010]
            WHERE [RA_DEMISSA] = ''
            ORDER BY [RA_NOME]")
            ->fetchAll('assoc');

        $listOfEmployeesNames['TODOS'] = 'TODOS';
        foreach ($listOfEmployees as $key)
        {
            # code...
            $listOfEmployeesNames[$key['RA_NOME']] = $key['RA_NOME'];
        }

        $listOfDepartaments = $connection->execute("SELECT 
                [QB_DESCRIC]
            FROM [SQB010]")
            ->fetchAll('assoc');

        $listOfDepartamentsNames['TODOS'] = 'TODOS';

        foreach ($listOfDepartaments as $key)
        {
            # code...
            $listOfDepartamentsNames[$key['QB_DESCRIC']] = $key['QB_DESCRIC'];
        }

        $this->set(compact('listOfEmployeesNames','listOfDepartamentsNames','listOfUnionsNames','lines','locales','status'));
        $this->set(['listOfEmployeesNames','listOfDepartamentsNames','listOfUnionsNames','lines','locales','status']);
    }

}