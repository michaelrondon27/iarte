<?php

use Illuminate\Database\Seeder;

class IconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-dropbox" aria-hidden="true"></i>',
        	'name'=>'dropbox',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-drupal" aria-hidden="true"></i>',
        	'name'=>'drupal',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-facebook" aria-hidden="true"></i>',
        	'name'=>'facebook',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-facebook-f" aria-hidden="true"></i>',
        	'name'=>'facebook-f',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-facebook-official" aria-hidden="true"></i>',
        	'name'=>'facebook-official',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-facebook-square" aria-hidden="true"></i>',
        	'name'=>'facebook-square',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-foursquare" aria-hidden="true"></i>',
        	'name'=>'foursquare',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-google" aria-hidden="true"></i>',
        	'name'=>'google',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-google-plus" aria-hidden="true"></i>',
        	'name'=>'google-plus',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-google-plus-official" aria-hidden="true"></i>',
        	'name'=>'google-plus-official',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-google-plus-square" aria-hidden="true"></i>',
        	'name'=>'google-plus-square',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-instagram" aria-hidden="true"></i>',
        	'name'=>'instagram',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-linkedin" aria-hidden="true"></i>',
        	'name'=>'linkedin',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-linkedin-square" aria-hidden="true"></i>',
        	'name'=>'linkedin-square',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-pinterest" aria-hidden="true"></i>',
        	'name'=>'pinterest',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-pinterest-p" aria-hidden="true"></i>',
        	'name'=>'pinterest-p',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-reddit" aria-hidden="true"></i>',
        	'name'=>'reddit',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-reddit-alien" aria-hidden="true"></i>',
        	'name'=>'reddit-alien',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-reddit-square" aria-hidden="true"></i>',
        	'name'=>'reddit-square',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-skype" aria-hidden="true"></i>',
        	'name'=>'skype',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-snapchat" aria-hidden="true"></i>',
        	'name'=>'snapchat',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-snapchat-ghost" aria-hidden="true"></i>',
        	'name'=>'snapchat-ghost',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-snapchat-square" aria-hidden="true"></i>',
        	'name'=>'snapchat-square',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-telegram" aria-hidden="true"></i>',
        	'name'=>'telegram',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-tumblr" aria-hidden="true"></i>',
        	'name'=>'tumblr',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-tumblr-square" aria-hidden="true"></i>',
        	'name'=>'tumblr-square',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-twitter" aria-hidden="true"></i>',
        	'name'=>'twitter',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-twitter-square" aria-hidden="true"></i>',
        	'name'=>'twitter-square',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-vimeo" aria-hidden="true"></i>',
        	'name'=>'vimeo',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-vimeo-square" aria-hidden="true"></i>',
        	'name'=>'vimeo-square',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-vine" aria-hidden="true"></i>',
        	'name'=>'vine',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-vk" aria-hidden="true"></i>',
        	'name'=>'vk',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-whatsapp" aria-hidden="true"></i>',
        	'name'=>'whatsapp',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-youtube" aria-hidden="true"></i>',
        	'name'=>'youtube',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-youtube-play" aria-hidden="true"></i>',
        	'name'=>'youtube-play',
        ]);
        factory(App\Icon::class)->create([
        	'icon'=>'<i class="fa fa-youtube-square" aria-hidden="true"></i>',
        	'name'=>'youtube-square',
        ]);
    }
}
