@props(['sort','status'])
<!-- Фильтры и сортировка -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <!-- Сортировка -->
    <div class="mb-4">
        <span class="text-sm font-medium text-gray-700">Сортировка по дате создания: </span>
        <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => $status]) }}" 
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200 mr-2">
            сначала новые
        </a>
        <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => $status]) }}" 
           class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200">
            сначала старые
        </a>
    </div>

    <!-- Фильтрация -->
    <div>
        <p class="text-sm font-medium text-gray-700 mb-2">Фильтрация по статусу заявки</p>
        <div class="flex flex-wrap gap-2">
            @foreach ($statuses as $statusItem)
                <a href="{{ route('reports.index', ['status' => $statusItem->id, 'sort' => $sort]) }}" 
                   class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200">
                    {{ $statusItem->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>