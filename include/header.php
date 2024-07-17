<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Technical Digital Library</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/framework.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
  </head>
  <body>
    <!-- Start Header -->
    <div class="header" id="header">
      <div class="container">
        <a href="index.php" class="logo">المكتبة التقنية الرقمية</a>
        <ul class="main-nav">
          <li><a href="index.php">الرئيسية</a></li>
          <li><a href="uploadFile.php">رفع ملف</a></li>
          <li>
            <a href="allFiles.php">استعراض الملفات</a>
          </li>
          <?php
          if (!isset($_SESSION['user'])) { ?>
            <li>        <a href="login.php"><i class="fas fa-sign-in-alt"></i> </a></li>

          <?php }
          ?>

          <li>
            <a href="#"><i class="fas fa-search fa-fw"></i> </a>
            <!-- Start Megamenu -->
            <div class="mega-menu">

              <ul class="links">

                <li>
                  <div class="subscribe">
                    <form action="result.php" method="post">
                      <input type="text" name="keyword" placeholder="اكتب عنوان تريد البحث عنه" required/>
                      <input type="submit" name="search" value="بـــحـــث" required />
                    </form>
                  </div>
                </li>

              </ul>

            </div>
            <!-- End Megamenu -->
          </li>

          <?php
          if (isset($_SESSION['user'])) { ?>
            <li style="margin-right:60px;">  <a href="logout.php" style="padding:0 5px;"> <i class="fas fa-sign-out-alt"></i>
            &nbsp; <?php echo  $_SESSION['user']; ?>  &nbsp; <i class="far fa-user fa-fw"></i>
                </a></li>
          <?php }
          ?>
        </ul>
      </div>
    </div>

    <!-- GetButton.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                email: "tawafmesar@gmail.com", // Email
                call_to_action: "راسل الدعم الفني", // Call to action
                button_color: "#807dfb", // Color of button
                position: "right", 
            };
            var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /GetButton.io widget -->
    <!-- End Header -->
