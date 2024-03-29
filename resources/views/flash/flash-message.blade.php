@if ($message = Session::get('saved'))
<div class="w-full p-2 m-4 text-center bg-green-300 rounded" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
		<strong class="text-green-800 font-bold">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('edited'))
<div class="w-full p-2 m-4 text-center bg-blue-400 rounded" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
		<strong class="text-blue-800 font-bold">{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('deleted'))
<div class="w-full p-2 m-4 text-center bg-red-400 rounded" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
		<strong class="text-white font-bold">{{ $message }}</strong>
</div>
@endif

