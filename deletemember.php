
<?php
include 'conn/session.php'
?>

<?php
include 'conn/connect_db.php';


$member_id = $_POST['member_id'];

$sql1= " DELETE FROM borrow WHERE member_id='$member_id' ";
$sql2= " DELETE FROM member WHERE member_id='$member_id'";
$message="Successfully deleted.";

if(isset($_POST ['deletedata'])) {
    mysqli_query($con,$sql1);
    mysqli_query($con,$sql2);
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href='members.php'; </script>";
    mysli_close($con);
}
