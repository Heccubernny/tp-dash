@extends('components.layout', ['title' => 'User Dashboard'])
@section('content')
    <div class="grid grid-cols-2 gap-10">
        @includeIf(
    'components.cards.admin-details-card', [
    'title1'=>'FullName',
    'name1' => "Adebayo Olatunji",
    'header'=> 'Admin Details',
    'title2'=>'Email',
    'name2' => "adebayoolatunji@gmail.com",
    'title3'=>'Phone',
    'name3' => "+2348123456789",
    'title4'=>'Address',
    'name4' => "43, Akintowami road, Jibowo Junction. Akure",
    ])

        @includeIf(
    'components.cards.admin-privilages-card', [
    'header'=> 'Admin Privillages',
    'title1'=>'Edit User Details',
    'title2'=>'Add/Remove Service Provider',
    'title3'=>'Add/Remove User',
    'title4'=>'Verify Service Provider',
    'title5'=>'Chat service Provider',
    'title6'=>'Add/Remove Admin',
    ])
    </div>


@endsection
