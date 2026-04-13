@csrf
<div class="space-y-4">
  <div>
    <label class="block text-sm font-medium">タイトル</label>
    <input name="title" value="{{ old('title', $post->title ?? '') }}"
           class="mt-1 w-full rounded border px-3 py-2" required maxlength="100">
    @error('title')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
  </div>

  <div>
    <label class="block text-sm font-medium">本文</label>
    <textarea name="body" rows="10"
              class="mt-1 w-full rounded border px-3 py-2" required>{{ old('body', $post->body ?? '') }}</textarea>
    @error('body')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
  </div>

  <div class="flex gap-2">
    <button class="rounded bg-blue-600 px-4 py-2 text-white">保存</button>
    <a href="{{ url()->previous() }}" class="rounded bg-gray-200 px-4 py-2">戻る</a>
  </div>
</div>
