<?php
function totalCartItem(){
    if (\Illuminate\Support\Facades\Auth::check()){
        $user_id=\Illuminate\Support\Facades\Auth::user()->id;
        $totalcartItem=\App\Models\Cart::where('user_id',$user_id)->count();
    }else{
        $session_id=\Illuminate\Support\Facades\Session::get('session_id');
        $totalcartItem=\App\Models\Cart::where('session_id',$session_id)->count();
    }
    return $totalcartItem;
}
function vote($id){
    $voteProduct=\App\Models\Comment::where('product_id',$id)->get()->all();

    $total=0;
    foreach ($voteProduct as $value){
        $SumVoteProduct=$value['price'];
        $total+=$SumVoteProduct;
        $SumVoteProduct1=$value['value'];
        $total+=$SumVoteProduct1;
        $SumVoteProduct3=$value['quality'];
        $total+=$SumVoteProduct3;
    }
    return $total;
}
function GetSocial(){
    $getSocial=\App\Models\Setting::get()->first();
    return $getSocial;
}

