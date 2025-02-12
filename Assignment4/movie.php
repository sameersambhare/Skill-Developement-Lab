<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movie Name</title>
</head>
<body>
    <h2>Search Movie Name</h2>

    <?php
          $movie_names = array(
               "Inception",
               "The Dark Knight",
               "Interstellar",
               "The Matrix",
               "Pulp Fiction"
          );

          if(isset($_POST['search_name']))
          {
            $search_name = $_POST['search_name'];
            $present = in_array($search_name, $movie_names);
          

          if($present)
          {
            echo "<p>The movie '$search_name' is present in the list.</p>";
          }
          else
          {
            echo "<p>The movie '$search_name' is not present in the list.</p>";
          }
        }
          ?>

          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
               <label for="search_name">Enter a movie name to search:</label>
               <input type="text" name="search_name" id="search_name"/>
               <button type="submit">Search</button>
          </form>
</body>
</html>