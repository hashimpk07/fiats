<?php
namespace Qudratom\Traits;

use App\Models\CashAccount;
use App\Models\CashAccountDetail;
use App\Models\CashAdvance;
use App\Models\CashExpense;
use App\Models\CashGiftList;
use App\Models\Claim;
use App\Models\ClaimNature;
use App\Models\Currency;
use App\Models\Department;
use App\Models\DocumentType;
use App\Models\Designation;
use App\Models\ExpenseHead;
use App\Models\Languages;
use App\Models\LetterNature;
use App\Models\MaterialGiftItem;
use App\Models\MaterialGiftCategory;
use App\Models\MaterialGiftItems;
use App\Models\MaterialGiftList;
use App\Models\PaymentModes;
use App\Models\People;
use App\Models\ExpenseType;
use App\Models\ClaimPaymentModeDomain;
use App\Models\ClaimSubmissionModeDomain;
use App\Models\PeopleGroup;
use App\Models\Permission;
use App\Models\Relationship;
use App\Models\PeopleGroupMember;
use App\Models\PersonalAccount;
use App\Models\StorageLocation;
use App\Models\TripGiftList;
use App\Models\Vendor;
use App\Models\Virtual\EntryTypes;
use App\Models\Virtual\ExpenseModel;
use Illuminate\Support\Facades\View;
use DB;
use Qudratom\Utilities\Helper;

