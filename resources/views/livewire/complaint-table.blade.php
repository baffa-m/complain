<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 p-6 pb-4 bg-green-100 dark:bg-gray-900">

            <label for="table-search" class="sr-only">Search</label>
            <div></div>
            <div class="flex space-x-3 items-center">
                <select
                    wire:model.live='status'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="">All</option>
                    <option value="active">Unresolved</option>
                    <option value="completed">Resolved</option>
                </select>
            </div>
        </div>

        @isset($complaints)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-green-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Posted
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Session
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $complaint)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="ps-3">
                                <div class="text-base font-semibold dark:text-blue-500 hover:underline"><a href="{{ route('complaints.show', ['complaint' => $complaint] )}}" wire:navigate>{{ $complaint->title }}</a></div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ $complaint->created_at }}
                        </td>
                        @if ($complaint->status == 'completed')
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Completed
                            </div>
                        </td>
                        @else
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{ $complaint->session }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>Pending
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $complaints->links() }}
        @endisset

        @isset($all_complaints)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-green-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Complaint
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Student
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Posted
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Session
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_complaints as $complaint)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="ps-3">
                                <div class="text-base font-semibold dark:text-blue-500 hover:underline"><a href="{{ route('complaints.show', ['complaint' => $complaint] )}}" wire:navigate>{{ $complaint->title }}</a></div>
                            </div>
                        </th>
                        <td class="text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="ps-3">
                                <div class="text-base font-semibold dark:text-blue-500 hover:underline"><a href="{{ route('complaints.show', ['complaint' => $complaint] )}}" wire:navigate>{{ $complaint->user->name }}</a></div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $complaint->created_at }}
                        </td>
                        <td class="text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $complaint->session }}
                        </td>
                        @if ($complaint->status == 'completed')
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Completed
                            </div>
                        </td>
                        @else
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>Pending
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-4 px-3">
                <div class="flex">
                    <div class="flex space-x-4 items-center mb-3">
                        <label class="w-32 text-sm font-medium ">Per Page</label>
                        <select wire:model.live='perPage' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
                {{ $all_complaints->links() }}
            </div>
        @endisset
    </div>


</div>
