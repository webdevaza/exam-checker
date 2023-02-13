<x-app-layout>
    <x-slot name="header">
        @include('header')
    </x-slot>

    <div class="py-12">
        <div class="flex justify-center mx-auto">
                <div id="examDiv">
                    <div class="m-2 p-2 text-center">
                        <label>{{$examDetails[0]}}</label>
                    </div>
                    @php
                        $qNum = $examDetails[1];
                        $qNo = 1;
                        $interval = 10;
                        $colNum = 1;
                        
                        if ($qNum == 10) {
                            $interval = 10;
                            $colNum = 1;
                        }
                        elseif ($qNum == 15) {
                            $interval = 15;
                            $colNum = 1;
                        }
                        elseif ($qNum == 20) {
                            $interval = 10;
                            $colNum = 2;
                        }
                        elseif ($qNum == 25) {
                            $interval = 5;
                            $colNum = 5;
                        }
                        elseif ($qNum == 30) {
                            $interval = 6;
                            $colNum = 5;
                        }

                        $rowNum = $interval;
                    @endphp
                    <form action="{{route('exam.store')}}" method="post">
                        @csrf
                        @method('post')
                        {{-- the following line is not seen, it is only to send testName to the back --}}
                        <input type="text" name="testName" value="{{$examDetails[0]}}" hidden>
                        <div class="container w-full justify-center">
                            <div class="grid gap-2 lg:grid-cols-{{$colNum}} md:grid-cols-4 sm:grid-cols-1">
                                @for ($j = 1; $j <= $colNum; $j++)
                                <div class="flex flex-col">
                                    @for ($i = $qNo; $i <= $rowNum; $i++)
                                        <div class="justify-center align-middle mx-3">
                                            <label class="mr-2">{{$i < 10 ? "*".$i : $i}}</label>
                                            <input class=" m-1 checked:text-black" type="radio" name="{{$i}}" value="A" required>
                                            <input class=" m-1 checked:text-black" type="radio" name="{{$i}}" value="B" required>
                                            <input class=" m-1 checked:text-black" type="radio" name="{{$i}}" value="C" required>
                                            <input class=" m-1 checked:text-black" type="radio" name="{{$i}}" value="D" required>
                                        </div>
                                    @endfor
                                    <hr class="h-5">
                                    @php
                                        $qNo += $interval;
                                        $rowNum = $qNo + $interval-1;
                                    @endphp
                                </div>
                                @endfor
                            </div>
                            <div class="flex justify-center m-3">
                                <button id="exam-add" class="bg-cyan-200 rounded py-1 px-2 border border-solid border-teal-600">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
