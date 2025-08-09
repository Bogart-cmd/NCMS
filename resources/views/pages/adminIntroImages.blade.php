@include('partials.header', ['title'=> 'Manage Intro Images'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="w-[86.6%] absolute top-40 left-64 flex flex-col gap-y-8">
    <x-alertmessage></x-alertmessage>
    <div class="text-2xl font-black text-[#168753] pt-5 pl-5">
        Manage Intro Images
    </div>
    
    <!-- Add New Image Button -->
    <div class="pl-5">
        <a href="{{ route('intro_images_form') }}" class="bg-[#168753] text-white px-4 py-2 rounded-md hover:bg-green-900 transition-all duration-300 hover:scale-105 hover:shadow-lg">
            Add New Image
        </a>
    </div>

    <!-- Images List -->
    <div class="pl-5 pr-5">
        @if(count($introImages) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($introImages as $index => $image)
                    <div class="bg-white rounded-lg shadow-md p-4 transform transition-all duration-300 hover:scale-105 hover:shadow-xl" 
                         style="animation: fadeInUp 0.6s ease-out {{ $index * 0.1 }}s both;">
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="{{ asset('assets/img/' . $image->image) }}" alt="Intro Image" 
                                 class="w-full h-48 object-cover rounded-lg transition-transform duration-300 hover:scale-110">
                            <div class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center cursor-pointer transform transition-all duration-200 hover:scale-110 hover:bg-red-600" 
                                 onclick="deleteImage({{ $image->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </div>
                        </div>
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">Order: {{ $image->order }}</p>
                            <p class="text-sm text-gray-600">Status: {{ $image->is_active ? 'Active' : 'Inactive' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 animate-pulse">
                <p class="text-gray-500">No intro images found. Add your first image!</p>
            </div>
        @endif
    </div>
</main>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: .5;
    }
}
</style>

<script>
function deleteImage(imageId) {
    if (confirm('Are you sure you want to delete this image?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("delete_intro_image") }}';
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        
        const imageIdField = document.createElement('input');
        imageIdField.type = 'hidden';
        imageIdField.name = 'intro_image_id';
        imageIdField.value = imageId;
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        form.appendChild(imageIdField);
        
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

@include('partials.footer')
