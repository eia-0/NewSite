<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Редактирование заявления</h1>

    <form method="POST" action="{{route('report.update', $report->id)}}">
    @cserf
    @method('put')

    <div>
    <label for="number">Номер автомобиля:</label>
    <input type="text" id="number" name="number" value="{{ $report->number }}" required>
    </div>

    <div>
    <label for="description">Описание заявки:</label>
    <textarea id="description" name="description" required>{{ $report->description }}</textarea>
    </div>

    <button type="submit">Обновить</button>
</form>

    <a href="{{ route('reports.index') }}">Назад к списку заявлений</a>
</body>
</html>