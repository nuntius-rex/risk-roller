<?php
//============================================================================================
// Note: This block of code is used to display the file as code:
	if(isset($_GET["code"])){
		ini_set("highlight.html", "#808080");
		highlight_file( __FILE__ );	die();
	}
// Author: Dan Guinn - danguinn.com
//============================================================================================

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RISK ROLLER</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">
  <link rel="stylesheet" type="text/css" href="css/app.css" media="all">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:700" rel="stylesheet">
  <link rel="icon" type="image/ico" href="http://danguinn.com/config/custom-files/img/logo/favicon/favicon.ico">
  <link rel="icon" type="image/ico" href="http://danguinn.com/config/custom-files/img/logo/favicon/favicon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</head>
<body>

	<div class="toggled" id="page-content-wrapper">
  <main>
		<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
	        	<header>
				      	<br>
				        <img src="img/risk-attack-roller_logo-black.jpg" class="img-responsive"><br>

			          <p id="introText">A dice roller and troop tracker for the <span class="RISK">RISK</span> boardgame.
			            <br>
			            <small>
			              A code demo by <a href="http://danguinn.com">DAN GUINN</a>
			              <a href="#footer">ABOUT THIS DEMO</a>
			              <a href="http://danguinn.com/programmer">MORE DEMOS</a>
			            </small>
			            </p>
		        <header>
						</div><!--End column-->
				</div><!--End row-->
			</div><!--End container-->
  </section>

	<br>
      <section id="instructions">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 roundContainers">
		        <fieldset>
		          <legend>Instructions</legend>
		              <p><span class="RISK">RISK Roller</span> is a single territory attack roller for the game of <span class="RISK">RISK</span>.
		                Instructions: <span class="RISK">RISK Roller</span> assumes some knowledge of the rules of the game of <span class="RISK">RISK</span>.
		                To begin, enter the attacker and defender's initial territory troop numbers. You only have to do this once! Note that when you enter your troops the
		                <span class="RISK">RISK Roller</span> will display the most optimum troop unit placements.
		                Next, select your dice amount. In <span class="RISK">RISK</span>, for the Attacker, this is the troops you are invading with. Remember, you must leave at least one troop in your home territory. So you cannot invade using three dice if you only have three troops.
		                For the Defender, this is the troops you are defending with. Remember, you can only defend with the amount of troops you have. So if you have only two troops, you
		                cannot use three dice. You must use only two. <span class="RISK">RISK Roller</span> obeys these standard rules. When finished entering troops and selecting dice, click "Roll Dice" to begin. The <span class="RISK">RISK Roller</span> will total each win and loss and deduct troops for you each round. Keep clicking "Roll Dice" until someone wins. <span class="RISK">RISK Roller</span> will automatically deduct your troop amounts, troop display and dice as needed.
		                Your <span class="RISK">RISK Roll</span> has been digitized! ~ Note: The <a href="https://en.wikipedia.org/wiki/Risk_(game)">RISK board game</a> was produced by Parker Borthers, now a division of <a href="http://www.hasbro.com/en-us/">Hasbro</a> and was originally created by French filmmaker <a href="https://en.wikipedia.org/wiki/Albert_Lamorisse">Albert Lamorisse</a>.
		              </p>
		        </fieldset>
					</div><!--End column-->
			</div><!--End row-->
		</div><!--End container-->
		</section>
		<br>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 roundContainers">
		        <fieldset id="attacker">
		            <legend>Attacker</legend>

		            <label>Troop Amount: </label>
								<input type="number" id="p1TroopNum" maxlength="100000">
		            <label>Dice: </label>
		            <select name="" id="p1DiceNum">
		              <option value="1" selected>1</option>
		              <option value="2">2</option>
		              <option value="3">3</option>
		            </select>
		            <div id="p1diceAdjust"></div>
		            <br>
		            <span id="p1TroopAmts"></span><br><br>
		            <div class="troops" id="p1Troop"></div>
		            <br>
		            <div id="player1Dice" class="dice"></div>
		            <div id="player1score"></div>
		            <div id="player1win"></div>
		        </fieldset>
					</div><!--End column-->
			</div><!--End row-->
		</div><!--End container-->
		</section>

		<br>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 roundContainers">

		        <fieldset id="defender">
		          <legend>Defender</legend>
		           <label>Troop Amount: </label><input type="number" id="p2TroopNum">
		            <label>Dice: </label>
		            <select name="" id="p2DiceNum">
		              <option value="1" selected>1</option>
		              <option value="2">2</option>
		              <option value="3">3</option>
		            </select>
		            <div id="p2diceAdjust"></div>
		            <br>
		              <span id="p2TroopAmts"></span><br><br>
		              <div class="troops"  id="p2Troop"></div>
		            <br>
		            <div id="player2Dice" class="dice"></div>
		            <div id="player2score"></div>
		            <div id="player2win"></div>
		        </fieldset>
					</div><!--End column-->
			</div><!--End row-->
		</div><!--End container-->
		</section>

		<br>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 roundContainers">
			        <fieldset id="rollPanel">
			          <legend>Roller Controls</legend>
			        <button id="rollDice">Roll Dice</button>
			        <button id="reset">Reset</button>
			        </fieldset>


						</div><!--End column-->
					</div><!--End row-->
				</div><!--End container-->
		</section>
<br>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 roundContainers">

						<fieldset id="rollHistory">
							<legend>History</legend>
						Roll Count: <input type="text" id="rollCount" value="0" disabled></input>
						<div>
						&nbsp;
						</div>
						</fieldset>

					</div><!--End column-->
				</div><!--End row-->
				</div><!--End container-->
				</section>
		<br>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 roundContainers">
	        <fieldset>
	          <legend>Troop Key</legend>
	          <p>Infantry: <span class="troops">A</span> have a value of 1. &nbsp;&nbsp;&nbsp; Horsemen: <span class="troops">B</span> have a value of
	          5. &nbsp;&nbsp;&nbsp;Canons: <span class="troops">C</span> have a value of 10.</p>
	        </fieldset>
				</div><!--End column-->
			</div><!--End row-->
		</div><!--End container-->
	</section>
	<br>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 roundContainers">
          <footer id="footer">
            <fieldset>
              <legend>About This Demo</legend>

                  <p>This demo is designed to simulate an attack turn in the boardgame of <span class="RISK">RISK</span>. It shows a front-end design with JavaScript functionality to provide dynamic
                    updates as the attack progresses. The game manages troop rolls by performing dice comparison per the rules of <span class="RISK">RISK</span>. It additionally displays the optimum
                    troops mathematically that one might use in boardgame play. Instead of using images for the troops I made a font. Lastly, it maintains a history log of rolls until finally the attack is complete.
                    </p>
                    <p>This demo was designed using HTML, CSS/Bootstrap, jQuery and Photoshop (for the graphics). Click on the following links to view the source:
                    </p>
                    <ul>
                      <li><a href="?code">HTML</a></li>
                      <li><a href="css/app.css">CSS</a></li>
                      <li><a href="js/app.js">JavaScript/jQuery</li>
                    </ul>

                </fieldset>

          </footer>
				</div><!--End column-->
			</div><!--End row-->
		</div><!--End container-->
		</section>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12" id="footerSpacer">
								<p>&nbsp;</p>

					</div><!--End column-->
				</div><!--End row-->
			</div><!--End container-->
			</section>

</main>

</div> <!--End Page Content Wrapper-->
<script src="js/app.js"></script>
</body>
</html>
