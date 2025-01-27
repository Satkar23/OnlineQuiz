<?php
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play:400,700">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

body {
    font-family: 'Play', sans-serif;
    background-color: #2321;
}
.body {
    max-width: 500px;
    margin: 0 auto;
    background:#ccc;
    padding: 50px;
    border-radius: 15px;
}

.header h3 {
    color: #000;
    font-size: 26px;
    margin-bottom: 20px;
    text-align: center;
}
.form-control {
    margin-bottom: 25px;
}

.btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 30px;
    border-radius: 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #00ff;
    color: #fff;
}

.alert {
    margin-top: 10px;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}

    </style>
</head>
<body>
   <div class="body">
            <div class="header">
                <h3>Register Now</h3>
            </div>
            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" name="form1" method="post" >
                            <div class="info">
                                <div class="fm">
                                    <label>FirstName</label>
                                    <input type="text" name="firstname" class="form-control" required>
                                </div>
                                <div class="lm">
                                    <label>LastName</label>
                                    <input type="text" name="lastname" class="form-control" required>
                                </div>
                                <div class="um">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="em">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="pw">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn">Register</button>
                            </div>
                            <div class="alert alert-success" id="success" style="margin-top:10px; display:none;">
                                <strong>Success!</strong> Account Registered Successfully.
                            </div>
                            <div class="alert alert-danger" id="failed" style="margin-top:10px; display:none;">
                                <strong>Already Exist</strong> The user name is Already Taken.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<?php
    if(isset($_POST["submit"])){
        $count=0;
        $res=mysqli_query($link,"select * from register where username='$_POST[username]'") or die(mysqli_error($link)) ;
        $count=mysqli_num_rows($res);
        if($count>0)
        {
            ?>
             <script type="text/javascript">
                 document.getElementById("success").style.display="none";
                document.getElementById("failed").style.display="block";
            </script>
             <?php
        }
        else{
            mysqli_query($link,"insert into register values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[email]','$_POST[password]')"); 
            ?>
            <script type="text/javascript" >
                document.getElementById("failed").style.display="none";
                document.getElementById("success").style.display="block";
            </script>
             <?php
        }
    }
?>
</body>
</html>