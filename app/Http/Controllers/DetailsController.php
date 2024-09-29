<?php namespace App\Http\Controllers;




use App\Models\Members;
use App\Models\Virtual\MaritalStatus;
use App\Models\Virtual\Salutations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Qudratom\Response\Response;
use Qudratom\Response\ResponseBuilder;
use Qudratom\Traits\SelectPairs;
use Qudratom\Utilities\ErrorFormat;


class PersonController extends Controller {

	use SelectPairs ;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
//		$this->middleware('guest') ;
	}
	/**
	 * Show the application welcome screen to the member.
	 *
	 * @return Response
	 */
	public function index() {
		$this->index = true;

		return $this->page();
	}
	public function page() {

		$ref_no = Session::get('creator') ;
		if( ! $ref_no) {
			//redirect back to otp page..
			return redirect('otp');
		}

		return View::make( 'person.page', [
			'url'            => action( 'PersonController@onAdd' ),
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'languageOptions' => $this->languageOptions(),
			'sessions' => $this->getSessionList($ref_no) ,
		] );
	}
	public function doValidate( $mode ) {
		//error fields
		$errfields = array(
			'txtMobile'        => 'eMobile',
		);
		//lable display attributes
		$attributes = array(
			'txtMobile'        => 'Mobile',
		);
		//validation data
		$data = [
			'txtMobile'        => Input::get( 'txtMobile' ),
		];
		//validation rules
		$rules    = [
			'txtMobile'        => [ 'required' ],
		];

		$validator = Validator::make( $data, $rules );
		$validator->setAttributeNames( $attributes );

		if ( $validator->fails() ) {
			$errors = $validator->messages();

			return ErrorFormat::format( $errors, $errfields );
		}

		return null;
	}
	public function edit( $id ) {

		$ca   = Members::detail( $id );
		$vars = array(
			'url'               => action( 'PersonController@onAdd', [ $id ] ),
			'record'            => $ca,
			'CGM_MODE'          => EDIT,
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'languageOptions' => $this->languageOptions(),
			'sessions' => $this->getSessionList($ca->mobile                                                      ) ,
		);
		return urlencode( View::make( 'person.add', $vars )->render() );
	}
	public function add( ) {

		$ref_no = Input::get('mobile') ;

		$vars = array(
			'url'               => action( 'PersonController@onAdd' ),
			'CGM_MODE'          => EDIT,
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'languageOptions' => $this->languageOptions(),
			'sessions' => $this->getSessionList($ref_no) ,
		);
		return urlencode( View::make( 'person.add', $vars )->render() );
	}

	/**
	 * @param null $id
	 * @return mixed
     */
	public function onSave($id = null ) {

		$id 	= Input::get( 'txtId' ) ;

		$mobile 	= Input::get( 'txtMobile' ) ;
		$email       = Input::get( 'txtEmail' );
		$salutation    = Input::get( 'selSalutation' );
		$name   = Input::get( 'txtName' );
		$gender = Input::get( 'radGender' );
		$religion    = Input::get( 'txtReligion' );
		$caste    = Input::get( 'txtCaste' );
		$dob    = Input::get( 'txtDob' );
		$marital_status   = Input::get( 'selMaritalStatus' );
		$occupation   = Input::get( 'txtOccupation' );
		$parish = Input::get( 'txtParish' );
		$diocese   = Input::get( 'txtDiocese' );
		$language_id   = Input::get( 'selLanguage' );
		$address   = Input::get( 'txtAddress' );
		$testament = Input::get( 'radTestament' );

		//if any error return
		$errors = $this->doValidate( ($id) ? EDIT : ADD );
		if ( $errors != null ) {
			if ( count( $errors ) > 0 ) {
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->addErrors( $errors )->setMessage( 'Please fix errors' )->build() );
			}
		}

		//save cash account
		if( $id ) {
			$ca = Members::find($id);
		}
		else {
			$ca = new Members() ;
		}
		$ca->mobile = $mobile ;
		$ca->email = $email ;
		$ca->salutation_id = $salutation ;
		$ca->name= $name ;
		$ca->gender = $gender ;
		$ca->religion = $religion ;
		$ca->caste = $caste ;
		$ca->dob = $dob ;
		$ca->marital_status = $marital_status ;
		$ca->occupation = $occupation ;
		$ca->parish = $parish ;
		$ca->diocese= $diocese ;
		$ca->language_id = $language_id ;
		$ca->address = $address ;
		$ca->testament = $testament ;
		$ca->creator_ref = Session::get('creator') ;

		if ( $ca->save() ) {
			return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
		}

		return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Failed' )->build() );
	}
	public function onNext($id = null) {
		if( $id ) {
			return $this->edit($id);
		}
		else {
			return $this->add() ;
		}
	}
	public function onPayment()
	{
		return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )
			->addScript("window.location.href='" . url('payment') . "';")
			->setMessage( 'Success' )->build() );
	}
	public function getSessionList($ref_no)
	{
		return Members::where('creator_ref', '=', $ref_no)->get() ;
	}
	public function onDelete()
	{
		$id 	= Input::get( 'txtId' ) ;
		$ca = Members::find($id) ;

		if( $ca->delete() )
		{
			return true;
		}
		return false;
	}
	public function onAdd()
	{
		if( Input::get('btnNext') ) {
			$ret = self::onSave() ;
			if( $ret ) {
				$nextForm = self::onNext();
				$mobile = Session::get('creator') ;

				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )
					->addScript("window.location.href='" . url('person') . "?mobile=" . $mobile . "&new=1';")
					->setMessage( 'Success' )->build() );
			}
		}
		else if( Input::get('btnPayment') ) {
			$ret = self::onSave() ;
			if( $ret ) {
				return self::onPayment();
			}
		}
		else if( Input::get('btnDelete') ) {
			$ret = self::onDelete() ;
			if( $ret ) {
				$mobile = Session::get('creator') ;
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )
					->addScript("window.location.href='" . url('person') . "?mobile=" . $mobile . "&new=1';")
					->setMessage( 'Success' )->build() ) ;
			}
		}

	}
	public function getPendingList( $mobile )
	{
		return Members::where('mobile', '=', $mobile ) ;
	}
}