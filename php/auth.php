    <?php
    session_start();

    if(isset($_POST['g-recaptcha-response'])){
        $recapcha = $_POST['g-recaptcha-response'];

        if($_POST['email'] =='' || $_POST['password'] ==''){
            echo "Поля не заполнены";

        }
        elseif (!$recapcha){
    
            echo "Пройдите капчу";
    }
        else{
            $secretKey = '6Ldrov0pAAAAAB3SgH5-6aiGcCm3kZkRBkzfs_uv';
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' .$secretKey . '&response=' .$recapcha;
            $response = json_decode(file_get_contents($url), true);

            if($response['success']){
                $_email = $_POST['email'];
                $_password = $_POST['password'];
                $mysql=mysqli_connect('localhost','root','','horizon');
                $_provlog = mysqli_query($mysql,"SELECT * FROM users WHERE email = '$_email' AND  password = '$_password'");
                if(mysqli_num_rows($_provlog) >= 1){
                    $_userin = mysqli_fetch_assoc($_provlog);
                    $_SESSION["userinfo"]=[
                        "name" => $_userin["name"],
                        "surname" => $_userin["surname"],
                        "email" => $_userin["email"],
                        "number" => $_userin["number"],
                        "id_user" => $_userin["id_user"],      
                        "password"  => $_userin["password"],
                        "poezdki"  => $_userin["trips"],
                        "role"  => $_userin["role"]
                    ];
                    header("Location: ../account.php");
                }
            }
        }
    }
    else {
        echo "Такой аккаунт не существует";
    }
    ?>
