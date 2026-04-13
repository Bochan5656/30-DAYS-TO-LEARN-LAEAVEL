<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-bold">ブログ一覧</h2>
  </x-slot>

  <div class="mx-auto max-w-3xl space-y-4">
    @auth
      <a href="{{ route('posts.create') }}" class="inline-block rounded bg-blue-600 px-4 py-2 text-white">新規作成</a>
    @endauth

    @foreach ($posts as $post)
      <article class="rounded border p-4">
        <h3 class="text-lg font-semibold">
          <a class="text-blue-600 underline" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
        </h3>
        <p class="text-sm text-gray-500">
          by {{ $post->user->name ?? '不明' }} ・ {{ $post->created_at->format('Y-m-d H:i') }}
        </p>
      </article>
    @endforeach

    <div>{{ $posts->links() }}</div>
  </div>
</x-app-layout>
