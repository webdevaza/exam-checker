<x-app-layout>
    <div class="py-12">
        <div class="flex justify-center mx-auto">
                <div id="countDiv">
                   <form action="{{route('take-exam.create')}}" method="GET">
                    @csrf
                    @method('GET')
                        <div class="m-2 p-2">
                            <label>Username:   <input class="rounded h-8 w-30" type="text" name="userName" value="{{old('userName')}}" autocomplete="off" placeholder="Type your username" required></label>
                        </div>
                        <div class="m-2 p-2">
                            <label>Full name:   <input class="rounded h-8 w-30" type="text" name="fullName" value="{{old('fullName')}}" autocomplete="off" placeholder="Type your full name" required></label>
                        </div>
                        <div class="m-2 p-2">
                            <label>Choose a test:   
                                <select id="chosenExam" class="rounded h-10 mx-auto" type="number" name="testName" value="{{old('testName')}}" required>
                                    <option value="" selected disabled hidden>Choose one</option>
                                    @foreach ($testNames as $testName)
                                        <option value="{{$testName->testName}}">{{$testName->testName}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="flex justify-center">
                            <button id="count-add" class="bg-cyan-200 rounded py-1 px-2 border border-solid border-teal-600">Start</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
