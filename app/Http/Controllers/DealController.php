<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Http\Request;
use Chat;

class DealController extends Controller
{
    public function deal() {
        $deal = Deal::where('user_id', auth()->id())->whereNot('completed')->first();
        if(!$deal) {
            $guarantor = User::find(1337);
            $conversation = Chat::createConversation([
                auth()->user(),
                $guarantor,
            ]);
            $deal = Deal::create([
                'user_id' => auth()->id(),
                'chat_id' => $conversation->id,
            ]);

            Chat::message('Hello from guarantor')
                ->from($guarantor)
                ->to($conversation)
                ->send();
        }

        return view('deal', ['deal' => $deal]);
    }

    public function offer(Request $request) {
        $guarantor = User::find(1337);
        $deal = Deal::findOrFail($request->deal_id);

        $deal->update([
            'info' => $request->info,
            'price' => $request->price
        ]);

        Chat::message('wait wait wait wait')
            ->from($guarantor)
            ->to($deal->chat())
            ->send();

        return back();
    }

    public function sendMessage(Request $request) {
        Chat::message($request->body)
            ->from(auth()->user())
            ->to(Deal::findOrFail($request->deal_id)->chat())
            ->send();

        return back();
    }

    public function join(Invite $invite) {
        if($invite->acctepted) {
            return redirect()->route('home');
        } else {
            $deal_id = $invite->deal_id;
            $invite->delete();
            $deal = Deal::findOrFail($deal_id);
            $guarantor = User::find(1337);
            $deal->chat()->addParticipants([auth()->user()]);
            Chat::message("User ".auth()->user()->name." joined the conversation")
                ->from($guarantor)
                ->to($deal->chat())
                ->send();
            return redirect()->route('deal.show', $deal_id);
        }
    }

    public function invite(Request $request) {
        $user = User::where('email', $request->email)->first();
        $guarantor = User::find(1337);
        $deal = Deal::findOrFail($request->deal_id);

        if($user) {
            Chat::message("User $user->name has been invited")
                ->from($guarantor)
                ->to($deal->chat())
                ->send();

            Invite::create([
                'user_id' => $user->id,
                'from_id' => auth()->id(),
                'deal_id' => $deal->id,
            ]);

            $deal->update(['invited' => true]);
        } else {
            Chat::message("Can't find user with email $request->email")
                ->from($guarantor)
                ->to($deal->chat())
                ->send();
        }

        return back();
    }

    public function show(Deal $deal) {
        if(Chat::conversation($deal->chat())->getParticipation(auth()->user())) {
            return view('deal', ['deal' => $deal]);
        } else {
            return redirect()->home();
        }
    }

    public function payed(Deal $deal) {
        $deal->update(['payed' => true]);
        $guarantor = User::find(1337);

        Chat::message("Wait for admin")
            ->from($guarantor)
            ->to($deal->chat())
            ->send();

        return back();
    }
}
