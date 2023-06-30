<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\User;
use Illuminate\Http\Request;
use Chat;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $perPage = 25;

        $deals = Deal::latest()->paginate($perPage);

        return view('admin.deals.index', compact('deals'));
    }

    public function edit($id)
    {
        $deal = Deal::findOrFail($id);

        return view('admin.deals.edit', ['deal' => $deal]);
    }

    public function update(Request $request, $id)
    {
        $guarantor = User::find(1337);
        if($request->type === 'wallet') {
            $deal = Deal::findOrFail($id);
            $deal->update($request->only('wallet'));
            Chat::message("$$deal->price -> $request->wallet")
                ->type('pay')
                ->from($guarantor)
                ->to($deal->chat())
                ->send();
        } else {
            $deal = Deal::findOrFail($id);
            $deal->update([
                'completed' => $request->completed === 'on'
            ]);

            if($deal->completed) {
                Chat::message($deal->info)
                    ->from($guarantor)
                    ->to($deal->chat())
                    ->send();
            }
        }

        return redirect('admin/deals')->with('flash_message', 'Deal updated!');
    }
}
