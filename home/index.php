<?php include '../layouts/header.php';
$nawBook = newData('e_book', 8);
$kategori = all('kategori');
$rekomendasi = all('rekomendasi_ebook');
?>

<section class="mb-10">

    <form class="max-w-xl">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Cari Buku" required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-primary hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-300 dark:focus:ring-green-800">Search</button>
        </div>
    </form>


</section>
<div class="contianer">
    <section class="mb-6  py-10 px-6 rounded-xl bg-primary">
        <h1 class="text-5xl font-bold text-primary text-white">Selamat datang di Perpustakaan Madrasah Tsanawiyah Negeri 1 Kota Banjarmasin</h1>
        <p class="italic text-white text-2xl mt-4">"Membaca adalah napas hidup dan jembatan emas ke masa depan"</p>
    </section>
    <!-- category -->
    <section class="mb-10">
        
        <div class="flex gap-4 items-center flex-wrap">
            <div class="col">
                <a href="../home/" class="w-56 h-20 bg-white shadow rounded-xl flex gap-4 justify-center items-center my-auto ">
                    <div class="col">
                        <div class="rounded-full p-2 flex items-center justify-center bg-primary ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>

                        </div>

                    </div>
                    <div class="col text-2xl font-bold">
                        <h3>Semua</h3>
                    </div>
                </a>
            </div>
            <?php foreach ($kategori as $val) :  ?>
                <div class="col">
                    <a href="filter.php?kategori=<?= $val['id'] ?>" class="w-56 h-20 bg-white shadow rounded-xl flex gap-4 justify-center items-center my-auto ">
                        <div class="col">
                            <div class="rounded-full p-2 flex items-center justify-center bg-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>

                            </div>

                        </div>
                        <div class="col text-2xl font-bold">
                            <h3><?= $val['nama']; ?></h3>
                        </div>
                    </a>
                </div>
            <?php endforeach  ?>
        </div>
    </section>
    <!-- new book list -->
    <section class="mb-8">
    <h1 class="text-3xl font-bold italict my-6">Berikut kumpulan E-BOOk yang tersedia</h1>
        <div class="bg-cover w-80 h-14 flex items-center p-2" style="background-image: url('../image/menu.png');">
            <h2 class="text-gray-100 text-3xl font-thin">New Book</h2>
        </div>
        <div class="flex max-w-6xl w-full gap-4 rounded-xl flex-wrap my-6">
            <?php foreach ($nawBook as $val) :  ?>
                <a href="../detail-book/index.php?id=<?= $val['id'] ?>">
                    <div class="hover:scale-105 transition-all duration-300 h-64 w-52 bg-gray-500 bg-cover shadow border" style="background-image: url('../admin/e-book/image/<?= $val["image"] ?>');"></div>
                </a>
            <?php endforeach  ?>
        </div>
    </section>
    <!-- list rekomendasi -->
    <section class="mb-8">
        <div class="bg-cover w-80 h-14 flex items-center p-2" style="background-image: url('../image/menu.png');">
            <h2 class="text-gray-100 text-3xl font-thin">Rekomendasi</h2>
        </div>
        <div class="flex max-w-6xl w-full gap-4 rounded-xl flex-wrap my-6">
            <?php foreach ($rekomendasi as $val) :  ?>
                <a href="../detail-book/index.php?id=<?= $val['id_ebook'] ?>">
                    <div class="hover:scale-105 transition-all duration-300 h-64 w-52 bg-gray-500 bg-cover shadow border" style="background-image: url('../admin/e-book/image/<?= hasOne($val["id_ebook"], 'e_book', 'image') ?>');"></div>
                </a>
            <?php endforeach  ?>
        </div>
    </section>
    <!-- pelajaran rekomendasi -->
    <section class="mb-8">
        <div class="bg-cover w-80 h-14 flex items-center p-2" style="background-image: url('../image/menu.png');">
            <h2 class="text-gray-100 text-3xl font-thin">Pelajaran</h2>
        </div>
        <div class="flex max-w-6xl w-full gap-4 rounded-xl flex-wrap my-6">
            <?php foreach (filterBook(1) as $val) :  ?>
                <a href="../detail-book/index.php?id=<?= $val['id'] ?>">
                    <div class="hover:scale-105 transition-all duration-300 h-64 w-52 bg-gray-500 bg-cover shadow border" style="background-image: url('../admin/e-book/image/<?= $val['image']?>');"></div>
                </a>
            <?php endforeach  ?>
        </div>
    </section>
    <!-- fiksi list -->
    <section class="mb-8">
        <div class="bg-cover w-80 h-14 flex items-center p-2" style="background-image: url('../image/menu.png');">
            <h2 class="text-gray-100 text-3xl font-thin">Fiksi</h2>
        </div>
        <div class="flex max-w-6xl w-full gap-4 rounded-xl flex-wrap my-6">
            <?php foreach (filterBook(2) as $val) :  ?>
                <a href="../detail-book/index.php?id=<?= $val['id'] ?>">
                    <div class="hover:scale-105 transition-all duration-300 h-64 w-52 bg-gray-500 bg-cover shadow border" style="background-image: url('../admin/e-book/image/<?= $val['image']?>');"></div>
                </a>
            <?php endforeach  ?>
        </div>
    </section>
    <!-- non fiksi list -->
    <section class="mb-8">
        <div class="bg-cover w-80 h-14 flex items-center p-2" style="background-image: url('../image/menu.png');">
            <h2 class="text-gray-100 text-3xl font-thin">Non Fiksi</h2>
        </div>
        <div class="flex max-w-6xl w-full gap-4 rounded-xl flex-wrap my-6">
            <?php foreach (filterBook(3) as $val) :  ?>
                <a href="../detail-book/index.php?id=<?= $val['id'] ?>">
                    <div class="hover:scale-105 transition-all duration-300 h-64 w-52 bg-gray-500 bg-cover shadow border" style="background-image: url('../admin/e-book/image/<?= $val['image']?>');"></div>
                </a>
            <?php endforeach  ?>
        </div>
    </section>

</div>


<?php include '../layouts/footer.php' ?>