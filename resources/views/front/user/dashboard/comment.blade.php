@extends('front.user.dashboard.dashboard')
@section('content')
<div class="box-collateral box-reviews" id="customer-reviews">
<div class="box-reviews2">
            <h3>Your Products Reviews</h3>
            <div class="box visible">
                <ul>
                    @foreach($comments as $comment)
                    <li>
                        <table class="ratings-table">
                            <tbody>
                                <tr>
                                    <th>Value</th>
                                    <td>
                                        <div class="rating">
                                            @if($comment->value>=1)
                                                <i class="fa fa-star"></i>
                                            @endif
                                            @if($comment->value>=2)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->value>=3)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->value>=4)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->value>=5)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Quality</th>
                                    <td>
                                        <div class="rating">
                                            @if($comment->quality>=1)
                                                <i class="fa fa-star"></i>
                                            @endif
                                            @if($comment->quality>=2)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->quality>=3)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->quality>=4)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->quality>=5)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>
                                        <div class="rating">
                                            @if($comment->price>=1)
                                                <i class="fa fa-star"></i>
                                            @endif
                                            @if($comment->price>=2)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->price>=3)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->price>=4)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($comment->price>=5)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="review">
                            <h6><a href="{{url('/product/'.$comment->product->product_name)}}">{{$comment->product->product_name}}</a></h6>
                            <small>Review by <span>You</span>on {{$comment->created_at->diffForHumans()}} </small>
                            <div class="review-txt"> {{$comment->comment}}.</div>
                        </div>
                    </li>
                    @endforeach
                        {{$comments->links()}}
                </ul>
            </div>

        </div>
</div>
@endsection
