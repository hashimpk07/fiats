<?php namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Parameters;
use App\Models\Virtual\AgeGroups;
use App\Models\Virtual\Gender;
use App\Models\Virtual\Language;
use App\Models\Virtual\MaritalStatus;
use App\Models\Virtual\Salutations;
use App\Models\Virtual\StatusTypes;
use App\Models\Virtual\Testaments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Qudratom\Response\Response;
use Qudratom\Response\ResponseBuilder;
use Qudratom\Traits\SelectPairs;
use Qudratom\Utilities\AjaxPaginator;
use Qudratom\Utilities\DateTime;
use Qudratom\Utilities\ErrorFormat;
use Qudratom\Utilities\Helper;

class MemberController extends Controller {

	use SelectPairs ;
	public $vscolumns = array(
		'Sl.No', 'Reg.No.' , 'Mobile' ,'Name', 'Gender', 'D.O.B', 'Age Group',
		'Testament', 'Status'
	) ;

	/**
	 * Show the profile for the given user.
	 * @return Response
	 * @internal param int $id
	 *
	 */
	public function index() {
		return $this->page();
	}
	private function _getHidden() {

		$array = [
				'selSalution',
				'selGender',
				'selMaritalStatus',
				'selAgeGroup',
				'selLanguage',
				'selTestament',
				'selStatus' ] ;

		$str = '' ;
		foreach( $array as $name )
		{
			$v = \Illuminate\Support\Facades\Input::get($name) ;
			$str .= "<input type='hidden' name='" . $name . "' value='" . $v ."' />" ;

		}
		return $str ;
	}
	public function listtable() {

		//from print ?
		$isprint = (@func_get_arg(0) == true ? true : false) ;
		if ( $isprint ) {
			$records    = Members::whole( true );
			$rowsetview = View::make( 'member.row', [ 'records' => $records ] );
			$pagerhtml  = '';
		} else {
			$records    = Members::paginate();
			$rowsetview = View::make( 'member.row', [ 'records' => $records ] );
			$pagerhtml  = AjaxPaginator::render( $records, 'idMemberTabularWrap', 'MemberController@listtable' );
		}
		return View::make( 'member.table', [
			'isprint'	  	  => $isprint,
			'rawsethtml'      => $rowsetview,
			'pagerhtml'       => $pagerhtml,
			'controller'      => $this,
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'genderOptions'      =>Gender::collections(),
			'languageOptions' => $this->languageOptions(),
			'url'             => action( 'MemberController@listtable' ),
		] );
	}

	public function printout( $id ) {
		$ca = Members::detail( $id );

		$vars = array(
			'CGM_MODE'          => VIEW,
			'record'            => $ca,
			'url'               => action( 'MemberController@onAdd' ),
			'currencyOptions'   => $this->currencyOptions(),
			'accountantOptions' => $this->accountantOptions(),
			'accountOptions'    => $this->accountOptions(),
			'peopleOptions'     => $this->peopleOptions(),
			'careOfOptions'     => $this->careOfOptions(),
			'relationOptions'   => $this->relationOptions(),
		);

		$print_content  = View::make( 'member.print', $vars );
		$caption        = "Advance Payment Voucher";
		$call_functions = [ ];

		$parameters = array(
			'CGM_MODE'          => VIEW,
			'record'            => $ca,
			'url'               => action( 'MemberController@onAdd' ),
			'currencyOptions'   => $this->currencyOptions(),
			'accountantOptions' => $this->accountantOptions(),
			'accountOptions'    => $this->accountOptions(),
			'peopleOptions'     => $this->peopleOptions(),
			'careOfOptions'     => $this->careOfOptions(),
			'relationOptions'   => $this->relationOptions(),
			'print_content'     => $print_content,
			'caption'           => $caption,
			'call_functions'    => $call_functions,
		);

		return View::make( 'shared.view_print', $parameters ) ;
	}
	public function listprint() {

		$records = Members::whole();

		$rowsetview = View::make( 'member.row', [ 'records' => $records ] );

		$printcontent = View::make( 'member.table', [ 'rawsethtml' => $rowsetview, 'pagerhtml' => '' ] );

		return View::make( 'shared.print', [ 'content' => $printcontent ] );
	}
	public function listword()
	{

		$records = (Array)Members::whole();
		$records = reset($records ) ;

		$columns = Parameters::get('POSTAL_COLUMNS') ;

		$numColumns = ( (@$columns) ? $columns : 2 ) ;

		global $gtt_chunks ;
		$gtt_chunks = array_chunk($records, $numColumns) ;

		include dirname(__FILE__) . '/../../packages/html2doc/output.php' ;

	}

