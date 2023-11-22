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
                <p>
                    Sebagai pengguna dan sosok yang terlibat dalam pembakaran gunung berapi, peranmu sangat signifikan dalam menjaga kelestarian lingkungan dan keselamatan banyak orang. Tindakan membakar gunung berapi, apakah disengaja atau tidak, memiliki konsekuensi yang serius terhadap lingkungan sekitar dan masyarakat yang tinggal di sekitarnya. Dampaknya bisa sangat merusak, mulai dari kerusakan habitat hingga ancaman langsung terhadap kesehatan manusia dan hewan di sekitarnya. Sebagai pengguna, kesadaran akan pentingnya menjaga lingkungan dan keselamatan bersama menjadi krusial. Diperlukan langkah-langkah preventif yang kuat dan pemahaman mendalam akan dampak negatif yang bisa ditimbulkan dari tindakan-tindakan yang merugikan lingkungan.

                    Jika kamu terlibat dalam pembakaran gunung berapi, baik secara tidak sengaja atau dengan sengaja, penting untuk memahami bahwa konsekuensinya bisa sangat merugikan bagi alam dan manusia. Dampaknya dapat berupa kerusakan lingkungan yang luas, termasuk rusaknya ekosistem, polusi udara yang berbahaya bagi kesehatan, serta ancaman terhadap keselamatan orang-orang yang tinggal di sekitar area tersebut. Sebagai individu yang terlibat, penting untuk bertanggung jawab terhadap tindakanmu, menghindari perilaku yang dapat merusak lingkungan, dan lebih baik lagi, menjadi bagian dari upaya-upaya untuk melestarikan lingkungan yang ada. Pendidikan dan kesadaran akan dampak tindakan tersebut adalah kunci untuk mencegah hal serupa terjadi di masa depan dan melindungi lingkungan bagi generasi mendatang.

                </p>
            </div>
        </div>
    </section>
</main>

<?php include_once('layout/footer.php') ?>