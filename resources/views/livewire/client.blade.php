<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div>
        <br>
    </div>
    <style>
        table{
            background-color: white;
        }
    </style>
    <table>
        <thead>
            <tr>
                <th wire:click="sortByColumn('name')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                    First Name
                    @if ($sortColumn == 'fname')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th wire:click="sortByColumn('name')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                    Middle Name
                    @if ($sortColumn == 'mname')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th wire:click="sortByColumn('price')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                    Last Name
                    @if ($sortColumn == 'lname')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th wire:click="sortByColumn('description')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                    Id Number
                    @if ($sortColumn == 'id_no')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
                <th wire:click="sortByColumn('category_name')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                    CCC Number
                    @if ($sortColumn == 'CCC_Number')
                        <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                    @else
                        <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                    @endif
                </th>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    <input wire:model="searchColumns.fname" type="text" placeholder="Search..."
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400" />
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    <input wire:model="searchColumns.mname" type="text"
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400"
                           style="width: 75px" />
                    {{-- to --}}
                    {{-- <input wire:model="searchColumns.lname" type="text"
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400"
                           style="width: 75px" /> --}}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    <input wire:model="searchColumns.lname" type="text" placeholder="Search..."
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400" />
                </td>




                {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    <select wire:model="searchColumns.product_category_id"
                            class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400">
                        <option value="">-- choose facility --</option>
                        @foreach($categories as $id => $category)
                            <option value="{{ $id }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </td> --}}
            </tr>
            </thead>
    </table>
</div>
