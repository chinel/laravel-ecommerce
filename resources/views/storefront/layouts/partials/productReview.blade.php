<div class="row">
<div class="col-sm-7">
    <hr/>
    <div class="review-block">
        @foreach($productReviews as $productReview)
        <div class="row">
            <div class="col-sm-3">
                <?php $checkIfVerified = $productReview->checkIfUserBoughtProduct($productReview->user_id,$productReview->product_id)?>
                @if(!empty($checkIfVerified))
                    <img src="{{asset('storefront/img/verified.png')}}" class="img-rounded">
                @endif
                        <div class="review-block-name"><a href="#">{{$productReview->getFullName($productReview->user_id)->firstname}} {{$productReview->getFullName($productReview->user_id)->lastname}}</a></div>
                <div class="review-block-date">{{date_format(date_create($productReview->created_at), "F jS, Y")}}</div>
            </div>
            <div class="col-sm-9">
                <div class="review-block-rate">

                    @switch($productReview->rating)
                        @case(1)
                        <div class="clearfix ranking-product-category ranking-color">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        @break
                        @case(2)
                        <div class="clearfix ranking-product-category ranking-color">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        @break
                        @case(3)
                        <div class="clearfix ranking-product-category ranking-color">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        @break
                        @case(4)
                        <div class="clearfix ranking-product-category ranking-color">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        @break
                        @case(5)
                        <div class="clearfix ranking-product-category ranking-color">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        @break
                        @default

                        <div class="clearfix ranking-product-category ranking-color">
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        @break
                    @endswitch
                </div>
                <div class="review-block-title">{{$productReview->title}}</div>
                <div class="review-block-description">{{$productReview->content}}</div>
            </div>
        </div>
        <hr/>
       @endforeach
    </div>
</div>
</div>
<div class="row text-center">
    <div class="col-md-8">
        <div class="pagging relative">
        {!! $productReviews->render() !!}
        </div>
    </div>
</div>
