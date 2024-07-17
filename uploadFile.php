<?php
ob_start();
session_start();


  include 'include/ini.php';

  if (isset($_SESSION['user'])) {    // للتشييك على المستخدم هل هو مسجل دخول او لا


    if($_SERVER['REQUEST_METHOD'] == 'POST'){


      // upload variables

      $itemimgName = $_FILES['files']['name'];
      $itemimgTmp  = $_FILES['files']['tmp_name'];
      $itemimgsize = $_FILES['files']['size'];
      $itemimgType = $_FILES['files']['type'];


      // list of allowed file typed to upload

      $itemimgAllowedExtension = array("jpeg", "jpg" , "png" , "gif");

      // get image  Extension

        $explava      = explode('.' , $itemimgName);
        $endava       =  end($explava );
        $itemimgExten = strtolower($endava);


        // Get variables from the page

// title description addDate fileDir fileDir catId userId

        $title      = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $desc      = filter_var($_POST['description'],  FILTER_SANITIZE_STRING);
        $category  = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
        $tags    = filter_var($_POST['tags'], FILTER_SANITIZE_NUMBER_INT);


        $formErrors = array();



        // check if there's no error proceed the update operation

            if (empty($formErrors)) {

                    $itemimg = rand(0,10000) . '_' . $itemimgName;

                    move_uploaded_file( $itemimgTmp , "upload\\" . $itemimg);

                    // insert user info into the datebase     VALUES(:zuser, :zpass , :zmail , :zname)");

                    // title description addDate fileDir tags fileDir catId userId

                    $stmt = $con->prepare("INSERT INTO
                                            files(title, Description	,  addDate ,tags , catId , fileDir , userId)
                                            VALUES(:ztitle, :zdesc ,  now() , :ztags , :zcatId , :zfileDir ,:zuserId )");
                    $stmt->execute(array(

                          'ztitle'     =>  $title ,
                          'zdesc'     =>  $desc  ,
                          'ztags'  =>  $tags ,
                          'zcatId'    =>  $category ,
                          'zfileDir'   =>  $itemimg ,
                          'zuserId'   =>  $_SESSION['uid']
                    ));

                   // echo success message

                    if($stmt) {

                      $succesMsg = 'شكراً لك تم إضافة الملف بنجاح.. ';

                    }


               }


      }


?>


<!-- Start Landing -->
<!-- Start Features -->
<div style="padding-bottom:1px; padding-top:33px;" class="features" id="features">
  <h2 class="main-title">رفـع ملف للمكتبة</h2>
  <?php

            if (isset($succesMsg)) {
                    echo '<div class="msg">' . $succesMsg . '</div>' ;
                    header("refresh:4;url=uploadFile.php");

                    }
              ?>
</div>


<div class="spikes"></div>

<div class="uploading">
  <div class="container">
    <div class="text">
      <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
          <div class="signup">
            <form class="signup" action="<?php echo $_SERVER['PHP_SELF'] ; ?>"  enctype="multipart/form-data" method="POST" >
              <label>رفع ملف</label>

              <input
              type="text"
              name="title"
              autocomplete="on"
              placeholder=" عنوان الملف"
              required>

              <input
              type="text"
              name="description"
              autocomplete="on"
              placeholder="وصـف الملف"
              />


              <select style="  width: 70%;
              height: 35px;
              background: #e0dede;
              justify-content: center;
              display: flex;
              margin: 20px auto;
              padding: 4px;
              border: none;
              outline: none;
              border-radius: 5px;
              font-weight: 900;"  required name="category">
                    <option  value="">المقرر الدراسي</option>
                    <?php


                          $con;

                          $getAll = $con->prepare("SELECT * from categories  ORDER BY catId ASC


                                     ");

                          $getAll->execute();

                          $cats = $getAll->fetchall();

                         foreach ($cats as $cat) {
                           echo "<option value='" . $cat['catId'] . "' > " . $cat['catName'] . " </option>";
                         }
                     ?>
              </select>
              <input
              type="text"
              name="tags"
              autocomplete="on"
              placeholder="نوع و إمتداد الملف"
              />


              <input
              minlength="4"
              type="file"
              name="files"

              />



              <button>رفــع</button>
            </form>
          </div>

      </div>


    </div>
    <div class="image">
      <img src="imgs/work-steps.png" alt="" />
    </div>
  </div>

</div>

<!-- End Landing -->


<?php

}else {
    header('Location: login.php');
}
  include 'include/footer.php';
  ob_end_flush();
  ?>