	public function listcsv() {
		$records   = Members::whole();

		$columnMap = array(
			'#'         => 'Sl No',
			'reg_no'    => 'Reg.No',
			'mobile'    => 'Mobile',
            'email'     => 'Email',
			'name'     	=> 'Name',
			'gender'    => [ 'title' => 'Gender', 'map' => new Gender() ],
			'dob'       => 'D.O.B',
            'religion'    =>  'Religion',
            'caste'     => 'Caste',
            'occupation'     => 'Occupation',
            'parish'      => 'parish',
            'diocese'   => 'diocese',
		//	'language' 	=> 'Language',
            'language_id' => [ 'title' => 'Language', 'map' => new Language() ],
			'testament' => [ 'title' => 'Testament', 'map' => new Testaments() ],
			'status'    => [ 'title' => 'Status', 'map' => new StatusTypes() ],
            'address'    =>'Address'
		);
		$columns   = Input::get( 'vs_columns' );

		if ( ! is_array( $columns ) ) {
			$columns = $this->vscolumns;
		}

		$array = Helper::buildCsv( $records, $columnMap, $columns );

		return Helper::csv( $array, Helper::getClassPrefix( $this ) . '.csv' );
	}

	public function page() {

		$data = $this->listtable();

		return View::make( 'member.page', [
			'tablehtml'       => $data,
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'genderOptions'      => Gender::collections(),
			'languageOptions' => $this->languageOptions(),
			'url'             => action( 'MemberController@listtable' ),
		] );

		//return View::make( 'member.page', [ 'tablehtml' => $data ] );
	}
	public function doValidate( $mode, $ackMember = null ) {
		if( $mode == ACKNOWLEDGED ) {
			return $this->_doValidateAcknowledge($ackMember) ;
		}

		//error fields
		$errfields = array(
			'txtDate'        => 'eDate',
			'selAccount'     => 'eAccount',
			'selCurrency'    => 'eCurrency',
			'selBeneficiary' => 'eBeneficiary',
			'txtAmount'      => 'eAmount',
			'txtRemarks'     => 'eRemarks',
			'selReceiver'    => 'eReceiver',
			'selAccountant'  => 'eAccountant',
			'selApproved'    => 'eApproved'
		);
		//lable display attributes
		$attributes = array(
			'txtDate'        => 'Date',
			'selAccount'     => 'Account',
			'selCurrency'    => 'Currency',
			'selBeneficiary' => 'Beneficiary',
			'txtAmount'      => 'Amount',
			'selReceiver'    => 'Receiver',
			'selAccountant'  => 'Accountant',
			'selApproved'    => 'Approved'
		);
		//validation data
		$data = [
			'txtDate'        => Input::get( 'txtDate' ),
			'selAccount'     => Input::get( 'selAccount' ),
			'selCurrency'    => Input::get( 'selCurrency' ),
			'selBeneficiary' => Input::get( 'selBeneficiary' ),
			'txtAmount'      => Helper::toNumber( Input::get( 'txtAmount' ) ),
			'selReceiver'    => Input::get( 'selReceiver' ),
			'selAccountant'  => Input::get( 'selAccountant' ),
			'selApproved'    => Input::get( 'selApproved' ),
		];
		//validation rules
		$amount   = doubleval( $this->queryBalance() );
		$approved = Input::get( 'selApproved' );
		$rules    = [
			'txtDate'        => [ 'required', 'future_date' ],
			'selAccount'     => [ 'required' ],
			'selCurrency'    => [ 'required' ],
			'txtAmount'      => [ 'numeric', 'lessereq:' . $amount ],
			'selBeneficiary' => [ 'required', 'not_in:' . $approved ],
			'selAccountant'  => [ 'required' ],
			'selReceiver'    => [ 'required' ],
			'selAccountant'  => [ 'required' ],
			'selApproved'    => [ 'required' ],
		];

		$validator = Validator::make( $data, $rules );
		$validator->setAttributeNames( $attributes );

		if ( $validator->fails() ) {
			$errors = $validator->messages();

			return ErrorFormat::format( $errors, $errfields );
		}

		return null;
	}
	public function _doValidateAcknowledge($member) {
		//error fields
		$errfields = array(
			'txtDate'        => 'eDate',
			'txtRemarks'     => 'eRemarks',
		);
		//lable display attributes
		$attributes = array(
			'txtDate'        => 'Date',
			'txtRemarks'     => 'Remarks',
		);
		//validation data
		$data = [
			'txtDate'        => Input::get( 'txtDate' ),
			'txtRemarks'        => Input::get( 'txtRemarks' ),
		];
		//validation rules
		$rules    = [
			'txtDate'        => [ 'required', 'future_date', 'after_date:' . $member->dt ],
			'txtRemarks'        => [ 'required' ],
		];

		$validator = Validator::make( $data, $rules ) ;
		$validator->setAttributeNames( $attributes ) ;

		if ( $validator->fails() ) {
			$errors = $validator->messages();

			return ErrorFormat::format( $errors, $errfields );
		}

		return null;
	}
	public function conform( $id ) {

		$ca          = Members::find( $id );
		$amount      = $ca->amount;
		$cashAccount = $ca->cash_account_id;
		$currency    = $ca->currency_id;

		$left = CashAccount::queryBalance( $currency, $cashAccount );
		if ( $left < $ca->amount ) {
			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Not enough balance.' )->build() );
		}

		$ids                 = $ca->account_entry_id;
		$ae                  = new AccountEntry();
		$ae->mode            = ENTRY_ADVANCE;
		$ae->cash_account_id = $cashAccount;
		$ae->amount          = 0 - $amount;
		$ae->currency_id     = $currency;
		$ae->remarks         = $ca->remarks;
		$ae->dt              = DB::raw( 'NOW()' );
		$ae->save();

		$ca->account_entry_id = $ae->id;
		$ca->status           = 'C';

		if ( $ca->save() ) {
			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
		}

		return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Failed' )->build() );
	}

