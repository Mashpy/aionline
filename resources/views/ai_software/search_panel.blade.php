<section class="highlight">
    <div class="container">
        <div class="row">
            <div class="col col-sm-12 col-md-12 col-lg-12 ai-software-head mt-4 text-center">
                <h3>Find Alternative Software</h3>
                <h5>Currently, {{$ai_softwares->count()}} new software added.</h5>
            </div>
            <div align="center" class="col-sm-12 col-md-12 col-lg-12 text-center d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <form action="{{route('ai_software.search')}}" method="post">
                        @csrf
                        <input type="search" name="software_search" class="form-control p-2" placeholder="Search Your Software..." required>
                        <button class="btn btn-danger mt-2 search-button">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>