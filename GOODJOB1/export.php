<?
	include('config.php');
	include("vendor/autoload.php");
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$spreadsheet = new Spreadsheet();
	$Excel_writer = new Xlsx($spreadsheet);
 
	$spreadsheet->setActiveSheetIndex(0);
	$activeSheet = $spreadsheet->getActiveSheet();

	$res=mysqli_query($conn, "SELECT * FROM transactions ORDER BY id DESC");

	$i = 1;
	$activeSheet->setCellValue('A'.$i , 'გადახდის ID');
	$activeSheet->setCellValue('B'.$i , 'ტრანზაქციის ID');
	$activeSheet->setCellValue('C'.$i , 'სახელი');
	$activeSheet->setCellValue('D'.$i , 'ელფოსტა');
	$activeSheet->setCellValue('E'.$i , 'მობილური');
	$activeSheet->setCellValue('F'.$i , 'პროდუქტი');
	$activeSheet->setCellValue('G'.$i , 'ფასი');
	$activeSheet->setCellValue('H'.$i , 'სტატუსი');
	$activeSheet->setCellValue('I'.$i , 'თარიღი');
	

	while($trans=mysqli_fetch_assoc($res))
	{
		$i++;
		$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM login WHERE id='$trans[uid]' LIMIT 1"));
		$status = '';
		switch($trans['status'])
		{
			case 0: $status = 'დამუშავების პროცესში';break;
			case 1: $status = 'ტრანზაქცია შეიქმნა';break;
			case 2: $status = 'გადახდილი';break;
			case 3: $status = 'წარუმატებელი';break;
			case 4: $status = 'თანხის უკან დაბრუნება';break;
			case 5: $status = 'ტრანზაქციის დროის ამოწურვა';break;
		}
		
		
		$activeSheet->setCellValue('A'.$i , $trans['id']);
		$activeSheet->setCellValue('B'.$i , $trans['trans_id']);
		$activeSheet->setCellValue('C'.$i , $user['username']);
		$activeSheet->setCellValue('D'.$i , $user['email']);
		$activeSheet->setCellValue('E'.$i , $user['phone']);
		$activeSheet->setCellValue('F'.$i , $trans['type']);
		$activeSheet->setCellValue('G'.$i , $trans['price']);
		$activeSheet->setCellValue('H'.$i , $status);
		$activeSheet->setCellValue('I'.$i , date("Y-m-d H:i:s", $trans['date']));
	}

	$filename = 'export-transactions-'.date("Y-m-d H:i:s").'.xlsx';
 
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename='. $filename);
	header('Cache-Control: max-age=0');
	$Excel_writer->save('php://output');
?>