	public function onUpload( $id ) {


		$UploadFile = FileUpload::upload( 'txtFileUpload' );
		$ca         = Members::find( $id );
		if ( $UploadFile != "" ) {
			$ca->attachment_file = $UploadFile;
		}
		if ( $ca->save() ) {
			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
		}

		return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Failed' )->build() );
	}

	public function onEdit( $id ) {

		$amount = Helper::toNumber( Input::get( 'txtAmount' ) );

		$date        = Input::get( 'txtDate' );
		$account     = Input::get( 'selAccount' );
		$currency    = Input::get( 'selCurrency' );
		$beneficiary = Input::get( 'selBeneficiary' );
		$careoff     = Input::get( 'selCareOf' );
		$purpose     = Input::get( 'txtPurpose' );
		//$amount      = Input::get( 'txtAmount' );
		$remarks    = Input::get( 'txtRemarks' );
		$receiver   = Input::get( 'selReceiver' );
		$relation   = Input::get( 'selRelation' );
		$accountant = Input::get( 'selAccountant' );
		$approved   = Input::get( 'selApproved' );

		//if any error return
		$errors = $this->doValidate( EDIT );
		if ( $errors != null ) {
			if ( count( $errors ) > 0 ) {
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->addErrors( $errors )->setMessage( 'Please fix errors' )->build() );
			}
		}

