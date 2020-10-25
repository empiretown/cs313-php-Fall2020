<?php
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$Address =$_POST['addr'];
$city = $_POST['city'];
$ids= ['chkUser1'];

require ("connect-db.php");
$db = get_db;

try
{
	// Add the Scripture

	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO user1 (first_name, last_name, username, password, Address, city) VALUES(:first_name, :last_name, :username, :password, :Address, :city)';
	$statement = $db->prepare($query);

	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':first_name', $first_name);
	$statement->bindValue(':last_name', $last_name);
	$statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':Address', $Address);
    $statement->bindValue(':city', $city);
    

	$statement->execute();

	// get the new id
	$id = $db->lastInsertId("user1_id_seq");

	// Now go through each topic id in the list from the user's checkboxes
	foreach ($ids as $id)
	{
		echo "id: $id";

		// Again, first prepare the statement
		$statement = $db->prepare('INSERT INTO User1(id) VALUES(:id)');

		// Then, bind the values
		$statement->bindValue(':id', $id);
		$statement->bindValue(':id', $id);

		$statement->execute();
	}
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: user.php");

die(); 

?>