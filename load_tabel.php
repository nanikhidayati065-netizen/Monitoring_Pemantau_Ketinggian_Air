<?php
include "koneksi.php";
$no = 1;
$query = mysqli_query($konek, "SELECT * FROM tb_air ORDER BY id DESC LIMIT 10");
while($row = mysqli_fetch_array($query)) {
    echo "<tr>
            <td>".$no++."</td>
            <td>".$row['waktu']."</td>
            <td>".$row['ketinggian']." cm</td>
            <td>".$row['status_air']."</td>
          </tr>";
}
?>