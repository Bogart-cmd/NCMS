@include('partials.header', ['title' => 'Update Welcome Content'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user="auth()->user()->usertype"></x-adminSidebar>

<section class="container mx-auto p-10 pt-44">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-4">Update Welcome Content</h1>
        <form action="{{ route('update.admin.updates') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Welcome Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $content->title ?? '') }}" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Welcome Content</label>
                <textarea name="content" id="content" rows="4" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">{{ old('content', $content->content ?? '') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="facebook_embed" class="block text-sm font-medium text-gray-700">Facebook Embed Code</label>
                <textarea name="facebook_embed" id="facebook_embed" rows="3" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300" placeholder="Paste your Facebook embed code here">{{ old('facebook_embed', $content->facebook_embed ?? '') }}</textarea>
                @error('facebook_embed')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Welcome Image</label>
                <input type="file" name="image" id="image" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                @if(isset($content) && $content->img_name)
                    <img src="{{ asset('assets/img/' . $content->img_name) }}" alt="Current Welcome Image" class="mt-2 h-32">
                @endif
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Update Welcome Page</button>
        </form>
    </div>
</section>

@include('partials.footer')
