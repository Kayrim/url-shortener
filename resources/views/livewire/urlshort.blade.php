    <main class="flex-1 py-10 md:py-16 lg:py-20 xl:py-24">
        <div class="container grid gap-4 px-0 text-center md:px-6 mx-auto">
            <div class="space-y-3">
                <h1 class="text-3xl font-bold tracking-tighter">Shorten your link</h1>
                <p
                    class="mx-auto max-w-[600px] text-gray-400 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                    Enter your long URL below to shorten it
                </p>
            </div>
            <div class="mx-auto flex flex-col gap-2 max-w-lg">
                <form wire:submit.prevent="shortenUrl" class="flex flex-col gap-2">
                    <input type="text" id="url" wire:model="url" placeholder="Enter your URL"
                        class="border border-gray-300 rounded-md min-w-96 p-2 text-black">
                    @error('url')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <button type="submit"
                        class="bg-zinc-950 w-full hover:bg-zinc-900 rounded-md p-2 text-white">Shorten</button>
                </form>
                @session('message')
                    <div class="bg-zinc-950 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                        <p>{{ session('message') }}</p>
                    </div>
                @endsession
                @isset($urls)
                    @if ($urls->isNotEmpty())
                        <h2 class="text-xl font-bold mt-4">Your shortened URLs</h2>
                        <div
                            class="overflow-y-auto max-h-80 gap-2 flex flex-col scrollbar-thin scrollbar-thumb-red-600 scrollbar-thumb-rounded-md scrollbar-track-zinc-800">
                            @foreach ($urls as $url)
                                <div class="flex items-center gap-2 px-1">
                                    <a class="underline bg-white text-gray-500 rounded-md p-2 flex-1"
                                        href="{{ route('redirect.short', $url->shortcode) }}"
                                        target="_blank">{{ route('redirect.short', $url->shortcode) }}</a>
                                    <button class="w-16 bg-zinc-950 hover:bg-zinc-900 rounded-md p-2 text-white"
                                        onclick="navigator.clipboard.writeText('{{ route('redirect.short', $url->shortcode) }}')">Copy</button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endisset
            </div>
        </div>
    </main>
