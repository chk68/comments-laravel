<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;

class GuestbookController extends Controller
{
    public function index(Request $request)
    {
        $column = $request->get('column') ?? 'created_at';
        $direction = $request->get('direction') === 'asc' ? 'asc' : 'desc';

        $messages = Guestbook::orderBy($column, $direction)->paginate(3);

        return view('guestbook.index', compact('messages', 'column', 'direction'));
    }

    public function create()
    {
        return view('guestbook.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        $ipAddress = $request->ip();
        $browser = $request->header('User-Agent');

        // Збережіть запис у базі даних
        GuestBook::create([
            'user_name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'text' => $request->input('text'),
            'ip_address' => $ipAddress,
            'browser' => $browser,
        ]);

        return redirect('/guestbook')->with('success', 'Запис успішно додано!');
    }
}
