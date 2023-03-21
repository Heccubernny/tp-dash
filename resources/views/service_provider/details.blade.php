@extends('components.layout', ['title' => 'User Dashboard'])
@section('content')

<div class="grid grid-cols-2 gap-10">
{{--    foreach ($service_providers as $id => $data) {--}}
{{--    // Get the ID--}}
{{--    echo $id;--}}
{{--    dd( $service_providers[$id]['email']);--}}

{{--    }--}}

    @foreach($service_providers as $id => $data)

    @includeIf(
    'components.cards.sp-info-card', [
        'header'=> 'Service Provider Information',
    'title1'=>"Full Name",
    'name1' => $service_providers[$id]['fullName'],
    'title2'=>'Email',
    'name2' => $service_providers[$id]['email'],
    'title3'=>'Phone',
    'name3' => $service_providers[$id]['phone'],
    'title4'=>'Address',
    'name4' => $service_providers[$id]['address'],
    ])
    @endforeach
    @includeIf(
    'components.cards.service-info-card', [
    'title1'=>'Category',
    'name1' => "Deep House Cleaning",
    'header'=> 'Service Information',
    'title2'=>'Title',
    'name2' => "House Cleaning",
    'title3'=>'Region',
    'name3' => "Jibowo Akure",
    'title4'=>'Work Experience',
    'name4' => "1 year",
    'title5'=>'Frequency',
    'name5' => "Weekly",
    'title6'=>'Price range',
    'name6' => "NGN 10,000",

    ])

    @includeIf(
    'components.cards.upload-doc-card', [
    'title1'=>'ID Card',
    'name1' => "IMG2023011733244",
    'header'=> 'Documents Uploaded',
    'title2'=>'Proof of Address',
    'name2' => "IMG2023011834567",
    'title3'=>'Business Documents',
    'name3' => 'IMG2023011865765'
])
    @includeIf(
    'components.cards.rating-info-card', [
    'title1'=>'Queen Kunle',
    'desc1' => "He is good at his job, I love the way he took his time with
his team to clean my whole house.",
    'header'=> 'Rating and Review',
    'title2'=>'Queen Kunle',
    'desc2' => "He is good at his job, I love the way he took his time with
    his team to clean my whole house.",
    'title3'=>'Queen Kunle',
    'desc3' => "He is good at his job, I love the way he took his time with
    his team to clean my whole house.",

])

    @includeIf(
    'components.cards.upload-img-card', [
    'img1'=>'image1',
    'header'=> 'Images Upload',

    ])


</div>
@includeIf(
'components.cards.conversation-card')
{{-- <div class="bg-{{ $user->status ? 'green' : 'red' }}-500">
<!-- content here -->
</div> --}}

@endsection
