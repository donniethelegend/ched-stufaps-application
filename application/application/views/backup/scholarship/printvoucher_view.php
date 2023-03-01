<!DOCTYPE html>
<html>
  <head>
   <style>
html, body {
    
}

html {
    display: table;
    margin: auto;
}

body {
	width:100%;
    display: table-cell;
    vertical-align: middle;
	font-size: 20px;
}
   </style>
	
  </head>
  
  <body>
  <div id="page-wrap">
	
	<table border="1" width="1150">
	<tr >
		<td colspan="5" rowspan="3" style="text-align:center;">
			<h3>Commission on Higher Education</h3>
			<h3>Regional Office No. 1</h3>
			<br>
			<h3>DISBURSEMENT VOUCHER</h3>
		</td>
		<td width="15%" style="text-align:left;vertical-align:top;">Fund Cluster: <br><strong><?php echo $voucher_details->fundcluster;?></strong></td>
		

	</tr>
	<td width="15%" style="text-align:left;vertical-align:top;">Date:<br><strong><?php echo $voucher_details->voucherdate;?></strong></td></tr>
	<td width="15%" style="text-align:left;vertical-align:top;">DV No.:<br><strong><?php echo $voucher_details->dvno;?></strong></td></tr>
	
	
	</table>
	
	

	
	<table border="1" width="1150"><tr>
	
	
	<td width="10%" style="text-align:left;">
			Mode of Payment
	</td>	
	<td colspan="100%" style="text-align:left;">	
						<input type="checkbox" style="zoom:2" checked />    MDS Check  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
						<input type="checkbox" style="zoom:2" />    Commercial Check   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" style="zoom:2" />    ADA   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="checkbox" style="zoom:2" />    Others (Please specify)    </td>
		
	</tr>
	
	
	<tr>
	
	<td width="10%" style="text-align:left;">
			Payee
			<br>
			<br>
			
		</td>	
	<td colspan="1" style="text-align:left;"><br><strong>
	<?php echo $voucher_details->firstname . " " .$voucher_details->middlename . " " .$voucher_details->lastname;
		  
	?></strong>
			<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>
		</td>
		<td colspan="1" style="text-align:left;">
			TIN/Employee No.:
			<br>
			<br>
			
		</td>
		<td colspan="1" style="text-align:left;">
			ORS/BURS No.:
			<br><br>
			<strong><?php echo $voucher_details->orsno;?></strong>
			<br><br>
			
		</td>
	</tr>
	<td width="10%" style="text-align:left;">
			Address
	</td>
	<td colspan="100%" style="text-align:left;">
	<strong><?php echo $voucher_details->hei;?></strong>
	</td>
	
	
	
	
	<table border="1" width="1150">
	<tr>
	<td width="590" style="text-align:left;vertical-align:top;">
		Particulars
		<br>
		<br>
		</td>
	<td width="197" style="text-align:center;vertical-align:top;">
		Responsibility<br>Center
		</td>
	
	<td width="197" style="text-align:center;vertical-align:top;">
		MFO/PAP
		<br>
		</td>
		<td width="197" style="text-align:center;vertical-align:top;">
		Amount
		<br>
		</td>
	
	
	
	
	
	</tr>
	<tr>
	<td width="590" style="text-align:left;vertical-align:top;">
		To pay for the financial assistance as CHED StuFAP grantee enrolled during the <?php echo $voucher_details->vouchersemester;?> of School Year <?php echo $voucher_details->vouchersy;?>
		<br>
		Award No.: <strong><?php echo $voucher_details->awardnumber;?></strong>
		<br>
		<br>
		<strong><?php echo $voucher_details->congressionaldistrict;?>
		<br>
		<br>
		<strong style="float:right; margin-right:100px;">Amount Due</strong>
		</td>
	<td width="197" style="text-align:center;vertical-align:top;">
		
		<?php echo $voucher_details->responsibility;?>
		<br>
		<br>
		</td>
	
	<td width="197" style="text-align:center;vertical-align:top;">
		<?php echo $voucher_details->mfopap;?>
		<br>
		<br>
		</td>
		<td width="197" style="text-align:center;vertical-align:top;">
		<strong><?php echo number_format($voucher_details->amount,2);?></strong>
		<br>
		<br><br>
		<br><br><br>
		<p style="width:100%;border:2px solid;"></p>
		<strong><?php echo number_format($voucher_details->amount,2);?></strong>
		</td>
	
	</tr>
	
	
	
	<table border="1" width="1150">
	<tr>
		<td
		<strong><strong>A. Certified: Expenses/Cash Advance necessary, lawful and incurred under my direct supervision.</strong><br><br><br>
		<center><strong>NYMPHA N. BUENIO</strong></CENTER>
		<CENTER>Chief Administrative Officer</CENTER>
		</td>
	</tr>
	
	
	<tr>
	<td><strong>B. Account Entry:</strong></td>
	</tr>
	</table>
	
	
	<table border="1" width="1150">
	
	<tr>
	<td width="590" style="text-align:center;vertical-align:top;">
		Account Title
		<br>
		</td>
	<td width="197" style="text-align:center;">
		Responsibility Center
		</td>
	
	<td width="197" style="text-align:center;">
		MFO/PAP
		</td>
		<td width="197" style="text-align:center;">
		Amount
		</td>
	
	
	
	
	
	</tr>
	<tr>
	<td width="590" style="text-align:left;vertical-align:top;">
		<?php
		foreach ($accounting_entry as $aentry):
		
		if($aentry['accounttitle']=="Donations"){
			echo "<span style='left-margin:0px;'>".$aentry['accounttitle']."</span>";
		}else{
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$aentry['accounttitle'];
		}
		//echo $aentry['accounttitle'];
		echo "<br><br>";
		//echo "<option value='".$stype['typecode']."'>".$stype['typedescription']."</option>";
		
		endforeach;
	?>    
		</td>
	<td width="197" style="text-align:center;vertical-align:top;">
		<?php
		foreach ($accounting_entry as $aentry):
			echo $aentry['uacscode'];
			echo "<br><br>";
		endforeach;
		?>
		</td>
	
	<td width="197" style="text-align:center;vertical-align:top;">
	<strong>
		<?php
		foreach ($accounting_entry as $aentry):
			if($aentry['columnentry']=="Debit"){
			echo number_format($aentry['amount'],2);	
			}
			
		endforeach;
		?>
		</strong>
		</td>
	<td width="197" style="text-align:center;">
	<br>
	<strong>
		<?php
		foreach ($accounting_entry as $aentry):
			if($aentry['columnentry']=="Credit"){
			echo number_format($aentry['amount'],2);	
			}
			
		endforeach;
		?>
		</strong>
		</td>
	
	</tr>
	
	</table>
	
	<table border="1" width="1150">
	<tr>
	<td width="590" style="text-align:left;vertical-align:top;">
		<strong>C. Certified:</strong>
		<br>
		</td>
	<td width="620" style="text-align:left;">
		<strong>D. Approved for Payment:</strong>
		</td>
		</tr>
		
		<tr>
	<td width="590" style="text-align:left;vertical-align:top;">
		<input type="checkbox" style="zoom:2" checked />Cash Available 
		<br>
		<input type="checkbox" style="zoom:2" />Subject to Authority to Debit Account (when applicable) 
		<br>
		<input type="checkbox" style="zoom:2" checked />Supporting documents complete and amount claimed proper
	
		</td>
	<td width="610" style="text-align:left;">
		
		</td>
		</tr>
	</table>
	
	
	<table border="1" width="1150">
	
	
	<tr>
	<td width="10%" style="text-align:left;">
		Signature</td>
		<td width="550"><center><br><br></center></td>
	
	</td>
	<td width="10%" style="text-align:left;">
		Signature</td>
		<td width="590"><center><br><br></center></td>
	</tr>
	
	<tr>
	<td width="10%" style="text-align:left;">
		Printed Name</td>
		<td width="550"><center><strong>KRIZZANNE C. INIGO</strong></center></td>
	
	
	<td width="10%" style="text-align:left;">
		Printed Name</td>
		<td width="580"><center><strong>CHERRIE MELANIE A. DIEGO, Ed.D.</strong></center></td>
	</tr>
	
	</table>
	<table border="1" width="1150">
	
	<tr>
	<td width="10%" style="text-align:left;">
		Position </td>
		<td width="550"><center><strong>Accountant II<br>Head, Accounting Unit/Authorized Representative</strong></center></td>
	
	
	<td width="10%" style="text-align:left;">
		Position </td>
		<td width="580"><center><strong>Director IV<br>Agency Head/Authorized Representative</strong></center></td>
	</tr>
	</table>
	
	
	<table border="1" width="1150">
	
	<tr>
	<td width="10%" style="text-align:left;">
		Date </td>
		<td width="550"><center><strong><?php echo $voucher_details->voucherdate;?><br></strong></center></td>
	
	
	<td width="10%" style="text-align:left;">
		Date </td>
		<td width="580"><center><strong><br><br><br></strong></center></td>
	</tr>
	</table>
	
	<table border="1" width="1150">
	
	<td width="80%" style="text-align:left;">
			<strong>E. Receipt of Payment</strong>
	</td>
	<td width="20%" style="text-align:left;">
			JEV No.
	</td>
	
	</table>
	
	<table border="1" width="1150">
	
	<tr>
	<td width="10%" style="text-align:center;vertical-align:top;">
		Check/  ADA No.:
		<br>
		</td>
	<td width="197" style="text-align:center;">
		
		</td>
	
	<td width="15%" style="text-align:left;vertical-align:top;">
		Date:
		</td>
		<td width="250" style="text-align:left;vertical-align:top;">
		Bank Name & Account Number:
		</td>
	<td width="20%" style="text-align:center;">
		
		</td>
	
	</tr>
	
	</table>
	
	
	
	
	<table border="1" width="1150">
	
	<tr>
	<td width="10%" style="text-align:left;vertical-align:top;">
		Signature:
		<br>
		<br>
		<br>
		</td>
	<td width="197" style="text-align:center;">
		
		</td>
	
	<td width="15%" style="text-align:left;vertical-align:top;">
		Contact Number:
		</td>
		<td width="250" style="text-align:left;vertical-align:top;">
		Print Name:
		<br>
		<strong><?php echo $voucher_details->firstname . " " .$voucher_details->middlename . " " .$voucher_details->lastname;?></strong>
		</td>
	<td width="20%" rowspan="2" style="text-align:left;vertical-align:top;">
		Date
		</td>
	
	</tr>
	
	
	<td colspan="4" style="text-align:left;">
	Official Receipt No. & Date/Other Documents
	
	
	</td>
	
	
	
	
	
	
	</table>
	
	
	
	
	
	
	
	
	
	
	</div>
	</table>
	
	
	
	

	
	
	
	
	
	</table>
	
		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		</td></tr>
	
		</table>
   
   
   
   
   </p>
  </body>
</html>