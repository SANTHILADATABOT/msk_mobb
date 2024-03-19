<?php
include("../dbConnect.php");
$cur_date=date('Y-m-d');
?>

 <select name="shop_name" id="shop_name" class="mac-select"  style="background-color:#fff !important;"> 
            <option value="" >SELECT</option>
            <?php
			 $sql = "select * FROM area_assign_main where sales_ref_id='$_GET[staff_id]' and entry_date='$cur_date' and delete_status!='1'";
$rows = $db->fetch_all_array($sql);	
	foreach($rows as $record)
            { $shops=$record[sub_dealer_id];
			  $shop_name=explode(',',$shops);
			  for($j=0;$j<count($shop_name);$j++)
			  {
			?>
             <option value="<?php echo $shop_name[$j];?>" ><?php echo get_sub_dealer_name($shop_name[$j]);?></option>
            <?php } }?>
        </select>