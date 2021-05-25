<?php  
	include ('conn.php');
	require_once ("latihan/dompdf/autoload.inc.php");
	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$query = mysqli_query($koneksi, "SELECT * FROM pesertadidik");
	$html ='<html><center><h3>Data Peserta didik</h3></center><br/><br/><hr/><br/>';
	$html .= '<table border = "1" width = "100%" >
					<tr>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Jenis Pendaftaran</th>
						<th>NIS</th>
						<th>Jenis Kelamin</th>
						<th>NISN</th>
						<th>NIK</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Agama</th>
						<th>Berkebutuhan Khusus</th>
						<th>Alamat</t>
						<th>Kecamatan</th>
						<th>Kode Pos</th>
						<th>Tempat Tinggal</th>
						<th>Moda Transportasi</th>
						<th>Nomor HP</th>
						<th>Nomor Telepon</th>
						<th>Email</th>
						<th>Kewarganegaraan</th>
					</tr>';
	$no = 1;
	while($row = mysqli_fetch_array($query)){
		$html .= "<tr>
									<td>".$row['id']."</td>
									<td>".$row['nama']."</td>
									<td>".$row['formType']."</td>
									<td>".$row['nis']."</td>
									<td>".$row['gender']."</td>
									<td>".$row['nisn']."</td>
									<td>".$row['nik']."</td>
									<td>".$row['born']."</td>
									<td>".$row['bornDate']."</td>
									<td>".$row['agama']."</td>
									<td>".$row['ABK']."</td>
									<td>".$row['alamat']."</td>
									<td>".$row['kecamatan']."</td>
									<td>".$row['idPos']."</td>
									<td>".$row['rumah']."</td>
									<td>".$row['transport']."</td>
									<td>".$row['noHp']."</td>
									<td>".$row['noTelp']."</td>
									<td>".$row['email']."</td>
									<td>".$row['kwn']."</td>
								</tr>";
		$no++;
	}
	$html .="</html>";
	$dompdf->loadHtml($html);
	//setting ukuran dan orientasi kertas
	$dompdf->setPaper('A3','landscape');
	//rendering dari HTML ke PDF
	$dompdf->render();
	//melakukan output ke file PDF
	$dompdf->stream('laporan_siswa.pdf');
?>