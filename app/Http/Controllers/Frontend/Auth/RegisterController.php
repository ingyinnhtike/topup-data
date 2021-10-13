<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Package\Package;
use App\Models\Client\Message\Message;
use App\Models\Order\Order;
use Carbon\Carbon as Carbon;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        // Where to redirect users after registering
        $this->redirectTo = route('frontend.index');

        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|mixed
     */
    protected function guard()
    {
        return Auth::guard('client');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterRequest $request)
    {
        //dd("Hello You reached your edited area!");
        
       
        //dd($user);
        if (config('client-access.users.confirm_email')) {
//            
            $user = $this->user->register($request->all());
//            event(new UserRegistered($user));
            $packages = $packages = Package::where('name','New Company User Promotion')->get();
            
            if($packages->count() > 0){
              /*** Add Free SMS Credit for new user ***/
                //creating order to add free sms
                $newUserPromotionOrder = new Order();
                $newUserPromotionOrder->package_id = $packages[0]->id;
                $newUserPromotionOrder->company_id = $user->company_id;
                $newUserPromotionOrder->payment_complete = 1;
                $newUserPromotionOrder->status = 1;
                $newUserPromotionOrder->total = $packages[0]->number_of_sms;;
                $newUserPromotionOrder->payment_method = 'free';
                $newUserPromotionOrder->expire_at = Carbon::now()->addMonth(6);
                $newUserPromotionOrder->save();
                //dd($newUserPromotionOrder);

                // $orderId = $newUserPromotionOrder->id;            
                // //add sms amount with completed order
                // $freeSmsCreditMessage = new Message();
                // $freeSmsCreditMessage->order_id = $orderId;
                // $freeSmsCreditMessage->company_id = $user->company_id;
                // $freeSmsCreditMessage->number_of_sms = $packages[0]->number_of_sms;
                // $freeSmsCreditMessage->expiry_date = Carbon::now()->addMonth(6);
                // $freeSmsCreditMessage->is_expired = 0;  
                // $freeSmsCreditMessage->used = 0;
                // $freeSmsCreditMessage->package_id = $packages[0]->id;
                // $freeSmsCreditMessage->save();  
            
                
            }
            
            return redirect($this->redirectPath())->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.created_confirm'));
        } else {
            auth()->guard('client')->login($this->user->register($request->all()));
//            event(new UserRegistered(auth()->guard('client')->user()));

            return redirect($this->redirectPath());
        }
    }
    
    public function testAddingFreeSms()
    {   
//        dd("You reached your test adding free SMS functin");
        $packages = Package::where('name','New Company User Promotion')->get();
        
        
        /*** Add Free SMS Credit for new user ***/
            //creating order to add free sms
            $newUserPromotionOrder = new Order();
            $newUserPromotionOrder->package_id = $packages[0]->id;
            $newUserPromotionOrder->company_id = 2;
            $newUserPromotionOrder->payment_complete = 1;
            $newUserPromotionOrder->status = 2;
            $newUserPromotionOrder->total = $packages[0]->number_of_sms;;
            $newUserPromotionOrder->payment_method = 'free';
            $newUserPromotionOrder->expire_at = Carbon::now()->addMonth(6);
            $newUserPromotionOrder->save();
            //dd($newUserPromotionOrder);
            
            $orderId = $newUserPromotionOrder->id;            
            //add sms amount with completed order
            $freeSmsCreditMessage = new Message();
            $freeSmsCreditMessage->order_id = $orderId;
            $freeSmsCreditMessage->company_id = 2;
            $freeSmsCreditMessage->number_of_sms = $packages[0]->number_of_sms;
            $freeSmsCreditMessage->expiry_date = Carbon::now()->addMonth(6);
            $freeSmsCreditMessage->is_expired = 0;
            $freeSmsCreditMessage->used = 0;
            $freeSmsCreditMessage->package_id = $packages[0]->id;
            $freeSmsCreditMessage->save();  
            
            dd("Run save of order and package");
            
            
    }
    
    
}
