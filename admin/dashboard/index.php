<style>
      .card-list {
            width: 250px;
            height: 90px;
            background-color: #52ff80;
      }
</style>
<?php
include '../controller.php';
include '../template/header.php';
$buku = grafik();
$bukuJson = json_encode($buku);

?>
<div class="container">
      <div class="content">
            <h1 style="font-size: 50px; color:#ffb508">Sistem Informasi Perpustakaan Madrasah (SIPMAD)</h1>
            <h2 style="color:red">MTSN 1 Kota Banjarmasin</h2>

            <div class="d-flex justify-items-center gap-7">
                  <div class="col">
                        <div class="text-light rounded-md shadow p-4 rounded-2" style="background-color:#2E8B57">
                              <h4 class="text-light">Jumlah Anggota</h4>
                              <h1 style="font-size:50px;color:white"><?= count(all('anggota')); ?></h1>
                        </div>
                  </div>
                  <div class="col">
                        <div class="text-light rounded-md shadow p-4 rounded-2" style="background-color:#2E8B57">
                              <h4 class="text-light">Jumlah Buku</h4>
                              <h1 style="font-size:50px;color:white"><?= count(all('buku')); ?></h1>
                        </div>
                  </div>
                  <div class="col">
                        <div class="text-light rounded-md shadow p-4 rounded-2" style="background-color:#2E8B57">
                              <h4 class="text-light">Jumlah Peminjam</h4>
                              <h1 style="font-size:50px;color:white"><?= count(all('peminjaman')); ?></h1>
                        </div>
                  </div>
            </div>

            <!-- Chart Container -->
            <div class="chart-container" style="width: 90%; height: 300px; margin-top: 20px;">
                  <canvas id="bookPopularityChart"></canvas>
            </div>

      </div>
</div>

<script>
      // Mengambil data dari PHP yang telah di-encode menjadi JSON
      const bukuData = <?php echo $bukuJson; ?>;

      // Menyusun labels dan data berdasarkan $bukuData
      const labels = Object.keys(bukuData);
      const data = Object.values(bukuData);

      // Data untuk bar chart buku populer
      const bookPopularityData = {
            labels: labels, // Label akan diisi dengan nama kategori dari PHP
            datasets: [{
                  label: 'Jumlah Salinan Dipinjam',
                  data: data, // Data diisi dengan jumlah berdasarkan kategori dari PHP
                  backgroundColor: '#FFB508',
                  borderColor: '#FFB508',
                  borderWidth: 1,
                  withDirectives: 3,
                  borderRadius: 10,
            }]
      };

      // Konfigurasi chart
      const config = {
            type: 'bar',
            data: bookPopularityData,
            options: {
                  responsive: true,
                  plugins: {
                        legend: {
                              position: 'top',
                        },
                        tooltip: {
                              callbacks: {
                                    label: function(tooltipItem) {
                                          return tooltipItem.label + ': ' + tooltipItem.raw;
                                    }
                              }
                        }
                  },
                  scales: {
                        x: {
                              beginAtZero: true,
                              title: {
                                    display: true,
                                    text: 'Judul Buku'
                              }
                        },
                        y: {
                              beginAtZero: true,
                              title: {
                                    display: true,
                                    text: 'Jumlah Salinan Dipinjam'
                              }
                        }
                  }
            }
      };

      // Inisialisasi chart
      window.onload = function() {
            const ctx = document.getElementById('bookPopularityChart').getContext('2d');
            new Chart(ctx, config);
      };
</script>



<!-- JS Implementing Plugins -->
<?php include '../template/footer.php'  ?>