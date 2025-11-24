<x-app-layout class="bg-[#DDE8FF] min-h-screen">
    <div class="max-w-7xl mx-auto p-6">
        <!-- Заголовок -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">НАРУШЕНИЙ.НЕТ</h1>
            <h2 class="text-xl text-gray-700">Панель администратора</h2>
        </div>

        <!-- Таблица заявлений -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Дата</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">ФИО подавшего</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Номер автомобиля</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Описание заявления</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Статус</th>
                    </tr>
                </thead>
                <tbody>

                
                    @foreach($reports as $report)
                        <tr class="border-b hover:bg-gray-50">
                            <!-- Дата -->
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $report->created_at->format('d.m.Y') }}
                            </td>
                            
                            <!-- ФИО -->
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $report->user->lastname ?? '' }} {{ $report->user->name ?? '' }} {{ $report->user->middlename ?? '' }}
                            </td>
                            
                            <!-- Номер автомобиля -->
                            <td class="px-6 py-4 text-sm text-gray-900 font-mono">
                                {{ $report->license_plate ?? $report->number ?? 'Не указан' }}
                            </td>
                            
                            <!-- Описание заявления -->
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $report->description ?? 'Текст отсутствует' }}
                            </td>
                            
                            <!-- Статус -->
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach($statuses as $status)
                                        <form action="{{ route('reports.status.update', $report->id) }}" method="POST" class="status-form">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="status_id" value="{{ $status->id }}">
                                            <button type="submit" 
                                                    class="px-3 py-1 text-xs rounded border transition duration-200 
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
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                Заявки отсутствуют
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>