<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('reports.create') }}">Создать заявление</a>
    @foreach ($reports as $report)
        <div class="card">
            <div class="number-car">
                Номер автомобиля: {{$report->number}}
            </div>
            <div class="inform">
                Описание нарушения: {{$report->description}}
            </div>
            <div class="time">
                Время:
            </div>
            <a href="{{ route('reports.edit', $report->id) }}">Редактировать</a>
            
            <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
                @method('delete')
                @csrf
                <input type="submit" value="Удалить">
            </form>
        </div>
    @endforeach
</body>
</html>