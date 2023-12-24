<x-guest-layout>
    <div class="w-full text-center py-32">
        <div class="flex justify-center">
            <a href=""><img src="{{ asset('image/udus-logo.png')}}" width="250" alt=""></a>
        </div>      <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
            Welcome UDUSOK Student Complaint System </span>
        </h1>
        <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
            href="{{ route('complaints.index')}}">Get Started</a>
    </div>
</x-guest-layout>
