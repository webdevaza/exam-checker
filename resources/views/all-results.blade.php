<x-app-layout>
    <x-slot name="header">
        @include('header')
    </x-slot>
    <div class="container m-1 p-1">
        @include('flash.flash-message')
    </div>
    <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-12 sm:pt-0">
        <table class="w-full text-sm text-gray-500 dark:text-gray-400 text-center">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Full name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Test name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correct answers
                    </th>
                    <th scope="col" class="px-6 py-3">
                        When taken
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{$result->id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$result->userName}}
                        </td>
                        <td class="px-6 py-4">
                            {{$result->fullName}}
                        </td>
                        <td class="px-6 py-4">
                            {{$result->testName}}
                        </td>
                        <td class="px-6 py-4">
                            {{$result->result || $result->result == 0 ? $result->result : 'did not answer'}}
                        </td>
                        <td class="px-6 py-4">
                            {{$result->created_at}}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{route('result.destroy',$result->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <x-delete-icon/>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

