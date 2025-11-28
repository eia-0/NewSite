<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заявления</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Заголовок -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Редактирование заявления</h1>
            <p class="text-gray-600">Внесите необходимые изменения в данные заявления</p>
        </div>

        <!-- Форма -->
        <form method="POST" action="{{ route('reports.update', $report->id) }}" class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            @csrf
            @method('put')

            <!-- Номер автомобиля -->
            <div class="mb-6">
                <label for="number" class="block text-sm font-medium text-gray-700 mb-2">Номер автомобиля:</label>
                <input type="text" 
                       id="number" 
                       name="number" 
                       value="{{ $report->number }}" 
                       required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200 placeholder-gray-400">
            </div>

            <!-- Описание заявки -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Описание заявки:</label>
                <textarea id="description" 
                          name="description" 
                          required
                          rows="6"
                          class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition duration-200 placeholder-gray-400 resize-vertical">{{ $report->description }}</textarea>
            </div>

            <!-- Кнопки -->
            <div class="flex items-center justify-between mt-8">
                <a href="{{ route('reports.index') }}" 
                   class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 shadow-sm">
                    ← Назад к списку заявлений
                </a>
                
                <button type="submit" 
                        class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 shadow-sm">
                    Обновить заявление
                </button>
            </div>
        </form>
    </div>
</body>
</html>