<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Создать заявление</h1>
    
    <form method="POST" action="{{ route('reports.store') }}">
        @csrf
        
        <div>
            <label for="number">Номер автомобиля:</label>
            <input type="text" id="number" name="number" required>
        </div>
        
        <div>
            <label for="description">Описание заявки:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        
        <button type="submit">Создать</button>
    </form>

    <a href="{{ route('reports.store') }}">Назад к списку заявлений</a>
</body>
</html>