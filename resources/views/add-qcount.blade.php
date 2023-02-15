<x-app-layout>
    <x-slot name="header">
        @include('header')
    </x-slot>
    <div class="py-12">
        <div class="flex justify-center mx-auto">
                <div id="countDiv">
                   <form action="{{route('add-exam')}}" method="POST">
                    @csrf
                    @method('POST')
                        <div class="m-2 p-2">
                            <label>Exam name:   <input class="rounded h-8 w-30" type="text" name="examName" value="{{old('examName')}}" autocomplete="off" placeholder="Type the test's name" required></label>
                        </div>
                        <div class="m-2 p-2">
                            <label>Number of questions:   
                                <select id="qCount" class="rounded h-10 w-20" type="number" name="qCount" value="{{old('qCount')}}" required>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                </select>
                            </label>
                        </div>
                        <div class="flex justify-center">
                            <button id="count-add" class="bg-cyan-200 rounded py-1 px-2 border border-solid border-teal-600">Add</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
