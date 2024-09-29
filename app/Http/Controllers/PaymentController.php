<?php namespace App\Http\Controllers;

use App\Models\Languages;
use App\Models\Members;
use App\Models\Parameters;
use App\Models\PaymentModes;
use App\Models\Payments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Qudratom\Response\Response;
use Qudratom\Response\ResponseBuilder;
use Qudratom\Traits\SelectPairs;
use Qudratom\Utilities\DateTime;
use Qudratom\Utilities\ErrorFormat;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
//		$this->middleware('guest');
	}
	private function _getBaseAmount() {
		$baObj = Parameters::where('name', '=', 'BASE_AMOUNT')->first() ;
		return $baObj->value ;
	}
	private function _getMemberCount() {
		$mobile = Session::get('creator') ;
		$members = Members::where('creator_ref', '=', $mobile)->where('payment_id', '=', 0)->get() ;
		return count($members) ;
	}
	private function _getTotalAmount() {
		$baseAmount = $this->_getBaseAmount() ;
		$memberCount = $this->_getMemberCount() ;

		return ($baseAmount * $memberCount) ;
	}
	/**
	 * Show the application welcome screen to the member.
	 *
	 * @return Response
	 */
	public function index()
	{
		$baseAmount = $this->_getBaseAmount() ;
        $memberCount = $this->_getMemberCount() ;


		$vars = array(
			'url'                => action( 'PaymentController@onGo' ),
			'CGM_MODE'           => ADD,
			'currencyOptions'    => [],
			'baseAmount'		 => $baseAmount,
			'memberCount'		 => $memberCount,
			'paymentModeOptions' =>  $this->paymentModeOptions(),
		);

		return View::make( 'payment.page', $vars )->render() ;
	}
	public function doValidate( $mode ) {
		//error fields
		$errfields = array(
			'selPaymentMode'        => 'ePaymentMode',
			'txtRefNo'              => 'eRefNo',
			'txtPaymentDate'        => 'ePaymentDate',
		);

		//lable display attributes
		$attributes = array(
			'selPaymentMode'        => 'Payment Mode',
			'txtRefNo'              => 'Reference Number',
			'txtPaymentDate'        => 'Payment Date',
		);

		$data = [

			'txtPaymentDate'   =>Input::get( 'txtPaymentDate' ),
			'txtRefNo'   =>Input::get( 'txtRefNo' ),
			'selPaymentMode'   =>Input::get( 'selPaymentMode' ),
		];

		//validation rules
		$rules    = [
			'txtPaymentDate'        => [ 'required' ],
			'txtRefNo'              =>['required'] ,
			'selPaymentMode'              =>['required'] ,
		];

		$validator = Validator::make( $data, $rules );
		$validator->setAttributeNames( $attributes );

		if ( $validator->fails() ) {
			$errors = $validator->messages();

			return ErrorFormat::format( $errors, $errfields );
		}

		return null;
	}
	public function doConfirm($creator, $paymentId )
	{
		$members = Members::listquery($creator)->get() ;

		//{ retrieve unique series no..
		DB::beginTransaction();
		$rec = DB::table('parameters')->where('name', '=', 'REGISTRATION_NO')->lockForUpdate()->first() ;
		DB::table('parameters')->where('name', '=', 'REGISTRATION_NO')->update(['value' => DB::raw('CAST(value AS UNSIGNED) + 1 ')]) ;
		DB::commit();
		$newSeries = $rec->value;
		//}

		//Create register no for all participants
		$i = 0 ;
		$regOk = 1 ;
		if( count($members) < 1 ) {
			//echo "not ofund any" . $creator ;
//			die ;
		}
                $newArray = [] ;
		foreach ($members as $record) {
			$i++;

			$ageGroupName = \App\Models\Virtual\AgeGroups::nameGroup($record->agegroup);
			$language = Languages::languageCode($record->language_id);
			$langCode = substr($language, 0, 3);
			$langCode = strtoupper($langCode);

			$testament = \App\Models\Virtual\Testaments::explainCode($record->testament);
			$registration = ($langCode . "-" . $testament . "-" . $ageGroupName . "-" . $newSeries) . "/" . $i;

			$one = Members::find($record->id);

			if ($one) {
				$one->reg_no = $registration;
				$one->status = 'P';
				$one->payment_id = $paymentId ;
			}
			else {
			}

			$regOk &= $one->save();
                        
                        $newArray[] = $one ;
		}

                if( $regOk ) {
                    foreach ($newArray as $one) {
                        //send email
                        if(is_object($one) ) {
                            $this->oneMail($one) ;
                        }
                    }
                }
		return $regOk ;
	}
        private function oneMail( $one ) {
            
            $email = $one->email ;
            $aOne = $one ;
            
            $regNo = Crypt::encrypt( $one->reg_no, FIAT_PASS) ;
            $regNo = urlencode($regNo) ;

            $url = url('payment/receipt/' . $regNo ) ;
            $data = [
                    'memberObject' => $aOne,
                    'url' => $url,
            ];

            
            Mail::queue('emails.receipts', $data, function ($message) use ($email) {
                    $message->subject('Fiatscriptura Registration confirmation') ;
                    $message->to($email) ;
            });
        }

        public function onGo()
	{
		$payment_mode = intval( Input::get( 'selPaymentMode' ) ) ;

		if( $payment_mode == 0 ) {
			$remarks = '' ;
			$payment_date = DateTime::clientDateTime() ;
			$ref_no = '' ;
			$amount = $this->_getTotalAmount() ;
		}
		else {
			$remarks = Input::get('txtRemarks');
			$payment_date = Input::get('txtPaymentDate');
			$ref_no = Input::get('txtRefNo');
			$amount = Input::get('txtAmount');
		}

		if( $amount <= 0.0 ) {
			return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->setMessage('Invalid amount')->build());
		}
			if( $payment_mode != 0 ) {

				$errors = $this->doValidate(ADD);

				if ($errors != null) {
					if (count($errors) > 0) {
						return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->addErrors($errors)->setMessage('Please fix errors')->build());
					}
				}
			}

			DB::beginTransaction();

            $creator_ref = Session::get('creator');

            $i=0 ;

			if( ! $creator_ref ) {
				return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->setMessage('Failed')->build()) ;
			}

			//Member to update
			$members = Members::listquery($creator_ref)->get() ;

			$cp = new Payments();

			$cp->creator_ref = $creator_ref;
			$cp->payment_mode_id = $payment_mode;
			$cp->date = DateTime::mysqlDate($payment_date);
			$cp->ref_no = $ref_no;
			$cp->amount = $amount;
			$cp->remarks = $remarks;

			if ($cp->save())
			{
				if( $payment_mode != 0 ) {
					//auto  confirm if not gateway payment
					$regOk = $this->doConfirm($creator_ref, $cp->id);
					//}
					if ($regOk) {

						DB::commit();
						Session::forget('creator');

						return Response::send(Response::bulider()
							->addScript("window.location.href='" . url('success?ref_no=' . $ref_no) . "';")
							->setStatus(ResponseBuilder::$OK)->addErrors($errors)->setMessage('Completed')->build());
					}
				}
				else {
					DB::commit();
					$data = [
						'redirect'           => url( 'payment/redirect' ),
						'cancel'             => url( 'payment/cancel' ),
						'amount'			 => 1, //$amount,
						'orderId'			 => $cp->id,
					];
					return View::make('ccavenue.ccavRequestHandler', $data ) ;
				}
			}

		return Response::send(Response::bulider()->setStatus(ResponseBuilder::$FAIL)->setMessage('Failed')->build()) ;
	}
	public function paymentModeOptions( $render = false ) {
		$whereRaw = '';
		$options  = PaymentModes::pairList( 'id', 'name', $whereRaw );
		if ( $render ) {
			return $this->render( $options );
		}

		return $options;
	}

	private function _received() {
		include(base_path() . '/resources/views/ccavenue/Crypto.php');

		$workingKey='8AE20C5CAFE8A1A2A67B90390E7D5751';		//Working Key should be provided here.
		$encResponse = $_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";

//		echo '<pre>' ;
		$received = array() ;
		parse_str($rcvdString, $received) ;
//		print_r($received) ;die;

		return $received ;
	}
	/**
	 * sucucess redirected here after payment
	 */
	public function redirect() {

		$received = $this->_received() ;

		$tid = $received['tracking_id'] ;
		$oid = $received['order_id'] ;

		if( $received['order_status'] ==="Success" || $received['order_status'] ==="Initiated" )
		{
			$payment = Payments::find($received['order_id']) ;
			$creator = $payment->creator_ref ;


			//verify amount with db..
			if( (doubleval($payment->amount) === doubleval($received['amount']))
			|| (doubleval(1.0) === doubleval($received['amount']))
			)
			{
				if( $this->doConfirm($creator, $received['order_id']) )
				{
//					echo $tid . '/'. $oid;
					return redirect('success?ref_no=' . $tid . '/'. $oid) ;
				}
			}

			return $this->cancel($tid . '/' . $oid) ;
		}
		else if( $received['order_status'] === "Aborted")
		{
			$this->cancel($tid . '/' . $oid) ;
		}
		else if( $received['order_status'] === "Failure")
		{
			$this->cancel($tid . '/' . $oid) ;
		}
		else
		{
			$this->cancel($tid . '/' . $oid) ;
		}
	}
	/**
	 * failed redirect here..
	 */
	public function cancel($id = null ) {

		if( ! $id ) {
			$received = $this->_received() ;

			$tid = $received['tracking_id'] ;
			$oid = $received['order_id'] ;
			$id = $tid . '/' . $oid ;
		}
		echo '<script type="application/javascript">window.location.href = "http://fiatscriptura.org/fiats/failed?ref_no=' . $id . '";</script>' ;
	}
        
        public function receipt($id = null) {
            
            $dkey = urldecode($id) ;
            $regNo = Crypt::decrypt($dkey, FIAT_PASS ) ;
                        
	    $mem = DB::table( DB::raw( 'members AS m' ) )
			->select( DB::raw( 'p.date as payment_date, m.*,m.ack_dt as ack_dt, l.name AS language ' ) )
			->leftJoin( 'languages AS l', 'l.id', '=', 'm.language_id' )
			->leftJoin( 'payments AS p', 'p.id', '=', 'm.payment_id' )
			->where( 'm.reg_no', '=', $regNo )
			->first();


            if( $mem ) 
            {
                $data = [
                    'member' => $mem
                ];
                return View::make('payment.receipt', $data ) ;
            }
        }
}