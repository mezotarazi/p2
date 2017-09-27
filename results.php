
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resting Metabolic Rate(RMR) Results</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include 'includes/functions.php';

$calories = Mifflin($_GET['measure'],$_GET['gender'],$_GET['weight'],$_GET['height'],$_GET['age'],$_GET['activity']);

$BMI = round(BMI($_GET['measure'],$_GET['weight'],$_GET['height']),2);

$activity_array = array('1.0' => 'Minimal','1.2' => 'Inactive','1.376' => 'Light', '1.55' => 'Moderate','1.725' => 'Heavy', '1.9' => 'Athlete');
?>
<div class="container">

    <div class="jumbotron">
        <div class="result">
            <div class="clearfix">
		    <h1  class="pull-left">Results for Resting Metabolic Rate (RMR)</h1>

		</div>

	<p >You are a <strong><?php echo $_GET['age']?></strong> year old <strong><?php echo $_GET['gender']?></strong> who is <strong>
            <?php echo $_GET['height'];
            if ($_GET['measure']=='imperial'){
                echo ' feet';
            }else if ($_GET['measure']=='metric') {
                echo ' cm';
            }else echo $_GET['measure'];
            ?></strong>
        tall and weighs <strong><?php echo $_GET['weight'];
            if ($_GET['measure']=='imperial'){
                echo ' lb';
            }else if ($_GET['measure']=='metric') {
                echo ' kg';
            }else echo $_GET['measure'];
            ?>
        </strong> while doing <strong><?php echo $activity_array[$_GET['activity']]?></strong>.</p>
	
	
	 <hr class="style2"> 	

		
	<div class="row">
		<div class="col-sm-4" style="padding-left:0;">	
			<p class="bold text-center">Your Maintenance Calories</p>
			<div id="tdee-cals">
				<div style="padding-top:25px;">
					<span class="h2"><?php echo $calories?></span>
					<br>
					<span class="cals">calories per day</span>
				</div>
				<hr>
				<div>
					<span class="h2"><?php echo $calories*7?></span>
					<br>
					<span class="cals">calories per week</span>
				</div>
			</div>
		</div>


		<div class="col-sm-8" style="padding-top:60px;">

			<table class="table table-condensed" id="bmr-table" style="margin-bottom:10px;">
                <?php
                foreach ($activity_array as $key => &$val){
                    if ($calories == Mifflin($_GET['measure'],$_GET['gender'],$_GET['weight'],$_GET['height'],$_GET['age'], $key)) {
                        echo '<tr class="success2"><td>' . $val . '</td>';
                    }
                    else echo '<tr><td>' . $val . '</td>';
                    echo'<td>'.Mifflin($_GET['measure'],$_GET['gender'],$_GET['weight'],$_GET['height'],$_GET['age'], $key).'<small> calories per day </small></td></tr>';


                }



                ?>
			</table>
		</div> <!-- end col-sm-8 -->
    </div>


            </br>
            </br>
            </br>
	
	
	<div class="row">
		
		<div class="col-sm-6" style="padding-left:0;">
		
			<h2>Ideal Weight:
                <?php echo round(BMI_Assess($_GET['measure'],$_GET['height'],0),0);
                echo " - ".round(BMI_Assess($_GET['measure'],$_GET['height'],1),0);
                if ($_GET['measure']=='imperial'){
                    echo ' lbs';
                }else if ($_GET['measure']=='metric'){
                    echo ' kg';
                }
                ?>

            </h2>
			<p>Your ideal body weight should be between:
                <?php echo round(BMI_Assess($_GET['measure'],$_GET['height'],0),0);
                echo " - ".round(BMI_Assess($_GET['measure'],$_GET['height'],1),0);
                if ($_GET['measure']=='imperial'){
                    echo ' lbs';
                }else if ($_GET['measure']=='metric'){
                    echo ' kg';
                }
                ?>
            </p>
        </div>
		<div class="col-sm-6 " style="padding-right:0;">
		
			<h2>BMI Score: <?php echo $BMI ?></h2>
		
			<p>Your <strong>BMI</strong> is <strong><?php echo $BMI ?></strong>, which means you are classified as <strong>
                    <?php echo
                    BMI_Class($BMI);
                    ?></strong>
        </div>
        </div> <!-- end .row -->
		</div> <!-- end col-sm-6 -->
	</div> <!-- end row -->
	

	
</div> <!-- end .result -->


</body>
</html>