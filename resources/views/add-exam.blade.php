<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center">
            <a id="addButton" href="/add-exam" class="basis-1 font-semibold cursor-pointer underline text-gray-800 leading-tight my-1 sm:mx-8 mx-auto">
                ADD EXAM
            </a>
            <a id="showStudents" class="basis-1 font-semibold cursor-pointer underline text-gray-800 leading-tight my-1 sm:mx-8 mx-auto">
                Exams
            </a>
            <a id="showStudents" class="basis-1 font-semibold cursor-pointer underline text-gray-800 leading-tight my-1 sm:mx-8 mx-auto">
                Results
            </a>
            <a id="showStudents" class="basis-1 font-semibold cursor-pointer underline text-gray-800 leading-tight my-1 sm:mx-8 mx-auto">
                Students
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-center mx-auto">
                <div id="countDiv">
                    <div class="m-2 p-2">
                        <label>Exam name:   <input class="rounded h-8 w-30" type="text" name="exam-name" value="{{old('exam-name')}}" autocomplete="off" ></label>
                    </div>
                    <div class="m-2 p-2">
                        <label>Number of questions:   <input id="qCount" class="rounded h-8 w-10" type="number" name="count" value="{{old('count')}}" autocomplete="off"></label>
                    </div>
                    <div class="flex justify-center">
                        <button id="count-add" class="bg-cyan-200 rounded py-1 px-2 border border-solid border-teal-600">Add</button>
                    </div>
                </div>
                <div id="examDiv" hidden>
                    <div class="m-2 p-2 text-center">
                        <label>Exam name</label>
                    </div>
                    <div class="grid gap-2 sm:grid-cols-5 grid-cols-1">
                        @for ($i = 1; $i <= 30; $i++)
                            <div class="justify-center align-middle mx-3">
                                <label class="mr-2">{{$i}}</label>
                                <input class=" m-1" type="radio" name="q-{{$i}}">
                                <input class=" m-1" type="radio" name="q-{{$i}}">
                                <input class=" m-1" type="radio" name="q-{{$i}}">
                                <input class=" m-1" type="radio" name="q-{{$i}}">
                            </div>
                        @endfor
                    </div>
                    <div class="flex justify-center m-3">
                        <button id="exam-add" class="bg-cyan-200 rounded py-1 px-2 border border-solid border-teal-600">Submit</button>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
