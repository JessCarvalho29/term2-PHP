<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My First PHP Document</title>
    <meta name="description" content="This is the introduction to using PHP">
  </head>
  <body>
    <!-- one thing that is really nice about PHP is that we can inject it anywhere we what to in a document. In order to add PHP we simply need to add the PHP tag. Just like the below example. -->
    <?php
      // this is how we comment in PHP.
      // inside of the opening and closing PHP tags is where we add the PHP we want to use. Let's start with something simple!
      echo "<h1>Hello World!!</h1>";
      // next lets say we are not sure what type of server config we are working with. We can check it with the follow pre-made function.
      //phpinfo();
      // we can also use PHP to create whole sections of content.
      echo "<section>";
      echo "<h2>My First Section of Content With PHP</h2>";
      echo "<p>Welcome to \"Introduction to Web Programming using PHP\"</p>";
      echo "</section>";
      // we can also use PHP to do our math for us!
     // echo(pi());
      // wanna figure out the square root of something?
      echo "</br>";
     // echo(sqrt(64));
      /*
      In PHP you can also make multiple line comments by using this format.
      In the above examples we see how we can output simple strings and HTML elements. 
      In our next example let's look at how we can use PHP operators to run calculations.
      */
      // First let's do 5 x 5
      echo "</br>";
      //echo 5 * 5;
      echo "</br>";
      // let's add another operator
      //echo 3 + 5 / 2;
      echo "</br>";
      // Now let's step it up one more time
      //echo (3 + 5) / 2 * 10 + 50 - 4 / 2;
     /* Rules for PHP variables:
        A variable starts with the $ sign, followed by the name of the variable
        A variable name must start with a letter or the underscore character
        A variable name cannot start with a number
        A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )
        Variable names are case-sensitive ($age and $AGE are two different variables)*/
      echo "</br>";
      //$name = 'Fagun';
      //echo $name;
    ?>
  </body>
</html>
