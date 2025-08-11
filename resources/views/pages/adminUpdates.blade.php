@include('partials.header', ['title' => 'Manage NOLITC Updates'])
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user="auth()->user()->usertype"></x-adminSidebar>

<section class="container mx-auto p-10 pt-44">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Manage NOLITC Updates</h1>
            <button onclick="openAddModal()" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                Add New Update
            </button>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Updates Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border-b text-left">Image</th>
                        <th class="px-4 py-2 border-b text-left">Title</th>
                        <th class="px-4 py-2 border-b text-left">Date</th>
                        <th class="px-4 py-2 border-b text-left">Status</th>
                        <th class="px-4 py-2 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($updates as $update)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">
                                @if($update->image)
                                    <img src="{{ $update->image_url }}" alt="{{ $update->title }}" class="w-16 h-16 object-cover rounded">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-gray-500 text-xs">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-2 border-b">
                                <div class="font-medium">{{ $update->title }}</div>
                                <div class="text-sm text-gray-600">{{ Str::limit($update->content, 100) }}</div>
                            </td>
                            <td class="px-4 py-2 border-b">{{ $update->formatted_date }}</td>
                            <td class="px-4 py-2 border-b">
                                <span class="px-2 py-1 text-xs rounded-full {{ $update->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $update->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-4 py-2 border-b">
                                <div class="flex space-x-2">
                                    <button onclick="openEditModal({{ $update->id }})" class="text-blue-600 hover:text-blue-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin.updates.toggle') }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="update_id" value="{{ $update->id }}">
                                        <button type="submit" class="text-yellow-600 hover:text-yellow-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.updates.delete') }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this update?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="update_id" value="{{ $update->id }}">
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                No updates found. Add your first update!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Add Update Modal -->
<div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Add New Update</h2>
                <button onclick="closeAddModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form action="{{ route('admin.updates.add') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                    <input type="text" name="title" id="title" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Content *</label>
                    <textarea name="content" id="content" rows="4" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>
                
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date *</label>
                    <input type="date" name="date" id="date" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" accept="image/*" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                
                <div>
                    <label for="facebook_embed" class="block text-sm font-medium text-gray-700">Facebook Embed Code</label>
                    <textarea name="facebook_embed" id="facebook_embed" rows="3" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300" placeholder="Paste your Facebook embed code here" onpaste="debouncedParse(this.value, false)" oninput="debouncedParse(this.value, false)"></textarea>
                    <p class="text-xs text-gray-500 mt-1">Paste the embed code to auto-fill title and date</p>
                    <div id="embed-loading" class="hidden text-xs text-blue-600 mt-1">🔄 Parsing Facebook post...</div>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAddModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Add Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Update Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-8 max-w-2xl w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Edit Update</h2>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                    <label for="edit_title" class="block text-sm font-medium text-gray-700">Title *</label>
                    <input type="text" name="title" id="edit_title" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                </div>
                
                <div>
                    <label for="edit_content" class="block text-sm font-medium text-gray-700">Content *</label>
                    <textarea name="content" id="edit_content" rows="4" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300"></textarea>
            </div>
                
            <div>
                    <label for="edit_date" class="block text-sm font-medium text-gray-700">Date *</label>
                    <input type="date" name="date" id="edit_date" required class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                    <label for="edit_image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="edit_image" accept="image/*" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                    <label for="edit_facebook_embed" class="block text-sm font-medium text-gray-700">Facebook Embed Code</label>
                    <textarea name="facebook_embed" id="edit_facebook_embed" rows="3" class="w-full border p-2 rounded-md focus:outline-none focus:ring focus:border-blue-300" placeholder="Paste your Facebook embed code here" onpaste="debouncedParse(this.value, true)" oninput="debouncedParse(this.value, true)"></textarea>
                    <p class="text-xs text-gray-500 mt-1">Paste the embed code to auto-fill title and date</p>
                    <div id="edit-embed-loading" class="hidden text-xs text-blue-600 mt-1">🔄 Parsing Facebook post...</div>
            </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update
                    </button>
                </div>
        </form>
    </div>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('addModal').classList.remove('hidden');
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
}

function openEditModal(updateId) {
    // Fetch update data and populate form
    fetch(`/admin-updates/${updateId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit_title').value = data.title;
            document.getElementById('edit_content').value = data.content;
            document.getElementById('edit_date').value = data.date;
            document.getElementById('edit_facebook_embed').value = data.facebook_embed || '';
            
            // Update form action
            document.getElementById('editForm').action = `{{ url('/admin-updates') }}/${updateId}`;
            
            document.getElementById('editModal').classList.remove('hidden');
        });
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

// Close modals when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains('fixed')) {
        event.target.classList.add('hidden');
    }
}

// Debounce function to limit API calls
let parseTimeout;
function debouncedParse(embedCode, isEdit = false) {
    clearTimeout(parseTimeout);
    parseTimeout = setTimeout(() => {
        if (isEdit) {
            parseFacebookEmbedEdit(embedCode);
        } else {
            parseFacebookEmbed(embedCode);
        }
    }, 500); // Wait 500ms after user stops typing
}

// Parse Facebook embed and auto-fill title and date (Add Modal)
function parseFacebookEmbed(embedCode) {
    if (!embedCode.trim()) return;
    
    console.log('Parsing Facebook embed:', embedCode);
    
    const loadingIndicator = document.getElementById('embed-loading');
    loadingIndicator.classList.remove('hidden');

    fetch('{{ route("admin.updates.parse-embed") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ facebook_embed: embedCode })
    })
    .then(response => {
        console.log('Response status:', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
        loadingIndicator.classList.add('hidden');
        if (data.success) {
            document.getElementById('title').value = data.title;
            document.getElementById('date').value = data.date;
            document.getElementById('content').value = data.message;
            
            // Show success message
            showNotification('Facebook post data auto-filled successfully!', 'success');
        } else {
            showNotification('Could not parse Facebook post: ' + data.error, 'error');
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        loadingIndicator.classList.add('hidden');
        showNotification('Error parsing Facebook post', 'error');
    });
}

// Parse Facebook embed and auto-fill title and date (Edit Modal)
function parseFacebookEmbedEdit(embedCode) {
    if (!embedCode.trim()) return;
    
    console.log('Parsing Facebook embed (edit):', embedCode);
    
    const loadingIndicator = document.getElementById('edit-embed-loading');
    loadingIndicator.classList.remove('hidden');

    fetch('{{ route("admin.updates.parse-embed") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ facebook_embed: embedCode })
    })
    .then(response => {
        console.log('Response status (edit):', response.status);
        return response.json();
    })
    .then(data => {
        console.log('Response data (edit):', data);
        loadingIndicator.classList.add('hidden');
        if (data.success) {
            document.getElementById('edit_title').value = data.title;
            document.getElementById('edit_date').value = data.date;
            document.getElementById('edit_content').value = data.message;
            
            // Show success message
            showNotification('Facebook post data auto-filled successfully!', 'success');
        } else {
            showNotification('Could not parse Facebook post: ' + data.error, 'error');
        }
    })
    .catch(error => {
        console.error('Fetch error (edit):', error);
        loadingIndicator.classList.add('hidden');
        showNotification('Error parsing Facebook post', 'error');
    });
}

// Show notification function
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-md shadow-lg z-50 ${
        type === 'success' ? 'bg-green-500 text-white' : 
        type === 'error' ? 'bg-red-500 text-white' : 
        'bg-blue-500 text-white'
    }`;
    notification.textContent = message;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>

@include('partials.footer')
