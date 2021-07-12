@extends("website.theme.layout")

@section('mystyles')
    <style>
        .lec_slider {
            height: 50vh;
        }

        .lec_section .container {
            padding-top: 45px;
        }

        button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 0;
            display: flex;
            align-items: center;
            padding: 16px 20px 16px 15px;
            height: 40px;
            position: relative;
            font-family: inherit;
            font-size: 1em;
            line-height: 1em;
            font-weight: 500;
            background-color: white;
            cursor: pointer;
            border-radius: 32px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            -webkit-tap-highlight-color: transparent;
            transition: box-shadow 0.2s ease, background-color 150ms ease;
        }

        button:focus {
            box-shadow: 0 8px 64px 16px rgba(0, 0, 0, 0.5);
            outline: none;
        }

        button:hover,
        button:active {
            background-color: #eee;
        }

        #cart {
            margin-right: 12px;
            transform-origin: 20% 100%;
            opacity: 1;
        }

        @keyframes slide-up-fade {
            from {
                transform: translateY(0);
                opacity: 1;
            }

            to {
                transform: translateY(-16px);
                opacity: 0;
            }
        }

        @keyframes roll-out {
            0% {
                transform: translate(0) rotate(0);
            }

            20% {
                transform: translate(0) rotate(-70deg);
                opacity: 1;
            }

            50% {
                transform: translate(0) rotate(-45deg);
                opacity: 1;
            }

            100% {
                transform: translate(140px) rotate(-47deg);
                opacity: 0;
            }
        }

        .checked-out span {
            animation: slide-up-fade 150ms 1;
            animation-fill-mode: both;
        }

        .checked-out #cart {
            animation: roll-out 1s 1 150ms;
            animation-timing-function: ease-in;
            animation-fill-mode: both;
        }

        @keyframes checkmark {
            from {
                stroke-dashoffset: 26px;
            }

            to {
                stroke-dashoffset: 0;
            }
        }

        #check {
            position: absolute;
            left: calc(50% - 12px);
        }

        #check path {
            stroke-dasharray: 26px;
            stroke-dashoffset: 26px;
        }

        .checked-out #check path {
            animation: checkmark 150ms 1 1150ms;
            animation-timing-function: ease-in;
            animation-fill-mode: both;
        }

        .checked-out button {
            background-color: #20bf6b;
            transition-delay: 1150ms;
        }

    </style>
@endsection

@section('slider')
    <!-- Slider -->
    <div class="lec_slider lec_image_bck lec_fixed lec_wht_txt" data-stellar-background-ratio="0.3"
        data-image="{{ url('img/banner-1.jpg') }}">
        <!-- Firefly -->
        <div class="lec_slider_firefly" data-total="30" data-min="1" data-max="6"></div>
        <!-- Over -->
        <div class="lec_over" data-color="#041a38" data-opacity="0.5"></div>
        <div class="container">
            <!-- Slider Texts -->
            <div class="lec_slide_txt lec_slide_center_middle text-center">
                <div data-aos-easing="ease" data-aos-delay="600" data-aos="fade-up" class="lec_slide_subtitle">Cart</div>
            </div>
            <!-- Slider Texts End -->
        </div>
        <!-- container end -->
        <!-- Slide Down -->
        <a class="lec_scroll_down lec_go" href="#lec_content">
            <!--                <b></b>-->
            <i class="ti ti-angle-double-down"></i>
        </a>
    </div>
    <!-- Slider End -->
@endsection

@section('content')
    <section id="lec_content" class="lec_content">
        <section class="lec_section lec_section_no_overlay lec_image_bck lec_image_bck_no_cover">
            <div class=" text-center">
                <div class="container">
                    <div class="row cond ">
                        <!-- cart items details -->
                        <div class="col-md-8 col-xs-12 col-sm-12">
                            <div class="small-container cart-page">
                                <table class="SpaCartPage">
                                    <tr>
                                        <th>Product</th>
                                        <th>Remove</th>
                                    </tr>
                                    @isset($cart_data)
                                        @forelse ($cart_data as $item)
                                            <tr>
                                                <td>
                                                    <a
                                                        href="{{ route('productDetails', $products->find($item['item_id'])->url_slug) }}">
                                                        <div class="cart-info">
                                                            <img
                                                                src="{{ asset('storage/products/' . $products->find($item['item_id'])->image1) }}" />
                                                            <div>
                                                                <p class="p_tag">{{ $item['item_name'] }}</p>
                                                                <small>{{ $products->find($item['item_id'])->short_description }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="a_remove">
                                                    <a href="javascript:void(0)"
                                                        onclick="removeFromCart({{ $item['item_id'] }})"> <i
                                                            class="fa fa-trash Spadelet" aria-hidden="true"></i> </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">No Items In cart</td>
                                            </tr>
                                        @endforelse
                                    @endisset
                                </table>


                            </div>

                        </div>

                        <div class="col-md-4 d-flex  col-xs-12 col-sm-12">
                            <div class="small-container cart-page">
                                <div class="cart-summary">
                                    <div class="cart-summary-wrap">
                                        <form method="post" action="{{ route('ajaxsavecontact') }}">
                                            @csrf
                                            <p class="p_tag">
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Enter Name" required>
                                            </p>
                                            <p class="p_tag">
                                                <input type="email" name="email" id="email" class="form-control"
                                                    placeholder="Enter Email" required>
                                            </p>
                                            <p class="p_tag">
                                                <input type="phone" name="phone" id="phone" class="form-control"
                                                    placeholder="Enter Number" required>
                                            </p>
                                            <p class="p_tag">
                                                <textarea name="address" id="address" class="form-control"
                                                    placeholder="Enter Address" required></textarea>
                                            </p>
                                            <p class="p_tag" style="margin-bottom:20px">
                                                <input type="checkbox" class="p-2" id="refertofriend"
                                                    name="refertofriend" value="refer">Refer to friend
                                                <input type="email" name="friendEmail" id="friendEmail" class="form-control"
                                                    placeholder="Enter Email" style="display: none;">
                                            </p>
                                            @if (session('Error'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session('Error') }}
                                                </div>
                                            @endif

                                            @if (session('Success'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('Success') }}
                                                </div>
                                            @endif
                                    </div>
                                    <div class="cart-summary-button">
                                        <button class="checkout-btn" id="checkout-btn" name="checkout-btn"
                                            type="submit">Checkout</button>
                                    </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        toggleReferEmail()
    })
    function toggleReferEmail(){
        if ($('#refertofriend').prop('checked') == false) {
            $('#friendEmail').hide()
        } else {
            $('#friendEmail').show()
        }
    }
    $(document).on('change', '#refertofriend', function(e) {
        toggleReferEmail()
    });
</script>
@endsection
