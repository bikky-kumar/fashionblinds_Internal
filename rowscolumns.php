<?php
	require_once ('rowcolunsconfig.php');
	
	$strEditProductId = '';
	$strStoreId       = '';
	$strStoreId       = Mage::app()->getStore()->getId();
	$strEditProductId = Mage::app()->getRequest()->getParam("editfile");
	echo $strTables.'<br/>'.$priceTable;
?>
<script src="<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB); ?>Ajax.Request.js" type="text/javascript"></script>
<script type="text/javascript">
function showContent(objRows,objColumns,objMatrixId){
	//alert("rowcolmns_"+objRows+"_"+objColumns+"textdiv");	
	var textdivid = document.getElementById("rowcolmns"+objRows+'_'+objColumns+"textdiv");
	textdivid.style.display="block";
	textdivid.style.left="-5px";
	textdivid.style.position="relative";
	textdivid.style.height="21px";
	document.getElementById("rowcolmns"+objRows+'_'+objColumns).focus();
	document.getElementById("rowcolmns"+objRows+'_'+objColumns+"contentdiv").style.display="none";
	textdivid.setAttribute("class", "selected-border");

}
function hideContent(objRows,objColumns,objMatrixId){
	ajaxFunction(objRows,objColumns,objMatrixId);
	var textdivid = document.getElementById("rowcolmns"+objRows+'_'+objColumns+"textdiv");
	textdivid.style.display="none";
	document.getElementById("rowcolmns"+objRows+'_'+objColumns+"contentdiv").style.display="block";
	document.getElementById("rowcolmns"+objRows+'_'+objColumns+"contentdiv").innerHTML = document.getElementById("rowcolmns"+objRows+'_'+objColumns).value;
}
function doChangePriceValues(){
	var priceMethod = document.getElementById("pricemethod").value;
	var priceAmount = document.getElementById("priceamount").value;
	var priceType	= document.getElementById("pricetype").value;
	if(priceMethod==""){
		alert("Price Method should not empty");
		return false;
	}
	if(priceAmount==""){
		alert("Price value should not empty");
		return false;
	}
	if(priceType==""){
		alert("Price Type should not empty");
		return false;
	}
	var priceValues  = IsNumber(priceAmount,'Chanage Price');
	if(priceValues == false){
		alert("Price value must be numeric");
		return false;
	}
		
	document.changeprice.submit();
}
function ajaxFunction(objRows,objColumns,objMatrixId){



if(objRows =='formula') 
{

var matrixId  =  objMatrixId; 
var valueToStore  = document.getElementById(objColumns.id).value;
var reloadurl = '<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB); ?>rowscolumnsAjax.php?value='+valueToStore+'&matrixID='+matrixId+'&pricefiles_id='+<?php echo $strEditProductId;?>+'&rows='+objRows+'&column='+objColumns.id; 
//alert(reloadurl);

}
else
{
var newPrice  = document.getElementById("rowcolmns"+objRows+'_'+objColumns).value;
var matrixId  =  objMatrixId; 
var reloadurl = '<?php echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB); ?>rowscolumnsAjax.php?price='+newPrice+'&matrixID='+matrixId+'&pricefiles_id='+<?php echo $strEditProductId;?>+'&rows='+objRows+'&column='+objColumns; 
//alert(reloadurl);

}
	

	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			//alert(ajaxRequest.responseText);
		}
	}
	ajaxRequest.open("GET", reloadurl, true);
	ajaxRequest.send(null); 
}
function IsNumber(sText,Label){
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;
   if(sText=="") {alert(Label+ " Should not be Empty");return false}
   for (i = 0; i < sText.length && IsNumber == true; i++)    { 
      Char = sText.charAt(i); 
      if(ValidChars.indexOf(Char) == -1)  {
         IsNumber = false;
      }
   }
   return IsNumber;
}

