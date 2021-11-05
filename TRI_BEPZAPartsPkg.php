<?php date_default_timezone_set('Asia/Dhaka');  ?>  
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IBWS Packing  Print</title>
<?php
function number_suffix($number){
 
    // Validate and translate our input
    if ( is_numeric($number)){
 
        // Get the last two digits (only once)
        $n = $number % 100;
 
    } 
    else {
        // If the last two characters are numbers
        if ( preg_match( '/[0-9]?[0-9]$/', $number, $matches )){
 
            // Return the last one or two digits
            $n = array_pop($matches);
        } 
        else {
 
            // Return the string, we can add a suffix to it
            return $number;
        }
    }
 
    // Skip the switch for as many numbers as possible.
    if ( $n > 3 && $n < 21 )
        return $number . 'th';
 
    // Determine the suffix for numbers ending in 1, 2 or 3, otherwise add a 'th'
    switch ( $n % 10 ){
        case '1': return $number . 'st';
        case '2': return $number . 'nd';
        case '3': return $number . 'rd';
        default:  return $number . 'th';
    }
}

?>


<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
.style2 {
	font-size: 28px;
	font-weight: bold;
	font-family: Verdana;
}
body,td,th {
	font-family: Verdana;
	font-size: 14px;
}

.style4 {font-size: 18px}
.style5 {
	font-size: 10px;
	font-weight: bold;
}

-->
</style>
</head>

<?php
require_once ('class.numbertoword.php')

?>

<body>
<p>
  <?php
// Make a MySQL Connection
require ('dbcon.php');
//mysql_connect("192.168.1.228", "Admin", "dilhdk") or die(mysql_error());
//mysql_select_db("firefox") or die(mysql_error());

// Retrieve all the data from the "example" table

$invpass=trim($_GET['InvNo'] );

/*$result5 = mysql_query("SELECT * FROM Container_Head WHERE  ContainerNo='$invpass' ")
or die(mysql_error());  


// store the record of the "example" table into $row
$row5 = mysql_fetch_array( $result5 );

$blno=$row5['BLNo1'];*/



//echo"<H2 > Sales Confirmation </H2>";

$result1 = mysql_query("SELECT * FROM Ibws_Head_Inv_PC3 WHERE  Inv_No='$invpass' ")
or die(mysql_error());  


// store the record of the "example" table into $row
$row1 = mysql_fetch_array( $result1 );
	
	
	$sqll=mysql_query("SELECT * FROM TRI_BL_Cont_Inv WHERE Ibws_Inv='$invpass'");
	$recs=mysql_fetch_array($sqll);
	
	$Line_No=$recs['Line_No'];
	
	$sqll2a=mysql_query("SELECT * FROM TRI_BL_Cont_Item WHERE Line_No='$Line_No'");
	$recs2a=mysql_fetch_array($sqll2a);
	
	$contnonew=$recs2a['Cont_No'];
	
	


$result = mysql_query("SELECT * FROM Title where Title_ID='".$row1['InvoiceTo']."'")
or die(mysql_error());  

// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );

$tname=$row['Name'];

//echo " Address: ".$row['Add1'];
$ad1=$row['Add1'];
$ad2=$row['Add2'];
$ad3=$row['Add3'];
$email=$row['Email'];

//echo " Telephone: ".$row['Tel'];
$tel=$row['Tel'];

echo"<br>";
//echo " Fax: ".$row['Fax'];
$fax=$row['Fax'];

$scno=$row1['Sc_no'];
$Internal=$row1['Internal'];
$InvoiceTo=$row1['InvoiceTo'];


$dest=$row1['iTo'];

$tdate=$row1['Inv_Date'];
//$tdate=date("Y-m-d");
$port=$row1['iFrom'];


$orderno=$row1['Order_No'];

$orderdate=$row1['Order_Date'];

$lcrecived=$row1['LC_Rcvd_BY'];
//echo"<br>";

//echo "L/C Expiery Date :".$row1['LC_Expire_Date'];
$lcexpierydate=$row1['LC_Expire_Date'];
//echo"<br>";

//echo "Term :".$row1['Term'];
$term=$row1['Term'];
//echo"<br>";

//echo "Shpt Before  :".$row1['Shpt_Before'];
$shptbefore=$row1['Shpt_Before'];
//echo"<br>";



//echo "Fright :".$row1['Fright'];

$Vsl_Name=$row1['Vsl_Name'];
//echo"<br>";

//echo "Payment :".$row1['Payment'];
$pd=$row1['Payment_Dates'];
$payment=$row1['Payment'];
$rvs=$row1['Invoice_no'];
$Description=$row1['Description'];
$From=$row1['From'];
$To=$row1['To'];
$Etd=$row1['Etd'];
$Lc_no=$row1['Lc_no'];
$shpg=$row1['Terms'];
$payment=$row1['PayTerms1'];
//echo"<br>";
		   $curr=$row1['Currency'];
		   
		 //  if($curr=="US$") {
               $curr='$';
			   $curr_name="US DOLLARS";
		//	  }  
         //   else  
		  //   {
	//		 if($curr=="EURO") 
	 //              {  
	//			   $curr='&euro;';
	//			   $curr_name="EURO";
	//			  }
	//	       }
	//		 if($curr=="NT$") 
	//               {  
	//			   $curr="NT$";
	//			    $curr_name=" TAIWAN DOLLAR ";
	//			  }
	//		 if($curr=="RMB") 
	 //              {  
	//			   $curr="RMB";
	//			   $curr_name="RENMINBI";
	//			  }




/*
$result100 = mysql_query("SELECT * FROM Title where Title_ID='".$row1['InvoiceTo']."'")
or die(mysql_error());  

// store the record of the "example" table into $row
$row100 = mysql_fetch_array( $result100 );

$add1=$row100['Add1'];
$add2=$row100['Add2'];
$add2=$row100['Add2'];
$country=$row100['Country'];
$cusid=$row100['Title_ID'];
$custname=$row100['Name'];
*/
///////////////







