<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class PropertyController extends Controller
{
    public function index()
    { 
        $data=Property::all();

        return view('properties.index', 
        [
            'properties'=>$data
        ]
        );
    }

    public function create() 
    {
        return view('properties.create');
    }

    public function search(Request $request) 
    {
        $criteria=$request->search;
        if(is_null($request->min) && is_null($request->max))
        {
        $search=Property::where('property_location','LIKE','%'.$request->search.'%')->get();
        }
        else
        {
           
            $request->validate(
                [
                    'min'=>'required',
                    'max'=>'required'
                ]
                );
                $search=Property::where('property_location','LIKE','%'.$request->search.'%')
                ->wherebetween('property_price',[$request->min,$request->max])->get();

        }
        return view('properties.search',
        [
            'properties'=>$search,
            'criteria'=>$criteria
        ]
    );
    }

    public function ssearch(Request $request) 
    {
        

        $search=Property::where('property_location','LIKE','%'.$request->search.'%')
        ->wherebetween('porperty_price',[$request->min,$request->max])->get();
                
        $criteria=$request->search;
        return view('properties.search',
        [
            'properties'=>$search,
            'criteria'=>$criteria
        ]
    );
    }
    
    public function destroy(Property $property)
    {
        if($property->user_id != auth()->id())
        {
            abort(403,'Unauthorized Action');
        }
            $property->delete();
            return redirect('/')->with('message', 'Property Removed from Catalogue');
    }

    public function show(Property $property)
    {
        return view('properties.show',
        [
            'property'=>$property,'reviews'=>$property->reviews()->get()


        
        ]);
    }

    
    public function store(Request $request)
    {
         $formfields=$request->validate(
            [
                'property_name'=> 'required',
                'property_location'=> ['required',Rule::unique('properties','property_location')],
                'property_price'=> 'required',
                'property_pnumber'=> 'required',
                'property_details'=>'required',
            ]);
               
            if($request->hasFile('img_name'))
            {
                $formfields['img_name']=$request->file('img_name')->move('images', $request->file('img_name')->getClientOriginalName());
            }
            $formfields['user_id']= auth()->user()->id;
            Property::create($formfields);
            
            return redirect('/')->with('message','Property Added to Catalogue');

    }

    public function manage() {

        return view('properties.manage',['properties'=>auth()->user()->properties()->get()]);
        
    }

   public function edit(Property $property)
   {
    return view('properties.edit',['property'=>$property]);
    }
    public function update(Request $request,Property $property)
    {
        if($property->user_id!=auth()->id())
        {
            abort(403,'Unauthorized Action');
        }
        $formfields=$request->validate([
        'property_name'=> 'required',
        'property_location'=> 'required',
        'property_price'=> 'required',
        'property_pnumber'=> 'required',
        'property_details'=>'required',]);

        if($request->hasFile('img_name'))
            {
                $formfields['img_name']=$request->file('img_name')->move('images', $request->file('img_name'));
            }

            $property->update($formfields);

            return back()->with('message', 'Listing updated successfully!');
        
     
     }

     public function reviews(Property $property)
     {
         return view('/reviews/pro_reviews',['reviews'=>$property->booking()->get()]);
     
     }

    }


