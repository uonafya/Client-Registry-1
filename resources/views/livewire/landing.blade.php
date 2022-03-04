{{-- <div>
    If your happiness depends on money, you will never be happy with yourself.
</div> --}}

<div>
    <div>
        <br>
    </div>
    <style>
        table{
            background-color: white;
        }
    </style>
    <table class="table min-w-full mb-4">
        <thead>
        <tr>
            <th wire:click="sortByColumn('name')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                Patient First Name
                @if ($sortColumn == 'fname')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                @endif
            </th>
            <th wire:click="sortByColumn('name')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                Patient Middle Name
                @if ($sortColumn == 'mname')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                @endif
            </th>
            <th wire:click="sortByColumn('name')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                Patient Last Name
                @if ($sortColumn == 'lname')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                @endif
            </th>
            <th wire:click="sortByColumn('price')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                DOB
                @if ($sortColumn == 'dob')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                @endif
            </th>
            <th wire:click="sortByColumn('description')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                Residency
                @if ($sortColumn == 'residency')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                @endif
            </th>
            <th wire:click="sortByColumn('category_name')" class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                Facility
                @if ($sortColumn == 'facility')
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
                <input wire:model="searchColumns.mname" type="text" placeholder="Search..."
                       class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400" />
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                <input wire:model="searchColumns.lname" type="text" placeholder="Search..."
                       class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400" 
                       style="width: 105px" />
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                <input wire:model="searchColumns.dob" type="number"
                       class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400"
                       style="width: 85px" />
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                <input wire:model="searchColumns.description" type="text" placeholder="Search..."
                       class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400" />
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                <select wire:model="searchColumns.product_category_id"
                        class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-1 focus:outline-none focus:border-blue-400">
                    <option value="">-- choose facility --</option>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}">{{ $category }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->price }}.02.09 </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ Str::limit($product->description, 50) }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->category->name ?? '' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</div>