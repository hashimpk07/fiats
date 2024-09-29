<?php
/**
 * Created by PhpStorm.
 * User: Sajill
 * Date: 12/16/2015
 * Time: 12:57 PM
 */
?>
<div id="sidebar" class="sidebar responsive">
	<script type="text/javascript">
		try {
			ace.settings.check( 'sidebar', 'fixed' )
		} catch ( e ) {
		}
	</script>

	<ul class="nav nav-list">
		<?php
		$per_advance = \App\Http\Controllers\Controller::PageAllowed( 'advance' );
		if ( $per_advance == true ) {
		?>
		<li class="@yield('class_cadv')">
			<a href="{{ URL::to('cash_advance') }}">
				<i class="menu-icon fa fa-money"></i>
				<span class="menu-text"> Advance Payments </span>

			</a>
			<b class="arrow"></b>
		</li>
		<?php } ?>
		<?php
		$per_cash_expenses = \App\Http\Controllers\Controller::PageAllowed( 'cash expenses' );
		if ( $per_cash_expenses == true ) {
		?>
		<li class="@yield('class_cexp')">
			<a href="{{ URL::to('cash_expense') }}">
				<i class="menu-icon fa fa-money"></i>
				<span class="menu-text"> Cash Payments </span>
			</a>
			<b class="arrow"></b>
		</li>
		<?php } ?>

			<?php
			$payment_letters = \App\Http\Controllers\Controller::PageAllowed( 'payment letters' );
			if ( $payment_letters == true ) {
			?>
			<li class="@yield('class_bal')">
				<a href="{{ URL::to('payment_letter') }}">
					<i class="menu-icon fa fa-file-text-o"></i>
					<span class="menu-text"> Payment Letters </span>
				</a>
				<b class="arrow"></b>
			</li>
			<?php } ?>

				<?php
				if ( $payment_letters == true ) {
				?>
				<li class="@yield('class_letter_nature')">
					<a href="{{ URL::to('letter_nature') }}">
						<i class="menu-icon fa fa-file-text-o"></i>
						<span class="menu-text"> Letter Nature </span>

					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
		<?php
		$per_cash_gift_list = \App\Http\Controllers\Controller::PageAllowed( 'cash gift list' );
		$per_cash_gift_issue = \App\Http\Controllers\Controller::PageAllowed( 'cash gift issue' );
		if ( $per_cash_gift_list == true || $per_cash_gift_issue == true ) {
		?>
		<li class="@yield('class_cashgift')">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-gift"></i>
				<span class="menu-text"> Cash Gifts </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<?php
				if ( $per_cash_gift_list == true ) {
				?>
				<li class="@yield('class_cashgiftlst')">
					<a href="{{ URL::to('cashgift') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Gift Lists
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_cash_gift_issue == true ) {
				?>
				<li class="@yield('class_cshgiftisu')">
					<a href="{{ URL::to('cashgift_issue') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Gift Issues
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>

		<?php
		$per_material_gift_list = \App\Http\Controllers\Controller::PageAllowed( 'material gift list' );
		$per_material_gift_issue = \App\Http\Controllers\Controller::PageAllowed( 'material gift issue' );
		$per_material_gift_inventory = \App\Http\Controllers\Controller::PageAllowed( 'material gift inventory' );
		$per_material_gift_items = \App\Http\Controllers\Controller::PageAllowed( 'material gift items' );
		$per_material_gift_category = \App\Http\Controllers\Controller::PageAllowed( 'material gift category' );
		$per_material_gift_storage_location = \App\Http\Controllers\Controller::PageAllowed( 'material gift storage location' );
		if( $per_material_gift_list == true || $per_material_gift_issue == true
		    || $per_material_gift_inventory == true || $per_material_gift_items == true
		    || $per_material_gift_category == true || $per_material_gift_storage_location == true
		) {
		?>
		<li class="@yield('class_mgift')">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-gift"></i>
				<span class="menu-text"> Material Gifts </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<?php
				if ( $per_material_gift_list == true ) {
				?>
				<li class="@yield('class_mtlgiftlst')">
					<a href="{{ URL::to('material_gift_list') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Lists
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_material_gift_issue == true ) {
				?>
				<li class="@yield('class_mtlisu')">
					<a href="{{ URL::to('materialgift_issue') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Issues
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_material_gift_inventory == true ) {
				?>
				<li class="@yield('class_minvent')">
					<a href="{{ URL::to('inventory') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Inventories
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_material_gift_items == true ) {
				?>
				<li class="@yield('class_mtlgift')">
					<a href="{{ URL::to('material_gift') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						 Items
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_material_gift_category == true ) {
				?>
				<li class="@yield('class_mtgftcat')">
					<a href="{{ URL::to('material_gift_category') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						 Categories
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_material_gift_storage_location == true ) {
				?>
				<li class="@yield('class_stloc')">
					<a href="{{ URL::to('storage_location') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Storage Locations
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>
		<?php
		$per_trip_expenses = \App\Http\Controllers\Controller::PageAllowed( 'trip expenses' );
		if ( $per_trip_expenses == true ) {
		?>
		<li class="@yield('class_trip')">
			<a href="{{ URL::to('trip_expense') }}">
				<i class="menu-icon fa fa-bus"></i>
				<span class="menu-text"> Trip Expenses </span>

			</a>
			<b class="arrow"></b>
		</li>
		<?php } ?>

		<?php
		$per_trip_gift_list = \App\Http\Controllers\Controller::PageAllowed( 'trip gift list' );
		$per_trip_gift_issue = \App\Http\Controllers\Controller::PageAllowed( 'trip gift issue' );
		if ( $per_trip_gift_list == true || $per_trip_gift_issue == true ) {
		?>
		<li class="@yield('class_tripgift')">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-gift"></i>
				<span class="menu-text"> Trip Gifts </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<?php
				if ( $per_trip_gift_list == true ) {
				?>
				<li class="@yield('class_tripgiftlst')">
					<a href="{{ URL::to('tripgift') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Gift Lists
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_trip_gift_issue == true ) {
				?>
				<li class="@yield('class_tripgiftisu')">
					<a href="{{ URL::to('tripgift_issue') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Gift Issues
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>

		<?php
		$per_claim_form = \App\Http\Controllers\Controller::PageAllowed( 'claim form' );
			$per_claim_receivedfunds_form = \App\Http\Controllers\Controller::PageAllowed( 'received funds' );
		$per_claim_advance_claim = \App\Http\Controllers\Controller::PageAllowed( 'claim advance claim' );
		$per_claim_nature = \App\Http\Controllers\Controller::PageAllowed( 'claim nature' );
		$per_claim_submission_type = \App\Http\Controllers\Controller::PageAllowed( 'claim submission type' );
		$per_claim_payment_mode = \App\Http\Controllers\Controller::PageAllowed( 'claim payment mode' );
		if ( $per_claim_form == true || $per_claim_advance_claim == true
		     || $per_claim_nature == true || $per_claim_submission_type == true
		     || $per_claim_payment_mode == true || $per_claim_receivedfunds_form == true
		) {
		?>
		<li class="@yield('class_claim')">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-th"></i>

				<span class="menu-text"> Claims </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">

				<?php if($per_claim_receivedfunds_form == true){
					?>

				<li class="@yield('class_rereceived_fund')">
					<a href="{{ URL::to('received_funds') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						<span class="menu-text"> Received Funds </span>
					</a>
					<b class="arrow"></b>
				</li>

				<?php }
						?>


				<?php
				if ( $per_claim_form == true ) {
				?>
				<li class="@yield('class_claim_form')">
					<a href="{{ URL::to('claim') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						<span class="menu-text"> Claim Forms </span>
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_claim_advance_claim == true ) {
				?>
				<li class="@yield('class_claim_advance')">
					<a href="{{ URL::to('advance_claim') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						<span class="menu-text"> Advance Claims </span>
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
				<li class="@yield('class_claim_return')">
					<a href="{{ URL::to('claim_return') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						<span class="menu-text"> Claim Returns </span>
					</a>
					<b class="arrow"></b>
				</li>
				<?php
				if ( $per_claim_nature == true ) {
				?>
				<li class="@yield('class_claim_nature')">
					<a href="{{ URL::to('claim_nature') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Claim Nature
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_claim_submission_type == true ) {
				?>
				<li class="@yield('class_sub')">
					<a href="{{ URL::to('submission_type') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Submission Types
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_claim_payment_mode == true ) {
				?>
				<li class="@yield('class_payment')">
					<a href="{{ URL::to('paymentmode') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Payment Modes
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>

		<?php
			$per_account_transaction_reports = \App\Http\Controllers\Controller::PageAllowed( 'transaction report' );
		$per_account_balance_viewer = \App\Http\Controllers\Controller::PageAllowed( 'account balance viewer' );
		$per_account_statement_viewer_account_wise = \App\Http\Controllers\Controller::PageAllowed( 'account statement viewer account wise' );
		$per_account_statement_viewer_person_wise = \App\Http\Controllers\Controller::PageAllowed( 'account statement viewer person wise' );
		$per_account_cash_accounts = \App\Http\Controllers\Controller::PageAllowed( 'account cash accounts' );
		$per_account_internal_transfer = \App\Http\Controllers\Controller::PageAllowed( 'account internal transfer' );
		$per_account_currencies = \App\Http\Controllers\Controller::PageAllowed( 'account currencies' );
		$per_account_expense_type = \App\Http\Controllers\Controller::PageAllowed( 'account expense type' );
		if ( $per_account_balance_viewer == true || $per_account_statement_viewer_account_wise == true
		     || $per_account_statement_viewer_person_wise == true || $per_account_cash_accounts == true
		     || $per_account_internal_transfer == true || $per_account_currencies == true
		     || $per_account_expense_type == true
		) {
		?>
		<li class="@yield('class_account')">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-database"></i>
				<span class="menu-text">Accounts </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>

			<ul class="submenu">

				<?php
				if ( $per_account_transaction_reports == true ) {
				?>
				<li class="@yield('class_stviews')">
					<a href="{{ URL::to('transaction_report') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Transaction Report
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>


				<?php
				if ( $per_account_balance_viewer == true ) {
				?>
				<li class="@yield('class_bal')">
					<a href="{{ URL::to('balance_viewer') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Balance Viewer
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_account_statement_viewer_account_wise == true || $per_account_statement_viewer_person_wise == true ) {
				?>
				<li class="@yield('class_stview')">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						Statement Viewer
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					<ul class="submenu">
						<?php
						if ( $per_account_statement_viewer_account_wise == true ) {
						?>
						<li class="@yield('class_accntstview')">
							<a href="{{ URL::to('statement_viewer') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Account Wise
							</a>

							<b class="arrow"></b>
						</li>
						<?php } ?>
						<?php
						if ( $per_account_statement_viewer_person_wise == true ) {
						?>
						<li class="@yield('class_perststview')">
							<a href="{{ URL::to('personal_statement_viewer') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Person Wise
							</a>

							<b class="arrow"></b>
						</li>
						<?php } ?>
						<?php
						if ( $per_account_statement_viewer_person_wise == true ) {
						?>
						<li class="@yield('class_venststview')">
							<a href="{{ URL::to('vendors_statement_viewer') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Vendor Wise
							</a>

							<b class="arrow"></b>
						</li>
						<?php } ?>
					</ul>
				</li>
				<?php } ?>

				<?php
				if ( $per_account_cash_accounts == true ) {
				?>
				<li class="@yield('class_pcpca')">
					<a href="{{ URL::to('cash_account') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Cash Accounts
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_account_internal_transfer == true ) {
				?>
				<li class="@yield('class_intran')">
					<a href="{{ URL::to('internal_transfer') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Internal Transfers
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_account_currencies == true ) {
				?>
				<li class="@yield('class_curr')">
					<a href="{{ URL::to('currency') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						<span class="menu-text"> Currencies </span>
					</a>

					<b class="arrow"></b>

				</li>
				<?php } ?>

				<li class="@yield('class_pcpexp_head')">
					<a href="{{ URL::to('expense_head') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Expense Heads
					</a>
					<b class="arrow"></b>
				</li>

				<?php
				if ( $per_account_expense_type == true ) {
				?>
				<li class="@yield('class_pcpexp')">
					<a href="{{ URL::to('expense_type') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Expense Types
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>

			</ul>
		</li>
		<?php } ?>

		<?php
		$per_personal_account_deposit = \App\Http\Controllers\Controller::PageAllowed( 'personal account deposit' );
		$per_personal_account_issue = \App\Http\Controllers\Controller::PageAllowed( 'personal account issue' );
		$per_personal_account_statement_viewer = \App\Http\Controllers\Controller::PageAllowed( 'personal account statement viewer' );
		if ( $per_personal_account_deposit == true || $per_personal_account_issue == true
		     || $per_personal_account_statement_viewer == true ) {
		?>
		<li class="@yield('class_pepdl')">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-list-alt"></i>
				<span class="menu-text"> Personal Accounts </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<?php
				if ( $per_personal_account_deposit == true ) {
				?>
				<li class="@yield('class_personal_account')">
					<a href="{{ URL::to('personal_account') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Accounts
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>
				<?php
				if ( $per_personal_account_deposit == true ) {
				?>
				<li class="@yield('class_pepdep')">
					<a href="{{ URL::to('deposit') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Deposits
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_personal_account_issue == true ) {
				?>
				<li class="@yield('class_pepbrw')">
					<a href="{{ URL::to('loan') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Borrows
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_personal_account_statement_viewer == true ) {
				?>
				<li class="@yield('class_pepstview')">
					<a href="{{ URL::to('statement_viewer_personal') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Statement Viewer
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>

		<?php
		$per_people_individuals = \App\Http\Controllers\Controller::PageAllowed( 'people individuals' );
		$per_people_groups = \App\Http\Controllers\Controller::PageAllowed( 'people groups' );
		$per_people_designation = \App\Http\Controllers\Controller::PageAllowed( 'people designation' );
		$per_people_department = \App\Http\Controllers\Controller::PageAllowed( 'people department' );
		$per_people_relationship = \App\Http\Controllers\Controller::PageAllowed( 'people relationship' );
		$per_people_document_type = \App\Http\Controllers\Controller::PageAllowed( 'people document type' );
		$per_people_vendor = \App\Http\Controllers\Controller::PageAllowed( 'people vendor' );
		$per_people_permissions = \App\Http\Controllers\Controller::PageAllowed( 'people permissions' );
		if ( $per_people_individuals == true || $per_people_groups == true
		     || $per_people_designation == true || $per_people_department == true
		     || $per_people_relationship == true || $per_people_document_type == true
		     || $per_people_vendor == true || $per_people_permissions == true
		) {
		?>
		<li class="@yield('class_pep')">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Peoples & Vendors</span>

				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<?php
				if ( $per_people_individuals == true ) {
				?>
				<li class="@yield('class_pep_invid')">
					<a href="{{ URL::to('people') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Individuals
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_people_groups == true ) {
				?>
				<li class="@yield('class_pep_grp')">
					<a href="{{ URL::to('people_group') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Groups
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_people_designation == true ) {
				?>
				<li class="@yield('class_desg')">
					<a href="{{ URL::to('designation') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Designations
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_people_department == true ) {
				?>
				<li class="@yield('class_dep')">
					<a href="{{ URL::to('department') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Departments
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_people_relationship == true ) {
				?>
				<li class="@yield('class_relationship')">
					<a href="{{ URL::to('relationship') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Relationships
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_people_document_type == true ) {
				?>
				<li class="@yield('class_doctype')">
					<a href="{{ URL::to('document_type') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Document Types
					</a>

					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_people_vendor == true ) {
				?>
				<li class="@yield('vendor')">
					<a href="{{ URL::to('vendors') }}">
						<i class="menu-icon fa fa-caret-right "></i>
						Vendors
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>

				<?php
				if ( $per_people_permissions == true ) {
				?>
				<li class="@yield('class_permission')">
					<a href="{{ URL::to('permission') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						Permissions
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
		</li>
		<?php } ?>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left"
		   data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<script type="text/javascript">
		try {
			ace.settings.check( 'sidebar', 'collapsed' )
		} catch ( e ) {
		}
	</script>
</div>