<?php
use App\Models\Setting;
$general=Setting::generals();
?>
<footer>
    <div class="footer-inner">
        <div class="news-letter">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <h4>About</h4>
                    <div class="contacts-info">
                        <p>{{$general->about}}. </p>
                        <address>
                            <i class="fa fa-location-arrow"></i> <span><br>
              {{$general->address}}</span>
                        </address>
                        <div class="phone-footer"><i class="fa fa-phone"></i> {{$general->hotline}}</div>
                        <div class="email-footer"><i class="fa fa-envelope"></i> <a href="{{$general->email}}">{{$general->email}}</a> </div>
                    </div>
                </div>

                <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6">
                    <div class="social">
                        <h4>Follow Us</h4>
                        <ul>
                            <li><a target="_empty" href="https://{{$general->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_empty" href="https://{{$general->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_empty" href="https://{{$general->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a target="_empty" href="https://{{$general->rss}}"><i class="fa fa-rss"></i></a></li>
                            <li><a target="_empty" href="https://{{$general->youtube}}"><i class="fa fa-youtube"></i></a></li>
                            <li><a target="_empty" href="https://{{$general->instagram}}"><i class="fa fa-instagram"></i></a></li>
                            <li><a  target="_empty" href="https://{{$general->pinterest}}"><i class="fa fa-pinterest"></i></a></li>
                            <li><a target="_empty" href="https://{{$general->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                            <li><a target="_empty" href="https://{{$general->skype}}"><i class="fa fa-skype"></i></a></li>
                            <li><a target="_empty" href="https://{{$general->vimeo}}"><i class="fa fa-vimeo"></i></a></li>
                        </ul>
                    </div>
                    <div class="payment-accept">
                        <h4>Secure Payment</h4>
                        <div class="payment-icon"><img src="/front/images/paypal.png" alt="paypal"> <img src="/front/images/visa.png" alt="visa"> <img src="/front/images/american-exp.png" alt="american express"> <img src="/front/images/mastercard.png" alt="mastercard"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 coppyright text-center">Powered By :&nbsp;<a href="https://www.rezadastras.ir">REZA DASTRAS <a/> .</div>
            </div>
        </div>
    </div>
</footer>