Trait SelectPairs {

	public function render( $options ) {
		return View::make( 'shared.options', [ 'options' => $options ] );
	}


	public function renderFragment( $options, $data ) {
		return View::make( 'shared.fragmentOptions', [ 'options' => $options, 'data' => $data ] );
	}

	/**
	 * All currency options, not restricted to account.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function currencyOnlyOptions( $render = false ) {
		$whereRaw = '';
		$options  = Currency::pairList( 'id', 'code', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}
	/**
	 * All currency options, not restricted to account.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function paymentModeOptions( $render = false ) {
		$whereRaw = '';
		$options  = PaymentModes::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}
	/**
	 * All currency options, not restricted to account.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function LanguageOptions( $render = false ) {
		$whereRaw = ' flag = 1 ';
		$options  = Languages::pairList( 'id', 'name', $whereRaw, DB::raw(" FIELD(name, 'Others') ") ) ;
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * All currency options, not restricted to account.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function currencyOptions( $render = false ) {

		/*	$whereRaw = '';
			$options  = Currency::pairList( 'id', 'code', $whereRaw );
			if ( $render ) {
				return $this->render( $options );
			}

			return $options;  */

		$options = DB::table( 'currencies' )
		             ->join( 'cash_account_details', 'currencies.id', "=", "cash_account_details.currency_id" )
		             ->where( "cash_account_details.is_deleted", "!=", 1 )
		             ->select( 'currencies.id as id', 'currencies.code as code' )
		             ->lists( 'code', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * All currency options, not restricted to account.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function PersonalAccountsCurrencyOptions( $render = false ) {

		/*	$whereRaw = '';
			$options  = Currency::pairList( 'id', 'code', $whereRaw );
			if ( $render ) {
				return $this->render( $options );
			}

			return $options;  */

		$options = DB::table( 'currencies' )
		             ->select( 'currencies.id as id', 'currencies.code as code' )
		             ->lists( 'code', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * All currency options, not restricted to account.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function currencyOptionsWith( $render = false, $withId = 0 ) {

		/*	$whereRaw = '';
			$options  = Currency::pairList( 'id', 'code', $whereRaw );
			if ( $render ) {
				return $this->render( $options );
			}

			return $options;  */


		$options = DB::table( 'currencies' )
		             ->join( 'cash_account_details', 'currencies.id', "=", "cash_account_details.currency_id" )
		             ->where( "cash_account_details.is_deleted", "!=", 1 )
		             ->select( 'currencies.id as id', 'currencies.code as code' )
		             ->lists( 'code', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * People document types. eg: Driving license
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function documentTypeOptions( $render = false ) {
		$whereRaw = 'is_deleted=0';
		$options  = DocumentType::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->renderFragment( $options, 'Document Type' );
		}

		return $options;
	}

	/**
	 * Designation list.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function designationOptions( $render = false ) {
		$whereRaw = 'is_deleted=0';
		$options  = Designation::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Department list.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function departmentOptions( $render = false ) {
		$whereRaw = '1';
		$options  = Department::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Relationship options
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function relationOptions( $render = false ) {
		$whereRaw = 'is_deleted=0';
		$options  = Relationship::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->renderFragment( $options, 'Relation' );
		}

		return $options;
	}

	/**
	 * List of 1People flagged accountants
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function accountantOptions( $render = false ) {
		$whereRaw = ' is_accountant=1 AND id != ' . ADMIN_ID;
		$options  = People::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Cash account list
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function accountOptions( $render = false ) {
		$options = CashAccount::join( 'cash_account_details as d', 'cash_accounts.id', "=", "d.cash_account_id" )
		                      ->select( 'cash_accounts.id', 'cash_accounts.name' )
		                      ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Beneficiary list
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function beneficiaryOptions( $render = false ) {
		return $this->peopleOptions( $render );
	}

	/**
	 * All people list.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function peopleOptions( $render = false ) {
		$whereRaw = ' id != ' . ADMIN_ID;
		$options  = People::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * All people list.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function personalAccountOptions( $render = false, $person_id = 0 ) {
		if ( $person_id == '' ) {
			$person_id = 0;
		}
		$whereRaw = "person_id = $person_id OR person_id = 0";
		$options  = PersonalAccount::pairList( 'id', 'account_name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * All people list.
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function approvableOptions( $render = false ) {
		$whereRaw = 'has_permission_to_approve = 1 AND id != ' . ADMIN_ID;
		$options  = People::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Hod's from table
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function hodOptions( $render = false ) {
		$whereRaw = ' 1 AND is_hod=1 AND id!=' . ADMIN_ID;
		$options  = People::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Cash / Trips Expense Ids..
	 *
	 * @param bool|false $unclaimedOnly
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function expenseOptions( $unclaimedOnly = false, $render = false ) {

		if ( $unclaimedOnly ) {
			$whereRaw = " claim_status!='C' ";
		} else {
			$whereRaw = ' 1 ';
		}
		$options = CashExpense::pairList( 'id', 'id', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Expense types (Expense categories)
	 *
	 * @param int $expHead
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function expenseTypeOptions( $expHead = 0, $render = false ) {
		$whereRaw = ' 1 ';
		if ( $expHead ) {
			$whereRaw = ' expense_head_id =' . $expHead;
		}

		$options = ExpenseType::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Voucher status, Draft/Confirmed.
	 *
	 * @param bool|false $render
	 *
	 * @return array
	 */
	private function voucherStatusOptions( $render = false ) {
		$options = array(
			'D' => 'Draft',
			'C' => 'Confirmed',
		);
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Pending advance amount (Not returned list)
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function pendingAdvanceOptions( $render = false ) {
		$options = CashAdvance::join( 'people as p', 'p.id', "=", "cash_advances.beneficiary_id" )
		                      ->leftJoin( 'currencies AS cu', 'cash_advances.currency_id', '=', 'cu.id' )
		                      ->leftJoin( 'cash_advance_returns AS r', function ( $join ) {
			                      $join->on( 'cash_advance_id', '=', 'cash_advances.id' );
			                      $join->where( 'r.status', '=', "C" );
		                      } )
		                      ->select( 'cash_advances.id as id', DB::raw( "CONCAT(p.name, ' (', FORMAT(cash_advances.amount - SUM(IFNULL(r.amount,0)) ,2) ,') ' , '(' ,cu.code , ')') as name, cash_advances.amount - SUM(IFNULL(r.amount,0)) as balance " ) )
		                      ->groupBy( 'cash_advances.id' )
		                      ->having( 'balance', '>', 0 )
		                      ->where( 'cash_advances.status', '=', 'C' )
		                      ->lists( 'name', 'id' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Pending advance amount (Not returned list)
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function advanceOptions( $render = false ) {
		$options = CashAdvance::join( 'people as p', 'p.id', "=", "cash_advances.beneficiary_id" )
		                      ->leftJoin( 'cash_advance_returns AS r', function ( $join ) {
			                      $join->on( 'cash_advance_id', '=', 'cash_advances.id' );
			                      $join->where( 'r.status', '=', "C" );
		                      } )
		                      ->select( 'cash_advances.id as id', DB::raw( "CONCAT(p.name, ' (', cash_advances.amount - SUM(IFNULL(r.amount,0)),')') as name, cash_advances.amount - SUM(IFNULL(r.amount,0)) as balance " ) )
		                      ->groupBy( 'cash_advances.id' )
		                      ->where( 'cash_advances.status', '=', 'C' )
		                      ->lists( 'name', 'id' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Cash gift list options
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function cashGiftListOptions( $render = false ) {
		$options = CashGiftList::join( 'gift_lists as l', 'l.id', "=", "cash_gift_lists.gift_list_id" )
		                       ->leftJoin( 'gift_list_details AS gld ', 'l.id', '=', 'gld.gift_list_id' )
		                       ->leftJoin( 'gift_issues AS gi', 'gi.gift_list_id', '=', 'l.id' )
		                       ->leftJoin( 'gift_issue_details AS gid', 'gid.gift_issue_id', '=', 'gi.id' )
		                       ->select( 'l.id', 'l.name' )
		                       ->groupBy( 'l.name' )
		                       ->havingRaw( 'COUNT(DISTINCT(`gid`.`id`)) < COUNT(DISTINCT(`gld`.`id`))' )
		                       ->lists( 'name', 'l.id' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}
	/**
	 * Cash gift list options
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function tripGiftListOptions( $render = false ) {
		$options = TripGiftList::join( 'gift_lists as l', 'l.id', "=", "trip_gift_lists.gift_list_id" )
		                       ->leftJoin( 'gift_list_details AS gld ', 'l.id', '=', 'gld.gift_list_id' )
		                       ->leftJoin( 'gift_issues AS gi', 'gi.gift_list_id', '=', 'l.id' )
		                       ->leftJoin( 'gift_issue_details AS gid', 'gid.gift_issue_id', '=', 'gi.id' )
		                       ->select( 'l.id', 'l.name' )
		                       ->groupBy( 'l.name' )
		                       ->havingRaw( 'COUNT(DISTINCT(`gid`.`id`)) < COUNT(DISTINCT(`gld`.`id`))' )
		                       ->lists( 'name', 'l.id' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}
	/**
	 * Whole Cash gift list options
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function wholeCashGiftListOptions( $render = false ) {
		$options = CashGiftList::join( 'gift_lists as l', 'l.id', "=", "cash_gift_lists.gift_list_id" )
		                       ->leftJoin( 'gift_list_details AS gld ', 'l.id', '=', 'gld.gift_list_id' )
		                       ->leftJoin( 'gift_issues AS gi', 'gi.gift_list_id', '=', 'l.id' )
		                       ->leftJoin( 'gift_issue_details AS gid', 'gid.gift_issue_id', '=', 'gi.id' )
		                       ->select( 'l.id', 'l.name' )
		                       ->groupBy( 'l.id' )
//		                       ->havingRaw( 'COUNT(DISTINCT(`gid`.`id`)) < COUNT(DISTINCT(`gld`.`id`))' )
		                       ->lists( 'name', 'l.id' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}
	private function wholeTripGiftListOptions( $render = false ) {
		$options = TripGiftList::join( 'gift_lists as l', 'l.id', "=", "trip_gift_lists.gift_list_id" )
		                       ->leftJoin( 'gift_list_details AS gld ', 'l.id', '=', 'gld.gift_list_id' )
		                       ->leftJoin( 'gift_issues AS gi', 'gi.gift_list_id', '=', 'l.id' )
		                       ->leftJoin( 'gift_issue_details AS gid', 'gid.gift_issue_id', '=', 'gi.id' )
		                       ->select( 'l.id', 'l.name' )
		                       ->groupBy( 'l.id' )
//		                       ->havingRaw( 'COUNT(DISTINCT(`gid`.`id`)) < COUNT(DISTINCT(`gld`.`id`))' )
		                       ->lists( 'name', 'l.id' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}


	/**
	 * Submission types
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function submissionOptions( $render = false ) {
		$whereRaw = ' 1 ';
		$options  = ClaimSubmissionModeDomain::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Payment modes
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function paymentOptions( $render = false ) {
		$whereRaw = ' 1 ';
		$options  = ClaimPaymentModeDomain::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Payment modes
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function paymentTypeOptions( $render = false ) {
		$whereRaw = ' 1 ';
		$options  = EntryTypes::collections() ;
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * All claims
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function claimOptions( $render = false ) {

		return $this->allClaimOptions( $render, true );
	}

	private function allClaimOptions( $render = false, $balanceOnly = false, $includeReturned = true ) {
		$query = DB::table( 'claims AS c' )
		           ->Join( 'cash_accounts as ca', 'ca.id', "=", "c.cash_account_id" )
		           ->join( 'currencies as cr', 'c.currency_id', '=', 'cr.id' )
		           ->select( DB::raw( "CONCAT(cr.name, ' (', FORMAT(c.amount - SUM(IFNULL(e.amount,0)) , 2), ')') AS name, c.amount - SUM(IFNULL(e.amount,0)) AS balance, c.id " ) )
		           ->leftJoin( DB::raw( "( SELECT RAND(), ec.claim_id AS claim_id, ex.amount AS amount FROM expenses AS ex
									INNER JOIN expense_claims AS ec ON ec.expense_id = ex.id WHERE ex.status='C'
								  UNION
								  SELECT RAND(), gc.claim_id AS claim_id, gi.amount AS amount FROM gift_issues AS gi
									INNER JOIN gift_issue_claims AS gc ON gc.gift_issue_id = gi.id WHERE gi.status='C'
								) AS e" ), 'e.claim_id', '=', 'c.id' )
		           ->where( 'c.domain_id', '!=', CLAIM_DOMAIN_RETURN )
		           ->where( 'c.realization_status', '=', CONFIRMED )
		           ->groupBy( 'c.id' );

		if ( $balanceOnly ) {
			$query->having( 'balance', '>', 0 );

		}
		if ( ! $includeReturned ) {
			$query->where( 'c.returned', '!=', 1 );
		}
		$options = $query->lists( 'c.name', 'c.id' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * All claims
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function claimAddOptions( $render = false ) {
		return $this->allClaimOptions( $render, true, false );
	}

	/**
	 * Claim return options
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function claimReturnOptions( $render = false ) {
		$options = Claim::leftJoin( 'cash_accounts as c', 'c.id', "=", "claims.cash_account_id" )
		                ->select( 'claims.id as id', DB::raw( "CONCAT(c.name, ' (',claims.amount,')') as name" ) )
		                ->where( 'domain_id', '=', CLAIM_DOMAIN_RETURN )
		                ->lists( 'name', 'id' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Material gift parents
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function materialGiftParentOptions( $render = false ) {
		$whereRaw = " parent_id=0 ";
		$options  = MaterialGiftCategory::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Materlal gift options
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function materialGiftCategoryOptions( $render = false ) {
		$whereRaw = " 1";
		$options  = MaterialGiftCategory::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Stores
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function storageLocationOptions( $render = false ) {
		$whereRaw = " 1";
		$options  = StorageLocation::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Material items
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function itemListOptions( $render = false ) {
		$whereRaw = " 1 ";

		$options = MaterialGiftItem::pairList( 'id', 'name', $whereRaw );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * People groups options
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function peopleGroupOptions( $render = false ) {
		$whereRaw = " 1 ";
		$options  = PeopleGroup::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Group member list
	 *
	 * @param $id
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function groupMemberOptions( $id, $render = false ) {
		$whereRaw = " 1 AND people_group_id ='" . $id . "' ";
		$options  = PeopleGroupMember::pairList( 'people_id', 'people_group_id', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Vendors list
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function vendorOptions( $render = false ) {
		$whereRaw = "1";
		$options  = Vendor::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * People with care of flag
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function careOfOptions( $render = false ) {
		$whereRaw = "is_careof = 1 AND id != " . ADMIN_ID;
		$options  = People::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get the Currencies Of an Account
	 *
	 * @param $account
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function accountCurrencyOptions( $account, $render = false, $amount = true ) {
		if ( $amount ) {
			$str = "CONCAT(c.code, '(', FORMAT(SUM(e.amount),2), ')') AS name ";
		} else {
			$str = "c.code AS name ";
		}
		$options = DB::table( 'cash_account_details' )
		             ->leftJoin( 'currencies as c', 'c.id', "=", "cash_account_details.currency_id" )
		             ->leftJoin( "account_entries AS e", function ( $join ) {
			             $join->on( 'e.cash_account_id', '=', 'cash_account_details.cash_account_id' );
			             $join->on( 'e.currency_id', '=', 'cash_account_details.currency_id' );
		             } )
		             ->where( "cash_account_details.cash_account_id", "=", $account )
		             ->where( "cash_account_details.is_deleted", "!=", 1 )
		             ->select( 'c.id as id', DB::raw( $str ) )
		             ->groupBy( 'e.cash_account_id', 'e.currency_id' )
		             ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get Currency options on deposit while withdrawing
	 *
	 * @param $sub_account
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function peopleCurrencyOptions( $sub_account, $render = false ) {

//			DB::connection()->enableQueryLog();

		$options = DB::table( 'deposits as d' )
		             ->leftJoin( "account_entries AS e", 'd.account_entry_id', '=', 'e.id' )
		             ->leftJoin( 'currencies as c', 'c.id', "=", "e.currency_id" )
		             ->where( "d.personal_account_id", "=", $sub_account )
		             ->where( "d.is_confirmed", "=", '1' )
		             ->select( 'c.id as id', DB::raw( "CONCAT(c.code, '(', FORMAT(SUM(e.amount),2), ')') AS name " ) )
		             ->groupBy( 'e.cash_account_id', 'e.currency_id' )
		             ->lists( 'name', 'id' );

//			$queries = DB::getQueryLog();
//			print_r($queries);
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get Currency options on deposit while withdrawing
	 *
	 * @param $account
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function peopleCurrencyOptionsPersonalAccountStatements( $account, $render = false ) {

//			DB::connection()->enableQueryLog();

		$options = DB::table( 'currencies AS c' )
		             ->leftJoin( 'account_entries AS ae', 'ae.currency_id', '=', 'c.id' )
		             ->leftJoin( 'deposits AS d', 'ae.id', '=', 'd.account_entry_id' )
		             ->select( 'c.code AS name', 'c.id as id' )
		             ->where( 'd.personal_account_id', '=', $account )
		             ->groupBy( 'c.id' )
		             ->lists( 'name', 'id' );
//			dd($options);

//			$queries = DB::getQueryLog();
//			print_r($queries);
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get Currency options on deposit while withdrawing
	 *
	 * @param $people
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function peopleAccountOptionsPersonalAccountStatements( $people, $render = false ) {

//			DB::connection()->enableQueryLog();

		$options = DB::table( 'personal_accounts AS pa' )
		             ->leftJoin( 'deposits AS d', 'pa.id', '=', 'd.personal_account_id' )
		             ->select( 'pa.account_name AS name', 'pa.id as id' )
		             ->where( 'd.people_id', '=', $people )
		             ->groupBy( 'pa.id' )
		             ->lists( 'name', 'id' );
//			dd($options);

//			$queries = DB::getQueryLog();
//			print_r($queries);
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get Depositors list for Borrower
	 *
	 * @param int $borrower
	 * @param bool $render
	 *
	 * @return mixed
	 * @internal param $people
	 */
	public function depositorOptions( $borrower = 0, $render = false ) {
		$options = DB::table( 'deposits as d' )
		             ->leftJoin( 'people as p', 'p.id', "=", "d.people_id" )
		             ->leftJoin( 'account_entries as ae', 'ae.id', "=", "d.account_entry_id" )
		             ->where( "d.people_id", "!=", $borrower )
		             ->where( "d.people_id", "!=", ADMIN_ID )
		             ->where( "d.is_confirmed", "=", '1' )
		             ->select( 'p.id as id', 'p.name as name', DB::raw( 'SUM(ae.amount) AS amount' ) )
		             ->groupBy( 'p.id', 'p.name' )
		             ->havingRaw( 'SUM(ae.amount) != 0' )
		             ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get Depositors list for Borrower
	 *
	 * @param int $people
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function personalAccountForWithdrawOptions( $people = 0, $render = false ) {
		$options = DB::table( 'deposits as d' )
		             ->leftJoin( 'account_entries as ae', 'ae.id', "=", "d.account_entry_id" )
		             ->leftJoin( 'personal_accounts as pa', 'pa.id', "=", "d.personal_account_id" )
		             ->where( "d.people_id", "=", $people )
		             ->where( "d.people_id", "!=", ADMIN_ID )
		             ->where( "d.is_confirmed", "=", '1' )
		             ->select( 'pa.id as id', 'pa.account_name as name', DB::raw( 'SUM(ae.amount) AS amount' ) )
		             ->groupBy( 'pa.id' )
		             ->havingRaw( 'SUM(ae.amount) > 0' )
		             ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get the People who have taken loan
	 *
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function getBorrowerOptions( $render = false ) {
		$options = DB::table( 'loans as l' )
		             ->leftJoin( 'people as p', 'p.id', '=', 'l.people_id' )
		             ->leftJoin( 'account_entries as ae', 'ae.id', '=', 'l.account_entry_id' )
		             ->select( 'p.id as id', 'p.name as name', DB::raw( 'SUM(ae.amount) as amount' ) )
		             ->where( 'l.is_confirmed', '=', '1' )
		             ->where( 'l.people_id', '!=', ADMIN_ID )
		             ->havingRaw( 'SUM(ae.amount) != 0' )
		             ->groupBy( 'p.id' )
		             ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get the individuals who has an account
	 * @return mixed
	 *
	 */
	public function peopleAccountOptions() {

//			DB::enableQueryLog();
		$options = DB::select( DB::raw( 'SELECT
		  `p`.`id`   AS `id`,
		  `p`.`name` AS `name`,
		  `d`.`id`   AS `did`,
		  `l`.`id`   AS `lid`
		FROM `people` AS `p` LEFT JOIN `deposits` AS `d` ON `d`.`people_id` = p.id OR `d`.`deposit_people_id` = p.id
		  LEFT JOIN `loans` AS `l` ON `l`.`people_id` = p.id OR `l`.`deposit_people_id` = p.id
		WHERE `p`.`id` != 1 AND (`d`.`is_confirmed` = 1 OR `l`.`is_confirmed` = 1)
		GROUP BY `p`.name
		' ) );

//			dd( $options );
//			dd( DB::getQueryLog() );

		return $options;
	}

	/**
	 * Get The people whom the selected Borrower has taken loan from
	 *
	 * @param int $borrower
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function getDepositorForBorrowersOptions( $borrower = 0, $render = false ) {
		$options = DB::table( 'loans as l' )
		             ->leftJoin( 'people as p', 'p.id', '=', 'l.deposit_people_id' )
		             ->select( 'p.id as id', 'p.name as name' )
		             ->where( 'l.people_id', $borrower )
		             ->where( 'l.people_id', '!=', ADMIN_ID )
		             ->where( 'l.is_confirmed', 1 )
		             ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get The people whom the selected Borrower has taken loan from
	 *
	 * @param int $borrower
	 * @param int $depositor
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function getDepositorAccountForBorrowersOptions( $borrower = 0, $depositor = 0, $render = false ) {
		$options = DB::table( 'loans as l' )
		             ->leftJoin( 'people as p', 'p.id', '=', 'l.deposit_people_id' )
		             ->leftJoin( 'personal_accounts as pa', 'pa.id', '=', 'l.personal_account_id' )
		             ->select( 'pa.id as id', 'pa.account_name as name' )
		             ->where( 'l.people_id', $borrower )
		             ->where( 'l.deposit_people_id', $depositor )
		             ->where( 'l.people_id', '!=', ADMIN_ID )
		             ->where( 'l.is_confirmed', 1 )
		             ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}


	/**
	 * Get the currencies that the borrower has received from the Depositor
	 *
	 * @param int $borrower
	 * @param int $account
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function getPeopleCurrencyForBorrowReturnOptions( $borrower = 0, $account = 0, $render = false ) {
		$options = DB::table( 'loans as l' )
		             ->leftJoin( "account_entries AS e", 'l.account_entry_id', '=', 'e.id' )
		             ->leftJoin( 'currencies as c', 'c.id', "=", "e.currency_id" )
		             ->where( "l.people_id", "=", $borrower )
		             ->where( "l.people_id", "!=", ADMIN_ID )
		             ->where( "l.personal_account_id", "=", $account )
		             ->where( "l.is_confirmed", "=", 1 )
		             ->select( 'c.id as id', DB::raw( "CONCAT(c.code, '(', FORMAT(ABS(SUM(e.amount)),2), ')') AS name " ) )
		             ->groupBy( 'e.cash_account_id', 'e.currency_id' )
		             ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Full account with currency name options
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function accountCurrencyNameOptions( $account, $render = false, $amount = true ) {

		if ( $amount ) {
			$str = "CONCAT(c.code, '(', FORMAT(SUM(e.amount),2), ')') AS name ";
		} else {
			$str = "c.code AS name ";
		}

		$options = DB::table( 'cash_account_details' )
		             ->leftJoin( 'currencies as c', 'c.id', "=", "cash_account_details.currency_id" )
		             ->leftJoin( "account_entries AS e", function ( $join ) {
			             $join->on( 'e.cash_account_id', '=', 'cash_account_details.cash_account_id' );
			             $join->on( 'e.currency_id', '=', 'cash_account_details.currency_id' );
		             } )
		             ->where( "cash_account_details.cash_account_id", "=", $account )
		             ->select( 'c.id as id', DB::raw( $str ) )
		             ->groupBy( 'e.cash_account_id', 'e.currency_id' )
		             ->lists( 'name', 'id' );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get the claim nature Option List
	 *
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function claimNatureOptions( $render = false ) {
		$whereRaw = 'is_deleted = 0';
		$options  = ClaimNature::pairList( 'id', 'name', $whereRaw );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get the claim nature Option List
	 *
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function letterNatureOptions( $render = false ) {
		$whereRaw = 'is_deleted = 0';
		$options  = LetterNature::pairList( 'id', 'name', $whereRaw );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Material items list
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function materialItemOptions( $render = false ) {
		$whereRaw = ' 1 ';
		$options  = MaterialGiftItems::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Material gift list
	 *
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	private function materialGiftListOptions( $render = false ) {
		$whereRaw = " 1";
		$options  = MaterialGiftList::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get the Permission Template's Options List
	 *
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function permissionOptions( $render = false ) {
		$options = Permission::pairList( 'id', 'name', '' );

		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Get the Expense Head Lists
	 *
	 * @param bool $render
	 *
	 * @return mixed
	 */
	public function expenseHeadOptions( $render = false ) {
		$whereRaw = "";
		$options  = ExpenseHead::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Expense model
	 *
	 * @param bool|false $render
	 *
	 * @return array
	 */
	public function expenseModelOptions( $render = false ) {
		$whereRaw = ' 1 ';
		$options  = ExpenseModel::collections();
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	/**
	 * Items of a category
	 *
	 * @param $catId
	 * @param bool|false $render
	 *
	 * @return mixed
	 */
	public function materialCategoryItemOptions( $catId, $render = false ) {
		$whereRaw = ' category_id=' . $catId . '';
		$options  = MaterialGiftItems::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}
}

