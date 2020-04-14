
 <?php

$nameFilter = '';
$startingWith = false;
$friendsArray = array();

 if(isset($_POST['sub'])){

    if(isset($_POST['name']) && !empty($_POST['name'])){
    $name = $_POST['name'];
    $file = fopen( "friends.txt", "a" );
    fwrite( $file, $name.PHP_EOL);


}
}

?>
 <form action="index.php" method="post">
    <input type="text" name="name">
    <input type="submit" value="Add New Friend" name="sub">
 </form>


<?php
	    


	if(isset($_POST['nameFilter']) && !empty($_POST['nameFilter'])){
        $nameFilter = $_POST['nameFilter'];

        if(isset($_POST['startingWith'])){
        $fh = fopen( "friends.txt", "r" );
        while ($line = fgets($fh)) {
            array_push($friendsArray,$line);
        }

        echo "<ul>";
        for($i=0; $i< count($friendsArray) ; $i++){

            if(strpos($friendsArray[$i],$nameFilter)===0){
        ?> <li><?php echo $friendsArray[$i] ?>
    <form method="post" action="index.php" style="display:inline-block;">
     <button type='submit' name='delete' value=<?php echo $i; ?>>Delete</button>
    </form>
    </li><?php

            }

        }

        echo "</ul>";

    }else{
                $fh = fopen( "friends.txt", "r" );
        while ($line = fgets($fh)) {
            array_push($friendsArray,$line);
        }

        echo "<ul>";
        for($i=0; $i< count($friendsArray) ; $i++){

            if(strstr($friendsArray[$i],$nameFilter)){
                    ?> <li><?php echo $friendsArray[$i] ?>
    <form method="post" action="index.php" style="display:inline-block;">
     <button type='submit' name='delete' value=<?php echo $i; ?>>Delete</button>
    </form>
    </li><?php

            }

        }

        echo "</ul>";

    }





	}else{

$fh = fopen('friends.txt','r');
 echo "<h1>My Best Friends:</h1>";
 echo "<ul>";
while ($line = fgets($fh)) {
   array_push($friendsArray,$line);
}

if(isset($_POST['delete'])){
        $index = $_POST['delete'];
          unset($friendsArray[$index]);
        $friendsArray = array_values($friendsArray);
            $file = fopen( "friends.txt", "w" );

for($i=0; $i< count($friendsArray) ; $i++){
    $value = trim($friendsArray[$i]);

     if(!empty($value)){
        fwrite( $file, $value.PHP_EOL);
    }

    ?> <li><?php echo $friendsArray[$i] ?>
    <form method="post" action="index.php" style="display:inline-block;">
     <button type='submit' name='delete' value=<?php echo $i; ?>>Delete</button>
    </form>
    </li><?php


}
}else{

    for($i=0; $i< count($friendsArray) ; $i++){
            $value = trim($friendsArray[$i]);

     if(!empty($value)){


    ?> <li><?php echo $value ?>
    <form method="post" action="index.php" style="display:inline-block;">
     <button type='submit' name='delete' value=<?php echo $i; ?>>Delete</button>
    </form>
    </li><?php
}


}

}


}

?>
<form action="index.php" method="post">
    <input type="text" name="nameFilter" value="<?= $nameFilter ?>">
<input type="checkbox" name="startingWith" <?php if ($startingWith=='TRUE') echo "checked"?> value="TRUE">Only names starting with</input>
    <input type="submit" value="Filter List" name="filter">
 </form>
 


