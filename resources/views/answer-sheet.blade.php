<x-guest-layout>

    <div class="py-12">
        <div class="flex justify-center mx-auto">
                <div id="examDiv">
                    <div class="m-2 p-2 text-center">
                        <label>{{$testTaker->testName}}</label>
                    </div>
                    @php
                        $qNum = $count;
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
                    <form action="{{route('take-exam.update', $testTaker->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        {{-- the following line are not seen, it is only to send testName and answerKeyId to the back --}}
                        <input type="text" name="testName" value="{{$testTaker->testName}}" hidden>
                        <input type="text" name="keyId" value="{{$keyId}}" hidden>
                        {{-- end of not seen --}}
                        <div class="container w-full justify-center">
                            <div class="grid gap-2 xl:grid-cols-{{$colNum}} lg:grid-cols-{{$qNum <= 50 ? $colNum : 4}} md:grid-cols-{{$qNum <= 50 ? $colNum : 3}} sm:grid-cols-{{$qNum <= 50 ? $colNum : 2}} xs:grid-cols-1">
                                @for ($j = 1; $j <= $colNum; $j++)
                                <div class="flex flex-col justify-start text-center">
                                    <div class="flex flex-wrap justify-center ml-7">
                                        <label class="mx-2">A</label>
                                        <label class="mx-2">B</label>
                                        <label class="mx-2">C</label>
                                        <label class="mx-2">D</label>
                                    </div>
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
</x-guest-layout>
