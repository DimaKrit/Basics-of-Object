<?php

class Student
{
	const MAX_GPA = 4;
	protected $firstname;
	protected $lastname;
	protected $gpa;
	protected $status;
	protected $gender;
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

    public function getFirstname()
    {
    	return $this->firstname;
    }

    public function getLastname()
    {
    	return $this->lastname;
    } 

    public function getGpa()
    {
    	return $this->gpa;
    }

    public function getStatus()
    {
    	return $this->status;
    }

    public function getGender()
    {
    	return $this->gender;
    } 

     public function setFirstname($firstname)
    {
    	$this->firstname = $firstname;
    }

    public function setLastname($lastname)
    {
    	$this->lastname = $lastname;
    } 

    public function setGpa($gpa)
    {
    	$this->gpa = $gpa;
    }

    public function setStatus($status)
    {
		$this->status = $status;
    }

    public function setGender($gender)
    {
		$this->gender = $gender;
    } 

}