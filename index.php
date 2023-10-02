<style>
    * {
    margin: 0px;
    padding: 0px;
}

.container {
    max-width: 80%;
    background-color: violet;
    padding: 34px;
    margin: auto;
}

.container h3, p {
    text-align: center;
}

input, textarea {
    width: 80%;
    margin: 11px 0px;
    padding: 7px;
    font-size: 16px;
    border-radius: 10px;
}

form {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}

.btn {
    color: white;
    background-color: purple;
    padding: 4px;
    border-radius: 10px;
}
</style>
<div class="container">
        <h3>Welcome to Trip Form</h3>
        <p>Enter your details and submit this form to confirm your particpation in the trip</p>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>

    <script src="./scripts/index.js"></script>
<?php
    if (isset($_POST['name'])) {
        $host = "containers-us-west-103.railway.app";
        $server = "mysql://root:v4LZnei8iHdYDGGhcc4F@containers-us-west-103.railway.app:7885/railway";
        $dbname = "railway";
        $username = "root";
        $password = "v4LZnei8iHdYDGGhcc4F";
        $port = 7885;
    
        $con = mysqli_connect($host, $username, $password, $dbname, $port);

    
        if (!$con) {
            die("Connection to this database failed due to" . mysqli_connect_error());
        }
        else {
            echo 'Succesfuuly Connected';
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $desc = $_POST['desc'];
            $sql = "INSERT INTO `railway`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    
            echo $sql;
    
            if ($con->query($sql) == true) {
                echo "Successfully inserted";
            }
            else {
                echo "Unscuessully Inserted";
            }
    
            $con->close();
        }
    }
?>