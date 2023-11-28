<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
     <link rel="icon" type="image/png" href="http://www.favicon.cc/logo3d/430212.png"/>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
    <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
    
</head>
<body>
    <div class="topnav">
        <a class= "active" href="/">HOME</a>
    @auth
     <a href="/bookings/mybooking">Bookings</a>
     <div class='dropdown'>
         <button class="dropdownbtn" onclick="myFunction()">Properties<i class="fa fa-caret-down"></i></button>
         <div class='dropdowncontent' id='myDropdown'>
             <a href="/properties/create">Rent out Property</a>
             <a href="/properties/manage">Manage Properties</a>
         </div>
     </div>
     <a class="spilt">
         <form action="/logout" method="POST">
             @csrf
             <button type="submit" style=" background-color:black;border: none;color: white; height:100%;width:100%; font-size:40px">
               <i class="fas fa-door-closed"></i> Logout</button>
         </form>
     </a>
     
     <a class="signin">Welcome {{auth()->user()->name}}</a>
    @else
        <a href="/users/login" class="signin" >Log In</a>
        <a href="/users/register"class="signin"> Register<i class="fa fa-user"></i></a>
    @endauth  
        <x-flash-message/>
    </div>
    
    <script>
        function myFunction()
        {
            document.getElementById("myDropdown").classList.toggle("show");
        }

    window.onclick=function(e)
    {
        if(!e.target.matches('.dropdownbtn'))
        {
            var myDropdown =document.getElementById("myDropdown");
            if(myDropdown.classList.contains('show'))
            {
                myDropdown.classList.remove('show');
            }
        }

    }
    </script>
    <main>
        {{$slot}}
    </main>
</body>
</html>