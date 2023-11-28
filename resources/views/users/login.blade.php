<x-layout>
    <center>
    
        <div style="background-color: cornflowerblue; width:510px; height:800px; border: 1px solid grey;border-radius: 5px; margin:15px">
        <form action="/users/authenticate" method="POST">
            @csrf
            <h1>Log In</h1>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <label for="email" style="margin:15px; font-weight:bold; font-size:35px">Email</label><br>
            <input type="text" name="email" placeholder="Enter Email" value="{{old('email')}}" style="margin:15px; height:50px;width:75%;font-weight:600; font-size:25px">
            @error('email')
            <p style="color: red; margin:1px ">{{$message}}</p>
            @enderror
            <label for="password" style="margin:15px; font-weight:bold; font-size:35px">Password</label><br>
            <input type="password" name="password" placeholder="Enter Password" style="margin:15px; height:50px;width:75%;font-weight:600; font-size:25px">
            @error('password')
            <p style="color: red; margin:1px ">{{$message}}</p>
            @enderror
            <button style="color: white; background:blue;border: 1px solid grey;border-radius: 5px; font-weight: 900; height: 45pt; width:150pt; margin:15px">Log In</button>
            <p style="margin:15px; height:50px;width:75%;font-weight:600; font-size:25px">
              Don't have an account?
              <a href="/users/register" style="margin:15px; height:50px;width:75%;font-weight:600; font-size:25px">Register</a>
            </p>
              </p>
        </form>
        </div>
    </center>
</x-layout>