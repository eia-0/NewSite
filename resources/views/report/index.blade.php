
<x-app-layout>
    <div>
        <span>Сортировка по дате создания: </span>
        <a href="{{ route('reports.index', ['sort' => 'desc', 'status' => request('status')]) }}">
            сначала новые
        </a>
        <a href="{{ route('reports.index', ['sort' => 'asc', 'status' => request('status')]) }}">
            сначала старые
        </a>
    </div>
    <div>
        <p>Фильтрация по статусу заявки</p>
        <ul>
            @foreach ($statuses as $status)
                <li>
                    <a href="{{ route('reports.index', ['status' => $status->id, 'sort' => request('sort', 'desc')]) }}">
                        {{ $status->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

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
                Статус: {{$report->status->name}} {{-- исправлено дублирование --}}
            </div>
            <div class="time">
                Время: {{ $report->created_at->format('d.m.Y H:i') }} {{-- форматирование даты --}}
            </div>
            <a href="{{ route('reports.edit', $report->id) }}">Редактировать</a>
            
            <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
                @method('delete')
                @csrf
                <input type="submit" value="Удалить">
            </form>
        </div>
    @endforeach
    {{ $reports->appends(request()->query())->links() }}
</body>
</x-app-layout>