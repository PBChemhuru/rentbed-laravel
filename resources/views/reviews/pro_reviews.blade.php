<x-layout>

<form style="width:100%; height:fit-content" action="/reviews/pro_reviews" method="POST">
  @csrf
  <h1>Reviews</h1>
<div>
<label for="Review" style="font-size: 40px;font-weight:700">Leave a review</label><br><br>
<textarea name="review" style="width:70%; height: 120px;; float:left; margin-left:30px; font-size:32px"></textarea>
@error('review')
        <p style="color: red; font-size:25px; margin-top:2px" >{{$message}}</p>
@enderror
<h2 style="font-size:32px">Rating</h2><i class="fa fa-star" style="color: gold; size:15px"></i>
<select name="rating">
  <option value=" " disabled selected>Select...</option>
  <option value="1">1 Star</option>
  <option value="2">2 Star</option>
  <option value="3">3 Star</option>
  <option value="4">4 Star</option>
  <option value="5">5 Star</option>
</select><br><br>
@error('rating')
        <p style="color: red; font-size:10px; margin-top:2px" >{{$message}}</p>
@enderror
<input type="hidden" name="property_id" ><br><br>
<button style="color: white; background:blue;border: 1px solid grey;border-radius: 5px; font-weight: 900; height: 45pt; width:150pt; margin:15px">Comment</button>
</div>
</form>
<div class="grid-container">
@foreach($reviews as $review):
  <div class="grid-item">
<p>{{$review->r_name}}</p>
<p>{{$review->review}}</p>
<p>{{$review->rating}}</p>
  </div>
@endforeach
</div>

</x-layout>