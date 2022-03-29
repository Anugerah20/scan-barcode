<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="barcode">
   <title>QR Code</title>

   <!-- Barcode CSS -->
   <link rel="stylesheet" href="assets/css/barcode.css" />

   <!-- Font Mulish -->
   <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>
   <div class="container">

      <div class="text-center">
         Generator <span class="text-qr">QR Code</span>
      </div>

      <div class="parent-input">

         <form method="POST">
            <input type="text" name="barcode" class="input-scan" placeholder="Send Link You" required oninvalid="this.setCustomValidity('Enter Link URL Here')" oninput="setCustomValidity()" />

            <button type="submit" name="submit" class="btn-send">Generate QR</button>
         </form>
      </div>
      <br />

      <!-- Membuat Barcode -->
      <?php
      include "phpqrcode/qrlib.php";

      $temp = "temp/";
      if (!file_exists($temp))
         mkdir($temp);

      if (isset($_POST["submit"])) {
         $text = $_POST["barcode"];

         $body_text  = $text;
         $namefile  = "QR-Code" . ".png";
         $quality   = 'H'; // L (low), M (Medium), Q (Good), H (Height)
         $size     = 10;
         $padding   = 0;
         QRCode::png($body_text, $temp . $namefile, $quality, $size, $padding);

         echo '<img src="temp/' . $namefile . '">';
      }
      ?>
   </div>

</body>

</html>