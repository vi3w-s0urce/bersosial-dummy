<?php

namespace App\Models;

class Post {
    private static $user_posts = [
        [   
            "post_id" => "1",
            "name_user" => "Michael",
            "username" => "@just_mikee",
            "post_content" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur sapiente molestias unde cum voluptatem aut non ipsa pariatur quam, rem veritatis necessitatibus repudiandae, asperiores minima. Repellat omnis ad voluptatum sequi.",
            "post_time" => "18.02",
            "post_date" => "10 Mar 2023"
        ],
        [
            "post_id" => "2",
            "name_user" => "Elon",
            "username" => "@elon_musk",
            "post_content" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur sapiente molestias unde cum voluptatem aut non ipsa pariatur quam, rem veritatis necessitatibus repudiandae, asperiores minima. Repellat omnis ad voluptatum sequi.",
            "post_time" => "09.23",
            "post_date" => "21 Mar 2023"
        ]
        ];

    public static function all() {
        return collect(self::$user_posts);
    }
    public static function find($post_id){
        $posts = static::all();
        return $posts->firstWhere('post_id', $post_id);
    }
}
