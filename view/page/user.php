<?
    require_once('../config/helper.php');

    session_start();
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
        header("Location: ".BASE_URL."index.php");
        exit();
    }

    
?>


<div class="card">
    <h1><span id="greeting"></span> <?php echo $_SESSION['username']; ?> </h1>
    <h6><?php echo $_SESSION['role']; ?> </h6>
</div>