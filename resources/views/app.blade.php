<x-master>
    @yield('page-header')
    <div class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    @yield('content')
                </div>

                <div class="col-md-4">
                    <x-sidebar :categories="App\Category::all()"></x-sidebar>
                </div>

            </div>
        </div>
    </div>

</x-master>
