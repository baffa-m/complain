<header class="flex items-center justify-between py-3 px-6 border-b border-gray-100 bg-green-200 hover:text-black">
    <div id="header-left" class="flex items-center">
        <div class="text-gray-800 font-semibold">
            <img src="{{ asset('image/udus-logo.png') }}" width="40" class="ml-5" alt="udus logo">
        </div>
        <div class="top-menu ml-10">
            <ul class="flex space-x-4">
                <li>
                    <a class="flex space-x-2 items-center hover:text-white text-lg text-gray-500"
                        href="http://127.0.0.1:8000">
                        Home
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-white text-lg text-gray-500"
                        href="http://127.0.0.1:8000/blog">
                        Blog
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-white text-lg text-gray-500"
                        href="http://127.0.0.1:8000/blog">
                        About Us
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-white text-lg text-gray-500"
                        href="http://127.0.0.1:8000/blog">
                        Contact Us
                    </a>
                </li>

                <li>
                    <a class="flex space-x-2 items-center hover:text-yellow-500 text-lg text-gray-500"
                        href="http://127.0.0.1:8000/blog">
                        Terms
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div id="header-right" class="flex items-center md:space-x-6">
        <div class="flex space-x-5">
            <a class="flex space-x-2 items-center hover:text-yellow-500 text-lg text-gray-500"
                href="http://127.0.0.1:8000/login">
                Login
            </a>
            <a class="flex space-x-2 items-center hover:text-yellow-500 text-lg text-gray-500"
                href="http://127.0.0.1:8000/register">
                Register
            </a>
        </div>
    </div>
</header>

