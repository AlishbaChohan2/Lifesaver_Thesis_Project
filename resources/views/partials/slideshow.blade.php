<div id="demo" class="carousel slide ss" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slider4.jpg') }}" alt="Compassion" class="d-block" style="width:100%">
            <div class="carousel-caption">
                <h3>COMPASSION</h3>
                <p>Compassion isn't about solutions. It's about giving all the love that you have got.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider5.jpg') }}" alt="Kindness" class="d-block" style="width:100%">
            <div class="carousel-caption">
                <h3>KINDNESS</h3>
                <p>Kindness is spreading sunshine in people's life regardless of weather.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider6.jpg') }}" alt="Loyalty" class="d-block" style="width:100%">
            <div class="carousel-caption">
                <h3>LOYALTY</h3>
                <p>Loyalty is what we seek in Service.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider3.jpg') }}" alt="Trust" class="d-block" style="width:100%">
            <div class="carousel-caption">
                <h3>TRUST</h3>
                <p>Trust your instincts, intuition never lies.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider7.jpg') }}" alt="Generosity" class="d-block" style="width:100%">
            <div class="carousel-caption">
                <h3>GENEROSITY</h3>
                <p>Real generosity is doing something nice for someone who will never find out.</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>
