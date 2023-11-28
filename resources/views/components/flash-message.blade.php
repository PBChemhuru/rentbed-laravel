@if(session()->has('message'))
<div x-data="{show:true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="postion:fixed; top:0; background-colour:blue; colour:white; padding-top=5px; padding-bottom=5px">
<p style=d>{{session('message')}}</p>
</div>
@endif