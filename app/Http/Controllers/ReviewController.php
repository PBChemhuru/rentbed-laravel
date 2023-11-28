<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Property;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $formfield=$request->validate(
            [
                'review'=>'required',
                'rating'=>'required',
            ]);

            $formfield['property_id']=$request->property_id;
            $formfield['user_id']=auth()->user()->id;   
            $formfield['r_name']=auth()->user()->name;
            $formfield['post_datetime']=date('Y-m-d'); 


            Review::create($formfield);

            return redirect('/')->with('message','Comment added');
    }

    public function show(Property $property)
    {
        return view('/reviews/pro_reviews',['reviews'=>$property->reviews()->get()]);
      
    }
}
