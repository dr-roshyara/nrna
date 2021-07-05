#install laravel with inertia and jetstream 
#
	- Crate project 
		○ composer create-project --prefer-dist laravel/laravel blog
	- Install jetstream 
		○ composer require laravel/jetstream
	- Install Jetstream with inertia 
		○ php artisan jetstream:install inertia --teams
		○ npm install & npm run dev 
		○ migration 
         php artisan migrate 
    -npm run watch 
        php artisan serve 
#  make  
    * .env file setting 
    * 
#change logo 
    https://www.youtube.com/watch?v=aUbc-wzIssM
    * change 
        js/Jetstream/AuthenticationCardLogo.vue 
    * change 
        js/jetstream/ApplicationMark.vue
#Make Message Model, controller and Integegration 
    *php artisan make:model Message -mr  
    *php artisan migrate 
    *Go to Models\Message.php and add the following line code     
        protected $fillable =['from', 'to', 'message']; 
    *Create a Vue page in Page/Message.vue
         The content was copied from the inertia.js form 
         https://inertiajs.com/forms 

#Change login in telephone number 
    * already done 
    https://dev.to/kingsconsult/customize-laravel-jetstream-registration-and-login-210f
    https://codesource.io/how-to-conditionally-redirect-users-after-login-on-laravel-jetstream/
    https://tallpad.com/series/laravel-misc/lessons/verify-user-emails-in-a-laravel-rest-api
#Create migrations 
    *create post table 
        php artisan make:Model Post -m 
    *use php artisan tinker to add the posts
     use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_01"
        $post->name ="ICC Member"
        $post->save()
        # 
       use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_02"
        $post->name ="President"
        $post->save()
        #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_03"
        $post->name ="Vice President"
        $post->save()
        #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_04"
        $post->name ="Vice President"
        $post->save()
        #  
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_05"
        $post->name ="Woman Vice President"
        $post->save()
       #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_06"
        $post->name ="General Secretary"
        $post->save()
       #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_07"
        $post->name ="Secretary 1"
        $post->save()
       #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_08"
        $post->name ="Secretary 2"
        $post->save()
       #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_09"
        $post->name ="Treasure"
        $post->save()
       #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_10"
        $post->name ="Woman Coordinator"
        $post->save()
       #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_11"
        $post->name ="Youth Coordinator"
        $post->save()
       #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_12"
        $post->name ="Culture Coordinator"
        $post->save()
       #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_13"
        $post->name ="Langugae & Children Coordinator"
        $post->save()
      #
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_14"
        $post->name ="Student Coordinator"
        $post->save()
      #
       use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_15"
        $post->name ="S1_member1"
        $post->save()
       #
       use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_16"
        $post->name ="S1_member2"
        $post->save()
       #     
        use App\Models\Post;
        $post =new Post
        $post->post_id ="2021_17"
        $post->name ="S1_member3"
        $post->save()
    # Election committee 
        php artisan make:Model Electionmember -mr
#   #Set relationship in Model 
    #read
     https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse
     # 

#   #Voting Form 
#   #Access to List of Voters based on permission
    *display of voter list 
    *Install spatie packages 
        *composer require Spatie/laravel-permission
        *composer require laravelcollective/html
        *follow the tutorial written in one note for permission laravel  
        *php artisan migrate
        # Add roles 
        php artisan permission:create-role Superadmin        
        php artisan permission:create-role  ChiefElectionCommissioner  
        php artisan permission:create-role  ElectionCommissioner
        php artisan permission:create-role  State1ChiefElectionOffficer
        php artisan permission:create-role  Satete1ElectionOffficer
        #
        php artisan permission:create-role  State1ChiefElectionOffficer
        php artisan permission:create-role  Satete1ElectionOffficer
        #
        php artisan permission:create-role  State2ChiefElectionOffficer
        php artisan permission:create-role  Satete2ElectionOffficer
        #
        php artisan permission:create-role  State3ChiefElectionOffficer
        php artisan permission:create-role  Satete3ElectionOffficer
        #
        php artisan permission:create-role  State4ChiefElectionOffficer
        php artisan permission:create-role  Satete4ElectionOffficer
        #
        php artisan permission:create-role  State5ChiefElectionOffficer
        php artisan permission:create-role  Satete5ElectionOffficer
        #
        php artisan permission:create-role  State6ChiefElectionOffficer
        php artisan permission:create-role  Satete6ElectionOffficer
        #
        php artisan permission:create-role  State7ChiefElectionOffficer
        php artisan permission:create-role  Satete7ElectionOffficer
       #create permission 
        php artisan permission:create-permission  "send code"
        php artisan permission:create-permission  "send state1code"
        php artisan permission:create-permission  "send state2code"
        php artisan permission:create-permission  "send state3code"
        php artisan permission:create-permission  "send state4code"
        php artisan permission:create-permission  "send state5code"
        php artisan permission:create-permission  "send state6code"
        php artisan permission:create-permission  "send state7code"
        php artisan permission:create-permission  "send state8code"        
        #

        php artisan permission:create-permission  "view code"
        php artisan permission:create-permission  "view result"
        php artisan permission:create-permission  "view userlist"
        php artisan permission:create-permission  "view candidacies"
        #
        php artisan permission:create-permission  "view votes"
        php artisan permission:create-permission  "view sate1votes"
        php artisan permission:create-permission  "view sate2votes"
        php artisan permission:create-permission  "view sate3votes"
        php artisan permission:create-permission  "view sate4votes"
        php artisan permission:create-permission  "view sate5votes"
        php artisan permission:create-permission  "view sate6votes"
        php artisan permission:create-permission  "view sate7votes"
        php artisan permission:create-permission  "view sate8votes"
        
        php artisan permission:create-permission  "view state1result"
        php artisan permission:create-permission  "view state2result"
        php artisan permission:create-permission  "view state3result"
        php artisan permission:create-permission  "view state4result"
        php artisan permission:create-permission  "view state5result"
        php artisan permission:create-permission  "view state6result"
        php artisan permission:create-permission  "view state7result"
        php artisan permission:create-permission  "view state8result"
        #Create a helpfer function : 
            SetUserRole.php 
            In this function create role and once this  is called all users get their role.
        
        
        
        
        
          
       
         
        

#   #Candidacy form 
#   # Randrom code generation 
#   #Button for sms 
#   # Start page management 
#   # Result Display 
