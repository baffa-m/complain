<x-app-layout>

    <form class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px" method="POST" action="{{ route('add.staff') }}">
        @csrf
        <img class="w-full my-2 rounded-lg" src="" alt="">
        <h1 class="text-4xl font-bold text-left text-gray-800">
            Register
        </h1>

        <div class="mt-8 flex justify-between flex-col">
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">Name</h2>
            <input type="text" name="name" placeholder="Name" class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
        </div>

        <div class="mt-8 flex justify-between flex-col">
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">Email</h2>
            <input type="email" name="email" placeholder="Email" class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
        </div>

        <div class="mt-8 flex justify-between flex-col">
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">Staff Number</h2>
            <input type="text" name="user_id" placeholder="Staff Number" class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
        </div>

        <div class="mt-8 flex justify-between flex-col">
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">Password</h2>
            <input type="password" name="password" placeholder="Password" class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
        </div>

        <div class="mt-8 flex justify-between flex-col">
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">Confirm Password</h2>
            <input type="password" name="confirm_password" placeholder="Password" class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-lg text-gray-700 border-gray-200 placeholder:text-gray-400">
        </div>

        <button
            class="mt-8 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
            Register
        </button>
    </form>

</x-app-layout>
