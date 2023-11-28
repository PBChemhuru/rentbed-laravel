<x-layout>
  <div class='propertystuff' style="Margin-top:15px">
    <div style="float: left">
      <div style="float: left;margin-left:50px">
        <img style='width:400px; height:400px;' src='/{{$property->img_name}}'><br><br>
      </div>
      <div style="float: left;margin-left: 15px">
        <h1>{{$property->property_name}}</h1>
        <p>Located:{{$property->property_location}}</p>
        <p>Price at ${{$property->property_price}} per day</p>
          <div style="height:fit-content">
            <p >{{$property->property_details}}</p>
          </div>
      </div>
          
    </div>

    <div class="form" style="float: right;margin-right:240px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
      <form stlye="height:fit-content; width:fit-content;border:15px solid black;"  action="/bookings" method="POST">
      @csrf
      <h1 style="margin-left: 5px;margin-right:5px">Book</h1>
    
      <label for='phonenumber' style="margin-left: 5px">Phone Number</label><br>
      <input type='tel' name='customer_pnumber' placeholder='0712345678' pattern="[0]{1}[7]{1}[0-9]{8}" value="{{old('customer_pnumber')}}" style="height: 20px; width:200px; font-size:20px;margin:5px"><br>
      @error('customer_pnumber')
      <p style="color: red; font-size:25px;margin-top:1px" >{{$message}}</p>
      @enderror
      <label for='bookingdate' style="margin-left: 5px">Booking date</label><br>
      <input type="text" id="datepicker" name="booking_date" value="{{old('booking_date')}}" style="height: 20px; width:200px; font-size:20px;margin:5px"><br>
      @error('booking_date')
      <p style="color: red; font-size:25px; margin-top:2px" >{{$message}}</p>
      @enderror   
      <label for='stayduration' style="margin-left: 5px;margin-right:5px">How many days will you stay</label><br>
      <input type="number" name="stay_duration" value="{{old('stay_duration')}}" style="height: 20px; width:200px; font-size:20px; margin:5px"><br><br>
      @error('stay_duration')
          <p style="color: red; font-size:25px; margin-top:2px" >{{$message}}</p>
      @enderror
      <input type="hidden" name="property_id" value={{$property->id}}>
      <input type="hidden" name="property_name" value={{$property->property_name}}>
      <input type="hidden" name="property_owner" value={{$property->user_id}}>
      <button style="color: white; background:blue;border: 1px solid grey;border-radius: 5px;font-size:30px; font-weight: 900; height: 50px; width:200px; margin:10px">Submit</button>
      </form>
    </div>
  </div>

  <div style="display: inline-block" >
        <div style="display: inline-block" >
            <label for="Review" style="font-size: 40px;font-weight:700">Leave a review</label><br><br>
          <form style="width:100%;" action="/reviews/{{$property->id}}/pro_reviews" method="POST">
            @csrf
          <textarea name="review" style="width:1000px; height: 120px;; float:left; margin-left:30px; font-size:25px"></textarea>
          @error('review')
                  <p style="color: red; font-size:25px; margin-top:2px" >{{$message}}</p>
          @enderror
          <i class="fa fa-star" style="color: gold; size:15px"></i>
          <select name="rating">
            <option value=" " disabled selected>Select...</option>
            <option value="1">1 Star</option>
            <option value="2">2 Star</option>
            <option value="3">3 Star</option>
            <option value="4">4 Star</option>
            <option value="5">5 Star</option>
          </select>
          @error('rating')
                  <p style="color: red; font-size:10px; margin-top:2px" >{{$message}}</p>
          @enderror
          <input type="hidden" name="property_id" value={{$property->id}}>
          <button style="color: white; background:blue;border: 1px solid grey;border-radius: 5px; font-weight: 900; height: 45pt; width:150pt; margin:15px">Comment</button>       
          </form>
        </div>
        <div>
          <p style="display: none">{{$sum=0}}</p>
          <p style="display: none">{{$count=0}}</p>
          @foreach($reviews as $review)
          <div style="text-align: left; width: 80%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);color:black;margin:15px">
            <div style="height:fit-content;width:500px">
              <p style="font-size:15px">{{$review->r_name}}</p>
              <p style=" font-size:15px" >{{$review->post_datetime}}</p>
              <p>{{$review->review}}</p>
              <p>Rating: {{$review->rating}}/5</p>
              <p style="display: none" >{{$count++}}</p>
              <p style="display: none" >{{$sum+=$review->rating}}</p>
              <p style="display: none" >{{$avg_rate=$sum/$count}}</p>
            </div>
          </div>
          @endforeach
        </div>
  </div>
</x-layout>

