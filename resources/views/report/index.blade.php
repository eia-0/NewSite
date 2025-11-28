<x-app-layout class="bg-[#DDE8FF] min-h-screen">
    <div class="max-w-6xl mx-auto p-6">
        <!-- Заголовок -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">НАРУШЕНИЙ.НЕТ</h1>
            <h2 class="text-xl text-gray-700">создать заявление</h2>
        </div>

        <!-- Фильтры и сортировка -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <!-- Сортировка -->
            <div class="mb-4">
                <span class="text-sm font-medium text-gray-700">Сортировка по дате создания: </span>
                <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => request('status')]) }}" 
                   class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200 mr-2">
                    сначала новые
                </a>
                <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => request('status')]) }}" 
                   class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200">
                    сначала старые
                </a>
            </div>

            <!-- Фильтрация -->
            <div>
                <p class="text-sm font-medium text-gray-700 mb-2">Фильтрация по статусу заявки</p>
                <div class="flex flex-wrap gap-2">
                    @foreach ($statuses as $status)
                        <a href="{{ route('reports.index', ['status' => $status->id, 'sort' => request('sort', 'desc')]) }}" 
                           class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200">
                            {{ $status->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Кнопка создания заявления -->
        <div class="mb-6">
            <a href="{{ route('reports.create') }}" 
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition duration-200">
                Создать заявление
            </a>
        </div>

        <!-- Список заявлений -->
        <div class="space-y-6 mb-8">
            @foreach ($reports as $report)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <!-- Заголовок карточки -->
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i');}}</h3>
                            <div class="number-car mt-1">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                    {{$report->number}}
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-block bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium">
                                {{$report->status->name}}
                            </span>
                        </div>
                    </div>

                    <!-- Описание -->
                    <div class="inform mb-4">
                        <p class="text-gray-600 leading-relaxed">{{$report->description}}</p>
                    </div>

                    <!-- Кнопки действий -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('reports.edit', $report->id) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200">
                            Редактировать
                        </a>
                        
                        <form method="POST" action="{{ route('reports.destroy', $report->id) }}" class="m-0">
                            @method('delete')
                            @csrf
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition duration-200">
                                Удалить
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Пагинация -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            {{ $reports->appends(request()->query())->links() }}
        </div>

        <!-- Разделитель -->
        <div class="border-t border-gray-300 my-6"></div>

        <!-- Информация о пользователе и кнопка выхода -->
        <div class="flex justify-between items-center">
            <span class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition duration-200">
                    выйти
                </button>
            </form>
        </div>
    </div>
</x-app-layout>