<section id="counts" class="counts">
    <header class="section-header">
        <h2>Те кто поддержал проект</h2>
    </header>
    <div class="container" data-aos="">
        <div class="row gy-2">
            @foreach($sponsors as $sponsors)
            <div class="col-lg-3 col-md-4 sponsors" style="margin-right: auto; margin-left: auto">
                <div class="count-box">
                    <div>
                        <p><a href="{{$sponsors->url}}"><img src="{{asset('storage/'.$sponsors->image)}}" class="img-fluid" alt=""></a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- End Counts Section -->
