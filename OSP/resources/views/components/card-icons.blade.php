@props(['offer'])

{{-- determine which img to use based on offer --}}
<?php
    $url_sex = '';
    $url_vital_status = '';
    $sex = $offer->sex;
    $vital_status = $offer->vital_status;

    if($offer->sex == "Male"){
        $url_sex = '/images/icon_male_black.png';
    }else{
        $url_sex = '/images/icon_female_black.png';
    }


    if($offer->vital_status == "Alive"){
        $url_vital_status = '/images/icon_alive_black.png';
    }else{
        $url_vital_status = '/images/icon_dead_black.png';
    }
?>

{{-- based on the post, put the necessary icons --}}
<div class="flex flex-col justify-around items-center">
    {{-- male/female --}}
    <div class="my-2"><img src={{$url_sex}} class="object-fit w-1/4 rounded-t-lg h-15 md:h-auto md:w-10 md:rounded-none md:rounded-l-lg" alt=""></div>
    
    {{-- alive or dead --}}
    <div class="my-2"><img src={{$url_vital_status}} class="object-fit w-1/4 rounded-t-lg h-15 md:h-auto md:w-10 md:rounded-none md:rounded-l-lg" alt=""></div>
</div>