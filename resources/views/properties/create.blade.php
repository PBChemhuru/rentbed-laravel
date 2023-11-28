<x-layout>
<div><center>
<h2>Property Application Form</h2>
<div style="background-color: cornflowerblue; width:50%; height:fit-content; border: 1px solid grey;border-radius: 5px; ">
<form action="/properties" method="POST" class="form" enctype="multipart/form-data">
@csrf
<label for="property_name" style="margin:15px; font-weight:bold; font-size:35px">Property Name</label><br>
<input type="text" name="property_name" placeholder="Enter Property Name" value="{{old('property_name')}}" style="margin:15px; height:50px;width:65%;font-weight:600; font-size:25px"><br>
@error('property_name')
<p style="color: red; margin-top:1pt">{{$message}}</p>
@enderror
<label for="property_location" style="margin:15px; font-weight:bold; font-size:35px" >Property Location</label><br>
<input type="text" name="property_location" placeholder="Continent,Country,City,Address" value="{{old('property_location')}}" style="margin:15px; height:50px;width:65%;font-weight:600; font-size:25px"><br>
@error('property_location')
<p style="color: red; margin-top:1pt">{{$message}}</p>
@enderror
<label for="property_price" style="margin:15px; font-weight:bold; font-size:35px">Property Price</label><br>
<input type="text" name="property_price" placeholder="Enter Property Price " value="{{old('property_price')}}" style="margin:15px; height:50px;width:65%;font-weight:600; font-size:25px"><br>
@error('property_price')
<p style="color: red; margin-top:1pt">{{$message}}</p>
@enderror
<label for="property_pnumber" style="margin:15px; font-weight:bold; font-size:35px">Phone Number</label><br>
<input type="tel" name="property_pnumber" placeholder="0712345678" value="{{old('phonenumber')}}" style="margin:15px; height:50px;width:65%;font-weight:600; font-size:25px"><br>
@error('property_pnumber')
<p style="color: red; margin-top:1pt">{{$message}}</p>
@enderror
<label for="property_details" style="margin:15px; font-weight:bold; font-size:35px">Property Description</label><br>
<textarea  name="property_details" placeholder="Describe the Property" style="height:300px; width:89%; margin:15px; height:50px;width:65%;font-weight:600; font-size:20px">{{old('property_details')}}</textarea><br><br>
@error('property_details')
<p style="color: red; margin-top:1pt">{{$message}}</p>
@enderror

<input type="file" name="img_name" style="margin:15px; height:50px;width:65%;font-weight:600; font-size:20px"><br><br>
@error('img_name')
<p style="color: red; margin-top:1pt">{{$message}}</p>
@enderror

<button style="color: white; background:blue;border: 1px solid grey;border-radius: 5px; font-weight: 900; height: 45pt; width:150pt; margin:15px">Rent Out</button>
</form>
</div>
</center>
</div>
</x-layout>