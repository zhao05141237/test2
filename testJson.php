<?php

//item_id,title,pic_url,coupon_info,coupon_url,price,original_price,commission_rate,src_cat_id,shop_id,coupon_amount,sales_qty,item_time,expire_time,bid,user_type,publish,platform

$param = ['data'=>[
    ['item_id'=>222,'title'=>'34567','pic_url'=>'abcde','coupon_info'=>'abcde','coupon_url'=>'abcde','price'=>'79','original_price'=>'66','commission_rate'=>'6.6','src_cat_id'=>'66','shop_id'=>'712','coupon_amount'=>'123','sales_qty'=>'223'],
    ['item_id'=>333,'title'=>'34568','pic_url'=>'abcde','coupon_info'=>'abcde','coupon_url'=>'abcde','price'=>'79','original_price'=>'66','commission_rate'=>'6.6','src_cat_id'=>'66','shop_id'=>'712','coupon_amount'=>'123','sales_qty'=>'223'],
    ['item_id'=>444,'title'=>'34569','pic_url'=>'abcde','coupon_info'=>'abcde','coupon_url'=>'abcde','price'=>'79','original_price'=>'66','commission_rate'=>'6.6','src_cat_id'=>'66','shop_id'=>'712','coupon_amount'=>'123','sales_qty'=>'223'],
    ['item_id'=>555,'title'=>'34999','pic_url'=>'abcde','coupon_info'=>'abcde','coupon_url'=>'abcde','price'=>'79','original_price'=>'66','commission_rate'=>'6.6','src_cat_id'=>'66','shop_id'=>'712','coupon_amount'=>'123','sales_qty'=>'223'],
    ['item_id'=>666,'title'=>'34555','pic_url'=>'abcde','coupon_info'=>'abcde','coupon_url'=>'abcde','price'=>'79','original_price'=>'66','commission_rate'=>'6.6','src_cat_id'=>'66','shop_id'=>'712','coupon_amount'=>'123','sales_qty'=>'223'],
    ['item_id'=>777,'title'=>'34777','pic_url'=>'abcde','coupon_info'=>'abcde','coupon_url'=>'abcde','price'=>'79','original_price'=>'66','commission_rate'=>'6.6','src_cat_id'=>'66','shop_id'=>'712','coupon_amount'=>'123','sales_qty'=>'223'],
    ]];

echo json_encode($param);