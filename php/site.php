<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</form>

<br>
<?php
class Chef {
  function makeChicken () {
    echo "The chef is making chicken<br>";
  }

  function makeSalad () {
    echo "The chef is making salad<br>";
  }

  function makeSpecial () {
    echo "The chef is making Ghana Jollof<br>";
  }
}

class JamaicanChef extends Chef {
  function makeBeefJeky() {
    echo "The chef is making beef jeky<br>";
  }

  function makeGoatStew() {
    echo "The chef is making goat stew<br>";
  }

  // function override
  function makeSpecial () {
    echo "The chef is making Smoked Turkey<br>";
  }
}

$chefPhilip = new Chef;
$chefPhilip->makeSpecial();

$chefMaley = new JamaicanChef();
$chefMaley->makeSalad();
$chefMaley->makeGoatStew();
$chefMaley->makeSpecial();
?>

</body>
</html>

flex justify-end py-2 pr-4 text-lg hover:bg-blue-500

<div className="flex flex-col justify-end gap-8 pt-24 light-text dark-text">