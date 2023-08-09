<!-- app/Views/data_warga_rw/index.php -->
<h1>Data Warga RW</h1>
<table>
  <tr>
    <th>Nama</th>
    <th>Umur</th>
    <th>Action</th>
  </tr>
  <?php foreach ($data_warga_rw as $warga) : ?>
    <tr>
      <td><?= $warga['nama']; ?></td>
      <td><?= $warga['umur']; ?></td>
      <td>
        <!-- Add edit and delete buttons for DataWargaRW here -->
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<!-- Add create and edit forms for DataWargaRW here -->
