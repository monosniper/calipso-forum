<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wallet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="profile-block p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Replenish balance
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                trc-20 network
                            </p>
                        </header>
                        <form method="post" action="{{ route('profile.replenish') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('post')

                            <div>
                                <x-text-input type="text" class="mt-1 block w-full" readonly value="dfggg09594yt94ugu4095gu4" />
                            </div>

                            <div>
                                <x-input-label for="transaction_number" value="Transaction number" />
                                <x-text-input required type="text" class="mt-1 block w-full" name="transaction_number" placeholder="Transaction number" />
                                <x-input-error :messages="$errors->get('transaction_number')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>Payed</x-primary-button>

                                @if (session('status'))
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ session('status') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="profile-block p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Transactions history
                        </h2>
                    </header>
                    @foreach($transactions as $transaction)
                        <div class="transaction">
                            <div class="transaction__left">
                                <div class="transaction__status">Success <span class="crypto">from {{ $transaction->from }}</span></div>
                                <div class="transaction__amount">{{ $transaction->amount }} {{ $transaction->currency }}</div>
                            </div>
                            <div class="transaction__type">Type: {{ $transaction->type }}</div>
                            <div class="transaction__date">{{ $transaction->created_at->toDayDateTimeString() }}</div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
