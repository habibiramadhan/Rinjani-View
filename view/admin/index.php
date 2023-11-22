<?php include_once('layout/head.php') ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <h1><span id="greeting"></span> <?= $_SESSION['id']; ?> </h1>
                <h6><?= $_SESSION['role']; ?> </h6>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit saepe assumenda aut mollitia cumque sed ipsum est in ea! Dicta adipisci iusto rem voluptate magni voluptatem fugiat, libero et. Explicabo.</p>
            </div>
        </div>
    </section>
</main>

<?php include_once('layout/footer.php') ?>