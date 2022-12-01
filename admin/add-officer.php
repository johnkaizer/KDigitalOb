<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
$officersid=$_POST['officersid'];
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];

{

$sql="INSERT INTO  officerstbl(OfficerId,FullName,EmailId,MobileNumber,Password) VALUES(:officersid,:fullname,:email,:mobile,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':officersid',$officersid,PDO::PARAM_STR);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Officer added successfully');</script>";
echo "<script>window.location.href='manage-officers.php'</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";    
echo "<script>window.location.href='manage-books.php'</script>";
}}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>DigitalOB For Kimili | Add Officers</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script type="text/javascript">
    function checkisbnAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'isbn='+$("#isbn").val(),
type: "POST",
success:function(data){
$("#isbn-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>
</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Officer</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">

<div class="col-md-6">   
<div class="form-group">
<label>Officer Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="fullname" autocomplete="off"  required />
</div>
</div>
<div class="col-md-6">   
<div class="form-group">
<label>Officer ID<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="officersid" autocomplete="off"  required />
</div>
</div>

<div class="col-md-6">   
<div class="form-group">
<label>Officer Email<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="email" autocomplete="off"  required />
</div>
</div>

<div class="col-md-6">   
<div class="form-group">
<label>Officer Mobile<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="mobile" autocomplete="off"  required />
</div>
</div>

<div class="col-md-6">   
<div class="form-group">
<label>Officer Password<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="password" autocomplete="off"  required />
</div>
</div>

<button type="submit" name="add" id="add" class="btn btn-info">Add officer </button>
 </div>
</div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
