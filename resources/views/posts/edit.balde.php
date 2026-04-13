<x-app-layout>
  <x-slot name="header"><h2 class="text-xl font-bold">投稿を編集</h2></x-slot>
  <div class="mx-auto max-w-3xl">
    <form method="POST" action="{{ route('posts.update', $post) }}">
      @method('PUT')
      @include('posts._form', ['post' => $post])
    </form>
  </div>
</x-app-layout>
