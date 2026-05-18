<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-100 leading-tight">
            Search Results for "<span class="text-indigo-400">{{ $query }}</span>"
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
        
        <!-- People Results -->
        @if($users->isNotEmpty())
        <div>
            <h3 class="text-xl font-bold text-gray-400 mb-6 uppercase tracking-wider">People</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($users as $user)
                    <div class="bg-gray-800/40 rounded-2xl p-6 border border-gray-700/50 flex items-center space-x-4">
                        @if($user->profile_image)
                            <img src="{{ Storage::url($user->profile_image) }}" class="w-16 h-16 rounded-full object-cover">
                        @else
                            <div class="w-16 h-16 rounded-full bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-xl">{{ substr($user->name, 0, 1) }}</div>
                        @endif
                        <div>
                            <a href="{{ route('network.show', $user) }}" class="text-lg font-bold text-white hover:text-indigo-400 transition">{{ $user->name }}</a>
                            <p class="text-sm text-gray-400">{{ Str::limit($user->skills, 50) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Project Results -->
        @if($projects->isNotEmpty())
        <div>
            <h3 class="text-xl font-bold text-gray-400 mb-6 uppercase tracking-wider">Projects</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($projects as $project)
                    <div class="bg-gray-800/40 rounded-2xl p-6 border border-gray-700/50">
                        <a href="{{ route('projects.index') }}" class="text-xl font-bold text-cyan-400 hover:text-cyan-300 transition">{{ $project->title }}</a>
                        <p class="text-gray-300 mt-2">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Post Results -->
        @if($posts->isNotEmpty())
        <div>
            <h3 class="text-xl font-bold text-gray-400 mb-6 uppercase tracking-wider">Posts</h3>
            <div class="space-y-6">
                @foreach($posts as $post)
                    <div class="bg-gray-800/40 rounded-2xl p-6 border border-gray-700/50">
                        <a href="{{ route('dashboard') }}" class="text-lg font-bold text-pink-400 hover:text-pink-300 transition">{{ $post->title }}</a>
                        <p class="text-gray-300 mt-2">{{ Str::limit($post->content, 150) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($users->isEmpty() && $projects->isEmpty() && $posts->isEmpty())
            <div class="text-center py-20 text-gray-500 text-lg">
                No results found for "{{ $query }}".
            </div>
        @endif
    </div>
</x-app-layout>
