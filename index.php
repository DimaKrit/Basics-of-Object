<?php

require_once __DIR__ . '/Student.php';

$dataStudent = [
	['Mike', 'Barnes', 4, 'junior', 'male'],
	['Jim', 'Nickerson', 3, 'junior', 'male'],
	['Jack', 'Indabox', 2.5, 'junior', 'male'],
	['Jane', 'Miller', 3.6, 'junior', 'male'],
	['Mary', 'Scott', 2.7, 'junior', 'male'],
];

$minutesWork = [60, 100, 40, 300, 1000];

$studentList = [];

$countStudent = count($dataStudent);

/* Create new objects Student */
for ($i = 0; $i < $countStudent; $i++) {
	$studentList[] = new Student(...$dataStudent[$i]);
}

/* Show object properties */
foreach ($studentList as $itemsObject) {
	$itemsObject->showMyself();
}

/* Set learning time */
for ($i = 0; $i < $countStudent; $i++) {
	$studentList[$i]->studyTime($minutesWork[$i]) . PHP_EOL;
}

/* Show object properties */
foreach ($studentList as $itemsObject) {
	echo $itemsObject->showMyself() . PHP_EOL;
}







