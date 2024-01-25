<?php

namespace App\Http\Controllers;
use DB;
use Auth;

use App\Models\Futbol5;
use App\Models\Futbol7;
use App\Models\Futbolrap;
use App\Models\User;
use App\Models\Promo;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;


class PaymentController extends Controller
{
    

    private $apiContext;

    public function __construct()
 	{
 		$payPalConfig = Config::get('paypal');

 		$this->apiContext = new ApiContext(
        new OAuthTokenCredential(
            $payPalConfig['client_id'],$payPalConfig['secret']
        )
		);

 	}
 	public function payWithPayPal()
 	{
 		//return "Hola";
 		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$amount = new Amount();
		$amount->setTotal('1.00');
		$amount->setCurrency('USD');

		$transaction = new Transaction();
		$transaction->setAmount($amount);

		$callbackUrl= url('/paypal/status');
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($callbackUrl)
		    ->setCancelUrl($callbackUrl);

		$payment = new Payment();
		$payment->setIntent('sale')
		    ->setPayer($payer)
		    ->setTransactions(array($transaction))
		    ->setRedirectUrls($redirectUrls);
		

		try {
		    $payment->create($this->apiContext);
		    //echo $payment;
		    return redirect()->away($payment->getApprovalLink());
		    //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
		}
		catch (PayPalConnectionException $ex) {
		    echo $ex->getData();
		}
	}
	public function payPalStatus(Request $request)
	{
		$paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal/failed')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente. Y podes verlo en tus codigos.';
            return redirect()->back();
            return redirect('/home')->with('status',$status);
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/home')->with('failed',$status);
	}

	/* ------------------------------STRIPE---------------------------------------*/

	public function checkoutStripe(Request $request)
    {   
        \Stripe\Stripe::setApiKey('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');
       	
        if ( ($request->session()->get('canchaReservaPendiente')) == 'futbol5' ) 
    	{	
			$amount = 100;
			$amount *= 40;
	        $amount = (int) $amount;
		} 
		elseif ( ($request->session()->get('canchaReservaPendiente')) == 'futbol7' ) 
		{
    		$amount = 100;
			$amount *= 60;
        	$amount = (int) $amount;
		}
		elseif ( ($request->session()->get('canchaReservaPendiente')) == 'futbolrap' ) 
		{
    		$amount = 100;
			$amount *= 20;
        	$amount = (int) $amount;
		}

        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Payment',
			'amount' => $amount,
			'currency' => 'EUR',
			'description' => 'Payment From Client',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('credit-card',compact('intent'));

    }

    public function afterPaymentStripe(Request $request)
    {
    	$status = 'Gracias! El pago a través de Stripe se ha ralizado correctamente y has reservado tu horario.';

    	if ( ($request->session()->get('canchaReservaPendiente')) == 'futbol5' ) 
    	{	
    		//Futbol5::where('user_id', Auth::user()->id)->where('fecha', ($request->session()->get('fechaReservaPendiente')))->where('hora', ($request->session()->get('horaReservaPendiente')))->update(['pagado' => 1]);
    		Futbol5::create(['user_id' => Auth::user()->id, 'fecha' => ($request->session()->get('fechaReservaPendiente')), 'hora' => ($request->session()->get('horaReservaPendiente')), 'pagado' => 1]);
		} 
		elseif ( ($request->session()->get('canchaReservaPendiente')) == 'futbol7' ) 
		{
    		//Futbol7::where('user_id', Auth::user()->id)->where('fecha', ($request->session()->get('fechaReservaPendiente')))->where('hora', ($request->session()->get('horaReservaPendiente')))->update(['pagado' => 1]);
    		Futbol7::create(['user_id' => Auth::user()->id, 'fecha' => ($request->session()->get('fechaReservaPendiente')), 'hora' => ($request->session()->get('horaReservaPendiente')), 'pagado' => 1]);
		}
		elseif ( ($request->session()->get('canchaReservaPendiente')) == 'futbolrap' ) 
		{
    		//Futbolrap::where('user_id', Auth::user()->id)->where('fecha', ($request->session()->get('fechaReservaPendiente')))->where('hora', ($request->session()->get('horaReservaPendiente')))->update(['pagado' => 1]);
    		Futbolrap::create(['user_id' => Auth::user()->id, 'fecha' => ($request->session()->get('fechaReservaPendiente')), 'hora' => ($request->session()->get('horaReservaPendiente')), 'pagado' => 1]);    		
		}

      	$request->session()->forget('canchaReservaPendiente');
      	$request->session()->forget('fechaReservaPendiente');
      	$request->session()->forget('horaReservaPendiente');
        return redirect()->route('home')->with('status',$status);
    }

    /* ------------------------------STRIPE---------------------------------------*/
}
