<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>view/user/index.php?page=dashboard">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <h1><span id="greeting"></span> <?= $userName; ?> </h1>
                <h6><?= $_SESSION['role']; ?> </h6>
                <p>
                    Dilarang dengan tegas melakukan kegiatan komersial seperti foto prewedding atau kegiatan lain yang dapat menyebabkan risiko pembakaran gunung. Kegiatan semacam ini dapat mengganggu lingkungan alam dan meningkatkan potensi risiko kebakaran, yang dapat mengancam keselamatan peserta pendakian, flora, fauna, serta ekosistem Gunung Rinjani secara keseluruhan. Segala tindakan yang dapat memicu kebakaran gunung tidak akan diperkenankan demi menjaga kelestarian alam dan keselamatan bagi semua yang terlibat dalam pendakian.
                </p>
                <p>
                    "Salam Rinjani, semoga langkah kita diiringi keberanian, hati yang lapang, dan rasa hormat pada keindahan alam ini. Mari kita menjaga gunung ini sebagai warisan, menorehkan jejak dengan cinta pada alam serta keselamatan bagi semua yang melangkah di sini."
                </p>
            </div>
        </div>
    </section>
</main>