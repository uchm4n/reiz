<table class="min-w-800 divide-y divide-gray-200">
    <thead class="bg-gray-50">

    <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            ID
        </th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Url
        </th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Created At
        </th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Selectors
        </th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Actions
        </th>

    </tr>

    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($data as $job)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$job->id}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$job->url}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$job->selectors}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{$job->created_at}}
            </td>
            <td class="px-6 py-4">
                <button class="flex items-center" wire:click="delete({{ $job->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor" data-slot="icon" class="w-5 h-5">
                        <path fill-rule="evenodd"
                              d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>
            </td>
        </tr>
    @endforeach
    <!-- More rows... -->
    </tbody>
</table>
