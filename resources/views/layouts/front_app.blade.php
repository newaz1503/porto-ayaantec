
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	 <title>@yield('title','Personal Portfolio')</title>

    
 <meta name="author" content="{{ setting()->meta_author }}">
    <meta name="keywords" content="@foreach (json_decode(setting()->meta_keywords) as $item){{ $item }},@endforeach"/> 

    <meta name="description" content="{{ setting()->meta_description }}" /> 
    <meta property="og:image" content="{{ asset(setting()->meta_photo) }}" />


	 <link rel="shortcut icon" href="{{ asset('front_asset') }}/img/{{ setting()->fav_icon }}">
	<!-- Responsive Meta Tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- main stylesheet -->
	<link rel="stylesheet" href="{{ asset('front_asset') }}/css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="{{ asset('front_asset') }}/css/responsive.css">

<link rel="stylesheet" href="{{ asset('front_asset') }}/css/animate.min.css">


@yield('style')
<link rel="stylesheet" href="{{  asset('backend_asset') }}/assets/node_modules/summernote/dist/summernote-bs4.css">
</head>

<style type="text/css">
        

    </style>
<body class="fixed-layout skin-blue">
	
	<section id="topbar">
		<div class="container" >
			<div class="row">
				<div class="social pull-left">
					<ul>
                        @foreach (socials() as $social)     
                      <li><a href="{{ $social->link }}" target="_blank" ><i class="{{ $social->icon }}"></i></a></li>
                      @endforeach
					</ul>
				</div> 
				<div class="contact-info pull-right">
					<ul>
						<li><a href="tel:+91 22 2676 6643" class="hvr-bounce-to-bottom"><i class="fa fa-phone"></i> {{ setting()->number }}</a></li>
						<li><a href="mailto:{{ setting()->email }}" class="hvr-bounce-to-bottom"><i class="fa fa-envelope-o"></i> {{ setting()->email }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section> 

	<header>
		<div class="search-box">
			<div class="container">
				<div class="pull-right search  col-lg-3 col-md-4 col-sm-5 col-xs-12">
					<form action="#">
						<input type="text" placeholder="Search Here"> <button type="submit"><i class="icon icon-Search"></i></button>
					</form>
				</div>
			</div>
		</div>
		<div class="cart-box">
			<div class="container">
				<div class="pull-right cart col-lg-6 col-xs-12">
					<p><i class="icon icon-FullShoppingCart"></i> You Have <span>1 Item</span> in your Cart. Price is <span>$199</span></p>
				</div>
			</div>
		</div>
		<div class="container header__container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-lg-offset-0 col-xs-6  logo">
					<a href="{{ route('front.index') }}" style='display:flex'>
						<img src="{{ asset( setting()->logo) }}" alt="Plumberx" class="img-responsive"> 
						<ul style='padding-top:23px;padding-left:10px;'>
						    <li style='color:red;line-height:18px;font-weight:bold;white-space:nowrap;'>RR International </li>
						    <li style='line-height:18px'><span style='font-size:12px; color:#4c017d;'>All Chemical Solutions</span></li>
						</ul>
					</a>
				</div>
				<nav class="col-lg-10 col-md-10 col-lg-pull-0 col-xs-12 col-md-pull-1 mainmenu-container">
					
					<button class="mainmenu-toggler">
						<i class="fa fa-bars"></i>
					</button>
					<ul class="mainmenu pull-right">
						
                        <li {{  menuActive('front.index') }}><a href="{{ route('front.index') }} " class="hvr-overline-from-left">Home</a></li>
						<li  class="dropdown" >
							<a href="{{ route('front.about') }} " class="hvr-overline-from-left">About Me</a>
							<ul class="submenu">
                                 <li  {{  menuActive('front.about') }}><a href="{{ route('front.about')}} ">Our Story</a></li>
								<li {{  menuActive('front.team') }}><a href="{{ route('front.team') }} ">The RRI Team</a></li>
								<!--<li {{  menuActive('front.quality') }}><a href="{{ route('front.quality') }} ">Quality RRI</a></li>-->
							</ul>
						</li>
						<li  {{ SubMenu(['front.pigments','front.resins','front.resinraw','front.packaging','front.additives','front.plasticizers']) }} class="dropdown">
							<a  class="hvr-overline-from-left">Products</a>
							<ul class="submenu">
								<li {{  menuActive('front.pigments') }}><a href="{{ route('front.pigments') }}">Pigments</a></li>
								<li {{  menuActive('front.resins') }}><a href="{{ route('front.resins') }}">Resins</a></li>
								<li {{  menuActive('front.resinraw') }}><a href="{{ route('front.resinraw') }}">Resins  raw materials</a></li>
                                <li {{  menuActive('front.packaging') }}><a href="{{ route('front.packaging') }}">Packaging raw materials</a></li>
                                <li {{  menuActive('front.additives') }}><a href="{{ route('front.additives') }}">Additives</a></li>
                                <li {{  menuActive('front.plasticizers') }}><a href="{{ route('front.plasticizers') }}">Plasticizers</a></li>
                                    
                               
							</ul>
						</li>
						   <li {{ SubMenu(['front.nitrocellulose','front.titanium','front.polyurethane','front.aluminum','front.vanyl']) }} class="dropdown">
							<a class="hvr-overline-from-left"> Core Products</a>
							<ul class="submenu">
								<li  {{  menuActive('front.nitrocellulose') }}><a href="{{ route('front.nitrocellulose') }}" >Nitrocellulose (NC)</a></li>
                                <li  {{  menuActive('front.titanium') }}><a href="{{ route('front.titanium') }}" >Titanium Dioxide (Tio2)</a></li>
                                <li  {{  menuActive('front.polyurethane') }}><a href="{{ route('front.polyurethane') }}" >Polyurethane Resin (PU)</a></li>
                                <li  {{  menuActive('front.aluminum') }}><a href="{{ route('front.aluminum') }}" >Aluminum foil</a></li>
                                <li  {{  menuActive('front.aluminum') }}><a href="{{ route('front.vinyl') }}" >Vinyl Resin</a></li>
								  
									</ul>
						</li>
						<li  {{  menuActive('front.principals') }}><a href="{{ route('front.principals') }} " class="hvr-overline-from-left">Principals</a></li>
						<li {{  menuActive('front.exhibitions') }}><a href="{{ route('front.exhibitions') }} " class="hvr-overline-from-left">Events</a></li>
						{{-- <li {{  menuActive('front.awards') }}><a href="{{ route('front.awards') }} " class="hvr-overline-from-left"> AWARDS AND AFFILIATIONS</a></li> --}}
                    
                          
						{{-- <li {{  menuActive('front.csr') }}><a href="{{ route('front.csr') }} " class="hvr-overline-from-left ">CSR</a></li> --}}
						<li {{  menuActive('front.contact') }}><a href="{{ route('front.contact') }} " class="hvr-overline-from-left">Contact Us</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>  


@yield('front_content')

 
<style>
 .phone-contact a {
 border: 1px solid #fff;
 background: #FE5454;
 color: #fff;
 text-transform: uppercase;
 line-height: 40px;
 padding: 0 10px;
 font-weight: 500;
 font-size: 14px;
 font-weight: bold;
 margin-left: 15px;
 position: relative;
 bottom: 3px;
 outline: none;
 display: inline-block;
 }
</style>
<!-- #clients -->
 <section id="clients">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12">
             <div class="owl-carousel owl-theme">
                @foreach (parters() as $partner)
                <div class="item">
                    <img src="{{ asset($partner->img) }}" alt="">
                </div>
                @endforeach
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- /#clients -->
<script src="{{ asset('front_asset') }}/js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<footer>
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12">
                  <div class="request-for-qoute-wrap"><a href="{{ route('front.contact') }}" class="request-for-qoute wow slideInDown hvr-bounce-to-right">Contact Us</a></div>
                  
              </div>
          </div>
          <div class="row">
              <!-- .widget -->
              <div class="col-lg-4 col-md-4 col-lg-3 col-md-3 col-sm-6 col-xs-6 widget">
                  <h3>About Me</h3>
                  <p>{{ Str::limit(setting()->about_story,200) }}</p>
                  <a href="{{ route('front.about') }}" class="read-more">Read More <i class="fa fa-angle-double-right"></i></a>
                  <ul class="social">
                    @foreach (socials() as $social)     
                      <li><a href="{{ $social->link }}" target="_blank" class="hvr-radial-out"><i class="{{ $social->icon }}"></i></a></li>
                      @endforeach
                  </ul>
              </div> <!-- /.widget -->
              <!-- .widget -->
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 widget">
                  <h3>Important link</h3>
                  <ul class="popular-post">
  
  <li>
                          <a href="{{ route('front.index') }}"><h5>Home </h5></a>
                          
                      </li>
                      <li>
                          <a href="{{ route('front.index') }}#testimonials"><h5>Client Speak/Testimonials</h5></a>
                          
                      </li>
                      <li>
                          <a href="{{ route('front.about') }} " ><h5>About</h5></a>
                          
                      </li>
                      <li>
                          <a href="{{ route('front.principals') }} " ><h5>Principals</h5></a>
                          
                      </li>
                      <li>
                          <a href="{{ route('front.exhibitions') }} " ><h5>Events</h5></a>
                          
                      </li>
                      
                      <li>
                          <a href="{{ route('front.contact') }} "><h5>Contact us</h5></a>
                          
                      </li>
                  </ul>
              </div> <!-- /.widget -->
              <!-- .widget -->
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 widget">
                  <h3>Get in Touch</h3>
                  <ul class="contact-info">

                      <li><i class="fa fa-map-marker"></i>{{ setting()->address }} </li>
                      <li>
                        <i class="fa fa-phone"></i>{{ setting()->number }} 
                        <br/>
                        <i class="fa fa-phone"></i>+8801975077177
                     </li>
                      <li><i class="fa fa-envelope-o"></i><a href="mailto:{{ setting()->email }}" style="color: white;"> {{ setting()->email }} </a></li>
                      <li><i class="fa fa-globe"></i><a href="#" style="color: white;"> {{ setting()->website }} </a></li>
                    
                  </ul>
              </div> <!-- /.widget -->
              <!-- .widget -->
               <!-- /.widget -->
          </div>
      </div>
  </footer> 
  
  <section id="bottom-bar">
      <div class="container fluid">
          <div class="row">
              <!-- .copyright -->
              <div class="col-lg-6 col-xm-12">
                <div class="copyright pull-left" style="
                text-align: center;
              ">
                                <p><span>{{ setting()->copyright }}</span></p>
                                
                            </div> <!-- /.copyright -->
              </div>
              <div class="col-lg-6 col-xm-12">
                <div class="copyright pull-right" style="
                text-align: right;
              ">
                                <p>Developed by  <a style='color:white;display:inline-block; text-align:right' target="_blank" href="https://ayaantec.com/">Ayaan Tech Limited</a></p>
                                
                            </div> <!-- /.copyright -->
              </div>
            
              <!-- .credit -->
              
          </div>
      </div> 
  </section>

  
  
  <script src="{{ asset('front_asset') }}/js/jquery.min.js"></script> 
  <script src="{{ asset('front_asset') }}/js/bootstrap.min.js"></script> 
  <script src="http://maps.google.com/maps/api/js"></script> 
  <script src="{{ asset('front_asset') }}/js/gmap.js"></script> 
  <script src="{{ asset('front_asset') }}/js/wow.js"></script>
  <script src="{{ asset('front_asset') }}/js/isotope.pkgd.min.js"></script>
  <script src="{{ asset('front_asset') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('front_asset') }}/js/jquery.themepunch.tools.min.js"></script> 
  <script src="{{ asset('front_asset') }}/js/jquery.themepunch.revolution.min.js"></script>
  <script src="{{ asset('front_asset') }}/js/jquery.fancybox.pack.js"></script>
  <script src="{{ asset('front_asset') }}/js/validate.js"></script>
  <script src="{{ asset('front_asset') }}/js/jquery.easing.min.js"></script> 
  <script src="{{ asset('front_asset') }}/js/custom.js"></script> 
  <script src="{{ asset('front_asset') }}/js/wow.min.js"></script>


<script type="text/javascript">
  /*Bootstrap Carousel Touch Slider.

  https://bootstrapthemes.co

  Credits: Bootstrap, jQuery, TouchSwipe, Animate.css, FontAwesome

  */


  (function (a) { if (typeof define === "function" && define.amd && define.amd.jQuery) { define(["jquery"], a) } else { if (typeof module !== "undefined" && module.exports) { a(require("jquery")) } else { a(jQuery) } } } (function (f) { var y = "1.6.15", p = "left", o = "right", e = "up", x = "down", c = "in", A = "out", m = "none", s = "auto", l = "swipe", t = "pinch", B = "tap", j = "doubletap", b = "longtap", z = "hold", E = "horizontal", u = "vertical", i = "all", r = 10, g = "start", k = "move", h = "end", q = "cancel", a = "ontouchstart" in window, v = window.navigator.msPointerEnabled && !window.navigator.pointerEnabled && !a, d = (window.navigator.pointerEnabled || window.navigator.msPointerEnabled) && !a, C = "TouchSwipe"; var n = { fingers: 1, threshold: 75, cancelThreshold: null, pinchThreshold: 20, maxTimeThreshold: null, fingerReleaseThreshold: 250, longTapThreshold: 500, doubleTapThreshold: 200, swipe: null, swipeLeft: null, swipeRight: null, swipeUp: null, swipeDown: null, swipeStatus: null, pinchIn: null, pinchOut: null, pinchStatus: null, click: null, tap: null, doubleTap: null, longTap: null, hold: null, triggerOnTouchEnd: true, triggerOnTouchLeave: false, allowPageScroll: "auto", fallbackToMouseEvents: true, excludedElements: "label, button, input, select, textarea, a, .noSwipe", preventDefaultEvents: true }; f.fn.swipe = function (H) { var G = f(this), F = G.data(C); if (F && typeof H === "string") { if (F[H]) { return F[H].apply(this, Array.prototype.slice.call(arguments, 1)) } else { f.error("Method " + H + " does not exist on jQuery.swipe") } } else { if (F && typeof H === "object") { F.option.apply(this, arguments) } else { if (!F && (typeof H === "object" || !H)) { return w.apply(this, arguments) } } } return G }; f.fn.swipe.version = y; f.fn.swipe.defaults = n; f.fn.swipe.phases = { PHASE_START: g, PHASE_MOVE: k, PHASE_END: h, PHASE_CANCEL: q }; f.fn.swipe.directions = { LEFT: p, RIGHT: o, UP: e, DOWN: x, IN: c, OUT: A }; f.fn.swipe.pageScroll = { NONE: m, HORIZONTAL: E, VERTICAL: u, AUTO: s }; f.fn.swipe.fingers = { ONE: 1, TWO: 2, THREE: 3, FOUR: 4, FIVE: 5, ALL: i }; function w(F) { if (F && (F.allowPageScroll === undefined && (F.swipe !== undefined || F.swipeStatus !== undefined))) { F.allowPageScroll = m } if (F.click !== undefined && F.tap === undefined) { F.tap = F.click } if (!F) { F = {} } F = f.extend({}, f.fn.swipe.defaults, F); return this.each(function () { var H = f(this); var G = H.data(C); if (!G) { G = new D(this, F); H.data(C, G) } }) } function D(a5, au) { var au = f.extend({}, au); var az = (a || d || !au.fallbackToMouseEvents), K = az ? (d ? (v ? "MSPointerDown" : "pointerdown") : "touchstart") : "mousedown", ax = az ? (d ? (v ? "MSPointerMove" : "pointermove") : "touchmove") : "mousemove", V = az ? (d ? (v ? "MSPointerUp" : "pointerup") : "touchend") : "mouseup", T = az ? (d ? "mouseleave" : null) : "mouseleave", aD = (d ? (v ? "MSPointerCancel" : "pointercancel") : "touchcancel"); var ag = 0, aP = null, a2 = null, ac = 0, a1 = 0, aZ = 0, H = 1, ap = 0, aJ = 0, N = null; var aR = f(a5); var aa = "start"; var X = 0; var aQ = {}; var U = 0, a3 = 0, a6 = 0, ay = 0, O = 0; var aW = null, af = null; try { aR.bind(K, aN); aR.bind(aD, ba) } catch (aj) { f.error("events not supported " + K + "," + aD + " on jQuery.swipe") } this.enable = function () { aR.bind(K, aN); aR.bind(aD, ba); return aR }; this.disable = function () { aK(); return aR }; this.destroy = function () { aK(); aR.data(C, null); aR = null }; this.option = function (bd, bc) { if (typeof bd === "object") { au = f.extend(au, bd) } else { if (au[bd] !== undefined) { if (bc === undefined) { return au[bd] } else { au[bd] = bc } } else { if (!bd) { return au } else { f.error("Option " + bd + " does not exist on jQuery.swipe.options") } } } return null }; function aN(be) { if (aB()) { return } if (f(be.target).closest(au.excludedElements, aR).length > 0) { return } var bf = be.originalEvent ? be.originalEvent : be; var bd, bg = bf.touches, bc = bg ? bg[0] : bf; aa = g; if (bg) { X = bg.length } else { if (au.preventDefaultEvents !== false) { be.preventDefault() } } ag = 0; aP = null; a2 = null; aJ = null; ac = 0; a1 = 0; aZ = 0; H = 1; ap = 0; N = ab(); S(); ai(0, bc); if (!bg || (X === au.fingers || au.fingers === i) || aX()) { U = ar(); if (X == 2) { ai(1, bg[1]); a1 = aZ = at(aQ[0].start, aQ[1].start) } if (au.swipeStatus || au.pinchStatus) { bd = P(bf, aa) } } else { bd = false } if (bd === false) { aa = q; P(bf, aa); return bd } else { if (au.hold) { af = setTimeout(f.proxy(function () { aR.trigger("hold", [bf.target]); if (au.hold) { bd = au.hold.call(aR, bf, bf.target) } }, this), au.longTapThreshold) } an(true) } return null } function a4(bf) { var bi = bf.originalEvent ? bf.originalEvent : bf; if (aa === h || aa === q || al()) { return } var be, bj = bi.touches, bd = bj ? bj[0] : bi; var bg = aH(bd); a3 = ar(); if (bj) { X = bj.length } if (au.hold) { clearTimeout(af) } aa = k; if (X == 2) { if (a1 == 0) { ai(1, bj[1]); a1 = aZ = at(aQ[0].start, aQ[1].start) } else { aH(bj[1]); aZ = at(aQ[0].end, aQ[1].end); aJ = aq(aQ[0].end, aQ[1].end) } H = a8(a1, aZ); ap = Math.abs(a1 - aZ) } if ((X === au.fingers || au.fingers === i) || !bj || aX()) { aP = aL(bg.start, bg.end); a2 = aL(bg.last, bg.end); ak(bf, a2); ag = aS(bg.start, bg.end); ac = aM(); aI(aP, ag); be = P(bi, aa); if (!au.triggerOnTouchEnd || au.triggerOnTouchLeave) { var bc = true; if (au.triggerOnTouchLeave) { var bh = aY(this); bc = F(bg.end, bh) } if (!au.triggerOnTouchEnd && bc) { aa = aC(k) } else { if (au.triggerOnTouchLeave && !bc) { aa = aC(h) } } if (aa == q || aa == h) { P(bi, aa) } } } else { aa = q; P(bi, aa) } if (be === false) { aa = q; P(bi, aa) } } function M(bc) { var bd = bc.originalEvent ? bc.originalEvent : bc, be = bd.touches; if (be) { if (be.length && !al()) { G(bd); return true } else { if (be.length && al()) { return true } } } if (al()) { X = ay } a3 = ar(); ac = aM(); if (bb() || !am()) { aa = q; P(bd, aa) } else { if (au.triggerOnTouchEnd || (au.triggerOnTouchEnd == false && aa === k)) { if (au.preventDefaultEvents !== false) { bc.preventDefault() } aa = h; P(bd, aa) } else { if (!au.triggerOnTouchEnd && a7()) { aa = h; aF(bd, aa, B) } else { if (aa === k) { aa = q; P(bd, aa) } } } } an(false); return null } function ba() { X = 0; a3 = 0; U = 0; a1 = 0; aZ = 0; H = 1; S(); an(false) } function L(bc) { var bd = bc.originalEvent ? bc.originalEvent : bc; if (au.triggerOnTouchLeave) { aa = aC(h); P(bd, aa) } } function aK() { aR.unbind(K, aN); aR.unbind(aD, ba); aR.unbind(ax, a4); aR.unbind(V, M); if (T) { aR.unbind(T, L) } an(false) } function aC(bg) { var bf = bg; var be = aA(); var bd = am(); var bc = bb(); if (!be || bc) { bf = q } else { if (bd && bg == k && (!au.triggerOnTouchEnd || au.triggerOnTouchLeave)) { bf = h } else { if (!bd && bg == h && au.triggerOnTouchLeave) { bf = q } } } return bf } function P(be, bc) { var bd, bf = be.touches; if (J() || W()) { bd = aF(be, bc, l) } if ((Q() || aX()) && bd !== false) { bd = aF(be, bc, t) } if (aG() && bd !== false) { bd = aF(be, bc, j) } else { if (ao() && bd !== false) { bd = aF(be, bc, b) } else { if (ah() && bd !== false) { bd = aF(be, bc, B) } } } if (bc === q) { if (W()) { bd = aF(be, bc, l) } if (aX()) { bd = aF(be, bc, t) } ba(be) } if (bc === h) { if (bf) { if (!bf.length) { ba(be) } } else { ba(be) } } return bd } function aF(bf, bc, be) { var bd; if (be == l) { aR.trigger("swipeStatus", [bc, aP || null, ag || 0, ac || 0, X, aQ, a2]); if (au.swipeStatus) { bd = au.swipeStatus.call(aR, bf, bc, aP || null, ag || 0, ac || 0, X, aQ, a2); if (bd === false) { return false } } if (bc == h && aV()) { clearTimeout(aW); clearTimeout(af); aR.trigger("swipe", [aP, ag, ac, X, aQ, a2]); if (au.swipe) { bd = au.swipe.call(aR, bf, aP, ag, ac, X, aQ, a2); if (bd === false) { return false } } switch (aP) { case p: aR.trigger("swipeLeft", [aP, ag, ac, X, aQ, a2]); if (au.swipeLeft) { bd = au.swipeLeft.call(aR, bf, aP, ag, ac, X, aQ, a2) } break; case o: aR.trigger("swipeRight", [aP, ag, ac, X, aQ, a2]); if (au.swipeRight) { bd = au.swipeRight.call(aR, bf, aP, ag, ac, X, aQ, a2) } break; case e: aR.trigger("swipeUp", [aP, ag, ac, X, aQ, a2]); if (au.swipeUp) { bd = au.swipeUp.call(aR, bf, aP, ag, ac, X, aQ, a2) } break; case x: aR.trigger("swipeDown", [aP, ag, ac, X, aQ, a2]); if (au.swipeDown) { bd = au.swipeDown.call(aR, bf, aP, ag, ac, X, aQ, a2) } break } } } if (be == t) { aR.trigger("pinchStatus", [bc, aJ || null, ap || 0, ac || 0, X, H, aQ]); if (au.pinchStatus) { bd = au.pinchStatus.call(aR, bf, bc, aJ || null, ap || 0, ac || 0, X, H, aQ); if (bd === false) { return false } } if (bc == h && a9()) { switch (aJ) { case c: aR.trigger("pinchIn", [aJ || null, ap || 0, ac || 0, X, H, aQ]); if (au.pinchIn) { bd = au.pinchIn.call(aR, bf, aJ || null, ap || 0, ac || 0, X, H, aQ) } break; case A: aR.trigger("pinchOut", [aJ || null, ap || 0, ac || 0, X, H, aQ]); if (au.pinchOut) { bd = au.pinchOut.call(aR, bf, aJ || null, ap || 0, ac || 0, X, H, aQ) } break } } } if (be == B) { if (bc === q || bc === h) { clearTimeout(aW); clearTimeout(af); if (Z() && !I()) { O = ar(); aW = setTimeout(f.proxy(function () { O = null; aR.trigger("tap", [bf.target]); if (au.tap) { bd = au.tap.call(aR, bf, bf.target) } }, this), au.doubleTapThreshold) } else { O = null; aR.trigger("tap", [bf.target]); if (au.tap) { bd = au.tap.call(aR, bf, bf.target) } } } } else { if (be == j) { if (bc === q || bc === h) { clearTimeout(aW); clearTimeout(af); O = null; aR.trigger("doubletap", [bf.target]); if (au.doubleTap) { bd = au.doubleTap.call(aR, bf, bf.target) } } } else { if (be == b) { if (bc === q || bc === h) { clearTimeout(aW); O = null; aR.trigger("longtap", [bf.target]); if (au.longTap) { bd = au.longTap.call(aR, bf, bf.target) } } } } } return bd } function am() { var bc = true; if (au.threshold !== null) { bc = ag >= au.threshold } return bc } function bb() { var bc = false; if (au.cancelThreshold !== null && aP !== null) { bc = (aT(aP) - ag) >= au.cancelThreshold } return bc } function ae() { if (au.pinchThreshold !== null) { return ap >= au.pinchThreshold } return true } function aA() { var bc; if (au.maxTimeThreshold) { if (ac >= au.maxTimeThreshold) { bc = false } else { bc = true } } else { bc = true } return bc } function ak(bc, bd) { if (au.preventDefaultEvents === false) { return } if (au.allowPageScroll === m) { bc.preventDefault() } else { var be = au.allowPageScroll === s; switch (bd) { case p: if ((au.swipeLeft && be) || (!be && au.allowPageScroll != E)) { bc.preventDefault() } break; case o: if ((au.swipeRight && be) || (!be && au.allowPageScroll != E)) { bc.preventDefault() } break; case e: if ((au.swipeUp && be) || (!be && au.allowPageScroll != u)) { bc.preventDefault() } break; case x: if ((au.swipeDown && be) || (!be && au.allowPageScroll != u)) { bc.preventDefault() } break } } } function a9() { var bd = aO(); var bc = Y(); var be = ae(); return bd && bc && be } function aX() { return !!(au.pinchStatus || au.pinchIn || au.pinchOut) } function Q() { return !!(a9() && aX()) } function aV() { var bf = aA(); var bh = am(); var be = aO(); var bc = Y(); var bd = bb(); var bg = !bd && bc && be && bh && bf; return bg } function W() { return !!(au.swipe || au.swipeStatus || au.swipeLeft || au.swipeRight || au.swipeUp || au.swipeDown) } function J() { return !!(aV() && W()) } function aO() { return ((X === au.fingers || au.fingers === i) || !a) } function Y() { return aQ[0].end.x !== 0 } function a7() { return !!(au.tap) } function Z() { return !!(au.doubleTap) } function aU() { return !!(au.longTap) } function R() { if (O == null) { return false } var bc = ar(); return (Z() && ((bc - O) <= au.doubleTapThreshold)) } function I() { return R() } function aw() { return ((X === 1 || !a) && (isNaN(ag) || ag < au.threshold)) } function a0() { return ((ac > au.longTapThreshold) && (ag < r)) } function ah() { return !!(aw() && a7()) } function aG() { return !!(R() && Z()) } function ao() { return !!(a0() && aU()) } function G(bc) { a6 = ar(); ay = bc.touches.length + 1 } function S() { a6 = 0; ay = 0 } function al() { var bc = false; if (a6) { var bd = ar() - a6; if (bd <= au.fingerReleaseThreshold) { bc = true } } return bc } function aB() { return !!(aR.data(C + "_intouch") === true) } function an(bc) { if (!aR) { return } if (bc === true) { aR.bind(ax, a4); aR.bind(V, M); if (T) { aR.bind(T, L) } } else { aR.unbind(ax, a4, false); aR.unbind(V, M, false); if (T) { aR.unbind(T, L, false) } } aR.data(C + "_intouch", bc === true) } function ai(be, bc) { var bd = { start: { x: 0, y: 0 }, last: { x: 0, y: 0 }, end: { x: 0, y: 0} }; bd.start.x = bd.last.x = bd.end.x = bc.pageX || bc.clientX; bd.start.y = bd.last.y = bd.end.y = bc.pageY || bc.clientY; aQ[be] = bd; return bd } function aH(bc) { var be = bc.identifier !== undefined ? bc.identifier : 0; var bd = ad(be); if (bd === null) { bd = ai(be, bc) } bd.last.x = bd.end.x; bd.last.y = bd.end.y; bd.end.x = bc.pageX || bc.clientX; bd.end.y = bc.pageY || bc.clientY; return bd } function ad(bc) { return aQ[bc] || null } function aI(bc, bd) { bd = Math.max(bd, aT(bc)); N[bc].distance = bd } function aT(bc) { if (N[bc]) { return N[bc].distance } return undefined } function ab() { var bc = {}; bc[p] = av(p); bc[o] = av(o); bc[e] = av(e); bc[x] = av(x); return bc } function av(bc) { return { direction: bc, distance: 0} } function aM() { return a3 - U } function at(bf, be) { var bd = Math.abs(bf.x - be.x); var bc = Math.abs(bf.y - be.y); return Math.round(Math.sqrt(bd * bd + bc * bc)) } function a8(bc, bd) { var be = (bd / bc) * 1; return be.toFixed(2) } function aq() { if (H < 1) { return A } else { return c } } function aS(bd, bc) { return Math.round(Math.sqrt(Math.pow(bc.x - bd.x, 2) + Math.pow(bc.y - bd.y, 2))) } function aE(bf, bd) { var bc = bf.x - bd.x; var bh = bd.y - bf.y; var be = Math.atan2(bh, bc); var bg = Math.round(be * 180 / Math.PI); if (bg < 0) { bg = 360 - Math.abs(bg) } return bg } function aL(bd, bc) { var be = aE(bd, bc); if ((be <= 45) && (be >= 0)) { return p } else { if ((be <= 360) && (be >= 315)) { return p } else { if ((be >= 135) && (be <= 225)) { return o } else { if ((be > 45) && (be < 135)) { return x } else { return e } } } } } function ar() { var bc = new Date(); return bc.getTime() } function aY(bc) { bc = f(bc); var be = bc.offset(); var bd = { left: be.left, right: be.left + bc.outerWidth(), top: be.top, bottom: be.top + bc.outerHeight() }; return bd } function F(bc, bd) { return (bc.x > bd.left && bc.x < bd.right && bc.y > bd.top && bc.y < bd.bottom) } } })); !function (n) { "use strict"; n.fn.bsTouchSlider = function (i) { var a = n(".carousel"); return this.each(function () { function i(i) { var a = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend"; i.each(function () { var i = n(this), t = i.data("animation"); i.addClass(t).one(a, function () { i.removeClass(t) }) }) } var t = a.find(".item:first").find("[data-animation ^= 'animated']"); a.carousel(), i(t), a.on("slide.bs.carousel", function (a) { var t = n(a.relatedTarget).find("[data-animation ^= 'animated']"); i(t) }), n(".carousel .carousel-inner").swipe({ swipeLeft: function (n, i, a, t, e) { this.parent().carousel("next") }, swipeRight: function () { this.parent().carousel("prev") }, threshold: 0 }) }) } } (jQuery);



  //Initialise Bootstrap Carousel Touch Slider
  // Curently there are no option available.

  $('#bootstrap-touch-slider').bsTouchSlider();
</script>
@yield('script')
<script>
    @foreach ($errors->all() as $error)
        toastr.error("{{$error}}")
    @endforeach
</script>
</body>

</html>