/////////////


?> 
<?php 	  
  	       $result1 = mysql_query("SELECT * from Ibws_Inv_Remarks_PC3 Where  internal='$Internal'   ")
           or die(mysql_error());  

// store the record of the "example" table into $row
$row1 = mysql_fetch_array( $result1 );
?>
</p>
<table width="734" border="0">
  <tr>
    <td width="1" height="669">&nbsp;</td>
    <td width="723" valign="top"><table width="712" border="0">
      <tr class="style1">
        <td colspan="5"><div align="center" class="style2"><?php print $tname ?></div></td>
      </tr>
      <tr>
        <td height="42" colspan="2" valign="top">Email:<?php print $email ?></td>
        <td width="278" rowspan="2" align="center"><?php print $ad1  ?>
          <div align="center"><?php print $ad2  ?></div>          <?php print $ad3  ?></td>
        <td colspan="2" valign="top"> <div align="right">Tel No: &nbsp;  <?php print $tel  ?>
            <div align="right">Fax No: <?php print $fax  ?></div>
        </div></td>
        </tr>
      <tr>
        <td width="125">&nbsp;</td>
        <td width="92">&nbsp;</td>
        <td width="199">&nbsp;</td>
        <td width="1">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="5"><div align="center" class="style1"> Packing List </div></td>
      </tr>
      
      <!--tr>
        <td>Invoice No:</td>
        <td colspan="2"><?php /*print $blno*/ ?>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr-->
      <tr>
        <td>Invoice No : </td>
        <td colspan="2"><?php print $invpass  ?></td>
        <td colspan="2"><div align="right">Date:<?php print $tdate ?></div></td>
      </tr>
      <tr>
        <td>Messers </td>
        <td colspan="2">
		<?php 
/*
$result100 = mysql_query("SELECT * FROM Title where Title_ID='".$InvoiceTo."'")
or die(mysql_error());  

// store the record of the "example" table into $row
$row100 = mysql_fetch_array( $result100 );
$name = $row100['Name'];
$add1=$row100['Add1'];
$add2=$row100['Add2'];
$add2=$row100['Add2'];
*/
$result100 = mysql_query("SELECT * FROM Title where Title_ID='TRI'")
or die(mysql_error());  

// store the record of the "example" table into $row
$row100 = mysql_fetch_array( $result100 );
$name = $row100['Name'];
$add1=$row100['Add1'];
$add2=$row100['Add2'];
$add3=$row100['Add3'];
/*$country=$row100['Country'];*/
$ftyy=$row100['fty_ID'];
//$cusid=$row100['Cst_ID'];
//$custname=$row100['Company_Name'];
//$country=$row100['Country'];
//$cusid=$row100['Cst_ID'];
//$custname=$row100['Company_Name'];

		
		
		print $name ?></td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><?php print $add1  ?></td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><?php print $add2  ?></td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2"><?php print $add3  ?></td>
        <td colspan="2">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="3" valign="top">Name Of Vessel  : <?php print $Vsl_Name  ?> &nbsp;</td>
        <td rowspan="9" valign="top">
          <?php  
		    echo "Shipping Marks: <br>" ;
		    // echo  $row1['Ship_marks']; 
			$exploded_str = explode(chr(13),  $row1['Ship_marks']); 
			 		 
			 foreach($exploded_str as $key => $value)
			 {
              $str=$value;
			 if (strlen($str)>25) {  
			  $str=chunk_split($str,25,"<br>");
			 // $str= str_replace(chr(32),"&nbsp;",$value); 
  		      echo $str;

              }
			   else
			   {
   			  $str= str_replace(chr(32),"&nbsp;",$value); 
			   echo $str."<br>";
                }
             }

		?></td>
      </tr>
      <tr>
        <td>Container No </td>
        <td colspan="2"><?php print $contnonew  ?></td>
        </tr>
      <tr>
        <td>Sailing On/About </td>
        <td colspan="2"><?php print $Etd ?></td>
        </tr>
      <tr>
        <td>Shipping </td>
        <td colspan="2">FROM <?php print $From ?> TO <?php print $To ?></td>
      </tr>
      <tr>
        <td>Goods</td>
        <td colspan="2"><strong>Raw Materials For Making Bicycle Components/Parts</strong></td>
        </tr>
      
      
      <tr>
        <td colspan="3">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
        <?php 	  
    
	$result1 = mysql_query("SELECT paytermname FROM Payterms_new Where paytermsid='$payment'" ) 
	
	or die(mysql_error());  
			
			// store the record of the "example" table into $row
	$row1 = mysql_fetch_array( $result1 );

    $payment=$row1['paytermname'];
	
    	$result1 = mysql_query(" SELECT Term_name FROM Pc_Terms Where Term_id='$term' " ) 
	
	or die(mysql_error());  
			
			// store the record of the "example" table into $row
	$row1 = mysql_fetch_array( $result1 );


$terms=$row1['Term_name'];

?>	
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="5" colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td height="5" colspan="5"><div align="center"></div></td>
        </tr>
	  
	
 <?php 	  
    
	$result9 = mysql_query("SELECT Description FROM BD_Model Where Model_No='$Des'" ) 
	
	or die(mysql_error());  
			
			// store the record of the "example" table into $row
	$row11 = mysql_fetch_array( $result9 );

    
	
	

