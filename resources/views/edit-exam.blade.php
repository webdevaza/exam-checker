<x-app-layout>
    <x-slot name="header">
        @include('header')
    </x-slot>
    <div class="container mx-auto w-full py-12">
        <div class="text-center text-blue-600 my-2">
            <strong>{{$testName}}</strong>
        </div>
        <div class="grid grid-flow-col justify-center ml-5 mx-auto">
            <form method="POST" action="{{route('exam.update', $id)}}">
                @csrf
                {{ method_field('PUT') }}
                <ol>
                    <div class="grid gap-2 w-full lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-1">
                    @php
                        $questionNumber = 1;
                    @endphp
                    @foreach ($keys as $key)
                        <li class="m-2 p-2 flex flex-col">
                            <div class=" w-full rounded bg-gray-200" title="Click to see details">
                                <div class="flex mx-2" >
                                    <label class="p-2 underline text-blue-600">#{{$questionNumber}}</label>
                                    <input class="w-12 bg-transparent border-0" type="text" name="{{$questionNumber}}" value="{{$key}}" required>
                                </div>
                            </div>
                        </li>
                        @php
                            $questionNumber++;
                        @endphp
                    @endforeach
                    </div>
                </ol>
                <div class="text-center my-2">
                    <button class="rounded bg-blue-500 text-white mx-2 p-1">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
