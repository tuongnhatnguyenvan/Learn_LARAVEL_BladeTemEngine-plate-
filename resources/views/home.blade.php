<h1>Trang chu nha</h1>
<h2>
    {{ !empty(request()->keyword)? request()->keyword : 'No keyword' }}
</h2>
<div class="container">
    {!! !empty($content) ? $content : false !!}
</div>
<hr>
@php
    // $message = 'Dat hang thanh cong';
@endphp
@include('parts.notice')

{{-- @for($i = 0; $i < 10; $i++) 
<p>Phan tu thu:{{$i}}</p>
@endfor 
< @while($index <= 10)
    <p>Phan tu thu:{{$index}}</p>
    @php $index++;@endphp
@endwhile 
 @foreach($dataArr as $key => $item)
    <p>{{$item}} - {{$key}}</p>
@endforeach
 @forelse($dataArr as $item)
    <p>{{$item}}</p>
@empty
    <p>Khong co gia tri</p>
@endforelse 
@if($number >= 10)
<p>Day la gia tri hop le</p>
@else
<p>Gia tri khong hop le</p>
@endif  --}}

{{-- @if($number < 0) 
    <p>So am</p>
@elseif($number >= 0 && $number < 5)
    <p>So sieu nho</p>
@elseif($number >= 0 && $number < 10)
    <p>So sieu trung binh</p>
@else
    <p>So lon</p>
@endif --}}

{{-- @switch($number)
    @case (1)
        <p>So thu 1</p>
        @break
    @case (2)
        <p>So thu 2</p>
        @break
    @case (3)
        <p>So thu 3</p>
        @break
    @default
        <p>So con lai</p>
@endswitch --}}

 {{-- @for($i = 0; $i < 10; $i++) 
    @if($i == 5)
        @break
        @continue
    @endif
    <p>Phan tu thu:{{$i}}</p>
@endfor  --}}
 {{-- @php
$number = 5;
if($number>10){
    $total = $number +20 ;
}
else{
    $total = $number + 10;
}
@endphp --}}

{{-- <h3>Ket qua: {{$number}} - {{$total}}</h3>  --}}

{{-- @for($i = 0; $i < 10; $i++)
    <p>Phan tu: {{$i}}</p>
@endfor --}}
<hr>
<?php
// for($i = 0; $i < 10; $i++){
//     echo "<p>Phan tu: $i</p>";
// }
?>

{{-- @verbatim
<div class="container">
    Hello,{{className}}
</div>
<script>
    Hello,@{{name}}
    Hi, {{age}}
</script>
@endverbatim --}}
