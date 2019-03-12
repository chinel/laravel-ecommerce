@extends('storefront.layouts.master')
@section('title')
  Shoprite Pickup | Category
@endsection
@section('headlinks')
<link rel="stylesheet" type="text/css" href="../storefront/css/multirange.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/slick.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/contact.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/cartpage.css">


@endsection
@section('header')
<!-- push menu-->
@include('storefront.layouts.partials.topnav')

<!-- end push menu-->
<!-- Menu Mobile -->
@include('storefront.layouts.partials.mobilemenu')
<!-- Header Box -->
@include('storefront.layouts.partials.nav')
@yield('product-menu')
<!-- End Header Box -->
@endsection
@section('breads')
<li class="animate-default title-hover-red"><a href="#">Checkout</a></li>
@endsection
@section('content')
<div class="container">
    <div class="row relative">
    <form action="{{url('checkoutOrder')}}" method="post" id="submitOrder">
        @csrf
    <!-- Content Shoping Cart -->
    <div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
      <p class="title-shoping-cart">Shipping Details</p>
      <div class="relative clearfix full-width">
        <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
          <label>First Name *</label>
          <input class="full-width" type="text" name="firstname" required value="{{Auth::user()->firstname}}">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
          <label>Last Name *</label>
          <input class="full-width" type="text" name="lastname" required value="{{Auth::user()->lastname}}">
        </div>
      </div>
      <div class="relative clearfix full-width">
        <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
          <label>Email Address *</label>
          <input class="full-width" type="text" name="email" required value="{{Auth::user()->email}}">
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
          <label>Phone *</label>
          <input class="full-width" type="text" name="phone" value="{{Auth::user()->phone}}" required>
        </div>
      </div>
      <div class="form-input full-width clearfix relative">
        <label>State *</label>
        <select class="full-width" name="state">
          <option value="Lagos State">Lagos</option>
        </select>
      </div>
      <div class="form-input full-width clearfix relative">
        <label>Address *</label>
        <input class="full-width" type="text" name="address" required>
      </div>
      <div class="form-input full-width clearfix relative">
          <label>City *</label>
          <select name="city" id="" class="full-width" required>
              <option value="">-- select your city --</option>
              <option value="LEKKI-CHISCO">LEKKI-CHISCO</option>
              <option value="Abule Egba (Agbado Ijaye Road)">Abule Egba (Agbado Ijaye Road)</option>
              <option value="Abule Egba (Ajasa Command Road)">Abule Egba (Ajasa Command Road)</option>
              <option value="Abule Egba (Ajegunle)">Abule Egba (Ajegunle)</option>
              <option value="Abule Egba (Alagbado)">Abule Egba (Alagbado)</option>
              <option value="Abule Egba (Alakuko)">Abule Egba (Alakuko)</option>
              <option value="Abule Egba (Ekoro road)">Abule Egba (Ekoro road)</option>
              <option value="Abule Egba (Meiran Road)">Abule Egba (Meiran Road)</option>
              <option value="Abule Egba (New Oko Oba)">Abule Egba (New Oko Oba)</option>
              <option value="Abule Egba (Old Otta Road)">Abule Egba (Old Otta Road)</option>
              <option value="AGBARA INDUSTRIAL ESTATE (Lagos)">AGBARA INDUSTRIAL ESTATE (Lagos)</option>
              <option value="Agege (Ajuwon Akute Road)">Agege (Ajuwon Akute Road)</option>
              <option value="Agege (Dopemu)">Agege (Dopemu)</option>
              <option value="Agege (Iju Road)">Agege (Iju Road)</option>
              <option value="Agege (Old Abeokuta Road)">Agege (Old Abeokuta Road)</option>
              <option value="Agege (Old Otta Road)">Agege (Old Otta Road)</option>
              <option value="Agege (Orile Agege">Agege (Orile Agege)</option>
              <option value="AGILITI">AGILITI</option>
              <option value="AGRIC">AGRIC</option>
              <option value="AJAO ESTATE">AJAO ESTATE</option>
              <option value="ALABA (INTERNATIONAL)">ALABA (INTERNATIONAL)</option>
              <option value="ALABA (RAGO)">ALABA (RAGO)</option>
              <option value="ALABA (SURU)">ALABA (SURU)</option>
              <option value="ALAPERE">ALAPERE</option>
              <option value="ALFA BEACH">ALFA BEACH</option>
              <option value="AMUWO">AMUWO</option>
              <option value="ANTHONY VILLAGE">ANTHONY VILLAGE</option>
              <option value="Apapa (Ajegunle)">Apapa (Ajegunle)</option>
              <option value="Apapa (Amukoko)">Apapa (Amukoko)</option>
              <option value="Apapa (GRA)">Apapa (GRA)</option>
              <option value="Apapa (Kiri kiri)">Apapa (Kiri kiri)</option>
              <option value="Apapa (Olodi)">Apapa (Olodi)</option>
              <option value="Apapa (Suru Alaba)">Apapa (Suru Alaba)</option>
              <option value="Apapa (Tincan)">Apapa (Tincan)</option>
              <option value="Apapa (Warf Rd)">Apapa (Warf Rd)</option>
              <option value="Baale">Baale</option>
              <option value="BADAGRY (AJARA)">BADAGRY (AJARA)</option>
              <option value="BADAGRY (AJIBADE)">BADAGRY (AJIBADE)</option>
              <option value="BADAGRY (ARADAGUN)">BADAGRY (ARADAGUN)</option>
              <option value="BADAGRY (BADAGRY TOWN)">BADAGRY (BADAGRY TOWN)</option>
              <option value="BADAGRY (CHECKING POINT)">BADAGRY (CHECKING POINT)</option>
              <option value="BADAGRY (CHURCH GATE)">BADAGRY (CHURCH GATE)</option>
              <option value="BADAGRY (IBIYE)">BADAGRY (IBIYE)</option>
              <option value="BADAGRY (IKOGA)">BADAGRY (IKOGA)</option>
              <option value="BADAGRY (IMEKE)">BADAGRY (IMEKE)</option>
              <option value="BADAGRY (IWORO-AJIDO)">BADAGRY (IWORO-AJIDO)</option>
              <option value="BADAGRY (JAH-MICHAEL)">BADAGRY (JAH-MICHAEL)</option>
              <option value="BADAGRY (MAGBON)">BADAGRY (MAGBON)</option>
              <option value="BADAGRY (MOROGBO)">BADAGRY (MOROGBO)</option>
              <option value="BADAGRY (MOWO)">BADAGRY (MOWO)</option>
              <option value="BADAGRY (OKO-AFOR)">BADAGRY (OKO-AFOR)</option>
              <option value="BADAGRY (OWODE APA)">BADAGRY (OWODE APA)</option>
              <option value="BADAGRY (PURE WATER)">BADAGRY (PURE WATER)</option>
              <option value="BADAGRY (TOLL GATE)">BADAGRY (TOLL GATE)</option>
              <option value="BERGER">BERGER</option>
              <option value="Doyin">Doyin</option>
              <option value="EJIGBO (Lagos)">EJIGBO (Lagos)</option>
              <option value="EPE">EPE</option>
              <option value="FESTAC (1st Avenue)">FESTAC (1st Avenue)</option>
              <option value="FESTAC (2nd Avenue)">FESTAC (2nd Avenue)</option>
              <option value="FESTAC (3rd Avenue)">FESTAC (3rd Avenue)</option>
              <option value="FESTAC (4th Avenue)">FESTAC (4th Avenue)</option>
              <option value="FESTAC (5th Avenue)">FESTAC (5th Avenue)</option>
              <option value="FESTAC (6th Avenue)">FESTAC (6th Avenue)</option>
              <option value="FESTAC (7th Avenue)">FESTAC (7th Avenue)</option>
              <option value="GBAGADA">GBAGADA</option>
              <option value="IDIMU">IDIMU</option>
              <option value="IGANDO">IGANDO</option>
              <option value="Igbogbo">Igbogbo</option>
              <option value="IJANIKIN<">IJANIKIN</option>
              <option value="Ijede">Ijede</option>
              <option value="IJEGUN IKOTUN">IJEGUN IKOTUN</option>
              <option value="IJORA">IJORA</option>
              <option value="Ikeja (ADENIYI JONES)">Ikeja (ADENIYI JONES)</option>
              <option value="Ikeja (ALAUSA)">Ikeja (ALAUSA)</option>
              <option value="Ikeja (ALLEN AVENUE)">Ikeja (ALLEN AVENUE)</option>
              <option value="Ikeja (computer village)">Ikeja (computer village)</option>
              <option value="Ikeja (GRA)">Ikeja (GRA)</option>
              <option value="Ikeja (MANGORO)">Ikeja (MANGORO)</option>
              <option value="IKEJA (Murtala Muhammed Airport)">IKEJA (Murtala Muhammed Airport)</option>
              <option value="Ikeja (OBA-AKRAN)">Ikeja (OBA-AKRAN)</option>
              <option value="Ikeja (OGBA)">Ikeja (OGBA)</option>
              <option value="Ikeja (OPEBI)">Ikeja (OPEBI)</option>
              <option value="IKORODU (Adamo)">IKORODU (Adamo)</option>
              <option value="IKORODU (Agbede)">IKORODU (Agbede)</option>
              <option value="Ikorodu (Agbowa)">Ikorodu (Agbowa)</option>
              <option value="IKORODU (Bayeku)">IKORODU (Bayeku)</option>
              <option value="IKORODU (Eyita)">IKORODU (Eyita)</option>
              <option value="IKORODU (Gberigbe)">IKORODU (Gberigbe)</option>
              <option value="IKORODU (Imota)">IKORODU (Imota)</option>
              <option value="IKORODU (Ita oluwo)">IKORODU (Ita oluwo)</option>
              <option value="IKORODU (Itamaga)">IKORODU (Itamaga)</option>
              <option value="IKORODU (Offin)">IKORODU (Offin)</option>
              <option value="IKORODU (Owode-Ibese)">IKORODU (Owode-Ibese)</option>
              <option value="IKORODU(Elepe)">IKORODU(Elepe)</option>
              <option value="IKORODU(Laspotech)">IKORODU(Laspotech)</option>
              <option value="Ikorodu(Ogolonto)">Ikorodu(Ogolonto)</option>
              <option value="IKORODU(Sabo)">IKORODU(Sabo)</option>
              <option value="IKOTA">IKOTA</option>
              <option value="IKOTUN">IKOTUN</option>
              <option value="Ikoyi (Awolowo Road)">Ikoyi (Awolowo Road)</option>
              <option value="Ikoyi (Bourdillon)">Ikoyi (Bourdillon)</option>
              <option value="Ikoyi (Dolphin)">Ikoyi (Dolphin)</option>
              <option value="Ikoyi (Glover road)">Ikoyi (Glover road)</option>
              <option value="Ikoyi (Keffi)">Ikoyi (Keffi)</option>
              <option value="Ikoyi (Kings way road)">Ikoyi (Kings way road)</option>
              <option value="Ikoyi (Obalende)">Ikoyi (Obalende)</option>
              <option value="Ikoyi (Queens Drive)">Ikoyi (Queens Drive)</option>
              <option value="IKOYI MTN (USE ONLY FOR PICKUP STATION)">IKOYI MTN (USE ONLY FOR PICKUP STATION)</option>
              <option value="ILAJE (BARIGA)">ILAJE (BARIGA)</option>
              <option value="ILOGBO">ILOGBO</option>
              <option value="ILUPEJU (Lagos)">ILUPEJU (Lagos)</option>
              <option value="ISHERI IKOTUN">ISHERI IKOTUN</option>
              <option value="ISHERI MAGODO">ISHERI MAGODO</option>
              <option value="ISOLO">ISOLO</option>
              <option value="IYANA IBA">IYANA IBA</option>
              <option value="Iyana Ipaja (Abesan)">Iyana Ipaja (Abesan)</option>
              <option value="Iyana Ipaja (Ayobo Road)">Iyana Ipaja (Ayobo Road)</option>
              <option value="Iyana Ipaja (Command Road)">Iyana Ipaja (Command Road)</option>
              <option value="Iyana Ipaja (Egbeda)">Iyana Ipaja (Egbeda)</option>
              <option value="Iyana Ipaja (Ikola Road)">Iyana Ipaja (Ikola Road)</option>
              <option value="Iyana Ipaja (Iyana Ipaja Road)">Iyana Ipaja (Iyana Ipaja Road)</option>
              <option value="Iyana Ipaja (Shasha)">Iyana Ipaja (Shasha)</option>
              <option value="IYANA ISHASHI">IYANA ISHASHI</option>
              <option value="JANKANDE (ISOLO)">JANKANDE (ISOLO)</option>
              <option value="KETU">KETU</option>
              <option value="Lagos Island (Adeniji)">Lagos Island (Adeniji)</option>
              <option value="Lagos Island (Marina)">Lagos Island (Marina)</option>
              <option value="Lagos Island (Onikan)">Lagos Island (Onikan)</option>
              <option value="Lagos Island (Sura)">Lagos Island (Sura)</option>
              <option value="Lagos Island (TBS)">Lagos Island (TBS)</option>
              <option value="LEKKI -CHEVRON">LEKKI -CHEVRON</option>
              <option value="LEKKI -VGC">LEKKI -VGC</option>
              <option value="Lekki Phase 1 (Admiralty Road)">Lekki Phase 1 (Admiralty Road)</option>
              <option value="Lekki Phase 1 (Admiralty way)">Lekki Phase 1 (Admiralty way)</option>
              <option value="Lekki Phase 1 (Bishop Durosimi Etim)">Lekki Phase 1 (Bishop Durosimi Etim)</option>
              <option value="Lekki Phase 1 (F.T Kuboye street)">Lekki Phase 1 (F.T Kuboye street)</option>
              <option value="Lekki Phase 1 (Fola Osibo)">Lekki Phase 1 (Fola Osibo)</option>
              <option value="Lekki Phase 1 (Omorinre Johnson)">Lekki Phase 1 (Omorinre Johnson)</option>
              <option value="LEKKI-AGUNGI">LEKKI-AGUNGI</option>
              <option value="LEKKI-AJAH (ABIJO)">LEKKI-AJAH (ABIJO)</option>
              <option value="LEKKI-AJAH (ABRAHAM ADESANYA)">LEKKI-AJAH (ABRAHAM ADESANYA)</option>
              <option value="LEKKI-AJAH (ADDO ROAD)">LEKKI-AJAH (ADDO ROAD)</option>
              <option value="LEKKI-AJAH (AWOYAYA)">LEKKI-AJAH (AWOYAYA)</option>
              <option value="LEKKI-AJAH (BADORE)">LEKKI-AJAH (BADORE)</option>
              <option value="LEKKI-AJAH (ILAJE)">LEKKI-AJAH (ILAJE)</option>
              <option value="LEKKI-AJAH (ILASAN)">LEKKI-AJAH (ILASAN)</option>
              <option value="LEKKI-AJAH (JAKANDE)">LEKKI-AJAH (JAKANDE)</option>
              <option value="LEKKI-AJAH (LAKOWE)">LEKKI-AJAH (LAKOWE)</option>
              <option value="LEKKI-AJAH (LANGBASA)">LEKKI-AJAH (LANGBASA)</option>
              <option value="LEKKI-AJAH (SANGOTEDO)">LEKKI-AJAH (SANGOTEDO)</option>
              <option value="LEKKI-ELF">LEKKI-ELF</option>
              <option value="LEKKI-IGBOEFON">LEKKI-IGBOEFON</option>
              <option value="LEKKI-IKATE ELEGUSHI">LEKKI-IKATE ELEGUSHI</option>
              <option value="LEKKI-JAKANDE (KAZEEM ELETU)">LEKKI-JAKANDE (KAZEEM ELETU)</option>
              <option value="LEKKI-MARUWA">LEKKI-MARUWA</option>
              <option value="LEKKI-ONIRU ESTATE">LEKKI-ONIRU ESTATE</option>
              <option value="LEKKI-OSAPA LONDON">LEKKI-OSAPA LONDON</option>
              <option value="MAGODO">MAGODO</option>
              <option value="MARYLAND (MENDE)">MARYLAND (MENDE)</option>
              <option value="MARYLAND (ONIGBONGBO)">MARYLAND (ONIGBONGBO)</option>
              <option value="MEBANMU">MEBANMU</option>
              <option value="MILE 12">MILE 12</option>
              <option value="MILE 2">MILE 2</option>
              <option value="MUSHIN">MUSHIN</option>
              <option value="OBADORE">OBADORE</option>
              <option value="Odongunyan">Odongunyan</option>
              <option value="Odunade">Odunade</option>
              <option value="OGUDU">OGUDU</option>
              <option value="OJO">OJO</option>
              <option value="OJO-AFROMEDIA">OJO-AFROMEDIA</option>
              <option value="OJO-AJAGBANDI">OJO-AJAGBANDI</option>
              <option value="OJO-MILITARY CANTONMENT">OJO-MILITARY CANTONMENT</option>
              <option value="OJODU">OJODU</option>
              <option value="OJOKORO">OJOKORO</option>
              <option value="OJOTA">OJOTA</option>
              <option value="OKOKOMAIKO">OKOKOMAIKO</option>
              <option value="OKOTA">OKOTA</option>
              <option value="Omole Phase 1">Omole Phase 1</option>
              <option value="Omole Phase 2">Omole Phase 2</option>
              <option value="OREGUN">OREGUN</option>
              <option value="Oreyo- Igbe">Oreyo- Igbe</option>
              <option value="ORILE">ORILE</option>
              <option value="OSHODI-BOLADE">OSHODI-BOLADE</option>
              <option value="OSHODI-ISOLO">OSHODI-ISOLO</option>
              <option value="OSHODI-MAFOLUKU">OSHODI-MAFOLUKU</option>
              <option value="OSHODI-ORILE">OSHODI-ORILE</option>
              <option value="OSHODI-SHOGUNLE">OSHODI-SHOGUNLE</option>
              <option value="Owode Onirin">Owode Onirin</option>
              <option value="SANGOTEDO (LEKKI)">SANGOTEDO (LEKKI)</option>
              <option value="Sari-Iganmu">Sari-Iganmu</option>
              <option value="SATELLITE TOWN">SATELLITE TOWN</option>
              <option value="SEME">SEME</option>
              <option value="SOMOLU">SOMOLU</option>
              <option value="Surulere (Adeniran Ogunsanya)">Surulere (Adeniran Ogunsanya)</option>
              <option value="Surulere (Aguda)">Surulere (Aguda)</option>
              <option value="Surulere (Bode Thomas)">Surulere (Bode Thomas)</option>
              <option value="Surulere (Fatia Shitta)">Surulere (Fatia Shitta)</option>
              <option value="Surulere (Idi Araba)">Surulere (Idi Araba)</option>
              <option value="Surulere (Ijesha)">Surulere (Ijesha)</option>
              <option value="Surulere (Iponri)">Surulere (Iponri)</option>
              <option value="Surulere (Itire)">Surulere (Itire)</option>
              <option value="Surulere (Lawanson)">Surulere (Lawanson)</option>
              <option value="Surulere (Masha)">Surulere (Masha)</option>
              <option value="Surulere (Ogunlana drive)">Surulere (Ogunlana drive)</option>
              <option value="Surulere (Ojuelegba)">Surulere (Ojuelegba)</option>
              <option value="TOPO">TOPO</option>
              <option value="TRADE FAIR">TRADE FAIR</option>
              <option value="Victoria Island (Adeola Odeku)">Victoria Island (Adeola Odeku)</option>
              <option value="Victoria Island (Adetokunbo Ademola)">Victoria Island (Adetokunbo Ademola)</option>
              <option value="Victoria Island (Ahmed Bello way)">Victoria Island (Ahmed Bello way)</option>
              <option value="Victoria Island (Ajose Adeogun)">Victoria Island (Ajose Adeogun)</option>
              <option value="Victoria Island (Akin Adeshola)">Victoria Island (Akin Adeshola)</option>
              <option value="Victoria Island (Bishop Oluwale)">Victoria Island (Bishop Oluwale)</option>
              <option value="Victoria Island (Kofo Abayomi)">Victoria Island (Kofo Abayomi)</option>
              <option value="Victoria Island (Yusuf Abiodun)">Victoria Island (Yusuf Abiodun)</option>
              <option value="YABA">YABA</option>
              <option value="YABA-SABO">YABA-SABO</option>
              <option value="YABA-UNILAG">YABA-UNILAG</option>
              <option value="YABATECH">YABATECH</option>
          </select>
      </div>

    </div>
    <!-- End Content Shoping Cart -->
    <!-- Content Right -->
    <div class="col-md-4 col-sm-12 col-xs-12 right-content-shoping relative clear-padding-right">
      <p class="title-shoping-cart">Your Order</p>
      <div class="full-width relative overfollow-hidden cartHolder">
          <?php $total = 0;
          $currentDelivery = 0;

          ?>
          @foreach(session('cart') as $value1)
              @foreach($value1 as $key1 => $value)
                      <?php $total += ((int)$value['quantity'] > 0) ? ((int)$value['quantity'] * (int)$value['price']) : (int)$value['price']; ?>

                      <div class="relative clearfix full-width product-order-sidebar border no-border-t no-border-r no-border-l">
          <div class="image-product-order-sidebar center-vertical-image">
            <img src="{{$value['photo']}}" alt="" />
          </div>
          <div class="relative info-product-order-sidebar">
            <p class="title-product top-margin-15-default animate-default title-hover-black">

                <a href="#">{{$value['name']}}
                    @if($value['quantity'] > 0)
                  &nbsp; X{{$value['quantity']}}
              @else
                  Nil

              @endif
                    </a>
                    </p>
            <p class="price-product">₦{{$value['price']}}</p>
          </div>
        </div>

                  @endforeach
              @endforeach
      </div>
      <p class="title-shoping-cart">Cart Total</p>
      <div class="full-width relative cart-total bg-gray  clearfix">
        <div class="relative justify-content bottom-padding-15-default border no-border-t no-border-r no-border-l">
          <p>Subtotal</p>
          <p class="text-red price-shoping-cart">₦<span id="subtotal">{{$total}}</span></p>
        </div>

        <div class="relative border top-margin-15-default no-border-t no-border-r no-border-l">
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <p class="bottom-margin-15-default">Service Fee</p>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <?php $serviceFee = $total > 50000 ? ($serviceFee->higherSubtotal/100) * $total : ($serviceFee->lowerSubtotal/100) * $total; ?>
                  <p class="price-gray-sidebar text-right">₦<span id="serviceFee">{{$serviceFee}}</span></p>

              </div>
          </div>

        </div>
          <div class="relative border top-margin-15-default no-border-t no-border-r no-border-l">
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <p class="bottom-margin-15-default">Shipping Fee
                      <br>
                      (<small>{{$deliveryDetails->title}} - {{$deliveryDetails->duration}} <?php echo (int)$deliveryDetails->duration > 1 ? $deliveryDetails->type."s": $deliveryDetails->type ;?></small>)
                  </p>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <p class="price-gray-sidebar text-right"> ₦<span id="deliveryFee">{{$deliveryDetails->fee}}</span>  </p>

              </div>
          </div>

        </div>
        <div class="relative justify-content top-margin-15-default">
          <p class="bold">Total</p>
          <p class="text-red price-shoping-cart">₦{{$deliveryDetails->fee + $serviceFee + $total}}</p>
        </div>
      </div>
        <input type="hidden" name="deliveryId" value="{{$deliveryDetails->id}}">
        <input type="hidden" name="referenceCode" id="referenceCode">
      <div class="full-width relative payment-box bg-gray top-margin-15-default clearfix">
        <ul class=" list-radius title-check-box-black clear-margin clear-margin">
          <li>
            <label class="">  <input type="radio" name="payment" checked="" value="Pay on delivery" id="payOnDelivery"> Pay on Delivery <img class="left-margin-15-default payImg" src="{{asset('storefront/img/on-delivery.png')}}" alt="Pay Online"/>


              </label>
              <br><p class="info-payment">Please ensure that your Shipping details are correct</p>
          </li>
          <li>
            <label class="">   <input type="radio" name="payment" value="Online Payment" id="payOnline"> Pay Online <img class="left-margin-15-default payImg" src="{{asset('storefront/img/online-payment.png')}}" alt="Pay Online"/>


              </label>
          </li>
        </ul>
      </div>
      <button class="btn-proceed-checkout full-width top-margin-15-default" type="submit">Place Order</button>
    </div>
    <!-- End Content Right -->
    </form>
  </div>
