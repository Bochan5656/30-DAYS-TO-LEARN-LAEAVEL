<x-app-layout>
  <x-slot name="header"><h2 class="text-xl font-bold">新規投稿</h2></x-slot>
  <div class="mx-auto max-w-3xl">
    <form method="POST" action="{{ route('posts.store') }}">
      @include('posts._form')
    </form>
  </div>
</x-app-layout>
