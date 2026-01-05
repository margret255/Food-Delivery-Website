<?php
$plain = 'password123';
$hash = '$2y$10$wH1n7uOeW9kzR1vC2K6dWOkYy0Qq5HcKpYQz2Q0b7Vw2N6Q3Z6o7m';

if (password_verify($plain, $hash)) {
    echo "Password matches!";
} else {
    echo "Password does NOT match!";
}
?>
