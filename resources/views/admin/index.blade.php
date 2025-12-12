<x-app-layout class="bg-[#DDE8FF] min-h-screen">
    <div class="max-w-7xl mx-auto p-4 md:p-6">
        <!-- Заголовок -->
        <div class="text-center mb-6 md:mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">НАРУШЕНИЙ.НЕТ</h1>
            <h2 class="text-lg md:text-xl text-gray-700">Панель администратора</h2>
        </div>

        <!-- Контейнер для таблицы -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="hidden md:block">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 lg:px-6 py-3 text-left text-sm font-semibold text-gray-700">Дата</th>
                            <th class="px-4 lg:px-6 py-3 text-left text-sm font-semibold text-gray-700">ФИО подавшего</th>
                            <th class="px-4 lg:px-6 py-3 text-left text-sm font-semibold text-gray-700">Номер автомобиля</th>
                            <th class="px-4 lg:px-6 py-3 text-left text-sm font-semibold text-gray-700">Описание</th>
                            <th class="px-4 lg:px-6 py-3 text-left text-sm font-semibold text-gray-700">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr class="border-b hover:bg-gray-50">
                                <!-- Дата -->
                                <td class="px-4 lg:px-6 py-3 text-sm text-gray-900 whitespace-nowrap">
                                    {{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i')}}
                                </td>
                                
                                <!-- ФИО -->
                                <td class="px-4 lg:px-6 py-3 text-sm text-gray-900">
                                    {{ $report->user->lastname ?? '' }} {{ $report->user->name ?? '' }} {{ $report->user->middlename ?? '' }}
                                </td>
                                
                                <!-- Номер автомобиля -->
                                <td class="px-4 lg:px-6 py-3 text-sm text-gray-900 font-mono whitespace-nowrap">
                                    {{ $report->license_plate ?? $report->number ?? 'Не указан' }}
                                </td>
                                
                                <!-- Описание заявления -->
                                <td class="px-4 lg:px-6 py-3 text-sm text-gray-700">
                                    <div class="max-w-xs truncate" title="{{ $report->description ?? 'Текст отсутствует' }}">
                                        {{ $report->description ?? 'Текст отсутствует' }}
                                    </div>
                                </td>
                                
                                <!-- Статус -->
                                <td class="px-4 lg:px-6 py-3">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($statuses as $status)
                                            <form action="{{ route('reports.status.update', $report->id) }}" method="POST" class="status-form">
                                                @method('PATCH')
                                                @csrf
                                                <input type="hidden" name="status_id" value="{{ $status->id }}">
                                                <button type="submit" 
                                                        class="px-2 py-1 text-xs rounded border transition duration-200 
                                                               {{ $status->id === $report->status_id 
                                                                  ? 'bg-blue-500 text-white border-blue-500' 
                                                                  : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' }}">
                                                    {{ $status->name }}
                                                </button>
                                            </form>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @if($reports->count() === 0)
                            <tr>
                                <td colspan="5" class="px-4 lg:px-6 py-6 text-center text-gray-500">
                                    Заявки отсутствуют
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Мобильная версия (карточки) -->
            <div class="md:hidden">
                @if($reports->count() === 0)
                    <div class="px-4 py-8 text-center text-gray-500">
                        Заявки отсутствуют
                    </div>
                @else
                    <div class="divide-y">
                        @foreach($reports as $report)
                            <div class="p-4">
                                <!-- Шапка карточки -->
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $report->user->lastname ?? '' }} {{ $report->user->name ?? '' }}
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            {{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i')}}
                                        </div>
                                    </div>
                                    <div class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">
                                        {{ $report->license_plate ?? $report->number ?? 'Не указан' }}
                                    </div>
                                </div>
                                
                                <!-- Описание -->
                                <div class="mb-3">
                                    <div class="text-xs text-gray-600 font-medium mb-1">Описание:</div>
                                    <div class="text-sm text-gray-700 line-clamp-2">
                                        {{ $report->description ?? 'Текст отсутствует' }}
                                    </div>
                                </div>
                                
                                <!-- Статусы -->
                                <div>
                                    <div class="text-xs text-gray-600 font-medium mb-2">Статус:</div>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($statuses as $status)
                                            <form action="{{ route('reports.status.update', $report->id) }}" method="POST" class="status-form">
                                                @method('PATCH')
                                                @csrf
                                                <input type="hidden" name="status_id" value="{{ $status->id }}">
                                                <button type="submit" 
                                                        class="px-2 py-1 text-xs rounded border transition duration-200 
                                                               {{ $status->id === $report->status_id 
                                                                  ? 'bg-blue-500 text-white border-blue-500' 
                                                                  : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' }}">
                                                    {{ $status->name }}
                                                </button>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>