function hideTextdiv(curId, priceFileId){
var operation ="formula";
ajaxFunction(operation,curId,priceFileId);
var currntIdval = curId.id;
var getWord = currntIdval.split("_");
document.getElementById(getWord[0]+'_'+"contentdiv").style.display="block";
document.getElementById(getWord[0]+'_'+"textdiv").style.display="none";
document.getElementById(getWord[0]+'_'+"contentdiv").innerHTML = document.getElementById(currntIdval).value;
}
function savediscount(){
	alert('Discount Saved Successfully');
}

function showFormula(curId){
var currntIdval = curId.id;
var getWord = currntIdval.split("_"); 
document.getElementById(getWord[0]+'_'+"contentdiv").style.display="none";
document.getElementById(getWord[0]+'_'+"textdiv").style.display="block";
document.getElementById(getWord[0]).focus();
}
</script>
<style>
 	.content{font-family: Arial,Helvetica,sans-serif;font-size: 12px;width: 75px; padding:0 4px 0 2px}
	.content-text{border: 1px solid red; width: 70px; text-align:right; height: }
	.selected-border{ font-family: Arial,Helvetica,sans-serif;font-size: 12px;width: 70px;}
	#rowcolmnscontentdiv{ font-weight:bold;}
	.content-edit{width:100%;}
	.pricechange{border:1px solid #CF4718;background-color:#FF9933;color:#fff;font-family:12px Verdana,Arial,Helvetica,sans-serif; font-weight:bold; cursor:pointer;}
	#savediscount{border:1px solid #CF4718;background-color:#FF9933;color:#fff;font-family:12px Verdana,Arial,Helvetica,sans-serif; font-weight:bold; cursor:pointer; margin-left: 15px	}
	#discount_contentdiv, #markup_contentdiv{border: 1px solid #CCCCCC; float: left; font-size: 13px; height: 18px;  margin-left: 2px;
    text-align: right; vertical-align: text-bottom; width: 62px;}
	#change-price{}
</style>

<?php
if($strEditProductId ){
	$strContent = '';
	if($_POST){
		//$sucessMessage = '<div id="messages"><ul class="messages"><li class="success-msg"><ul><li>The product has been saved.</li></ul></li></ul></div>';
		$priceEmpty = '9999999999.99';
		$priceValues= mysql_query("SELECT matrix_id,price FROM ".$strTables." WHERE pricefile_id = '".$strEditProductId."'");
		while($row = mysql_fetch_array($priceValues, MYSQL_ASSOC)) {

			  $matrixId	   = $row["matrix_id"];
			  $currentPrice= $row["price"];
			  $pricetype   = $_POST["pricetype"];
			  $changePriceAmount = $_POST["priceamount"];
			  $pirceMethod = $_POST["pricemethod"];
  			  $newprice    = '';
			  $changePriceValue ='';

			  if($pricetype=='Percent'){
			  	if($currentPrice!=$priceEmpty){
					 $changePriceValue = ($changePriceAmount/100)*$currentPrice;
				}
			  }
			  if($pricetype=='Fixed'){
			  	 $changePriceValue = $changePriceAmount;
			  }

			  if($pirceMethod=='Increase'){
			  	if($currentPrice!=$priceEmpty){
				  	$newprice = $changePriceValue+$currentPrice;
				}else{
				  	$newprice = $currentPrice;
				}
			  }
			  if($pirceMethod=="Decrease"){
			  	if($currentPrice!=$priceEmpty){
				  	$newprice = $currentPrice - $changePriceValue;
				}else{
				  	$newprice = $currentPrice;
				}
			  }
			  
			  if($newprice<0){
			  	$newprice = $priceEmpty;
			  }else{
				$newprice = number_format($newprice,2,'.','');			  	
			  }
			  $updateSQL = "UPDATE ".$strTables." SET price = '".$newprice."' WHERE matrix_id='".$matrixId."'";
			  mysql_query($updateSQL);		  
		}
				
	}	

	$rowFields    = array();
	$columFields  = array();
//For get Title Height/Width
	$result     = mysql_query("SELECT field_title,discount,markup FROM ".$priceTable." WHERE  pricefiles_id = '".$strEditProductId."'");
	$filedTitle = mysql_fetch_row($result);
	$strFiledTitle = $filedTitle[0];
	$discountValue = $filedTitle[1];
	$markupValue = $filedTitle[2];
	

//For Get drop values
	$result     = mysql_query("SELECT DISTINCT(field1) FROM ".$strTables." WHERE  pricefile_id = '".$strEditProductId."' AND store_id = '".$strStoreId."'  ORDER BY field1 ASC");
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$rowFields[]    = $row["field1"];
	}
	//print_r($rowFields);
