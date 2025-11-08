<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
</head>
<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold mb-6">Административная панель</h1>
                        
                        @foreach($reports as $report)
                            <div class="mb-8 p-4 border border-gray-200 rounded-lg">
                                <!-- ФИО -->
                                <div class="mb-4">
                                    <h2 class="text-lg font-semibold">ФИО</h2>
                                    <p class="text-gray-700">{{ $report->user->lastname ?? '' }} {{ $report->user->name ?? '' }} {{ $report->user->middlename ?? '' }}</p>
                                </div>

                                <!-- Текст заявления -->
                                <div class="mb-4">
                                    <h2 class="text-lg font-semibold">Текст заявления</h2>
                                    <p class="text-gray-700 whitespace-pre-line">{{ $report->description ?? 'Текст отсутствует' }}</p>
                                </div>

                                <!-- Номер автомобиля -->
                                <div class="mb-4">
                                    <h2 class="text-lg font-semibold">Номер автомобиля</h2>
                                    <p class="text-gray-700">{{ $report->license_plate ?? 'Не указан' }}</p>
                                </div>

                                <!-- Статус с формой -->
                                <div class="mb-4">
                                    <h2 class="text-lg font-semibold">Статус</h2>
                                    <form class="status-form" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <select name="status_id" id="status_id_{{ $report->id }}" class="border border-gray-300 rounded px-3 py-2">
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->id }}" {{ $status->id === $report->status_id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-6">
                        @endforeach

                        @if($reports->count() === 0)
                            <p class="text-gray-500">Заявки отсутствуют</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- Добавьте JS для автоматической отправки формы при изменении статуса -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElements = document.querySelectorAll('.status-form select');
            
            selectElements.forEach(function(select) {
                select.addEventListener('change', function() {
                    this.form.submit(); // Отправляет форму при изменении select
                });
            });
        });
    </script>
</body>
</html>