

<?php

/*
**
** Get ALL  function v2.0
** function to get ALL records  from any database table
*/

function getAllFrom($field, $table, $where = NULL , $and = NULL , $orderfield , $ordering="DESC" )
{
 global $con;

 $getAll = $con->prepare("SELECT $field FROM	$table $where $and ORDER BY $orderfield $ordering");

 $getAll->execute();

 $all = $getAll->fetchall();

 return $all;

}


/*
**
** cart  function v2.0
** function to  records item innto shopping cart
*/


function cart()
{

  if (isset($_GET['add_cart'])) {

      global $con;

      $userid = $_SESSION['uid'];
      $itemid = $_GET['add_cart'];


            $check_pro  = $con->prepare("select * from cart where user_id='$userid' AND item_id='$itemid'");

            $check_pro->execute();

            $check=  $check_pro->fetchall();

            if (!empty($check)) {

                echo "";
            }else {

              $sql = "INSERT INTO cart (item_id,user_id)
                VALUES ('$itemid','$userid')";
                $con->query($sql);

              $msg="The item added to shoping cart";

              redirectHome1($msg);

            }

  }

}


/*
**
** total item cart  function v2.0
** function to  count item in  shopping cart for avry user
*/


function cart_total_item()
{

  if (isset($_GET['add_cart'])) {

      global $con;

      $userid = $_SESSION['uid'];


            $check_pro  = $con->prepare("select * from cart where user_id='$userid'");

            $check_pro->execute();

            $countitems=  $check_pro->rowCount();

            }else {

              global $con;

              $userid = $_SESSION['uid'];


                    $check_pro  = $con->prepare("select * from cart where user_id='$userid'");

                    $check_pro->execute();

                    $countitems=  $check_pro->rowCount();

            }
  return $countitems;
  }

  /*
  **
  ** total price of item in cart  function v2.0
  ** function to  count item in  shopping cart for avry user
  */



  function total_price(){

    $total = 0;

    global $con;

  $userid = $_SESSION['uid'];

    $price  = $con->prepare("select * from cart where user_id='$userid'");

    $price->execute();

    $items = $price->fetchall();

    foreach ($items as $p_price) {

      $item_id = $p_price['item_id'];

      $pro_price = $con->prepare("select * from items where Item_id='$item_id'");

      $pro_price->execute();

      $pprice = $pro_price->fetchall();

      foreach ($pprice as $priceo) {

        $ppprice = array($priceo['Price']);

        $values = array_sum($ppprice);

        $total +=$values ;

      }

    }

  echo "$" . $total;

  }


/*
**
** Get records  function v1.0
** function to get category from database

function getCat( )
{
 global $con;


 $getCat = $con->prepare("SELECT * FROM	categories");

 $getCat->execute();

 $cats = $getCat->fetchall();

 return $cats;

}



**
** Get Items function v1.0
** function to get category from database


function getItems($where , $value , $approve = NULL )
{
 global $con;


 if ($approve == NULL){

   $sql = 'AND Approve = 1';

 }else {
   $sql = NULL;
 }

 $getItems = $con->prepare("SELECT * FROM	items WHERE $where = ? $sql ORDER BY Item_ID DESC ");

 $getItems->execute(array($value));

 $items = $getItems->fetchall();

 return $items;

}
*/


/*
**  check if User is not Activated
**  Function to check the RegStatus of the User
**
*/


function checkUserStatus($user){

  // check if user exist in database

  global $con;

  $stmtr = $con->prepare("SELECT
                              Username, RagStatus
                         FROM
                                users
                         WHERE
                                Username = ?
                         AND
                                RagStatus	 =  0 ");

  $stmtr->execute(array($user));

  $status = $stmtr->rowCount();

  return $status;

}












/////admin function

/*
** title functon v1.0
**  title function that echo the page title in case the page
** has the variable $pagetitle and echo defult title for other page
*/


function gettitle()
{

  global $pagetitle;

  if (isset($pagetitle)) {

    echo $pagetitle;
  }
}


/*
**
** Home redirect Function v1.0
**THIS fINCTION ACCEPT PARAMETERS
** $errorMsg = Echo the error message
** $seconds  = seconds befors redirect
*/

function redirectHome1($errorMsg  ,  $seconds = 5)
{

  echo "<div class='alert alert-info'> $errorMsg</div>";
      echo "<div class='alert alert-info'>You will be redirect to home page after $seconds seconds. </div>";

     header("refresh:$seconds;url=index.php");

     exit();
}

 /*
 **
 ** Home redirect Function v2.0
 **THIS fINCTION ACCEPT PARAMETERS
 ** $theMsg = Echo the message [ error | success | warning ]
 ** $usl =
 ** $seconds  = seconds befors redirect
 */


  function redirectHome($theMsg ,$url = null ,  $seconds = 3)
  {

    if ($url == null ) {

         $url = 'index.php';

    //     $link = 'Homepage';

    } else {
         // $url = isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ?   $url = $_SERVER['HTTP_REFERER'] :  $url =  'index.php';
         if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

             $url = $_SERVER['HTTP_REFERER'];

            //     $link = 'Previous';

         } else {

             $url =  'index.php';
         }
    }

    echo "<div class='alert alert-danger'> $theMsg</div>";

    echo "<div class='alert alert-info'>You will be redirect after $seconds seconds. </div>";

   header("refresh:$seconds;url=$url");

   exit();

  }


 /*
 **
 **check items function v1.0
 **function to check item in database [ function ACCEPT PARAMETERS ]
 ** $select = the item to select   [ Example : user  , item  , category]
 ** $form   = the table to select  [ Example : users , items , Categories]
 ** $value  = the value of select  [ Example : osama , box   , electronics]
 */


 function checkItem( $select , $form , $value )
 {
   global $con;

   $stmnt = $con->prepare("SELECT $select FROM $form WHERE $select = ? ");

   $stmnt->execute(array($value));

   $countrow = $stmnt->rowcount();

   return $countrow;


 }

 /*
 **
 ** count Numbers of itsems function v1.0
 ** function to count number of items rows
 ** $item = the item to count
 ** $table = the table to count from
 */

function countItems($item , $table)
{


   global $con;

   $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

   $stmt2->execute();

   return $stmt2->fetchColumn();

}



 /*
 **
 ** Get latest records  function v1.0
 ** function to get latest irems from database [ users , items , comments]
 ** $select = field to select
 ** $table = the table to choose from
 ** $limit = number of records to get
 ** $order = the colom
 */

function getlatest($select , $table , $order , $limit = 5  )
{
  global $con;


  $getstmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit ");

  $getstmt->execute();

  $rows = $getstmt->fetchall();

  return $rows;



}
