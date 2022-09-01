<?php

namespace App\Http\Controllers;

use App\Models\BookingList;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = BookingList::whereDate('start_time', $request->start_time)
				->whereDate('end_time', $request->end_time)
				->get(['id', 'purpose', 'date', 'start_time', 'end_time']);
			return response()->json($data);
		}
		return view('full-calendar');
	}
}
