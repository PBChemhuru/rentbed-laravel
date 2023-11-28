<x-layout>
<div class="hero-image" style="width: 100%;height:500px">
</div>
<center>
<div style="width: 50%; height:50px;margin:10px;padding:10px; ">
<form action="/search" >
@csrf
    <div style="background-color: #2196F3;border:1px solid black;border-radius:10px">
    
        <input style="width:700px;height:50px;display:inline-block;margin-top:10px;margin-bottom:10px;font-size: 30px;border: none;"  type="text" name="search"   placeholder="Where are going?">
        <button style="width:100px;height:50px;display:inline-block;border:none;background-color:#2196F3;font-size: 30px;font-weight:bold" type="submit" >Search</button>
    </div>
</form>
</div>
</center>


<div style="position: absolute;margin-top:50px">
<div class="grid-container" style="position: relative;top:0;">   
    <div class='grid-item'>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=asia"><img src="/images/ed2ebd01ae312319c6540774d0840ff0.jpg" style="width:100%;height:100%;"><a>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=asia" style="position:absolute;top:0;left:0; font-style:poppins">Asia</a>
    </div>
    <div class='grid-item'>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=oceania"><img src="/images/77251128a745bd3e91439943a4014fea.jpg" style="width:100%;height:100%;"><a>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=oceania" style="position:absolute;top:0;left:0; font-style:poppins">Oceania</a>
    </div>  
    <div class='grid-item'>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=South America"><img src="/images/71ac95221dac3a15489238b03edd612a.jpg" style="width:100%;height:100%;"><a>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=South America" style="position:absolute;top:0;left:0; font-style:poppins">South America</a>
    </div>  
    <div class='grid-item'>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=Europe"><img src="/images/4cd7f1eebe966006e77a788a8dfdbe56.jpg" style="width:100%;height:100%;"><a>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=Europe" style="position:absolute;top:0;left:0; font-style:poppins">Europe</a>
    </div>  
    <div class='grid-item'>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=Africa"><img src="/images/dea7abaf924c87c9512f1a70c7bca3c8.jpg" style="width:100%;height:100%;"><a>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=Africa" style="position:absolute;top:0;left:0; font-style:poppins">Africa</a>
    </div>  
    <div class='grid-item'>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=North America"><img src="/images/870266f9fd0b1f51365f3d567f15d579.jpg" style="width:100%;height:100%;"><a>
        <a href="/search?_token=gHoqNrMb8ZV0tmIpJ3ag3U7c8tB2lxDSqlRCxNOV&search=North America" style="position:absolute;top:0;left:0; font-style:poppins">North America</a>
    </div>  
    
</div><br><br>
<div class='hero-image' style="background-image:url(/images/221117160458-06-body-christmas-vacation-queensland-nz.jpeg);width:1900px;height:400px;  background-attachment: fixed;">
    <p style="font-size: 90px;color:white;">TAKE A CHANCE AND EXPLORE</p>
</div>
<div class="grid-container" style="position: relative;top:100px">
    @foreach($properties as $property)
    <div class='grid-item'>
        <a href="/properties/{{$property->id}}"><img src="/{{$property->img_name}}" style="width:100%;height:100%;"><a>
        <a href="/properties/{{$property->id}}" style="position:absolute;top:0;left:0; font-style:poppins">{{$property->property_name}}</a>
    </div>
    @endforeach
    
</div>
</div>

</x-layout>