<x-layout>
    <div class="space-y-6 max-w-2xl mx-auto p-10">
        <div class="bg-gray-800 rounded-lg p-8 shadow-xl">
            
            {{-- Flash messages --}}
            @if (session('success')) <p class="mb-4 text-sm text-green-400">{{ session('success') }}</p> @endif
            @if (session('error')) <p class="mb-4 text-sm text-red-400">{{ session('error') }}</p> @endif
            @if (session('warning')) <p class="mb-4 text-sm text-yellow-400">{{ session('warning') }}</p> @endif
            @error('email') <p class="mb-4 text-sm text-red-400">{{ $message }}</p> @enderror

            {{-- Form Section --}}
            <div class="pb-8 border-b border-white/10">
                @if (count($emails) < 5)
                    <form method="POST" action="/formtest" class="space-y-4">
                        @csrf
                        <label for="email" class="block text-sm font-medium text-white">Add New Email</label>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="grow rounded-md bg-white/5 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:outline-indigo-500">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                    placeholder="juandelacruz@umindanao.edu.ph" 
                                    class="block w-full bg-transparent py-2 px-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm" />
                            </div>
                            <button type="submit" class="shrink-0 rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400 transition">
                                Save Email
                            </button>
                        </div>
                    </form>
                @else
                    <p class="text-sm text-yellow-400 bg-yellow-400/10 p-3 rounded border border-yellow-400/20">
                        Limit reached (5 max). Delete an entry to add more.
                    </p>
                @endif
            </div>

            {{-- Email list Section --}}
            <div class="mt-8">
                <h2 class="text-lg font-semibold text-white mb-4">Saved Emails</h2>
                <ul class="divide-y divide-white/5">
                    @forelse ($emails as $email)
                        <li class="py-3 flex items-center justify-between">
                            <span class="text-sm text-gray-200">{{ $email }}</span>
                            <form method="POST" action="/formtest/delete">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <button type="submit" class="text-xs font-medium text-red-400 hover:text-red-300 transition">
                                    Delete
                                </button>
                            </form>
                        </li>
                    @empty
                        <li class="py-3 text-sm text-gray-500 italic">No emails yet.</li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</x-layout>