</div>
@endsection

@section('scripts')
    <script src="../storefront/js/multirange.js" defer=""></script>
    <script src="../storefront/js/slick.min.js" defer=""></script>
    <script src="../storefront/js/owl.carousel.min.js" defer=""></script>
    <script src="../storefront/js/ZScroll.js" defer=""></script>
    <script src="../storefront/js/jquery.validate.min.js" defer=""></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".cartHolder").ZScroll({ScrollBarColor:"#C3000D",
                ScrollBarWidth:10});
            $("#submitOrder").validate(
                {
                    submitHandler: function(form, event) {
                        if($('#payOnline').is(':checked')){
                            event.preventDefault();
                            payWithPaystack();
                            //form.submit();
                        }else if ($('#payOnDelivery').is(':checked')){
                            form.submit();
                        }

                    }
                }
            );
           /* $('#submitOrder').submit(function (e) {
                e.preventDefault();
                $this = $(this);

                if($('#payOnline').is(':checked')){
                    payWithPaystack();
                }else if ($('#payOnDelivery').is(':checked')){

                }
            })*/

        });

        function payWithPaystack(){
            var handler = PaystackPop.setup({
                key: 'pk_test_bf007039d3fa763ae41f70fd470ec7e7f8064887',
                email: '<?php echo Auth::user()->email; ?>',
                amount: '<?php echo $deliveryDetails->fee + $serviceFee + $total;?>00',
                currency: "NGN",
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                callback: function(response){
                    $('#referenceCode').val(response.reference);
                    document.getElementById("submitOrder").submit();
                   // document.getElementById("referenceCode").value =
                    //window.location = '/recordOrder/'+response.reference;

                },
                onClose: function(){

                }
            });
            handler.openIframe();
        }

    </script>

@endsection
