<?php
$member = (array)$memberObject ;
?>
Dear {{ $member['name'] or $member->name }}, <br/>Thank you for registering for the Fiat Scripture. 
Your registration number for Fiat Scripture is {{ $member['reg_no'] or $member->reg_no }}. 
You can view your participant slip, by click the following URL. If you have any questions please contact <br/>
<br/>
Thank you<br/>
Prince Varghese<br/>
9847373788<br/>
<br/>
<br/>
{{ $url }}