<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class ReportController extends Controller
{
public function index(Request $request)
{
    $sort = $request->input('sort');
    if($sort != 'asc' && $sort != 'desc'){
        $sort = 'desc';
    }

    $status = $request->input('status');
    $validate = $request->validate([
        'status' => "exists:statuses,id"
    ]);

    if($validate){
        $reports = Report::where('status_id', $status)
            ->orderBy('created_at', $sort)
            ->paginate(2);
    } else {
        $reports = Report::orderBy('created_at', $sort)
            ->paginate(2);
    }

    $statuses = Status::all();

    return view('report.index', compact('reports','statuses','sort','status'));
}

    public function destroy(Report $report){
        $report -> delete();
        return redirect()->back();
    }

    public function store(Request $request, Report $report){
        $data = $request -> validate([
            'number' => 'string',
            'description' => 'string',
        ]);

        //Добавляю
        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;

        $report -> create($data);
        return redirect()->back();
    }

    public function edit(Report $report){
        return view('report.edit', compact('report'));
    }
    
    public function update(Request $request, Report $report){
        $data = $request->validate([
            'number' => 'string',
            'description' => 'string',
        ]);
        
        $report->update($data);
        return redirect()->route('reports.index');
    }
}