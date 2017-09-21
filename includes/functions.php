<?php

function Mifflin($measure,$gender, $kg, $cm, $age, $activity = 1){

	// BMR = 10 * weight(kg) + 6.25 * height(cm) - 5 * age(y) + 5         (man)
	// BMR = 10 * weight(kg) + 6.25 * height(cm) - 5 * age(y) - 161     (woman) 
    if ($measure == 'imperial')
        {$kg       = $kg * 0.453592;
        $cm       = $cm * 2.54;
        }

	if($gender == 'male'){
		$total = 10 * $kg + 6.25 * $cm - 5 * $age + 5;
		$total = $total * $activity;
		return (int) $total;
	}
	
	if($gender == 'female'){
		$total = (10 * $kg) + (6.25 * $cm) - (5 * $age) - 161;
		$total = $total * $activity;
		return (int) $total;
	}

}


function BMI($measure,$kg, $cm){

    if ($measure == 'imperial')
        {$kg       = $kg * 0.453592;
        $cm       = $cm * 2.54;
        }
	$m = $cm * 0.01;
	$m = $m * $m;
	$bmi = $kg / $m;
	return $bmi;

}


function BMI_Assess($measure, $cm, $maxmin){

    if ($measure == 'imperial'){
        $cm       = $cm * 2.54;
    }
    $m = $cm * 0.01;
    $m = $m * $m;
    if ($maxmin==0)
        $kg = 18.5*$m;
    elseif ($maxmin==1)
        $kg = 25*$m;

    return $kg;

}


function BMI_Class($bmi){

	if($bmi < 18.5){
		return 'Underweight';
	} elseif($bmi >= 18.5 && $bmi < 25){
		return 'Normal Weight';
	} elseif($bmi >= 25 && $bmi < 30){
		return 'Overweight';
	} elseif($bmi >= 30){
		return 'Obese';
	} else {
		return 'error';
	}
			  	

}
