<?php

class PaaS {

	public function __construct($user, $password, $database, $host = 'localhost') {
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->host = $host;
	}

	protected function connect() {
		return new mysqli($this->host, $this->user, $this->password, $this->database);
	}

	public function query($query) {
		$db = $this->connect();
		$result = $db->query($query);

		while ( $row = $result->fetch_object() ) {
			$results[] = $row;
		}

		return $results;
	}

  public function db_query($query) {
		$db = $this->connect();
		$result = $db->query($query);

		return $result;
	}

	public function permanentPlacement($customer_name, $ap_contact, $ap_email, $ap_phone, $customer_po, $customer_status, $bill_address, $placement_name, $placement_email, $placement_phone, $position, $salary, $perm_fee, $total_fee, $start_date, $recruiter, $sales_rep, $special_notes, $user_name){

		$customer_name = $this->connect()->real_escape_string($customer_name);
		$ap_contact = $this->connect()->real_escape_string($ap_contact);
		$ap_email = $this->connect()->real_escape_string($ap_email);
		$ap_phone = $this->connect()->real_escape_string($ap_phone);
		$customer_po = $this->connect()->real_escape_string($customer_po);
		$customer_status = $this->connect()->real_escape_string($customer_status);
		$bill_address = $this->connect()->real_escape_string($bill_address);
		$placement_name = $this->connect()->real_escape_string($placement_name);
		$placement_email = $this->connect()->real_escape_string($placement_email);
		$placement_phone = $this->connect()->real_escape_string($placement_phone);
		$position = $this->connect()->real_escape_string($position);
		$salary = $this->connect()->real_escape_string($salary);
		$perm_fee = $this->connect()->real_escape_string($perm_fee);
		$total_fee = $this->connect()->real_escape_string($total_fee);
		$start_date = $this->connect()->real_escape_string($start_date);
		$recruiter = $this->connect()->real_escape_string($recruiter);
		$sales_rep = $this->connect()->real_escape_string($sales_rep);
		$special_notes = $this->connect()->real_escape_string($special_notes);
		$user_name = $this->connect()->real_escape_string($user_name);


		$query = 'INSERT INTO `permanent_placement`
             (`customer_name`, `ap_contact`, `ap_email`, `ap_phone`, `customer_po`, `customer_status`, `bill_address`, `placement_name`, `placement_email`, `placement_phone`, `position`, `salary`, `perm_fee`, `total_fee`, `start_date`, `recruiter`, `sales_rep`, `special_notes`, `user_name`)
             VALUES (\'' . $customer_name . '\',
				 \'' . $ap_contact . '\',
				 \'' . $ap_email . '\',
				 \'' . $ap_phone . '\',
				 \'' . $customer_po . '\',
				 \'' . $customer_status . '\',
				 \'' . $bill_address . '\',
				 \'' . $placement_name . '\',
				 \'' . $placement_email . '\',
				 \'' . $placement_phone . '\',
				 \'' . $position . '\',
				 \'' . $salary . '\',
				 \'' . $perm_fee . '\',
				 \'' . $total_fee . '\',
				 \'' . $start_date . '\',
				 \'' . $recruiter . '\',
				 \'' . $sales_rep . '\',
				 \'' . $special_notes . '\',
				 \'' . $user_name . '\')';

		$db = $this->connect();
		$result = $db->query($query);
		return $result;
	}

	public function contractBilling($candidateFirst, $candidateMI, $candidateLast,
	$consultantCompany, $candidatePhone, $candidateEmail, $candidateAddress,
	$clientName, $jobTitle, $jobLocation, $environment, $hireType, $contractRate,
	$billRate, $baseSalary, $projectType, $issuedHardware, $corusEmail, $backgroundCheck,
	$traveling, $startDate, $contractPeriod, $drugTest, $benefits, $clientContact,
	$hiringManager, $hiringEmail, $hiringPhone, $recruiters, $accountManager,
	$notes, $user_name){

		$candidateFirst = $this->connect()->real_escape_string($candidateFirst);
		$candidateMI = $this->connect()->real_escape_string($candidateMI);
	   $candidateLast = $this->connect()->real_escape_string($candidateLast);
		$consultantCompany = $this->connect()->real_escape_string($consultantCompany);
		$candidatePhone = $this->connect()->real_escape_string($candidatePhone);
	   $candidateEmail = $this->connect()->real_escape_string($candidateEmail);
		$candidateAddress = $this->connect()->real_escape_string($candidateAddress);
		$clientName = $this->connect()->real_escape_string($clientName);
		$jobTitle = $this->connect()->real_escape_string($jobTitle);
		$jobLocation = $this->connect()->real_escape_string($jobLocation);
		$environment = $this->connect()->real_escape_string($environment);
		$hireType = $this->connect()->real_escape_string($hireType);
		$contractRate = $this->connect()->real_escape_string($contractRate);
		$billRate = $this->connect()->real_escape_string($billRate);
		$baseSalary = $this->connect()->real_escape_string($baseSalary);
		$projectType = $this->connect()->real_escape_string($projectType);
		$issuedHardware = $this->connect()->real_escape_string($issuedHardware);
		$corusEmail = $this->connect()->real_escape_string($corusEmail);
		$backgroundCheck = $this->connect()->real_escape_string($backgroundCheck);
		$traveling = $this->connect()->real_escape_string($traveling);
		$startDate = $this->connect()->real_escape_string($startDate);
		$contractPeriod = $this->connect()->real_escape_string($contractPeriod);
		$drugTest = $this->connect()->real_escape_string($drugTest);
		$benefits = $this->connect()->real_escape_string($benefits);
		$clientContact = $this->connect()->real_escape_string($clientContact);
		$hiringManager = $this->connect()->real_escape_string($hiringManager);
		$hiringEmail = $this->connect()->real_escape_string($hiringEmail);
		$hiringPhone = $this->connect()->real_escape_string($hiringPhone);
		$recruiters = $this->connect()->real_escape_string($recruiters);
		$accountManager = $this->connect()->real_escape_string($accountManager);
		$notes = $this->connect()->real_escape_string($notes);
		$user_name = $this->connect()->real_escape_string($user_name);

		$query = 'INSERT INTO `contract_billing`
             (`first_name`, `mi`, `last_name`, `consultant_company`, `phone`, `email`, `address`, `client_name`, `job_title`, `job_location`, `environment`, `hire_type`, `contract_rate`, `bill_rate`, `base_salary`, `project_type`, `issued_hardware`, `corus_email`, `background_check`, `travel_reporting`, `start_date`, `contract_period`, `drug_test`, `benefits`, `client_contact`, `manager`, `manager_email`, `manager_phone`, `recruiter`, `account_manager`, `notes`, `user_name`)
             VALUES (\'' . $candidateFirst . '\',
				 \'' . $candidateMI . '\',
				 \'' . $candidateLast . '\',
				 \'' . $consultantCompany . '\',
				 \'' . $candidatePhone . '\',
				 \'' . $candidateEmail . '\',
				 \'' . $candidateAddress . '\',
				 \'' . $clientName . '\',
				 \'' . $jobTitle . '\',
				 \'' . $jobLocation . '\',
				 \'' . $environment . '\',
				 \'' . $hireType . '\',
				 \'' . $contractRate . '\',
				 \'' . $billRate . '\',
				 \'' . $baseSalary . '\',
				 \'' . $projectType . '\',
				 \'' . $issuedHardware . '\',
				 \'' . $corusEmail . '\',
				 \'' . $backgroundCheck . '\',
				 \'' . $traveling . '\',
				 \'' . $startDate . '\',
				 \'' . $contractPeriod . '\',
				 \'' . $drugTest . '\',
				 \'' . $benefits . '\',
				 \'' . $clientContact . '\',
				 \'' . $hiringManager . '\',
				 \'' . $hiringEmail . '\',
				 \'' . $hiringPhone . '\',
				 \'' . $recruiters . '\',
				 \'' . $accountManager . '\',
				 \'' . $notes . '\',
				 \'' . $user_name . '\')';

		$db = $this->connect();
		$result = $db->query($query);
		return $result;

	}

	public function updatePermanentPlacement($update_id, $customer_name, $ap_contact, $ap_email, $ap_phone, $customer_po, $customer_status, $bill_address, $placement_name, $placement_email, $placement_phone, $position, $salary, $perm_fee, $total_fee, $start_date, $recruiter, $sales_rep, $special_notes){

		$update_id = $this->connect()->real_escape_string($update_id);
		$customer_name = $this->connect()->real_escape_string($customer_name);
		$ap_contact = $this->connect()->real_escape_string($ap_contact);
		$ap_email = $this->connect()->real_escape_string($ap_email);
		$ap_phone = $this->connect()->real_escape_string($ap_phone);
		$customer_po = $this->connect()->real_escape_string($customer_po);
		$customer_status = $this->connect()->real_escape_string($customer_status);
		$bill_address = $this->connect()->real_escape_string($bill_address);
		$placement_name = $this->connect()->real_escape_string($placement_name);
		$placement_email = $this->connect()->real_escape_string($placement_email);
		$placement_phone = $this->connect()->real_escape_string($placement_phone);
		$position = $this->connect()->real_escape_string($position);
		$salary = $this->connect()->real_escape_string($salary);
		$perm_fee = $this->connect()->real_escape_string($perm_fee);
		$total_fee = $this->connect()->real_escape_string($total_fee);
		$start_date = $this->connect()->real_escape_string($start_date);
		$recruiter = $this->connect()->real_escape_string($recruiter);
		$sales_rep = $this->connect()->real_escape_string($sales_rep);
		$special_notes = $this->connect()->real_escape_string($special_notes);

		$query = 'UPDATE `permanent_placement`
						SET `customer_name` = \'' . $customer_name . '\',
						`ap_contact` = \'' . $ap_contact . '\',
						`ap_email` = \'' . $ap_email . '\',
						`ap_phone` = \'' . $ap_phone . '\',
						`customer_po` = \'' . $customer_po . '\',
						`customer_status` = \'' . $customer_status . '\',
						`bill_address` = \'' . $bill_address . '\',
						`placement_name` = \'' . $placement_name . '\',
						`placement_email` = \'' . $placement_email . '\',
						`placement_phone` = \'' . $placement_phone . '\',
						`position` = \'' . $position . '\',
						`salary` = \'' . $salary . '\',
						`perm_fee` = \'' . $perm_fee . '\',
						`total_fee` = \'' . $total_fee . '\',
						`start_date` = \'' . $start_date . '\',
						`recruiter` = \'' . $recruiter . '\',
						`sales_rep` = \'' . $sales_rep . '\',
						`special_notes` = \'' . $special_notes . '\'
						WHERE `id` = \'' . $update_id . '\' ';

		$db = $this->connect();
		$result = $db->query($query);
		return $result;
	}

	public function updateContractBilling($update_id, $candidateFirst, $candidateMI, $candidateLast,
	$consultantCompany, $candidatePhone, $candidateEmail, $candidateAddress,
	$clientName, $jobTitle, $jobLocation, $environment, $hireType, $contractRate,
	$billRate, $baseSalary, $projectType, $issuedHardware, $corusEmail, $backgroundCheck,
	$traveling, $startDate, $contractPeriod, $drugTest, $benefits, $clientContact,
	$hiringManager, $hiringEmail, $hiringPhone, $recruiters, $accountManager,
	$notes){

		$update_id = $this->connect()->real_escape_string($update_id);
		$candidateFirst = $this->connect()->real_escape_string($candidateFirst);
		$candidateMI = $this->connect()->real_escape_string($candidateMI);
	   $candidateLast = $this->connect()->real_escape_string($candidateLast);
		$consultantCompany = $this->connect()->real_escape_string($consultantCompany);
		$candidatePhone = $this->connect()->real_escape_string($candidatePhone);
	   $candidateEmail = $this->connect()->real_escape_string($candidateEmail);
		$candidateAddress = $this->connect()->real_escape_string($candidateAddress);
		$clientName = $this->connect()->real_escape_string($clientName);
		$jobTitle = $this->connect()->real_escape_string($jobTitle);
		$jobLocation = $this->connect()->real_escape_string($jobLocation);
		$environment = $this->connect()->real_escape_string($environment);
		$hireType = $this->connect()->real_escape_string($hireType);
		$contractRate = $this->connect()->real_escape_string($contractRate);
		$billRate = $this->connect()->real_escape_string($billRate);
		$baseSalary = $this->connect()->real_escape_string($baseSalary);
		$projectType = $this->connect()->real_escape_string($projectType);
		$issuedHardware = $this->connect()->real_escape_string($issuedHardware);
		$corusEmail = $this->connect()->real_escape_string($corusEmail);
		$backgroundCheck = $this->connect()->real_escape_string($backgroundCheck);
		$traveling = $this->connect()->real_escape_string($traveling);
		$startDate = $this->connect()->real_escape_string($startDate);
		$contractPeriod = $this->connect()->real_escape_string($contractPeriod);
		$drugTest = $this->connect()->real_escape_string($drugTest);
		$benefits = $this->connect()->real_escape_string($benefits);
		$clientContact = $this->connect()->real_escape_string($clientContact);
		$hiringManager = $this->connect()->real_escape_string($hiringManager);
		$hiringEmail = $this->connect()->real_escape_string($hiringEmail);
		$hiringPhone = $this->connect()->real_escape_string($hiringPhone);
		$recruiters = $this->connect()->real_escape_string($recruiters);
		$accountManager = $this->connect()->real_escape_string($accountManager);
		$notes = $this->connect()->real_escape_string($notes);
		$user_name = $this->connect()->real_escape_string($user_name);

		$query = 'UPDATE `contract_billing`
						SET `first_name` = \'' . $candidateFirst . '\',
						`mi` = \'' . $candidateMI . '\',
						`last_name` = \'' . $candidateLast . '\',
						`consultant_company` = \'' . $consultantCompany . '\',
						`phone` = \'' . $candidatePhone . '\',
						`email` = \'' . $candidateEmail . '\',
						`address` = \'' . $candidateAddress . '\',
						`client_name` = \'' . $clientName . '\',
						`job_title` = \'' . $jobTitle . '\',
						`job_location` = \'' . $jobLocation . '\',
						`environment` = \'' . $environment . '\',
						`hire_type` = \'' . $hireType . '\',
						`contract_rate` = \'' . $contractRate . '\',
						`bill_rate` = \'' . $billRate . '\',
						`base_salary` = \'' . $baseSalary . '\',
						`project_type` = \'' . $projectType . '\',
						`issued_hardware` = \'' . $issuedHardware . '\',
						`corus_email` = \'' . $corusEmail . '\',
						`background_check` = \'' . $backgroundCheck . '\',
						`travel_reporting` = \'' . $traveling . '\',
						`start_date` = \'' . $startDate . '\',
						`contract_period` = \'' . $contractPeriod . '\',
						`drug_test` = \'' . $drugTest . '\',
						`benefits` = \'' . $benefits . '\',
						`client_contact` = \'' . $clientContact . '\',
						`manager` = \'' . $hiringManager . '\',
						`manager_email` = \'' . $hiringEmail . '\',
						`manager_phone` = \'' . $hiringPhone . '\',
						`recruiter` = \'' . $recruiters . '\',
						`account_manager` = \'' . $accountManager . '\',
						`notes` = \'' . $notes . '\'
						WHERE `id` = \'' . $update_id . '\' ';

		$db = $this->connect();
		$result = $db->query($query);
		return $result;

	}


	public function submitFeedback($f_user, $f_feedback){
		$f_user = $this->connect()->real_escape_string($f_user);
		$f_feedback = $this->connect()->real_escape_string($f_feedback);

		$query = 'INSERT INTO `feedback`
             (`f_user`, `f_feedback`)
             VALUES (\'' . $f_user . '\', \'' . $f_feedback . '\')';
		$db = $this->connect();
		$result = $db->query($query);
		return $result;
	}

	public function delete($table, $id) {
		// Connect to the database
		$db = $this->connect();

		// Prepary our query for binding
		$stmt = $db->prepare("DELETE FROM {$table} WHERE ID = ?");

		// Dynamically bind values
		$stmt->bind_param('d', $id);

		// Execute the query
		$stmt->execute();

		// Check for successful insertion
		if ( $stmt->affected_rows ) {
			return true;
		}
	}

}