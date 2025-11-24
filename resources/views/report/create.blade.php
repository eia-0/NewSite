<x-app-layout class="bg-[#DDE8FF] min-h-screen">
    <div class="max-w-4xl mx-auto p-6">
        <!-- Заголовок и информация о пользователе -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">НАРУШЕНИЙ.НЕТ</h1>
            <div class="flex justify-between items-center mb-6">
                <span class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</span>
            </div>
            
            <!-- Хлебные крошки -->
            <div class="text-left mb-8">
                <nav class="text-sm text-gray-600">
                    <a href="{{ route('reports.index') }}" class="hover:text-gray-900">Главная</a>
                    <span class="mx-2">></span>
                    <span class="text-gray-900">Создание заявления</span>
                </nav>
            </div>
        </div>

        <!-- Форма создания заявления -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Создать заявление</h2>
            
            <form method="POST" action="{{ route('reports.store') }}">
                @csrf
                
                <!-- Номер автомобиля -->
                <div class="mb-6">
                    <label for="number" class="block text-sm font-medium text-gray-700 mb-2">
                        регистрационный номер авто
                    </label>
                    <input type="text" 
                           id="number" 
                           name="number" 
                           required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                </div>
                
                <!-- Описание нарушения -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        описание нарушения
                    </label>
                    <textarea id="description" 
                              name="description" 
                              required 
                              rows="6"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"></textarea>
                </div>
                
                <!-- Кнопки -->
                <div class="flex justify-between items-center">
                    <a href="{{ route('reports.index') }}" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-200">
                        Назад к списку заявлений
                    </a>
                    
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200">
                        создать заявление
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>