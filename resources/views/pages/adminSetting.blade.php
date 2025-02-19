@include('partials.header', ['title'=> 'Account Settings'])
<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<section class="bg-green-100 w-[86.6%] absolute top-40 left-64 p-10">
    <x-alertmessage></x-alertmessage>
    <div class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:px-10 xl:py-[0.1%] dark:bg-gray-800 dark:border-gray-700 relative mx-auto">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center lg:mt-10">
            Account Settings
        </h1>
        <form class="space-y-4" action="{{route('update', ['id'=>auth()->user()->id])}}" method="POST">
            @csrf
            @method('PUT')
            @if (session()->has('invalid'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{session('invalid')}}</span> Please try again.
                </div>
            @endif

            @foreach (['fname' => 'First Name', 'lname' => 'Last Name', 'email' => 'Email', 'username' => 'Username'] as $field => $label)
            <div>
                <label for="{{$field}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$label}}</label>
                <input type="text" name="{{$field}}" id="{{$field}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{$label}}" value="{{$dataAdmin->$field}}">
                @error($field)
                    <p class="text-red-600">{{$label}} required</p>
                @enderror
            </div>
            @endforeach

            <!-- Current Password Field -->
            <div>
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Password</label>
                <div class="relative w-full">
                    <input type="password" name="current_password" id="current_password" placeholder="Current Password" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <button type="button" class="absolute inset-y-0 right-3 flex items-center toggle-password" data-target="current_password">
                        <i class="fas fa-eye text-gray-500 dark:text-gray-400 cursor-pointer"></i>
                    </button>
                </div>
                @error('current_password')
                    <p class="text-red-600">Current password is required</p>
                @enderror
            </div>

            <!-- Password Field -->
            @foreach (['password' => 'New Password', 'password_confirmation' => 'Confirm Password'] as $field => $label)
            <div>
                <label for="{{$field}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{$label}}</label>
                <div class="relative w-full">
                    <input type="password" name="{{$field}}" id="{{$field}}" placeholder="{{$label}}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button type="button" class="absolute inset-y-0 right-3 flex items-center toggle-password" data-target="{{$field}}">
                        <i class="fas fa-eye text-gray-500 dark:text-gray-400 cursor-pointer"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-600">{{$label}} required</p>
                @enderror
            </div>
            @endforeach

            <div class="w-full flex items-center justify-center">
                 <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-full">Update</button>
            </div>
        </form>
    </div>
</section>

<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            let targetId = this.getAttribute('data-target');
            let passwordInput = document.getElementById(targetId);
            let icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
</script>

@if(session('password_changed'))
<script>
    Swal.fire({
         title: 'Success!',
         text: 'Your password has been changed!',
         icon: 'success',
         showConfirmButton: false,
         timer: 1000
    });
</script>
@endif

@if($errors->any())
<script>
    Swal.fire({
         title: 'Error!',
         html: '<ul style="text-align: left;">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
         icon: 'error',
         confirmButtonText: 'OK'
    });
</script>
@endif

@if(session('invalid'))
<script>
    Swal.fire({
         title: 'Error!',
         text: '{{ session("invalid") }}',
         icon: 'error',
         confirmButtonText: 'OK'
    });
</script>
@endif


@include('partials.footer')
