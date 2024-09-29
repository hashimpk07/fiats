<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Models\CashAccount;
use App\Models\Claim;
use App\Models\Currency;
use App\Models\Viewstate;
use App\Models\Virtual\BalanceViewer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Qudratom\Response\JsonResponse;
use Qudratom\Response\Response;
use Qudratom\Response\ResponseBuilder;
use Qudratom\Traits\SelectPairs;
use Qudratom\Utilities\AjaxPaginator;

class AjaxController extends Controller {

	use SelectPairs;

	public function __construct() {
	}

	public function options( $type ) {
		$method = "$type" . "Options";

		return $this->{$method}( true );
	}


	/**
	 * @return mixed
	 */
	public function getAccountCurrencyOptions() {
		$accountId = Input::get( 'selAccount' );

		return $this->accountCurrencyOptions( $accountId, true, true );
	}

	/**
	 * Get Currency options on deposit while withdrawing
	 *
	 * @return mixed
	 */
	public function getPeopleCurrencyOptions() {
		$sub_account = Input::get( 'txtAccount' );

		return $this->peopleCurrencyOptions( $sub_account, true );
	}

	public function getPersonalAccountForWithdrawOptions() {
		$person_id              = Input::get( 'txtPeople' );
		$flag                   = 'w';
		$personalAccountOptions = $this->personalAccountForWithdrawOptions( $person_id, false );

		return view( 'personal_account.personal_accounts_selection', compact( 'person_id', 'personalAccountOptions', 'flag' ) );
	}

	public function getPersonalAccountForBorrowOptions() {
		$person_id              = Input::get( 'txtDepositor' );
		$flag                   = 'w';
		$personalAccountOptions = $this->personalAccountForWithdrawOptions( $person_id, false );

		return view( 'personal_account.personal_accounts_selection', compact( 'person_id', 'personalAccountOptions', 'flag' ) );
	}

	/**
	 * Get Currency options on deposit while withdrawing
	 *
	 * @return mixed
	 */
	public function getPeopleCurrencyOptionsForBorrow() {
		$account = Input::get( 'txtAccount' );

		return $this->peopleCurrencyOptions( $account, true );
	}

	/**
	 * Get Currency options on deposit while withdrawing
	 *
	 * @return mixed
	 */
	public function getPeopleCurrencyOptionsForStatementViewer() {
		$selAccount = Input::get( 'selAccount' );

		return $this->peopleCurrencyOptionsPersonalAccountStatements( $selAccount, true );
	}

	/**
	 * Get Account options on deposit while withdrawing
	 *
	 * @return mixed
	 */
	public function getPeopleAccountOptionsForStatementViewer() {
		$person = Input::get( 'selPeople' );

		return $this->peopleAccountOptionsPersonalAccountStatements( $person, true );
	}

	/**
	 * Get Depositors list
	 *
	 * @return mixed
	 */
	public function getDepositorOptionsOnDeposit() {

		return $this->depositorOptions( 0, true );
	}

	/**
	 * Get Depositors list for Borrower
	 *
	 * @return mixed
	 */
	public function getDepositorOptions() {
		$borrower = Input::get( 'txtpeople' );

		return $this->depositorOptions( $borrower, true );
	}

	/**
	 * Get Borrowers from people list
	 *
	 * @return mixed
	 */
	public function getBorrowers() {
		return $this->getBorrowerOptions( true );
	}

	/**
	 * Get Depositors according to the Borrower
	 *
	 * @return mixed
	 */
	public function getDepositorForBorrowers() {
		$borrower = Input::get( 'txtpeople' );

		return $this->getDepositorForBorrowersOptions( $borrower, true );
	}

	/**
	 * Get Depositors according to the Borrower
	 *
	 * @return mixed
	 */
	public function getDepositorAccountForBorrowers() {
		$borrower  = Input::get( 'txtpeople' );
		$person_id = Input::get( 'txtDepositor' );
		$flag      = 'w';

		$personalAccountOptions = $this->getDepositorAccountForBorrowersOptions( $borrower, $person_id, false );

		return view( 'personal_account.personal_accounts_selection', compact( 'person_id', 'personalAccountOptions', 'flag' ) );
	}

	/**
	 * Get the currencies that the borrower has received from the Depositor
	 *
	 * @return mixed
	 */
	public function getPeopleCurrencyForBorrowReturn() {
		$borrower  = Input::get( 'txtpeople' );
		$account = Input::get( 'txtAccount' );

		return $this->getPeopleCurrencyForBorrowReturnOptions( $borrower, $account, true );
	}

	/**
	 * Get the list of individuals
	 *
	 * @return mixed
	 */
	public function getPeople() {
		return $this->peopleOptions( true );
	}

	/**
	 * Get currency options on deposit while depositing
	 *
	 * @return mixed
	 */
	public function getCurrencies() {
		return $this->currencyOptions( true );
	}

	/**
	 * Get currency options on deposit while depositing
	 *
	 * @return mixed
	 */
	public function getPersonalAccountsCurrencyOptions() {
		return $this->PersonalAccountsCurrencyOptions( true );
	}

	/**
	 * @return mixed
	 */
	public function getExpenseTypeOptions() {
		$expHead = Input::get( 'selExpenseHead' );

		return $this->expenseTypeOptions( $expHead, true );
	}

	/**
	 * @return mixed
	 */
	public function getPersonalAccountOptions() {
		$person = Input::get( 'person_id' );

		return $this->personalAccountOptions( true, $person );
	}

	public function selectClaimCurrencyAccount() {
		$id = Input::get( 'selClaim' );
		$cm = Claim::find( $id );
		if ( $cm ) {
			$data                = array();
			$data['selAccount']  = $cm->cash_account_id;
			$data['selCurrency'] = $cm->currency_id;

			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$SILENT )->addData( $data )->build() );
		}
	}

	public function saveColumns() {
		$table      = Input::get( 'vs_table' );
		$columns    = Input::get( 'vs_columns' );
		$columnsIns = json_encode( $columns );

		$obj = Viewstate::where( 'name', $table )->first();
		if ( $obj ) {
			Viewstate::where( 'name', $table )->update( [ 'data' => $columnsIns ] );
		} else {
			$obj       = new Viewstate();
			$obj->name = $table;
			$obj->data = $columnsIns;
			$obj->save();
		}
	}
}