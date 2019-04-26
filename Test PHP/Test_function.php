<html>
 <head>
  <title>Test of php json function</title>
  <?php require_once("CapStoneClasses.php"); ?>
  <?php require_once("DatabaseConn.php"); ?>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; ?> 
 <?php 
    // Get the role with ID = 3 (customer)
    $Json_conversion -> json_encoded_array_test();
  ?>
</body>
</html>