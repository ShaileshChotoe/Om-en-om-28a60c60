<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/master.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  </body>
</html>

<?php

$dom = new DOMDocument('1.0', 'utf-8');
$vakjes = array();

$ammount = 8;

CreateTable($ammount);
ChangeColors("black", "white");

echo $dom->saveXML();

function CreateTable($colums_and_rows)
{
  global $vakjes;
  global $dom;

  $table = $dom->createElement('table');
  $table->setAttribute("class", "table");
  $dom->appendChild($table);

  for ($i=0; $i < $colums_and_rows; $i++)
  {
    $tr = $dom->createElement('tr');
    $tr->setAttribute("class", "tr");
    $table->appendChild($tr);
    for ($j=0; $j < $colums_and_rows; $j++)
    {
      $td = $dom->createElement('td');
      $tr->appendChild($td);
      $td->setAttribute("class", "td");
      array_push($vakjes, $td);
    }
  }

}

function ChangeColors($color1, $color2)
{
  global $ammount;
  global $vakjes;
  $endNum = $ammount - 1;
  $switch = false;
  for($i = 0; $i < count($vakjes); $i++)
  {
    if ($switch)
    {
      $vakjes[$i]->setAttribute("style", "background: $color1;");
    }
    else
    {
      $vakjes[$i]->setAttribute("style", "background: $color2;");
    }
    if ($i == $endNum)
    {
      $switch = !$switch;
      $endNum = $endNum + $ammount;
    }
    $switch = !$switch;
  }
}




 ?>
