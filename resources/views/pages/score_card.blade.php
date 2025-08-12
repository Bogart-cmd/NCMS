@include('partials.header', ['title'=> 'Score Cards'])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<x-message></x-message>

<main class="admin-content lg:ml-64 ml-0 pt-20 lg:pt-24 px-3 lg:px-6 min-h-screen bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Score Cards</h1>
            <p class="text-gray-600 text-sm lg:text-base">Track graduate employment statistics</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6 flex flex-col items-center justify-center text-center">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Graduates</h2>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#168753]">{{$scoreCard->number_of_graduates}}</div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6 flex flex-col items-center justify-center text-center">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Employed</h2>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#168753]">{{$scoreCard->number_of_employed}}</div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border p-4 lg:p-6 flex flex-col items-center justify-center text-center">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Employment Rate</h2>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#168753]">{{$scoreCard->employment_rate}}%</div>
            </div>
        </div>

        <!-- Edit Form Section -->
        <div class="flex flex-col items-center gap-4">
            <div class="edit-form-content w-full max-w-md rounded-lg shadow-sm border bg-white p-4 lg:p-6 animate__animated animate__fadeInDown" style="display: none" id="form-edit">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Edit Score Card</h3>
                <form action="{{ route('updateScoreCards', ['id' => $scoreCard->id]) }}" method="post" class="space-y-4">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="number_of_graduates" class="block text-sm font-medium text-gray-700 mb-2">Graduates</label>
                        <input type="number" name="number_of_graduates" id="number_of_graduates" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-[#168753] focus:border-transparent block w-full p-2.5" placeholder="Graduates" value="{{!session()->has('error')?$scoreCard->number_of_graduates:old('number_of_graduates')}}" oninput="calRate()">
                        @error('number_of_graduates')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="number_of_employed" class="block text-sm font-medium text-gray-700 mb-2">Employed</label>
                        <input type="number" name="number_of_employed" id="number_of_employed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-[#168753] focus:border-transparent block w-full p-2.5" placeholder="Employed" value="{{!session()->has('error')?$scoreCard->number_of_employed:old('number_of_employed')}}" oninput="calRate()">
                        @error('number_of_employed')
                            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="employment_rate" class="block text-sm font-medium text-gray-700 mb-2">Employment Rate</label>
                        <input type="number" name="employment_rate" id="employment_rate" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Employment Rate" value="{{$scoreCard->employment_rate}}" readonly>
                    </div>
                    <div>
                        <button class="w-full bg-[#168753] rounded-lg text-white hover:bg-green-900 py-2.5 px-4 font-semibold transition-colors" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="flex gap-3">
                <button class="bg-[#168753] rounded-lg text-white hover:bg-green-900 py-2.5 px-4 font-semibold transition-colors" onclick="show()" id="showForm">Edit</button>
                <button class="bg-red-500 rounded-lg text-white hover:bg-red-900 py-2.5 px-4 font-semibold transition-colors" onclick="hide()" id="hideForm" style="display: none">Hide</button>
            </div>
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
        }
    </style>
</main>

<script>
    function calRate() {
        let num_grand = parseInt(document.getElementById("number_of_graduates").value);
        let num_emp = parseInt(document.getElementById("number_of_employed").value);
        if (num_grand > 0) {
            var employmentRate = (num_emp / num_grand) * 100;
            document.getElementById('employment_rate').value = employmentRate.toFixed(2);
        } else {
            document.getElementById('employment_rate').value = '';
        }
    }

    function show() {
        document.getElementById("form-edit").style.display = "block";
        document.getElementById("showForm").style.display = "none";
        document.getElementById("hideForm").style.display = "block";
    }
    
    function hide() {
        document.getElementById("form-edit").style.display = "none";
        document.getElementById("showForm").style.display = "block";
        document.getElementById("hideForm").style.display = "none";
    }
</script>

@include('partials.footer')