		//save cash account
		$ca                       = Members::find( $id );
		$ca->dt                   = DateTime::mysqlDate( $date );
		$ca->amount               = $amount;
		$ca->beneficiary_id       = $beneficiary;
		$ca->cash_account_id      = $account;
		$ca->currency_id          = $currency;
		$ca->beneficiary_id       = $beneficiary;
		$ca->careof_id            = $careoff;
		$ca->approved_id          = $approved;
		$ca->purpose              = $purpose;
		$ca->remarks              = $remarks;
		$ca->receiver_id          = $receiver;
		$ca->receiver_relation_id = $relation;
		$ca->accountant_id        = $accountant;
		$ca->prepared_id          = Auth::user()->id;
		$ca->status               = 'D';
		if ( $ca->save() ) {
			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
		}

		return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Failed' )->build() );
	}

	/**
	 * @return mixed
	 */
	public function onAdd() {


		$amount = Helper::toNumber( Input::get( 'txtAmount' ) );

		$date        = Input::get( 'txtDate' );
		$account     = Input::get( 'selAccount' );
		$currency    = Input::get( 'selCurrency' );
		$beneficiary = Input::get( 'selBeneficiary' );
		$careoff     = Input::get( 'selCareOf' );
		$approved    = Input::get( 'selApproved' );
		$purpose     = Input::get( 'txtPurpose' );
		//	$amount      = Input::get( 'txtAmount' );
		$remarks    = Input::get( 'txtRemarks' );
		$receiver   = Input::get( 'selReceiver' );
		$relation   = Input::get( 'selRelation' );
		$accountant = Input::get( 'selAccountant' );

		DB::beginTransaction();

		//if any error return
		$errors = $this->doValidate( EDIT );
		if ( $errors != null ) {
			if ( count( $errors ) > 0 ) {
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->addErrors( $errors )->setMessage( 'Please fix errors' )->build() );
			}
		}


		$status = 'D';
		//save cash account
		$ca = new Members();

		$ca->dt                   = DateTime::mysqlDate( $date );
		$ca->amount               = $amount;
		$ca->beneficiary_id       = $beneficiary;
		$ca->cash_account_id      = $account;
		$ca->currency_id          = $currency;
		$ca->beneficiary_id       = $beneficiary;
		$ca->careof_id            = $careoff;
		$ca->approved_id          = $approved;
		$ca->purpose              = $purpose;
		$ca->remarks              = $remarks;
		$ca->receiver_id          = $receiver;
		$ca->receiver_relation_id = $relation;
		$ca->accountant_id        = $accountant;
		$ca->prepared_id          = Auth::user()->id;
		$ca->status               = $status;
		if ( $ca->save() ) {
			DB::commit();

			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
		}

		DB::rollback();

		return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Failed' )->build() );
	}

	public function add() {
		$vars = array(
			'url'               => action( 'MemberController@onAdd' ),
			'CGM_MODE'          => ADD,
			'currencyOptions'   => [ ],
			'accountantOptions' => $this->accountantOptions(),
			'accountOptions'    => $this->accountOptions(),
			'peopleOptions'     => $this->peopleOptions(),
			'approvableOptions' => $this->approvableOptions(),
			'careOfOptions'     => $this->careOfOptions(),
			'relationOptions'   => $this->relationOptions(),
		);

		return urlencode( View::make( 'member.add', $vars )->render() );
	}
	public function filter() {
		$vars = array(
			'url'               => action( 'MemberController@listtable' ),
			'CGM_MODE'          => ADD,
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'genderOptions'     =>Gender::collections(),
			'languageOptions' 	=> $this->languageOptions(),
			'url'             	=> action( 'MemberController@listtable' ),
		);
		return urlencode( View::make( 'member.filter', $vars )->render() );
	}

	public function edit( $id) {
		$ca   = Members::detail( $id );
		$vars = array(
			'url'               => action( 'MemberController@onEdit', [ $id ] ),
			'record'            => $ca,
			'CGM_MODE'          => EDIT,
			'currencyOptions'   => $this->accountCurrencyOptions( $ca->cash_account_id, false, true ),
			'accountantOptions' => $this->accountantOptions(),
			'accountOptions'    => $this->accountOptions(),
			'peopleOptions'     => $this->peopleOptions(),
			'approvableOptions' => $this->approvableOptions(),
			'careOfOptions'     => $this->careOfOptions(),
			'relationOptions'   => $this->relationOptions(),
		);

		return urlencode( View::make( 'member.add', $vars )->render() );
	}
	public function view( $id ) {
		$ca = Members::detail( $id );

		$vars = array(
			'CGM_MODE'          => VIEW,
			'record'            => $ca,
			'url'               => action( 'MemberController@onAdd' ),
			'currencyOptions'   => $this->accountCurrencyOptions( $ca->cash_account_id, false, false ),
			'accountantOptions' => $this->accountantOptions(),
			'accountOptions'    => $this->accountOptions(),
			'peopleOptions'     => $this->peopleOptions(),
			'approvableOptions' => $this->approvableOptions(),
			'careOfOptions'     => $this->careOfOptions(),
			'relationOptions'   => $this->relationOptions(),
		);

		return urlencode( View::make( 'member.add', $vars )->render() );
	}

	public function upload( $id ) {
		//  $id = 9;
		$vars = array(
			'url' => action( 'MemberController@onUpload', [ $id ] ),
			'id'  => $id,
		);

		return urlencode( View::make( 'member.upload', $vars )->render() );

	}

	public function delete( $id ) {
		try {
			if ( Members::where( 'status', '=', 'D' )->where( 'id', '=', $id )->exists() ) {

				Members::destroy( $id );

				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
			}
		} catch ( Exception $e ) {
		}

		return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Failed' )->build() );
	}

	public function queryBalance( $claim = null, $accountId = null, $currencyId = null ) {
		if ( $claim ) {
			$cid = $claim;
		} else {
			$cid = Input::get( 'selClaim' );
		}

		if ( $cid ) {
			return Members::advanceBalance( $cid );
		} else {
			if ( $accountId ) {
				$account = $accountId;
			} else {
				$account = Input::get( 'selAccount' );
			}
			if ( $currencyId ) {
				$currency = $currencyId;
			} else {
				$currency = Input::get( 'selCurrency' );
			}

			return CashAccount::queryBalance( $currency, $account );
		}
	}

	public function onQueryBalance() {
		$balance = $this->queryBalance();

		$cid = Input::get( 'selClaim' );
		if ( $cid ) {
			$ca = Claim::find( $cid );

			$account  = $ca->cash_account_id;
			$currency = $ca->currency_id;

			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$SILENT )
				->addData( [
					'selAccount'  => $account,
					'selCurrency' => $currency,
					'txtBalance'  => $balance
				] )
				->build() );
		}else {

			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$SILENT )
				->addData( [ 'txtBalance' => $balance ] )
				->build() );
		}
	}

	//-----
	/**
	 * @return mixed
	 */
	public function onAcknowledge( $id ) {

		$amount = Helper::toNumber( Input::get( 'txtAmount' ) );

		$date       = Input::get( 'txtDate' );
		$remarks    = Input::get( 'txtRemarks' );

		DB::beginTransaction();

		//if any error return
		$member = Members::find($id) ;
		$errors = $this->doValidate( ACKNOWLEDGED, $member );
		if ( $errors != null ) {
			if ( count( $errors ) > 0 ) {
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->addErrors( $errors )->setMessage( 'Please fix errors' )->build() );
			}
		}

		//save cash account
		$m = Members::find($id) ;

		$m->ack_remarks		= $remarks ;
		$m->ack_dt			= DateTime::mysqlDate($date) ;
		$m->status          = 'A' ;

		if ( $m->save() ) {
			DB::commit();

			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
		}

		DB::rollback();

		return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Failed' )->build() );
	}
	public function acknowledge( $id ) {
		$ca   = Members::detail( $id );

		$vars = array(
			'url'               => action( 'MemberController@onAcknowledge', [$id] ),
			'CGM_MODE'          => ADD,
			'record'			=> $ca,
		);

		return urlencode( View::make( 'member.acknowledge', $vars )->render() );
	}
}