<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Chat;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $perPage = 25;

        $supportBot = User::find(9999);
        $chats = Chat::conversations()
            ->setPaginationParams(['sorting' => 'desc', 'perPage' => $perPage])
            ->setParticipant($supportBot)
            ->get();

        return view('admin.support.index', compact('chats'));
    }

    public function edit($id)
    {
        $chat = Chat::conversations()->getById($id);

        return view('admin.support.edit', ['chat' => $chat]);
    }

    public function update(Request $request, $id)
    {
        // Support user id - 9999
        $supportBot = User::find(9999);

        $chat = Chat::conversations()->getById($id);

        Chat::message($request->text)
            ->from($supportBot)
            ->to($chat)
            ->send();

        return back();
    }

    public function destroy($id)
    {
        $supportBot = User::find(9999);
        Chat::conversation(Chat::conversations()->getById($id))->removeParticipants([$supportBot]);

        return redirect('admin/support')->with('flash_message', 'Chat deleted!');
    }
}
