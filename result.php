<?php
ob_start();
session_start();

include 'include/ini.php';



if (isset($_POST['search'])) {

  $Keyword = $_POST['keyword'];


?>

<!-- Start Services -->
<div style="padding-bottom:1px; padding-top:33px;" class="features" id="features">
  <h2 class="main-title"> كل ملفات المقرارات الدراسية        <i class="fas fas fa-server  fa-fw"></i></h2>
</div>

<div class="spikes"></div>

<div class="landing" style="background-color:#f1f5f9;">
  <div class="container">

    <div class="page d-flex">
      <div class="content w-full">
        <!-- Start Projects Table -->
        <div class="projects p-20 bg-white rad-10 m-20">
          <h2 class="mt-0 mb-20">الملفات</h2>
          <div class="responsive-table">
            <table class="fs-15 w-full">
              <thead>
                <tr>
                  <td>العنوان</td>
                  <td>المقرر</td>
                  <td> الوصف</td>
                  <td>النوع</td>
                  <td>الإضافة</td>
                  <td>الناشر</td>
                  <td>تحميل</td>
                </tr>
              </thead>
              <tbody>

                <tr>
<?php
$con;

$getAll = $con->prepare("SELECT
          files.* , categories.catName AS category ,
          user.userName AS user FROM	files

               INNER JOIN
                   categories

               ON
                   categories.catId  = files.catId

               INNER JOIN
                   user
               ON
                   user.userId = files.userId

                   WHERE title LIKE '%$Keyword%'
           ");

$getAll->execute();

$all = $getAll->fetchall();

foreach ($all as $item) {
  echo '<tr> ';
              echo '<td> ' .  $item['title'] . ' </td>';
              echo '<td> ' .  $item['category'] . ' </td>';
              echo '<td> ' .  $item['description'] . ' </td>';
              echo '<td> ' .  $item['tags'] . ' </td>';
              echo '<td> ' .  $item['addDate'] . ' </td>';
              echo '<td> ' .  $item['user'] . ' </td>';
              echo "<td> <a download  href='upload//" . $item['fileDir'] . " '  > <span class='label btn-shape bg-blue c-white'><i class='fas fa-angle-double-down '></i> تحميل</span></a></td>";

  echo '</tr> ';

}

 ;
 ?>





                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <!-- End Projects Table -->
      </div>
    </div>

    </div>





    <?php
  }
else {

}

    ob_end_flush();

    ?>
