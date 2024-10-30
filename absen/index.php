<?php include '../layouts/header.php' ?>
<?php include_once 'fungsi.php'  ?>


<section class="flex justify-center items-center h-screen bg-gray-100">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">

    <h2 class="text-2xl font-bold mb-6 text-center">Formulir Absensi</h2>



    <form action="" method="post">
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input
          type="text"
          id="username"
          name="username"
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          required>
      </div>

      <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input
          type="password"
          id="password"
          name="password"
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
    <a href="../absen-luar/">
      <button
        type="submit" name="submit"
        class="w-full mt-6 px-4 py-2 bg-green-500 text-white font-semibold rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        Absensi Tamu
      </button>
    </a>
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