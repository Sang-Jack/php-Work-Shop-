<?php

/* ======================================================
   PHP Calculator example using "sticky" form (Version 1)
   ======================================================
   Author : P Chatterjee (adopted from an original example written by C J Wallace)
   Purpose : To multiply 2 numbers passed from a HTML form and display the result.
   input:
      x, y : numbers
      calc : Calculate button pressed
   Date: 15 Oct 2007
*/

/*======================================================
   PHP Calculator example using "sticky" form (Version 2)
   ======================================================
Author : P Chatterjee (adopted from an original example written by C J Wallace) 
Develop by : Sang Ngo (19037878)
   Purpose : To do basic arithmetic calculator passed from a HTML form and display the result.
   input:
      x, y : numbers
      calc : Calculate button pressed
   Date: 23 Oct 2020
*/

// grab the form values from $_HTTP_GET_VARS hash
extract($_GET);

// first compute the output, but only if data has been input
if(isset($calc)) { // $calc exists as a variable

// matching int pattern for $x and $y
if( preg_match('/^\d+$/', $x) && preg_match('/^\d+$/', $y)){

   // if $op equal to + then do sum
   if($op=='+')
   $prod = $x + $y;
   
   // if $op equal to * then do Multiply
   else if($op=='*')
   $prod = $x * $y;
   
   // if $op equal to - then do subtract
   else if($op=='-')
   $prod = $x - $y;
   
   // if $op equal to + and $y nto equal to 0 then do division
   else if($op=='/' && $y!=0)
   $prod = $x / $y;
   }
   
   else {
   echo "x,y should numeric";
   }
   }
   else { // set defaults
   $x=0;
   $y=0;
   $prod=0;
   $op=1;
   }
   
   ?>

<html>
   <head>
      <title>PHP Calculator Example</title>
   </head>

   <body>

      <h3>PHP Calculator (Version 1)</h3>

      <p>Basic Arithmetic Calculator</p>

      <form method="get" action="<?php print $_SERVER['PHP_SELF']; ?>">

         <!--input x value-->
         x = <input type="text" name="x" size="5" value="<?php print $x; ?>"/>

   <!--create a drop down list between  each operator-->
   <select name="op">
<!-- if $op is equal to + or _ or / or * then return selected -->
   <option value="+" <?=($op=="+")?"selected":""?>>+</option>
   <option value="-" <?=($op=="-")?"selected":""?>>-</option>
   <option value="*" <?=($op=="*")?"selected":""?>>*</option>
   <option value="/" <?=($op=="/")?"selected":""?>>/</option>
</select>

         <!--input y value-->
         y =  <input type="text" name="y" size="5" value="<?php  print $y; ?>"/>

         <!--create a submit button-->
         <input type="submit" name="calc" value="Calculate"/>
         
      </form>

      <!-- print the result -->
      <?php if(isset($calc)) {
if( preg_match('/^\d+$/', $x) && preg_match('/^\d+$/', $y)){

// if $op equal to + and $y equal to 0 then print the answer is infinity
if($op=='/' && $y==0)
print "the answer is &#8734;";
// or else print result
else
print "<p>x $op y = $prod</p>";

}
} ?>
</body>
</html>