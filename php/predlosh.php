<?php
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$conn = new mysqli('localhost', 'root', '', 'horizon');

if ($name == "" || $email == "") {
    echo 'Поля не заполнены';
} else {
    // Проверяем, есть ли запись в predlosh с таким email
    $sql = "SELECT COUNT(*) FROM predlosh WHERE email = '$email'";
    $result = $conn->query($sql);
    $count = $result->fetch_row()[0];

    if ($count > 0) {
        echo 'Такая почта уже занята';
    } else {
        // Добавляем новую запись в predlosh с пустым id_user
        $sql = "INSERT INTO predlosh (name, email) VALUES ('$name', '$email')";
        if ($conn->query($sql)) {
            // Проверяем, есть ли пользователь с таким email в users
            $sql = "SELECT id_user FROM users WHERE email = '$email'";
            $result = $conn->query($sql);
            $row = $result->fetch_row();
            $id_user = $row ? $row[0] : null;

            if ($id_user) {
                // Обновляем запись в predlosh, заполняя id_user
                $sql = "UPDATE predlosh SET id_user = $id_user WHERE email = '$email'";
                $conn->query($sql);
            }

        } 
    }
}

$conn->close();
?>
