<x-app-layout>
    <x-slot name="header">
        @include('header')
    </x-slot>
    <div class="container mx-auto w-full py-2">
        <div class="container mx-auto w-full p-2 mt-2 text-center text-zinc-700">
            <strong class="ml-4">EDIT PAGE</strong>
        </div>
        
        <div class="grid grid-flow-col justify-center ml-5 mx-auto">
            <form method="POST" action="{{route('exam.update', $id)}}">
                @csrf
                {{ method_field('PUT') }}
                <div class="text-center text-blue-600 my-2">
                    <input class="mx-auto text-center" name="testName" value="{{$testName}}" title="You can edit this"/>
                </div>
                <ol>
                    <div class="grid gap-2 w-full lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-1">
                    @php
                        $questionNumber = 1;
                    @endphp
                    @foreach ($keys as $key)
                        <li class="m-2 p-2 flex flex-col">
                            <div class=" w-full rounded bg-white" title="You can edit this">
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
                <div class="flex flex-wrap justify-center">
                    <div class="text-center my-2">
                        <button class="rounded bg-blue-500 text-white mx-2 p-1" title="Click to save">Update</button>
                    </div>
                </form>
                    <div class="text-center my-2">
                            <form method="POST" action="{{route('exam.destroy', $id)}}" class="" onsubmit="return confirm('Do you really want delete the test: {{$testName}}?')">
                                @csrf
                                @method('DELETE')
                            <button class="rounded bg-red-500 text-white mx-2 p-1" title="Click to delete">
                                Delete</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
