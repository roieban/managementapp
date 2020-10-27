<?php 
$conn = mysqli_connect('bvbnvv5bsatlr4clabku-mysql.services.clever-cloud.com','udeu6vn0ie2a7qfj','lHDvTl7q6kmkCE2bG6Z5','bvbnvv5bsatlr4clabku');
$email = $_POST['email'];
$pass = $_POST['pass'];

$stm = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $stm);
if ($result == true) {
    $user = mysqli_fetch_array($result);
    if (password_verify($pass, $user['pass'])) {
        session_start();
        $_SESSION['user'] = $user['id'];
        $response = array(
            'response' => 'true',

        );
    } else {
        $response = array(
            'response' => 'false'
        );
    }
}
die(json_encode($response));

?>