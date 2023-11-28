<x-layout>
    
    <center>
    @unless($pbookings->isEmpty())
    <div class="table" style="width: 100%; margin: 5px; border-color:white" >
    <table>
      <tr><td style="border: none"><h1> Booking</h1></td></tr>
      <tr>
        <th style="width:14%;font-size:30pt">Booking Code</th>
        <th style="width:24%;font-size:30pt">Customer Name</th>
        <th style="width:14%;font-size:30pt">Customer Phone</th>
        <th style="width:24%;font-size:30pt">Booking Date</th>
        <th style="width:14%;font-size:30pt">Stay Duration</th>
        <th style="width:14%;font-size:30pt">Location</th>
    </tr>
    @foreach ($pbookings as $booking)
    <tr>
      <td style="font-size:20pt">{{$booking->id}}</td>
      <td style="font-size:20pt">{{$booking->customer_name}}</td>
      <td style="font-size:20pt">{{$booking->customer_pnumber}}</td>
      <td style="font-size:20pt">{{$booking->booking_date}}</td>
      <td style="font-size:20pt">{{$booking->stay_duration}}</td>
      
      <td>
        <form action='/bookings/{{$booking->id}}/delete' method='POST'>
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
      </div>
    </center>
    @endunless

</div>
</div>
    </center>
  </x-layout>
  