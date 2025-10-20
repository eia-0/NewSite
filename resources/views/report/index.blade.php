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
            <div>
                Описание нарушения: {{$report->status->name}}
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
    {{ $reports->links() }}
    <div>
        <span>Сортировка по дате создания: </span>
        <a href="{{ route('reports.index', ['sort' => 'desc']) }}">
            сначала новые
        </a>
        <a href="{{ route('reports.index', ['sort' => 'asc']) }}">
            сначала старые
        </a>
    </div>
    <div>
        <p>Фильтрация по статусу заявки</p>
        <ul>
            @foreach ($statuses as $status)
                <li>
                    <a href="{{ route('reports.index', ['status' => $status->id]) }}">
                        {{ $status->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>