<?php namespace App\Http\Controllers;

use App\Models\Languages;
use App\Models\Members;
use App\Models\Payments;
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
use Qudratom\Utilities\DateTime;
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
	public function page()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {

            $mobile = 'Admin';

            Session::set('creator', $mobile) ;

            $members = Members::where('creator_ref', '=', $mobile)->get();

            $ref_no = Session::get('creator');


        } else {
            $mobile = Session::get('creator');
            $members = Members::where('creator_ref', '=', $mobile)->get();

            $ref_no = Session::get('creator');
        }
            if (!$ref_no) {
                //redirect back to otp page..
//			$ref_no = Input::get('mobile') ;
                return redirect('otp');
            }

		$count = Members::where('creator_ref', '=', $mobile)->where('payment_id', '=', 0)->count() ;

            return View::make('person.page', [
                'url' => action('PersonController@onAdd'),
                'salutationOptions' => Salutations::collections(),
                'maritalStatusOptions' => MaritalStatus::collections(),
                'languageOptions' => $this->languageOptions(),
                'paymentModeOptions' => $this->paymentModeOptions(),
                'count' => $count,
                'sessions' => $this->getSessionList($ref_no),
            ]);
        }

	public function doValidate( $mode ,$editId = 0 ) {

		$where     = "";
		if ( $mode == EDIT ) {
			$where = ", id !='" . $editId . "' ";
		}

		//error fields
		$errfields = array(
			'txtMobile'        => 'ePhone',
			'txtEmail'         => 'eEmail',
			'txtName'          => 'eName',
			'selSalutation'    => 'eType',
			'selLanguage'      => 'eLang',
			'datepicker'       => 'eDob',
			'txtAddress'       => 'eAddress',

		);
		//lable display attributes
		$attributes = array(
			'txtMobile'        => 'Mobile',
			'txtEmail'         => 'Email',
			'txtName'          => 'Name',
			'selSalutation'    => 'Salutation',
			'selLanguage'      => 'Language',
			'datepicker'       => 'Date Of Birth',
			'txtAddress'       => 'Address',
		);
		//validation data
		$data = [
			'txtMobile'        => Input::get( 'txtMobile' ),
			'txtEmail'         => Input::get( 'txtEmail' ),
			'txtName'          => Input::get( 'txtName' ),
			'selSalutation'    => Input::get( 'selSalutation' ),
			'selLanguage'      => Input::get( 'selLanguage' ),
			'datepicker'       => Input::get( 'txtDob' ),
			'txtAddress'       => Input::get( 'txtAddress' ),
		];
		//validation rules
		$rules    = [
			'txtMobile'        => [ 'required', 'numeric', 'regex:/[0-9]{10}/', "isexists:members,mobile $where" ],
			'txtEmail'         => [ 'required', 'email', "isexists:members,email $where" ],
			'txtName'          => [ 'required','min:2' ],
			'selSalutation'    => [ 'required' ],
			'selLanguage'      => [ 'required' ],
			'datepicker'       => [ 'required','future_date' ],
			'txtAddress'       => [ 'required','min:4'],
		];



		if( Input::get('selLanguage') == OTHER_LANGUAGE_ID ) {
			//error fields
			$errfields [ 'txtLanguage']       = 'eLang' ;
			//lable display attributes
			$attributes[ 'txtLanguage']       = 'Language';
			//validation data
			$data[ 'txtLanguage']       = Input::get( 'txtLanguage' ) ;
			//validation rules
			$rules ['txtLanguage' ]    = 'required';
		}

		$validator = Validator::make( $data, $rules );
		$validator->setAttributeNames( $attributes );

		if ( $validator->fails() ) {
			$errors = $validator->messages();

			return ErrorFormat::format( $errors, $errfields );
		}

		return null;
	}
	public function _edit( $id, $flags = null ) {

		$ca   = Members::detail( $id );
		$lo = Languages::find($ca->language_id) ;
		$language_name = '' ;
		if( $lo ) {
			if( $lo->flag == 0 ) {
				$language_name = $lo->name;
			}
		}
		$vars = array(
			'url'               => action( 'PersonController@onAdd', [ $id ] ),
			'record'            => $ca,
			'language_name'		=> $language_name,
			'CGM_MODE'          => EDIT,
			'ADMIN_EDIT'		=> $flags,
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'paymentModeOptions' 	=> $this->paymentModeOptions(),
			'languageOptions' => $this->languageOptions(),
			'sessions' => $this->getSessionList($ca->mobile ) ,
			'flags' => $flags,
		);
		return urlencode( View::make( 'person.add', $vars )->render() );
	}
	public function vew( $id, $flags = null ) {

		$ca   = Members::detail( $id );
        $lo = Languages::find($ca->language_id) ;
        $language_name = '' ;
        if( $lo ) {
            $language_name = $lo->name ;
        }
		$vars = array(
			'url'               => '',
			'record'            => $ca,
			'CGM_MODE'          => VIEW,
            'language_name'		=> $language_name,
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'paymentModeOptions' 	=> $this->paymentModeOptions(),
			'languageOptions' => $this->languageOptions(),
			'sessions' => $this->getSessionList($ca->mobile ) ,
			'flags' => $flags,
		);
		return urlencode( View::make( 'person.view', $vars )->render() );
	}
	public function adminedit( $id ) {
		return $this->_edit($id, true) ;
	}
	public function adminview( $id ) {
		return $this->vew($id, true) ;
	}
	public function edit( $id ) {
		return $this->_edit($id) ;
	}
	public function add( ) {

        $mobile = Session::get('creator');
		$count = Members::where('creator_ref', '=', $mobile)->where('payment_id', '=', 0)->count() ;
        $ref_no = Input::get('mobile');

		$vars = array(
			'url'               => action( 'PersonController@onAdd' ),
			'CGM_MODE'          => EDIT,
			'salutationOptions' => Salutations::collections(),
			'maritalStatusOptions' => MaritalStatus::collections(),
			'languageOptions' 	=> $this->languageOptions(),
			'paymentModeOptions' => $this->paymentModeOptions(),
			'count'            => $count,
			'sessions' 			=> $this->getSessionList($ref_no) ,
		);

		return urlencode( View::make( 'person.add', $vars )->render() );
	}
	public function insertLanguage() {
		$language_id   = Input::get( 'selLanguage' );
		$language_name = Input::get( 'txtLanguage' );

		if( $language_id == OTHER_LANGUAGE_ID ) {
			$lang = Languages::where('name', '=', $language_name)->first() ;
			if( $lang ) {
				return $lang->id ;
			}
			else {
				$lang = new Languages() ;
				$lang->name = $language_name ;
				$lang->flag = 0 ;
				if( $lang->save() )
				{
					return $lang->id ;
				}
			}
		}
		return $language_id ;
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
		$language_id   = $this->insertLanguage() ;
		$address   = Input::get( 'txtAddress' );
		$testament = Input::get( 'radTestment' );

		$remarks = Input::get( 'txtRemarks' );
		$payment_date = Input::get( 'txtPaymentDate' );
		$amount = Input::get( 'txtAmount' );
		$ref_no = Input::get( 'txtRefNo' );
		$payment_mode = Input::get( 'selPaymentMode' );

		//if any error return
		$errors = $this->doValidate( (($id) ? EDIT : ADD) , $id );
		if ( $errors != null ) {
			if ( count( $errors ) > 0 ) {
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->addErrors( $errors )->setMessage( 'Please fix errors' )->build() );
			}
		}

		//save cash account
		if( $id ) {
			$ca = Members::find($id);
            $staus=$ca->status;
		}
		else {
			$ca = new Members() ;
            $ca->status='R';
		}
		$ca->mobile = $mobile ;
		$ca->email = $email ;
		$ca->salutation_id = $salutation ;
		$ca->name= $name ;
		$ca->gender = $gender ;
		$ca->religion = $religion ;
		$ca->caste = $caste ;
		$ca->dob =DateTime::mysqlDate( $dob );
		$ca->marital_status = $marital_status ;
		$ca->occupation = $occupation ;
		$ca->parish = $parish ;
		$ca->diocese= $diocese ;
		$ca->language_id = $language_id ;
		$ca->address = $address ;
		$ca->testament = $testament ;



        $ca->creator_ref = Session::get('creator');


		if ( $ca->save() ) {

			if( $amount ) {
				$creator_ref = $ca->creator_ref;
				//Payment option for admin {
				if ($id) {
					$cp = Payments::where('creator_ref', '=', $creator_ref)->first();
				} else {
					$cp = new Payments();
				}
				$cp->creator_ref = $creator_ref;
				$cp->payment_mode_id = $payment_mode;
				$cp->date = $payment_date;
				$cp->date = $payment_date;
				$cp->ref_no = $ref_no;
				$cp->remarks = $remarks;
                $ca->status = $staus;
				$cp->save();
				//}
			}

			return true ;
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
		$mobile = Session::get('creator') ;
		$members = Members::where('creator_ref', '=', $mobile)->get() ;
		$memberCount = count($members) ;
		if( $memberCount > 0 ) {

			return Response::send(Response::bulider()->setStatus(ResponseBuilder::$OK)
				->addScript("window.location.href='" . url('payment') . "';")
				->setMessage('')->build());
		}
		return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)
			->setMessage('Please add a participant')->build());
	}
	public function getSessionList($ref_no)
	{
		return Members::where('creator_ref', '=', $ref_no)->where('payment_id', '=', 0)->get() ;
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
			if( $ret === true ) {
				$nextForm = self::onNext() ;
				$mobile = Session::get('creator') ;

				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )
					->addScript("window.location.href='" . url('person') . "?mobile=" . $mobile . "&new=1';")
					->setMessage( 'Success' )->build() );
			}
			else {
				return $ret ;
			}
		}
		else if( Input::get('btnSave') ||
			Input::get('btnSavePay') ) {
			$ret = self::onSave() ;
			if( $ret === true ) {

				if (Input::get('btnSavePay')) {
					return self::onPayment();
				}
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$OK )->setMessage( 'Success' )->build() );
			}
			else {
				return $ret ;
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
			else {
				return Response::send( Response::bulider()->setStatus( ResponseBuilder::$FAIL )->setMessage( 'Failed' )->build() );
			}
		}
	}
	public function getPendingList( $mobile )
	{
		return Members::where('mobile', '=', $mobile ) ;
	}
}