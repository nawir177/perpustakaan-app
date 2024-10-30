<?php include '../layouts/header.php'; ?>
<div class="container mx-auto mt-10 px-4">
  <h2 class="text-2xl font-semibold mb-6">Formulir Pendaftaran</h2>
  <form action="" method="post" class="space-y-6" enctype="multipart/form-data">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
        <input type="text" id="nis" name="nis" placeholder="Masukkan NIS" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" id="name" name="name" placeholder="Masukkan Nama" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
        <select id="gender" name="gender" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <option value="" disabled selected>Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div>
        <label for="birthplace" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
        <input type="text" id="birthplace" name="birthplace" placeholder="Masukkan Tempat Lahir" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="birthdate" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
        <input type="date" id="birthdate" name="birthdate" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan Email" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
        <input type="tel" id="phone" name="phone" placeholder="Masukkan Nomor Telepon" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan Username" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan Password" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>

     <!-- Input Alamat -->
  <div class="mb-4">
    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
    <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan alamat Anda" required></textarea>
  </div>

  <!-- Input Foto -->
  <div class="mb-4">
    <label for="foto" class="block text-sm font-medium text-gray-700">Upload Foto</label>
    <input type="file" id="foto" name="foto" accept="image/*" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
  </div>

    <button type="submit" name="register"
      class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Daftar
    </button>
  </form>
</div>
<?php
include 'fungsi.php'; // Include file fungsi

if (isset($_POST['register'])) {
  // Panggil fungsi register dengan $_POST sebagai parameter
  $result = register($_POST);

  // Tampilkan hasil sebagai alert JavaScript
  echo "<script type='text/javascript'>
            alert('$result');
            window.location.href = '../admin/login/index.php';
          </script>";
}
?>


<?php include '../layouts/footer.php'; ?>