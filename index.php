<?php
include('includes/formLogic.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Resting Metabolic Rate (RMR)</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">

    <div class="jumbotron">
        <div>
            <h2  >Resting Metabolic Rate (RMR) Calculator</h2></div>
        <p>This Calculator is based on Mifflin St. Jeor Algorithm to calculate Calorie intake</p>
        <?php if (isset($errors) && !empty($errors)) :?>
            <div class='alert alert-danger'>
                <ul>
                    <?php foreach ($errors as $error) :?>
                        <li><?=$error?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ($form->isSubmitted()):
            header('LOCATION: results.php?' . $_SERVER['QUERY_STRING']);
        endif;?>





        <ul class="nav nav-tabs" id="units-tabs" role="tablist">
            <?php if(isset($_SERVER['QUERY_STRING'])):?>
                    <?php if(isset($_GET['measure'])):?>
                        <?php if ($_GET['measure']=='imperial'):?>
                            <li role="presentation" class="active"><a href="#imperial" aria-controls="imperial" role="tab" data-toggle="tab">Imperial</a></li>
                            <li role="presentation"><a class="text-muted" href="#metric" aria-controls="metric" role="tab" data-toggle="tab">Metric</a></li>
                        <?php elseif ($_GET['measure']=='metric'):?>
                            <li role="presentation" ><a class="text-muted" href="#imperial" aria-controls="imperial" role="tab" data-toggle="tab">Imperial</a></li>
                            <li role="presentation" class="active"><a  href="#metric" aria-controls="metric" role="tab" data-toggle="tab">Metric</a></li>
                        <?php endif;?>
                <?php else:?>
                    <li role="presentation" class="active"><a href="#imperial" aria-controls="imperial" role="tab" data-toggle="tab">Imperial</a></li>
                    <li role="presentation"><a class="text-muted" href="#metric" aria-controls="metric" role="tab" data-toggle="tab">Metric</a></li>
                <?php endif;?>
            <?php endif;?>
        </ul>

	<div class="row">
		<div class="col-sm-6 tab-content">

            <?php if(isset($_SERVER['QUERY_STRING'])):?>
                <?php if(isset($_GET['measure'])):?>
                    <?php if ($_GET['measure']=='imperial'):?>
                        <div role="tabpanel" class="tab-pane active" id="imperial">
                    <?php elseif ($_GET['measure']=='metric'):?>
                        <div role="tabpanel" class="tab-pane" id="imperial">
                    <?php endif;?>
                <?php else:?>
                        <div role="tabpanel" class="tab-pane active" id="imperial">
                <?php endif;?>
            <?php endif;?>

					<div id="form">



			<form method="get">
			  
			  <input type="hidden" name="measure" value="imperial">

			  <table>
			  
			  <tr>
			  <td class="col1">Gender</td>
			  <td>
			  <label><input type="radio" name="gender" id="male" value="male" checked> Male&nbsp;</label>
			  <label><input type="radio" name="gender" id="female" value="female"> Female</label>
			  </td>
			  </tr>
			  
			  <tr>
			  <td class="col1"><label for="age">Age</label></td>
			  <td>
			  <input type="text" name="age"  id="age" style="width:60px;" maxlength="3" value="<?=$form->prefill('age')?>">
			  </td>
			  </tr>
			  
			  <tr>
			  <td class="col1"><label for="weight">Weight</label></td>
			  <td><input type="text" name="weight"  id="weight" placeholder="lbs" style="width:60px;" maxlength="3" value="<?=$form->prefill('weight')?>"></td>
			  </tr>
			  
			  <tr>
			  <td class="col1"><label for="height">Height</label></td>
			  <td>
			    <select name="height"  id="height" style="width:100px;">
			    <option value="55">4ft 7in</option>
			    <option value="56">4ft 8in</option>
			    <option value="57">4ft 9in</option>
			    <option value="58">4ft 10in</option>
			    <option value="59">4ft 11in</option>
			    <option value="60">5ft 0in</option>
			    <option value="61">5ft 1in</option>
			    <option value="62">5ft 2in</option>
			    <option value="63">5ft 3in</option>
			    <option value="64">5ft 4in</option>
			    <option value="65">5ft 5in</option>
			    <option value="66">5ft 6in</option>
			    <option value="67">5ft 7in</option>
			    <option value="68">5ft 8in</option>
			    <option value="69">5ft 9in</option>
			    <option value="70" selected>5ft 10in</option>
			    <option value="71">5ft 11in</option>
			    <option value="72">6ft 0in</option>
			    <option value="73">6ft 1in</option>
			    <option value="74">6ft 2in</option>
			    <option value="75">6ft 3in</option>
			    <option value="76">6ft 4in</option>
			    <option value="77">6ft 5in</option>
			    <option value="78">6ft 6in</option>
			    <option value="79">6ft 7in</option>
			    <option value="80">6ft 8in</option>
			    <option value="81">6ft 9in</option>
			    <option value="82">6ft 10in</option>
			    <option value="83">6ft 11in</option>
			    <option value="84">7ft 0in</option>
			    </select>
			  </td>
			  </tr>
			  
			  <tr>
			  <td class="col1">Activity</td>
			  <td>
			    <select name="activity"  style="width:200px;">
			    <option value="1.2" selected>Inactive</option>
			    <option value="1.375">Light Exercise (1-2 days/week)</option>
			    <option value="1.55">Moderate Exercise (3-5 days/week)</option>
			    <option value="1.725">Heavy Exercise (6-7 days/week)</option>
			    <option value="1.9">Athlete (2x per day) </option>
			    </select>
			  </td>
			  </tr>
                  

			  
			  			
			  <tr style="margin-top:15px;">
			  <td class="col1">&nbsp;</td>
			  <td><input type="submit" class="btn btn-submit btn-lg" id="submit" name="submit" value="Calculate!"></td>
			  </tr>
			  
			  </table>
			  
			</form>
		</div> <!-- end #form -->				</div>



            <?php if(isset($_SERVER['QUERY_STRING'])):?>
                <?php if(isset($_GET['measure'])):?>
                    <?php if ($_GET['measure']=='imperial'):?>

                        <div role="tabpanel" class="tab-pane" id="metric">
                <?php elseif ($_GET['measure']=='metric'):?>
                        <div role="tabpanel" class="tab-pane active" id="metric">
                    <?php endif;?>
                <?php else:?>
                    <div role="tabpanel" class="tab-pane" id="metric">
                <?php endif;?>
                <?php endif;?>

					<div id="form-metric">

			<form name="form-metric-tagged" method="get" >

			  <input type="hidden" name="measure" value="metric">

			  <table>
			  
			  <tr>
			  <td class="col1">Gender</td>
			  <td>
			  <label><input type="radio" name="gender" id="male-metric" value="male" checked> Male&nbsp;</label>
			  <label><input type="radio" name="gender" id="female-metric" value="female"> Female</label>
			  </td>
			  </tr>
			  
			  <tr>
			  <td class="col1"><label for="age">Age</label></td>
			  <td>
			  <input type="text" name="age"  id="age-metric" style="width:60px;" maxlength="3" value="<?=$form->prefill('age')?>">
			  </td>
			  </tr>
			  
			  <tr>
			  <td class="col1"><label for="weight">Weight</label></td>
			  <td><input type="text" name="weight"  id="weight-metric" placeholder="kg" style="width:60px;" maxlength="5" value="<?=$form->prefill('weightkg')?>"></td>
			  </tr>
			  
			  <tr>
			  <td class="col1"><label for="height-metric">Height</label></td>
			  <td><input type="text" name="height"  id="height-metric" placeholder="cm" style="width:60px;" maxlength="3"><?=$form->prefill('heightcm')?></td>
			  </tr>
			  
			  <tr>
			  <td class="col1">Activity</td>
			  <td>
			    <select name="activity"  style="width:200px;">
			    <option value="1.2" selected>Inactive (office job)</option>
			    <option value="1.375">Light Exercise (1-2 days/week)</option>
			    <option value="1.55">Moderate Exercise (3-5 days/week)</option>
			    <option value="1.725">Heavy Exercise (6-7 days/week)</option>
			    <option value="1.9">Athlete (2x per day) </option>
			    </select>
			  </td>
			  </tr>
			  
			  <tr>

			  			
			  <tr style="margin-top:15px;">
			  <td class="col1">&nbsp;</td>
			  <td><input type="submit" class="btn btn-submit btn-lg" id="submit-metric" name="submit" value="Calculate!"></td>
			  </tr>
			  
			  </table>
			  
			</form>
		</div> <!-- end #form -->				</div>
			
					</div>


	
	<hr>
</div>
	
	
	</div> <!-- end .jumbotron -->

</div> <!-- end .container -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>