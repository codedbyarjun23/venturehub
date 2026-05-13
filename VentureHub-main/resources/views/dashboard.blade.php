<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gradient from-indigo-400 via-purple-400 to-pink-400 leading-tight drop-shadow-sm text-glow">
            {{ __('Networking Feed') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10 relative z-10 pb-20">
        
        <!-- Flash Message -->
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="mb-6 bg-green-500/10 border border-green-500/30 text-green-300 px-6 py-4 rounded-2xl relative shadow-[0_0_20px_rgba(34,197,94,0.15)] backdrop-blur-md" role="alert">
                <span class="block sm:inline font-semibold tracking-wide">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Pitch Idea Form -->
        <div class="glass-panel rounded-3xl p-8 relative group">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl pointer-events-none"></div>
            
            <h3 class="text-2xl font-bold text-gray-50 mb-8 flex items-center relative z-10 tracking-wide">
                <div class="w-10 h-10 rounded-full bg-indigo-500/20 flex items-center justify-center mr-4 shadow-[0_0_15px_rgba(99,102,241,0.3)]">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                Drop an Idea or Seek Feedback
            </h3>
            
            <form action="{{ route('posts.store') }}" method="POST" class="relative z-10 space-y-6">
                @csrf
                <div class="relative group/input">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500/30 to-purple-500/30 rounded-xl blur opacity-0 group-focus-within/input:opacity-100 transition duration-500"></div>
                    <input type="text" name="title" placeholder="A catchy title..." class="relative w-full rounded-xl border-white/10 bg-[#0b0f19]/60 backdrop-blur-md text-gray-100 placeholder-gray-500 focus:border-indigo-400/50 focus:ring-0 px-5 py-4 text-lg shadow-inner transition-all duration-300">
                </div>
                
                <div class="relative group/textarea" x-data="{ content: '' }">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500/30 to-purple-500/30 rounded-xl blur opacity-0 group-focus-within/textarea:opacity-100 transition duration-500"></div>
                    <textarea x-model="content" name="content" rows="3" placeholder="Describe what you are working on... (Markdown supported)" class="relative w-full rounded-xl border-white/10 bg-[#0b0f19]/60 backdrop-blur-md text-gray-100 placeholder-gray-500 focus:border-indigo-400/50 focus:ring-0 px-5 py-4 pb-8 shadow-inner transition-all duration-300 resize-none"></textarea>
                    <div class="absolute bottom-3 right-4 text-xs font-medium transition-colors" :class="content.length > 1000 ? 'text-red-400' : 'text-gray-500'">
                        <span x-text="content.length"></span> / 1000
                    </div>
                </div>
                
                <div class="relative group/input">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500/30 to-purple-500/30 rounded-xl blur opacity-0 group-focus-within/input:opacity-100 transition duration-500"></div>
                    <input type="text" name="tags" placeholder="Tags (e.g. SaaS, Design, Feedback)..." class="relative w-full rounded-xl border-white/10 bg-[#0b0f19]/60 backdrop-blur-md text-gray-100 placeholder-gray-500 focus:border-indigo-400/50 focus:ring-0 px-5 py-3 text-sm shadow-inner transition-all duration-300">
                </div>
                
                <div class="flex justify-end pt-2">
                    <button type="submit" class="relative inline-flex items-center justify-center px-8 py-3.5 text-base font-bold text-white transition-all duration-300 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full hover:from-indigo-500 hover:to-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#0b0f19] focus:ring-indigo-500 shadow-[0_0_20px_rgba(99,102,241,0.4)] hover:shadow-[0_0_30px_rgba(168,85,247,0.6)] hover:-translate-y-0.5">
                        Broadcast Pitch
                        <svg class="w-5 h-5 ml-2 -mr-1 animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Feed List -->
        <div class="space-y-8">
            @foreach ($posts as $post)
                <div class="glass-card rounded-3xl p-8 glass-hover relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/10 rounded-full mix-blend-screen filter blur-[40px] opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                    
                    <div class="flex items-center justify-between mb-8 relative z-10">
                        <div class="flex items-center space-x-5">
                            <div class="relative">
                                <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full blur opacity-40 group-hover:opacity-70 transition duration-500"></div>
                                <div class="relative h-14 w-14 rounded-full bg-[#0b0f19] border border-white/10 flex items-center justify-center text-white font-bold text-xl shadow-xl overflow-hidden">
                                    @if ($post->user->profile_image)
                                        <img src="{{ Storage::url($post->user->profile_image) }}" alt="{{ $post->user->name }}" class="w-full h-full object-cover">
                                    @else
                                        <span class="text-gradient from-indigo-400 to-purple-400">{{ substr($post->user->name, 0, 1) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-xl text-gray-100 transition-colors hover:text-indigo-400 tracking-wide">
                                    <a href="{{ route('network.show', $post->user) }}">{{ $post->user->name }}</a>
                                </h4>
                                <p class="text-sm text-indigo-300/70 font-medium">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative z-10 pl-2">
                        <h5 class="text-2xl font-extrabold text-white mb-4 tracking-tight leading-snug">{{ $post->title }}</h5>
                        <div class="text-gray-300/90 leading-relaxed text-lg mb-4 font-light prose prose-invert prose-indigo max-w-none">
                            {!! Str::markdown(htmlspecialchars($post->content)) !!}
                        </div>
                        
                        @if($post->tags->isNotEmpty())
                            <div class="flex flex-wrap gap-2 mb-8">
                                @foreach($post->tags as $tag)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-300 border border-indigo-500/20">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <div class="mb-8"></div>
                        @endif

                        <!-- Comments Section -->
                        <div class="border-t border-white/5 pt-6 mt-6" x-data="{ liked: {{ $post->likes->contains(auth()->id()) ? 'true' : 'false' }}, likesCount: {{ $post->likes->count() }}, bookmarked: {{ $post->bookmarks->contains(auth()->id()) ? 'true' : 'false' }} }">
                            <div class="flex items-center justify-between mb-5">
                                <h6 class="text-sm font-semibold text-gray-400 flex items-center uppercase tracking-wider">
                                    <svg class="w-5 h-5 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    Feedback ({{ $post->comments->count() }})
                                </h6>
                                <div class="flex items-center space-x-4">
                                    <button @click="
                                        fetch('{{ route('posts.like', $post) }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            }
                                        }).then(res => res.json())
                                          .then(data => {
                                              liked = data.liked;
                                              likesCount = data.likes_count;
                                          })
                                    " class="flex items-center space-x-2 text-sm font-semibold transition-colors duration-300" :class="liked ? 'text-pink-400' : 'text-gray-400 hover:text-pink-400'">
                                        <svg class="w-6 h-6 transition-transform duration-300 hover:scale-110 active:scale-95" :fill="liked ? 'currentColor' : 'none'" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                        <span x-text="likesCount" class="text-lg"></span>
                                    </button>
                                    
                                    <button @click="
                                        fetch('{{ route('posts.bookmark', $post) }}', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            }
                                        }).then(res => res.json())
                                          .then(data => bookmarked = data.bookmarked)
                                    " class="flex items-center space-x-2 text-sm font-semibold transition-colors duration-300" :class="bookmarked ? 'text-indigo-400' : 'text-gray-400 hover:text-indigo-400'">
                                        <svg class="w-6 h-6 transition-transform duration-300 hover:scale-110 active:scale-95" :fill="bookmarked ? 'currentColor' : 'none'" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="space-y-4 mb-8">
                                @foreach ($post->comments as $comment)
                                    <div class="bg-white/[0.02] rounded-2xl p-5 text-base flex space-x-4 border border-white/5 hover:bg-white/[0.04] transition-colors">
                                        <span class="font-bold text-indigo-400 shrink-0">{{ $comment->user->name }}:</span>
                                        <span class="text-gray-300 leading-relaxed">{{ $comment->content }}</span>
                                    </div>
                                @endforeach
                            </div>
                            
                            <form action="{{ route('comments.store', $post) }}" method="POST" class="flex space-x-4">
                                @csrf
                                <div class="relative flex-1 group/reply">
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-full blur opacity-0 group-focus-within/reply:opacity-100 transition duration-500"></div>
                                    <input type="text" name="content" required placeholder="Share your insight..." class="relative w-full rounded-full border-white/10 text-gray-100 bg-[#0b0f19]/80 backdrop-blur-sm focus:bg-[#0b0f19] focus:ring-0 focus:border-purple-400/50 px-6 py-3.5 transition-all shadow-inner text-base">
                                </div>
                                <button type="submit" class="bg-white/5 text-purple-300 hover:bg-purple-600 hover:text-white border border-purple-500/30 px-8 py-2 rounded-full font-bold transition-all duration-300 shadow-[0_0_15px_rgba(168,85,247,0.1)] hover:shadow-[0_0_20px_rgba(168,85,247,0.4)] hover:-translate-y-0.5">
                                    Reply
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            
            @if($posts->isEmpty())
                <div class="text-center py-20 glass-panel rounded-3xl border-dashed border-white/20">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-indigo-500/10 mb-6 shadow-[0_0_30px_rgba(99,102,241,0.2)]">
                        <svg class="h-10 w-10 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-100 mb-2">No pitches have landed yet</h3>
                    <p class="text-gray-400 text-lg">The stage is yours. Pitch an idea to the community!</p>
                </div>
            @endif

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
