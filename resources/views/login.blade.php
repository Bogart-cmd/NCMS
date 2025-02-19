@include('partials.header', ['title'=>'Login'])

    <section>
        <x-error></x-error>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 relative pt-10">
                <div class="flex items-center justify-center w-40 h-40 absolute md:-top-20 lg:-top-[90px] left-1/2 -translate-x-1/2">
                    <img src="{{asset("images/nolitc.png")}}" alt="nolitc logo" class="w-80">
                </div>
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center md:m-0 lg:mt-10">
                        Login Account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{route('loginAction')}}" method="POST">
                        @method('POST')
                        @csrf
                        @if (session()->has('invalid'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <span class="font-medium">{{session('invalid')}}</span> Please try again.
                            </div>
                        @endif


                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" value="{{old('username')}}">
                            @error('username')
                                <p class="text-red-600">Username required</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="relative w-full">
                            <input type="password" name="password" id="password" placeholder="password" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{old('password')}}">
                            <!-- password visibilty button -->
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center">
                                <i id="toggleIcon" class="fas fa-eye text-gray-500 dark:text-gray-400 cursor-pointer"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-600">Password required</p>
                        @enderror
                    </div>

                        <div class="w-full flex flex-col items-center justify-center space-y-2">
                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Login
                            </button>
                            <a href="{{ url('/') }}" class="w-full">
                                <button type="button" class="focus:outline-none text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                    Back to Home
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </section>


    <script> //script for the password visibility toggle
        document.getElementById('togglePassword').addEventListener('click', function () {
            let passwordInput = document.getElementById('password');
            let toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });
    </script>

@include('partials.footer')