?>
      
           <tr>
        <td colspan="5" valign="bottom"><hr /></td>
      </tr>
      <tr>
        <td colspan="5" valign="top"><table width="867" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td><span class="style5">SR No</span></td>
            <td colspan="2"><strong>Part Name(HS CODE)              </strong></td>
            <!--td colspan="6">
              <div align="center"><strong>Sc#              </strong></div></td-->
            <td width="88"><div align="center" class="style6"><strong>TTL Qty</strong></div></td>
            
            <td width="73"> <div align="center" class="style6"><strong>Unit</strong></div></td>
            <td width="70" class="style6" ><strong>CTN/PKGS</strong></td>
            <td width="70"><div align="right"><strong>TTL N.W<br />
            </strong></div>
              <div align="right"></div></td>
              <td width="70"><div align="right"><strong>TTL G.W<br />
              </strong></div>
                <div align="right"></div></td>
            </tr>
            
		            <tr>
            <td colspan="8" valign="top"><hr /></td>
            </tr>

          <!--tr>
            <td colspan="11"><span class="style4"><strong>Bicycle Parts</strong></span>&nbsp;</td>
            </tr-->
         
          
          
		  
		       <?php
			   /*
	$result = mysql_query("SELECT `Ibws_Data_shp_qty`.* ,`Parts`.`Item`,`Parts`.`HS_Code`

FROM
`Ibws_Data_shp_qty`
Inner Join `Parts` ON `Ibws_Data_shp_qty`.`Part_ID` = `Parts`.`Part_ID`
WHERE
`Inv_No` =  '$invpass'
ORDER BY
`Ibws_Data_shp_qty`.`Group_ID`,`Ibws_Data_shp_qty`.`Auto_No`,`Parts`.`Part_ID`,`Ibws_Data_shp_qty`.`Sc_No`,`Ibws_Data_shp_qty`.`Seq_No` ASC 
");
*/
$invg=substr($invpass,0,11);
$resulet1199 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NW, sum(Gw*Noofpkg) AS TTL_GW from Ibws_Data_shp_qty_pk_pc3 WHERE Inv_No='$invpass'" ) or die(mysql_error());  
		   $rowe1199 = mysql_fetch_array( $resulet1199 );
		   $ttlnwt=$rowe1199['TTL_NW'];
		   $ttlgwt=$rowe1199['TTL_GW'];

		   $resulet1199 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NW, sum(Gw*Noofpkg) AS TTL_GW from Ibws_Data_shp_pc3_sp_pk WHERE Inv_No='$invpass'" ) or die(mysql_error());  
		   $rowe1199 = mysql_fetch_array( $resulet1199 );
		   $ttlnwt=$ttlnwt+$rowe1199['TTL_NW'];
		   $ttlgwt=$ttlgwt+$rowe1199['TTL_GW'];

		   $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE (PackageID='' OR PackageID IS NULL) and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnwy=round($row11992['TTL_NWS'],2);
			   	$ttlgwy=round($row11992['TTL_GWS'],2);

			   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE (PackageID='' OR PackageID IS NULL) and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnwy=$ttlnwy+round($row11992['TTL_NWS'],2);
			   	$ttlgwy=$ttlgwy+round($row11992['TTL_GWS'],2);

			   	if(mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%' AND ContSZ!=' Courier' AND ContSZ!='Air'"))!=0 && mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%'"))>1){

			   		$resulet1199 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NW, sum(Gw*Noofpkg) AS TTL_GW from Ibws_Data_shp_qty_pk_pc3 WHERE Inv_No!='$invpass' AND Inv_No LIKE '$invg%'" ) or die(mysql_error());  
					   $rowe1199 = mysql_fetch_array( $resulet1199 );
					   $ttlnwt=$ttlnwt+$rowe1199['TTL_NW'];
					   $ttlgwt=$ttlgwt+$rowe1199['TTL_GW'];

					   $resulet1199 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NW, sum(Gw*Noofpkg) AS TTL_GW from Ibws_Data_shp_pc3_sp_pk WHERE Inv_No!='$invpass' AND Inv_No LIKE '$invg%'" ) or die(mysql_error());  
					   $rowe1199 = mysql_fetch_array( $resulet1199 );
					   $ttlnwt=$ttlnwt+$rowe1199['TTL_NW'];
					   $ttlgwt=$ttlgwt+$rowe1199['TTL_GW'];

					   $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE (PackageID='' OR PackageID IS NULL) and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
						   	$row11992 = mysql_fetch_array( $result11992);
						   	$ttlnwy=$ttlnwy+round($row11992['TTL_NWS'],2);
						   	$ttlgwy=$ttlgwy+round($row11992['TTL_GWS'],2);

						   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE (PackageID='' OR PackageID IS NULL) and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
						   	$row11992 = mysql_fetch_array( $result11992);
						   	$ttlnwy=$ttlnwy+round($row11992['TTL_NWS'],2);
						   	$ttlgwy=$ttlgwy+round($row11992['TTL_GWS'],2);
			   	}

			   	$result11991 = mysql_query("select Part_ID,sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtyt, PackageID,sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE Inv_No='$invpass' AND PackageID!='' AND PackageID IS NOT NULL GROUP BY PackageID,Part_ID") or die(mysql_error());  
			   while($row11991 = mysql_fetch_array( $result11991)){
			   	$shippedqtyt=$row11991['shippedqtyt'];
			   	$PackageID=$row11991['PackageID'];
			   	$Part_ID=$row11991['Part_ID'];
			   	$ttlnws=$row11991['TTL_NWS'];
			   	$ttlgws=$row11991['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE Part_ID!='$Part_ID' AND PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
			   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
			   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$shippedqtys=$row11992['shippedqtys'];

			   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];

			   	if(mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%' AND ContSZ!=' Courier' AND ContSZ!='Air'"))!=0 && mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%'"))>1){
			   		$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
				   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

				   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
				   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

				   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];

				   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];
			   	}

			   	$nwper=round(($ttlnws/$shippedqtys)*$shippedqtyt,2);
			   	$gwper=round(($ttlgws/$shippedqtys)*$shippedqtyt,2);
			   	$ttlnwy=$ttlnwy+$nwper;
			   	$ttlgwy=$ttlgwy+$gwper;
			   }

			   $result11991 = mysql_query("select Part_ID,sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtyt,PackageID,sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE Inv_No='$invpass' AND PackageID!='' AND PackageID IS NOT NULL GROUP BY PackageID,Part_ID") or die(mysql_error());
         while($row11991 = mysql_fetch_array( $result11991)){
          $sumqtyt=$row11991['sumqtyt'];
          $PackageID=$row11991['PackageID'];
          $Part_ID=$row11991['Part_ID'];
          $ttlnws=$row11991['TTL_NWS'];
          $ttlgws=$row11991['TTL_GWS'];

          $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE Part_ID!='$Part_ID' AND PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
          $row11992 = mysql_fetch_array( $result11992);
          $ttlnws=$ttlnws+$row11992['TTL_NWS'];
          $ttlgws=$ttlgws+$row11992['TTL_GWS'];

          $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
          $row11992 = mysql_fetch_array( $result11992);
          $ttlnws=$ttlnws+$row11992['TTL_NWS'];
          $ttlgws=$ttlgws+$row11992['TTL_GWS'];

          $result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
          $row11992 = mysql_fetch_array( $result11992);
          $sumqtys=$row11992['sumqtys'];

          $result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
          $row11992 = mysql_fetch_array( $result11992);
          $sumqtys=$sumqtys+$row11992['sumqtys'];

          if(mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%' AND ContSZ!=' Courier' AND ContSZ!='Air'"))!=0 && mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%'"))>1){
          	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
	          $row11992 = mysql_fetch_array( $result11992);
	          $ttlnws=$ttlnws+$row11992['TTL_NWS'];
	          $ttlgws=$ttlgws+$row11992['TTL_GWS'];

	          $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
	          $row11992 = mysql_fetch_array( $result11992);
	          $ttlnws=$ttlnws+$row11992['TTL_NWS'];
	          $ttlgws=$ttlgws+$row11992['TTL_GWS'];

	          $result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
	          $row11992 = mysql_fetch_array( $result11992);
	          $sumqtys=$sumqtys+$row11992['sumqtys'];

	          $result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
	          $row11992 = mysql_fetch_array( $result11992);
	          $sumqtys=$sumqtys+$row11992['sumqtys'];
          }

          $nwper=round(($ttlnws/$sumqtys)*$sumqtyt,2);
          $gwper=round(($ttlgws/$sumqtys)*$sumqtyt,2);
          $ttlnwy=$ttlnwy+$nwper;
          $ttlgwy=$ttlgwy+$gwper;
         }

         if(mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%' AND ContSZ!=' Courier' AND ContSZ!='Air'"))!=0 && mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%'"))>1){

         	$result11991 = mysql_query("select Part_ID,sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtyt, PackageID,sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE Inv_No!='$invpass' AND Inv_No LIKE '$invg%' AND PackageID!='' AND PackageID IS NOT NULL GROUP BY PackageID,Part_ID") or die(mysql_error());  
			   while($row11991 = mysql_fetch_array( $result11991)){
			   	$shippedqtyt=$row11991['shippedqtyt'];
			   	$PackageID=$row11991['PackageID'];
			   	$Part_ID=$row11991['Part_ID'];
			   	$ttlnws=$row11991['TTL_NWS'];
			   	$ttlgws=$row11991['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE Part_ID!='$Part_ID' AND PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
			   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
			   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$shippedqtys=$row11992['shippedqtys'];

			   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];

			   		$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
				   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

				   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
				   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

				   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];

				   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];

			   	$nwper=round(($ttlnws/$shippedqtys)*$shippedqtyt,2);
			   	$gwper=round(($ttlgws/$shippedqtys)*$shippedqtyt,2);
			   	$ttlnwy=$ttlnwy+$nwper;
			   	$ttlgwy=$ttlgwy+$gwper;
			   }

			   $result11991 = mysql_query("select Part_ID,sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtyt,PackageID,sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE Inv_No!='$invpass' AND Inv_No LIKE '$invg%' AND PackageID!='' AND PackageID IS NOT NULL GROUP BY PackageID,Part_ID") or die(mysql_error());
         while($row11991 = mysql_fetch_array( $result11991)){
          $sumqtyt=$row11991['sumqtyt'];
          $PackageID=$row11991['PackageID'];
          $Part_ID=$row11991['Part_ID'];
          $ttlnws=$row11991['TTL_NWS'];
          $ttlgws=$row11991['TTL_GWS'];

          $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE Part_ID!='$Part_ID' AND PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
          $row11992 = mysql_fetch_array( $result11992);
          $ttlnws=$ttlnws+$row11992['TTL_NWS'];
          $ttlgws=$ttlgws+$row11992['TTL_GWS'];

          $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
          $row11992 = mysql_fetch_array( $result11992);
          $ttlnws=$ttlnws+$row11992['TTL_NWS'];
          $ttlgws=$ttlgws+$row11992['TTL_GWS'];

          $result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
          $row11992 = mysql_fetch_array( $result11992);
          $sumqtys=$row11992['sumqtys'];

          $result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
          $row11992 = mysql_fetch_array( $result11992);
          $sumqtys=$sumqtys+$row11992['sumqtys'];

          	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
	          $row11992 = mysql_fetch_array( $result11992);
	          $ttlnws=$ttlnws+$row11992['TTL_NWS'];
	          $ttlgws=$ttlgws+$row11992['TTL_GWS'];

	          $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
	          $row11992 = mysql_fetch_array( $result11992);
	          $ttlnws=$ttlnws+$row11992['TTL_NWS'];
	          $ttlgws=$ttlgws+$row11992['TTL_GWS'];

	          $result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
	          $row11992 = mysql_fetch_array( $result11992);
	          $sumqtys=$sumqtys+$row11992['sumqtys'];

	          $result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS sumqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
	          $row11992 = mysql_fetch_array( $result11992);
	          $sumqtys=$sumqtys+$row11992['sumqtys'];

          $nwper=round(($ttlnws/$sumqtys)*$sumqtyt,2);
          $gwper=round(($ttlgws/$sumqtys)*$sumqtyt,2);
          $ttlnwy=$ttlnwy+$nwper;
          $ttlgwy=$ttlgwy+$gwper;
         }

         }

         $rnw=$ttlnwt-$ttlnwy;
         $rgw=$ttlgwt-$ttlgwy;
         $snw=0; $sgw=0; $sinv=1;

         if(mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%' AND ContSZ!=' Courier' AND ContSZ!='Air'"))!=0 && mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%'"))>1){
          $selkm=mysql_query("SELECT Inv_No FROM Ibws_Head_Inv_PC3 WHERE Inv_No LIKE '$invg%' ORDER BY Internal LIMIT 1");
          $rowkm=mysql_fetch_assoc($selkm);
          $CNT=$rowkm['Inv_No'];
          if($CNT!=$invpass){
            $sinv=0;
          }
         }

