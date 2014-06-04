<?php
include "connect.php"; //Connect to Database

do{
echo "Enter an adgroupID ";
$line = fgets(STDIN);				
echo "\r\n ";

$query = "SELECT campaign, adgroup, COUNT(keywordID) AS keywordCount, SUM(impressions) AS impressionsTotal, SUM(clicks) AS clicksTotal, SUM(cost) AS costTotal FROM adgroup, campaign, keywords WHERE campaign.campaignID=adgroup.campaignID AND adgroup.adgroupID=keywords.adgroupID AND adgroup.adgroupID = $line "; 
$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))

	{
		$campaign = $row['campaign'];
		$adgroup = $row['adgroup'];
		$keywordCount = $row['keywordCount'];
		$impressionsTotal = $row['impressionsTotal'];
		$clicksTotal = $row['clicksTotal'];
		$costTotal = $row['costTotal'];
		
		echo"$campaign, $adgroup, $keywordCount, $impressionsTotal, $clicksTotal, $costTotal \r\n";
	}
	echo "\r\n ";
	echo "Do you want to enter another adgroupID (1)Yes or (2)No ";
	$x = fgets(STDIN);	
	}while ($x==1);
?>

