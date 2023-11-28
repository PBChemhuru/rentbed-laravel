<x-layout>
    <center><h1>Search Results for {{$criteria}}</h1></center>
<div style="width:1000px">
    <div style="width:300px;float:left;margin:30px">
        <h1 style="border:none;outline:none;text-decoration:none;color: white;background-color: #2196F3;width:300px;">Filter</h1>
        <form action='/search'>
        @csrf
        <label for='search' style="font-size: 30px">Country or City</label><br>
        <input type='text' name='search' placeholder='Country or City' value="{{$criteria}}" style="height: 50px; width:300px; font-size:20px"><br>
        
        <p style="margin-top:10px;margin-bottom:5px;font-size: 30px" >Price Range</p>
        <div style="display: inline-block">
        <label for='min' >Min</label><br>
        <input type='number' name='min' placeholder='E.g 200' value="{{old('min')}}" style="height: 50px; width:300px; font-size:20px"><br>
        @error('min')
        <p style="color: red; font-size:25px;margin-top:1px" >{{$message}}</p>
        @enderror
        </div>
        <div style="display: inline-block">
        <label for='max'>Max</label><br>
        <input type='number' name='max' placeholder='E.g 1000' value="{{old('max')}}" style="height: 50px; width:300px; font-size:20px"><br>
        @error('max')
        <p style="color: red; font-size:25px;margin-top:1px" >{{$message}}</p>
        @enderror
        </div>
        
        <div>
        <button style="color: white; background:#2196F3;border: 1px solid grey;border-radius: 5px; font-weight: 900; height: 35pt; width:300px; margin-top:15px">FILTER</button>
        </div>
        </form>    
    </div>
    <div style="float:left">
        <div class="grid-container" style="width:1400px">
        @foreach($properties as $property)
        <div class='grid-item'>
        <a href="/properties/{{$property->id}}"><img src="/{{$property->img_name}}" style="width:100%;height:100%;"><a>
        <a href="/properties/{{$property->id}}" style="position:absolute;top:0;left:0; font-style:poppins">{{$property->property_name}}</a>
        </div>
        @endforeach
        </div>
    </div>
</div>
</x-layout>