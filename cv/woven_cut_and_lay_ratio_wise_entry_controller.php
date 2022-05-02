<?php
if($action=="print_barcode_one_urmi_eg")
{
	define('FPDF_FONTPATH', 'pdf/fpdf/font/');
	require('pdf/code39.php');
	//require('file://///192.168.11.252/logic_erp_3rd_version/production/requires/html_table.php');//order_cut_no
	
	$data=explode("***",$data);
	
	// ================================== BUNDLE USE FOR ENTRY ============================
	if($data[7] !="") // when body part exist
	{
		$con = connect();
		$job_id = return_field_value("id","wo_po_details_master"," job_no='$data[1]' and status_active=1 and is_deleted=0 ","id");
		
		// $delStatus = sql_delete("ppl_cut_lay_bundle_use_for","status_active*is_deleted","0*1",'job_id',$job_id,1);
		$delStatus = execute_query("delete from ppl_cut_lay_bundle_use_for where job_id=$job_id",0);
		
		$field_array = "id,job_id,bodypart_id,inserted_by,insert_date";
		$bodypart_id = array_unique(explode(",", $data[7]));
		$data_array="";
		$j=0;
		$id=return_next_id("id", "ppl_cut_lay_bundle_use_for", 1);
		foreach ($bodypart_id as $val)
		{
			if($j==0)$data_array = "(".$id.",".$job_id.",".$val.",".$user_id.",'".$pc_date_time."')";
			else $data_array .= ",(".$id.",".$job_id.",".$val.",".$user_id.",'".$pc_date_time."')";
			$id=$id+1;
			$j++;
		}
		
		$insertStatus=sql_insert("ppl_cut_lay_bundle_use_for",$field_array,$data_array,0);
		
		// echo "10**insert into ppl_cut_lay_bundle_use_for (".$field_array.") values ".$data_array;die;
		
		if($db_type==0)
		{
			if($insertStatus)
			{
				mysql_query("COMMIT");
				// echo "1**".str_replace("'","",$hidden_po_break_down_id);
			}
			else
			{
				mysql_query("ROLLBACK");
				// echo "10**".str_replace("'","",$hidden_po_break_down_id);
			}
		}
		else
		{
			if($insertStatus)
			{
				oci_commit($con);
				// echo "1**".str_replace("'","",$hidden_po_break_down_id);
			}
			else
			{
				oci_rollback($con);
				// echo "10**".str_replace("'","",$hidden_po_break_down_id);
			}
		}
		
	}
	// =========================== end =================================
	
	$detls_id=$data[3];
	$batch_id=return_field_value("batch_id","ppl_cut_lay_dtls", "id=$detls_id");
	$buyer_library=return_library_array( "select id,short_name from lib_buyer  ", "id", "short_name");
	$color_library=return_library_array( "select id, color_name from lib_color", "id", "color_name");
	$table_no_library=return_library_array( "select id,table_no  from  lib_cutting_table", "id", "table_no"  );
	$country_arr=return_library_array( "select id, short_name from lib_country",'id','short_name');
	$size_arr=return_library_array( "select id, size_name from lib_size",'id','size_name');
	$lib_season_arr=return_library_array( "select id, season_name from lib_buyer_season where status_active =1 and is_deleted=0",'id','season_name');
	$order_cut_no=return_field_value("order_cut_no","ppl_cut_lay_dtls","id=$detls_id and status_active=1 and is_deleted=0","order_cut_no");
	
	$pdf=new PDF_Code39('P','mm',array(59,51));
	$pdf->AddPage();
	
	$bacth_array=array();
	$batchData=sql_select("select id, batch_no, extention_no from pro_batch_create_mst where entry_form in(0,7,37,66,68)");
	foreach($batchData as $row)
	{
		$ext='';
		if($row[csf('extention_no')]>0) {$ext='-'.$row[csf('extention_no')];}
		$bacth_array[$row[csf('id')]]=$row[csf('batch_no')].$ext;
	}
	$color_sizeID_arr=sql_select("SELECT a.id, a.size_id, a.bundle_no,a.barcode_no, a.number_start, a.number_end, a.size_qty, a.country_id, a.roll_id, a.roll_no, b.bundle_sequence, a.pattern_no, a.is_excess, a.order_id,a.bundle_num_prefix_no, c.table_no,b.marker_qty
	from ppl_cut_lay_bundle a, ppl_cut_lay_size_dtls b, ppl_cut_lay_mst c
	where a.mst_id=b.mst_id
	and a.dtls_id=b.dtls_id
	and a.size_id=b.size_id
	and a.mst_id=c.id
	and a.id in ($data[0])
	group by a.id, a.size_id, a.bundle_no,a.barcode_no, a.number_start, a.number_end, a.size_qty, a.country_id, a.roll_id, a.roll_no, b.bundle_sequence, a.pattern_no, a.is_excess, a.order_id,a.bundle_num_prefix_no,c.table_no,b.marker_qty order by b.bundle_sequence,a.id");
	
	foreach($color_sizeID_arr as $row)
	{
		$test_data[$row[csf("roll_id")]]=$row[csf("roll_id")];
	}
	$i=2; $j=0; $k=0; $bundle_array=array(); $br=0; $n=0;
	$sql_name=sql_select("SELECT b.buyer_name, b.client_id, b.style_ref_no, b.product_dept, b.season_buyer_wise as season_matrix, a.po_number, a.id as po_id,a.t_year,b.gmts_item_id,b.job_no from wo_po_details_master b,wo_po_break_down a where a.job_no_mst=b.job_no and a.id in(".$data[6].")");
	$po_data_arr=array();
	foreach($sql_name as $value)
	{
		$po_data_arr[$value[csf('po_id')]]["style_ref_no"]=$value[csf('style_ref_no')];
		$po_data_arr[$value[csf('po_id')]]["gmts_item_id"]=$value[csf('gmts_item_id')];
		$po_data_arr[$value[csf('po_id')]]["job_no"]=$value[csf('job_no')];
		
		$po_data_arr[$value[csf('po_id')]]["buyer_name"]=$value[csf('buyer_name')];
		$po_data_arr[$value[csf('po_id')]]["client_id"]=$value[csf('client_id')];
		$po_data_arr[$value[csf('po_id')]]["po_number"]=$value[csf('po_number')];
		$po_data_arr[$value[csf('po_id')]]["t_year"]=$value[csf('t_year')];
		$matrix_season=$value[csf('season_matrix')];
		
	}
	unset($sql_name);
	//echo "select roll_id, batch_no, shade from pro_roll_details where mst_id='$data[2]' and entry_form=289 and status_active=1";
	$roll_sql=sql_select("select roll_id, batch_no, shade from pro_roll_details where mst_id='$data[2]' and entry_form=289 and status_active=1");
	//echo "select roll_id, batch_no, shade from pro_roll_details where mst_id='$data[2]' and entry_form=289 and status_active=1";
	$roll_data_arr=array();
	foreach($roll_sql as $row)
	{
		$roll_data_arr[$row[csf("roll_id")]]['batch']=$row[csf("batch_no")];
		$roll_data_arr[$row[csf("roll_id")]]['shade']=$row[csf("shade")];
	}
	//print_r($roll_data_arr); die;
	unset($roll_sql);
	
	$sql_cut_name=sql_select("select entry_date,table_no,cut_num_prefix_no,batch_id,company_id from ppl_cut_lay_mst where id=$data[2]");
	foreach($sql_cut_name as $cut_value)
	{
		$table_name=$cut_value[csf('table_no')];
		$cut_date=change_date_format($cut_value[csf('entry_date')]);
		$cut_prifix=$cut_value[csf('cut_num_prefix_no')];
		$company_id=$cut_value[csf('company_id')];
		$comp_name=return_field_value("company_short_name","lib_company", "id=$company_id");
		$new_cut_no=$comp_name."-".$cut_prifix;
		$bundle_title="";
	}
	if($data[7]=="") $data[7]=0;
	$seq=explode("," ,$data[7] );
	$seq_first=$seq[0];
	
	$sql_bundle_copy=sql_select("select id,bundle_use_for from ppl_bundle_title where company_id=$company_id and id in ($data[7])");
	$bundle_use_for = "";
	foreach ($sql_bundle_copy as $val)
	{
		$bundle_use_for .= ($bundle_use_for=="") ? $val[csf('bundle_use_for')] : ",".$val[csf('bundle_use_for')];
	}
	// EG Sticker
	
	if(count($sql_bundle_copy)!=0)
	{
		foreach($sql_bundle_copy as $inf)
		{
			if($br==1) { $pdf->AddPage(); $br=0; $i=2; $j=0; $k=0; }
			foreach($color_sizeID_arr as $val)
			{
				if($br==1)
				{
					$pdf->AddPage(); $br=0; $i=2; $j=0; $k=0;
				}
				if($seq_first==$inf[csf("id")]) $symb= "@@"; else $symb= "";
				//BNDL
				$style_name=$po_data_arr[$val[csf('order_id')]]["style_ref_no"];
				
				$buyer_name=$po_data_arr[$val[csf('order_id')]]["buyer_name"];
				$job_no=$po_data_arr[$val[csf('order_id')]]["job_no"];
				$item_name=$po_data_arr[$val[csf('order_id')]]["gmts_item_id"];
				
				
				$client_id=$po_data_arr[$val[csf('order_id')]]["client_id"];
				$po_number=$po_data_arr[$val[csf('order_id')]]["po_number"];
				$t_year=$po_data_arr[$val[csf('order_id')]]["t_year"];
				
				$batch_no=$roll_data_arr[$val[csf('roll_id')]]['batch'];
				
				$shade=$roll_data_arr[$val[csf('roll_id')]]['shade'];
				$bundle_no_prifix=$val[csf("bundle_num_prefix_no")];
				
				$barcode=$val[csf("barcode_no")];
				$bundle=$val[csf("bundle_no")];
				$pattern=$val[csf("pattern_no")];
				$table_no=$val[csf("table_no")];
				$size_name=$size_arr[$val[csf("size_id")]];
				$gmts_no_start=$val[csf("number_start")];
				$gmts_no_end=$val[csf("number_end")];
				$cut_qty=$val[csf("marker_qty")];
				
				$buyer_name_str=""; if($client_id!=0) $buyer_name_str=$buyer_library[$buyer_name].'-'.$buyer_library[$client_id]; else $buyer_name_str=$buyer_library[$buyer_name];
				//$dbl_no="17910000000012"; My Work
				if($val[csf('is_excess')]==1) $country="EXCESS"; else $country=$country_arr[$val[csf("country_id")]];
				
				$pdf->Code40($i, $j-2, $barcode." P. Date: ".date("j F, g:i a"), $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7);
				
				$pdf->Code40($i, $j+1.2, $job_no." , ".$bundle, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7);
				
				$pdf->Code40($i, $j+4.2, "Cut Qty ".$cut_qty.", Front Part "."(".$pattern.")", $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7);
				
				$pdf->Code40($i, $j+7.2, "Table No: ".$table_no.", OCN: ".$order_cut_no.", ".$cut_date, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
				
				$pdf->Code40($i, $j+10.2, "Buyer Name: ".$buyer_name_str.", Order No: ".$po_number, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
				
				$pdf->Code40($i, $j+13.2, "Style No: ".$style_name, $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
				
				$pdf->Code40($i, $j+16.2, "Item: ".$garments_item[$item_name].", Country: ".$country, $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
				
				$pdf->Code40($i, $j+19.2, "Color: ".$color_library[$data[5]], $ext = true, $cks = false, $w = 0.7, $h = 1, $wide=true,true,7);
				
				$pdf->Code40($i, $j+22.2, "Size No: ".$size_name.",", $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
				$pdf->Code40($i+13.2, $j+22.2, "Batch: ".$batch_no.", Shade: ".$shade, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
				
				$pdf->Code40($i, $j+25.2, "Gmts No: ". $gmts_no_start."-".$gmts_no_end.", Gmts Qty: ".$val[csf("size_qty")], $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
				
				$pdf->Code39($i-1, $j+33.2, $val[csf("barcode_no")], $ext = true, $cks = false, $w = 0.22, $h = 17, $wide = true, $textonly=false,$fontSize=11);
				
				$k++;
				$i=2; $j=$j+23;
				$br++;
			}
		}
	}
	else
	{
		foreach($color_sizeID_arr as $val)
		{
			if($br==1)
			{
				$pdf->AddPage(); $br=0; $i=2; $j=0; $k=0;
			}
			if($seq_first==$inf[csf("id")]) $symb= "@@"; else $symb= "";
			$style_name=$po_data_arr[$val[csf('order_id')]]["style_ref_no"];
			$buyer_name=$po_data_arr[$val[csf('order_id')]]["buyer_name"];
			$client_id=$po_data_arr[$val[csf('order_id')]]["client_id"];
			$po_number=$po_data_arr[$val[csf('order_id')]]["po_number"];
			$t_year=$po_data_arr[$val[csf('order_id')]]["t_year"];
			$batch_no=$roll_data_arr[$val[csf('roll_id')]]['batch'];
			$shade=$roll_data_arr[$val[csf('roll_id')]]['shade'];
			$bundle_no_prifix=$val[csf("bundle_num_prefix_no")];
			$buyer_name_str=""; if($client_id!=0) $buyer_name_str=$buyer_library[$buyer_name].'-'.$buyer_library[$client_id]; else $buyer_name_str=$buyer_library[$buyer_name];
			
			if($val[csf('is_excess')]==1) $country="EXCESS"; else $country=$country_arr[$val[csf("country_id")]];
			$pdf->Code40($i, $j-2, "BY#".$buyer_name_str, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7);
			$pdf->Code40($i+30, $j-2, "Size# ".$size_arr[$val[csf("size_id")]]."(".$val[csf("pattern_no")].")", $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7);
			
			$pdf->Code40($i, $j+1.2, "STY# ".$style_name, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i+30, $j+1.2, "QTY# ".$val[csf("size_qty")], $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			
			$pdf->Code40($i, $j+4.2, "CUT & ROLL# ".$order_cut_no." & ".$val[csf("roll_no")], $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i+30, $j+4.2, "SH# ". $shade, $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
			
			$pdf->Code40($i, $j+7.3, "B/NO#".$batch_no, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i+30, $j+7.3, "P/N# ".$sql_bundle_copy[0][csf('bundle_use_for')], $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			
			$pdf->Code40($i, $j+10, "BUN# ".$val[csf("bundle_no")], $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i+30, $j+10, "STKR#".$val[csf("number_start")]."-".$val[csf("number_end")], $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			
			$pdf->Code40($i, $j+12.6, "COLOR#".$color_library[$data[5]], $ext = true, $cks = false, $w = 0.7, $h = 1, $wide=true,true,7);
			$pdf->Code40($i+30, $j+12.6, "COUN# ".$country, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide=true,true,7);
			
			$pdf->Code40($i, $j+15.2, "S&Y# ".$lib_season_arr[$matrix_season]."-".substr($t_year, 2), $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i+30, $j+15.2, "PO# ".$po_number, $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
			
			$pdf->Code40($i, $j+17.5, $val[csf("barcode_no")], $ext = true, $cks = false, $w =0.15, $h = 1, $wide = true, true,7) ;
			//$pdf->Code40($i, $j+22, $val[csf("bundle_no")],$w =0.2, $h = 8);
			$pdf->Code39($i, $j+23, $val[csf("barcode_no")]);
			$k++;
			$i=2; $j=$j+23;
			
			$br++;
		}
	}
	
	foreach (glob(""."*.pdf") as $filename) {
		@unlink($filename);
	}
	$name = 'bundle_barcode_' . date('j-M-Y_h-iA') . '.pdf';
	$pdf->Output( "".$name, 'F');
	echo $name;
	exit();
}
if($action=="print_barcode_one_urmi_eg_a4")
{
	define('FPDF_FONTPATH', '../../../ext_resource/pdf/fpdf/font/');
	require('../../../ext_resource/pdf/code39.php');
	//require('file://///192.168.11.252/logic_erp_3rd_version/production/requires/html_table.php');
	
	$data=explode("***",$data);
	$detls_id=$data[3];
	$buyer_library=return_library_array( "select id,short_name from lib_buyer  ", "id", "short_name");
	$color_library=return_library_array( "select id, color_name from lib_color", "id", "color_name");
	$table_no_library=return_library_array( "select id,table_no  from  lib_cutting_table", "id", "table_no"  );
	//$country_arr=return_library_array( "select id, country_name from lib_country",'id','country_name');
	$country_arr=return_library_array( "select id, short_name from lib_country",'id','short_name');
	// $sub_process_id=return_field_value2("group_concat(b.sub_process_id)  as sub_process_id ","pro_recipe_entry_dtls b, pro_recipe_entry_mst a",
	$order_cut_no=return_field_value(" order_cut_no ","ppl_cut_lay_dtls"," id=$detls_id and status_active=1 and is_deleted=0 ","order_cut_no");
	//echo $order_cut_no;
	$pdf=new PDF_Code39();
	//$pdf->SetFont('Times', '', 20);
	$pdf->AddPage();
	
	$sql_mst="SELECT a.id,a.size_id,a.bundle_no,a.number_start,a.number_end,a.size_qty,a.country_id,a.roll_id,a.roll_no,b.bundle_sequence, a.pattern_no,a.barcode_no,b.marker_qty
	from ppl_cut_lay_bundle  a,ppl_cut_lay_size_dtls b
	where a.mst_id=b.mst_id and a.dtls_id=b.dtls_id and a.size_id=b.size_id and a.id in ($data[0]) order by b.bundle_sequence,a.id";
	//echo $sql_mst;
	$color_sizeID_arr=sql_select($sql_mst);
	
	$i=8; $j=4; $k=0;
	$bundle_array=array();
	$br=0;
	$n=0;
	$sql_roll="select roll_id, batch_no, shade from pro_roll_details where mst_id='$data[2]' and entry_form=289 and status_active=1";
	
	//echo $sql_roll;die;
	$roll_sql=sql_select($sql_roll);
	$roll_data_arr=array();
	foreach($roll_sql as $row)
	{
		$roll_data_arr[$row[csf("roll_id")]]['batch']=$row[csf("batch_no")];
		$roll_data_arr[$row[csf("roll_id")]]['shade']=$row[csf("shade")];
	}
	
	$sql_name=sql_select("SELECT b.buyer_name,b.style_ref_no,b.product_dept,a.po_number,b.job_no from wo_po_details_master b,wo_po_break_down a where a.job_no_mst=b.job_no and a.id=$data[6]");
	foreach($sql_name as $value)
	{
		$product_dept_name=$value[csf('product_dept')];
		$style_name=$value[csf('style_ref_no')];
		$buyer_name=$value[csf('buyer_name')];
		$po_number=$value[csf('po_number')];
		$job_no=$value[csf('job_no')];
	}
	
	$sql_cut_name=sql_select("SELECT entry_date,table_no,cut_num_prefix_no,batch_id,company_id from ppl_cut_lay_mst where id=$data[2]");
	foreach($sql_cut_name as $cut_value)
	{
		$table_name=$cut_value[csf('table_no')];
		$cut_date=change_date_format($cut_value[csf('entry_date')]);
		$cut_prifix=$cut_value[csf('cut_num_prefix_no')];
		$company_id=$cut_value[csf('company_id')];
		//$batch_no=$cut_value[csf('batch_id')];
		$comp_name=return_field_value("company_short_name","lib_company", "id=$company_id");
		$new_cut_no=$comp_name."-".$cut_prifix;
		$bundle_title="";
	}
	
	if($data[7]=="") $data[7]=0;
	$sql_bundle_copy=sql_select("SELECT id,bundle_use_for from ppl_bundle_title where company_id=$company_id and id in ($data[7])");
	$cope_page=1;
	if(count($sql_bundle_copy)!=0)
	{
		foreach($color_sizeID_arr as $val)
		{
			$batch_no=$roll_data_arr[$val[csf("roll_id")]]['batch'];
			$shade=$roll_data_arr[$val[csf("roll_id")]]['shade'];
			// bottom Right side page no show
			$pdf->Code40(190, 288, 'Page No: '.$cope_page, $ext = true, $cks = false, $w = 0.15, $h = 1, $wide = true, true, 6);
			foreach($sql_bundle_copy as $inf)
			{
				if($br==24)
				{
					$cope_page++;
					$pdf->AddPage(); $br=0; $i=8; $j=4; $k=0;
				}
				if( $k>0 && $k<4 ) { $i=$i+50; }
				
				$pdf->Code40($i, $j-1.5, $val[csf("barcode_no")]." P. Date: ".date("j F, g:i a"), $ext = true, $cks = false, $w = 0.2, $h = 1, $wide = true, true,5);
				$pdf->Code40($i, $j+1.2, $job_no." , ".$val[csf("bundle_no")], $ext = true, $cks = false, $w = 0.2, $h = 1, $wide = true, true,5);
				$pdf->Code40($i, $j+4.2, "Cut Qty ".$val[csf("marker_qty")].", Front Part "."(".$val[csf("pattern_no")].")", $ext = true, $cks = false, $w = 0.2, $h = 1, $wide = true, true,5);
				$pdf->Code40($i, $j+7.2, "Table No: ".$table_no_library[$table_name].", OCN: ".$order_cut_no.", ".$cut_date, $ext = true, $cks = false, $w = 0.2, $h = 1, $wide = true, true,5) ;
				$pdf->Code40($i, $j+10.2, "Buyer Name: ".$buyer_library[$buyer_name].", Order No: ".$po_number, $ext = true, $cks = false, $w = 0.2, $h = 1, $wide = true, true,5) ;
				$pdf->Code40($i, $j+13.2, "Style No: ".$style_name, $ext = true, $cks = false, $w =0.2, $h = 1, $wide = true, true,4) ;
				$pdf->Code40($i, $j+16.2, "Item: ".$garments_item[$data[4]].", Country: ".$country_arr[$val[csf("country_id")]], $ext = true, $cks = false, $w =0.2, $h = 1, $wide = true, true,5) ;
				$pdf->Code40($i, $j+19.2, "Color: ".$color_library[$data[5]], $ext = true, $cks = false, $w = 0.2, $h = 1, $wide=true,true,5);
				$pdf->Code40($i, $j+22.2, "Size No: ".$size_arr[$val[csf("size_id")]].", Batch: ".$batch_no.", Shade: ".$shade, $ext = true, $cks = false, $w = 0.2, $h = 1, $wide = true, true,5) ;
				$pdf->Code40($i, $j+25.2, "Gmts. No :".$val[csf("number_start")]."-".$val[csf("number_end")].", Gmts Qty: ".$val[csf("size_qty")], $ext = true, $cks = false, $w =0.2, $h = 1, $wide = true, true,5) ;
				
				$pdf->Code39($i-1, $j+32.2, $val[csf("barcode_no")], $ext = true, $cks = false, $w = 0.16, $h = 8, $wide = true, $textonly=false,$fontSize=6);
				$k++;
				if($k==4)
				{
					$k=0; $i=8; $j=$j+48;
				}
				$br++;
			}
		}
	}
	else
	{
		foreach($color_sizeID_arr as $val)
		{
			if($br==12)
			{
				$cope_page++;
				$pdf->AddPage(); $br=0; $i=10; $j=12; $k=0;
			}
			if( $k>0 && $k<3 ) { $i=$i+60; }
			
			$batch_no=$roll_data_arr[$val[csf("roll_id")]]['batch'];
			$shade=$roll_data_arr[$val[csf("roll_id")]]['shade'];
			
			$pdf->Code40($i, $j-2, $val[csf("barcode_no")]." P. Date: ".date("j F, g:i a"), $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7);
			$pdf->Code40($i, $j+1.2, $job_no." , ".$val[csf("bundle_no")], $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7);
			
			$pdf->Code40($i, $j+4.2, "Cut Qty ".$val[csf("marker_qty")].", Front Part "."(".$val[csf("pattern_no")].")", $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7);
			$pdf->Code40($i, $j+7.2, "Table No: ".$table_no_library[$table_name].", OCN: ".$order_cut_no.", ".$cut_date, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i, $j+10.2, "Buyer Name: ".$buyer_library[$buyer_name].", Order No: ".$po_number, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i, $j+13.2, "Style No: ".$style_name, $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i, $j+16.2, "Item: ".$garments_item[$data[4]].", Country: ".$country_arr[$val[csf("country_id")]], $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i, $j+19.2, "Color: ".$color_library[$data[5]], $ext = true, $cks = false, $w = 0.7, $h = 1, $wide=true,true,7);
			$pdf->Code40($i, $j+22.2, "Size No: ".$size_arr[$val[csf("size_id")]].", Batch: ".$batch_no.", Shade: ".$shade, $ext = true, $cks = false, $w = 0.7, $h = 1, $wide = true, true,7) ;
			$pdf->Code40($i, $j+25.2, "Gmts. No :".$val[csf("number_start")]."-".$val[csf("number_end")].", Gmts Qty: ".$val[csf("size_qty")], $ext = true, $cks = false, $w =0.7, $h = 1, $wide = true, true,7) ;
			
			//$pdf->Code39($i-1, $j+35.2, $val[csf("barcode_no")]);
			
			$pdf->Code39($i-1, $j+34.2, $val[csf("barcode_no")], $ext = true, $cks = false, $w = 0.22, $h = 17, $wide = true, $textonly=false,$fontSize=11);
			$k++;
			
			if($k==2)
			{  $k=0; $i=10; $j=$j+67; }
			$br++;
			
		}
	}
	foreach (glob(""."*.pdf") as $filename) {
		@unlink($filename);
	}
	$name = 'bundle_barcode_' . date('j-M-Y_h-iA') . '.pdf';
	$pdf->Output( "".$name, 'F');
	echo $name;
	exit();
}

?>