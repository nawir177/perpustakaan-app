<?php include '../layouts/header.php'; ?>
<div class="container mx-auto mt-10 px-4">
  <h2 class="text-2xl font-semibold mb-6">Ubah Password</h2>
  <form action="" method="post" class="space-y-6" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?=$userAuth['id']?>">
    <div class="grid grid-cols-1 gap-6">
      <div>
        <label for="nis" class="block text-sm font-medium text-gray-700">MASUKAN PASSWORD LAMA</label>
        <input type="text" id="nis" name="password-lama" placeholder="Masukkan password lama" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">PASSWORD BARU</label>
        <input type="password" id="password" name="password-baru" placeholder="Masukkan password" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div>
        <label for="verifikasi" class="block text-sm font-medium text-gray-700">KETIK ULANG PASSWORD</label>
        <input type="password" id="verifikasi" name="verifikasi" placeholder="Ulangi password" required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
    </div>

   
    <button type="submit" name="changePassword"
      class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      UBAH PASSWORD
    </button>
  </form>
</div>
<?php
include 'fungsi.php'; // Include file fungsi

if (isset($_POST['changePassword'])) {
    if(ubahPassword($_POST)==true){
        echo "<script type='text/javascript'>
            alert('password barhasii di update');
            window.location.href = '../home/index.php';
          </script>";
    }else{
        echo "<script type='text/javascript'>
        alert('password gagal diubah');
        
      </script>";
    }
}
?>


<?php include '../layouts/footer.php'; ?>