//For Get Width  values
	$result     = mysql_query("SELECT DISTINCT(field2) FROM ".$strTables." WHERE  pricefile_id = '".$strEditProductId."' AND store_id = '".$strStoreId."'  ORDER BY  field2 ASC");
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$columFields[] = $row["field2"];
	}
	//print_r($columFields);

	if(count($rowFields)>0 && count($columFields)>0){

		$result     = mysql_query("SELECT title FROM ".$priceTable." WHERE  pricefiles_id = '".$strEditProductId."'");
		$csvTitle   = mysql_fetch_row($result);
		$csvTitle   = $csvTitle[0];


		$strContent.='<table cellpadding="0"  cellspacing="0" border="0" style="margin:20px 0px 20px 0px;"  width="990">
						<tr><td style="font-size:15px; font-family:Arial, Helvetica, sans-serif; color: #EB5E00; font-weight:bold; padding-left:10px;">'.$csvTitle.'</td></tr>
					</table>
					<div style="clear:both;"></div>';

		$strContent.=$sucessMessage;
	
		$strContent.= "<table  cellpadding=\"0\" cellspacing=\"0\"  border=\"1\"  style=\"border:1px solid #CCCCCC; border-collapse:collapse\"   width=\"990\">";
		$strContent.= "<tr>";	
		$strContent.= "<td width=\"12\" height=\"24\" >
						<div style=\"display:block;\" id=\"rowcolmns".$rows.$colums."contentdiv\"  class=\"content\" style=\"border:1px solid #CCCCCC;\">".$strFiledTitle."</div>
					   </td>";
		for($x=0;$x<count($columFields);$x++){
			$strContent.= "<td width=\"12\" height=\"24\" align=\"right\">
							<div style=\"display:none;\" id=\"rowcolmns".$rows.$colums."textdiv\" style=\"width:30px;\" class=\"content\" >
								<input type=\"text\" name=\"rowcolmns".$rows.$colums."\" id=\"rowcolmns".$rows.$colums."\" value=\"$rowFields[$x]\" class=\"content-text\"   />
							</div>
							<div style=\"display:block;\" id=\"rowcolmns".$rows.$colums."contentdiv\"  class=\"content\" style=\"border:1px solid #CCCCCC;\">".$columFields[$x]."</div>
						   </td>";
		}
		$strContent.= "</tr>";
		for($colums=0;$colums<count($rowFields);$colums++){ //column
			$strContent.= "<tr>";	
			$strContent.= "<td width=\"12\" height=\"24\"  align=\"right\">
							<div style=\"display:block;\" id=\"rowcolmns".$rows.$colums."contentdiv\"  class=\"content\" style=\"border:1px solid #CCCCCC;\"><strong>".$rowFields[$colums]."</strong></div>
						   </td>";
			for($rows=0;$rows<count($columFields);$rows++){ //row
				$currenctColumn   = '';
				$result          = mysql_query("SELECT price,matrix_id FROM ".$strTables." WHERE pricefile_id = '".$strEditProductId."' AND store_id = '".$strStoreId."'  AND field1='".$rowFields[$colums]."' AND field2 ='".$columFields[$rows]."'");
				$currenctColumn  = mysql_fetch_row($result);
				if($currenctColumn[0]) $value= $currenctColumn[0]; else $value="";
				if($value=="9999999999.99"){$value='';}
				$matrixId = $currenctColumn[1];
			
				$strContent.= "<td width=\"12\" height=\"24\"  align=\"right\" onclick=\"showContent('$rows','$colums','$matrixId');\"  >
								<div style=\"display:none;\" id=\"rowcolmns".$rows."_".$colums."textdiv\" style=\"width:30px;\" class=\"content\" >
									<input type=\"text\" name=\"rowcolmns".$rows.$colums."\" id=\"rowcolmns".$rows."_".$colums."\" value=\"$value\" class=\"content-text\" onBlur=\"hideContent('$rows','$colums',$matrixId);\"/>
								</div>
								<div style=\"display:block;\" id=\"rowcolmns".$rows."_".$colums."contentdiv\"  class=\"content\" style=\"border:1px solid #CCCCCC;\"  >".$value."</div>
							   </td>";
			}
			$strContent.= "</tr>";
		}
		$strContent.= "</table>";
	    $strContent.= '<div style="clear:both;"></div>';
   
		$strContent.= '<fieldset style="border:1px solid #ccc; width:360px; margin-top:30px;float:left">
					   <legend style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; font-size:15px; color: #EB5E00; ">Update Price</legend>';

		$strContent.='<table cellpadding="5" cellspacing="2" border="0" style=" margin-top:20px;">
						<form name="changeprice" id="changeprice" action="" method="post">
							<tr>
								<td>
									<select name="pricemethod" id="pricemethod" style="border:1px solid #CCCCCC;font-family: Arial,Helvetica,sans-serif;font-size: 12px;">
										<option value="">Select Price Method</option>
										<option value="Increase">Increase</option>
										<option value="Decrease">Decrease</option>
									</select>
								</td>
								<td><input type="text" value="" name="priceamount" id="priceamount" maxlength="5"  class=\"content\" style=" width:50px;border:1px solid #CCCCCC;font-family: Arial,Helvetica,sans-serif;font-size: 12px;"/></td>
								<td>
									<select name="pricetype" id="pricetype"  style="border:1px solid #CCCCCC;font-family: Arial,Helvetica,sans-serif;font-size: 12px;">
										<option value="">Change Price Type</option>
										<option value="Percent">Percent</option>
										<option value="Fixed">Fixed</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align="center" colspan="3"><input type="button" name="ChangePrice" value="Change Price"  class="pricechange" onclick="doChangePriceValues()"/></td>
							</tr>
						</form>	
					</table>';
		$strContent.='</fieldset>';
		


$Pricemarup .= '<div id="formula" style="float: left; margin-left: 30px; margin-top:30px;">';
$Pricemarup .= '<td width="12" height="24" align="right" style="border:1px solid #CCCCCC;">
<label style="float:left" for="discount">Discount : </label>
	<div  style="display:none;width:66px;float:left" id="discount_textdiv"  class="content" >		
	<input type="text" name="Discount" id="discount" value='.$discountValue.' class="content-text" onBlur="hideTextdiv(this,'.$strEditProductId.');"  />
	</div>
	<div id="discount_contentdiv"  class="content"  onclick="showFormula(this);" >'.$discountValue.'</div>
</td>';
$Pricemarup .= '<td width="12" height="24" align="right">	
<label style="float:left; margin-left: 10px;" for="markup">MarkUp : </label>
	<div style="display:none; width:66px ; float: left;" id="markup_textdiv"  class="content" >
	<input type="text" name="MarkUp" id="markup" value='.$markupValue.' class="content-text" onBlur="hideTextdiv(this,'.$strEditProductId.');"  />
	</div>
	<div id="markup_contentdiv"  class="content" onclick="showFormula(this);">'.$markupValue.'</div>							
</td>
	<input type="button" id="savediscount" onclick="savediscount()" class="pricechange" value="Save" name="SaveDiscount" />
	</div>';

		echo $strContent;

		echo $Pricemarup;
	}
}
?>