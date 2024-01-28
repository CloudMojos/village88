<!-- 
Objectives:
To learn how to extract values in an associative array
To explore other built-in functions in PHP
To render output in html table
Supposed that you have an array of credit card information:

$users = array( 
   array(‘cardholder_name’=> “Michael Choi”, 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
   array(‘cardholder_name’=> “John Supsupin”,'cvc' => 789, 'acc_num' => ‘0001 1200 1500 1510'),
   array(‘cardholder_name’=> “KB Tonel”, 'cvc' => 567, 'acc_num' => ‘4568 456 123 5214'),
   array(‘cardholder_name’=> “Mark Guillen”, 'cvc' => 345, 'acc_num' => '123 123 123 123’) 
);

Create a program that outputs a table like this:  Make sure that to make it valid, the length of the full account should have exactly 19 digits. You may need to use a PHP function to count the digits, excluding spaces.
Add 5 more entries to $users array. For every 3rd row, highlight the row so that it shows a light gray background.

 -->

<?php 
   $users = array( 
      array('cardholder_name'=> "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
      array('cardholder_name'=> "John Supsupin",'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
      array('cardholder_name'=> "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
      array('cardholder_name'=> "Mark Guillen", 'cvc' => 345, 'acc_num' => '123 123 123 123') 
   );

   function print_user($index, $user) {
      echo "<tr>";
      echo "<td>";
      echo "$index";
      echo "</td>";
      echo "<td>";
      echo $user['cardholder_name'];
      echo "</td>";
      echo "<td>";
      echo strtoupper($user['cardholder_name']);
      echo "</td>";
      echo "<td>";
      echo strtoupper($user['acc_num']);
      echo "</td>";
      echo "<td>";
      echo $user['cvc'];
      echo "</td>";
      echo "<td>";
      echo $user['acc_num'] . $user['cvc'];
      echo "</td>";
      echo "<td>";
      echo count_num($user['acc_num'] . $user['cvc']);
      echo "</td>";
      echo "<td>";
      echo is_valid(count_num($user['acc_num'] . $user['cvc']));
      echo "</td>";
      echo "</tr>";
   }

   function is_valid($length) {
      return $length == 19 ? 'yes' : 'no'; 
   }

   function count_num($acc_num) {
      $acc_num = explode(' ', $acc_num);
      $acc_num = implode('', $acc_num);
      return strlen($acc_num);
   }

   function iterate_users($users) {
      foreach ($users as $index => $user) {
         print_user($index, $user);
      }
   }

   echo "<table>";
   echo "<thead>";
   echo "<tr>
            <td>ID</td>
            <td>Name</td>
            <td>Name in Uppercase</td>
            <td>Account Num</td>
            <td>CVC Num</td>
            <td>Full Account</td>
            <td>Length of Full Account</td>
            <td>Is Valid</td>
         </tr>";
   echo "</thead>";
   echo "<tbody>";
   iterate_users($users);
   echo "</tbody>";
   echo "</table>";
?>
 