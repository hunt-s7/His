<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
</head>
<body>
<?php

include "connection.php";

$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$pass=$_POST['pass'];
$cpass=$_POST['c_pass'];

// Password not match 
if($pass != $cpass)
{
    ?>
    <script>
        alert("Password do not match!");
        window.location="registration_page.html";
    </script>
    <?php
}

// email or phone already used
$alreadyQuery = "select email,phone from register where email='$email' or phone='$phone'";
$resultQuery = mysqli_query($conn,$alreadyQuery);
$countTuples = mysqli_num_rows($resultQuery);

if($countTuples>0 or $email=="")
{
    ?>
    <script>
        window.location="registration_page.html";
    </script>
    <?php
}


echo "Welcome...";
echo $f_name;
echo ", You are Registered!";
echo "<br>";

// Entry query :- (to be entered in DataBase)
$insertQuery="insert into register(firstname,lastname,email,phone,gender,age,password) values ('$f_name','$l_name','$email',$phone,'$gender','$age','$pass')";
$resultQuery=mysqli_query($conn,$insertQuery);

// Print DataBase
$selectQuery="select * from register";
$resultQuery=mysqli_query($conn,$selectQuery);
$count=mysqli_num_rows($resultQuery);

?>

<table>
<?php
while($row=mysqli_fetch_assoc($resultQuery))
{
    ?>
    <tr>
        <td><div> <?php echo $row['Rid'] ?> </div></td>
        <td><div> <?php echo $row['firstname'] ?> </div></td>
        <td><div> <?php echo $row['lastname'] ?> </div></td>
        <td><div> <?php echo $row['email'] ?> </div></td>
        <td><div> <?php echo $row['phone'] ?> </div></td>
        <td><div> <?php echo $row['gender'] ?> </div></td>
        <td><div> <?php echo $row['age'] ?> </div></td>
        <td><div> <?php echo $row['password'] ?> </div></td>
    </tr>
    <?php
}
?>
</table>

</body>
</html>