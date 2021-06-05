<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->truncate();

        DB::table('product')->insert([
            'type_id' => 1,
            'shop_id' => 1,
            'name' => "ขวัญฟ้า ใบเมี่ยงไรซ์เบอรี่ S",
            'detail' => "เหมาะสำหรับ ทำห่อปอเปี๊ยะ แหนมเนือง สลัดโรลเพียงนำแผ่นแป้งไปชุบน้ำ แล้วปล่อยให้หมาด นำไปห่อรับประทานได้ทันทีผลิตในประเทศไทย สะอาด ปลอดภัย โรงงานได้รับมาตรฐานอุตสาหกรรมและ อย.ประเทศไทย",   
            'img_product' => "product/W9O7ZPagZVd8XpjqDkhzaSWqAuWNiMa9YT8FQcXU.jpeg", 
            'weight' => 100,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 39,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 1,
            'saleprice' => 39 ,
        ]);
        DB::table('product')->insert([
            'type_id' => 1,
            'shop_id' => 1,
            'name' => "ขวัญฟ้า ใบเมี่ยงไรซ์เบอรี่ M",
            'detail' => "เหมาะสำหรับ ทำห่อปอเปี๊ยะ แหนมเนือง สลัดโรลเพียงนำแผ่นแป้งไปชุบน้ำ แล้วปล่อยให้หมาด นำไปห่อรับประทานได้ทันทีผลิตในประเทศไทย สะอาด ปลอดภัย โรงงานได้รับมาตรฐานอุตสาหกรรมและ อย.ประเทศไทย",   
            'img_product' => "product/zjefWQnygVairsXS5hIQ9g4mBxM9IFKbOGOAF1is.jpeg", 
            'weight' => 100,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 49,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 1,
            'saleprice' => 49 ,
        ]);
        DB::table('product')->insert([
            'type_id' =>1,
            'shop_id' => 1,
            'name' => "ขวัญฟ้า ใบเมี่ยงสีขาว S",
            'detail' => "เหมาะสำหรับ ทำห่อปอเปี๊ยะ แหนมเนือง สลัดโรลเพียงนำแผ่นแป้งไปชุบน้ำ แล้วปล่อยให้หมาด นำไปห่อรับประทานได้ทันทีผลิตในประเทศไทย สะอาด ปลอดภัย โรงงานได้รับมาตรฐานอุตสาหกรรมและ อย.ประเทศไทย",   
            'img_product' => "product/X2pgDB8MexFkAOoOTqixPRjUTcZuRLcv7XSIxcWZ.jpeg", 
            'weight' => 100,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 39,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 1,
            'saleprice' => 39 ,
        ]);
        DB::table('product')->insert([
            'type_id' => 1,
            'shop_id' => 1,
            'name' => "ขวัญฟ้า ใบเมี่ยงสีขาว M",
            'detail' => "เหมาะสำหรับ ทำห่อปอเปี๊ยะ แหนมเนือง สลัดโรลเพียงนำแผ่นแป้งไปชุบน้ำ แล้วปล่อยให้หมาด นำไปห่อรับประทานได้ทันทีผลิตในประเทศไทย สะอาด ปลอดภัย โรงงานได้รับมาตรฐานอุตสาหกรรมและ อย.ประเทศไทย",  
            'img_product' => "product/ykK1pLpo1xgJw7WAugWwBUyY5kAExOY8RAnCl38P.jpeg",  
            'weight' => 100,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 49,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 1,
            'saleprice' => 49 ,
        ]);
        DB::table('product')->insert([
            'type_id' => 1,
            'shop_id' => 1,
            'name' => "ขวัญฟ้า ใบเมี่ยงไรซ์เบอรี่ L",
            'detail' => "เหมาะสำหรับ ทำห่อปอเปี๊ยะ แหนมเนือง สลัดโรลเพียงนำแผ่นแป้งไปชุบน้ำ แล้วปล่อยให้หมาด นำไปห่อรับประทานได้ทันทีผลิตในประเทศไทย สะอาด ปลอดภัย โรงงานได้รับมาตรฐานอุตสาหกรรมและ อย.ประเทศไทย",   
            'img_product' => "product/117400593_1993478564121640_6840555921631892229_o.jpg", 
            'weight' => 100,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 89,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 1,
            'saleprice' => 89 ,
        ]);
        DB::table('product')->insert([
            'type_id' => 1,
            'shop_id' => 1,
            'name' => "ขวัญฟ้า ใบเมี่ยงสีขาว L",
            'detail' => "เหมาะสำหรับ ทำห่อปอเปี๊ยะ แหนมเนือง สลัดโรลเพียงนำแผ่นแป้งไปชุบน้ำ แล้วปล่อยให้หมาด นำไปห่อรับประทานได้ทันทีผลิตในประเทศไทย สะอาด ปลอดภัย โรงงานได้รับมาตรฐานอุตสาหกรรมและ อย.ประเทศไทย",  
            'img_product' => "product/8EuWbF90fginN2zv1OnJNy0S88HquREQpSSPcXYa.jpeg",  
            'weight' => 100,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 60,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 1,
            'saleprice' => 60 ,
        ]);

        // OTOP ------------------------------------------------------------------------------
        DB::table('product')->insert([
            'type_id' => 1,
            'shop_id' => 2,
            'name' => "แม่ถ้วนหมูกระจก",
            'detail' => "หมูกระจก 300g. หมูยอแม่ถ้วน เดลิเวอรี่ - หมูยอ แหนมเนือง ของอร่อยหนองคาย",   
            'img_product' => "product/5d9163a0181e438bbeeb9f4b3f492180.jpg",
            'weight' => 300,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 180,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 1,
            'saleprice' => 180 ,
        ]);

        DB::table('product')->insert([
            'type_id' => 3,
            'shop_id' => 3,
            'name' => "ปลาแดดเดียว",
            'detail' => "รสชาติอร่อย กล่มกล่อมเนื้อเยอะ เนื้อแน่นนุ่มฟู ทานได้ทั้งตัวสดไม่ใส่สารกันเสีย ไม่ใส่ผงชูรส",  
            'img_product' => "product/3-1538.jpg", 
            'weight' => 400,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 150,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 2,
            'saleprice' => 150,
        ]);

        DB::table('product')->insert([
            'type_id' =>2,
            'shop_id' => 4,
            'name' => "มะขามแช่อิ่ม บ้านห้วยทราย",
            'detail' => "เป็นการถนอมอาหาร เพื่อใช้รับประทาน ในฤดูกาลที่ไม่มีผลผลิต",   
            'img_product' => "product/b8ec8de64d7b62039795b30ed68336cd.jpg",
            'weight' => 250,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 50,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 3,
            'saleprice' => 250,
        ]);

        DB::table('product')->insert([
            'type_id' => 1,
            'shop_id' => 5,
            'name' => "กล้วยธัญพืช แม่อารักษ์",
            'detail' => "ของฝากจากสังคม ผลิตภัณฑ์กล้วยแปรรูป",  
            'img_product' => "product/1531059849-S__36929543.jpg", 
            'weight' => 500,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 70,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 4,
            'saleprice' => 70,
        ]);

        DB::table('product')->insert([
            'type_id' => 2,
            'shop_id' => 6,
            'name' => "ไข่เค็ม 5 ดาว",
            'detail' => "ไข่เค็มต้มสุก ดองจากน้ำเกลือจากเกลือทะเลคุณภาพดี สูตรลับระดับตำนานรุ่นสู่รุ่นแช่ตู้เย็นช่องธรรมดาเก็บได้ 1 เดือน",   
            'img_product' => "product/d001cfffdbfdd2e26c48609bed3d6bd4.jpg", 
            'weight' => 500,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 60,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 5,
        'saleprice' => 60,
        ]);

        DB::table('product')->insert([
            'type_id' => 2,
            'shop_id' => 7,
            'name' => "มะนาวดองน้ำผึ้ง",
            'detail' => "เพิ่มความชุ่มคอ ขับเสมหะ",   
            'img_product' => "product/e4ba6ca58a9a34a92f454a119eaede19.jpg", 
            'weight' => 1000,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 120,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 6,
            'saleprice' => 120,
        ]);

        DB::table('product')->insert([
            'type_id' => 3,
            'shop_id' => 8,
            'name' => "มะนาวอบน้ำผึ้ง",
            'detail' => "ใช้เวลาหมักมะนาวกับน้ำผึ้ง ใช้เวลา 30วันปริมาณ 360 กรัม บรรจุภัณฑ์ ขวดแก้ว (ผ่านการฆ่าเชื้อ) ", 
            'img_product' => "product/0599e786fc8140442399adedb6b22090.jpg",  
            'weight' => 500,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 50,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 6,
            'saleprice' => 50,
        ]);

        DB::table('product')->insert([
            'type_id' => 3,
            'shop_id' => 9,
            'name' => "กล้วยตากแม่กุหลาบ",
            'detail' => " อำเภอสังคม อร่อย อย่างธรรมชาติ ขนาด : 10x4x17",   
            'img_product' => "product/sangthong-banana-dried.jpg",  
            'weight' => 250,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 35,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 7,
            'saleprice' => 250,
        ]);

        DB::table('product')->insert([
            'type_id' => 1,
            'shop_id' => 9,
            'name' => "ขนมข้าวแต๋น",
            'detail' => "ข้าวแต๋นน้ำแตงโม รสดั้งเดิม
            ทำจากข้าวหอม พันธุ์ดีของไทยทอดจนกรอบได้ที่ ราดด้วยน้ำแตงโมที่เคี่ยวจนข้นหวานเป็นของทานเล่น",  
            'img_product' => "product/azjetk.jpg", 
            'weight' => 350,         
            'amount' => 100,
            'amount2' => 1,
            'cost' => 50,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 8,
            'saleprice' => 50,
        ]);

        DB::table('product')->insert([
            'type_id' => 4,
            'shop_id' => 9,
            'name' => "ผ้าไหมมัดหมี่",
            'detail' => "ผ้าไหมมัดหมี่ตะกอทอลายเต็มเชิงประยุกต์มัดลายได้ประณีตงดงามไหมแท้ทอลายเต็มสวยงามผ้าอบเรียบร้อยผ้าทอมือทุกผืน",  
            'img_product' => "product/d9ad819b54e73dfe52094ba3646a2fc5.jpg", 
            'weight' => 400,         
            'amount' => 10,
            'amount2' => 1,
            'cost' => 500,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 8,
            'saleprice' => 250,
        ]);

        DB::table('product')->insert([
            'type_id' => 4,
            'shop_id' => 9,
            'name' => "ร้านผ้าทองเสื้อผ้าไหมแพรทองคอตั้ง สีฟ้า ไซส์ S",
            'detail' => "เสื้อผ้าไหมแพรทอง แต่งลูกไม้ สีฟ้า , มีซิปซ่อนด้านหลัง อัดผ้ากาวทั้งตัว",  
            'img_product' => "product/nmew84.jpg", 
            'weight' => 400,         
            'amount' => 10,
            'amount2' => 1,
            'cost' => 850,
            'datetosend' => "ภายใน 3 วัน",
            'rating'=> 5,
            'status' => 8,
            'saleprice' => 400,
        ]);

       
    }
}