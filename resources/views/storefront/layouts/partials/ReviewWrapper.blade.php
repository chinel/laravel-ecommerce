<div class="row">
    <div class="col-sm-3">
        <h4>Average user rating</h4>
        <h2 class="bold padding-bottom-7"><small>{{$productDetails->getAverageRatingOfPdt($productDetails->id)}}</small> <small>/ 5</small></h2>

        <?php $averageRating = $productDetails->getAverageRatingOfPdt($productDetails->id); ?>
        @switch($averageRating)
            @case(1)
            <div class="clearfix  ranking-color">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            @break
            @case(2)
            <div class="clearfix  ranking-color">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            @break
            @case(3)
            <div class="clearfix  ranking-color">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            @break
            @case(4)
            <div class="clearfix  ranking-color">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            @break
            @case(5)
            <div class="clearfix  ranking-color">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            @break
            @default

            <div class="clearfix  ranking-color">
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            @break
        @endswitch

        <div>
            <span class="glyphicon glyphicon-user"></span> {{number_format($productDetails->getTotalRatingOfPdt($productDetails->id))}} total
        </div>
    </div>
    <div class="col-sm-3">
        <h4>Rating breakdown</h4>
        <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: {{$productDetails->getPercentageRatingOfProductByRate(5, $productDetails->id)}}%">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin-left:10px;">{{$productDetails->getNoOfRatingsBByValue(5,$productDetails->id)}}</div>
        </div>
        <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: {{$productDetails->getPercentageRatingOfProductByRate(4, $productDetails->id)}}%">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin-left:10px;">{{$productDetails->getNoOfRatingsBByValue(4,$productDetails->id)}}</div>
        </div>
        <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: {{$productDetails->getPercentageRatingOfProductByRate(3, $productDetails->id)}}%">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin-left:10px;">{{$productDetails->getNoOfRatingsBByValue(3,$productDetails->id)}}</div>
        </div>
        <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: {{$productDetails->getPercentageRatingOfProductByRate(2, $productDetails->id)}}%">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin-left:10px;">{{$productDetails->getNoOfRatingsBByValue(2,$productDetails->id)}}</div>
        </div>
        <div class="pull-left">
            <div class="pull-left" style="width:35px; line-height:1;">
                <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width:180px;">
                <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: {{$productDetails->getPercentageRatingOfProductByRate(1, $productDetails->id)}}%">
                        <span class="sr-only">80% Complete (danger)</span>
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin-left:10px;">{{$productDetails->getNoOfRatingsBByValue(1,$productDetails->id)}}</div>
        </div>
    </div>
    <div class="col-sm-3">

    </div>
</div>

<div class="row" style="margin-top:40px;">
    <div class="col-md-6">
        <div class="well well-sm" style="background-color: #ffffff!important;background-image: none;">
            <div class="text-right">
                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
            </div>

            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="{{url('/writeReview')}}" method="post" id="writeReview">
                        <div class="row" style="margin-bottom: 20px;">
                            <input type="hidden" name="product_id" value="{{$productDetails->id}}" id="productId1">

                            <div class="col-md-12">
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="title" required name="title">

                            </div>
                        </div>
                        <input id="ratings-hidden" name="rating" type="hidden" value="1">

                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-12">
                                <label for="">Review</label>
                                <textarea class="form-control animated" cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5" required></textarea>

                            </div>
                        </div>
                        <div class="text-right">
                            <div class="stars starrr" data-rating="1"></div>
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success" type="submit" id="submitReview">Save</button>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <img id="imgLoader" src="{{asset('storefront/img/spinner.gif')}}" class="pull-right img-responsive" alt="" style="display: none;">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12">
                                <div id="messageWrapper">

                                </div>
                            </div>
                        </div>

                        <a id="reviewUrl" style="display: none;"  href="{{url('/ajaxReview/'.str_replace('.', '_', urlencode($productDetails->title)))}}" class="cartIcon"></a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
