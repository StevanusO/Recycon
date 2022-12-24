@extends('website_template')
@section('web-title', 'Homepage')

@section('website-content')
    <div class="container">
        <div class="content-height d-flex align-items-center">
            <div class="content-top d-flex flex-column justify-content-center align-items-center w-100">
                <h1 class="text-warning">Recycon</h1>
                <p class="w-50 text-center text-light">We're just sellling recycle product and secondhand things
                    including accessories, houseware, and many more, bring
                    some recycle product to get a better experience.
                </p>
            </div>
        </div>

        <div class="content-mid">
            <h2 class="py-2">About Us</h2>
            <div class="parent-outside border px-3 pb-3 border-3 rounded">
                <div class="outside w-100">
                    <div class="sub-content-mid d-flex container-horizontal gap-4 py-3">
                        <div class="card bg-warning" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Product</h5>
                                <p class="card-text">We have a thousand of recycle and secondhand things product that all of
                                    them are in good condition</p>
                            </div>
                        </div>
                        <div class="card bg-danger text-light" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Price</h5>
                                <p class="card-text">We don't sell the expensive product, so you don't have to worry.</p>
                            </div>
                        </div>
                        <div class="card bg-primary text-light" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Location</h5>
                                <p class="card-text">Our company is locate in Jakarta, Indonesia.</p>
                            </div>
                        </div>
                        <div class="card bg-success text-light" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Operational Time</h5>
                                <p class="card-text">Our operational time are from monday to saturdary which is from 08:00 -
                                    17:00</p>
                            </div>
                        </div>
                        <div class="card bg-dark text-light" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Customer Service</h5>
                                <p class="card-text">We have good staffs that ready to solve your problem anytime.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="left-right w-100 d-flex bg-dark rounded text-warning text-center">
                <div class="left w-50 d-flex align-items-center border-end border-3 border-warning">
                    <h1 class="w-100">Recycon</h1>
                </div>
                <div class="right w-50 p-3 d-flex align-items-center">
                    Recycle for save our planet, recylce for reduce waste, recycle for a better environment.
                    Recycle for having a different expreience, recycle, if your product still functionable.
                    Let's start using recylcle product, there are so many benefits are waiting for you, don't
                    miss out our limited editio recycle product before it sold out, hurry up, get the account
                    and get the benefits now :D.
                </div>
            </div>
        </div>
    </div>

@endsection
