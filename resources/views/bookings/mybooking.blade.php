<x-layout >
    
      @unless($bookings->isEmpty())
      <div class="table" style="width: 100%;">
      <table>
        <tr>
        <th style="width:14%;font-size:30pt">Booking Code</th>
        <th style="width:24%;font-size:30pt">Customer Name</th>
        <th style="width:14%;font-size:30pt">Customer Phone</th>
        <th style="width:24%;font-size:30pt">Booking Date</th>
        <th style="width:14%;font-size:30pt">Stay Duration</th>
        <th style="width:14%;font-size:30pt">Location</th>
      </tr>
      @foreach ($bookings as $booking)
      <tr>
        <td style="font-size:20pt">{{$booking->id}}</td>
        <td style="font-size:20pt">{{$booking->customer_name}}</td>
        <td style="font-size:20pt">{{$booking->customer_pnumber}}</td>
        <td style="font-size:20pt">{{$booking->booking_date}}</td>
        <td style="font-size:20pt">{{$booking->stay_duration}}</td>
        <td style="font-size:20pt"><a href="/properties/{{$booking->property_id}}">{{$booking->property_name}}</a></td>
        <td>
          <form action='/bookings/{{$booking->id}}' method='POST'>
          @csrf
          @method('DELETE')
          <button style="color: red; background:white;border: 1px solid grey;border-radius: 5px; font-weight: 900;font-size:15px; height: 40pt; width:100pt; margin:5px"><i class="fa fa-trash"></i>Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
      @else
      <center>
        <div style="background-color: cornflowerblue; width:710px; height:400px; border: 1px solid grey;border-radius: 5px; margin:15px">
          <h1 style="font-size: 60px">No Bookings Found</h2>
          <a style="font-size: 40px">Check out our catalogue?</a><a href="/" style="font-size: 40px">RentaBed</a>
        </div>
      </center>
      @endunless

  </div>
  </div>
    </x-layout>
    