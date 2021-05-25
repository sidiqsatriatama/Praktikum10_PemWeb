<?php  
	include 'conn.php';
	require 'latihan\vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1',	'No');
	$sheet->setCellValue('B1',	'Nama Lengkap');
	$sheet->setCellValue('C1',	'Jenis Pendaftaran');
	$sheet->setCellValue('D1',	'NIS');
	$sheet->setCellValue('E1',	'Jenis Kelamin');
	$sheet->setCellValue('F1',	'NISN');
	$sheet->setCellValue('G1',	'NIK');
	$sheet->setCellValue('H1',	'Tempat Lahir');
	$sheet->setCellValue('I1',	'Tanggal Lahir');
	$sheet->setCellValue('J1',	'Agama');
	$sheet->setCellValue('K1',	'Berkebutuhan Khusus');
	$sheet->setCellValue('L1',	'Alamat');
	$sheet->setCellValue('M1',	'Kecamatan');
	$sheet->setCellValue('N1',	'Kode Pos');
	$sheet->setCellValue('O1',	'Tempat Tinggal');
	$sheet->setCellValue('P1',	'Moda Transportasi');
	$sheet->setCellValue('Q1',	'Nomor HP');
	$sheet->setCellValue('R1',	'Nomor Telepon');
	$sheet->setCellValue('S1',	'Email');
	$sheet->setCellValue('T1',	'Kewarganegaraan');


	$query = mysqli_query($koneksi, "SELECT * FROM pesertadidik");
	$i = 2;
	while($row = mysqli_fetch_array($query)){
		$sheet->setCellValue('A'.$i, $row['id']);
		$sheet->setCellValue('B'.$i, $row['nama']);
		$sheet->setCellValue('C'.$i, $row['formType']);
		$sheet->setCellValue('D'.$i, $row['nis']);
		$sheet->setCellValue('E'.$i, $row['gender']);
		$sheet->setCellValue('F'.$i, $row['nisn']);
		$sheet->setCellValue('G'.$i, $row['nik']);
		$sheet->setCellValue('H'.$i, $row['born']);
		$sheet->setCellValue('I'.$i, $row['bornDate']);
		$sheet->setCellValue('J'.$i, $row['agama']);
		$sheet->setCellValue('K'.$i, $row['ABK']);
		$sheet->setCellValue('L'.$i, $row['alamat']);
		$sheet->setCellValue('M'.$i, $row['kecamatan']);
		$sheet->setCellValue('N'.$i, $row['idPos']);
		$sheet->setCellValue('O'.$i, $row['rumah']);
		$sheet->setCellValue('P'.$i, $row['transport']);
		$sheet->setCellValue('Q'.$i, $row['noHp']);
		$sheet->setCellValue('R'.$i, $row['noTelp']);
		$sheet->setCellValue('S'.$i, $row['email']);
		$sheet->setCellValue('T'.$i, $row['kwn']);
		$i++;
	}

	$styleArray = [
		'borders' => [
			'allBorders' => [
				'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			],
		],
	];
	$i = $i - 1;
	$sheet->getStyle('A1:T'.$i)->applyFromArray($styleArray);

	$writer = new Xlsx($spreadsheet);
	$writer->save('Data Pendaftaran Siswa.xlsx');
	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Data berhasil diexport');
    			window.location.href='http://localhost/praktikum9/';
    		</script>");
?>
