<?php
ob_start();
session_start();

$pagetitle = 'Login';

if (isset($_SESSION['user'])) {
  header('Location: uploadFile.php');
}
include 'include/ini.php';


// check if user coming from http post request

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['login'])) {
 // check coming from login or signup form

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $hashpass = sha1($pass);

        // check if user exist in database

        $stmt = $con->prepare("SELECT
                                      userId   ,userName, password
                               FROM
                                      user
                               WHERE
                                      userName = :zuser
                               AND
                                      password = :zpass");
                                      $stmt->execute(array(


                                            'zuser' => $user,
                                            'zpass' => $hashpass));

        $get = $stmt->fetch();

        $count = $stmt->rowCount();



        //if count > 0 this mean the datebase contain record about this Username

        if ($count > 0) {
             $_SESSION['user'] =  $get['userName'];      // register session name
             $_SESSION['uid'] = $get['userId'];    // register user id in session
             header('Location: uploadFile.php');      // redirect to dashboard page
              exit();
        }else {

          $formErrors[] = 'اسم المستخدم او كلمة المرور غير صحيحة ';

        }

    } else  {



        // check the signup if valid or not befor sending info to database

          $formErrors = array();

          $username = $_POST['username'];
          $university = $_POST['university'];
          $fullName = $_POST['fullName'];
          $phone    = $_POST['phone'];
          $password = $_POST['password'];


          if (isset($username) ) {
            // filter the user name from any script
            $filteruser = filter_var($username,FILTER_SANITIZE_STRING);

              if (strlen($filteruser) < 4 ) {// check if the character of user name is larg

                $formErrors[] = 'Username must be larger than 4 character';

              }

          }





          // CHECK IF THERE IS NO ERROR PROCED THE USER ADD
          if (empty($formErrors)) {

            // check if user exist in database

          //  $check = checkItem("Username", "users" , $username);
          $stmt = $con->prepare("SELECT
                                              userId   ,userName, password
                                       FROM
                                              user
                                       WHERE
                                              userName = :zuser
                                ");
                                              $stmt->execute(array(


                                                    'zuser' => $username));

                $get = $stmt->fetch();

                $count = $stmt->rowCount();



            if ($count == 1 ) {

              $formErrors[] = 'This user is exists';


            } else {

                  // insert user info into the datebase     VALUES(:zuser, :zpass , :zmail , :zname)");

                  $stmt = $con->prepare("INSERT INTO
                                          user(userName, password, fullName  , university , phone,groupId,ragStatus)
                                      VALUES(:zusername, :zpassword , :zfullname  ,:zuniversity, :zphone,  0 , 1)");
                  $stmt->execute(array(

                        'zusername'   => $username,
                        'zpassword'   => sha1($password),
                        'zfullname'   => $fullName ,
                        'zuniversity' => $university,
                        'zphone'  => $phone

                  ));

                 // echo success message

                $succesMsg = 'تهانيناً , تم إنشاء الحساب بنجاح';

               }

             }

     }

}

?>

<!-- Start Services -->
<div style="padding-bottom:1px; padding-top:33px;" class="features" id="features">
  <h2 class="main-title">  يجب تسجيل الدخول او إنشاء حساب جديد لرفع الملفات <i class="fas fas fa-server  fa-fw"></i></h2>
</div>

<div class="spikes"></div>

<div class="loginn">
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
        <form class="signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <?php
                if (! empty($formErrors)){
                    foreach ($formErrors as $error) {
                      echo '<div class="msg">' . $error . '</div>';
                    }
                    header("refresh:3;url=login.php");
                }

                if (isset($succesMsg)) {
                  echo '<div class="msg">' . $succesMsg . '</div>' ;
                  header("refresh:3;url=login.php");

                  }
           ?>
					<label for="chk" aria-hidden="true">إنشاء حساب</label>

          <input
          type="text"
          name="username"
          autocomplete="off"
          placeholder="اسم االمستخدم"
          required>

          <input
          type="text"
          name="university"
          autocomplete="on"
          placeholder="الجامعة - الكلية"
          />

          <input
          type="text"
          name="fullName"
          autocomplete="on"
          placeholder="الاسم الكامل للطالب"
          required>


          <input
          type="text"
          name="phone"
          autocomplete="off"
          placeholder="الجوال"
          />

          <input
          minlength="4"
          type="password"
          name="password"
          placeholder="كلمة المرور"
          autocomplete="new-password"
          required
          />



        	<button>إنشـاء</button>
				</form>
			</div>
			<div class="login">
        <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >

  				<label  for="chk" aria-hidden="true">تسجيل دخول</label>

          <input
          type="text"
          name="username"
          autocomplete="off"
          placeholder="اسم االمستخدم"
          required>

          <input
          minlength="4"
          type="password"
          name="password"
          placeholder="كلمة المرور"
          autocomplete="new-password"
          required
          />

      		<button name="login">تسجيل</button>
				</form>

			</div>
	</div>

</div>

<!-- end looping through errors -->


<?php


include 'include/footer.php';
ob_end_flush();

?>
