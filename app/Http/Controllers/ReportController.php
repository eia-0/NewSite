<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if($sort != 'asc' && $sort != 'desc'){
            $sort = 'desc';
        }

        $status = $request->input('status');
        $reportsQuery = Report::where('user_id', Auth::user()->id);

        // Проверяем наличие статуса и что он существует в базе
        if($status && Status::where('id', $status)->exists()) {
            $reportsQuery->where('status_id', $status);
        }

        $reports = $reportsQuery->orderBy('created_at', $sort)
                               ->paginate(2);

        $statuses = Status::all();

        return view('report.index', compact('reports','statuses','sort','status'));
    }

    public function show(Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на просмотр этой записи.');
        }
        
        return view('report.show', compact('report')); // Исправлено reports.show на report.show
    }

    public function destroy(Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на удаление этой записи.');
        }
        
        $report->delete();
        return redirect()->back();
    }

    public function edit(Report $report)
    {
        if (Auth::user()->id === $report->user_id){
            return view('report.edit', compact('report'));
        }
        else{
            abort(403, 'У вас нет прав на редактирование этой записи.');
        }
    }
    
    public function update(Request $request, Report $report)
    {
        if (Auth::user()->id != $report->user_id) {
            abort(403, 'У вас нет прав на обновление этой записи.');
        }
        
        $data = $request->validate([
            'number' => 'string',
            'description' => 'string',
        ]);
        
        $report->update($data);
        return redirect()->route('reports.index');
    }

    public function statusUpdate(Request $request, Report $report)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);
        
        $report->update($request->only(['status_id']));
        return redirect()->back();
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'number' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        Report::create([
            'number' => $request->number,
            'description' => $request->description,
            'status_id' => 1,
            'user_id' => Auth::user()->id,
        ]);
        
        return redirect()->route('dashboard')->with('info', 'Заявление отправлено');
    }
}