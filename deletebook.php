<?php
include 'conn/session.php'
?>

<?php
include 'conn/connect_db.php';


$book_id = $_POST['book_id'];


//delete data
$sql1= " DELETE FROM borrowdetails WHERE book_id='$book_id' ";
$sql2= " DELETE FROM book WHERE book_id='$book_id'";
$message="Successfully deleted.";

if(isset($_POST ['deletedata'])) {
    mysqli_query($con,$sql1);
    mysqli_query($con,$sql2);
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href='books.php'; </script>";
    mysli_close($con);
}