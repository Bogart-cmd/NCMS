@include('partials.header', ['title'=> 'Manage Partners'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<x-message></x-message>
<style>
/* Responsive admin content */
.admin-content {
    transition: all 0.3s ease;
}

@media (max-width: 1024px) {
    .admin-content {
        margin-left: 0;
    }
}

@media (max-width: 768px) {
    .admin-content {
        padding-top: 3.5rem;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
}

/* Table styling */
td {
    text-align: center;
    padding: 1% 0;
}

/* Responsive table */
@media (max-width: 640px) {
    #partners {
        font-size: 0.75rem;
    }
    
    #partners th,
    #partners td {
        padding: 0.5rem 0.25rem;
    }
    
    #partners img {
        width: 2rem;
        height: 2.5rem;
    }
}

/* Modal responsive */
@media (max-width: 640px) {
    #updatePartnerModal .bg-white {
        margin: 1rem;
        max-width: calc(100% - 2rem);
    }
}
</style>
<main class="admin-content lg:ml-64 ml-0 pt-20 lg:pt-24 px-3 lg:px-6 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-[#168753] mb-2">Manage Partners</h1>
            <p class="text-gray-600 text-sm lg:text-base">Manage your business partners and their information</p>
        </div>
        
        <!-- Partners Table -->
        <div class="bg-white rounded-lg shadow-sm border overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table id="partners" class="w-full">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <th scope="col" class="px-3 py-3 uppercase">#</th>
                        <th scope="col" class="px-3 py-3 capitalize">Logo</th>
                        <th scope="col" class="px-3 py-3 capitalize">Link</th>
                        <th scope="col" class="px-3 py-3 capitalize">Date Created</th>
                        <th scope="col" class="px-3 py-3 capitalize" colspan="2">Action</th>
                    </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($partners as $partner)
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="px-3 py-3 text-sm">{{$i++}}</td>
                        <td class="px-3 py-3">
                            <div class="flex justify-center items-center">
                                <img src="{{'./assets/partners_logo/'.$partner->logo}}" alt="partners logo" class="w-16 h-20 sm:w-20 sm:h-24 lg:w-24 lg:h-28 object-contain rounded">
                            </div>
                        </td>
                        <td class="px-3 py-3 text-sm break-all">{{$partner->link}}</td>
                        <td class="px-3 py-3 text-sm">{{\Carbon\Carbon::parse($partner->created_at)->format('M-d-Y')}}</td>
                        <td class="px-3 py-3">
                            <form action="{{route('delete_partners')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="number" value="{{$partner->id}}" class="hidden" name="partners_id">
                                <button class="w-full bg-red-500 rounded-lg text-white hover:bg-red-900 px-3 py-2 text-sm transition-colors" type="submit">Delete</button>
                            </form>
                        </td>
                        <td class="px-3 py-3">
                            <button type="button" data-partner='@json($partner)' class="update-partner-btn w-full bg-[#168753] rounded-lg text-white hover:bg-green-900 px-3 py-2 text-sm transition-colors">Update</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mb-6">
            {{ $partners->links('vendor.pagination.tailwind') }}
        </div>
        
        <!-- Add Partner Form -->
        <div class="bg-white rounded-lg shadow-sm border p-6">
            <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-4">Add New Partner</h3>
            <form action="{{route('add_partners')}}" method="post" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <input type="file" id="image" class="hidden" name="image">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Partner Logo</label>
                        <div class="w-full h-32 sm:h-40 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center cursor-pointer hover:border-[#168753] transition-colors" onclick="insertImage()">
                            <h3 class="font-medium text-gray-600" id="attach_file">Click to attach image</h3>
                            <img src="" id="img-file" class="hidden max-w-full max-h-full object-contain">
                        </div>
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Partner Link</label>
                        <input type="text" name="link" id="link" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-[#168753] focus:border-transparent px-3 py-2" placeholder="https://example.com" value="">
                        @error('link')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button class="bg-[#168753] text-white px-6 py-2 rounded-lg hover:bg-green-900 transition-colors font-medium" type="submit">Add Partner</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Update Partner Modal -->
    <div id="updatePartnerModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
            <button id="closeUpdateModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">✕</button>
            <h3 class="text-xl font-bold mb-4">Update Partner</h3>
            <form id="updatePartnerForm" action="{{ route('update_partners') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="partners_id" id="update_partners_id">
                <div class="flex flex-col gap-2">
                    <label class="font-semibold">Current Logo</label>
                    <img id="current_logo" src="" alt="Current Logo" class="w-32 h-auto rounded border" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold">Replace Logo (optional)</label>
                    <input type="file" name="image" accept="image/*" class="block w-full" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-semibold">Link</label>
                    <input type="text" name="link" id="update_link" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Link" required>
                </div>
                <div class="flex gap-3 justify-end mt-2">
                    <button type="button" id="cancelUpdateModal" class="px-4 py-2 rounded border">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded bg-[#168753] text-white hover:bg-green-900">Save</button>
                </div>
            </form>
        </div>
    </div>
    
    <style>
        .admin-content {
            transition: all 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .admin-content {
                padding-top: 5rem;
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            
            .partner-logo {
                width: 4rem;
                height: 5rem;
            }
            
            .partner-table {
                font-size: 0.875rem;
            }
        }
    </style>
</main>
<script>
    function insertImage(){
        document.getElementById('image').click();
    }
    const photoInp = $("#image");
        photoInp.change(function (e) {
            if(document.getElementById("image").files.length !== 0 ){
                file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#img-file").attr("src", event.target.result);
                        document.getElementById('attach_file').style.display = 'none';
                        document.getElementById('img-file').style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
</script>
<script>
    // Update Partner modal logic
    const modal = document.getElementById('updatePartnerModal');
    const closeModal = () => modal.classList.add('hidden');
    const openModal = () => modal.classList.remove('hidden');
    document.getElementById('closeUpdateModal').addEventListener('click', closeModal);
    document.getElementById('cancelUpdateModal').addEventListener('click', closeModal);

    document.querySelectorAll('.update-partner-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const partner = JSON.parse(btn.getAttribute('data-partner'));
            document.getElementById('update_partners_id').value = partner.id;
            document.getElementById('update_link').value = partner.link || '';
            document.getElementById('current_logo').src = `/assets/partners_logo/${partner.logo}`;
            openModal();
        });
    });
</script>
@include('partials.footer')
