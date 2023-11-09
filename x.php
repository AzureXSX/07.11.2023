
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table, th, td {
          border: 1px solid black;
          padding: 2px;
        }
    </style>
</head>


<body>
    

<?php

$students = array (
    array("Name","Age","Math", "Eng", "CS"),
    array("Alex",18,4, 5, 5),
    array("Bob",19,5, 4, 5),
    array("Tom",20,5, 5, 4),
  );


  echo "<table>";
  echo "<tr> <td>" . $students[0][0] . " </td><td>" . $students[0][1] . " </td><td>" . $students[0][2] . " </td><td>" . $students[0][3] . " </td><td>" . $students[0][4] . " </td></tr>";
  echo "<tr> <td>" . $students[1][0] . " </td><td>" . $students[1][1] . " </td><td>" . $students[1][2] . " </td><td>" . $students[1][3] . " </td><td>" . $students[1][4] . " </td></tr>";
  echo "<tr> <td>" . $students[2][0] . " </td><td>" . $students[2][1] . " </td><td>" . $students[2][2] . " </td><td>" . $students[2][3] . " </td><td>" . $students[2][4] . " </td></tr>";
  echo "<tr> <td>" . $students[3][0] . " </td><td>" . $students[3][1] . " </td><td>" . $students[3][2] . " </td><td>" . $students[3][3] . " </td><td>" . $students[3][4] . " </td></tr>";
  echo "</table>";



  $matricX = array(
    array(1,2,3,4,5),
    array(4,2,8,4,9),
    array(3,1,0,2,1),
    array(5,6,3,1,5),
    array(9,3,8,7,5),
  );

  $matricY = array(
    array(1,2,3,4,5),
    array(4,2,8,4,9),
    array(3,1,0,2,1),
    array(5,6,3,1,5),
    array(9,3,8,7,5),
  );


  function SumMatric($mX, $mY, $size){
    $matricA = [[]];

    for($i = 0; $i < $size; $i++)
    {
        for($j = 0; $j < count($mX[0]); $j++){
            
            $matricA[$i][$j] = $mX[$i][$j] + $mY[$i][$j];
        }
    }
    return $matricA;
  }


  $matricA = SumMatric($matricX, $matricY, 5);


  echo "<table>";
  for($i = 0; $i < 5; $i++)
  {
    echo "<tr>";
      for($j = 0; $j < count($matricA[0]); $j++){
          echo "<td>" . $matricA[$i][$j] . "</td>";
      }
    echo "</tr>";
  }
  echo "</table>";


  $products = array(
    new Product("Product #1", 99.99, "Description"),
    new Product("Product #2", 129.99, "Description"),
    new Product("Product #3", 199.99, "Description"),
    new Product("Product #4", 59.99, "Description"),
    new Product("Product #5", 39.99, "Description"),
    new Product("Product #6", 29.99, "Description"),
  );


  class Product{
    public $name;
    public $price;
    public $description;

    function __construct($name, $price, $description){
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }
  }

  function compareNameAsc($a, $b) {
    return strcasecmp($a->name, $b->name);
  }
  function compareNameDesc($a, $b) {
    return strcasecmp($b->name, $a->name);
  }
  function comparePriceAsc($a, $b) {
    return $a->price - $b->price;
    }
    function comparePriceDesc($a, $b) {
        return $b->price - $a->price;
    }

    function filterPrice($priceCap, $products){
        $masX = [];

        for($i = 0; $i < count($products); $i++){
            if($products[$i]->price < $priceCap){
                array_push($masX, $products[$i]);
            } 
        }

        return $masX;
    }

    $xmas = filterPrice(100, $products);

    usort($products, 'comparePriceAsc');


    for($i = 0; $i < count($xmas); $i++)
    {
        echo $xmas[$i]->price . "<br>";
    }

    class Team{
        public $name;
        public $wins;
        public $loses;

        function __construct($name, $wins, $loses){
            $this->name = $name;
            $this->wins = $wins;
            $this->loses = $loses;
        }
    }

    $teams = array(
        new Team("Team #1", 2, 8),
        new Team("Team #2", 5, 8),
        new Team("Team #3", 22, 8),
        new Team("Team #4", 18, 8),
        new Team("Team #5", 3, 8),
    );

    function compareWinsDesc($a, $b) {
        return $b->wins - $a->wins;
    }
    usort($teams, 'compareWinsDesc');


    for($i = 0; $i < count($teams); $i++)
    {
        echo $teams[$i]->name . " | Wins = ". $teams[$i]->wins. "<br>";
    }


    function AddProduct($mas, $id, $name, $price){
        array_push($mas, array($id, $name, $price));
        return $mas;
    }

    function RemoveProduct($mas, $id){
        $count = 0;
        foreach($mas as $productx){
            if($productx[0] === $id){
                unset($mas[$count]);
            }
            $count++;
        }
        return $mas;
    }

    function CalcSum($mas){
        $sum = 0;
        foreach($mas as $productx){
            $sum += floatval($productx[2]);
        }

        echo "Sum = " . $sum . "$ <br>";
    }


    $goods = array(
        array("id", "name", "price"),
    );

    $goods = AddProduct($goods, 1, "Product #1", 99.99);
    $goods = AddProduct($goods, 2, "Product #2", 500);
    $goods = AddProduct($goods, 3, "Product #3", 1000);


    $goods = RemoveProduct($goods, 2);

    echo "<table>";
   foreach($goods as $productx){
        echo "<tr><td>". $productx[0] . "</td> <td>" . $productx[1] . "</td><td> " . $productx[2] . "</td></tr>";
   }
   echo "<table>";

   CalcSum($goods);

?>
</body>
</html>
