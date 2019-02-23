<?php

class Student
{
	const MAX_GPA = 4;
	public $firstname;
	public $lastname;
	public $gpa;
	public $status;
	public $gender;
	private static $genderType = ['male', 'female'];
	protected static $statusType = ['freshman', 'sophomore', 'junior', 'senior'];

	function __construct($firstname, $lastname, $gpa, $status, $gender)
	{
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->gpa = $gpa;

		$this->checkGender($gender);
		$this->gender = $gender;

		$this->checkStatus($status);
		$this->status = $status;
	}

	public function showMyself()
	{
		foreach ($this as $key => $value) {
			if (!is_array($value)) {
				echo "$key => $value" . PHP_EOL;
			}
		}
	}

	public function studyTime($study_time)
	{

		$hours = $study_time / 60;

		$this->gpa = round($this->gpa + log($hours), 1);

		if ($this->gpa >= self::MAX_GPA) {
			$this->gpa = self::MAX_GPA;
		}
	}

	protected function checkGender($gender)
	{
		if (!in_array($gender, self::$genderType)) {
			throw new Exception('Enter the correct gender {male or female}');
		}
	}

	protected function checkStatus($status)
	{
		if (!in_array($status, self::$statusType)) {
			throw new Exception('Enter the correct status {' . self::$statusType . '}');
		}

	}

    public function __call($funName, $arguments)
    {
     
        throw new Exception(
    		'The function you called：' . $funName . '(parameter：'. print_r($arguments) .')does not exist!');                  
    }  
}