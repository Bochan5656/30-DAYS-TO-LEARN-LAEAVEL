<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
  </x-slot>

  <div class="mx-auto max-w-3xl space-y-4">
    <p class="text-sm text-gray-500">
      by {{ $post->user->name ?? '不明' }} ・ {{ $post->created_at->format('Y-m-d H:i') }}
    </p>
    <div class="prose max-w-none whitespace-pre-wrap">{{ $post->body }}</div>


    @env('local')
    <p class="text-xs text-gray-500">
        post class: {{ get_class($post) }}
    </p>
    <p class="text-xs text-gray-500">
        can update? {{ auth()->user()?->can('update', $post) ? 'YES' : 'NO' }}
        (auth: {{ auth()->id() }}, owner: {{ $post->user_id }})
    </p>
    @endenv

    @can('update', $post)
      <div class="flex gap-2">
        <a href="{{ route('posts.edit', $post) }}" class="rounded bg-amber-500 px-3 py-2 text-white">編集</a>
        <form method="POST" action="{{ route('posts.destroy', $post) }}"
              onsubmit="return confirm('削除しますか？')">
          @csrf @method('DELETE')
          <button class="rounded bg-red-600 px-3 py-2 text-white">削除</button>
        </form>
      </div>
    @endcan

  </div>
</x-app-layout>
