<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="css.css" />
<title>Untitled Document</title>

</head>
<body>
 
     <h1> My Super Friends </h1>
   
    <form action="index.php" method="post">
       Nom : <input type="text" name="name2" >
       <input type="submit" name="envoi">
       <input type="text" name="nameFilter" value="<?php if(empty($_POST['nameFilter'])) $nameFilter = NULL;?>" >
       <input type="submit" name="envoi2">
    </form>

    <div>
    <?php
      $filename = 'friends.txt';
        if(isset($_POST['envoi2']))
        {
          echo "THE FILTOR IS:".$_POST['nameFilter']."<br/><br/><br/>";
          echo "\n";
        }
    
    

 // appending to file
    $name = $_POST['name2'];
    $file = fopen( $filename, "a" );
      if ("$name" != NULL) 
      {      
        fwrite( $file, "$name\n");
      }

    
    $file = fopen( $filename, "r" );
    $nameFilter = $_POST['nameFilter'];
    $file2 = fopen($filename, "r");


      while (!feof($file))
       {
          // reading file
        if ($nameFilter != NULL)
        {        

          if (strstr(fgets($file),"$nameFilter",false) != NULL)
          {

              $ligne =fgets($file2)."<br/>";
              echo $ligne;

          }
          else
          {
            fgets($file2);
          }
        }
        else
        {
          echo fgets($file)."<br/>";
        }
        
      }
    ?>
</div>
</body>
</html>







