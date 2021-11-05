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
require ('dbcon.php');

$invpass=trim($_GET['InvNo'] );

$result1 = mysql_query("SELECT * FROM Ibws_Head_Inv_PC3 WHERE  Inv_No='$invpass' ")
or die(mysql_error());  

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
		   $curr=$row1['Currency'];
		   
               $curr='$';
			   $curr_name="US DOLLARS";

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
        <td colspan="2">S-<?php print $invpass  ?></td>
        <td colspan="2"><div align="right">Date:<?php print $tdate ?></div></td>
      </tr>
      <tr>
        <td>Messers </td>
        <td colspan="2">
		<?php 

$result100 = mysql_query("SELECT * FROM Title where Title_ID='TRI'")
or die(mysql_error());  

$row100 = mysql_fetch_array( $result100 );
$name = $row100['Name'];
$add1=$row100['Add1'];
$add2=$row100['Add2'];
$add3=$row100['Add3'];
/*$country=$row100['Country'];*/
$ftyy=$row100['fty_ID'];


		
		
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
            <td colspan="6">
              <div align="center"><strong>Sc#              </strong></div></td>
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
            <td colspan="14" valign="top"><hr /></td>
            </tr>

          <?php
/*$result = mysql_query("SELECT * FROM Ibws_Data_shp_pc3_sp,Frame_Components WHERE Inv_No='$invpass' AND Ibws_Data_shp_pc3_sp.Part_ID=Frame_Components.Item group by Part_ID ORDER BY Part_ID");*/
$result = mysql_query("SELECT * FROM Ibws_Data_shp_pc3_sp WHERE Inv_No='$invpass' group by Part_ID ORDER BY Part_ID");

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
  		   /*$total_quantity = $total_quantity + $record['shp_qty'];*/
		   
		   $x++;  
		   
		   $Part_ID=$record['Part_ID'];
		   
		   $result1199 = mysql_query("SELECT sum(Noofpkg) AS Noofpkg,sum(Nw*Noofpkg) AS TTL_NW,sum((Gw*Noofpkg)) AS TTL_GW FROM Ibws_Data_shp_pc3_sp_pk Where Part_ID='$Part_ID' and Inv_No='$invpass' " ) or die(mysql_error());  
		   $row1199 = mysql_fetch_array( $result1199 );
		   $ttlpkgs=$row1199['Noofpkg'];
		   $ttlnw=$row1199['TTL_NW'];
		   $ttlgw=$row1199['TTL_GW'];
		   
		   $fttlpkgs=$fttlpkgs+$ttlpkgs;
		   $fttlnw=$fttlnw+$ttlnw;
		   $fttlgw=$fttlgw+$ttlgw;
		   
			/*$hscode=$record['HS_Code'];
			$partname=$record['Item'];*/
			
			$result19 = mysql_query("SELECT HS_Code FROM Parts Where Part_ID='$Part_ID'" ) or die(mysql_error());  
			$row119 = mysql_fetch_array( $result19 );
			$hscode=$row119['HS_Code'];
			
			$unitt=$record['Unit'];
		/////////////////
		
		/*$RInvPcList1 = mysql_query("SELECT * FROM IBWS_Shipped_PC3 Where Part_ID='".$record['Part_ID']."' AND  Inv_No='"./$record['Inv_No']."'" ) or die(mysql_error());*/
		$RInvPcList1 = mysql_query("SELECT sum(Shiped_qty) AS sumqty FROM Ibws_Data_shp_pc3_sp Where Part_ID='".$record['Part_ID']."' AND  Inv_No='".$record['Inv_No']."'" ) or die(mysql_error());  	
			// store the record of the "example" table into $row
	      $InvPcList1 = mysql_fetch_array( $RInvPcList1 );
		  
		  $shippedqty=$InvPcList1['sumqty'];
		
			
		/////////////
		$RInvPcList = mysql_query("SELECT * FROM Ibws_Head_Inv_PcList_PC3 Where Sc_No=".$record['Sc_No']." AND SeqNo=".$record['Seq_No']." AND Inv_No='".$record['Inv_No']."'" ) or die(mysql_error());  
			
	      $InvPcList = mysql_fetch_array( $RInvPcList );
		  
		  $shipmentfinal=$InvPcList['Final'];
		  
			 /*$result1000 = mysql_query("SELECT * FROM
Ibws_Data_shp_qty_pc3_sp
WHERE
 Inv_No ='".$record['Inv_No']."' AND Part_ID ='".$record['Part_ID']."' ");
			   $Sub_Total="";
				while($row1000 = mysql_fetch_array( $result1000 ))
		
		{
				 $shpqtyy1=$shpqtyy1+$row1000['Shiped_qty'];
				 
			  }	 	
			
			////
			$RInvPcList1 = mysql_query("SELECT * FROM IBWS_Itemunitpricesum_PC3 Where Inv_No ='".$record['Inv_No']."' AND Part_ID ='".$record['Part_ID']."' " ) or die(mysql_error());  
	       $InvPcList1 = mysql_fetch_array( $RInvPcList1 );
		  
		  $Sub_Total=$InvPcList1['sumitem2'];*/
			
			
			////////////////////////////////
		   
		   //Count Cotons
		    
		    /*$Carton=$Carton+((float)$record['Carton_To'] - (float)$record['Carton_From'])+1;*/
		   
		   
           
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
            <td colspan="4" valign="top" class="style6"><u><strong><i><?php print $Part_ID ?> (<?php print $hscode ?>)</i></strong>
              <?php
			  
			$result1 = mysql_query("SELECT Size ,Seq_No FROM PC_Item Where SC_No=".$record['Sc_No']." AND PC_No=1 AND Seq_No=".$record['Seq_No']."" ) or die(mysql_error());  
			
			// store the record of the "example" table into $row
	      $row1 = mysql_fetch_array( $result1 );


			$RInvPcList = mysql_query("SELECT * FROM Ibws_Head_Inv_PcList_PC3 Where Sc_No=".$record['Sc_No']." AND SeqNo=".$record['Seq_No']." AND Inv_No='".$record['Inv_No']."'" ) or die(mysql_error());  
			
			// store the record of the "example" table into $row
	      $InvPcList = mysql_fetch_array( $RInvPcList );

	?>
              <space> 
        
              <space>
               <?php   if ($InvPcList['Final']) {
			  }
			  ?>
            </u></td>
            <td colspan="4" valign="top" class="style6"><div align="center">
              <?
			$Cntr="";
            $result1 = mysql_query("SELECT Sc_No FROM Ibws_Data_shp_pc3_sp Where Inv_No='".$record['Inv_No']."' AND Part_ID='$Part_ID' GROUP BY Sc_No" ) or die(mysql_error());  
	        while($row1 = mysql_fetch_array( $result1 ))
			{
			$Cntr=$Cntr."/".$row1['Sc_No'];
			
			
			}
            
            echo $Cntr;
			
			/*$unitprice=$Sub_Total/$shippedqty;*/
            ?>
            </div>              
            <div align="center"></div></td>
            <td width="88"><div align="center"><strong><i><?php print $shippedqty ?></i></strong></div></td>
            <td><div align="center"><?php print $unitt ?></div></td>
            
             <td><div align="center"><?php print $ttlpkgs ?></div></td>
             <td><div align="center"><?php print number_format($ttlnw,2) ?></div></td>
             <td><div align="center"><?php print number_format($ttlgw,2); ?></div></td>
             <td width="142" align="right"><strong></i></td>
              </tr>
		  	          

      <?php
	     /*$TotalAmount=$TotalAmount+$Sub_Total;*/
           }}}
		   
       ?>
	     <?php	
				  
		   }
	}
	  
	
	
	mysql_free_result($result);
?>


          <tr>
            <td colspan="14"><hr /></td>
            </tr>
            
			
			
          <tr>
          <?php
		  
		 // 
			 // echo $pvalue1;
			//  $ttl2=$pvalue1+$ttl;
			 // echo "A";
		  
		  
		  ?>
            <td colspan="11">&nbsp; &nbsp; &nbsp; <?php 
			
			$unitresult = mysql_query("SELECT  SUM(Shiped_qty) As sumpkg,Unit From Ibws_Data_shp_pc3_sp where Inv_No='$invpass' GROUP BY Unit" );
			
			
			 while($unitrecord = mysql_fetch_array( $unitresult ))
			 {
			  echo $unitrecord['sumpkg'] . " ".$unitrecord['Unit'] ."  ";
			 }
		
	   
	   ?>
              <div align="center"></div>
              <div align="right"></div>
              <div align="right"></div>
              <div align="right"></div>              <div align="right"></div></td>
              <td ><div align="center"><?php  
$SqlStr ="SELECT sum(Noofpkg) AS noofpkg FROM Ibws_Data_shp_pc3_sp_pk WHERE Inv_No ='$invpass'";

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
