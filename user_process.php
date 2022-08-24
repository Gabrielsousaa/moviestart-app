<?php
require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("models/Message.php");

$message = new Message($BASE_URL);
$userDAO = new UserDAO($conn, $BASE_URL);


$type = filter_input(INPUT_POST, "type");


if ($type === "update") {
  $userData = $userDAO->verifyToken();

  $name = filter_input(INPUT_POST, "name");
  $lastname = filter_input(INPUT_POST, "lastname");
  $email = filter_input(INPUT_POST, "email");
  $bio = filter_input(INPUT_POST, "bio");

  $user = new User();

  $userData->name = $name;
  $userData->lastname = $lastname;
  $userData->email = $email;
  $userData->bio = $bio;

  if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

    $image = $_FILES["image"];
    $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
    $jpgArray = ["image/jpeg", "image/jpg"];

    // Checagem de tipo de imagem
    if (in_array($image["type"], $imageTypes)) {

      // Checar se jpg
      if (in_array($image, $jpgArray)) {

        $imageFile = imagecreatefromjpeg($image["tmp_name"]);

        // Imagem é png
      } else {
        if ($imageFile = imagecreatefrompng($image["tmp_name"]) === false) {
          $message->setMessage("Tipo inválido de imagem, insira png!", "error", "back");
        } else {
          $imageFile = imagecreatefrompng($image["tmp_name"]);
        }
      }

      $imageName = $user->imageGenerateName();

      imagejpeg($imageFile, "./img/users/" . $imageName, 100);

      $userData->image = $imageName;
    }
  }

  $userDAO->update($userData);
} else if ($type === "changepassword") {
} else {
  $message->setMessage("Informações inválidas", "error", "index.php");
}
