<?php
ob_start();
session_start();


  include 'include/ini.php';

?>

    <!-- Start Landing -->
    <div class="landing">
      <div class="container">
        <div class="text">
          <h1>مرحبًا بكم في المكتبة التقنية الرقمية</h1>
          <p>سنقوم في هذا الموقع  بإعادة إستخدام المواد الدراسية وذلك عن طريق تبادل ملفات المواد الدراسية بين الطلاب للمساعدة على تحصيلهم الدراسي ب اقل جهد و تكلفة </p>
        </div>
        <div class="image">
          <img src="imgs/landing-image.gif" alt="" />
        </div>
      </div>
      <a href="#features" class="go-down">
        <i class="fas fa-angle-double-down fa-2x"></i>
      </a>
    </div>
    <!-- End Landing -->

<!-- Start Features -->
<div class="features" id="features">
  <div class="container">
    <div class="box quality">
      <div class="img-holder"><img src="imgs/features-01.jpg" alt="" /></div>
      <h2>رفع ملفات</h2>
      <p>نستقبل منك الملفات , ونوثق جهودك معنا ونستعرضها في قائمة الشرف و المميزين لأننا تفخر بك
</p>
      <a href="login.php">المزيد</a>
    </div>
    <div class="box time">
      <div class="img-holder"><img src="imgs/features-02.jpg" alt="" /></div>
      <h2>إستعراض الملفات</h2>
      <p>يمكنك تصفح جميع الملفات وإختيار وتنزيل مايلاءم حاجتك </p>
      <a href="allFiles.php">المزيد</a>
    </div>

  </div>
</div>
<!-- End Features -->

<div class="spikes"></div>

<!-- Start Services -->
<div class="services" id="services">
  <h2 class="main-title"> <i class="far fa-chart-bar fa-fw"></i> احصاءات موقعنا</h2>
  <div class="container">
    <div class="box">
      <i class="fas fa-users fa-5x"></i>
      <h3>120</h3>
      <h3>مستخدمين</h3>

    </div>
    <div class="box">
      <i class="fas fa-server fa-5x"></i>
      <h3>800</h3>
      <h3>ملفات</h3>

    </div>
  </div>
</div>
<!-- End Services -->




<?php
  include 'include/footer.php';
  ob_end_flush();
  ?>
