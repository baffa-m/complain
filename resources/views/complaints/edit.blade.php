<x-app-layout>

    <form class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px" method="POST" action="{{ route('complaints.update', ['complaint' => $complaint])}}">
        @csrf
        @method('PUT')
        @include('complaints.form')
    </form>

</x-app-layout>
