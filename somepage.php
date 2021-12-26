<?php
if(isset($_POST['block'])) {
    include 'block.php';
}else if(isset($_POST['unblock'])) {
    include  'unblock.php';
}else if(isset($_POST['delete'])) {
    include  'delete.php';
};
?>
