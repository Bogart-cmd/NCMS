@include('partials.header', ['title'=> 'Program Management'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="admin-content lg:ml-64 ml-0 pt-20 lg:pt-24 px-3 lg:px-6 min-h-screen bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Program Management</h1>
            <p class="text-gray-600 text-sm lg:text-base">Manage training programs and their content</p>
        </div>

        <!-- Action Bar -->
        <div class="flex items-center justify-between mb-6">
            <div class="text-xl sm:text-2xl font-bold text-[#168753]">
                Programs
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('programs_addform') }}" class="bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Program
                </a>
            </div>
        </div>

        <!-- Programs Grid -->
        <div class="mt-8">
            @if(isset($programs) && $programs->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
                    @foreach($programs as $program)
                        <div class="bg-white rounded-lg shadow-sm border p-4 flex flex-col hover:shadow-md transition-shadow">
                            <div class="h-32 sm:h-40 lg:h-48 overflow-hidden rounded-md mb-3">
                                <img src="{{ $program->img_name ? asset('assets/img/' . $program->img_name) : asset('image-website/program 1.png') }}" alt="{{ $program->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-[#168753] font-bold text-lg sm:text-xl mb-2">{{ $program->name }}</h3>
                                <p class="text-sm text-gray-600 mb-2">{{ $program->hours }} hours</p>
                                <p class="text-sm text-gray-700 line-clamp-3">{{ $program->caption }}</p>
                            </div>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <a href="{{ route('see_more_program', ['id' => $program->id]) }}" class="bg-white border border-[#168753] text-[#168753] font-semibold px-3 py-1.5 rounded-md hover:bg-[#168753] hover:text-white transition text-sm">See more</a>
                                <a href="{{ route('updateContent', ['id' => $program->id]) }}" class="bg-blue-600 text-white px-3 py-1.5 rounded-md hover:bg-blue-700 transition text-sm">Edit</a>
                                <form method="POST" action="{{ route('delete.programs') }}" onsubmit="return confirm('Delete this program?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="delete_id" value="{{ $program->id }}" />
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1.5 rounded-md hover:bg-red-700 transition text-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $programs->links() }}
                </div>
            @else
                <div class="w-full h-[40vh] flex items-center justify-center text-gray-500">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <p class="text-lg font-medium">No programs found</p>
                        <p class="text-sm text-gray-400">Click "Add Program" to create one.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    <style>
        .admin-content {
            transition: all 0.3s ease;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        @media (max-width: 768px) {
            .admin-content {
                padding-top: 5rem;
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
        }
    </style>
</main>

@include('partials.footer')
