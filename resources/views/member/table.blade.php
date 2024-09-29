<?php
$rand = rand() ;
?>

<div class="box-body table-print table-responsive no-padding">
<?php echo Form::open( array( 'url' => action('MemberController@listtable'), 'id' => 'idmemberFilterForm' . $rand , 'class' => 'form-horizontal' ) );  ?>
<table class="member_table table table-hover">

	<?php if( ! $isprint ) { ?>
		@include('member.filter')
	<?php } ?>

	<tr>
		<th>Sl#</th>
		<th > {!! sortable_column('Reg.No.', 'reg_no', 'MemberController')  !!} </th>
		<th>{!! sortable_column('Mobile', 'mobile', 'MemberController')  !!}</th>
		<th>{!! sortable_column('Name', 'name', 'MemberController')  !!}</th>
		<th>{!! sortable_column('Gender', 'gender', 'MemberController')  !!}</th>
		<th>{!! sortable_column('D.O.B', 'dob', 'MemberController')  !!}</th>
		<th>{!! sortable_column('Marital Status', 'marital', 'MemberController')  !!}</th>
		<th>{!! sortable_column('Age Group', 'dob', 'MemberController')  !!}</th>
		<th>{!! sortable_column('Language', 'language', 'MemberController')  !!}</th>
		<th>{!! sortable_column('Testament', 'testament', 'MemberController')  !!}</th>
		<th>{!! sortable_column('Status', 'status', 'MemberController')  !!}</th>
		<th class="action-column"></th>
	</tr>
	<tbody id="idMemberTable">
	{!! $rawsethtml !!}
	</tbody>
</table>
</div>
<?php echo Form::close(); ?>

<script type="text/javascript">
	function doFilterValidation()
	{
	}
	submitForm('idmemberFilterForm<?php echo $rand;?>' , doFilterValidation, function (data) {}, 'idMemberTabularWrap', true, {
	});
	function submitThis()
	{
		jQuery('#idmemberFilterForm<?php echo $rand;?>').submit() ;
	}
</script>

<div style="text-align: center;" >
	{!! $pagerhtml !!}
</div>