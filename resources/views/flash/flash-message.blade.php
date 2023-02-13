@if ($message = Session::get('success'))
<div class="w-full p-2 m-4 text-center bg-green-300 rounded" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
		<strong class="text-green-800 font-bold">{{ $message }}</strong>
</div>
@endif