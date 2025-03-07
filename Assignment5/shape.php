<?php
class Shape {
    public function getArea() {
        return 0;
    }
}

class Triangle extends Shape {
    private $base, $height;
    
    public function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;
    }
    
    public function getArea() {
        return 0.5 * $this->base * $this->height;
    }
}

class Square extends Shape {
    private $side;
    
    public function __construct($side) {
        $this->side = $side;
    }
    
    public function getArea() {
        return $this->side * $this->side;
    }
}

class Circle extends Shape {
    private $radius;
    
    public function __construct($radius) {
        $this->radius = $radius;
    }
    
    public function getArea() {
        return pi() * pow($this->radius, 2);
    }
}

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shapeType = $_POST["shape"];
    if ($shapeType == "triangle") {
        $shape = new Triangle($_POST["base"], $_POST["height"]);
        $result = "The area of the Triangle is: " . $shape->getArea();
    } elseif ($shapeType == "square") {
        $shape = new Square($_POST["side"]);
        $result = "The area of the Square is: " . $shape->getArea();
    } elseif ($shapeType == "circle") {
        $shape = new Circle($_POST["radius"]);
        $result = "The area of the Circle is: " . $shape->getArea();
    } else {
        $shape = new Shape();
        $result = "Invalid shape selected.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shape Area</title>
</head>
<body>
    <h2>Select a Shape</h2>
    <form method="post">
        <input type="radio" name="shape" value="triangle" required> Triangle <br>
        <input type="radio" name="shape" value="square"> Square <br>
        <input type="radio" name="shape" value="circle"> Circle <br><br>
        
        <label>Base (Triangle):</label>
        <input type="number" name="base"><br>
        
        <label>Height (Triangle):</label>
        <input type="number" name="height"><br>
        
        <label>Side (Square):</label>
        <input type="number" name="side"><br>
        
        <label>Radius (Circle):</label>
        <input type="number" name="radius"><br>
        
        <button type="submit">Calculate</button>
    </form>
    <p><?php echo $result; ?></p>
</body>
</html>