$result = mysql_query("SELECT `TRI_Ref_Bepza_Partsinv`.* 

FROM
`TRI_Ref_Bepza_Partsinv`

WHERE
`Inv_No` =  '$invpass'
ORDER BY
`TRI_Ref_Bepza_Partsinv`.`Group_ID`,`TRI_Ref_Bepza_Partsinv`.`Auto_No` ASC 
");

 $total_quantity=0;
 $TotalUnit=""; 
 $CurrUnit ="";
 $UnitQty=0;
 $Carton=0;
 $shpqty=0;
 $shpqtyy=0;
 $shpqtyy1=0;
 $Sub_Total=0;
    	
	if (!$result) {
		die("Query to show fields from table failed");
	}
	else
	{
	  $pcno="";
	  $SeqNo="";
	  $partid="";
	  $xx=0;
	  
		 while($record = mysql_fetch_array( $result )) 
		  {
  		   $total_quantity = $total_quantity + $record['shp_qty'];
		   
		   $x++;  
		   
		   $Part_ID=$record['Part_ID'];
		   ///////sujeewa/////////////
		   $result1199 = mysql_query("SELECT * FROM TRI_TTL_NW_GW Where Part_ID='$Part_ID' and Inv_No='$invpass' " ) or die(mysql_error());  
		   $row1199 = mysql_fetch_array( $result1199 );
		   $ttlpkgs=$row1199['Noofpkg'];
		   /*$ttlnw=$row1199['TTL_NW'];
		   $ttlgw=$row1199['TTL_GW'];*/

		   $result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE Part_ID='$Part_ID' AND (PackageID='' OR PackageID IS NULL) and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnw=round($row11992['TTL_NWS'],2);
			   	$ttlgw=round($row11992['TTL_GWS'],2);

		   /*$result11991 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtyt, PackageID,sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE Part_ID='$Part_ID' and Inv_No='$invpass' AND PackageID!='' AND PackageID IS NOT NULL AND Nw>'0' AND Nw!='' AND Nw IS NOT NULL AND Gw>'0' AND Gw!='' AND Gw IS NOT NULL GROUP BY PackageID") or die(mysql_error());*/
		   $result11991 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtyt, PackageID,sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE Part_ID='$Part_ID' and Inv_No='$invpass' AND PackageID!='' AND PackageID IS NOT NULL GROUP BY PackageID") or die(mysql_error());  
			   while($row11991 = mysql_fetch_array( $result11991)){
			   	$shippedqtyt=$row11991['shippedqtyt'];
			   	$PackageID=$row11991['PackageID'];
			   	$ttlnws=$row11991['TTL_NWS'];
			   	$ttlgws=$row11991['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE  Part_ID!='$Part_ID' AND PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
			   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
			   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$shippedqtys=$row11992['shippedqtys'];

			   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];

			   	if(mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%' AND ContSZ!=' Courier' AND ContSZ!='Air'"))!=0 && mysql_num_rows(mysql_query("SELECT * FROM Container_Head_PC3 WHERE ContainerNo LIKE '$invg%'"))>1){
			   		$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE  PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
				   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

				   	$result11992 = mysql_query("select sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
				   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

				   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];

				   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No!='$invpass' AND Inv_No LIKE '$invg%'") or die(mysql_error());  
				   	$row11992 = mysql_fetch_array( $result11992);
				   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];

			   	}

			   	$nwper=round(($ttlnws/$shippedqtys)*$shippedqtyt,2);
			   	$gwper=round(($ttlgws/$shippedqtys)*$shippedqtyt,2);
          $ttlnw=$ttlnw+$nwper;
          $ttlgw=$ttlgw+$gwper;
			   }

			   if($snw==0 && ($ttlnw+$rnw)>0 && $sinv==1){
			   	$ttlnw=$ttlnw+$rnw;
			   	$snw=1;
			   }
			   if($sgw==0 && ($ttlgw+$rgw)>0 && $sinv==1){
			   	$ttlgw=$ttlgw+$rgw;
			   	$sgw=1;
			   }

		 		 /*$result11991 = mysql_query("select PackageID,sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtyt from Ibws_Data_shp_qty_pk_pc3 WHERE Part_ID='$Part_ID' and Inv_No='$invpass' AND PackageID!='' AND PackageID IS NOT NULL AND (Nw='0' OR Nw='' OR Nw IS NULL) GROUP BY PackageID") or die(mysql_error());  
			   while($row11991 = mysql_fetch_array( $result11991)){
			   	$PackageID=$row11991['PackageID'];
			   	$shippedqtyt=$row11991['shippedqtyt'];

			   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys,sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_qty_pk_pc3 WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$shippedqtys=$row11992['shippedqtys'];
			   	$ttlnws=$row11992['TTL_NWS'];
			   	$ttlgws=$row11992['TTL_GWS'];

			   	$result11992 = mysql_query("select sum(if(Noofpkg>'0',PerPkg*Noofpkg,PerPkg)) AS shippedqtys,sum(Nw*Noofpkg) AS TTL_NWS, sum(Gw*Noofpkg) AS TTL_GWS from Ibws_Data_shp_pc3_sp_pk WHERE PackageID='$PackageID' and Inv_No='$invpass'") or die(mysql_error());  
			   	$row11992 = mysql_fetch_array( $result11992);
			   	$shippedqtys=$shippedqtys+$row11992['shippedqtys'];
			   	$ttlnws=$ttlnws+$row11992['TTL_NWS'];
			   	$ttlgws=$ttlgws+$row11992['TTL_GWS'];

			   	$nwper=round(($ttlnws/$shippedqtys)*$shippedqtyt,2);
			   	$gwper=round(($ttlgws/$shippedqtys)*$shippedqtyt,2);
			   	$ttlnw=$ttlnw+$nwper;
			   	$ttlgw=$ttlgw+$gwper;
			   }*/
		   
		   $fttlpkgs=$fttlpkgs+$ttlpkgs;
		   $fttlnw=$fttlnw+round($ttlnw,2);
		   $fttlgw=$fttlgw+round($ttlgw,2);
		   ///////sujeewa/////////////
		    /*$result11 = mysql_query("SELECT * FROM Parts Where Part_ID='$Part_ID' " ) or die(mysql_error());  
			
			// store the record of the "example" table into $row
	        $row11 = mysql_fetch_array( $result11 );
			
			$partname=$row11['Item'];
			$hscode=$row11['HS_Code'];*/
			$hscode=$record['HS_Code'];
			$partname=$record['Item'];
			$unitt=$record['Unit'];
			
			
			/////////////////////
			
			/*
			$result11 = mysql_query("SELECT * FROM Ibws_Data_shp_qty FROM
`Ibws_Data_shp_qty`
Inner Join `Parts` ON `Ibws_Data_shp_qty`.`Part_ID` = `Parts`.`Part_ID`
WHERE
`Inv_No` =  '$invpass' Where Part_ID='$Part_ID' " ) or die(mysql_error());  
			
			// store the record of the "example" table into $row
	        $row11 = mysql_fetch_array( $result11 );
			
			*/
			
			////////
			
			
			
			
			
			
			//////////////////////
			/*
			///////////////////////////////
			if($Part_ID!=$partid)
	//	    $color="#E1FFC4";
	 //$shpqty=$shpqty+$record['shp_qty'];
	//	else
	//		  $color="#CCFFFF";
		{
		
			  
		echo '<tr>';
		echo '<td  height="20">';
		echo '</td>';
		echo '<td   height="20">';
		echo '</td>';
		echo '<td  height="20">';
		echo '</td>';
		echo '<td height="20">';
		//print '0';
		echo '</td>';
		
		echo '<td  height="20">';
		
		echo '</td>';
		//}
		
		//if($shippedqty != '0')
	//	{
		echo '<td  height="20" align="center">';
		//print $curr;
		print $shippedqty ;
		//print $unitt;
		echo '</td>';
	//	}
		
		echo '<td  height="20">';
		echo '</td>';
		echo '<td  height="20">';
		echo '</td>';
		echo '<td  height="20">';
		echo '</td>';
		
	//	if($Sub_Total != '0')
	//	{
		echo '<td  height="20" align="right">';
		print $curr;
		print number_format($Sub_Total,2);
		echo '</td>';
	//	}
		
		
		
		//}
		echo '</tr>';
		//$color="#E1FFC4";
		$Sub_Total=0;
		}
		
		*/
		
		/////////////////
		
		$RInvPcList1 = mysql_query("SELECT * FROM IBWS_Shipped_PC3 Where Part_ID='".$record['Part_ID']."' AND  Inv_No='".$record['Inv_No']."'" ) or die(mysql_error());  
			
			// store the record of the "example" table into $row
	      $InvPcList1 = mysql_fetch_array( $RInvPcList1 );
		  
		  $shippedqty=$InvPcList1['sumqty'];
		
			
		/////////////
		$RInvPcList = mysql_query("SELECT * FROM Ibws_Head_Inv_PcList_PC3 Where Sc_No=".$record['Sc_No']." AND SeqNo=".$record['Seq_No']." AND Inv_No='".$record['Inv_No']."'" ) or die(mysql_error());  
			
			// store the record of the "example" table into $row
	      $InvPcList = mysql_fetch_array( $RInvPcList );
		  
		  $shipmentfinal=$InvPcList['Final'];
		  
			 $result1000 = mysql_query("SELECT `Ibws_Data_shp_qty_pc3`.* FROM
`Ibws_Data_shp_qty_pc3`
WHERE
 Ibws_Data_shp_qty_pc3.Inv_No ='".$record['Inv_No']."' AND Ibws_Data_shp_qty_pc3.Part_ID ='".$record['Part_ID']."' ");
			 // $row1000 = mysql_fetch_array( $result1000 );
			   $Sub_Total="";
				while($row1000 = mysql_fetch_array( $result1000 ))
		
		      {
			  /*
			     $result111 = mysql_query("SELECT * FROM Ibws_Data_CH Where Sc_No=".$row1000['Sc_No']." AND Pc_No=1 AND Seq_No=".$row1000['Seq_No']." AND Part_ID='".$row1000['Part_ID']."'" ) or die(mysql_error());  
			
		     $row111 = mysql_fetch_array( $result111 );
			 
			 */
			  
			//     $Amount1000 = $record['Unitprice']*$row1000['Shiped_qty'];
				// $Sub_Total=$Sub_Total+$Amount1000;
				 $shpqtyy1=$shpqtyy1+$row1000['Shiped_qty'];
				 
			  }	 	
			
			////
			$RInvPcList1 = mysql_query("SELECT * FROM IBWS_Itemunitpricesum_PC3 Where Inv_No ='".$record['Inv_No']."' AND Part_ID ='".$record['Part_ID']."' " ) or die(mysql_error());  
			//echo "SELECT * FROM IBWS_Itemmsum Where Inv_No ='".$record['Inv_No']."' AND Part_ID ='".$record['Part_ID']."' ";
			//echo "<br>";
			// store the record of the "example" table into $row
	       $InvPcList1 = mysql_fetch_array( $RInvPcList1 );
		  
		  $Sub_Total=$InvPcList1['sumitem2'];
			
			
			
			
			////////////////////////////////
		   
		   
		   //Count Cotons
		    
		    $Carton=$Carton+((float)$record['Carton_To'] - (float)$record['Carton_From'])+1;
		   
		   
           
			if ($Part_ID!=$partid) {
			$partid=$Part_ID;
			$count=0;
	       if($count==0) {
			{
			$pcno=$record['Sc_No'];
	        $SeqNo =$record['Seq_No']; 
			
	?>
              <tr>
              <td align="center"><?php print $x ?></td>
            <td colspan="2" valign="top" class="style6"><u><strong><i><?php print $partname ?> (<?php print $hscode ?>)</i></strong>
              <?php
			  
			$result1 = mysql_query("SELECT Size ,Seq_No FROM PC_Item Where SC_No=".$record['Sc_No']." AND PC_No=1 AND Seq_No=".$record['Seq_No']."" ) or die(mysql_error());  
			
			// store the record of the "example" table into $row
	      $row1 = mysql_fetch_array( $result1 );


			$RInvPcList = mysql_query("SELECT * FROM Ibws_Head_Inv_PcList_PC3 Where Sc_No=".$record['Sc_No']." AND SeqNo=".$record['Seq_No']." AND Inv_No='".$record['Inv_No']."'" ) or die(mysql_error());  
			
			// store the record of the "example" table into $row
	      $InvPcList = mysql_fetch_array( $RInvPcList );

		
			
			// print $record['Sc_No']; ?>
              <?php //print $row1['Size']; ?>
              <space> 
              <?php //print substr('000'.$row1['Seq_No'],-3,3); ?>
              <?php 
			  
			
			 // print number_suffix($record['Ship_No']); 
			
			  
			  
			  ?>
              <space>
               <?php   if ($InvPcList['Final']) {
			 //  print " ( Final Shipment )";
			  }
			  
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  /*
		   $result1000 = mysql_query("SELECT `Ibws_Data_shp_qty`.* FROM
`Ibws_Data_shp_qty`
WHERE
Ibws_Data_shp_qty.Sc_No=".$InvPcList['Sc_No']." AND Ibws_Data_shp_qty.Pc_No='1' AND Ibws_Data_shp_qty.Seq_No=".$InvPcList['SeqNo']." AND Ibws_Data_shp_qty.Inv_No ='".$record['Inv_No']."' AND Ibws_Data_shp_qty.Ship_No=".$record['Ship_No']."");
			 // $row1000 = mysql_fetch_array( $result1000 );
			   $Sub_Total="";
				while($row1000 = mysql_fetch_array( $result1000 ))
		
		      {
			     $result111 = mysql_query("SELECT * FROM Ibws_Data Where Sc_No=".$row1000['Sc_No']." AND Pc_No=1 AND Seq_No=".$row1000['Seq_No']." AND Part_ID='".$row1000['Part_ID']."'" ) or die(mysql_error());  
			
		     $row111 = mysql_fetch_array( $result111 );
			  
			     $Amount1000 = $row111['Unit_Price1']*$row1000['Shiped_qty'];
				 $Sub_Total=$Sub_Total+$Amount1000;
				 
			  }	 
			    */
			  ?>
            </u></td>
            <!--td colspan="4" valign="top" class="style6"><div align="center"-->
              <?
			/*$Cntr="";
            $result1 = mysql_query("SELECT * FROM TRI_Ref_Bepza_Partinvscwise Where Inv_No='".$record['Inv_No']."' AND Item='$partname'  " ) or die(mysql_error());  
			//echo "SELECT * FROM Ref_Bepza_Partinvscwise Where Inv_No='".$record['Inv_No']."' AND Item='$partname' ";
			// store the record of the "example" table into $row
	        while($row1 = mysql_fetch_array( $result1 ))
			{
			$Cntr=$Cntr."/".$row1['Sc_No'];
			
			
			}
            
            echo $Cntr;*/
			
			$unitprice=$Sub_Total/$shippedqty;
            ?>
            <!--/div>              
            <div align="center"></div></td-->
            <td width="88"><div align="center"><strong><i><?php print $shippedqty ?></i></strong></div></td>
            <td><div align="center"><?php print $unitt ?></div></td>
            
             <td><div align="center"><?php print $ttlpkgs ?></div></td>
             <td><div align="center"><?php print number_format($ttlnw,2) ?></div></td>
             <td><div align="center"><?php print number_format($ttlgw,2); ?></div></td>
             <td width="142" align="right"><strong></i></td>
              </tr>
		  	          

      <?php
	     $TotalAmount=$TotalAmount+$Sub_Total;
           }}}
		   
       ?>
	     <?php	
				  
		   }
	}
	  
	
	
	mysql_free_result($result);
?>


          <tr>
            <td colspan="8"><hr /></td>
            </tr>
            
			
			
          <tr>
          <?php
		  
		 // 
			 // echo $pvalue1;
			//  $ttl2=$pvalue1+$ttl;
			 // echo "A";
		  
		  
		  ?>
            <td colspan="5">&nbsp; &nbsp; &nbsp; <?php 
			

				/*
			$UnitSql="SELECT  SUM(`Ibws_Data_shp_qty_pk_Unit`.`Shiped_qty`) As NoOfUnit , `Ibws_Data_shp_qty_pk_Unit`.`Unit`  From `Ibws_Data_shp_qty_pk_Unit`  WHERE Inv_No='$invpass' Group By `Ibws_Data_shp_qty_pk_Unit`.`Unit` ";
			//echo  $UnitSql;
			$unitresult = mysql_query($UnitSql);
			$LineCount=0; 
			 while($unitrecord = mysql_fetch_array( $unitresult ))
			 {
			  if ($LineCount>0)
			   echo " , ".$unitrecord['NoOfUnit'] . "  ".$unitrecord['Unit'] ;
			  else
			  echo $unitrecord['NoOfUnit'] . "  ".$unitrecord['Unit'] ." ";
			  $LineCount++;
			  
			 }
			*/
			$unitresult = mysql_query("SELECT  SUM(Shiped_qty) As sumpkg,Unit From Ibws_Data_shp_qty_pc3 where Inv_No='$invpass' GROUP BY Unit" );
			
			
			 while($unitrecord = mysql_fetch_array( $unitresult ))
			 {
			  echo $unitrecord['sumpkg'] . " ".$unitrecord['Unit'] ."  ";
			 }
			/*
			$UnitSql = mysql_query("SELECT  * From `IBWS_PKG_Invwise`  WHERE Inv_No='$invpass' " );
			
			
			//echo  $UnitSql;
			//$unitresult = mysql_query($UnitSql);
			$LineCount=0; 
			 while($unitrecord = mysql_fetch_array( $UnitSql ))
			 {
			  if ($LineCount>0)
			   echo " , ".$unitrecord['sumpkg'] . "  ".$unitrecord['Unit'] ;
			  else
			  echo $unitrecord['sumpkg'] . "  ".$unitrecord['Unit'] ." ";
			  $LineCount++;
			  
			 }
			 */
       //echo "=$TotalPerPkg Units"; 
	   
	   
	   ?>
              <div align="center"></div>
              <div align="right"></div>
              <div align="right"></div>
              <div align="right"></div>              <div align="right"></div></td>
              <td ><div align="center"><?php  
			/*
				$SqlStr ="SELECT
Sum(Ibws_Data_shp_qty_pk.Noofpkg) AS TotalPkg
FROM
Ibws_Data_shp_qty_pk
Inner Join Ibws_Data ON Ibws_Data_shp_qty_pk.Part_ID = Ibws_Data.Part_ID AND Ibws_Data_shp_qty_pk.Seq_No = Ibws_Data.Seq_No AND Ibws_Data_shp_qty_pk.Sc_No = Ibws_Data.Sc_No
WHERE
`Inv_No` ='$invpass'";
*/
$SqlStr ="SELECT * FROM IBWS_PK_Noofpkg_PC3 WHERE Inv_No ='$invpass'";
	 
				//$SqlStr ="SELECT  SUM(`Ibws_Data_shp_qty_pk`.`Noofpkg`) As TotalPkg 
//FROM
//`Ibws_Data_shp_qty_pk` 
// WHERE
//`Inv_No` =  '$invpass'";

		$result1 = mysql_query($SqlStr);
		
	$row1 = mysql_fetch_array( $result1 );
	$row1['noofpkg'];
    
	echo  $row1['noofpkg']." PKGS"; 
			
			?></div></td>
              <td ><div align="center"><?php print $fttlnw ?>KG</div></td>
              <td ><div align="center"><?php print $fttlgw ?>KG</div></td>
              </tr>
        </table></td>
      </tr>
		<?php 	  
	//  $result11 = mysql_query("SELECT  shipedept.Name,shipedept.Email   from Sc_Head,shipedept Where  Sc_Head.Sc_No='$scpass' AND Sc_Head.Officer_ID2=shipedept.Merchid ")
//or die(mysql_error());  
$result111 = mysql_query("SELECT  Users_Shipping.Person_Name,Users_Shipping.email   from Sc_Head,Users_Shipping Where  Sc_Head.Sc_No='$scpass' AND Sc_Head.Officer_ID2=Users_Shipping.username ")
or die(mysql_error());  

// store the record of the "example" table into $row
//$row12 = mysql_fetch_array( $result11 );
 //$name1=$row111['Person_Name'];
// $email1=$row111['email'];

// store the record of the "example" table into $row
$row12 = mysql_fetch_array( $result111 );
 $name1=$row12['Person_Name'];
 $email1=$row12['email'];
?>
 <?php 	  
/*	  $result12 = mysql_query("SELECT  merchandiserdeptview.Name,merchandiserdeptview.Email   from Sc_Head,merchandiserdeptview Where  Sc_Head.Sc_No='$scpass' AND Sc_Head.Officer_ID1=merchandiserdeptview.Merchid ")
or die(mysql_error());  
*/
$result12 = mysql_query("SELECT  Users_Merchandises.Person_Name,Users_Merchandises.email   from Sc_Head,Users_Merchandises Where  Sc_Head.Sc_No='$scpass' AND Sc_Head.Officer_ID1=Users_Merchandises.username ")
or die(mysql_error()); 
// store the record of the "example" table into $row
$row13 = mysql_fetch_array( $result12 );
 $name2=$row13['Person_Name'];
 $email2=$row13['email'];
?>

      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      
     
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td><div align="right"></span></div></td>
        <td>&nbsp;</td>
        <td colspan="2"><div align="right"><span class="style4"><?php print $tname ?></span></div></td>
        <!--td>&nbsp;</td-->
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td><hr /></td>
        <!--td><div align="right">
          <hr />
        </div></td-->
      </tr>

    </table></td>
  </tr>
</table>
</body>
</html>
