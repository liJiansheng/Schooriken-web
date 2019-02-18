<?php
require_once("session.php");
require_once("events.php");
require_once("common.php");
$sess->authPage(1);
//Get role
$eventsID = intval($_GET['eventsID']);
$user = Users::getUser($userID);
$evtList = events::getEventList($mydata['userID'],$mydata['schoolID']);
require_once("top.php");
?>
<div class="container"><div class="row"><div class="col-md-3">
<?php echo events::navBar($mydata['userID'],'Event'); ?></div>
<div class="col-md-8"><h2>Events List</h2>
<hr>
<table class="table table-bordered">
	<colgroup>
	</colgroup>
	<thead>
		<tr>
			<th>Name</th>
			<th>Group</th>
			<th>Date</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($evtList as $k => $v) { ?>
		<tr>
			<td><?php echo htmlentities($v['title']); ?></td>
			<td style='text-align:center;'><?php echo htmlentities($v['group_name']); ?></td>
			<td style='text-align:center;'><?php echo htmlentities(niceTime($v['evtDate'])); ?></td>
			<td>
				<center>
					<?php echo "<a class='' href='viewEvent.php?event_id=$v[event_id]'>View</a>"; ?>
				</center>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>


</div></div></div>
 <?php require_once("newtail.php");?>