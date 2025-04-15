<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="epsilon.css">
</head>
<body>

<?php

/*
TODO:

Completer isJoined avec isJoinable qui contiendra en plus les regles d'acces au challenge

*/

include('header.php');

$isConnected = (isset($_COOKIE['mail']) || isset($_SESSION['mail'])) ? true : false;

if($isConnected) {
	include('bcaAccessCodeSystem.php');

	$accessCode = getAccessCodeFromDB();
	$accessCodeArrayed = stringToArrayAccessCode($accessCode);

	if(isset($_POST['course'])){
		setToOneNewJoinedCourse($_POST['course'], $accessCodeArrayed);
	}
}

?>
		<section>
			<h2 id="community">Mes parcours & badges</h2>
			<?php
			if($isConnected) {
				displayCoursesList($accessCodeArrayed);
			}
				
			?>
		</section>

		<section>
			<h2 id="courses">Badges disponibles</h2>
			<ul id="badges-list">
				<li><i class="fa fa-graduation-cap"></i> Apprenti</li>
				<li><i class="fa fa-handshake"></i> Développeur</li>
				<li><i class="fa fa-hand-holding"></i> Passeur</li>
				<li><i class="fa fa-star"></i> Guide</li>
			</ul>
		</section>
	</div>


</body>
</html>
