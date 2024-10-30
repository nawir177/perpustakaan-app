<?php include '../layouts/header.php' ?>
<?php include 'fungsi.php'  ?>
<section class="flex justify-center items-center h-screen bg-gray-100">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
    <h2 class="text-2xl font-bold mb-6 text-center">Formulir Absensi Luar</h2>
    <form action="" method="post">
      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
        <input
          type="text"
          id="nama"
          name="nama"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          required>
      </div>
      <div class="mb-4">
        <label for="instansi" class="block text-sm font-medium text-gray-700">Instansi</label>
        <input
          type="text"
          id="instansi"
          name="instansi"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          required>
      </div>
      <div class="mb-4">
        <label for="tujuan" class="block text-sm font-medium text-gray-700">Tujuan</label>
        <input
          type="text"
          id="tujuan"
          name="tujuan"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          required>
      </div>
      <div>
        <button
          type="submit" name="submit"
          class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          Kirim
        </button>
      </div>
    </form>
  </div>
</section>
<?php
if (isset($_POST['submit'])) {
  if (tambah($_POST)) {
    echo "<script> alert('Absensi Success..'); </script>";
    echo "<script>window.location.href ='../home';</script>";
  } else {
    echo "<script> alert('username/password salah'); </script>";
  }
}
?>
<?php include '../layouts/footer.php' ?>