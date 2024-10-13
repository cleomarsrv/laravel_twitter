<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tweets.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('O que está acontecendo?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Postar') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($tweets as $tweet)
            <div class="p-6 flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $tweet->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{'publicado '}}{{$tweet->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $tweet->message }}</p>
                    
                    <div class="mt-4 bg-white shadow-sm rounded-lg divide-y">
                        @foreach ($tweet->comentarios as $comentario)
                        <div class="comentarios mt-4" style="margin-left: 40px;">
                            <div>
                                <span class="text-gray-800">{{ $comentario->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600"> {{'comentado '}}{{$comentario->created_at->format('d/m/Y H:i')}}</small>
                            </div>
                            <p class="mt-1 text-sm text-gray-800">{{ $comentario->comentario }}</p>
                        </div>
                        @endforeach
                    </div>

                    <form action="{{ route('comentarios.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                        <textarea
                            name="comentario"
                            style="background-color:black; color:white;"
                            placeholder="{{ __('poste seu comentario') }}"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        >{{ old('comentario') }}</textarea>
                        <x-input-error :messages="$errors->get('comentario')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('Comentar') }}</x-primary-button>
                    </form>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</x-app-layout> 
