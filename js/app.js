//========================================
// RISK Roller by Dan Guinn
// July, 2016
//========================================

$( document ).ready(function(event) {

  //Assure troop amount reset on page load
  $("#p1TroopNum").val(0);
  $("#p1DiceNum").val(3);
  $("#p2TroopNum").val(0);
  $("#p2DiceNum").val(3);
  $("#rollCount").val(0);
  $("#rollDice").prop("disabled",false);

  $("#reset").click(function(){
    location.reload();
  });

  function assessTroops(baracks, troopNum){
      $(baracks).html("");
      $(""+baracks+"Amts").html("Optimum Troops: ");
      var tens=0;
      var fives=0;
      var ones=0;
      if(troopNum>=10){
         tens = Math.floor(troopNum/10);
         troopNum = troopNum - (tens*10);
         $(""+baracks+"Amts").append(" "+tens+" cannons(s)");
         for(i=0; i<tens; i++){
           $(baracks).append("C "); //1
         }

      }
      if(troopNum>=5){
         fives = Math.floor(troopNum/5);
         troopNum = troopNum - (fives*5);
         if(tens>=1){
           comma=",";
         }else{
           comma="";
         }

         $(""+baracks+"Amts").append(comma+" "+fives+" calvary");
         for(i=0; i<fives; i++){
           $(baracks).append("B "); //7
         }
      }

      if(tens>=1 || fives>=1){
        comma=",";
      }else{
        comma="";
      }

      ones = troopNum;
      if(troopNum>=1){
        $(""+baracks+"Amts").append(comma+" "+ones+" infantry");
      }

      for(i=0; i<ones; i++){
        $(baracks).append("A "); //O
      }
      //console.log("10s: "+tens+" 5s:"+fives+" 1s:"+ones);
  }


  $("#p1TroopNum").change(function(){
      assessTroops("#p1Troop",$(this).val());
  });
  $("#p2TroopNum").change(function(){
      assessTroops("#p2Troop",$(this).val());
  });


  $("#rollDice").click(function(){

    var p1DiceNum = $("#p1DiceNum option:selected").val();
    var p1TroopNum = $("#p1TroopNum").val();
    var p2DiceNum = $("#p2DiceNum option:selected").val();
    var p2TroopNum = $("#p2TroopNum").val();

    //Check for forgotten troop amount setting
    if(p1TroopNum<=0){
        alert("Player 1 has no troops!");
        exit();
    }
    if(p2TroopNum<=0){
        alert("Player 2 has no troops!");
        exit();
    }

    if(p1TroopNum==3){
        if(p1DiceNum>2){
          $("#p1DiceNum").val(2);
          $("#p1diceAdjust").html("Player 1's forces have fallen below the attack level. The dice amount has been set to two dice.");
        }
    }

    if(p1TroopNum==2){
        if(p1DiceNum>1){
          $("#p1DiceNum").val(1);
          $("#p1diceAdjust").html("Player 1's forces have fallen below the attack level. The dice amount has been set to one dice.");
        }
    }

    if(p2TroopNum==2){
        if(p2DiceNum>2){
          $("#p2DiceNum").val(2);
          $("#p2diceAdjust").html("Player 2's forces have fallen below the defence level. The dice amount has been set to two dice.");
        }
    }

    if(p2TroopNum==1){
        if(p2DiceNum>1){
          $("#p2DiceNum").val(1);
          $("#p2diceAdjust").html("Player 2's forces have fallen below the defence level. The dice amount has been set to one dice.");
        }
    }



    //console.log("p1" + p1DiceNum);
    //console.log("p2" + p2DiceNum);
    $("#player1Dice").html("");
    $("#player2Dice").html("");

    //Roll Dice
    var p1RollArray=[];
    var p2RollArray=[];

    for(i=0; i<p1DiceNum; i++){
        var roll = Math.floor(Math.random() * (6 - 1) + 1);
        p1RollArray[i]=roll;
    }

    for(i=0; i<p2DiceNum; i++){
        var roll = Math.floor(Math.random() * (6 - 1) + 1);
        p2RollArray[i]=roll;
    }

    p1RollArray.sort();
    p1RollArray.reverse();
    p2RollArray.sort();
    p2RollArray.reverse();

    //$("#player1Dice").append("Player I &nbsp;Roll: ");
    //$("#player2Dice").append("Player II&nbsp;Roll: ");

    for(i=0; i<p1RollArray.length; i++){
      $("#player1Dice").append(" "+p1RollArray[i]+" ");
    }

    for(i=0; i<p2RollArray.length; i++){
      $("#player2Dice").append(" "+p2RollArray[i]+" ");
    }

    //console.log("p1: "+p1RollArray);
    //console.log("p2: "+p2RollArray);

    var p1WinScore=0;
    var p1LossScore=0;
    var p2WinScore=0;
    var p2LossScore=0;

    //Array Comparison
    for(i=0; i<3; i++){
      if(typeof p1RollArray[i] !== 'undefined' && typeof p2RollArray[i] !== 'undefined') {
          //Player 1 wins in a tie
          if(p1RollArray[i] > p2RollArray[i]){
            p1WinScore++;
            p2LossScore++;
            p2TroopNum--;
            //console.log("Player 1 wins: " + p1RollArray[i] + ">" + p2RollArray[i]);
          }else{
            p2WinScore++;
            p1LossScore++;
            p1TroopNum--;
            //console.log("Player 2 wins: " + p2RollArray[i] + ">=" + p1RollArray[i]);
          }
      }

    }
    if(p1TroopNum<=0){
      $("#p1TroopNum").val(0);
    }else {
      $("#p1TroopNum").val(p1TroopNum);
    }
    if(p2TroopNum<=0){
      $("#p2TroopNum").val(0);
    }else {
      $("#p2TroopNum").val(p2TroopNum);
    }

    //console.log($("#p1TroopNum").val());
    //console.log($("#p2TroopNum").val());
    assessTroops("#p1Troop",$("#p1TroopNum").val());
    assessTroops("#p2Troop",$("#p2TroopNum").val());


    var p1Outcome = "<p>The Attacker wins "+p1WinScore+" dice rolls and loses "+p1LossScore+" armies.</p>";
    var p2Outcome = "<p>The Defender wins "+p2WinScore+" dice rolls and loses "+p2LossScore+" armies.</p>";
    $("#player1score").html(p1Outcome); //Player 1
    $("#player2score").html(p2Outcome); //Player 2

    //Check for win!
    if($("#p2TroopNum").val()<=0){
      $("#player1win").html("<p class='RISK'>Attacker Wins the Battle!</p>");
      (function blink() {
          $('#player1win').fadeOut(500).fadeIn(500, blink);
      })();
      $("#rollDice").prop("disabled",true);
    }

    if($("#p1TroopNum").val()<=1){
      $("#player2win").html("<p class='RISK'>Defender Wins the Battle!</p>");
      (function blink() {
          $('#player2win').fadeOut(500).fadeIn(500, blink);
      })();
        $("#rollDice").prop("disabled",true);
    }



    //History
    var rollCount = $("#rollCount").val();
    rollCount++;
    $("#rollCount").val(rollCount);

    var history = "<p> Roll #"+rollCount+":</p>"+p1Outcome+p2Outcome;

    $("#rollHistory div").prepend(history);
  });

}); //End document ready
