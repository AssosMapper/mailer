<style>
    .right{
        text-align: right;
    }

</style>
<div>
    {{$data['firstName']}} {{$data['lastName']}}
</div>
<div>
    {{$data['address']['name']}}
</div>
<div>
    {{$data['address']['city']}}, {{$data['address']['postcode']}}
</div>
<div>
    {{$data['phone']}}
</div>
<div>
    {{$data['email']}}
</div>
{{--destinataire--}}
<div class="right">
    {{$data["personality"]->full_name}}
</div>
<div class="right">
    {{$data["personalityAddress"]['name']}}
</div>
<div class="right">
    {{$data['personalityAddress']['city']}}, {{$data['personalityAddress']['postcode']}}
</div>
<div class="right">
    {{$data['personality']->phone}}
</div>
<div class="right">
    {{$data['personality']->email}}
</div>

<div>
    {{$data['address']['city']}}, le {{date('d/m/Y')}}
</div>

{!! $data['letter']->content !!}

{{--signature--}}
<div class="right">
    {{$data['firstName']}} {{$data['lastName']}}
</div>



