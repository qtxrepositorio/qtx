<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Datasource\ConnectionManager;

class HumanResourcesController extends AppController
{
	public function paycheck(){}

	public function paycheckIntervalPdf()
	{

		$vias = $this->request->data['vias'];
		$data_ini = substr($this->request->data['date_ini'],3,4) . substr($this->request->data['date_ini'],0,2);
		$data_fin = substr($this->request->data['date_fin'],3,4) . substr($this->request->data['date_fin'],0,2);

		$authenticatedUserCpf = $this->Auth->user('cpf');

		$connection = ConnectionManager::get('baseProtheus');

		$employer = $connection->execute("
				SELECT RA_MAT, RA_NOME, RA_ADMISSA, RA_FILIAL
					, RA_SALARIO, RA_CC, I3_DESC
					, RJ_CODCBO
					, RA_CODFUNC, RJ_DESC
				FROM SRA010
				INNER JOIN [SRJ010] ON [RJ_FUNCAO] = [RA_CODFUNC]
				INNER JOIN [SI3010] ON [I3_CUSTO] = [RA_CC]
			    WHERE [RJ_CODCBO] != '' AND [SRJ010].D_E_L_E_T_ = '' AND RA_CIC like '%".$authenticatedUserCpf."%'")
            ->fetchAll('assoc');

		$paychecksYearly = $connection->execute("
			select RD_MAT, RD_PD, RD_HORAS, RV_DESC, RV_TIPOCOD, RD_TIPO1, RD_VALOR, RD_DATARQ, RD_DATPGT, RD_TIPO2
				from SRD010
                INNER JOIN SRV010 ON RD_PD = RV_COD
				where RD_DATARQ between '".$data_ini."' and '".$data_fin."'
					and RD_MAT = '".$employer[0]['RA_MAT']."'
					and SRD010.D_E_L_E_T_ != '*'
                    and SRV010.D_E_L_E_T_ != '*'
					and RV_TIPOCOD != '3'
				group by RD_DATARQ,RD_MAT, RD_PD, RD_HORAS, RV_DESC, RV_TIPOCOD, RD_TIPO1, RD_VALOR, RD_DATPGT, RD_TIPO2
			")
            ->fetchAll('assoc');

		$paychecksYearlyVerbasBase = $connection->execute("
			select RD_MAT, RD_PD, RD_HORAS, RV_DESC, RV_TIPOCOD, RD_TIPO1, RD_VALOR, RD_DATARQ, RD_DATPGT, RD_TIPO2
				from SRD010
				INNER JOIN SRV010 ON RD_PD = RV_COD
				where RD_DATARQ between '".$data_ini."' and '".$data_fin."'
					and RD_MAT = '".$employer[0]['RA_MAT']."'
					and SRD010.D_E_L_E_T_ != '*'
					and SRV010.D_E_L_E_T_ != '*'
					and RV_TIPOCOD = '3'
				group by RD_DATARQ,RD_MAT, RD_PD, RD_HORAS, RV_DESC, RV_TIPOCOD, RD_TIPO1, RD_VALOR, RD_DATPGT, RD_TIPO2
			")->fetchAll('assoc');

		$paychecksMonthly = $connection->execute("
			select RC_MAT, RC_PD, RC_HORAS, RV_DESC, RV_TIPOCOD, RC_TIPO1, RC_VALOR, SUBSTRING(RC_DATA,0,7) as RC_DATA, RC_TIPO2
				from SRC010
				INNER JOIN SRV010 ON RC_PD = RV_COD
				where SUBSTRING(RC_DATA,0,7) between '".$data_ini."' and '".$data_fin."'
						and RC_MAT = '".$employer[0]['RA_MAT']."'
						and SRC010.D_E_L_E_T_ != '*'
	                    and SRV010.D_E_L_E_T_ != '*'
						and RV_TIPOCOD != '3'
				group by RC_DATA,RC_MAT, RC_PD, RC_HORAS, RV_DESC, RV_TIPOCOD, RC_TIPO1, RC_VALOR, RC_TIPO2
			")
	    	->fetchAll('assoc');

		$paychecksMonthlyVerbasBase = $connection->execute("
			select RC_MAT, RC_PD, RC_HORAS, RV_DESC, RV_TIPOCOD, RC_TIPO1, RC_VALOR, SUBSTRING(RC_DATA,0,7) as RC_DATA, RC_TIPO2
				from SRC010
				INNER JOIN SRV010 ON RC_PD = RV_COD
				where SUBSTRING(RC_DATA,0,7) between '".$data_ini."' and '".$data_fin."'
						and RC_MAT = '".$employer[0]['RA_MAT']."'
						and SRC010.D_E_L_E_T_ != '*'
						and SRV010.D_E_L_E_T_ != '*'
						and RV_TIPOCOD = '3'
				group by RC_DATA,RC_MAT, RC_PD, RC_HORAS, RV_DESC, RV_TIPOCOD, RC_TIPO1, RC_VALOR, RC_TIPO2
				")->fetchAll('assoc');

		$months = [];
		foreach ($paychecksYearly as $key => $value) {
			if (!in_array($value['RD_DATARQ'], $months)) {
				$months[$value['RD_DATARQ']] = $value['RD_DATARQ'];
			}
		}

		$this->set(compact('paychecksYearly', 'paychecksMonthly', 'employer','months','vias','paychecksYearlyVerbasBase', 'paychecksMonthlyVerbasBase'));
     	$this->set('_serialize', ['paychecksYearly', 'paychecksMonthly','employer','months','vias','paychecksYearlyVerbasBase', 'paychecksMonthlyVerbasBase']);
	    $this->viewBuilder()->layout('ajax');
	    $this->response->type('pdf');

	}

	public function index()
    {
        $connection = ConnectionManager::get('baseProtheus');

        $peopleQquantityByLines = $connection->execute("SELECT
                COUNT([RA_MAT]) as COUNT_PEOPLE_BY_GROUPS
                , [RA_XLINHA] as RA_XLINHA
            FROM [SRA010]
                WHERE [RA_DEMISSA] = '' AND [SRA010].D_E_L_E_T_ = ''
                GROUP BY [RA_XLINHA]")
            ->fetchAll('assoc');

        $employeesBySexAndCC = $connection->execute("SELECT
                COUNT([RA_MAT]) as COUNT_RA_MAT
                ,[CTT_DESC01]
                ,[RA_SEXO]
            FROM [SRA010]
                INNER JOIN [CTT010] ON [CTT_CUSTO] = [RA_CC]
                WHERE [RA_DEMISSA] = '' AND [SRA010].D_E_L_E_T_ = ''
                GROUP BY [RA_SEXO],[CTT_DESC01] ")
            ->fetchAll('assoc');

        $this->set(compact('peopleQquantityByLines','employeesBySexAndCC'));
        $this->set('_serialize', ['peopleQquantityByLines','employeesBySexAndCC']);
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
            if($key == 'TODOS')
            {
                $timecardDepartamentRs[] = $connection->execute("SELECT
                        [RA_MAT]
                        ,[RA_NOME]
                        ,[Q3_DESCSUM]
                        ,[QB_DESCRIC]
                        ,[RA_CC]
                    FROM [SRA010]
                        INNER JOIN [SQB010] ON [RA_DEPTO] = [QB_DEPTO]
                        INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]
                        WHERE [RA_DEMISSA] = '' AND [RA_CATFUNC] != 'E'
                        AND [SRA010].D_E_L_E_T_ = ''
                        AND [SQ3010].[D_E_L_E_T_] = ''
                        AND [SQB010].[D_E_L_E_T_] = ''")
                ->fetchAll('assoc');
            }
            else
            {

                $timecardDepartamentRs[] = $connection->execute("SELECT
                    [RA_MAT]
                    ,[RA_NOME]
                    ,[Q3_DESCSUM]
                    ,[QB_DESCRIC]
                    ,[RA_CC]
                FROM [SRA010]
                INNER JOIN [SQB010] ON [RA_DEPTO] = [QB_DEPTO]
                INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]
                WHERE [QB_DESCRIC] = '". $key ."'
                AND [RA_DEMISSA] = '' AND [RA_CATFUNC] != 'E'
                AND [SRA010].D_E_L_E_T_ = ''
                    AND [SQ3010].[D_E_L_E_T_] = ''
                    AND [SQB010].[D_E_L_E_T_] = ''")
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

            if($key == 'TODOS')
            {
                $timecardEmployeeRs[] = $connection->execute("SELECT
                    [RA_MAT]
                    ,[RA_NOME]
                    ,[Q3_DESCSUM]
                    ,[RA_CC]
                    ,[QB_DESCRIC]
                FROM [SRA010]
                INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]
                INNER JOIN [SQB010] ON [RA_DEPTO] = [QB_DEPTO]
                WHERE [RA_DEMISSA] = '' AND [RA_CATFUNC] != 'E'
                AND [SRA010].D_E_L_E_T_ = ''
                AND [SQ3010].[D_E_L_E_T_] = ''
                AND [SQB010].[D_E_L_E_T_] = ''")
                ->fetchAll('assoc');
            }
            else
            {
                $timecardEmployeeRs[] = $connection->execute("SELECT
                    [RA_MAT]
                    ,[RA_NOME]
                    ,[Q3_DESCSUM]
                    ,[RA_CC]
                    ,[QB_DESCRIC]
                FROM [SRA010]
                INNER JOIN [SQ3010] ON [Q3_CARGO] = [RA_CARGO]
                INNER JOIN [SQB010] ON [RA_DEPTO] = [QB_DEPTO]
                WHERE [RA_NOME] = '". $key ."'
                    AND [RA_DEMISSA] = '' AND [RA_CATFUNC] != 'E'
                    AND [SRA010].D_E_L_E_T_ = ''
                    AND [SQ3010].[D_E_L_E_T_] = ''
                    AND [SQB010].[D_E_L_E_T_] = ''")
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
        $signatureCTPSEmployee = $connection->execute("SELECT
                [RA_MAT]
                ,[RA_NOME]
                ,[RA_ADMISSA]
                ,[RJ_CODCBO]
                ,[RJ_DESC]
                ,[RA_SALARIO]
                ,[RA_XSALEXT]
                ,[RA_CATFUNC]
            FROM [SRA010]
            INNER JOIN [SRJ010] ON [RJ_FUNCAO] = [RA_CODFUNC]
            WHERE [RJ_CODCBO] != '' AND [SRJ010].D_E_L_E_T_ = ''
            AND [RA_NOME] = '". $signatureCTPS ."'")
            ->fetchAll('assoc');

        foreach ($signatureCTPSEmployee as $key)
        {
           $registry = $key['RA_MAT'];
           $name = $key['RA_NOME'];

           $day = substr($key['RA_ADMISSA'], 6,8);
           $month = substr($key['RA_ADMISSA'], 4,2);
           $year = substr($key['RA_ADMISSA'], 0,4);

           $admissionDate = $day . '/' . $month . '/' . $year  ;
           $role = $key['RJ_DESC'];

           $cbo = $key['RJ_CODCBO'];
           $salary = $key['RA_SALARIO'];
           $salaryExt = $key['RA_XSALEXT'];
           $typePayment = $key['RA_CATFUNC'];
        }

        $this->set(compact('registry','name','admissionDate','role','cbo','salary','salaryExt','typePayment'));
        $this->set('_serialize', ['registry','name','admissionDate','role','cbo','salary','salaryExt','typePayment']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }

    public function DeclarationOfConfidentiality()
    {
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
        $cpfRs = $connection->execute("SELECT
                [RA_CIC]
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
        $birthdaysOfTheMonth = $connection->execute("SELECT
                [RA_NOME]
                ,CONVERT(varchar(10),(DAY([RA_NASC])))+'/'+CONVERT(varchar(10),(MONTH([RA_NASC])))+'/'+CONVERT(varchar(10),YEAR([RA_NASC]))
                AS DataDeNascimento
                ,[CTT_DESC01]
            FROM [SRA010]
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
            $lines[$i] = $i;
        }

        $locales['POLO'] = 'POLO';
        $locales['UCS'] = 'UCS';

        $status['ATIVO'] = 'ATIVO';
        $status['INATIVO'] = 'INATIVO';

        $connection = ConnectionManager::get('baseProtheus');

        $listUnions = $connection->execute("SELECT
                [RCE_DESCRI]
            FROM [RCE010]")
            ->fetchAll('assoc');

        $listOfUnionsNames['TODOS'] = 'TODOS';
        foreach ($listUnions as $key) {
            $listOfUnionsNames[$key['RCE_DESCRI']] = $key['RCE_DESCRI'];
        }

        $listOfEmployees = $connection->execute("SELECT
                [RA_NOME]
            FROM [SRA010]
            WHERE [RA_DEMISSA] = '' AND [RA_CATFUNC] != 'E'
            ORDER BY [RA_NOME]")
            ->fetchAll('assoc');

        $listOfEmployeesNames['TODOS'] = 'TODOS';
        foreach ($listOfEmployees as $key)
        {
            $listOfEmployeesNames[$key['RA_NOME']] = $key['RA_NOME'];
        }

		$listOfEmployeesFull = $connection->execute("SELECT
                [RA_NOME]
            FROM [SRA010]
            WHERE [RA_DEMISSA] = ''
            ORDER BY [RA_NOME]")
            ->fetchAll('assoc');

        $listOfEmployeesNamesFull['TODOS'] = 'TODOS';
        foreach ($listOfEmployeesFull as $key)
        {
            $listOfEmployeesNamesFull[$key['RA_NOME']] = $key['RA_NOME'];
        }

        $listOfDepartaments = $connection->execute("SELECT
                [QB_DESCRIC]
            FROM [SQB010] WHERE [D_E_L_E_T_] = ''")
            ->fetchAll('assoc');

        $listOfDepartamentsNames['TODOS'] = 'TODOS';

        foreach ($listOfDepartaments as $key)
        {
            $listOfDepartamentsNames[$key['QB_DESCRIC']] = $key['QB_DESCRIC'];
        }

        $this->set(compact('listOfEmployeesNamesFull','listOfEmployeesNames','listOfDepartamentsNames','listOfUnionsNames','lines','locales','status'));
        $this->set(['listOfEmployeesNamesFull','listOfEmployeesNames','listOfDepartamentsNames','listOfUnionsNames','lines','locales','status']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.

        //$this->Auth->allow(['logout','login']);
    }

    public function isAuthorized($user)
    {
        $this->loadModel('Users');
        $this->loadModel('Roles');
        $this->loadModel('RolesUsers');
        $authenticatedUserId = $this->Auth->user('id');
        $query = $this->Users->find()
            ->where([
                'id'=> $authenticatedUserId
            ]);
        $statusArray = $query->all();
        $status = null;
        foreach ($statusArray as $key)
        {
            $status = $key['status'];
        }
        if($status == true)
        {
            $query = $this->RolesUsers->find()
                ->where([
                    'user_id'=> $authenticatedUserId
                ]);
            $currentUserGroups = $query->all();
            $release = null;
            foreach ($currentUserGroups as $key)
            {
                $query = $this->Roles->find()
                ->where([
                    'id'=> $key['role_id']
                ]);
                $correspondingFunction = $query->all();
                foreach ($correspondingFunction as $key)
                {
                    if($key['id'] == 22 or $key['id'] == 1)
                    {
                        $release = true;
                    }
                }
            }
            if($release == false)
            {
				if (in_array($this->request->params['action'], array('paycheck','paycheckIntervalPdf'))) {
                    return true;
                } else {
                    $this->Flash->error(__('Você não tem autorização para acessar esta área do sistema. Caso necessário, favor entrar em contato com o setor TI.'));
                    return false;
                }
            }
            else
            {
                //$this->Flash->error(__('VC É ADM'));
                if(in_array($this->action, array('index','add','edit','delete','view')))
                return true;
            }
        }
        else
        {
            $this->redirect($this->Auth->logout());
        }
        return parent::isAuthorized($user);
    }

}
