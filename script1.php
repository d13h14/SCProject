<?php

include "connect.php"; //Connect to Database
			
$query = "SELECT campaign, COUNT(adgroup.adgroupID) AS adgroupCount, COUNT(keywordID) AS keywordCount, SUM(impressions) AS impressionsTotal, SUM(clicks) AS clicksTotal, SUM(cost) AS costTotal FROM campaign, adgroup, keywords WHERE campaign.campaignID = adgroup.campaignID AND adgroup.adgroupID = keywords.adgroupID GROUP BY campaign.campaignID "; 
$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))

	{
		$campaign = $row['campaign'];
		$adgroupCount = $row['adgroupCount'];
		$keywordCount = $row['keywordCount'];
		$impressionsTotal = $row['impressionsTotal'];
		$clicksTotal = $row['clicksTotal'];
		$costTotal = $row['costTotal'];
		
		echo"$campaign, $adgroupCount, $keywordCount, $impressionsTotal, $clicksTotal, $costTotal \r\n";
	}	
	
?>

