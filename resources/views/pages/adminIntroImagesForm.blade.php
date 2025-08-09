@include('partials.header', ['title'=> 'Add Intro Image'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 flex flex-col gap-y-8">
    <x-alertmessage></x-alertmessage>
    <div class="text-2xl font-black text-[#168753] pt-5 pl-5">
        Add New Intro Image
    </div>
    
    <div class="pl-5 pr-5">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-md">
            <form action="{{ route('add_intro_images') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                    <input type="number" id="order" name="order" min="0" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex gap-4">
                    <button type="submit" class="bg-[#168753] text-white px-4 py-2 rounded-md hover:bg-green-900">
                        Add Image
                    </button>
                    <a href="{{ route('intro_images') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

@include('partials.footer')


