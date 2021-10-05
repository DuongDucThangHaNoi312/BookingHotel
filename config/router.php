<?php
return [
    'get' => [
        ////-------------------Shop----------------------
        // Home
        ''                  => 'BookingHotel\Controllers\Shop\Home\HomeController@getView',
        // Display
        'location/'         => 'BookingHotel\Controllers\Shop\Display\DisplayController@getListHotel',
        'detailsRoom/'      => 'BookingHotel\Controllers\Shop\Display\DisplayController@getDetailsRoom',
        //Login
        'login'             => 'BookingHotel\Controllers\Shop\Login\LoginController@getViewLogin',
        'register'          => 'BookingHotel\Controllers\Shop\Login\LoginController@getViewRegister',
        'logout'            => 'BookingHotel\Controllers\Shop\Login\LoginController@handleLogout',


        ////----------------------API-----------


        //User
        'users'             => 'BookingHotel\Controllers\API\Users\UsersController@getUsers',
        'users/'            => 'BookingHotel\Controllers\API\Users\UsersController@getUser',
        //Hotel
        'hotels'            => 'BookingHotel\Controllers\API\Hotels\HotelsController@getHotels',
        'hotels/'           => 'BookingHotel\Controllers\API\Hotels\HotelsController@getHotel',
        //Location
        'locations'         => 'BookingHotel\Controllers\API\Location\LocationController@getLocations',
        'locations/'        => 'BookingHotel\Controllers\API\Location\LocationController@getLocation',
        //Search
        'search-hotels/'    => 'BookingHotel\Controllers\API\Search\SearchController@getSearchHotels',
        // Rating
        'rating-rooms/'    => 'BookingHotel\Controllers\API\Rating\RatingController@getListRatingRoom',

        //Blog
        'blogs'            => 'BookingHotel\Controllers\API\Blog\BlogController@getBlogs' ,
        'blog/'            => 'BookingHotel\Controllers\API\Blog\BlogController@getBlog' ,

        //Forum
        'forums'            => 'BookingHotel\Controllers\API\Forum\ForumController@getForums' ,
        'forum/'            => 'BookingHotel\Controllers\API\Forum\ForumController@getForum' ,


        ////----------------------Admin-----------


        //// Dashboard
        'a.dashboard'       => 'BookingHotel\Controllers\Admin\Dashboard\DashboardController@getView',
        //// login
        'a.login'           => 'BookingHotel\Controllers\Admin\Login\LoginController@getView',
        //// logout
        'a.logout'          => 'BookingHotel\Controllers\Admin\Logout\LogoutController@handleLogout',
        //// Hotels
        'a.addHotel'        => 'BookingHotel\Controllers\Admin\Hotel\HotelController@getAddView',
        'a.editHotel/'      => 'BookingHotel\Controllers\Admin\Hotel\HotelController@getEditView',
        'a.deleteHotel/'    => 'BookingHotel\Controllers\Admin\Hotel\HotelController@handleDelete',
        'a.listHotel'       => 'BookingHotel\Controllers\Admin\Hotel\HotelController@getListView',
        //// Locations
        'a.addLocation'     => 'BookingHotel\Controllers\Admin\Location\LocationController@getAddView',
        'a.editLocation/'   => 'BookingHotel\Controllers\Admin\Location\LocationController@getEditView',
        'a.deleteLocation/' => 'BookingHotel\Controllers\Admin\Location\LocationController@handleDelete',
        'a.listLocation'    => 'BookingHotel\Controllers\Admin\Location\LocationController@getListView',
        //// Room
        'a.addRoom'         => 'BookingHotel\Controllers\Admin\Room\RoomController@getAddView',
        'a.editRoom/'       => 'BookingHotel\Controllers\Admin\Room\RoomController@getEditView',
        'a.deleteRoom/'     => 'BookingHotel\Controllers\Admin\Room\RoomController@handleDelete',
        'a.listRoom'        => 'BookingHotel\Controllers\Admin\Room\RoomController@getListView',


        // Blogs

        'a.listBlog'        => 'BookingHotel\Controllers\Admin\Blog\BlogController@getListView',
        'a.addBlog'        => 'BookingHotel\Controllers\Admin\Blog\BlogController@getAddView',
        'a.editBlog/'       => 'BookingHotel\Controllers\Admin\Blog\BlogController@getEditView',
        'a.deleteBlog/'     => 'BookingHotel\Controllers\Admin\Blog\BlogController@handleDelete',



    ],

    'post'   => [
        //------------------------------------API
        //User
        'users'          => 'BookingHotel\Controllers\API\Users\UsersController@createUser',
        'login'          => 'BookingHotel\Controllers\API\Users\UsersController@handleLogin',
        //Hotel
        'hotels'         => 'BookingHotel\Controllers\API\Hotels\HotelsController@createHotel',
        //Search
        'search-hotels'  => 'BookingHotel\Controllers\API\Search\SearchController@getSearchHotel',
        //BookRoom
        'bookRooms'      => 'BookingHotel\Controllers\API\BookRoom\BookRoomController@handleBookRoom',

        //Rating
        'isUserBookRoom' => 'BookingHotel\Controllers\API\Rating\RatingController@checkUserOrderRoom',
        'rating-rooms'    => 'BookingHotel\Controllers\API\Rating\RatingController@createRatingRoom',
        //------------------------------------Shop
        //bookRoom
        'bookRoom'       => 'BookingHotel\Controllers\Shop\BookRoom\BookRoomController@handleBookRoom',
        //Search
        'searchHotels'   => 'BookingHotel\Controllers\Shop\Search\SearchController@showViewSearch',
        //comment
        'commentShop'    => 'BookingHotel\Controllers\Shop\Comment\CommentController@handleComment',
        //register-login
        'register'       => 'BookingHotel\Controllers\Shop\Login\LoginController@handleRegister',
        'loginShop'      => 'BookingHotel\Controllers\Shop\Login\LoginController@handleLogin',
        ////----------------------Admin-----------
        'a.login'        => 'BookingHotel\Controllers\Admin\Login\LoginController@handleLogin',
        //// Hotels
        'a.addHotel'     => 'BookingHotel\Controllers\Admin\Hotel\HotelController@handleAdd',
        'a.editHotel'    => 'BookingHotel\Controllers\Admin\Hotel\HotelController@handleEdit',
        //// Locations
        'a.addLocation'  => 'BookingHotel\Controllers\Admin\Location\LocationController@handleAdd',
        'a.editLocation' => 'BookingHotel\Controllers\Admin\Location\LocationController@handleEdit',
        //// Rooms
        'a.addRoom'      => 'BookingHotel\Controllers\Admin\Room\RoomController@handleAdd',
        'a.editRoom'     => 'BookingHotel\Controllers\Admin\Room\RoomController@handleEdit',
        //// upload
        'a.upload'       => 'BookingHotel\Controllers\Admin\Upload\UploadController@handleUpload',

        'a.addBlog'      => 'BookingHotel\Controllers\Admin\Blog\BlogController@handleAdd',
        'a.editBlog'     => 'BookingHotel\Controllers\Admin\Blog\BlogController@handleEdit',
    ]

    ,
    'put'    => [
        //API
        //User
        'users'  => 'BookingHotel\Controllers\API\Users\UsersController@updateUser',
        //Hotel
        'hotels' => 'BookingHotel\Controllers\API\Hotels\HotelsController@updateHotel',
    ],



    'delete' => [
        //API
        //User
        'users/'  => 'BookingHotel\Controllers\API\Users\UsersController@deleteUser',
        //Hotel
        'hotels/' => 'BookingHotel\Controllers\API\Hotels\HotelsController@deleteHotel',

        // //blog
        // 'blog/' => 'BookingHotel\Controllers\API\Blog\BlogController@deleteBlog',

    ]
];