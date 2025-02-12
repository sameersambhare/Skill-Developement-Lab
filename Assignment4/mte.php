<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search College Name</title>
</head>
<body>
    <h2>Search College Name</h2>

    <?php
          $collge_names=array(
               "PCCOE",
               "COEP"
          );

          if(isset($_POST['search_name']))
          {
            $search_name=$_POST['search_name'];
            $present=in_array($search_name,$collge_names);
          

          if($present)
          {
            echo "<p>The name '$search_name' present</p>";
          }
          else
          {
            echo "<p>The name '$search_name' not present</p>";
          }
        }
          ?>

          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
               <label for="search_name">Enter a name of collge to search</label>
               <input type="text" name="search_name" id="search_name"/>
               <button type="submit">Search</button>
          </form>
</body>
</html>