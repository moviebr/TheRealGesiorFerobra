<?php
if(!defined('INITIALIZED'))
	exit;

$list = $SQL->query('SELECT ' . $SQL->fieldName('name') . ', ' . $SQL->fieldName('id') . ', ' . $SQL->fieldName('group_id') . ' FROM ' . $SQL->tableName('players') . ' WHERE ' . $SQL->fieldName('group_id') . ' IN (' . implode(',', $config['site']['groups_support']) . ') ORDER BY ' . $SQL->fieldName('group_id') . ' DESC');


$main_content .= "
<table border=0 cellpadding=4 cellspacing=1 width=100%>
<tr><td class=\"white\" align=\"center\" bgcolor=\"#505050\"><b>Contact Information</b></td></tr>
<tr><td bgcolor=\"#D4C0A1\"><table border=\"0\" cellpadding=\"8\">
<TR><TD>Site:</TD><TD>www.baiakthunder.com</A></TD></TR>
<TR><TD>Managing Director:</TD><TD>Baiak Thunder Team</TD></TR>
</td></tr></table></td></tr>";

$main_content .= "<table border=0 cellpadding=4 cellspacing=1 width=100%>

<tr><td class=\"white\" align=\"center\" bgcolor=\"#505050\"><b>Disclaimer</b></td></tr>

<tr><td bgcolor=\"#D4C0A1\"><table border=\"0\" cellpadding=\"8\"><tr><td>
CipSoft GmbH disclaims all warranties for the up-to-dateness, correctness,
completeness or quality of the information presented on this website.
CipSoft GmbH is not liable for any lost profits or special, incidental
or consequential damages arising out of the use or not-use of the presented
information. CipSoft GmbH reserves the right to supplement, change or
delete parts of the website or the whole website, or even to close the
service temporarily or finally.
</td></tr><tr><td>
The following of our websites contain links to other pages on the internet:
tibia.com, tibia.net, tibia.org as well as all connected
subdomains. We would like to expressly emphasise the fact that CipSoft GmbH
has no influence whatsoever on the design or the content of any of the
websites to which these links refer. For this reason CipSoft GmbH cannot
take responsibility for the up-to-dateness, correctness, completeness or
general quality of the information supplied by these websites. Also,
Cipsoft GmbH expressly disassociates itself from any content presented on
said websites. This declaration applies to any link to external websites to
be found on one or more of CipSoft's websites, as well as to any kind of
content these external websites may contain.

</td></tr></table></td></tr>";
$main_content .= "<br><br>";


$main_content .= "<table border=0 cellspacing=1 cellpadding=4 width=100%>
	<td class=\"white\" colspan=\"3\" align=\"left\" bgcolor=\"#505050\"><b>Thunder Membres</b></td>
	 <tr bgcolor=\"#D4C0A1\"><td width=\"80%\"><b>Name</b></td><td><b>Group</b></td></tr>";

foreach($list as $i => $supporter)
{
	$bgcolor = (($i++ % 2 == 1) ?  $config['site']['darkborder'] : $config['site']['lightborder']);
	$main_content .= '<tr bgcolor="'.$bgcolor.'"><td><a href="?subtopic=characters&name='. $supporter['name'] .'">'.htmlspecialchars($supporter['name']).'</a></td><td>' . htmlspecialchars(Website::getGroupName($supporter['group_id'])) . '</td></tr>';
}

$main_content .= "<br><br>";
$main_content .= "</table>";