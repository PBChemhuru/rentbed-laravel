<x-layout>
    

    <h1>Your Properties</h1>
    @if($properties->isEmpty())
    <div style="background-color: cornflowerblue; width:710px; height:400px; border: 1px solid grey;border-radius: 5px; margin:15px">
        <h1 style="font-size: 60px">No Properties Found</h2>
        <a style="font-size: 40px">Rent out a property?</a><a href="/properties/create" style="font-size: 40px">Rent Out</a>
      </div>
    @else
    @foreach ($properties as $property)
    <div class='cards' style="height: 600px;width:1800px;position:Relative" >
        <div style="float: left;position:absolute">
            <img style="width:600px; height:600px" src="/{{$property->img_name}}">
        </div>
        <div style="float:left;margin-left:15px;position:absolute;width:1170px;right:0">
        <h1>{{$property->property_name}}</h1>
        <h2> Located: {{$property->property_location}}</h2>
        <p> Price at $ {{$property->property_price}}/PER NIGHT</p>
        <p style="height:fit-content">{{$property->property_details}}</p>
        </div>
        <div style='position:absolute;bottom:0;right:400px;'>
        <div style='display:inline-block'>
        <div  class='cardsbtn'>
            <button class="cardsbtn"  onclick="window.location.href='/properties/{{$property->id}}}/edit'" ><i class="fa fa-pencil"></i>Amend Property</button>
        </div>
        <div  class='cardsbtn'>
            <button class="cardsbtn" onclick="window.location.href='/bookings/{{$property->id}}}/pbooking'"><i class="fa fa-book"></i> Bookings</button>
        </div>
        </div>
        <div style="display: inline-block">
        <form action ='/properties/{{$property->id}}' method='POST'>
        @csrf
        @method('DELETE')
        <button style="color: red; background:white;border: 1px solid grey;border-radius: 5px; font-weight: 900;font-size:15px; height: 40pt; width:150pt; margin:5px"><i class="fa fa-trash"></i>Delete</button>
        </form>
        </div>
         </div>
         </div
        
        
    </div>
    @endforeach   
    
    @endif
</x-layout>