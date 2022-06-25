<?php

namespace App\Http\Controllers;

use App\Events\ToggleVideoPlayer;
use App\Models\Chat;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store()
    {
        $data = request()->validate([
            'username' => ['required', 'max:255'],
            'url' => ['required', 'max:255', 'url'],
        ]);

        Cache::remember(
            'username',
            now()->addDays(30),
            function () use ($data) {
                return $data['username'];
            });

        $chat = new Chat();
        $chat->save();

        $room = new Room();
        $room->url = $data['url'];
        $room->chat_id = $chat->id;
        $room->save();

        return redirect('/room/' . $room->id);
    }

    public function show(Room $room)
    {
        $username = Cache::get('username', 'username');

        return view('rooms.show', compact('room', 'username'));
    }

    public function toggleVideoPlayer(Request $request)
    {
        event(new ToggleVideoPlayer($request->get('status')));
    }

    public function getStatus()
    {

    }
}
