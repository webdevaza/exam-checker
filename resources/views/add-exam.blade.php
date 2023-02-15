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
                        
                        if ($qNum <= 15) {
                            $interval = 15;
                            $colNum = 1;
                        }
                        elseif ($qNum <= 20) {
                            $colNum = 2;
                        }
                        elseif ($qNum <= 30) {
                            $colNum = 3;
                        }
                        else {
                            $colNum = ceil($qNum/10);
                        }

                        $rowNum = $qNum < $interval ? $qNum : $interval;
                    @endphp
                    <form action="{{route('exam.store')}}" method="post">
                        @csrf
                        @method('post')
                        {{-- the following line is not seen, it is only to send testName to the back --}}
                        <input type="text" name="testName" value="{{$examDetails[0]}}" hidden>
                        <div class="container w-full justify-center">
                            <div class="grid gap-2 lg:grid-cols-{{$colNum}} md:grid-cols-4 sm:grid-cols-1">
                                @for ($j = 1; $j <= $colNum; $j++)
                                <div class="flex flex-col justify-center text-center items-start">
                                    @for ($i = $qNo; $i <= $rowNum; $i++)
                                        <div class="mx-3">
                                            @if ($i < 10)
                                            <label class="mr-2">&nbsp&nbsp{{$i}}</label> 
                                            @else
                                            <label class="mr-2">{{$i}}</label>
                                            @endif
                                            <input class=" m-1 checked:text-black" type="radio" name="{{$i}}" value="A" required>
                                            <input class=" m-1 checked:text-black" type="radio" name="{{$i}}" value="B" required>
                                            <input class=" m-1 checked:text-black" type="radio" name="{{$i}}" value="C" required>
                                            <input class=" m-1 checked:text-black" type="radio" name="{{$i}}" value="D" required>
                                        </div>
                                        @php
                                            $qNo = $i;
                                        @endphp
                                    @endfor
                                    <hr class="h-5">
                                    @php
                                        $qNo += 1;
                                        $rowNum = ($qNum - $qNo) > 10 ? ($qNo + $interval-1) : $qNum;
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
