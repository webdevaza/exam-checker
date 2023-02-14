<x-app-layout>
    <x-slot name="header">
        @include('header')
    </x-slot>
    @include('flash.flash-message')
    <div class="py-12">
        <div class="grid grid-flow-col justify-center ml-5 mx-auto">
            <ol>
                <div class="grid gap-2 w-full lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-1">
                @foreach ($tests as $test)
                    <li class="m-2 p-2 flex flex-col">
                        <div class=" w-full rounded bg-gray-200" title="Click to see details">
                            <div class="flex mx-2" >
                                <a class="p-2 underline text-blue-600" href="{{route('exam.edit', $test->id)}}">#{{$test->id}}&nbsp&nbsp{{$test->testName}}</a>
                            </div>
                        </div>
                    </li>
                @endforeach
                </div>
            </ol>
        </div>
    </div>
</x-app-layout>
