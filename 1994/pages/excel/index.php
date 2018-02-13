<?php
    include ('Classes/PHPExcel/IOFactory.php');
    include ('Classes/PHPExcel.php');

    $objPHPExcel = new PHPExcel();
   $objPHPExcel->getProperties()
   ->setCreator("Temporaris")
   ->setLastModifiedBy("Temporaris")
   ->setTitle("Template Relevé des heures intérimaires")
   ->setSubject("Template excel")
   ->setDescription("Template excel permettant la création d'un ou plusieurs relevés d'heures")
   ->setKeywords("Template excel");
   $objPHPExcel->setActiveSheetIndex(0);

   //Title of Colume
   $objPHPExcel->getActiveSheet()->SetCellValue('A1', "الإسم الاول");
   $objPHPExcel->getActiveSheet()->SetCellValue('B1', "النسبة (الكنية)");
   $objPHPExcel->getActiveSheet()->SetCellValue('C1', "تاريخ الولادة");
   $objPHPExcel->getActiveSheet()->SetCellValue('D1', "مكان الولادة");
   $objPHPExcel->getActiveSheet()->SetCellValue('E1', "الجنس");
   $objPHPExcel->getActiveSheet()->SetCellValue('F1', "الجنسية");
   $objPHPExcel->getActiveSheet()->SetCellValue('G1', "العنوان الأساسي");
   $objPHPExcel->getActiveSheet()->SetCellValue('H1', "العنوان الحالي");
   $objPHPExcel->getActiveSheet()->SetCellValue('I1', "الحالة الإجتماعية");
   $objPHPExcel->getActiveSheet()->SetCellValue('J1', "عدد أفراد الأسرة");
   $objPHPExcel->getActiveSheet()->SetCellValue('K1', "البريد الإلكتروني");
   $objPHPExcel->getActiveSheet()->SetCellValue('L1', "رقم الهاتف");
   $objPHPExcel->getActiveSheet()->SetCellValue('M1', "رقم الجوال / موبايل");
   $objPHPExcel->getActiveSheet()->SetCellValue('N1', "اسم الجمعية");
   $objPHPExcel->getActiveSheet()->SetCellValue('O1', "المحافظة");
   $objPHPExcel->getActiveSheet()->SetCellValue('P1', "هل سبق أن تلقيت أية تدريبات خلال 12 شهر السابق");
   $objPHPExcel->getActiveSheet()->SetCellValue('Q1', "في حال الإجابة بـ نعم يرجى تحديد نوع التدريب الذي اتبعته؟");
   $objPHPExcel->getActiveSheet()->SetCellValue('R1', "يرجى تحديد مكان التدريب");
   $objPHPExcel->getActiveSheet()->SetCellValue('S1', "الحالة الدراسية");
   $objPHPExcel->getActiveSheet()->SetCellValue('T1', "ما هي المرحلة الدراسية التي أنت فيها حالياً");
   $objPHPExcel->getActiveSheet()->SetCellValue('U1', "اسم المدرسة");
   $objPHPExcel->getActiveSheet()->SetCellValue('V1', "نوع المدرسة");
   $objPHPExcel->getActiveSheet()->SetCellValue('W1', "ما هي المرحلة التي وصلت إليها (توقفت عندها)");
   $objPHPExcel->getActiveSheet()->SetCellValue('X1', "ما هي الأسباب الأساسية لتوقفك عن الدراسة: (يرجى تحديد جميع الأسباب في حال وجود أكثر من سبب)");
   $objPHPExcel->getActiveSheet()->SetCellValue('Y1', "حالة العمل");
   $objPHPExcel->getActiveSheet()->SetCellValue('Z1', "نمط السكن");
   $objPHPExcel->getActiveSheet()->SetCellValue('AA1', "يرجى تحديد ما تملكه من هذه الأجهزة");
   $objPHPExcel->getActiveSheet()->SetCellValue('AB1', "هل أنت متأكد من قدرتك على ادارة مصاريفك الخاصة");
   $objPHPExcel->getActiveSheet()->SetCellValue('AC1', "هل يمكنك أن تحدد أي من أفراد عائلتك لديه عمل بوقت كامل ودخل شهري");
   $objPHPExcel->getActiveSheet()->SetCellValue('AD1', "ما الذي تفضله ويعبر عنك");
   $objPHPExcel->getActiveSheet()->SetCellValue('AE1', "أي من العبارات الآتية تعبر عنك");
   $objPHPExcel->getActiveSheet()->SetCellValue('AF1', "هل يمكنك تحديد الأسباب");
   $objPHPExcel->getActiveSheet()->SetCellValue('AG1', "ممن تتكون عائلتك");
   $objPHPExcel->getActiveSheet()->SetCellValue('AH1', "هل أي من أفراد الأسرة لا يعيشون معك في هذه اللحظة");
   $objPHPExcel->getActiveSheet()->SetCellValue('AI1', "في حال الإجابة بـ نعم يرجى تحديد السبب");
   $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', "تاريخ الإستمارة");
   $objPHPExcel->getActiveSheet()->SetCellValue('AK1', "حالة الشخص");
   $objPHPExcel->getActiveSheet()->SetCellValue('AL1', "حالة التواصل مع المستخدم");


   //Connect with database
   /*$connect_db = @mysql_connect( 'localhost', 'root', '' ) or die( mysql_error( ) );
   $select_db = @mysql_select_db( 'books', $connect_db ) or die( mysql_error( $connect_db ) );
   */
   include "../../../lib/main.php";
   //Values of rows
   $select_query = @mysql_query("select * from beneficiaries order by id desc");
   $number_of_row = 2;
   while($row = @mysql_fetch_assoc($select_query)){
     if(empty($row['connection_status'])){
       $connection_status = 'لم يتم التواصل';
     }else{
       $connection_status = $row['connection_status'];
     }
     if(empty($row['user_status'])){
       $user_status = 'غير مقبول';
     }else{
       $user_status = $row['user_status'];
     }
   $objPHPExcel->getActiveSheet()->SetCellValue('A'.$number_of_row, $row['f_name']);
   $objPHPExcel->getActiveSheet()->SetCellValue('B'.$number_of_row, $row['l_name']);
   $objPHPExcel->getActiveSheet()->SetCellValue('C'.$number_of_row, $row['birthdate']);
   $objPHPExcel->getActiveSheet()->SetCellValue('D'.$number_of_row, $row['place_of_birth']);
   $objPHPExcel->getActiveSheet()->SetCellValue('E'.$number_of_row, $row['gender']);
   $objPHPExcel->getActiveSheet()->SetCellValue('F'.$number_of_row, $row['nationality']);
   $objPHPExcel->getActiveSheet()->SetCellValue('G'.$number_of_row, $row['address1']);
   $objPHPExcel->getActiveSheet()->SetCellValue('H'.$number_of_row, $row['address2']);
   $objPHPExcel->getActiveSheet()->SetCellValue('I'.$number_of_row, $row['malitry']);
   $objPHPExcel->getActiveSheet()->SetCellValue('J'.$number_of_row, $row['family_members']);
   $objPHPExcel->getActiveSheet()->SetCellValue('K'.$number_of_row, $row['email']);
   $objPHPExcel->getActiveSheet()->SetCellValue('L'.$number_of_row, $row['phone']);
   $objPHPExcel->getActiveSheet()->SetCellValue('M'.$number_of_row, $row['mobile']);
   $objPHPExcel->getActiveSheet()->SetCellValue('N'.$number_of_row, $row['org_name']);
   $objPHPExcel->getActiveSheet()->SetCellValue('O'.$number_of_row, $row['city']);
   $objPHPExcel->getActiveSheet()->SetCellValue('P'.$number_of_row, $row['training']);
   $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$number_of_row, $row['training_type']);
   $objPHPExcel->getActiveSheet()->SetCellValue('R'.$number_of_row, $row['place_of_training']);
   $objPHPExcel->getActiveSheet()->SetCellValue('S'.$number_of_row, $row['studing']);
   $objPHPExcel->getActiveSheet()->SetCellValue('T'.$number_of_row, $row['current_study']);
   $objPHPExcel->getActiveSheet()->SetCellValue('U'.$number_of_row, $row['school_name']);
   $objPHPExcel->getActiveSheet()->SetCellValue('V'.$number_of_row, $row['school_type']);
   $objPHPExcel->getActiveSheet()->SetCellValue('W'.$number_of_row, $row['stop_studing']);
   $objPHPExcel->getActiveSheet()->SetCellValue('X'.$number_of_row, $row['stop_study_reason']);
   $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$number_of_row, $row['work_status']);
   $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$number_of_row, $row['place_type']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$number_of_row, $row['my_devices']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$number_of_row, $row['able_to_manage_money']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AC'.$number_of_row, $row['family_member_work']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AD'.$number_of_row, $row['fav']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AE'.$number_of_row, $row['explain_you']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AF'.$number_of_row, $row['select_causes']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AG'.$number_of_row, $row['family_members_componanents']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AH'.$number_of_row, $row['family_member_dont_live_with_you']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AI'.$number_of_row, $row['why_dont_live_with_you']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AJ'.$number_of_row, $row['register_date']);
   $objPHPExcel->getActiveSheet()->SetCellValue('AK'.$number_of_row, $user_status);
   $objPHPExcel->getActiveSheet()->SetCellValue('AL'.$number_of_row, $connection_status);
   $number_of_row++;
   }
   $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
   header('Content-Type: application/vnd.ms-excel');
   header('Content-Disposition: attachment;filename="beneficiaries.xls"');
   header('Cache-Control: max-age=0');
   $writer->save('php://output');
?>