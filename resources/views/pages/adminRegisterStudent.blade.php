@include('partials.header', ['title'=> 'Register Student'])
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script></script>

<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<main class="admin-content lg:ml-64 ml-0 pt-20 lg:pt-24 px-3 lg:px-6 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-[#168753] mb-2">Registered Students</h1>
            <p class="text-gray-600 text-sm lg:text-base">Manage and filter student registrations</p>
        </div>
        
        <!-- Filter Form -->
        <div class="bg-white rounded-lg shadow-sm border p-4 mb-6">
            <form action="{{route('filter')}}" method="POST">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Program</label>
                        <select name="program" id="course" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent">
                            <option value="" selected disabled>Filter by Program</option>
                            @foreach ($programs as $program)
                                <option value="{{$program->id}}">{{$program->name}}</option>
                            @endforeach
                        </select>
                        @error('program')
                            <p class="text-red-600 text-xs mt-1">Required</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent">
                            <option value="" selected disabled>Filter by Status</option>
                            <option value="1">Accepted</option>
                            <option value="0">Pending</option>
                            <option value="2">Declined</option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-xs mt-1">Required</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="text" name="start_date" id="start_date" placeholder="Start Date" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent" onfocus="(this.type='date')">
                        @error('start_date')
                            <p class="text-red-600 text-xs mt-1">Required</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">End Date</label>
                        <input type="text" name="end_date" id="end_date" placeholder="End Date" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent" onfocus="(this.type='date')">
                        @error('end_date')
                            <p class="text-red-600 text-xs mt-1">Required</p>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-end">
                        <button class="bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-colors font-medium" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Debug: Generate Region VI Students -->
        @if(config('app.debug'))
        <div class="bg-white rounded-lg shadow-sm border p-4 mb-6">
            <form action="{{ route('debug.generate_region6_students') }}" method="POST" class="flex items-end gap-3">
                @csrf
                <div>
                    <label class="text-sm font-medium text-gray-700 mb-1 block">Generate Test Students (Region VI)</label>
                    <input type="number" name="count" min="1" max="200" value="30" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent"/>
                </div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium" type="submit">Generate</button>
                <span class="text-xs text-gray-500">Visible only in debug mode</span>
            </form>
        </div>
        @endif

        <!-- Students Table -->
        <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
        <table id="myTable" class="display w-full">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <th scope="col" class="px-3 py-3 uppercase">#</th>
                <th scope="col" class="px-3 py-3 capitalize">Name</th>
                <th scope="col" class="px-3 py-3 capitalize">Program</th>
                <th scope="col" class="px-3 py-3 capitalize">Contact</th>
                <th scope="col" class="px-3 py-3 capitalize">Email</th>
                <th scope="col" class="px-3 py-3 capitalize">Date</th>
                <th scope="col" class="px-3 py-3 capitalize">Status</th>
            </thead>
            <tbody>
                @php
                    $x=1;
                @endphp
                @foreach ($students as $student)
                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 cursor-pointer" onclick="clickRow('{{route('student_profile', $student->id) }}')">
                        <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">
                            {{$x++}}
                        </th>
                        <td class="px-3 py-3 capitalize text-sm">
                            {{$student->fname." ".$student->lname}}
                        </td>
                        <td class="px-3 py-3 capitalize text-sm">
                            {{$student->program->name}}
                        </td>
                        <td class="px-3 py-3 capitalize text-sm">
                            0{{$student->contact_number}}
                        </td>
                        <td class="px-3 py-3 uppercase text-sm">
                            {{$student->email}}
                        </td>
                        <td class="px-3 py-3 uppercase text-sm">
                            {{$student->created_at->format('M-d-Y')}}
                        </td>
                        <td class="px-3 py-3 capitalize">
                            @if ($student->status == 0)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                            @elseif ($student->status == 1)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Accepted</span>
                            @elseif ($student->status == 2)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Declined</span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Unknown</span>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

        <!-- Export Buttons -->
        <div class="mt-6 flex flex-col sm:flex-row gap-3">
            @if ($isAll==true)
                <a href="{{route('export_excel')}}" class="inline-flex items-center gap-2 bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-colors font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export All Students
                </a>
            @else
                <form action="{{route('export')}}" method="POST" class="inline">
                    @csrf
                    <input type="number" name="program" value="{{$filter['id_program']}}" class="hidden">
                    <input type="number" name="status" value="{{$filter['status']}}" class="hidden">
                    <input type="date" name="start_date" value="{{$filter['start_date']}}" class="hidden">
                    <input type="date" name="end_date" value="{{$filter['end_date']}}" class="hidden">
                    <button type="submit" class="inline-flex items-center gap-2 bg-[#168753] text-white px-4 py-2 rounded-lg hover:bg-green-900 transition-colors font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export Filtered Results
                    </button>
                </form>
            @endif
        </div>
    </div>
</main>

<script src="js/student-table.js"></script>

<script>
function clickRow(url) {
    window.location.href = url;
}

// Initialize DataTable with responsive options
$(document).ready(function() {
    try {
        // Check if DataTable is already initialized
        if ($.fn.DataTable.isDataTable('#myTable')) {
            $('#myTable').DataTable().destroy();
        }
        
        // Initialize new DataTable
        $('#myTable').DataTable({
            responsive: true,
            pageLength: 25,
            language: {
                search: "Search students:",
                lengthMenu: "Show _MENU_ students per page",
                info: "Showing _START_ to _END_ of _TOTAL_ students"
            },
            columnDefs: [
                { responsivePriority: 1, targets: 1 }, // Name column
                { responsivePriority: 2, targets: 2 }, // Program column
                { responsivePriority: 3, targets: 6 }, // Status column
            ],
            destroy: true, // Allow reinitialization
            retrieve: true  // Retrieve existing instance if available
        });
    } catch (error) {
        console.error('Error initializing DataTable:', error);
        // Fallback to basic table if DataTable fails
        $('#myTable').addClass('responsive-table');
    }
});
</script>

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
        padding-top: 5rem;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
    
    /* Make table responsive on mobile */
    .dataTables_wrapper {
        font-size: 0.875rem;
    }
    
    .dataTables_length,
    .dataTables_filter {
        margin-bottom: 1rem;
    }
}

/* DataTable responsive styling */
.dataTables_wrapper .dataTables_length select,
.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.5rem;
    font-size: 0.875rem;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0.5rem 0.75rem;
    margin: 0 0.125rem;
    border-radius: 0.375rem;
    border: 1px solid #d1d5db;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #168753;
    color: white !important;
    border-color: #168753;
}

/* Fallback responsive table styles */
.responsive-table {
    width: 100%;
    border-collapse: collapse;
}

.responsive-table th,
.responsive-table td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
}

.responsive-table th {
    background-color: #f9fafb;
    font-weight: 600;
    color: #374151;
}

@media (max-width: 768px) {
    .responsive-table {
        font-size: 0.875rem;
    }
    
    .responsive-table th,
    .responsive-table td {
        padding: 0.5rem;
    }
}
</style>
@include('partials.footer')
