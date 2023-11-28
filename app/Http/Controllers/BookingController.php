<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    
    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

   public function createbooking(Request $request)
   {
    $formfields=$request->validate(
        [
            'customer_pnumber'=>'required',
            'booking_date'=>['required',Rule::unique('bookings','booking_date')],
            'stay_duration'=>'required',
        ]);
        $formfields['booking_date']=date('Y-m-d', strtotime($request->booking_date));
        $formfields['customer_email']=auth()->user()->email;
        $formfields['customer_name']=auth()->user()->name;
        $propety_id=$request->property_id; 
        $formfields['property_id']=$propety_id;
        $formfields['property_name']=$request->property_name;
        $formfields['user_id']=auth()->user()->id;
        $formfields['property_owner']=$request->property_owner;
        

        Booking::create($formfields);

        return redirect('/')->with('message','Booking has been made');
   }

   public function mybooking()
{
    
    return view('bookings/mybooking', ['bookings' => auth()->user()->bookings()->get()]);

}

public function destroy(Booking $booking)
{   
    if($booking->user_id !=auth()->id())
    {
        abort(403,'Unauthorized Action');
    }

    $booking->delete();
    return redirect('/')->with('message','Booking has been deleted');

}

public function delete(Booking $booking)
{   
    if($booking->property_owner !=auth()->id())
    {
        abort(403,'Unauthorized Action');
    }

    $booking->delete();
    return redirect('/properties/manage')->with('message','Booking has been deleted');

}

public function pbooking(Property $property)
     {
        return view('/bookings/pbooking',['pbookings'=>$property->booking()->get()]);
        
     }



}
